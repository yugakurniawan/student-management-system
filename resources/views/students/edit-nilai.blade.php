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
                            <h3 class="mb-0">Perbarui Nilai Siswa</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="/students/{{ $student->id }}/updatenilai" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <h6 class="heading-small text-muted mb-4">Score information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="form-control-label">Nama Mata Pelajaran</label>
                                        <select id="nama" name="nama" class="custom-select custom-select-lg mb-3">
                                            @foreach ($subject as $subject)
                                            <option value="{{ $student->subject->id }}">{{ $subject->nama }}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nilai">Nilai</label>
                                        <input type="number" step="any" name="nilai" id="nilai"
                                            class="form-control @error('nilai') is-invalid @enderror" value="{{ $student->subject->nilai }}">
                                        @error('nilai') <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Description -->
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Perbarui</button>
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
