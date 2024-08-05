@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Kriteria</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kriteria.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kd_kriteria">Kode Kriteria</label>
                            <input type="text" class="form-control" id="kd_kriteria" name="kd_kriteria" required>
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot</label>
                            <input type="text" class="form-control" id="bobot" name="bobot" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_kriteria">Nama Kriteria</label>
                            <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" required>
                        </div>
                        <div class="form-group">
                            <label for="j_kriteria">Jenis Kriteria</label>
                            <select class="form-control" id="j_kriteria" name="j_kriteria">
                                <option value="Benefit">Benefit</option>
                                <option value="Cost">Cost</option>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            const kdKriteria = document.getElementById('kd_kriteria').value;
            const bobot = document.getElementById('bobot').value;
            const namaKriteria = document.getElementById('nama_kriteria').value;
            const jKriteria = document.getElementById('j_kriteria').value;

            if (!kdKriteria || !bobot || !namaKriteria || !jKriteria) {
                event.preventDefault(); // Menghentikan form dari submit jika ada field yang kosong
                alert('Semua field harus diisi!');
            }
        });
    });
</script>




