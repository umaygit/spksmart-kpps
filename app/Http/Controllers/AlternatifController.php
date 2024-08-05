<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;

class AlternatifController extends Controller
{
    /**
     * Tampilkan daftar sumber daya.
     */
    public function index(Request $request)
    {
        $query = Pendaftar::with('penilaians');

        if ($request->has('namaPendaftar') && $request->namaPendaftar != '') {
            $query->where('nama_lengkap', 'like', '%' . $request->namaPendaftar . '%');
        }

        if ($request->has('noTPS') && $request->noTPS != '') {
            $query->where('no_tps', $request->noTPS);
        }

        $pendaftars = $query->paginate(100);

        // Tambahkan flag untuk menunjukkan apakah pendaftar telah dinilai
        foreach ($pendaftars as $pendaftar) {
            $pendaftar->sudah_dinilai = $pendaftar->penilaians->isNotEmpty();
        }

        return view('alternatifs.index', compact('pendaftars'));
    }
}




// yang asli di bawah ini

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Alternatif;
// use App\Models\Pendaftar;

// class AlternatifController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index(Request $request)
//     {
//         $query = Alternatif::with('pendaftar', 'penilaians');

//         if ($request->has('namaPendaftar') && $request->namaPendaftar != '') {
//             $query->whereHas('pendaftar', function ($q) use ($request) {
//                 $q->where('nama_lengkap', 'like', '%' . $request->namaPendaftar . '%');
//             });
//         }

//         if ($request->has('noTPS') && $request->noTPS != '') {
//             $query->whereHas('pendaftar', function ($q) use ($request) {
//                 $q->where('no_tps', $request->noTPS);
//             });
//         }

//         $alternatifs = $query->paginate(100);

//         // Add a flag to indicate if the alternatif has been evaluated
//         foreach ($alternatifs as $alternatif) {
//             $alternatif->sudah_dinilai = $alternatif->penilaians->isNotEmpty();
//         }

//         return view('alternatifs.index', compact('alternatifs'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         $pendaftars = Pendaftar::all();
//         return view('alternatifs.create', compact('pendaftars'));
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'pendaftar_id' => 'required|exists:pendaftars,id',
//         ]);

//         // Cek apakah nama pendaftar sudah ada di alternatif
//         $pendaftar = Pendaftar::find($request->pendaftar_id);
//         $alternatifExist = Alternatif::whereHas('pendaftar', function ($query) use ($pendaftar) {
//             $query->where('nik', $pendaftar->nik);
//         })->exists();

//         if ($alternatifExist) {
//             return redirect()->route('admin.alternatifs.index')->with('error', 'Alternatif dengan nama pendaftar yang sama sudah ada.');
//         }

//         Alternatif::create([
//             'pendaftar_id' => $request->pendaftar_id,
//             'sudah_dinilai' => false,
//         ]);

//         return redirect()->route('admin.alternatifs.index')->with('success', 'Berhasil menambahkan Alternatif.');
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         $alternatif = Alternatif::findOrFail($id);
//         return view('alternatifs.edit', compact('alternatif'));
//     }
//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         $request->validate([
//             'sudah_dinilai' => 'required|boolean',
//         ]);

//         $alternatif = Alternatif::findOrFail($id);
//         $alternatif->update($request->only(['sudah_dinilai']));

//         return redirect()->route('admin.alternatifs.index')->with('success', 'Berhasil Update Alternatif.');
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         $alternatif = Alternatif::findOrFail($id);
//         $alternatif->delete();
//         return redirect()->route('admin.alternatifs.index')->with('success', 'Berhasil Menghapus Alternatif.');
//     }

//     /**
//      * Filter data based on query parameters.
//      */
//     // public function filter(Request $request)
//     // {
//     //     $query = Alternatif::query();
//     //     $query = Pendaftar::query();

//     //     if ($request->has('namaPendaftar') && $request->namaPendaftar != '') {
//     //         $query->whereHas('pendaftar', function ($q) use ($request) {
//     //             $q->where('nama_lengkap', 'like', '%' . $request->namaPendaftar . '%');
//     //         });
//     //     }

//     //     if ($request->has('noTPS') && $request->noTPS != '') {
//     //         $query->whereHas('pendaftar', function ($q) use ($request) {
//     //             $q->where('no_tps', $request->noTPS);
//     //         });
//     //     }

//     //     $alternatifs = $query->get();

//     //     return view('alternatifs.filter', compact('alternatifs', 'pendaftars'));
//     // }

// }
