<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            margin: 0px;
        }

        @media print {
            @page {
                margin: 0px;
            }
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
        }

        .table td,
        .table th {
            border: 1px solid black;
        }

    </style>
</head>

<body>
    <img src="/print_area_kajsdjkawdoilmasdmlamwdipmqwd/IJAZAH DESIGN BELAKANG revisi.png"
        style="position:absolute; width:210mm; height:297mm; top:0; z-index:-1;">
    <div style="position:absolute; width:210mm; height:297mm; top:0; z-index:1;">
        <div>
            <span style="font-size: 15pt; position: relative; top:214px; left:250px">{{ $student->nama }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:220px; left:250px">{{ $student->tempat_lahir }} /
                {{ tgl(date('Y-m-d', strtotime($student->tgl_lahir))) }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:227px; left:250px">{{ $student->agama }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:232px; left:250px">{{ $student->nisn }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:240px; left:250px">{{ $student->email }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:36px; left:640px">{{ $tanggal2 }}</span>
        </div>
        <div style="display: flex; justify-content: center;">
            <div style="margin-top: 230px; width:17cm;">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="5">Kegiatan</th>
                        </tr>
                        <tr>
                            <th align="center">No</th>
                            <th align="center">Tahun</th>
                            <th>Kegiatan</th>
                            <th>Tugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($student->extracurricular as $project)
                        <tr>
                            <td align="center">{{ $loop->iteration}}</td>
                            <td align="center">{{ $project->tahun }}</td>
                            <td style="padding-left:10px; padding-right:10px;">{{ $project->kegiatan }}</td>
                            <td style="padding-left:10px; padding-right:10px;">{{ $project->tugas }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" align="center">Data tidak tersedia</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>


            </div>
        </div>
        <div style="display: flex; justify-content: center;">
            <div style="display: flex; justify-content: space-between;">
                <div style="margin-top: 0px; width:8.35cm; margin-right: 10px;">
                    <table class="table project-table">
                        <thead>
                            <tr>
                                <th colspan="5">Transkrip Nilai</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($student->subject as $ss)
                            <tr>
                                <td align="center">{{ $loop->iteration }}</td>
                                <td style="padding-left:10px; padding-right:10px;">Mata Pelajaran {{ $ss->nama }}</td>
                                <td align="center">{{ $ss->pivot->nilai }}</td>
                                @empty
                            <tr>
                                <td colspan="3" align="center">Data tidak tersedia</td>
                            </tr>
                            @endforelse
                            {{-- <tr class="bg-primary">
                                <td colspan="2" align="center" class="text-white">Rata-Rata</td>
                                <td class="text-white" align="center">
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
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                <div id="chartNilai" style="height: 247px; width:8.35cm"></div>
            </div>
        </div>

        <div>
            <span style="font-size: 15pt; position: relative; top:50px; left:475px">Surabaya, {{ $tanggal }}</span>
        </div>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script>
            < script >
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
</body>

</html>
