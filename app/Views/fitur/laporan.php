<?= $this->extend('layout/index'); ?>
<?= $this->section('h_content'); ?>

<div class="main-content">
    <div class="title">
        <?= $title ?>
    </div>
    <div class="content-wrapper">


        <div class="card">
            <div class="card-header">
                <h4>Cetak Rapor P5BK</h4>
            </div>
            <div class="card-body">
                <!-- <p class="form-text mb-2">Datatables also provide responsive table</p> -->
                <table id="example2" class="table display">
                    <thead>
                        <tr>
                            <th>Nama Perserta Didik</th>
                            <th>Catatan Kegiatan</th>
                            <th>Lihat Nilai</th>
                            <th>Rapor P5BK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allnilai as $nilai) : ?>
                            <tr>
                                <td><?= $nilai['siswa_nama'] ?></td>
                                <td><?php
                                    $catatan = new \App\Models\CatatanModel();
                                    $getcatatan = $catatan->getCatatanbyidsiswa($nilai['siswa_id']);
                                    if (!empty($getcatatan)) {
                                        echo '
                                        <textarea class="form-control" rows="2" readonly>' . $getcatatan[0]['catatan'] . '</textarea>
                                        <button class="btn btn-sm mt-2 btn-primary" data-bs-toggle="modal" data-bs-target="#catatan_' . $getcatatan[0]['id_catatan'] . '" type="button">Edit Catatan</button>
                                        ';
                                    } else {
                                        echo '
                                        <button class="btn btn-sm mt-2 btn-primary" data-bs-toggle="modal" data-bs-target="#tambahcatatan_' . $nilai['siswa_id'] . '" type="button">Tambah Catatan</button>
                                        ';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('nilai/lihat_nilai/' . $nilai['siswa_id']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url('laporan/cetak/' . $nilai['siswa_id']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Cetak</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>

        <?php
        foreach ($allnilai as $nilai) :
            $catatan = new \App\Models\CatatanModel();
            $getcatatan = $catatan->getCatatanbyidsiswa($nilai['siswa_id']);
            if (!empty($getcatatan)) :
        ?>
                <div class="modal fade" id="catatan_<?= $getcatatan[0]['id_catatan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Catatan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= url_to('update-catatan') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id_catatan" value="<?= $getcatatan[0]['id_catatan'] ?>">
                                    <div class="form-group">
                                        <label for="catatan">Catatan</label>
                                        <textarea class="form-control" name="catatan" id="catatan" rows="3"><?= $getcatatan[0]['catatan'] ?></textarea>
                                    </div>
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="modal fade" id="tambahcatatan_<?= $nilai['siswa_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Catatan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= url_to('tambah-catatan') ?>" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" name="id_siswa" value="<?= $nilai['siswa_id'] ?>">
                                <div class="form-group">
                                    <label for="catatan">Catatan</label>
                                    <textarea class="form-control" name="catatan" id="catatan" rows="3"></textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        endforeach; ?>



    </div>
</div>
<?= $this->endSection(); ?>