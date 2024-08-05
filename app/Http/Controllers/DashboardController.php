<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Penilaian;


class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPendaftar = Pendaftar::count();
        $jumlahKriteria = Kriteria::count();
        $jumlahSubKriteria = SubKriteria::count();

        $jumlahLakiLaki = Pendaftar::where('jk', 'L')->count();
        $jumlahPerempuan = Pendaftar::where('jk', 'P')->count();
        $totalPendaftar = $jumlahLakiLaki + $jumlahPerempuan;

        $persentaseLakiLaki = $totalPendaftar > 0 ? ($jumlahLakiLaki / $totalPendaftar) * 100 : 0;
        $persentasePerempuan = $totalPendaftar > 0 ? ($jumlahPerempuan / $totalPendaftar) * 100 : 0;

        // $totalPendaftar = \App\Models\Pendaftar::count();
        // $sudahDinilai = \App\Models\Pendaftar::has('penilaian')->count();
        // $belumDinilai = $totalPendaftar - $sudahDinilai;

        $sudahDinilai = Pendaftar::has('penilaians')->count();
        $belumDinilai = $totalPendaftar - $sudahDinilai;

         // Mengambil data TPS dan jumlah pendaftar laki-laki dan perempuan
        $tpsNumbers = \App\Models\Pendaftar::select('no_tps')->distinct()->pluck('no_tps');
        $jumlahLaki = $tpsNumbers->map(function ($tps) {
            return \App\Models\Pendaftar::where('no_tps', $tps)->where('jk', 'L')->count();
        });
        $jumlahPerempuan = $tpsNumbers->map(function ($tps) {
            return \App\Models\Pendaftar::where('no_tps', $tps)->where('jk', 'P')->count();
        });



        return view('dashboard', compact('jumlahPendaftar', 'jumlahKriteria', 'jumlahSubKriteria', 'sudahDinilai', 'belumDinilai', 'tpsNumbers', 'jumlahLaki', 'jumlahPerempuan'));
    }

}
