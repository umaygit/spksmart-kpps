@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-table"></i> Lakukan Perhitungan</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">

            </table>

            {{-- untuk menghitung --}}
            <div class="form-group">
                <label for="jenisPerhitungan">Pilih Jenis Perhitungan:</label>
                <select class="form-control" id="jenisPerhitungan">
                    <option value="metodeSMART">Metode SMART</option>
                </select>
            </div>


            <div class="text-right">
                <a href="{{ route('admin.penilaians.index') }}" class="btn btn-primary"><i class="fas fa-calculator"></i> Hitung</a>
            </div>
        </div>
    </div>

    <script>
        console.log($bobotValues);
    </script>
@endsection
