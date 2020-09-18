@extends('layouts.main')

@section('container')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Mahasiswa</h3>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="/students/{{ $student->id }}" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="{{ $student->nama }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="universitas" class="col-sm-2 col-form-label">Universitas</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="universitas" name="universitas"
                                            value="{{ $student->universitas }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="fakultas" name="fakultas"
                                            value="{{ $student->fakultas }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jurusan" name="jurusan"
                                            value="{{ $student->jurusan }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="prodi" name="prodi"
                                            value="{{ $student->prodi }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="angkatan" name="angkatan"
                                            value="{{ $student->angkatan }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="alamat" name="alamat"
                                            value="{{ $student->alamat }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="telp" class="col-sm-2 col-form-label">Telp</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="telp" name="telp"
                                            value="{{ $student->telp }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="avatar" name="avatar"
                                            value="{{ $student->avatar }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="/students/{{$student->id}}/profile" class="btn btn-warning">Kembali</a>
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
@endsection
