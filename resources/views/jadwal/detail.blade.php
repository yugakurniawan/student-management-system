@extends('layouts.main')

@section('container')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Jadwal Kehadiran</h3>
                            <br>
                            @if (session('status'))
                            <div class="alert alert-success" style="margin-top:20px">
                                {{ session('status') }}
                            </div>
                            @endif
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('kehadiran.update',$jadwal->id) }}" method="post">
                                @csrf @method('patch')
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nama Mahasiswa</th>
                                            <th scope="col">aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jadwal->kehadiran as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->meeting_student->student->nama }}</td>
                                                <td>
                                                    <input type="hidden" name="status[]" value="{{ $item->status }}">
                                                    <input type="checkbox" value="1" {{ $item->status == 1 ? 'checked': '' }} >
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/meetings/{{ $jadwal->meeting_id }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script>
$(document).ready(function (){
    $("input:checkbox").change(function () {
        if ($(this).prop('checked')) {
            $(this).siblings('[name="status[]"]').val(1);
        } else {
            $(this).siblings('[name="status[]"]').val(0);
        }
    });
});
</script>
@endpush
