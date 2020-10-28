@extends('layouts.argon-index')

@section('container')

<div class="header pb-6 d-flex align-items-center"
    style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            {{-- <div class="col-lg-7 col-md-10"> --}}
            <div class="card card-profile mt-3">
                <img src="{{url('/')}}/argon/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{url('/')}}/argon/img/theme/team-4.jpg" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                        <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center">
                                <div>
                                    <span class="heading">
                                    @php
                                            try {
                                            $ipk = 0;
                                            foreach ($student->scores as $value) {
                                            $ipk += $value->nilai;
                                            }

                                            $avg = $ipk / count($student->scores);
                                            echo number_format((float) $avg, 2, '.', '');
                                            } catch(\Throwable $th){
                                            echo 0;
                                            }
                                            @endphp
                                    </span>
                                    <span class="description">GPA</span>
                                </div>
                                <div>
                                    <span class="heading"> {{ count($student->projects) }} </span>
                                    <span class="description">Projects</span>
                                </div>
                                <div>
                                    <span class="heading">@php
                                        try {
                                                $total = 0;
                                                foreach ($student->meeting_student as $meeting_student) {
                                                    $hadir = 0;
                                                    foreach($meeting_student->kehadiran as $kehadiran){
                                                    if ($kehadiran->status == 1) {
                                                    $hadir++;
                                                    }
                                                };
                                            $total += ($hadir/count($meeting_student->meeting->jadwal)) * 100;
                                            }
                                            echo $total / count($student->meeting_student)."%";
                                        } catch (\Throwable $th) {
                                            echo 0;
                                        }
                                        @endphp</span>
                                    <span class="description">Attendance</span>
                                </div>
                                <div>
                                    <span class="heading">@php
                                        try {
                                        $ipk = 0;
                                        foreach ($student->projects as $value) {
                                        $ipk += $value->nilai;
                                        }

                                        $avg = $ipk / count($student->projects);
                                        echo number_format((float) $avg, 2, '.', '');
                                        } catch(\Throwable $th){
                                        echo 0;
                                        }
                                        @endphp</span>
                                    <span class="description"> Points </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="h3">
                            {{ $student->nama }}<span class="font-weight-light">, 27</span>
                        </h5>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i>{{ $student->alamat }}
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-6 order-xl-2">
            <div class="card card-profile px-2">
                {{-- <ul class="nav nav-pills nav-fill flex-column flex-sm-row" id="tabs-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-text-1-tab" data-toggle="tab"
                            href="#tab-bottom-left1" role="tab" aria-controls="tabs-text-1"
                            aria-selected="true">Academic
                            Achievement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab"
                            href="#tab-bottom-left2" role="tab" aria-controls="tabs-text-2"
                            aria-selected="false">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab" data-toggle="tab"
                            href="#tab-bottom-left3" role="tab" aria-controls="tabs-text-3"
                            aria-selected="false">Attendance</a>
                    </li>
                </ul> --}}

                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">Academic Achievement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">Attendances</a>
                        </li>
                    </ul>
                </div>

                <div class="card shadow">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                <div class="table-responsive">
                                    <a href="#tambah-nilai" data-toggle="modal" class="btn btn-sm btn-primary ml-3"
                                        style="margin-bottom: 20px">Tambah Nilai</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="tambah-nilai" tabindex="-1" aria-labelledby="tambah-nilaiLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="tambah-nilaiLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form id="formTambahNilai" action="/nilai/{{$student->id}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="semester">Semester</label>
                                                            <input type="number" name="semester" id="semester"
                                                                class="form-control @error('semester') is-invalid @enderror">
                                                            @error('semester') <span
                                                                class="text-danger text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nilai">Nilai</label>
                                                            <input type="number" step="any" name="nilai" id="nilai"
                                                                class="form-control @error('nilai') is-invalid @enderror">
                                                            @error('nilai') <span
                                                                class="text-danger text-sm">{{ $message }}</span>
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
                                                    <a data-toggle="modal" href="#edit-nilai" data-id="{{ $score->id }}"
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
                                    <div id="chartNilai"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
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
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form id="formTambahProject" action="/project/{{$student->id}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="tahun">Tahun</label>
                                                            <input type="number" name="tahun" id="tahun"
                                                                class="form-control @error('tahun') is-invalid @enderror">
                                                            @error('tahun') <span
                                                                class="text-danger text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kegiatan">Kegiatan</label>
                                                            <input type="text" step="any" name="kegiatan" id="kegiatan"
                                                                class="form-control @error('kegiatan') is-invalid @enderror">
                                                            @error('kegiatan') <span
                                                                class="text-danger text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tugas">Tugas</label>
                                                            <input type="text" step="any" name="tugas" id="tugas"
                                                                class="form-control @error('tugas') is-invalid @enderror">
                                                            @error('tugas') <span
                                                                class="text-danger text-sm">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nilai">Nilai</label>
                                                            <input type="number" step="any" name="nilai" id="nilai"
                                                                class="form-control @error('nilai') is-invalid @enderror">
                                                            @error('nilai') <span
                                                                class="text-danger text-sm">{{ $message }}</span>
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
                                                    <a data-toggle="modal" href="#edit-project" data-id="{{ $project->id }}"
                                                        class="btn btn-sm btn-success editProject">Edit</a>
                                                    <a href="#hapus" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); $(this).siblings('form').submit();">Hapus</a>
                                                    <form action="/project/{{ $project->id }}" method="post">
                                                        @csrf @method('delete')
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr class="bg-primary">
                                                <td colspan="3" align="center" class="text-white">Rata-Rata</td>
                                                <td class="text-white">
                                                    @php
                                            try {
                                            $ipk = 0;
                                            foreach ($student->projects as $value) {
                                            $ipk += $value->nilai;
                                            }

                                            $avg = $ipk / count($student->projects);
                                            echo number_format((float) $avg, 2, '.', '');
                                            } catch(\Throwable $th){
                                            echo 0;
                                            }
                                            @endphp
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- END TABBED CONTENT -->
                                    <!-- tempat chart project -->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                <div class="table-responsive">
                                    <table class="table project-table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Meeting</th>
                                                <th>Kehadiran</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($student->meeting_student as $meeting_student)
                                            <tr>
                                                <td>{{ $meeting_student->meeting->nama }}</td>
                                                <td>
                                                    @php
                                                    try {
                                                    $hadir = 0;
                                                    foreach($meeting_student->kehadiran as $kehadiran){
                                                    if ($kehadiran->status == 1) {
                                                    $hadir++;
                                                    }
                                                    };
                                                    } catch (\Throwable $th) {
                                                    echo 0;
                                                    }
                                                    @endphp
                                                    {{ $hadir }}/{{ count($meeting_student->meeting->jadwal) }}
                                                    ({{ ($hadir/count($meeting_student->meeting->jadwal)) * 100 }}%)
                                                </td>
                                                <td>
                                                    <a href="/detail-kehadiran/{{ $meeting_student->id }}"
                                                        class="btn btn-sm btn-success">Detail
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr class="bg-primary">
                                                <td align="center" class="text-white">Rata-rata</td>
                                                <td class="text-white">
                                                    @php
                                                    try {
                                                    $total = 0;
                                                    foreach ($student->meeting_student as $meeting_student) {
                                                    $hadir = 0;
                                                    foreach($meeting_student->kehadiran as $kehadiran){
                                                    if ($kehadiran->status == 1) {
                                                    $hadir++;
                                                    }
                                                    };
                                                    $total += ($hadir/count($meeting_student->meeting->jadwal)) *
                                                    100;
                                                    }
                                                    echo $total / count($student->meeting_student)."%";

                                                    } catch (\Throwable $th) {
                                                    echo 0;
                                                    }
                                                    @endphp
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- END TABBED CONTENT -->
                                    <!-- tempat chart project -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab-bottom-left1">
                        <div class="table-responsive">
                            <a href="#tambah-nilai" data-toggle="modal" class="btn btn-sm btn-primary mt-3 ml-3"
                                style="margin-bottom: 20px">Tambah Nilai</a>
                            <!-- Modal -->
                            <div class="modal fade" id="tambah-nilai" tabindex="-1" aria-labelledby="tambah-nilaiLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambah-nilaiLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="formTambahNilai" action="/nilai/{{$student->id}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="semester">Semester</label>
                                                    <input type="number" name="semester" id="semester"
                                                        class="form-control @error('semester') is-invalid @enderror">
                                                    @error('semester') <span
                                                        class="text-danger text-sm">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="nilai">Nilai</label>
                                                    <input type="number" step="any" name="nilai" id="nilai"
                                                        class="form-control @error('nilai') is-invalid @enderror">
                                                    @error('nilai') <span
                                                        class="text-danger text-sm">{{ $message }}</span>
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
                                            <a data-toggle="modal" href="#edit-nilai" data-id="{{ $score->id }}"
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
                            <div id="chartNilai"></div>
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
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="formTambahProject" action="/project/{{$student->id}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="tahun">Tahun</label>
                                                    <input type="number" name="tahun" id="tahun"
                                                        class="form-control @error('tahun') is-invalid @enderror">
                                                    @error('tahun') <span
                                                        class="text-danger text-sm">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="kegiatan">Kegiatan</label>
                                                    <input type="text" step="any" name="kegiatan" id="kegiatan"
                                                        class="form-control @error('kegiatan') is-invalid @enderror">
                                                    @error('kegiatan') <span
                                                        class="text-danger text-sm">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="tugas">Tugas</label>
                                                    <input type="text" step="any" name="tugas" id="tugas"
                                                        class="form-control @error('tugas') is-invalid @enderror">
                                                    @error('tugas') <span
                                                        class="text-danger text-sm">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="nilai">Nilai</label>
                                                    <input type="number" step="any" name="nilai" id="nilai"
                                                        class="form-control @error('nilai') is-invalid @enderror">
                                                    @error('nilai') <span
                                                        class="text-danger text-sm">{{ $message }}</span>
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
                                            <a data-toggle="modal" href="#edit-project" data-id="{{ $project->id }}"
                                                class="btn btn-sm btn-success editProject">Edit</a>
                                            <a href="#hapus" class="btn btn-danger btn-sm"
                                                onclick="event.preventDefault(); $(this).siblings('form').submit();">Hapus</a>
                                            <form action="/project/{{ $project->id }}" method="post">
                                                @csrf @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr class="bg-primary">
                                        <td colspan="3" align="center">Total Nilai</td>
                                        <td>
                                            @php
                                            $total = 0;
                                            foreach ($student->projects as $value) {
                                            $total += $value->nilai;
                                            }
                                            echo $total
                                            @endphp
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- END TABBED CONTENT -->
                            <!-- tempat chart project -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-bottom-left3">
                        <div class="table-responsive">

                            <table class="table project-table">
                                <thead>
                                    <tr>
                                        <th>Meeting</th>
                                        <th>Kehadiran</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($student->meeting_student as $meeting_student)
                                    <tr>
                                        <td>{{ $meeting_student->meeting->nama }}</td>
                                        <td>
                                            @php
                                            try {
                                            $hadir = 0;
                                            foreach($meeting_student->kehadiran as $kehadiran){
                                            if ($kehadiran->status == 1) {
                                            $hadir++;
                                            }
                                            };
                                            } catch (\Throwable $th) {
                                            echo 0;
                                            }
                                            @endphp
                                            {{ $hadir }}/{{ count($meeting_student->meeting->jadwal) }}
                                            ({{ ($hadir/count($meeting_student->meeting->jadwal)) * 100 }}%)
                                        </td>
                                        <td>
                                            <a href="/detail-kehadiran/{{ $meeting_student->id }}"
                                                class="btn btn-sm btn-success">Detail
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr class="bg-primary">
                                        <td align="center">Rata-rata</td>
                                        <td>
                                            @php
                                            try {
                                            $total = 0;
                                            foreach ($student->meeting_student as $meeting_student) {
                                            $hadir = 0;
                                            foreach($meeting_student->kehadiran as $kehadiran){
                                            if ($kehadiran->status == 1) {
                                            $hadir++;
                                            }
                                            };
                                            $total += ($hadir/count($meeting_student->meeting->jadwal)) *
                                            100;
                                            }
                                            echo $total / count($student->meeting_student)."%";

                                            } catch (\Throwable $th) {
                                            echo 0;
                                            }
                                            @endphp
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- END TABBED CONTENT -->
                            <!-- tempat chart project -->
                        </div>
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div> --}}
            </div>
        </div>
        <div class="col-xl-6 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit profile </h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="/students/{{$student->id}}/edit" class="btn btn-sm btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nama" class="form-control-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="{{ $student->nama }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="universitas" class="form-control-label">Universitas</label>
                                        <input type="text" class="form-control" id="universitas" name="universitas"
                                            value="{{ $student->universitas }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="fakultas" class="form-control-label">Fakultas</label>
                                        <input type="text" class="form-control" id="fakultas" name="fakultas"
                                            value="{{ $student->fakultas }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="jurusan" class="form-control-label">Jurusan</label>
                                        <input type="text" class="form-control" id="jurusan" name="jurusan"
                                            value="{{ $student->jurusan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="prodi" class="form-control-label">Prodi</label>
                                    <input type="text" class="form-control" id="prodi" name="prodi"
                                        value="{{ $student->prodi }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="angkatan" class="form-control-label">Angkatan</label>
                                    <input type="text" class="form-control" id="angkatan" name="angkatan"
                                        value="{{ $student->angkatan }}">
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">Contact information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat" class="form-control-label">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat"
                                            value="{{ $student->alamat }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                            value="{{ $student->tempat_lahir }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tgl_lahir" class="form-control-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                            value="{{ $student->tgl_lahir }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="telp" class="form-control-label">Telp</label>
                                        <input type="text" class="form-control" id="telp" name="telp"
                                            value="{{ $student->telp }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="ao" class="form-control-label">Achievement Organization</label>
                                        <input type="text" class="form-control" id="ao" name="ao"
                                            value="{{ $student->ao }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="as" class="form-control-label">Achievement Study</label>
                                        <input type="text" class="form-control" id="as" name="as"
                                            value="{{ $student->as }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Description -->
                    </form>
                </div>
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
                        @error('semester') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="number" step="any" name="nilai" id="nilai-edit"
                            class="form-control @error('nilai') is-invalid @enderror">
                        @error('nilai') <span class="text-danger text-sm">{{ $message }}</span> @enderror
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
                            @error('tahun') <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kegiatan">Kegiatan</label>
                            <input type="text" step="any" name="kegiatan" id="kegiatan-edit"
                                class="form-control @error('kegiatan') is-invalid @enderror">
                            @error('kegiatan') <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tugas">Tugas</label>
                            <input type="text" step="any" name="tugas" id="tugas-edit"
                                class="form-control @error('tugas') is-invalid @enderror">
                            @error('tugas') <span class="text-danger text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <input type="number" step="any" name="nilai" id="nilai-edit-project"
                                class="form-control @error('nilai') is-invalid @enderror">
                            @error('nilai') <span class="text-danger text-sm">{{ $message }}</span>
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

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartNilai', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Chart Nilai Semester Mahasiswa'
        },
        // legend: {
        //     layout: 'vertical',
        //     align: 'left',
        //     verticalAlign: 'top',
        //     x: 150,
        //     y: 100,
        //     floating: true,
        //     borderWidth: 1,
        //     backgroundColor:
        //         Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
        // },
        xAxis: {
            categories:
                {!!json_encode($semester) !!}
            ,
            min: 1
        },
        yAxis: {
            title: {
                text: 'Nilai'
            },
            max: 4
        },
        tooltip: {
            shared: true,
            valueSuffix: ' units'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },
        series: [{
            name: 'Semester',
            data:
                {!!json_encode($nilai) !!}
        }]
    });

</script>
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
