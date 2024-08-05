<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubKriteria;
use App\Models\Kriteria;


class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subkriterias = SubKriteria::all();
        return view('subkriteria.index', compact('subkriterias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subkriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_sub_kriteria' => 'required|max:20',
            'nilai' => 'required',
            'kriteria_id' => 'required|exists:kriterias,id',
        ]);

        SubKriteria::create($validatedData);

        return redirect()->route('admin.subkriteria.index')->with('success', 'SubKriteria berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subkriteria = SubKriteria::findOrFail($id);
        $kriterias = Kriteria::all();
        return view('subkriteria.edit', compact('subkriteria', 'kriterias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'nama_sub_kriteria' => 'required|max:20',
            'nilai' => 'required|numeric',
            'kriteria_id' => 'required|exists:kriterias,id',
        ]);

        $subkriteria = SubKriteria::findOrFail($id);
        $subkriteria->update($request->all());

        return redirect()->route('admin.subkriteria.index')->with('success', 'SubKriteria berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subkriteria = SubKriteria::findOrFail($id);
        $subkriteria->delete();

        return redirect()->route('admin.subkriteria.index')->with('success', 'SubKriteria berhasil dihapus.');
    }


    public function kriteria()
{
    return $this->belongsTo(Kriteria::class);
}
}
