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
                            <form method="POST" action="/students/{{ $student->id }}">
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
                                    <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="angkatan" name="angkatan"
                                            value="{{ $student->angkatan }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="/students" class="btn btn-warning">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @endsection

                    @section('container1')

                    <div class="container">
                        <div class="row">
                            <div class="col-6">

                                <form method="POST" action="/students/{{ $student->id }}">
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
                                        <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="angkatan" name="angkatan"
                                                value="{{ $student->angkatan }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="/students" class="btn btn-info">Kembali</a>
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
