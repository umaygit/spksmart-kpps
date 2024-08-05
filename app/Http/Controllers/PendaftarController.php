<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pendaftar;
use App\Models\Penilaian;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Log;

class PendaftarController extends Controller
{
    public function create()
    {
        return view('pendaftaran');
    }

    public function store(Request $request)
    {
        $request->validate([
            'j_nik' => 'required|string|max:10',
            'nik' => 'required|string|max:16|unique:pendaftars,nik',
            'nama_lengkap' => 'required|string|max:50',
            't_lhr' => 'required|string',
            'tgl_lhr' => 'required|date',
            'jk' => 'required|in:L,P',
            'usia' => 'required|string|max:5',
            'pd_terakhir' => 'required|string|max:25',
            'pekerjaan' => 'required|string|max:25',
            'alamat' => 'required|string',
            'no_tps' => 'required|string',
            'email' => 'required|email|max:50|nullable',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $pendaftar = Pendaftar::create([
            'j_nik' => $request->j_nik,
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            't_lhr' => $request->t_lhr,
            'tgl_lhr' => $request->tgl_lhr,
            'jk' => $request->jk,
            'usia' => $request->usia,
            'pd_terakhir' => $request->pd_terakhir,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'no_tps' => $request->no_tps,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('pendaftar')->login($pendaftar);

        return redirect()->route('pendaftar.login')->with('success', 'Pendaftaran berhasil.');
    }

    public function showLoginForm()
    {
        return view('auth.pendaftar-login');
    }

    public function loginDaftar(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|max:16',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('nik', 'password');

        if (Auth::guard('pendaftar')->attempt($credentials))  {
            return redirect()->route('pendaftar.pengumuman')->with('success', 'Berhasil Login');
        } else {
            return redirect()->route('pendaftar.login')->with('failed', 'NIK atau Password Salah');
        }
    }



    public function logout()
    {
        Auth::guard('pendaftar')->logout();
        return redirect()->route('pendaftar.login')->with('success', 'Kamu telah logout');
    }

    public function showPengumuman()
    {
        $user = Auth::guard('pendaftar')->user();

        if (!$user) {
            return redirect()->route('pendaftar.login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Mengambil data pendaftar berdasarkan NIK pengguna yang login
        $pendaftars = Pendaftar::where('nik', $user->nik)->get();
        // Hitung nilai akhir
        $finalScores = $this->calculateFinalScore();

        return view('pengumuman', compact('pendaftars', 'finalScores'));
    }



    public function calculateMinMax()
    {
        $maxValues = [
            'n_k1' => Penilaian::max('n_k1'),
            'n_k2' => Penilaian::max('n_k2'),
            'n_k3' => Penilaian::max('n_k3'),
            'n_k4' => Penilaian::max('n_k4'),
        ];
        $minValues = [
            'n_k1' => Penilaian::min('n_k1'),
            'n_k2' => Penilaian::min('n_k2'),
            'n_k3' => Penilaian::min('n_k3'),
            'n_k4' => Penilaian::min('n_k4'),
        ];

        return ['maxValues' => $maxValues, 'minValues' => $minValues];
    }

    public function calculateUtility()
    {
        $penilaians = Penilaian::all();
        $minMaxValues = $this->calculateMinMax();
        $maxValues = $minMaxValues['maxValues'];
        $minValues = $minMaxValues['minValues'];
        $utilityValues = [];

        foreach ($penilaians as $penilaian) {
            $utilityValues[$penilaian->pendaftar_id] = [
                // Menghitung nilai utilitas untuk kriteria 1. Jika nilai maksimum sama dengan nilai minimum, hasilnya adalah 0.
                // Jika tidak, hasilnya adalah skala 100 dikalikan dengan selisih nilai penilaian dan nilai minimum dibagi dengan selisih nilai maksimum dan minimum.
                'n_k1' => ($maxValues['n_k1'] - $minValues['n_k1']) == 0 ? 0 : 100 * ($penilaian->n_k1 - $minValues['n_k1']) / ($maxValues['n_k1'] - $minValues['n_k1']),

                // Menghitung nilai utilitas untuk kriteria 2 dengan logika yang sama seperti kriteria 1.
                'n_k2' => ($maxValues['n_k2'] - $minValues['n_k2']) == 0 ? 0 : 100 * ($penilaian->n_k2 - $minValues['n_k2']) / ($maxValues['n_k2'] - $minValues['n_k2']),

                // Menghitung nilai utilitas untuk kriteria 3 dengan logika yang sama seperti kriteria 1.
                'n_k3' => ($maxValues['n_k3'] - $minValues['n_k3']) == 0 ? 0 : 100 * ($penilaian->n_k3 - $minValues['n_k3']) / ($maxValues['n_k3'] - $minValues['n_k3']),

                // Menghitung nilai utilitas untuk kriteria 4 dengan logika yang sama seperti kriteria 1.
                'n_k4' => ($maxValues['n_k4'] - $minValues['n_k4']) == 0 ? 0 : 100 * ($penilaian->n_k4 - $minValues['n_k4']) / ($maxValues['n_k4'] - $minValues['n_k4']),
            ];
        }

        return $utilityValues;
    }

    public function calculateWeight()
    {
        $kriterias = Kriteria::all();
        $totalWeight = $kriterias->sum('bobot');
        $bobotValues = [];

        foreach ($kriterias as $kriteria) {
            $bobotValues['n_k' . $kriteria->id] = $kriteria->bobot / $totalWeight;
        }

        // Log::info('Calculated Bobot Values: ', $bobotValues);

        return $bobotValues;
    }

    public function calculateFinalScore()
    {
        $penilaians = Penilaian::all();
        $bobotValues = $this->calculateWeight();
        $utilityValues = $this->calculateUtility();
        $finalScores = [];

        foreach ($penilaians as $penilaian) {
            $finalScores[$penilaian->pendaftar_id] =
                ($utilityValues[$penilaian->pendaftar_id]['n_k1'] ?? 0) * ($bobotValues['n_k1'] ?? 0) +
                ($utilityValues[$penilaian->pendaftar_id]['n_k2'] ?? 0) * ($bobotValues['n_k2'] ?? 0) +
                ($utilityValues[$penilaian->pendaftar_id]['n_k3'] ?? 0) * ($bobotValues['n_k3'] ?? 0) +
                ($utilityValues[$penilaian->pendaftar_id]['n_k4'] ?? 0) * ($bobotValues['n_k4'] ?? 0);
        }

        return $finalScores;
    }

    public function calculateAndReturnView()
    {
        $penilaians = Penilaian::all();
        $kriterias = Kriteria::all();
        $pendaftars = Pendaftar::pluck('nama_lengkap');
        $minMaxValues = $this->calculateMinMax();
        $maxValues = $minMaxValues['maxValues'];
        $minValues = $minMaxValues['minValues'];
        $utilityValues = $this->calculateUtility();
        $finalScores = $this->calculateFinalScore();
        $bobotValues = $this->calculateWeight();

        Log::info('Bobot----------------: ', $bobotValues);

        return view('hasil-akhir.index', compact('pendaftars','kriterias','penilaians', 'utilityValues', 'finalScores', 'maxValues', 'minValues', 'bobotValues'));
    }




}
