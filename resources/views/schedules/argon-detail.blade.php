@extends('layouts.argon-index')

@section('container')
<div class="row">
    <div class="col">
        <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
                <h3 class="text-white my-3">Jadwal Kehadiran</h3>

                @if (session('status'))
                <div class="alert alert-success" style="margin-top:20px">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-dark table-flush">
                    <form action="{{ route('presence.update',$schedule->id) }}" method="post">
                        @csrf @method('patch')
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedule->presence as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->attendance_student->student->nama }}</td>
                                    <td>
                                        <input type="hidden" name="status[]" value="{{ $item->status }}">
                                        <input type="checkbox" value="1" {{ $item->status == 1 ? 'checked': '' }}>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center my-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/attendances/{{ $schedule->attendance_id }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script>
    $(document).ready(function () {
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
