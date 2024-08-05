<!-- resources/views/smart/result.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-table"></i> Hasil Perhitungan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">NU_K1</th>
                        <th style="text-align: center;">NU_K2</th>
                        <th style="text-align: center;">NU_K3</th>
                        <th style="text-align: center;">NU_K4</th>
                        <th style="text-align: center;"></th>
                        <th style="text-align: center;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penilaians as $penilaian)
                        <tr>
                            <td style="text-align: left;">{{ $penilaian->pendaftar->nama_lengkap }}</td>
                            <td style="text-align: center;">{{ $utilityValues[$penilaian->id]['n_k1'] ?? 0 }}</td>
                            <td style="text-align: center;">{{ $utilityValues[$penilaian->id]['n_k2'] ?? 0 }}</td>
                            <td style="text-align: center;">{{ $utilityValues[$penilaian->id]['n_k3'] ?? 0 }}</td>
                            <td style="text-align: center;">{{ $utilityValues[$penilaian->id]['n_k4'] ?? 0 }}</td>
                            <td style="text-align: center;"></td>

                        </tr>
                    @endforeach
                <tfoot>
                    <tr>
                        @foreach($kriterias as $kriteria)
                        <th style="text-align: center;"></th>
                        <th style="text-align: center;">{{ $kriteria['bobot'] }}</th>

                        @endforeach
                    </tr>
                </tfoot>

                </tbody>
            </table>
            <a href="{{ route('admin.penilaians.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
@endsection



