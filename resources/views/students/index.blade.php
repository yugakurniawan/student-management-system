@extends('layouts.main')

@section('container')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Beasiswa</h3>
                            <br>
                            <a href="/students/create" class="btn btn-primary">Tambah Data</a>

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
                                        <th scope="col">Nama</th>
                                        <th scope="col">Universitas</th>
                                        <th scope="col">Angkatan</th>
                                        <th scope="col">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><a href="/students/{{ $student->id}}/profile">{{ $student->nama}}</a></td>
                                        <td>{{ $student->universitas}}</td>
                                        <td>{{ $student->angkatan}}</td>
                                        <td>
                                            <a href="/students/{{ $student->id}}" class="btn btn-info btn-sm">Detail</a>
                                            <a href="/students/{{ $student->id}}" class="btn btn-danger btn-sm"
                                                onclick="event.preventDefault(); $(this).siblings('form').submit();">Hapus</a>
                                            <form action="/students/{{$student->id}}" method="post">
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

                    @endsection

                    @section('container1')

                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h1> Data Mahasiswa </h1>

                                <a href="/students/create" class="btn btn-primary my-3">Tambah Data</a>

                                @if (session('status'))
                                <div class="alert alert-success" style="margin-top:20px">
                                    {{ session('status') }}
                                </div>
                                @endif

                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Universitas</th>
                                            <th scope="col">Angkatan</th>
                                            <th scope="col">aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $student->nama}}</td>
                                            <td>{{ $student->universitas}}</td>
                                            <td>{{ $student->angkatan}}</td>
                                            <td>
                                                <a href="/students/{{ $student->id}}"
                                                    class="btn btn-info btn-sm">Detail</a>
                                                <a href="/students/{{ $student->id}}" class="btn btn-danger btn-sm"
                                                    onclick="event.preventDefault(); $(this).siblings('form').submit();">Hapus</a>
                                                <form action="/students/{{$student->id}}" method="post">
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


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="/create" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input name="nama" type="text" class="form-control" id="nama"
                                                    placeholder="Nama">
                                            </div>

                                            <div class="form-group">
                                                <label for="universitas">Universitas</label>
                                                <input name="universitas" type="text" class="form-control"
                                                    id="universitas" placeholder="Universitas">
                                            </div>

                                            <div class="form-group">
                                                <label for="telp">Telp</label>
                                                <input name="telp" type="text" class="form-control" id="telp"
                                                    placeholder="Telp">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Alamat</label>
                                                <textarea name="alamat" class="form-control"
                                                    id="exampleFormControlTextarea1" rows="3"
                                                    placeholder="Alamat"></textarea>
                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
