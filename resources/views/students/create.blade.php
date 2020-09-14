@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row">
        <div class="col-6">

            <form method="POST" action="/students">
                @csrf
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                        @error('nama') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="universitas" class="col-sm-2 col-form-label">Universitas</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('universitas') is-invalid @enderror" id="universitas" name="universitas" value="{{ old('universitas') }}">
                        @error('universitas') <div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control @error('angkatan') is-invalid @enderror" id="angkatan" name="angkatan" value="{{ old('angkatan') }}">
                        @error('angkatan') <div class="invalid-feedback">{{$message}}</div> @enderror
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

@endsection
