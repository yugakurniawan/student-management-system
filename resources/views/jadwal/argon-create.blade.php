@extends('layouts.argon-index')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('container')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/jadwal">
                        @csrf
                        <input type="hidden" name="meeting_id" value="{{ $meeting_id }}">
                        <div class="form-group row">
                            <label for="jadwal" class="form-control-label">Jadwal</label>
                            <input type="datetime-local" class="form-control @error('jadwal') is-invalid @enderror"
                                id="jadwal" name="jadwal" value="{{ old('jadwal') }}">
                            @error('jadwal') <div class="invalid-feedback">{{$message}}</div> @enderror
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

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });

</script>
@endpush
