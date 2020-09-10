@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row">
        <div class="col mt-3">

            <h1> Data Mahasiswa </h1>

            <form class="mt-3">

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{ $students->nama }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Universitas</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{ $students->universitas }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Angkatan</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{ $students->angkatan }}">
                    </div>
                </div>

                <a href="/students/" class="btn btn-success">selesai</a>
                <a href="/students" class="btn btn-info">kembali</a>

            </form>
        </div>
    </div>
</div>
@endsection
