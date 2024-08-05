@extends('layouts.app')

@section('content')
    {{-- <div class="container"> --}}
        <h2>Data Kriteria</h2>
{{-- @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif --}}

<!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-table"></i> Daftar Tabel Kriteria
            </h6>
            <a href="{{ route('admin.kriteria.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Kriteria</a>
        </div>

    <div class="card-body">


        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Kode Kriteria</th>
                    <th style="text-align: center;">Nama Kriteria</th>
                    <th style="text-align: center;">Bobot</th>
                    <th style="text-align: center;">Jenis Kriteria</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriterias as $key => $item)
                <tr class="text-center {{ $loop->iteration % 2 == 0 ? 'bg-light' : '' }}">
                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                        <td style="text-align: center;">{{ $item->kd_kriteria }}</td>
                        <td style="text-align: left;">{{ $item->nama_kriteria }}</td>
                        <td style="text-align: center;">{{ $item->bobot }}</td>
                        <td style="text-align: center;">{{ $item->j_kriteria }}</td>
                        <td>
                            <div style="text-align: center;">
                                <a href="{{ route('admin.kriteria.edit', $item->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{ route('admin.kriteria.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda ingin menghapus {{ $item->nama_kriteria }}?')"><i class="fa fa-trash"></i> Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @if ($message = session('success'))
    <script>
        Swal.fire({
        // position: "top-end",
        icon: "success",
        title: "{{ $message }}",
        showConfirmButton: false,
        timer: 1500
      });
    </script>
    @endif



@endsection


