@extends('layouts.app')

@section('content')

<h2>Data Alternatif</h2>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        {{-- SweetAlert2 Script --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if ($message = session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "{{ $message }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
        @endif

        @if ($message = session('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ $message }}",
                footer: '<a>Tambahkan Alternatif yang lain!!!</a>'
            });
        </script>
        @endif

        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-table"></i> Daftar Tabel Alternatif</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">NIK</th>
                        <th style="text-align: center;">Kode</th>
                        <th style="text-align: center;">Nama Pendaftar</th>
                        <th style="text-align: center;">No TPS</th>
                        <th style="text-align: center;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendaftars as $pendaftar)
                    <tr class="text-center {{ $loop->iteration % 2 == 0 ? 'bg-light' : '' }}">
                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                        <td style="text-align: center;">{{ $pendaftar->nik }}</td>
                        <td style="text-align: center;">A{{ $loop->iteration }}</td>
                        <td style="text-align: left;">{{ $pendaftar->nama_lengkap }}</td>
                        <td style="text-align: center;">{{ $pendaftar->no_tps }}</td>
                        <td style="text-align: center;">
                            @if($pendaftar->sudah_dinilai)
                            <span class="badge bg-success text-white">Sudah Dinilai</span>
                            @else
                            <span class="badge bg-warning text-white">Belum Dinilai</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination links --}}
            <div class="justify-content-center">
                {{ $pendaftars->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
