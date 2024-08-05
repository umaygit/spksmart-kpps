@extends('layouts.app')

@section('content')
    <div class="container">
        <h1><i class="fas fa-edit"></i> Edit Penilaian</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.penilaians.update', $penilaian->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="pendaftar_id">Nama Pendaftar</label>
                        <select name="pendaftar_id" class="form-control">
                            @foreach ($pendaftars as $pendaftar)
                                <option value="{{ $pendaftar->id }}" {{ $penilaian->pendaftar_id == $pendaftar->id ? 'selected' : '' }}>{{ $pendaftar->nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach ($kriterias as $kriteria)
                        <div class="form-group">
                            <label for="n_k{{ $kriteria->id }}">Nilai K{{ $kriteria->id }}</label>
                            <select name="n_k{{ $kriteria->id }}" class="form-control">
                                @foreach ($subKriterias->where('kriteria_id', $kriteria->id) as $subKriteria)
                                    <option value="{{ $subKriteria->nilai }}" {{ $penilaian->{'n_k'.$kriteria->id} == $subKriteria->nilai ? 'selected' : '' }}>{{ $subKriteria->nama_sub_kriteria }} - {{ $subKriteria->nilai }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                    <a href="{{ route('admin.penilaians.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
            </div>
        </div>
    </div>
@endsection
