@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah SubKriteria</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.subkriteria.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kriteria_id">Nama Kriteria</label>
                    <select class="form-control" id="kriteria_id" name="kriteria_id" required>
                        @foreach(App\Models\Kriteria::all() as $kriteria)
                            <option value="{{ $kriteria->id }}">{{ $kriteria->nama_kriteria }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_sub_kriteria">Nama SubKriteria</label>
                    <input type="text" class="form-control" id="nama_sub_kriteria" name="nama_sub_kriteria" required>
                </div>
                <div class="form-group">
                    <label for="nilai">Nilai</label>
                    <input type="number" class="form-control" id="nilai" name="nilai" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.subkriteria.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
