<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <style>
        .gradient-custom-2 {
            background: linear-gradient(to right, #3367A2, #13263C);
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>

    <title>Halaman Kelulusan</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="https://siakba.kpu.go.id/template/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="https://siakba.kpu.go.id/template/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>

<body class="bg-gradient">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/KPU_Logo.png.png') }}" alt="Logo" style="width: 40px;">
                SISTEM PENDUKUNG KEPUTUSAN PENENTUAN ANGGOTA KPSS
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <form action="{{ route('pendaftar.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm bg-warning text-black">
                            <i class="fas fa-sign-out-alt text-black"></i> Logout
                        </button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
                        <div class="text-center">
                            <h1>PENGUMUMAN HASIL SELEKSI</h1>
                            <h6>ANGGOTA KPPS PADA PEMILIHAN UMUM</h6>
                        </div>

                        <div class="card-body shadow">
                            @if(isset($pendaftars) && count($pendaftars) > 0)
                                @foreach($pendaftars as $pendaftar)
                                    @php
                                        $score = $finalScores[$pendaftar->id] ?? 'Tidak Ada Nilai';
                                    @endphp
                                    <div class="form-group">
                                        <div class="card">
                                            <div class="card-body" style="background-image: url('{{ asset('img/watermark.png.png') }}'); background-size: 100%; background-position: center; background-repeat: no-repeat;">
                                                <label><strong>Nama Pendaftar</strong></label>
                                                <p>{{ $pendaftar->nik }} - {{ $pendaftar->nama_lengkap }}</p>

                                                <div class="form-group">
                                                    <label><strong>No TPS</strong></label>
                                                    <p>{{ $pendaftar->no_tps }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label><strong>Alamat</strong></label>
                                                    <p>{{ $pendaftar->alamat }}</p>
                                                </div>

                                                {{-- cek status kelulusan --}}
                                                <div class="form-group">
                                                    <label><strong>Keterangan Kelulusan</strong></label>
                                                    @if(isset($finalScores[$pendaftar->id]))
                                                        @if($finalScores[$pendaftar->id] >= 60)
                                                            <span class="badge bg-success text-white">SELAMAT ANDA DINYATAKAN TERPILIH</span>
                                                        @elseif($finalScores[$pendaftar->id] >= 40)
                                                            <span class="badge bg-danger text-white">MOHON MAAF ANDA SEBAGAI PENGGANTI</span>
                                                        @else
                                                            <span class="badge bg-danger text-white">MOHON MAAF ANDA TIDAK TERPILIH</span>
                                                        @endif
                                                    @else
                                                        <span class="badge bg-danger text-white">MOHON MAAF ANDA BELUM DINILAI</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="form-group text-center">
                                            <a href="{{ route('pengumuman-export.cetakpengumuman') }}" class="btn btn-primary"><i class="fas fa-download"></i> Download Berita Acara</a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center">Tidak ada data pendaftar.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>

</html>
