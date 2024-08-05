@extends('layouts.app')

@section('content')

        <div class="card">
            <div class="card-header">
                <h2>Data Pendaftar Anggota KPPS</h2>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-table"></i> Daftar Tabel Pendaftar
                    </h6>
                        <a href="{{ route('admin.pendaftar.exportexcel') }}" class="btn btn-success"><i class="fas fa-file-excel"></i> Ekspor Excel</a>
                </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                {{-- <th style="text-align: center;">Jenis Nomor Identitas</th> --}}
                                <th style="text-align: center;">NIK</th>
                                <th style="text-align: center;">Nama Lengkap</th>
                                <th style="text-align: center;">Tempat Lahir</th>
                                <th style="text-align: center;">Tanggal Lahir</th>
                                <th style="text-align: center;">Jenis Kelamin</th>
                                <th style="text-align: center;">Pekerjaan</th>
                                <th style="text-align: center;">Usia</th>
                                <th style="text-align: center;">Pendidikan Terakhir</th>
                                {{-- <th style="text-align: center;">Berkas Ijazah</th>
                                <th style="text-align: center;">Berkas Kesehatan</th> --}}
                                <th style="text-align: center;">Alamat</th>
                                <th style="text-align: center;">Nomor TPS</th>
                                <th style="text-align: center;">Aksi</th>
                                <th style="text-align: center;"></th>
                                <!-- Tambahkan kolom lain sesuai kebutuhan -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendaftars as $pendaftar)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    {{-- <td>{{ $pendaftar->j_nik }}</td> --}}
                                    <td>{{ $pendaftar->nik }}</td>
                                    <td>{{ $pendaftar->nama_lengkap }}</td>
                                    <td>{{ $pendaftar->t_lhr }}</td>
                                    <td>{{ $pendaftar->tgl_lhr }}</td>
                                    <td style="text-align: center;">{{ $pendaftar->jk }}</td>
                                    <td>{{ $pendaftar->pekerjaan }}</td>
                                    <td style="text-align: center;">{{ $pendaftar->usia }}</td>
                                    <td>{{ $pendaftar->pd_terakhir }}</td>
                                    {{-- <td><a href="{{ asset('storage/berkas/ijazah/' . $pendaftar->br_ijazah) }}" target="_blank"><i class="fas fa-file-alt"></i> Lihat Ijazah</a></td>
                                    <td><a href="{{ asset('storage/berkas/kesehatan/' . $pendaftar->br_kshtn) }}" target="_blank"><i class="fas fa-file-medical"></i> Lihat Kesehatan</a></td> --}}
                                    <td>{{ $pendaftar->alamat }}</td>
                                    <td style="text-align: center;">{{ $pendaftar->no_tps }}</td>
                                    <td style="text-align: center;">
                                        <form action="{{ route('admin.pendaftar.destroy', $pendaftar->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $pendaftar->nama_lengkap }}?')"><i class="fa fa-trash"></i> Hapus</button>
                                        </form>
                                    <td style="text-align: center;">
                                        <a href="{{ route('admin.pendaftar.edit', $pendaftar->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                    </td>
                                    </td>
                                    {{-- <td>{{ $pendaftar->email }}</td> --}}

                                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
