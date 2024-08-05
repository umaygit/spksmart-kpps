@extends('layouts.app')

@section('content')
<div class="container">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @if ($message = session('success'))
    <script>
        Swal.fire('{{ $message }}');
    </script>
    @endif


        <div class="card-header">
            <h2><i class="fas fa-user-circle"></i> User Profile</h2>


    <form action="{{ route('admin.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password Baru:</label>
            <input type="password" id="password" name="password" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password Baru:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control">
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
    </form>
</div>
@endsection
