@extends('layouts.app')

@section('content')

<h2>Data Sub Kriteria</h2>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @if ($message = session('success'))
    <script>
        Swal.fire('{{ $message }}');
    </script>
    @endif


        <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table"></i> Daftar Tabel Sub Kriteria
            </h6>
        <a href="{{ route('admin.subkriteria.create') }}" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Tambah Sub Kriteria</a>
        </div>


        <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="text-center">
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Kode Kriteria</th>
                    <th style="text-align: center;">Nama Kriteria</th>
                    <th style="text-align: center;">Nama Sub Kriteria</th>
                    <th style="text-align: center;">Nilai</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subkriterias as $key => $subkriteria)
                    <tr class="text-center {{ $loop->iteration % 2 == 0 ? 'bg-light' : '' }}">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $subkriteria->kriteria->kd_kriteria }}</td>
                        <td class="text-center">{{ $subkriteria->kriteria->nama_kriteria }}</td>
                        <td class="text-left">{{ $subkriteria->nama_sub_kriteria }}</td>
                        <td class="text-center">{{ $subkriteria->nilai }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.subkriteria.edit', $subkriteria->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.subkriteria.destroy', $subkriteria->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda ingin menghapus {{ $subkriteria->nama_sub_kriteria }} kriteria dari {{ $subkriteria->kriteria->nama_kriteria }} ?')"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
