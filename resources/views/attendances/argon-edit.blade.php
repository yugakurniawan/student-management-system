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
                    <form method="POST" action="/meetings/{{ $meeting->id }}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="form-control-label">Nama Meeting</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="{{ $meeting->nama }}">
                            @error('nama') <div class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <div class="form-group row">
                            <label for="student_id" class="form-control-label">Peserta Meeting</label>
                            <select class="form-control js-example-basic-multiple" name="student_id[]"
                                multiple="multiple">
                                @foreach ($students as $item)
                                <option value="{{ $item->id }}" {{ old('student_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('student_id') <div class="invalid-feedback">{{$message}}</div>
                            @enderror
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
