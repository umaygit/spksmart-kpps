@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-table"></i> Data Perhitungan</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
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
                        <th style="text-align: center;">Nilai Akhir</th>
                        <th style="text-align: center;">Ranking</th>
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
                            <td style="text-align: center;">{{ $finalScores [$penilaian->id] }}</td>
                            <td class="text-center">
                                @if(isset($finalScores[$penilaian->pendaftar_id]))
                                        @if($finalScores[$penilaian->pendaftar_id] >= 60)
                                            <span class="badge bg-success text-white">TERPILIH</span>
                                        @elseif($finalScores[$penilaian->pendaftar_id] >= 40)
                                            <span class="badge bg-danger text-white">PENGGANTI</span>
                                        @else
                                            <span class="badge bg-danger text-white">TIDAK TERPILIH</span>
                                        @endif
                                    @else
                                        <span class="badge bg-danger text-white">BELUM DI NILAI</span>
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- untuk menampilkan normalisasi --}}

            <a href="{{ route('admin.hasil-akhir.calculate') }}" class="btn btn-primary">Hitung</a>
        </div>
    </div>

    <script>
        console.log($bobotValues);
    </script>
@endsection
