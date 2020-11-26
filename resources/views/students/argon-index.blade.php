@can('admin-student')

@endcan

@extends('layouts.argon-index')

@section('container')

<div class="row">
    <div class="col">
        <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
                <h3 class="text-white my-3">Data Mahasiswa</h3>
                <a href="/students/create" class="btn btn-primary">Tambah Data</a>
                <a href="{{ url('/') }}/students/exportexcel" class="btn btn-secondary">Export Excel</a>
                <a href="{{ url('/') }}/students/exportpdf" class="btn btn-secondary">Export PDF</a>
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
                            <th scope="col">#</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Telp</th>
                            <th scope="col">Rata-Rata Nilai</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $student->nisn}}</td>
                            <td><a href="/students/{{ $student->id}}/profile">{{ $student->nama}}</a></td>
                            <td>{{ $student->alamat}}</td>
                            <td>{{ $student->telp}}</td>
                            <td>{{ $student->average()}}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Opsi <i class="fas fa-caret-down"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="/students/{{ $student->id}}/profile">Detail</a>
                                        <a class="dropdown-item" href="/students/cetak1/{{$student->id}}"
                                            target="_blank">Cetak Depan</a>
                                        <a class="dropdown-item" href="/students/cetak2/{{$student->id}}"
                                            target="_blank">Cetak Belakang</a>
                                        {{-- <a class="dropdown-item" href="/students/{{ $student->id}}"
                                            class="btn btn-danger btn-sm"
                                            onclick="event.preventDefault(); $(this).siblings('form').submit(); return confirm('Yakin mau dihapus ?')">Hapus</a>
                                        <form action="/students/{{$student->id}}" method="post">
                                            @method('delete')
                                            @csrf
                                        </form> --}}
                                    <a class="dropdown-item delete" siswa-id="{{ $student->id }}" href="#">Hapus</a>
                                    </div>
                                </div>
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

@section('footer')

    <script>
        $('.delete').click(function(){
        // console.log($(this).attr('id'));
           var siswa_id = $(this).attr('siswa-id');
           swal({
            title: "Yakin ?",
            text: "Mau dihapus data siswa dengan id "+siswa_id+" ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/students/"+siswa_id+"/delete";
                }
            });
        });
    </script>

@endsection
