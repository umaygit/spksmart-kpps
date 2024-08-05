@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Alternatif</h1>
    <form action="{{ route('admin.alternatifs.update', $alternatif) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="sudah_dinilai">Keterangan</label>
            <select name="sudah_dinilai" id="sudah_dinilai" class="form-control">
                <option value="1" {{ $alternatif->sudah_dinilai ? 'selected' : '' }}>Sudah Dinilai</option>
                <option value="0" {{ !$alternatif->sudah_dinilai ? 'selected' : '' }}>Belum Dinilai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection
