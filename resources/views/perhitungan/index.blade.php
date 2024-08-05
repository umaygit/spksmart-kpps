@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-table"></i> Data Perhitungan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        {{-- <th style="text-align: center;">No</th> --}}
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">K1</th>
                        <th style="text-align: center;">Utility K1</th>
                        <th style="text-align: center;">K2</th>
                        <th style="text-align: center;">Utility K2</th>
                        <th style="text-align: center;">K3</th>
                        <th style="text-align: center;">Utility K3</th>
                        <th style="text-align: center;">K4</th>
                        <th style="text-align: center;">Utility K4</th>
                    </tr>
                <tfoot>
                    <tr>
                        <th style="text-align: center;">Nilai Max</th>
                        <th style="text-align: center;">{{ $maxValues['n_k1'] }}</th>
                        <th style="text-align: center;"></th>
                        <th style="text-align: center;">{{ $maxValues['n_k2'] }}</th>
                        <th style="text-align: center;"></th>
                        <th style="text-align: center;">{{ $maxValues['n_k3'] }}</th>
                        <th style="text-align: center;"></th>
                        <th style="text-align: center;">{{ $maxValues['n_k4'] }}</th>
                        <th style="text-align: center;"></th>

                    </tr>
                    <tr>
                        <th style="text-align: center;">Nilai Min</th>
                        <th style="text-align: center;">{{ $minValues['n_k1'] }}</th>
                        <th style="text-align: center;"></th>
                        <th style="text-align: center;">{{ $minValues['n_k2'] }}</th>
                        <th style="text-align: center;"></th>
                        <th style="text-align: center;">{{ $minValues['n_k3'] }}</th>
                        <th style="text-align: center;"></th>
                        <th style="text-align: center;">{{ $minValues['n_k4'] }}</th>
                        <th style="text-align: center;"></th>
                    </tr>
                    <tr>
                        <th style="text-align: center;">Normalisasi Bobot</th>
                        @foreach($bobotValues as $bobot)
                        <th style="text-align: center;">{{ $bobot }}</th>
                        <th style="text-align: center;"></th>
                        @endforeach
                    </tr>
                </tfoot>
                </thead>
                <tbody>
                    @foreach($penilaians as $penilaian)
                        <tr>
                            {{-- <td style="text-align: center;">{{ $loop->iteration }}</td> --}}
                            <td style="text-align: left;">{{ $penilaian->pendaftar->nama_lengkap }}</td>
                            <td style="text-align: center;">{{ $penilaian->n_k1 }}</td>
                            <th style="text-align: center;">{{ $utilityValues [$penilaian->id] ['n_k1'] }}</th>
                            <td style="text-align: center;">{{ $penilaian->n_k2 }}</td>
                            <th style="text-align: center;">{{ $utilityValues [$penilaian->id] ['n_k2'] }}</th>
                            <td style="text-align: center;">{{ $penilaian->n_k3 }}</td>
                            <th style="text-align: center;">{{ $utilityValues [$penilaian->id] ['n_k3'] }}</th>
                            <td style="text-align: center;">{{ $penilaian->n_k4 }}</td>
                            <th style="text-align: center;">{{ $utilityValues [$penilaian->id] ['n_k4'] }}</th>

                        </tr>
                    @endforeach
                </tbody>
            </table>


            <a href="{{ route('admin.penilaians.index') }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>

    <script>
        console.log($bobotValues);
    </script>
@endsection
