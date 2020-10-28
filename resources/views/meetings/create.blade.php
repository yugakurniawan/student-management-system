@extends('layouts.main')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

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
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama Meeting</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ old('nama') }}">
                                            @error('nama') <div class="invalid-feedback">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="student_id" class="col-sm-2 col-form-label">Peserta Meeting</label>
                                        <div class="col-sm-6">
                                            <select class="form-control js-example-basic-multiple" name="student_id[]" multiple="multiple">
                                                @foreach ($students as $item)
                                                    <option value="{{ $item->id }}" {{ old('student_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                @endforeach
                                              </select>
                                            @error('student_id') <div class="invalid-feedback">{{$message}}</div>
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endpush

