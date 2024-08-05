@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h6 class="m-0 font-weight-bold text-primary">Tambah Alternatif</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.alternatifs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="pendaftar_id">Pilih Nama Pendaftar</label>
                <select name="pendaftar_id" id="pendaftar_id" class="form-control">
                    @foreach($pendaftars as $pendaftar)
                    <option value="{{ $pendaftar->id }}">{{ $pendaftar->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

