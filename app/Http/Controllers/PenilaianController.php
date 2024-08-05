<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Pendaftar;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PenilaiansExport;

class PenilaianController extends Controller
{
    public function index()
    {
        $penilaians = Penilaian::with(['pendaftar', 'kriteria', 'subKriteria'])->get();
        return view('penilaians.index', compact('penilaians'));
    }

    public function create()
    {
        $pendaftars = Pendaftar::all();
        $kriterias = Kriteria::all();
        $subKriterias = SubKriteria::all();
        return view('penilaians.create', compact('pendaftars', 'kriterias', 'subKriterias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pendaftar_id' => 'required|exists:pendaftars,id',
            'n_k1' => 'required|integer',
            'n_k2' => 'required|integer',
            'n_k3' => 'required|integer',
            'n_k4' => 'required|integer',
        ]);

        $data = $request->all();
        $penilaian = new Penilaian();
        $penilaian->pendaftar_id = $data['pendaftar_id'];
        $penilaian->n_k1 = $data['n_k1'];
        $penilaian->n_k2 = $data['n_k2'];
        $penilaian->n_k3 = $data['n_k3'];
        $penilaian->n_k4 = $data['n_k4'];

        // Cek apakah nama pendaftar sudah ada di penilaian berdasarkan NIK
        $pendaftar = Pendaftar::find($request->pendaftar_id);
        $penilaianExist = Penilaian::whereHas('pendaftar', function ($query) use ($pendaftar) {
            $query->where('nik', $pendaftar->nik);
        })->exists();

        if ($penilaianExist) {
            return redirect()->route('admin.penilaians.index')->with('error', 'Penilaian dengan nama pendaftar yang sama sudah ada.');
        }

        $penilaian->save();

        return redirect()->route('admin.penilaians.index')->with('success', 'Berhasil Menambah Penilaian.');
    }

    public function show(Penilaian $penilaian)
    {
        return view('penilaians.show', compact('penilaian'));

    }

    public function edit(Penilaian $penilaian)
    {
        $pendaftars = Pendaftar::all();
        $kriterias = Kriteria::all();
        $subKriterias = SubKriteria::all();
        return view('penilaians.edit', compact('penilaian', 'pendaftars', 'kriterias', 'subKriterias'));
    }

    public function update(Request $request, Penilaian $penilaian)
    {
        $request->validate([
            'pendaftar_id' => 'required|exists:pendaftars,id',
            'n_k1' => 'required|integer',
            'n_k2' => 'required|integer',
            'n_k3' => 'required|integer',
            'n_k4' => 'required|integer',
        ]);

        $penilaian->update($request->all());

        return redirect()->route('admin.penilaians.index')->with('success', 'Berhasil Mengubah Penilaian.');
    }

    public function destroy(Penilaian $penilaian)
    {
        $penilaian->delete();

        return redirect()->route('admin.penilaians.index')->with('success', 'Berhasil Menghapus Penilaian.');
    }

    public function exportExcel()
    {
        return Excel::download(new PenilaiansExport, 'data_penilaians.xlsx');
    }
}
