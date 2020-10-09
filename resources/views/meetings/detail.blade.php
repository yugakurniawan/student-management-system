@extends('layouts.main')

@section('container')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Meeting</h3>
                            <br>
                            <a href="/jadwal/create/{{ $meeting->id }}" class="btn btn-primary">Tambah Jadwal</a>

                            @if (session('status'))
                            <div class="alert alert-success" style="margin-top:20px">
                                {{ session('status') }}
                            </div>
                            @endif

                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Jadwal</th>
                                        <th scope="col">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($meeting->jadwal as $jadwal)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $jadwal->jadwal }}</td>
                                        <td>
                                            <a href="/jadwal/{{ $jadwal->id}}"
                                                class="btn btn-info btn-sm">Detail</a>
                                            <a href="/jadwal/{{ $jadwal->id}}" class="btn btn-danger btn-sm"
                                                onclick="event.preventDefault(); $(this).siblings('form').submit();">Hapus</a>
                                            <form action="/jadwal/{{$jadwal->id}}" method="post">
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


