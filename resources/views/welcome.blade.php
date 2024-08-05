<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="{{ asset('img/KPU_Logo.png.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">

     <!-- Include Owl Carousel CSS and JS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets">


    <title>SPK KPPS | SMART</title>
  </head>
  <body>


    <!-- Navbar -->
    {{-- <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="#">SPK SMART</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link btn btn-primary text-white tombol" href="#">Join Us</a>
          </div>
        </div>
      </div>
    </nav> --}}
    <!-- akhir Navbar -->


        <div class="header-area" id="headerArea" style="background-color: black;">
            <div class="container h-100 d-flex align-items-center justify-content-between">
                <div class="logo-wrapper"><a href="#"><img src="{{ asset('img/logo-home.png') }}" alt=""></a></div>
        </div>
    </div>

      {{-- logo-wrapper --}}
      <div class="logo-wrapper" style="margin-top:0; position: fixed; bottom: 0; right: 0; z-index: 1000;">
        <img src="{{ asset('img/emas.png')}}" alt="" width="120px" height="95px">
</div>


    {{-- membuat slide --}}
    <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            {{-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> --}}
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('img/selamat_datang.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/maskot.jpg') }}" alt="Second slide">
            </div>
            {{-- <div class="carousel-item">
                <img class="d-block w-100" src="gambar3.jpg" alt="Third slide">
            </div> --}}
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>




    <!-- container -->
    <div class="container">

      <!-- info panel -->
      <div class="row justify-content-center">
        <div class="col-10 info-panel">
          <div class="row">
            <div class="col-sm">
              <img src="img/login.png" alt="Employee" class="img-fluid float-left" style="width: 80px;">
              <h4>Daftar Anggota KPPS</h4>
              <p><a href="/pendaftaran"><i class="fas fa-sign-in-alt"></i>Daftar Sekarang!</a></p>
            </div>
            <div class="col-lg">
              <img src="img/verify.png" alt="HiRes" class="img-fluid float-left" style="width: 80px;">
              <h4>Lihat Pengumuman</h4>
              <p><a href="/pendaftar/login"><i class="fas fa-sign-in-alt"></i>Lihat pengumuman</a></p>
            </div>
            <div class="col-lg">
              <img src="img/permission.png" alt="Security" class="img-fluid float-left" style="width: 80px;">
              <h4>Login Petugas PSS</h4>
              <p><a href="/login"><i class="fas fa-sign-in-alt"></i>Login petugas PPS</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
    <!-- akhir container -->


    <footer class="bg-black text-black py-4">
      <div class="container">
        <div class="row">
        <div class="text-center mt-3">
          <p class="text-center">&copy; 2024 Develover by Mahral Kusuma Hadi | STMIK Syaikh Zainuddin NW Anjani.</p>
        </div>
      </div>
    </footer>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
