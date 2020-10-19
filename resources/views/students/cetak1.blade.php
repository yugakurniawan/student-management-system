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
    <img src="/print_area_kajsdjkawdoilmasdmlamwdipmqwd/IJAZAH DESIGN DEPAN.png"
        style="position:absolute; width:210mm; height:297mm; top:0; z-index:-1;">
    <div style="position:absolute; width:210mm; height:297mm; top:0; z-index:1;">
        <div style="text-align:center">
            <span style="font-size: 20pt; position: relative; top:300px" class="font-weight-bold">{{ $student->nama }}</span>
        </div>
        <div style="text-align:center">
            <img src="{{$student->getAvatar()}}" style="width:4cm;height:6cm; position: relative; top:750px;" alt="Avatar">
        </div>
    </div>
</body>

</html>
