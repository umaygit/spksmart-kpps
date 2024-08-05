<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Anggota KPPS</title>

    <style>
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #3367A2;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to bottom, #3367A2, #13263C);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to bottom, #3367A2, #13263C);
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
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    {{-- <link rel="shortcut icon" href="https://siakba.kpu.go.id/template/media/logos/favicon.ico" /> --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="https://siakba.kpu.go.id/template/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="https://siakba.kpu.go.id/template/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <!-- Favicon -->
    <link href="{{ asset('img/KPU_Logo.png.png') }}" rel="icon" type="image/png">

</head>
<body>
<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100"> <!-- Ini adalah container yang memiliki padding atas dan bawah 5 dan tinggi 100% -->
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-sm-12 col-12"> <!-- Ubah ukuran kolom untuk melebarkan tempat form -->
                <div class="card mb-5 mb-xl-12"> <!-- Ini adalah container kartu yang memiliki margin bawah 5 pada ukuran layar kecil dan 10 pada ukuran layar besar -->
                    <div class="row g-0"> <!-- Membuat baris tanpa gutter (jarak antar kolom) -->

                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div style="width: 100%;" class="text-center pl-2 pr-2">
                                <img src="{{ asset('img/KPU_Logo.png.png') }}" style="width: 30%" alt="">
                                <h5 class="mt-4 text-white">SISTEM PENDUKUNG KEPUTUSAN PENENTUAN</h5>
                                <h2 class="mt-4 text-white">ANGGOTA KPPS PADA PEMILIHAN UMUM</h2>
                                <p class="mt-4 text-white">Menggunakan Metode Simple Multi Attribute Rating Technique (SMART)</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="post" action="{{ route('pendaftaran') }}" enctype="multipart/form-data">
                                    @csrf
                                   <div class="row">
                                    <div class="mb-10 text-center ">
                                        <h1 class="text-dark mb-3">Daftar Anggota KPPS</h1>
                                        <div class="text-gray-400 fw-bold fs-4">Sudah memiliki akun?
                                            <a href="{{ route('pendaftar.login') }}" class="link-primary fw-bolder">Login disini</a>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-bolder text-dark fs-6">Jenis Nomor Identitas</label>
                                        <select name="j_nik" class="form-select form-select-solid" value="{{ old('j_nik') }}">
                                            <option value=""></option>
                                            <option value="NIK">NIK (KTP)</option>
                                            <option value="PASPORT">No Paspor</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-bolder text-dark fs-6">Nomor Induk Kependudukan</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="nik" value="{{ old('nik') }}" />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-bolder text-dark fs-6">Nama Lengkap</label>
                                        <input type="text" class="form-control form-control-solid" name="nama_lengkap" value="{{ old('nama_lengkap') }}" />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-bolder text-dark fs-6">Tempat Lahir</label>
                                        <input type="text" class="form-control form-control-solid" name="t_lhr" value="{{ old('t_lhr') }}" />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-bolder text-dark fs-6">Tanggal Lahir</label>
                                        <input type="date" class="form-control form-control-solid" name="tgl_lhr" value="{{ old('tgl_lhr') }}" />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-bolder text-dark fs-6">Jenis Kelamin</label>
                                        <select name="jk" class="form-select form-select-solid" value="{{ old('jk') }}">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L" @if(old('jk') == 'L') selected @endif>Laki-laki</option>
                                            <option value="P" @if(old('jk') == 'P') selected @endif>Perempuan</option>
                                        </select>
                                        @error('jk')
                                        <div>{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-bolder text-dark fs-6">Pekerjaan</label>
                                        <input type="text" class="form-control form-control-solid" name="pekerjaan" value="{{ old('pekerjaan') }}" />
                                        @error('pekerjaan')
                                        <div>{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-bolder text-dark fs-6">Usia</label>
                                        <input type="number" class="form-control form-control-solid" name="usia" value="{{ old('usia') }}" />
                                        @error('usia')
                                        <div>{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-bolder text-dark fs-6">Pendidikan Terakhir</label>
                                        <select name="pd_terakhir" class="form-select form-select-solid" value="{{ old('pd_terakhir') }}">
                                            <option value="">Pilih Pendidikan Terakhir</option>
                                            <option value="SMA/SMK">SMA/SMK</option>
                                            <option value="Diploma">Diploma</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                        @error('pd_terakhir')
                                        <div>{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-bolder text-dark fs-6">Nomor TPS</label>
                                        <input type="number" class="form-control form-control-solid" name="no_tps" value="{{ old('no_tps') }}">
                                        @error('no_tps')
                                        <div>{{ $message }}</div>
                                    @enderror
                                    </div>
                                    {{-- <div class="col-6 mb-3">
                                        <label class="form-label fw-bolder text-dark fs-6">Unggah Berkas Ijazah</label>
                                        <input type="file" class="form-control form-control-solid" name="br_ijazah" accept=".pdf, .doc, .docx, .jpg, .png" />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label fw-bolder text-dark fs-6">Unggah Berkas Kesehatan</label>
                                        <input type="file" class="form-control form-control-solid" name="br_kshtn" accept=".pdf, .doc, .docx, .jpg, .png" />
                                    </div> --}}
                                </div>
                                    <div class="fv-row mb-3">
                                        <label class="form-label fw-bolder text-dark fs-6">Alamat Lengkap</label>
                                        <textarea class="form-control form-control-solid" name="alamat" rows="3">{{ old('alamat') }}</textarea>
                                    </div>
                                    <div class="fv-row mb-3">
                                        <label class="form-label fw-bolder text-dark fs-6">Email</label>
                                        <input type="email" class="form-control form-control-solid" name="email" value="{{ old('email') }}" />
                                    </div>
                                    <div class="fv-row mb-3">
                                        <label class="form-label fw-bolder text-dark fs-6">Password</label>
                                        <div class="position-relative mb-3">
                                            <input type="password" class="form-control form-control-solid" name="password"  value="{{ old('password') }}" />
                                        @error('password_confirmation')
                                            <div>{{ $message }}</div>
                                        @enderror
                                        </div>
                                    <div class="fv-row mb-3">
                                        <label class="form-label fw-bolder text-dark fs-6">Konfirmasi Password</label>
                                        <div class="position-relative mb-3">
                                            <input type="password" class="form-control form-control-solid" name="password_confirmation" value="{{ old('password_confirmation') }}" />
                                            @error('password_confirmation')
                                          <div>{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>


                                    <!--begin::Input group-->
                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" style="width: 100%" type="submit">
                                            Kirim
                                        </button>
                                    </div>
                                    <!--end::Input group-->

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <a href="{{ route('welcome') }}"><i class="fas fa-arrow-left"></i> Kembali ke Halaman Utama</a>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
 <!-- Bootstrap core JavaScript-->
 <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('template/') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

 <!-- Page level plugins -->
 <script src="{{ asset('template/vendor/chart.js/Chart.min.js') }}"></script>

 <!-- Page level custom scripts -->
 <script src="{{ asset('template/js/demo/chart-area-demo.js') }}"></script>
 <script src="{{ asset('template/js/demo/chart-pie-demo.js') }}"></script>

 <script>
    var hostUrl = "https://siakba.kpu.go.id/template";
</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="https://siakba.kpu.go.id/template/plugins/global/plugins.bundle.js"></script>
<script src="https://siakba.kpu.go.id/template/js/scripts.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<script src="https://siakba.kpu.go.id/template/js/widgets.bundle.js"></script>
<script src="https://siakba.kpu.go.id/js/auth/register.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
