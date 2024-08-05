@extends('layouts.app')

@section('content')
    <div class="container">

        <h1><i class="fas fa-info-circle"></i> Detail Penilaian</h1>
        <div class="card shadow mb-4" >
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 style="color:black;"><strong>Biodata Pendaftar</strong></h5>
                        <div class="form-group">
                            <div class="card">
                                <div class="card-body" style="background-image: url('{{ asset('img/watermark.png.png') }}'); background-size: 100%; background-position: center; background-repeat: no-repeat;">
                            <label><strong>Nama Pendaftar/Alternatif</strong></label>
                            <p>{{ $penilaian->pendaftar->nik }} - {{ $penilaian->pendaftar->nama_lengkap }}</p>

                        <div class="form-group">
                            <label><strong>No TPS</strong></label>
                            <p>{{ $penilaian->pendaftar->no_tps }}</p>
                                </div>


                        <div class="form-group">
                            <label><strong>Alamat</strong></label>
                            <p>{{ $penilaian->pendaftar->alamat }}</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
                    <div class="col-md-6">
                        <h5 style="color:black;"><strong>Nilai Alternatif</strong></h5>
                        <div class="form-group">
                            <label>Nilai Kriteria Pendidikan (K1) </label>
                            <p>{{ $penilaian->n_k1 }} </p>
                        </div>
                        <div class="form-group">
                            <label>Nilai Kriteria Kesehatan (K2) </label>
                            <p>{{ $penilaian->n_k2 }}</p>
                        </div>
                        <div class="form-group">
                            <label>Nilai Kriteria Usia (K3) </label>
                            <p>{{ $penilaian->n_k3 }}</p>
                        </div>
                        <div class="form-group">
                            <label>Nilai Kriteria Pengalaman (K4) </label>
                            <p>{{ $penilaian->n_k4 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('admin.penilaians.index') }}" class="btn btn-dark" style="float:right;"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
@endsection
