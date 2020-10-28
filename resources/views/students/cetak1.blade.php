<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            margin:0px;
        }
        @media print {
            @page {
                margin: 0px;
            }
        }
    </style>
</head>
<body>
    <img src="/print_area_kajsdjkawdoilmasdmlamwdipmqwd/IJAZAH DESIGN DEPAN FIX.jpg"
        style="position:absolute; width:210mm; height:297mm; top:0; z-index:-1;">
    <div style="position:absolute; width:210mm; height:297mm; top:0; z-index:1;">
        <div>
            <img src="{{$student->getAvatar()}}" style="width:3cm;height:4cm; position: relative; top:835px; left:110px;" alt="Avatar">
        </div>
        <div style="text-align:center; position: relative; top:355px; left:234px; width:461px;">
            <span style="font-size: 20pt;"
        class="font-weight-bold">{{ $student->nama }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:410px; left:415px;"
        class="font-weight-bold">{{ $student->nama }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:425px; left:415px;"
        class="font-weight-bold">{{ $student->tempat_lahir }} / {{ date("d F Y",strtotime($student->tgl_lahir)) }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:440px; left:415px;"
        class="font-weight-bold">{{ $student->universitas }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:455px; left:415px;"
        class="font-weight-bold">{{ $student->jurusan }}</span>
        </div>
    </div>
</body>

</html>
