@extends('layouts.argon-index')

@section('container')

<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Tambah Mahasiswa </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="/students">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nisn" class="form-control-label">NISN</label>
                                        <input type="text" class="form-control @error('nisn') is-invalid @enderror"
                                            id="nisn" name="nisn" value="{{ old('nisn') }}"
                                            placeholder="1714321006">
                                        @error('nisn') <div class="invalid-feedback">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nama" class="form-control-label">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" value="{{ old('nama') }}"
                                            placeholder="Yuga Kurniawan">
                                        @error('nama') <div class="invalid-feedback">{{$message}}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="agama" class="form-control-label">Agama</label>
                                        <input type="text" class="form-control @error('agama') is-invalid @enderror"
                                            id="agama" name="agama" value="{{ old('agama') }}"
                                            placeholder="Islam">
                                        @error('agama') <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                                        <input type="text"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                            placeholder="Jember">
                                        @error('tempat_lahir') <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tgl_lahir" class="form-control-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                            id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                                            placeholder="10/07/1997">
                                        @error('tgl_lahir') <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">Contact information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}"
                                            placeholder="yugakurniawan@yahoo.com">
                                        @error('email') <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="telp" class="form-control-label">Telp</label>
                                        <input type="number" class="form-control @error('telp') is-invalid @enderror"
                                            id="telp" name="telp" value="{{ old('telp') }}" placeholder="089506585454">
                                        @error('telp') <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat" class="form-control-label">Alamat</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                            id="alamat" name="alamat" value="{{ old('alamat') }}"
                                            placeholder="Jln. Ketapang Suko VA">
                                        @error('alamat') <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ayah" class="form-control-label">Nama Ayah</label>
                                        <input type="text"
                                            class="form-control @error('ayah') is-invalid @enderror"
                                            id="ayah" name="ayah" value="{{ old('ayah') }}"
                                            placeholder="Nama Ayah">
                                        @error('ayah') <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pekerjaan_ayah" class="form-control-label">Pekerjaan Ayah</label>
                                        <input type="text"
                                            class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                            id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}"
                                            placeholder="Boleh dikosongi bilang tidak ada">
                                        @error('pekerjaan_ayah') <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ibu" class="form-control-label">Nama Ibu</label>
                                        <input type="text"
                                            class="form-control @error('ibu') is-invalid @enderror"
                                            id="ibu" name="ibu" value="{{ old('ibu') }}"
                                            placeholder="Nama Ibu">
                                        @error('ibu') <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pekerjaan_ibu" class="form-control-label">Pekerjaan Ibu</label>
                                        <input type="text"
                                            class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                            id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}"
                                            placeholder="Boleh dikosongi bilang tidak ada">
                                        @error('pekerjaan_ibu') <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="status_ortu" class="form-control-label">Status Orang Tua</label>
                                        <select class="form-control" id="status_ortu" name="status_ortu">
                                            <option value="Lengkap">Lengkap</option>
                                            <option value="Yatim">Yatim</option>
                                            <option value="Piatu">Piatu</option>
                                            <option value="Yatim Piatu">Yatim Piatu</option>
                                            <option value="Cerai">Cerai</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Description -->
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

@endsection
