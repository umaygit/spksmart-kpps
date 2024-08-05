<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PendaftarsExport;

class PendaftarViewController extends Controller

{
    public function index()
    {
        $pendaftars = Pendaftar::all();
        return view('pendaftar.index', compact('pendaftars'));
    }

    public function destroy($id)
    {
        // Cari data pendaftar berdasarkan ID
        $pendaftar = Pendaftar::findOrFail($id);

        // // Hapus file berkas ijazah dan kesehatan jika ada
        // $fileIjazahPath = 'public/berkas/ijazah/' . $pendaftar->br_ijazah;
        // if (Storage::exists($fileIjazahPath)) {
        //     Storage::delete($fileIjazahPath);
        // }

        // $fileKesehatanPath = 'public/berkas/kesehatan/' . $pendaftar->br_kshtn;
        // if (Storage::exists($fileKesehatanPath)) {
        //     Storage::delete($fileKesehatanPath);
        // }

        // Hapus data pendaftar dari database
        $pendaftar->delete();

        return redirect()->route('admin.pendaftar.index')->with('success', 'Data pendaftar berhasil dihapus.');
    }

    public function exportExcel()
    {
        return Excel::download(new PendaftarsExport, 'data_pendaftar.xlsx');
    }

    public function edit($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        return view('pendaftar.edit', compact('pendaftar'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nik' => 'required',
            'nama_lengkap' => 'required',
            't_lhr' => 'required',
            'tgl_lhr' => 'required',
            'jk' => 'required',
            'usia' => 'required',
            'pd_terakhir' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'no_tps' => 'required',
            // Tambahkan validasi untuk input lain sesuai kebutuhan
        ]);

        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->update($validatedData);

        return redirect()->route('admin.pendaftar.index')->with('success', 'Data pendaftar berhasil diperbarui.');
    }
}

