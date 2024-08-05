@extends('layouts.app')

@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-table"></i> Data Nilai Akhir</h6>
            <div>
                <a href="{{ route('admin.hasil-akhir.cetakdata') }}" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Data</a>
            </div>
        </div>

        <div class="alert alert-info" role="alert">
            Berdasarkan perhitungan yang dilakukan menggunakan metode <i>Simple Multi Attribute Rating Technique</i> (SMART).
            Maka dihasilkan keputusan sesuai tabel di bawah ini:
        </div>
        {{-- <script>
            alert('pesan');
        </script> --}}




            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Nama Alternatif</th>
                        <th style="text-align: center;">No TPS</th>
                        <th style="text-align: center;">Nilai Akhir</th>
                        <th style="text-align: center;">Keterangan </th>
                    </tr>
                </thead>
                <tbody>

                     {{-- mengurutkan berdasarkan nilai tertinggi dan nomor TPS --}}

                    @php
                        $groupedPenilaians = $penilaians->groupBy('pendaftar.no_tps');
                    @endphp

                    @foreach($groupedPenilaians as $no_tps => $group)
                        @php
                            $sortedGroup = $group->sortByDesc(function($penilaian) use ($finalScores) {
                                return $finalScores[$penilaian->pendaftar_id];
                            })->take(20);
                        @endphp

                        @foreach($sortedGroup as $penilaian)
                            <tr class="text-center {{ $loop->iteration % 2 == 0 ? 'bg-light' : '' }}">
                                <td style="text-align: center;">{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                                <td style="text-align: left;">{{ strtoupper($penilaian->pendaftar->nama_lengkap) }}</td>
                                <td style="text-align: center;">{{ $penilaian->pendaftar->no_tps }}</td>
                                <td style="text-align: center;">{{ $finalScores[$penilaian->pendaftar_id] }}</td>
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
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <script>
        console.log($bobotValues);
    </script>

@endsection
