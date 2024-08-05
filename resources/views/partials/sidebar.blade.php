<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <style>
        #accordionSidebar {
            background: linear-gradient(120deg, #13263C 10%, #3367A2 100%);
        }
    </style>

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-0">
            <img src="{{ asset('img/KPU_Logo.png.png') }}" alt="Logo" style="max-width: 80%; height: auto;">
        </div>
        <div class="sidebar-brand-text mx-3">SPK ANGGOTA KPPS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Metode SMART
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.kriteria.index') }}">
            <i class="fas fa-fw fa-sitemap"></i>
            <span>Data Kriteria</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.subkriteria.index') }}">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Data Sub Kriteria</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.alternatifs.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Alternatif</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.penilaians.index') }}">
            <i class="fas fa-fw fa-edit"></i>
            <span>Data Penilaian</span>
        </a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.perhitungan.view') }}">
            <i class="fas fa-fw fa-calculator"></i>
            <span>Data Perhitungan</span>
        </a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.hasil-akhir.index') }}">
            <i class="fas fa-fw fa-trophy"></i>
            <span>Hasil Akhir</span>
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administrator
    </div>

    <!-- Nav Item - Pendaftar Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pendaftar.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pendaftar</span>
        </a>
    </li>

    <!-- Nav Item - Profile Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.profile.index') }}">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>User Profile</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
