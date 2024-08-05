@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><i class="fas fa-edit"></i> {{ __('Edit Pendaftar') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.pendaftar.update', $pendaftar->id) }}">
                            @csrf
                            @method('PUT')

                            {{-- edit nik --}}
                            <div class="form-group row">
                                <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

                                <div class="col-md-6">
                                    <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ $pendaftar->nik }}" required autocomplete="nik" autofocus>

                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- edit nama --}}
                            <div class="form-group row">
                                <label for="nama_lengkap" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                                <div class="col-md-6">
                                    <input id="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ $pendaftar->nama_lengkap }}" required autocomplete="nama_lengkap" autofocus>

                                    @error('nama_lengkap')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- edit tempat lahir --}}
                            <div class="form-group row">
                                <label for="t_lhr" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Lahir') }}</label>

                                <div class="col-md-6">
                                    <input id="t_lhr" type="text" class="form-control @error('t_lhr') is-invalid @enderror" name="t_lhr" value="{{ $pendaftar->t_lhr }}" required autocomplete="t_lhr" autofocus>

                                    @error('t_lhr')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- edit tanggal lahir --}}
                            <div class="form-group row">
                                <label for="tgl_lhr" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                                <div class="col-md-6">
                                    <input id="tgl_lhr" type="text" class="form-control @error('tgl_lhr') is-invalid @enderror" name="tgl_lhr" value="{{ $pendaftar->tgl_lhr }}" required autocomplete="tgl_lhr" autofocus>

                                    @error('tgl_lhr')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- edit jeni kelamin --}}
                            <div class="form-group row">
                                <label for="jk" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                                <div class="col-md-6">
                                    <select id="jk" class="form-control @error('jk') is-invalid @enderror" name="jk" required autocomplete="jk" autofocus>
                                        <option value="L" @if($pendaftar->jk == 'L') selected @endif>L</option>
                                        <option value="P" @if($pendaftar->jk == 'P') selected @endif>P</option>
                                    </select>

                                    @error('jk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- edit pekerjaan --}}
                            <div class="form-group row">
                                <label for="pekerjaan" class="col-md-4 col-form-label text-md-right">{{ __('Pekerjaan') }}</label>

                                <div class="col-md-6">
                                    <input id="pekerjaan" type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" value="{{ $pendaftar->pekerjaan }}" required autocomplete="pekerjaan" autofocus>

                                    @error('pekerjaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- edit usia --}}
                            <div class="form-group row">
                                <label for="usia" class="col-md-4 col-form-label text-md-right">{{ __('Usia') }}</label>

                                <div class="col-md-6">
                                    <input id="usia" type="text" class="form-control @error('usia') is-invalid @enderror" name="usia" value="{{ $pendaftar->usia }}" required autocomplete="usia" autofocus>

                                    @error('usia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- edit pd_terakhir --}}
                            <div class="form-group row">
                                <label for="pd_terakhir" class="col-md-4 col-form-label text-md-right">{{ __('Pendidikan Terakhir') }}</label>

                                <div class="col-md-6">
                                    <select id="pd_terakhir" class="form-control @error('pd_terakhir') is-invalid @enderror" name="pd_terakhir" required autocomplete="pd_terakhir" autofocus>
                                        <option value="SMA" @if($pendaftar->pd_terakhir == 'SMA') selected @endif>SMA</option>
                                        <option value="Diploma" @if($pendaftar->pd_terakhir == 'Diploma') selected @endif>D3</option>
                                        <option value="S1" @if($pendaftar->pd_terakhir == 'S1') selected @endif>S1</option>
                                        <option value="S2" @if($pendaftar->pd_terakhir == 'S2') selected @endif>S2</option>
                                        <option value="S3" @if($pendaftar->pd_terakhir == 'S3') selected @endif>S3</option>
                                    </select>

                                    @error('pd_terakhir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- edit alamat --}}
                            <div class="form-group row">
                                <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                                <div class="col-md-6">
                                    <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $pendaftar->alamat }}" required autocomplete="alamat" autofocus>

                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- edit no_tps --}}
                            <div class="form-group row">
                                <label for="no_tps" class="col-md-4 col-form-label text-md-right">{{ __('Nomor TPS') }}</label>

                                <div class="col-md-6">
                                    <input id="no_tps" type="text" class="form-control @error('no_tps') is-invalid @enderror" name="no_tps" value="{{ $pendaftar->no_tps }}" required autocomplete="no_tps" autofocus>

                                    @error('no_tps')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> {{ __('Update') }}
                                    </button>
                                    <a href="{{ route('admin.pendaftar.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


