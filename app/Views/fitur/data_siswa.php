<?= $this->extend('layout/index'); ?>
<?= $this->section('h_content'); ?>

<div class="main-content">
    <div class="title">
        <?= $title ?>
    </div>

    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Data Siswa</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="float-end">
                            <button class="btn mb-2 btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verticalCenter" type="button"><i class="fas fa-plus"></i> Tambah Data</button>
                            <!--<a href="<?= base_url('fitur/siswa/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <table id="example2" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($siswa as $s) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $s['siswa_nis'] ?></td>
                                    <td><?= $s['siswa_nama'] ?></td>
                                    <td><?= $s['siswa_kelas'] ?></td>
                                    <td><?= $s['siswa_status'] ?></td>
                                    <td>
                                        <a href="<?= base_url('fitur/siswa/edit/' . $s['siswa_id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="<?= base_url('fitur/siswa/delete/' . $s['siswa_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                             
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
            </div>
    </div>

</div>
<div class="modal fade" id="verticalCenter" tabindex="-1"
                            aria-labelledby="verticalCenterLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="verticalCenterLabel">Tambah Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet
                                        consequatur
                                        sint libero esse assumenda provident placeat sed porro ad iusto.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

<?= $this->endSection(); ?>