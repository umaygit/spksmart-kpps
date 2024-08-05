@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Kriteria</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kriteria.update', $kriteria->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kd_kriteria">Kode Kriteria</label>
                            <input type="text" class="form-control" id="kd_kriteria" name="kd_kriteria" value="{{ $kriteria->kd_kriteria }}" required>
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot</label>
                            <input type="text" class="form-control" id="bobot" name="bobot" value="{{ $kriteria->bobot }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_kriteria">Nama Kriteria</label>
                            <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="{{ $kriteria->nama_kriteria }}" required>
                        </div>
                        <div class="form-group">
                            <label for="j_kriteria">Jenis Kriteria</label>
                            <select class="form-control" id="j_kriteria" name="j_kriteria" required>
                                <option value="Benefit" {{ $kriteria->j_kriteria == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                                <option value="Cost" {{ $kriteria->j_kriteria == 'Cost' ? 'selected' : '' }}>Cost</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                <a href="{{ route('admin.kriteria.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Batal</a>
            </form>
        </div>
    </div>
@endsection
