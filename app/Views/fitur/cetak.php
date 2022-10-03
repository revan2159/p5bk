<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>


    <h3 class="strong">RAPOR PROJEK PROFIL PELAJAR PANCASILA DAN BUDAYA KERJA</h3>
    <table>
        <tr>
            <th style="width: 15%">Nama Sekolah</th>
            <th style="width: 25%">: SMK Kesehatan Rahani Husada</th>
            <th style="width: 5%"></th>
            <th style="width: 15%">Kelas</th>
            <th style="width: 20%">: X Keb B</th>
        </tr>
        <tr>
            <th>Program Keahlian</th>
            <th>: Keprawatan</th>
            <th></th>
            <th>Fase</th>
            <th>: E </th>
        </tr>
        <tr>
            <th>Nama Peserta Didik</th>
            <th>: Cahya</th>
            <th></th>
            <th>Tahun Pelajaran</th>
            <th>: 2022/2023</th>
        </tr>
        <tr>
            <th>NISN</th>
            <th>: 22533365</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </table>
    <table class="table" style="margin-top: 10px;">
        @foreach ($rencana_budaya_kerja as $item)
        <tr>
            <td class="strong"><strong>Projek {{$loop->iteration}} | {{$item->nama}}</strong></td>
        </tr>
        <tr>
            <td>{{$item->deskripsi}}</td>
        </tr>
        @endforeach
    </table>
    <table class="table" style="margin-top: 10px;">
        <tr>
            @foreach ($opsi_budaya_kerja as $opsi)
            <td style="width: 10px">
                <div class="badge bg-{{$opsi->warna}}">&nbsp;&nbsp;&nbsp;&nbsp; mearh</div>
            </td>
            <td>
                <strong class="strong">{{$opsi->kode}}. {{$opsi->nama}}</strong><br>
                {{$opsi->deskripsi}}
            </td>
            @endforeach
        </tr>
    </table>
    <table class="table table-bordered table-striped" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>Projek Kelas {{$get_siswa->rombongan_belajar->tingkat}}</th>
                @foreach ($budaya_kerja as $budaya)
                <th class="text-center">{{$budaya->aspek}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rencana_budaya_kerja as $rencana)
            <tr>
                <td>{{$loop->iteration}}. {{$rencana->nama}}</td>
                @foreach ($budaya_kerja as $budaya)

                <td class="text-center">{!! CustomHelper::opsi_budaya($nilai_budaya_kerja) !!}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    @foreach ($rencana_budaya_kerja as $rencana)
    <table class="table table-bordered table-striped" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>Projek {{$loop->iteration}} | {{$rencana->nama}}</th>
                @foreach ($opsi_budaya_kerja as $opsi)
                <th style="width: 100px;" class="text-center">{{$opsi->kode}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rencana->aspek_budaya_kerja as $item)
            <tr>
                <td colspan="7"><strong class="strong">{{$item->budaya_kerja->aspek}}</strong></td>
            </tr>
            @foreach ($item->budaya_kerja->elemen_budaya_kerja as $elemen)
            <tr>
                <td><strong class="strong">{{$elemen->elemen}}.</strong> {{$elemen->deskripsi}}</td>
                @foreach ($opsi_budaya_kerja as $opsi)
                <td class="text-center strong">{!! ($elemen->nilai_budaya_kerja && $elemen->nilai_budaya_kerja->opsi_id == $opsi->opsi_id) ? '√' : '' !!}</td>
                @endforeach
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
    @endforeach
    <table class="table table-bordered table-striped" style="margin-top: 10px;">
        <tr>
            <th>Catatan Kegiatan</th>
        </tr>
        <tr>
            <td>{{($get_siswa->catatan_budaya_kerja) ? $get_siswa->catatan_budaya_kerja->catatan : '-'}}</td>
        </tr>
    </table>
    @endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>