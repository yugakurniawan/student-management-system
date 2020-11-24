<table class="table" style="border:1px solid #ddd">
    <thead>
        <tr>
            <th scope="col">NISN</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Tempat Lahir</th>
            <th scope="col">Tgl Lahir</th>
            <th scope="col">Agama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Email</th>
            <th scope="col">Telp</th>
            <th scope="col">Ayah</th>
            <th scope="col">Pekerjaan Ayah</th>
            <th scope="col">Ibu</th>
            <th scope="col">Pekerjaan Ibu</th>
            <th scope="col">Status Orang Tua</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->nisn}}</td>
            <td>{{ $student->nama}}</td>
            <td>{{ $student->jenis_kelamin}}</td>
            <td>{{ $student->tempat_lahir}}</td>
            <td>{{ $student->tgl_lahir}}</td>
            <td>{{ $student->agama}}</td>
            <td>{{ $student->alamat}}</td>
            <td>{{ $student->email}}</td>
            <td>{{ $student->telp}}</td>
            <td>{{ $student->ayah}}</td>
            <td>{{ $student->pekerjaan_ayah}}</td>
            <td>{{ $student->ibu}}</td>
            <td>{{ $student->pekerjaan_ibu}}</td>
            <td>{{ $student->status_ortu}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
