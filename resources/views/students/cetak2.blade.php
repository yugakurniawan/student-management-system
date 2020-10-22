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

    </style>
</head>

<body onload="window.print()">
    <img src="/print_area_kajsdjkawdoilmasdmlamwdipmqwd/IJAZAH DESIGN BELAKANG.png"
        style="position:absolute; width:210mm; height:297mm; top:0; z-index:-1;">
    <div style="position:absolute; width:210mm; height:297mm; top:0; z-index:1;">
        <div>
            <span style="font-size: 15pt; position: relative; top:188px; left:250px"
                class="font-weight-bold">{{ $student->nama }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:193px; left:250px"
        class="font-weight-bold">{{ $student->tempat_lahir }} / {{ $student->tgl_lahir }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:200px; left:250px"
        class="font-weight-bold">{{ $student->universitas }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:206px; left:250px"
        class="font-weight-bold">{{ $student->jurusan }}</span>
        </div>
        <div>
            <span style="font-size: 15pt; position: relative; top:214px; left:250px"
        class="font-weight-bold">{{ $student->angkatan }}</span>
        </div>
</body>

</html>
