@extends('layouts.main')

@section('container')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">

                                <form method="POST" action="/students">
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ old('nama') }}">
                                            @error('nama') <div class="invalid-feedback">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="universitas" class="col-sm-2 col-form-label">Universitas</label>
                                        <div class="col-sm-6">
                                            <input type="text"
                                                class="form-control @error('universitas') is-invalid @enderror"
                                                id="universitas" name="universitas" value="{{ old('universitas') }}">
                                            @error('universitas') <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                                        <div class="col-sm-6">
                                            <input type="text"
                                                class="form-control @error('fakultas') is-invalid @enderror"
                                                id="fakultas" name="fakultas" value="{{ old('fakultas') }}">
                                            @error('fakultas') <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                        <div class="col-sm-6">
                                            <input type="text"
                                                class="form-control @error('jurusan') is-invalid @enderror" id="jurusan"
                                                name="jurusan" value="{{ old('jurusan') }}">
                                            @error('jurusan') <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control @error('prodi') is-invalid @enderror"
                                                id="prodi" name="prodi" value="{{ old('prodi') }}">
                                            @error('prodi') <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
                                        <div class="col-sm-6">
                                            <input type="text"
                                                class="form-control @error('angkatan') is-invalid @enderror"
                                                id="angkatan" name="angkatan" value="{{ old('angkatan') }}">
                                            @error('angkatan') <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-6">
                                            <input type="text"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                            @error('tempat_lahir') <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-6">
                                            <input type="date"
                                                class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                                            @error('tgl_lahir') <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-6">
                                            <input type="text"
                                                class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                                name="alamat" value="{{ old('alamat') }}">
                                            @error('alamat') <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="telp" class="col-sm-2 col-form-label">Telp</label>
                                        <div class="col-sm-6">
                                            <input type="number"
                                                class="form-control @error('telp') is-invalid @enderror" id="telp"
                                                name="telp" value="{{ old('telp') }}">
                                            @error('telp') <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                            <a href="/students" class="btn btn-warning">Kembali</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
