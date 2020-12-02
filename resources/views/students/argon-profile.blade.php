@extends('layouts.argon-index')

@section('styles')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
    rel="stylesheet" />
<link href="bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet">
@endsection

@section('container')

<div class="header pb-6 d-flex align-items-center"
    style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container d-flex align-items-center">
        <div class="row">
            {{-- <div class="col-lg-7 col-md-10"> --}}
            <div class="card card-profile mt-3">
                <img src="{{url('/')}}/argon/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{$student->getAvatar()}}" class="rounded-circle"
                                    style="width:150px;height:150px" alt="Avatar">
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
                                    <span class="heading"> {{ $student->average()}}</span>
                                    <span class="description">GPA</span>
                                </div>
                                <div>
                                    <span class="heading"> {{ $student->subject->count() }} </span>
                                    <span class="description">Mata Pelajaran</span>
                                </div>
                                <div>
                                    <span class="heading"></span>
                                    <span class="description">Attendance</span>
                                </div>
                                <div>
                                    <span class="heading"></span>
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
        <div class="col-xl-8 order-xl-2">
            <div class="card card-profile px-2">
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                aria-selected="true">Academic Achievement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                aria-selected="false">Extracurriculars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                                href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                                aria-selected="false">Attendances</a>
                        </li>
                    </ul>
                </div>

                <div class="card shadow">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                aria-labelledby="tabs-icons-text-1-tab">
                                <div class="table-responsive">
                                    @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                    @endif

                                    @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif

                                    <a href="#tambah-nilai" data-toggle="modal" class="btn btn-sm btn-primary ml-3"
                                        style="margin-bottom: 20px">Tambah Nilai</a>

                                    <table class="table project-table">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                <th>Guru</th>
                                                <th>Semester</th>
                                                <th>Nilai</th>
                                                <th>opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($student->subject as $mapel)
                                            <tr>
                                                <td>{{$mapel->kode}}</td>
                                                <td>{{$mapel->nama}}</td>
                                                <td><a href="/teachers/{{$mapel->teacher_id}}/profile">{{$mapel->teacher->nama}}</a></td>
                                                <td>{{$mapel->semester}}</td>
                                                <td>{{$mapel->pivot->nilai}}</td>
                                                <td>
                                                    <a href="/students/{{$student->id}}/{{$mapel->id}}/delete-nilai" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); $(this).siblings('form').submit(); return confirm('Yakin mau dihapus ?')">Hapus</a>
                                                    <form action="/students/{{ $student->id }}/{{$mapel->id}}/delete-nilai" method="post">
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
                                        style="margin-bottom: 20px">Tambah Ekskul</a>
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
                                                <form id="formTambahProject" action="/extracurriculars/{{$student->id}}" method="post">
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
                                            @foreach ($student->extracurricular as $project)
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
                                            foreach ($student->extracurricular as $value) {
                                            $ipk += $value->nilai;
                                            }

                                            $avg = $ipk / count($student->extracurricular);
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
                                            @foreach ($student->attendance_student as $attendance_student)
                                            <tr>
                                                <td>{{ $attendance_student->attendance->nama }}</td>
                                                <td>
                                                    @php
                                                    try {
                                                    $hadir = 0;
                                                    foreach($attendance_student->presence as $kehadiran){
                                                    if ($kehadiran->status == 1) {
                                                    $hadir++;
                                                    }
                                                    };
                                                    } catch (\Throwable $th) {
                                                    echo 0;
                                                    }
                                                    @endphp
                                                    {{ $hadir }}/{{ count($attendance_student->attendance->schedule) }}
                                                    ({{ $hadir == 0 ? 0 : ($hadir/count($attendance_student->attendance->schedule)) * 100 }}%)
                                                </td>
                                                <td>
                                                    <a href="/detail-kehadiran/{{ $attendance_student->id }}"
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
                                                    foreach ($student->attendance_student as $attendance_student) {
                                                    $hadir = 0;
                                                    foreach($attendance_student->presence as $kehadiran){
                                                    if ($kehadiran->status == 1) {
                                                    $hadir++;
                                                    }
                                                    };
                                                    $total += ($hadir/count($attendance_student->attendance->schedule)) *
                                                    100;
                                                    }
                                                    echo $total / count($student->attendance_student)."%";

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
            </div>
        </div>
        <div class="col-xl-4 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Student profile </h3>
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
                                        <label for="nisn" class="form-control-label">NISN</label>
                                        <input type="text" class="form-control" id="nisn" name="nisn"
                                            value="{{ $student->nisn }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nama" class="form-control-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="{{ $student->nama }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                            value="{{ $student->jenis_kelamin }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="agama" class="form-control-label">Agama</label>
                                        <input type="text" class="form-control" id="agama" name="agama"
                                            value="{{ $student->agama }}">
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
                        </div>
                        <hr class="my-4" />
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">Contact information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{ $student->email }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="telp" class="form-control-label">Telp</label>
                                        <input type="text" class="form-control" id="telp" name="telp"
                                            value="{{ $student->telp }}">
                                    </div>
                                </div>
                            </div>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ayah" class="form-control-label">Ayah</label>
                                        <input type="text" class="form-control" id="ayah" name="ayah"
                                            value="{{ $student->ayah }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pekerjaan_ayah" class="form-control-label">Pekerjaan Ayah</label>
                                        <input type="text" class="form-control" id="pekerjaan_ayah"
                                            name="pekerjaan_ayah" value="{{ $student->pekerjaan_ayah }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ibu" class="form-control-label">Ibu</label>
                                        <input type="text" class="form-control" id="ibu" name="ibu"
                                            value="{{ $student->ibu }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pekerjaan_ibu" class="form-control-label">Pekerjaan Ibu</label>
                                        <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu"
                                            value="{{ $student->pekerjaan_ibu }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status_ortu" class="form-control-label">Status Orang Tua</label>
                                        <input type="text" class="form-control" id="status_ortu" name="status_ortu"
                                            value="{{ $student->status_ortu }}">
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

<!-- Modal Tambah Nilai-->
<div class="modal fade" id="tambah-nilai" tabindex="-1" aria-labelledby="tambah-nilaiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah-nilaiLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahNilai" action="/students/{{$student->id}}/nilai" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="subject">Mata Pelajaran</label>
                        <select class="form-control" id="subject" name="subject" id="subject"
                            class="form-control @error('subject') is-invalid @enderror">
                            @foreach ($subject as $subjects)
                            <option value="{{$subjects->id}}">{{ $subjects->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="number" step="any" name="nilai" id="nilai"
                            class="form-control @error('nilai') is-invalid @enderror">
                        @error('nilai') <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <!-- Modal Edit Nilai-->
<div class="modal fade" id="edit-nilai" tabindex="-1" aria-labelledby="edit-nilaiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-nilaiLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditNilai" action="/students/{{$student->id}}/edit-nilai" method="POST">
                @method('patch')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="subject">Mata Pelajaran</label>
                        <select class="form-control" id="subject" name="subject" id="subject"
                            class="form-control @error('subject') is-invalid @enderror">
                            @foreach ($subject as $subject2)
                            <option value="{{ $subjects->id }}">{{ $subjects->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="number" step="any" name="nilai" id="nilai"
                            class="form-control @error('nilai') is-invalid @enderror">
                        @error('nilai') <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

@endsection

@section('footer')
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script> --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartNilai', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Laporan Nilai Siswa'
        },
        xAxis: {
            categories: {!!json_encode($categories) !!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'nilai'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Nilai',
            data: {!!json_encode($data) !!}

        }]
    });

</script>
@endsection
