@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->



    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    {{--allert-info --}}
    <div class="alert alert-light" role="alert">
        <img src="{{ asset('img/maskot1.png') }}" style="float: right; margin-left: 10px; width: 100px;">
        Selamat datang <strong>{{ Auth::user()->name }}</strong>, di Sistem Pendukung Keputusan Penentuan Anggota Kelompok Penyelenggara Pemungutran Suara (KPPS)
        Pada Pemilihan Umum Menggunakan Metode <i>Simple Multi Attribute Rating Technique</i> (SMART).
    </div>




    <!-- Content Row -->
    <div class="row">

        <!-- Jumlah Pendaftar Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pendaftar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahPendaftar }} Orang</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Kriteria Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Kriteria</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahKriteria }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Sub Kriteria Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Sub Kriteria
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahSubKriteria }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-sitemap fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Jumlah Pria & Wanita</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <h4 class="h5 mb-0 font-weight-bold text-gray-800" class="mb-0">{{ \App\Models\Pendaftar::where('jk', 'L')->count() }} Laki / {{ \App\Models\Pendaftar::where('jk', 'P')->count() }} Perempuan</h4>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-bell fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- menampilkan jumlah yang sudah dan belum di nilai --}}

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah yang Sudah Dinilai</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sudahDinilai }} Orang</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Jumlah yang Belum Dinilai</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $belumDinilai }} Orang</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Jumlah TPS</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tpsNumbers->count() }} TPS</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


<div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
        </div>

        <!-- Grafik dan Tata Cara Pendaftaran Row -->
    <div class="row">
        <div class="col-xl-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Jumlah Pendaftar Laki-laki dan Perempuan Berdasarkan TPS</h6>
                </div>
                <div class="card-body">
                    <canvas id="pendaftarChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tata Cara Penggunaan Aplikasi</h6>
                </div>
                <div class="card-body">
                    <ol>
                        <li>Login menggunakan user yang sudah di berikan.</li>
                        <li>Tambah Data Kriteria.</li>
                        <li>Tambah Data Sub Kriteria berdasarkan kriteria.</li>
                        <li>Lakukan Penilaian terhadap Alternatif yang sudah melakukan pendaftaran.</li>
                        <li>Lakukan perhitungan dengan mengklik tombol hitung.</li>
                        <li>Lihat Hasil Akhir dari proses perhitungan menggunakan metode SMART, lalu cetak data untuk sebagai laporan.</li>
                        <li>Jika ingin mendownload data pendaftar, pilih menu Data Pendaftar lalu Export.</li>
                        <li>Lakukan ubah password agar tidak terjadi pembobolan.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>


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
    timer: 3000
  });
</script>
@endif

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('pendaftarChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($tpsNumbers),
                datasets: [{
                    label: 'Laki-laki',
                    borderColor: 'green',
                    data: @json($jumlahLaki),
                    fill: false
                }, {
                    label: 'Perempuan',
                    borderColor: 'red',
                    data: @json($jumlahPerempuan),
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Nomor TPS'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Jumlah Pendaftar'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

@endsection


