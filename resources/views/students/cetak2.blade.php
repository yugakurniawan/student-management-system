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

        .table td, .table th{
            border: 1px solid black;
        }

    </style>
</head>

<body>
    <img src="/print_area_kajsdjkawdoilmasdmlamwdipmqwd/IJAZAH DESIGN BELAKANG final.png"
        style="position:absolute; width:210mm; height:297mm; top:0; z-index:-1;">
    <div style="position:absolute; width:210mm; height:297mm; top:0; z-index:1;">
        <div>
            <span style="font-size: 15pt; position: relative; top:214px; left:250px">{{ $student->nama }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:220px; left:250px">{{ $student->tempat_lahir }} / {{ date("d F Y",strtotime($student->tgl_lahir)) }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:227px; left:250px">{{ $student->universitas }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:232px; left:250px">{{ $student->jurusan }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:240px; left:250px">{{ $student->angkatan }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:0px; left:640px">{{ $student->angkatan }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:13px; left:640px">{{ $student->angkatan }}</span>
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
                            <th align="center">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($student->projects as $project)
                        <tr>
                            <td align="center">{{ $loop->iteration}}</td>
                            <td align="center">{{ $project->tahun }}</td>
                            <td style="padding-left:10px; padding-right:10px;">{{ $project->kegiatan }}</td>
                            <td style="padding-left:10px; padding-right:10px;">{{ $project->tugas }}</td>
                            <td align="center">{{ $project->nilai }}</td>
                        </tr>
                        @empty
                            <tr><td colspan="5" align="center">Data tidak tersedia</td></tr>
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
                                <th colspan="5">Academic Study</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Semester</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($student->scores as $score)
                            <tr>
                                <td align="center">{{ $loop->iteration }}</td>
                                <td style="padding-left:10px; padding-right:10px;">Semester {{ $score->semester }}</td>
                                <td align="center">
                                    {{ $score->nilai }}
                                </td>
                            </tr>
                            @empty
                                <tr><td colspan="3" align="center">Data tidak tersedia</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div id="chartNilai" style="height: 247px; width:8.35cm"></div>
            </div>
        </div>

        <div>
        <span style="font-size: 15pt; position: relative; top:50px; left:475px">Surabaya, {{ date('d F Y') }}</span>
        </div>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script>

            Highcharts.chart('chartNilai', {
                chart: {
                    type: 'areaspline',
                    backgroundColor: 'transparent'
                },
                title: {
                    text: ''
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
                lineColor: '#000000',
                lineWidth: 1,
                    categories:
                        {!!json_encode($semester) !!}
                    ,
                    min: 1
                },
                yAxis: {
                lineColor: '#000000',
                lineWidth: 1,
                    title: {
                        text: '',
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
                    showInLegend: false,
                    data:
                        {!!json_encode($nilai) !!}
                }]
            });

        </script>
</body>

</html>
