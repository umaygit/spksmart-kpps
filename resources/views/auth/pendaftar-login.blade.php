<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{{ asset('img/KPU_Logo.png.png') }}">

    <style>
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #fccb90;

            Chrome 10-25, Safari 5.1-6
            background: -webkit-linear-gradient(to right, #3367A2, #13263C);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
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

        #logo-kpu {
            animation: swing 4s ease-in-out infinite;
        }

        @keyframes swing {
            0% { transform: rotate(0deg); }
            25% { transform: rotate(15deg); }
            50% { transform: rotate(0deg); }
            75% { transform: rotate(-15deg); }
            100% { transform: rotate(0deg); }
        }
    </style>


    <title>SPK KPPS - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}">
                            <i class="btn btn-sm bg-warning text-black">Home</i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<body class="bg-gradient">
<section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">

                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div style="width: 100%;" class="text-center pl-2 pr-2">
                        <img id="logo-kpu" src="{{ asset('img/KPU_Logo.png.png') }}" style="width: 30%;" alt="">
                        {{-- <h5 class="mt-4 text-white">SISTEM PENDUKUNG KEPUTUSAN</h5>
                        <h5 class="mt-4 text-white">PENENTUAN ANGGOTA KPPS PADA PEMILIHAN UMUM</h5> --}}
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">

                        <form method="POST" action="{{ route('pendaftar.login.proses') }}">
                       @csrf

                        <div class="text-center"><h3>Silahkan Login </h3></div>
                        <p class="text-center">Untuk bisa melihat pengumuman!</p>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example11"><i></i> NIK</label>
                          <input type="nik"  class="form-control"
                            placeholder="Masukkan nik" name="nik" value="" /></div>
                        @error('nik')
                            <small>{{ $message }}</small>
                        @enderror
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example22">Password</label>
                          <input type="password"  class="form-control" id="myInput" placeholder="Masukkan Password" name="password"/></div>

                          @error('password')
                            <small>{{ $message }}</small>
                        @enderror

                        <div class="text-center pt-1 mb-5 pb-1">
                            <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Login</button>
                        {{-- <a href="{{ route('dashboard') }}" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Login</a> --}}

                        </div>
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">Belum memiliki akun? Silahkan buat akun <a href="{{ route('pendaftar.create') }}">di sini</a></p>
                         <br>

                        </div>

                    </div>

        </div>
            <table>
                <tr>
                    <td >&copy; Skripsi By - Mahral Kusuma Hadi | STMIK Syaikh Zainuddin NW Anjani</td>

                </tr>
            </table>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{--
    @if ($message = session('success'))
    <script>
        Swal.fire({
        // position: "top-end",
        icon: "success",
        title: "{{ $message }}",
        showConfirmButton: false,
        timer: 2500
    });
    </script>
    @endif  --}}

    @if ($message = session('failed'))
    <script>
        Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "{{ $message }}!",
        footer: 'Masukkan email dan password yang benar!'
        });
    </script>
    @endif



</body>

</html>

