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

                                <form method="POST" action="/jadwal">
                                    <input type="hidden" name="meeting_id" value="{{ $meeting_id }}">
                                    <div class="form-group row">
                                        <label for="jadwal" class="col-sm-2 col-form-label">Jadwal</label>
                                        <div class="col-sm-6">
                                            <input type="datetime-local" class="form-control @error('jadwal') is-invalid @enderror"
                                                id="jadwal" name="jadwal" value="{{ old('jadwal') }}" >
                                            @error('jadwal') <div class="invalid-feedback">{{$message}}</div> @enderror
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

