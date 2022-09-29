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
                        <h4>Perencanaan</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="float-end">
                            <button class="btn mb-2 btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verticalCenter" type="button"><i class="fas fa-plus"></i> Tambah Data</button>
                            <a href="<?= url_to('set-aspek'); ?>" class="btn mb-2 btn-primary btn-sm" type="button"><i class="fas fa-plus"></i> Set Aspek</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table display">
                        <thead>
                            <tr>
                                <th>Kelas</th>
                                <th>Nama Project</th>
                                <th>Deskripsi</th>
                                <th>jumlah Aspek dinilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($proyek as $row) :
                            ?>
                                <tr>
                                    <td><?= $row['kelas_nama']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['deskripsi'] ?></td>
                                    <td><?= $row['dimensi'] ?></td>
                                    <td><a href="phpp"></a></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="verticalCenter" tabindex="-1" aria-labelledby="verticalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalCenterLabel">Tambah Proyek</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?= url_to('tambah-rencana'); ?>" method="POST">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Project</label>
                                            <input type="text" class="form-control" id="nama" name="rencana_nama[]" placeholder="Nama Project">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kelas">Kelas</label>
                                            <select class="form-select" aria-label="Default select example" name="kelas_id[]" id="kelas">
                                                <option selected>Pilih Kelas</option>
                                                <?php foreach ($kelas as $row) : ?>
                                                    <option value="<?= $row['kelas_id']; ?>"><?= $row['kelas_nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi[]" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Project</label>
                                            <input type="text" class="form-control" id="nama" name="rencana_nama[]" placeholder="Nama Project">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kelas">Kelas</label>
                                            <select class="form-select" aria-label="Default select example" name="kelas_id[]" id="kelas">
                                                <option selected>Pilih Kelas</option>
                                                <?php foreach ($kelas as $row) : ?>
                                                    <option value="<?= $row['kelas_id']; ?>"><?= $row['kelas_nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi[]" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="setAspek" tabindex="-1" aria-labelledby="verticalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalCenterLabel">Aspek Penilaian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <?= $this->endSection(); ?>