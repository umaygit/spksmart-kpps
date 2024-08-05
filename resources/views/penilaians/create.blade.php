<!-- resources/views/penilaians/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
    <h1><i class="fas fa-edit"></i> Tambah Penilaian</h1>
    <form action="{{ route('admin.penilaians.store') }}" method="POST">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label for="pendaftar_id">Pendaftar</label>
            <select name="pendaftar_id" class="form-control" onchange="updateNoTPS(this)">
                <option value="">Pilih nama yang akan di nilai</option>
                @foreach ($pendaftars as $pendaftar)
                    <option value="{{ $pendaftar->id }}" data-no-tps="{{ $pendaftar->no_tps }}">{{ strtoupper($pendaftar->nama_lengkap) }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="no_tps">No TPS</label>
            <input type="text" id="no_tps" name="no_tps" class="form-control" readonly>
        </div>
        <script>
            function updateNoTPS(selectElement) {
                var noTPS = selectElement.options[selectElement.selectedIndex].getAttribute('data-no-tps');
                document.getElementById('no_tps').value = noTPS;
            }
        </script>

        @foreach ($kriterias as $kriteria)
            <div class="form-group">
                <label for="n_k{{ $kriteria->id }}">Nilai {{ $kriteria->nama_kriteria }} (K{{ $kriteria->id }}) </label>
                <select name="n_k{{ $kriteria->id }}" class="form-control">
                    <option value="">--Input Nilai--</option>
                    @foreach ($subKriterias->where('kriteria_id', $kriteria->id) as $subKriteria)
                        <option value="{{ $subKriteria->nilai }}">{{ $subKriteria->nama_sub_kriteria }} - {{ $subKriteria->nilai }}</option>
                    @endforeach
                </select>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary" style="float: right;"><i class="fas fa-save"></i> Simpan</button>
    <a href="{{ route('admin.penilaians.index') }}" class="btn btn-dark" style="float:left;"><i class="fas fa-arrow-left"></i> Kembali</a>
    </form>
</div>
@endsection
