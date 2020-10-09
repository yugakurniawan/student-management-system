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
                            <a href="/meetings/create" class="btn btn-primary">Tambah Meeting</a>

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
                                        <th scope="col">Meeting</th>
                                        <th scope="col">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($meetings as $mtg)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $mtg->nama }}</td>
                                        <td>
                                            <a href="/meetings/{{ $mtg->id}}/detail"
                                                class="btn btn-info btn-sm">Detail</a>
                                            <a href="/meetings/{{ $mtg->id}}" class="btn btn-danger btn-sm"
                                                onclick="event.preventDefault(); $(this).siblings('form').submit();">Hapus</a>
                                            <form action="/meetings/{{$mtg->id}}" method="post">
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
