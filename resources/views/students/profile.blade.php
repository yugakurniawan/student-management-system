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
                                    <img src="{{$student->getAvatar()}}" class="img-circle"
                                        style="width:100px;height:100px" alt="Avatar">
                                    <h3 class="name">{{ $student->nama }}</h3>
                                    <span class="online-status status-available">Available</span>
                                </div>
                                <div class="profile-stat">
                                    <div class="row">
                                        <div class="col-md-3 stat-item">
                                            @php
                                            try {
                                                $ipk = 0;
                                                    foreach ($student->scores as $value) {
                                                    $ipk += $value->nilai;
                                                echo $ipk / count($student->scores);
                                                }
                                            } catch(\Throwable $th){
                                                echo 0;
                                            }
                                            @endphp <span>GPA</span>
                                        </div>
                                        <div class="col-md-3 stat-item">
                                            {{ count($student->projects) }}
                                            <span>Projects</span>
                                        </div>
                                        <div class="col-md-3 stat-item">
                                            5 <span>Attendance</span>
                                        </div>
                                        <div class="col-md-3 stat-item">
                                            @php
                                            $total = 0;
                                            foreach ($student->projects as $value) {
                                            $total += $value->nilai;
                                            }
                                            echo $total
                                            @endphp
                                            <span>Points</span>
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
                                        <li>Tempat Lahir<span>{{ $student->tempat_lahir }}</span></li>
                                        <li>Tanggal
                                            Lahir<span>{{ date("d F Y", strtotime($student->tgl_lahir)) }}</span></li>
                                        <li>Alamat<span>{{ $student->alamat }}</span></li>
                                        <li>Telp<span>{{ $student->telp }}</span></li>
                                        <li>Achievement Organization<span>{{ $student->ao }}</span></li>
                                        <li>Achievement Study<span>{{ $student->as }}</span></li>
                                    </ul>
                                </div>

                                <div class="text-center"><a href="/students/{{$student->id}}/edit"
                                        class="btn btn-warning">Edit Profile</a></div>
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
                                    <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Academic
                                            Achievement</a></li>
                                    <li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Projects </a></li>
                                    <li><a href="#tab-bottom-left3" role="tab" data-toggle="tab">Attendance </a></li>
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
                                                                    class="text-danger text-sm">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="kegiatan">Kegiatan</label>
                                                                <input type="text" step="any" name="kegiatan"
                                                                    id="kegiatan"
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
                                                                $total += ($hadir/count($meeting_student->meeting->jadwal)) * 100;
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
            categories: {!!json_encode($semester) !!},
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
            data: {!!json_encode($nilai) !!}
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
