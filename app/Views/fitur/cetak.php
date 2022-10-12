<?= $this->extend('layout/cetak'); ?>
<?= $this->section('cetak_page'); ?>
<h3 class="strong">RAPOR PROJEK PROFIL PELAJAR PANCASILA DAN BUDAYA KERJA</h3>
<!-- Table Identitas -->

<table>
    <tr>
        <th style="width: 15%">Nama Sekolah</th>
        <th style="width: 25%">: SMK Kesehatan Rahani Husada</th>
        <th style="width: 5%"></th>
        <th style="width: 15%">Kelas</th>
        <th style="width: 20%">: <?= $siswa['kelas_nama'] ?></th>
    </tr>
    <tr>
        <th>Program Keahlian</th>
        <th>: Layanan Kesehatan</th>
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
    <tr>
        <th>NIS</th>
        <th>: <?= $siswa['siswa_nis'] ?></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
</table>

<!-- Table Project -->
<table class="table" style="margin-top: 10px;">
    <?php
    $no = 1;
    foreach ($rencana as $item) :
    ?>
        <tr>
            <td class="strong"><strong>Projek <?= $no++ ?> | <?= $item['nama'] ?></strong></td>
        </tr>
        <tr>
            <td><?= $item['deskripsi'] ?></td>
        </tr>
    <?php endforeach ?>
</table>
<!-- Table Opsi -->
<table class="table" style="margin-top: 10px;">
    <tr>
        <?php
        foreach ($opsi as $item) :
        ?>
            <td style="width: 10px">
                <div class="badge bg-<?= $item['opsi_warna'] ?>">&nbsp;&nbsp;</div>
            </td>
            <td>
                <strong class="strong"><?= $item['kode_opsi'] ?>. <?= $item['nama_opsi'] ?></strong><br>
                <?= $item['deskripsi_opsi'] ?>
            </td>
        <?php endforeach ?>
    </tr>
</table>
<!-- Table 2 -->
<table class="table table-bordered table-striped" style="margin-top: 10px;">
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
                    echo '<td class="text-center">';
                    foreach ($nilai as $n) {
                        if ($n['dimensi_id'] == $item['id_dimensi'] && $n['rencana_id'] == $projek['rencana_id']) {
                            $avg = 0;
                            $count = 0;
                            foreach ($nilai as $n2) {
                                if ($n2['dimensi_id'] == $item['id_dimensi']) {
                                    $avg += $n2['opsi_id'];
                                    $count++;
                                }
                            }
                            $avg = $avg / $count;
                            $avg = round($avg, 0, PHP_ROUND_HALF_UP);

                            if (!$avg) {
                                $predikat     = '-';
                            } elseif ($avg >= 4) {
                                $predikat     = '<span class="badge bg-green">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
                            } elseif ($avg >= 3) {
                                $predikat     = '<span class="badge bg-red">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
                            } elseif ($avg >= 2) {
                                $predikat     = '<span class="badge bg-blue">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
                            } elseif ($avg >= 1) {
                                $predikat     = '<span class="badge bg-yellow">&nbsp;&nbsp;&nbsp;&nbsp;</span>';
                            }
                            //show 1 data only
                            echo $predikat;
                            break;
                        }
                    }
                    echo '</td>';
                ?>
                <?php endforeach
                ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$no = 1;
foreach ($rencana as $itm) : ?>
    <table class="table table-bordered table-striped" style="margin-top: 10px;">
        <thead>
            <tr>
                <th>Projek <?= $no++ ?> | <?= $itm['nama'] ?></th>
                <?php foreach ($opsi as $p) : ?>
                    <th style="width: 100px;" class="text-center"><?= $p['kode_opsi'] ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($aspek as $item) :
                if ($item['rencana_id'] == $itm['rencana_id']) :
                    foreach ($dimensi as $budaya) :
                        if ($item['dimensi_id'] == $budaya['id_dimensi']) :
            ?>
                            <tr>
                                <td colspan="7"><strong class="strong"><?= $budaya['nama_dimensi'] ?></strong></td>
                            </tr>
                            <?php
                            foreach ($elemen as $e) :
                                //if dimensi id == elemen dimensi id
                                if ($e['dimensi_id'] == $budaya['id_dimensi']) :
                            ?>
                                    <tr>
                                        <td><strong class="strong"><?= $e['nama_elemen'] ?>.</strong> <?= $e['elemen_deskripsi'] ?></td>
                                        <?php
                                        foreach ($opsi as $p) : ?>
                                            <td class="text-center strong">
                                                <?php
                                                foreach ($nilai as $n) :
                                                    if ($n['elemen_id'] == $e['id_elemen'] && $n['opsi_id'] == $p['opsi_id']) :
                                                        //echo tick
                                                        echo '<div style="font-family:sans-serif;font-size: 15pt;">&#10003;</div>';
                                                    endif;
                                                endforeach;
                                                ?>
                                            </td>

                                        <?php
                                        endforeach; ?>
                                    </tr>
                            <?php
                                endif;
                            endforeach;
                            ?>
                            </tr>
            <?php
                        endif;
                    endforeach;
                endif;
            endforeach;
            ?>
        </tbody>
    </table>

<?php endforeach; ?>

<table class="table table-bordered table-striped" style="margin-top: 10px;">
    <tr>
        <th>Catatan Kegiatan</th>
    </tr>
    <tr>
        <td><?= $catatan['catatan'] ?></td>
    </tr>
</table>
<?= $this->endSection(); ?>