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

                                <form method="POST" action="/meetings">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama Meeting</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ old('nama') }}">
                                            @error('nama') <div class="invalid-feedback">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="peserta" class="col-sm-2 col-form-label">Peserta Meeting</label>
                                        <div class="col-sm-6">
                                            <input type="text"
                                                class="form-control @error('peserta') is-invalid @enderror"
                                                id="peserta" name="peserta" value="{{ old('peserta') }}">
                                            @error('peserta') <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                            <a href="/meetings" class="btn btn-warning">Kembali</a>
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
