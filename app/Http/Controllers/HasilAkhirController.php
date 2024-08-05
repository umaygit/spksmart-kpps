<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Kriteria;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Log;
// use Barryvdh\DomPDF\Facade\PDF;

// use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class HasilAkhirController extends Controller
{
    public function index()
    {
        $penilaians = Penilaian::all();
        $kriterias = Kriteria::all();
        $pendaftars = Pendaftar::pluck('nama_lengkap');


        return view('hasil-akhir.index', compact('penilaians', 'kriterias', 'pendaftars'));
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



    public function cetakdata()
    {

    $pendaftars = Pendaftar::pluck('nama_lengkap');
    $finalScores = $this->calculateFinalScore();
    $penilaians = Penilaian::all();

    view()->share('pendaftars', $pendaftars);
    view()->share('finalScores', $finalScores);
    view()->share('penilaians]', $penilaians);
    return view('hasil-akhir.export', compact('pendaftars', 'finalScores','penilaians'));
    }



}

