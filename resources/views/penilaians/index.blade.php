@extends('layouts.app')

@section('content')

<h2>Data Penilaian</h2>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-table"></i> Daftar Tabel Penilaian
                </h6>
                <div>
                    <a href="{{ route('admin.penilaians.create') }}" class="btn btn-success mr-2"><i class="fas fa-plus"></i> Tambah Nilai</a>
                    <a href="{{ route('admin.perhitungan.calculate') }}" class="btn btn-primary" onclick="return confirm('LAKUKAN PENILAIAN SEKARANG!!!')"><i class="fas fa-calculator"></i> Hitung</a>
                </div>
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

    @if ($message = session('error'))
    <script>

        Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "{{ $message }}",
      });
    </script>
    @endif



        <div class="card-body">


            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Kode</th>
                        <th style="text-align: center;">Nama Alternatif</th>
                        <th style="text-align: center;">K1</th>
                        <th style="text-align: center;">K2</th>
                        <th style="text-align: center;">K3</th>
                        <th style="text-align: center;">K4</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penilaians as $key => $penilaian)
                        <tr class="text-center {{ $loop->iteration % 2 == 0 ? 'bg-light' : '' }}">
                            <td style="text-align: center;">{{ $key + 1 }}</td>
                            <td style="text-align: center;">A{{ $key + 1 }}</td>
                            <td style="text-align: left;">{{ $penilaian->pendaftar->nama_lengkap }}</td>
                            </td>
                            <td style="text-align: center;">{{ $penilaian->n_k1 }}</td>
                            <td style="text-align: center;">{{ $penilaian->n_k2 }}</td>
                            <td style="text-align: center;">{{ $penilaian->n_k3 }}</td>
                            <td style="text-align: center;">{{ $penilaian->n_k4 }}</td>
                            <td style="text-align: center;">
                                <a href="{{ route('admin.penilaians.show', $penilaian->id) }}" class="btn btn-info"><i class="fa fa-eye"></i> Lihat</a>
                                <a href="{{ route('admin.penilaians.edit', $penilaian->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{ route('admin.penilaians.destroy', $penilaian->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus penilaian {{ $penilaian->pendaftar->nama_lengkap }}?')"><i class="fa fa-trash"></i> Hapus</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

