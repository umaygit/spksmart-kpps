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
            background: linear-gradient(to right, #13263C, #3367A2);
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


    <title>SPK KPPS - Login Administrator</title>

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


<body class="bg-gradient-primary">
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class="col-5">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <!-- Section for Logo and Titles -->
                            <div class="col-12 d-flex align-items-center gradient-custom-2 justify-content-center">
                                <div style="width: 100%;" class="text-center pl-2 pr-2 mt-6 mb-6">
                                    <img id="logo-kpu" src="{{ asset('img/KPU_Logo.png.png') }}" style="width: 25%;" alt="">
                                    <h5 class="mt-4 text-white">SISTEM PENDUKUNG KEPUTUSAN</h5>
                                    <h5 class="mt-4 text-white">PENENTUAN ANGGOTA KPSS PADA PEMILIHAN UMUM</h5>
                                </div>
                            </div>
                            <!-- Section for Form -->
                            <div class="col-lg-10 offset-lg-1">
                                <div class="card-body p-md-5 mx-md-4">
                                    <form method="post" action="{{ route('login-proses') }}">
                                        @csrf
                                        <div class="text-center"><h3>Silahkan Login Petugas PPS</h3></div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Email</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                <input type="email" class="form-control" placeholder="Masukkan Email" name="email" value="" />
                                            </div>
                                        </div>
                                        @error('email')
                                            <small>{{ $message }}</small>
                                        @enderror
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example22">Password</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                <input type="password" class="form-control" id="myInput" placeholder="Masukkan Password" name="password"/>
                                            </div>
                                        </div>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Login</button>
                                        </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <a href="{{ route('welcome') }}"><i class="fas fa-arrow-left"></i> Kembali ke Halaman Utama</a>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End of Section for Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
@endif

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

