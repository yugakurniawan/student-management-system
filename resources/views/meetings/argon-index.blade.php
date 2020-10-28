@extends('layouts.argon-index')

@section('container')

<div class="row">
    <div class="col">
        <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
                <h3 class="text-white my-3">Data Meeting</h3>
                <a href="/meetings/create" class="btn btn-primary">Tambah Data</a>

                @if (session('status'))
                <div class="alert alert-success" style="margin-top:20px">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-dark table-flush">
                    <thead class="thead-dark">
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
                                <a href="/meetings/{{ $mtg->id}}" class="btn btn-info btn-sm">Detail</a>
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


@endsection
