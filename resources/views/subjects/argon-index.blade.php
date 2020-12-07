@can('admin-student')

@endcan

@extends('layouts.argon-index')

@section('container')

<div class="row">
    <div class="col">
        <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
                <h3 class="text-white my-3">Data Mata Pelajaran</h3>
                <a href="/subjects/create" class="btn btn-primary">Tambah Data</a>
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
                            <th scope="col">Kode</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Semester</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $subject->kode}}</td>
                            <td>{{ $subject->nama}}</td>
                            <td>{{ $subject->semester}}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-primary" href="#" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Opsi <i class="fas fa-caret-down"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="/subjects/{{ $subject->id}}/profile">Detail</a>
                                        <a class="dropdown-item delete" subject-id="{{ $subject->id }}" href="#">Hapus</a>
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
           var subject_id = $(this).attr('subject-id');
           swal({
            title: "Yakin ?",
            text: "Mau dihapus data subject dengan id "+subject_id+" ??",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/students/"+subject_id+"/delete";
                }
            });
        });
    </script>

@endsection
