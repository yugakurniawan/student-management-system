@extends('layouts.main')

@section('container')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <!-- LEFT COLUMN -->
                    <div class="card" style="background-color: white">
                        <div class="card-body">
                            <!-- PROFILE HEADER -->
                            <div class="profile-header">
                                <div class="overlay"></div>
                                <div class="profile-main">
                                    <img src="{{$student->getAvatar()}}" class="img-circle" alt="Avatar">
                                    <h3 class="name">{{ $student->nama }}</h3>
                                    <span class="online-status status-available">Available</span>
                                </div>
                                <div class="profile-stat">
                                    <div class="row">
                                        <div class="col-md-3 stat-item">
                                            45 <span>IPK</span>
                                        </div>
                                        <div class="col-md-3 stat-item">
                                            15 <span>Kehadiran</span>
                                        </div>
                                        <div class="col-md-3 stat-item">
                                            2 <span>Projects</span>
                                        </div>
                                        <div class="col-md-3 stat-item">
                                            2174 <span>Points</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE HEADER -->
                            <!-- PROFILE DETAIL -->
                            <div class="profile-detail">
                                <div class="profile-info">
                                    <h4 class="heading">Basic Info</h4>
                                    <ul class="list-unstyled list-justify">
                                        <li>Universitas <span>{{ $student->universitas }}</span></li>
                                        <li>Fakultas <span>{{ $student->fakultas }}</span></li>
                                        <li>Jurusan <span>{{ $student->jurusan }}</span></li>
                                        <li>Prodi <span>{{ $student->prodi }}</span></li>
                                        <li>Angkatan<span>{{ $student->angkatan }}</span></li>
                                        <li>Alamat<span>{{ $student->alamat }}</span></li>
                                        <li>Telp<span>{{ $student->telp }}</span></li>
                                    </ul>
                                </div>

                            <div class="text-center"><a href="/students/{{$student->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
                            </div>
                            <!-- END PROFILE DETAIL -->
                        </div>
                    </div>
                    <!-- END LEFT COLUMN -->
                </div>
                <div class="col-lg-7 col-md-7" style="background-color: white; padding: 20px">
                    <!-- RIGHT COLUMN -->
                    <div class="card">
                        <div class="card-body">

                            <!-- TABBED CONTENT -->
                            <div class="custom-tabs-line tabs-line-bottom left-aligned">
                                <ul class="nav" role="tablist">
                                    <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Recent
                                            Activity</a></li>
                                    <li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Projects </a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-bottom-left1">
                                    <div class="table-responsive">
                                        <a href="#tambah-nilai" data-toggle="modal" class="btn btn-primary"
                                            style="margin-bottom: 20px">Tambah Nilai</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="tambah-nilai" tabindex="-1"
                                            aria-labelledby="tambah-nilaiLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tambah-nilaiLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form id="formTambahNilai" action="/nilai/{{$student->id}}"
                                                        method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="semester">Semester</label>
                                                                <input type="number" name="semester" id="semester"
                                                                    class="form-control @error('semester') is-invalid @enderror">
                                                                @error('semester') <span
                                                                    class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nilai">Nilai</label>
                                                                <input type="number" step="any" name="nilai" id="nilai"
                                                                    class="form-control @error('nilai') is-invalid @enderror">
                                                                @error('nilai') <span
                                                                    class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table project-table">
                                            <thead>
                                                <tr>
                                                    <th>Semester</th>
                                                    <th>Nilai</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($student->scores as $score)
                                                <tr>
                                                    <td><a href="#">Semester {{ $score->semester }}</a></td>
                                                    <td>
                                                        {{ $score->nilai }}
                                                    </td>
                                                    <td>
                                                        <a data-toggle="modal" href="#edit-nilai"
                                                            data-id="{{ $score->id }}"
                                                            class="btn btn-sm btn-success editNilai">Edit</a>
                                                        <a href="#hapus" class="btn btn-danger btn-sm"
                                                            onclick="event.preventDefault(); $(this).siblings('form').submit();">Hapus</a>
                                                        <form action="/nilai/{{ $score->id }}" method="post">
                                                            @csrf @method('delete')
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-bottom-left2">
                                    <div class="table-responsive">
                                        <a href="#tambah-project" data-toggle="modal" class="btn btn-primary"
                                            style="margin-bottom: 20px">Tambah Project</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="tambah-project" tabindex="-1"
                                            aria-labelledby="tambah-projectLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tambah-projectLabel">Modal title
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form id="formTambahProject" action="/project/{{$student->id}}"
                                                        method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="tahun">Tahun</label>
                                                                <input type="number" name="tahun" id="tahun"
                                                                    class="form-control @error('tahun') is-invalid @enderror">
                                                                @error('tahun') <span
                                                                    class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="kegiatan">Kegiatan</label>
                                                                <input type="text" step="any" name="kegiatan"
                                                                    id="kegiatan"
                                                                    class="form-control @error('kegiatan') is-invalid @enderror">
                                                                @error('kegiatan') <span
                                                                    class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tugas">Tugas</label>
                                                                <input type="text" step="any" name="tugas" id="tugas"
                                                                    class="form-control @error('tugas') is-invalid @enderror">
                                                                @error('tugas') <span
                                                                    class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nilai">Nilai</label>
                                                                <input type="number" step="any" name="nilai" id="nilai"
                                                                    class="form-control @error('nilai') is-invalid @enderror">
                                                                @error('nilai') <span
                                                                    class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table project-table">
                                            <thead>
                                                <tr>
                                                    <th>Tahun</th>
                                                    <th>Kegiatan</th>
                                                    <th>Tugas</th>
                                                    <th>Nilai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($student->projects as $project)
                                                <tr>
                                                    <td>{{ $project->tahun }}</td>
                                                    <td>{{ $project->kegiatan }}</td>
                                                    <td>{{ $project->tugas }}</td>
                                                    <td>{{ $project->nilai }}</td>

                                                    <td>
                                                        <a data-toggle="modal" href="#edit-project"
                                                            data-id="{{ $project->id }}"
                                                            class="btn btn-sm btn-success editProject">Edit</a>
                                                        <a href="#hapus" class="btn btn-danger btn-sm"
                                                            onclick="event.preventDefault(); $(this).siblings('form').submit();">Hapus</a>
                                                        <form action="/project/{{ $project->id }}" method="post">
                                                            @csrf @method('delete')
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- END TABBED CONTENT -->
                                    </div>
                                </div>
                                <!-- END RIGHT COLUMN -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT -->
            </div>
        </div>
    </div>
</div>
<!-- Modal 1-->
<div class="modal fade" id="edit-nilai" tabindex="-1" aria-labelledby="edit-nilaiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-nilaiLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditNilai" action="" method="post">
                @csrf @method('patch')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <input type="number" name="semester" id="semester-edit"
                            class="form-control @error('semester') is-invalid @enderror">
                        @error('semester') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="number" step="any" name="nilai" id="nilai-edit"
                            class="form-control @error('nilai') is-invalid @enderror">
                        @error('nilai') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal 2-->
<div class="modal fade" id="edit-project" tabindex="-1" aria-labelledby="edit-projectLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-projectLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditProject" action="" method="post">
                @csrf @method('patch')
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="number" name="tahun" id="tahun-edit"
                                class="form-control @error('tahun') is-invalid @enderror">
                            @error('tahun') <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kegiatan">Kegiatan</label>
                            <input type="text" step="any" name="kegiatan" id="kegiatan-edit"
                                class="form-control @error('kegiatan') is-invalid @enderror">
                            @error('kegiatan') <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tugas">Tugas</label>
                            <input type="text" step="any" name="tugas" id="tugas-edit"
                                class="form-control @error('tugas') is-invalid @enderror">
                            @error('tugas') <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <input type="number" step="any" name="nilai" id="nilai-edit-project"
                                class="form-control @error('nilai') is-invalid @enderror">
                            @error('nilai') <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $(".editNilai").click(function (event) {
            event.preventDefault();
            const idNilai = $(this).data('id');
            $.get('/nilai/' + idNilai, function (response) {
                $("#formEditNilai").attr('action', '/nilai/' + idNilai);
                $("#semester-edit").val(response.data.semester);
                $("#nilai-edit").val(response.data.nilai);
            });
        });

        $(".editProject").click(function (event) {
            event.preventDefault();
            const idProject = $(this).data('id');
            $.get('/project/' + idProject, function (response) {
                $("#formEditProject").attr('action', '/project/' + idProject);
                $("#tahun-edit").val(response.data.tahun);
                $("#kegiatan-edit").val(response.data.kegiatan);
                $("#tugas-edit").val(response.data.tugas);
                $("#nilai-edit-project").val(response.data.nilai);
            });
        });
    });

</script>
@endpush
