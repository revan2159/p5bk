<!doctype html>
<html lang="en">

<?php

// dd($dimensi);

?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    <!-- Table Identitas -->

    <table class=" table table-bordered border-primary">
        <tr>
            <th style="width: 15%">Nama Sekolah</th>
            <th style="width: 25%">: SMK Kesehatan Rahani Husada</th>
            <th style="width: 5%"></th>
            <th style="width: 15%">Kelas</th>
            <th style="width: 20%">: <?= $siswa['kelas_nama'] ?></th>
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
            <th>: <?= $siswa['siswa_nama'] ?></th>
            <th></th>
            <th>Tahun Pelajaran</th>
            <th>: 2022/2023</th>
        </tr>
        <tr>
            <th>NISN</th>
            <th>: <?= $siswa['siswa_nisn'] ?></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </table>

    <!-- Table Project -->
    <table class="table table-bordered border-primary" style="margin-top: 10px;">
        <?php
        foreach ($rencana as $item) :
        ?>
            <tr>
                <td><strong><?= $item['nama'] ?></strong></td>
            </tr>
            <tr>
                <td><?= $item['deskripsi'] ?></td>
            </tr>


        <?php endforeach ?>


    </table>


    <!-- Table Opsi -->
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <?php
                foreach ($opsi as $item) :
                ?>
                    <td><span class="badge bg-primary">&nbsp;&nbsp;</span></td>
                    <td>
                        <strong><?= $item['kode_opsi'] ?>. <?= $item['nama_opsi'] ?></strong><br>
                        <?= $item['deskripsi_opsi'] ?>
                    </td>
                <?php endforeach ?>
            </tr>
        </thead>
    </table>
    <br><br>

    <!-- Table 2 -->

    <table class="table table-bordered border-primary" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>Projek Kelas 10</th>
                <?php
                foreach ($dimensi as $budaya) :
                ?>
                    <th class="text-center"><?= $budaya['nama_dimensi'] ?></th>
                <?php endforeach ?>

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($rencana as $projek) :
            ?>
                <tr>
                    <td><?= $no++ ?>. <?= $projek['nama'] ?></td>
                    <?php
                    foreach ($dimensi as $item) :
                        $db = \Config\Database::connect();
                        $get_aspek = $db->table('aspek_penilaian');
                        $get_aspek->select('aspek_penilaian.dimensi_id');
                        $get_aspek->where('aspek_penilaian.rencana_id', $projek['rencana_id']);
                        $aspek = $get_aspek->get()->getResultArray();

                        $get_nilai = $db->table('nilai_p5bk');
                        $get_nilai->select('nilai_p5bk.opsi_id, nilai_p5bk.elemen_id,nilai_p5bk.dimensi_id');
                        $get_nilai->where('nilai_p5bk.siswa_id', $siswa['siswa_id']);
                        //$get_nilai->where('nilai_p5bk.rencana_id', $projek['rencana_id']);
                        //$get_nilai->where('nilai_p5bk.dimensi_id', $item['id_dimensi']);
                        $nilai = $get_nilai->get()->getResultArray();
                        ok
                    ?>


                        <td class="text-center">d</td>
                    <?php endforeach
                    ?>

                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>
    <br> <br>

    <!-- Table nilai -->
    <table class="table table-bordered border-primary" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>Projek 1 | Judul Rencana/projek</th>

                <th style="width: 100px;" class="text-center">kode opsi</th>
                <th style="width: 100px;" class="text-center">kode opsi</th>
                <th style="width: 100px;" class="text-center">kode opsi</th>
                <th style="width: 100px;" class="text-center">kode opsi</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="7"><strong>Dimensi yang dinilai</strong></td>
            </tr>

            <tr>
                <td><strong>Tambilkan elemen dari dimensi yang dinilai</strong> dan tampilkan capaian/deskrisi</td>

                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>

            </tr>
            <tr>
                <td><strong>Tambilkan elemen dari dimensi yang dinilai</strong> dan tampilkan capaian/deskrisi</td>

                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>


            </tr>
            <tr>
                <td><strong>Tambilkan elemen dari dimensi yang dinilai</strong> dan tampilkan capaian/deskrisi</td>

                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>

            </tr>
            <tr>
                <td><strong>Tambilkan elemen dari dimensi yang dinilai</strong> dan tampilkan capaian/deskrisi</td>

                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>

            </tr>

            <tr>
                <td colspan="7"><strong>Dimensi yang dinilai</strong></td>
            </tr>

            <tr>
                <td><strong>Tambilkan elemen dari dimensi yang dinilai</strong> dan tampilkan capaian/deskrisi</td>

                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>

            </tr>
            <tr>
                <td><strong>Tambilkan elemen dari dimensi yang dinilai</strong> dan tampilkan capaian/deskrisi</td>

                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>


            </tr>
            <tr>
                <td><strong>Tambilkan elemen dari dimensi yang dinilai</strong> dan tampilkan capaian/deskrisi</td>

                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>

            </tr>
            <tr>
                <td><strong>Tambilkan elemen dari dimensi yang dinilai</strong> dan tampilkan capaian/deskrisi</td>

                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>
                <td class="text-center">&check;</td>

            </tr>

        </tbody>
    </table>

    <table class="table table-bordered border-primary" style="margin-top:10px;">
        <tr>
            <th>Catatan Kegiatan</th>
        </tr>
        <tr>
            <td>{{($get_siswa->catatan_budaya_kerja) ? $get_siswa->catatan_budaya_kerja->catatan : '-'}}</td>
        </tr>
    </table>








    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>