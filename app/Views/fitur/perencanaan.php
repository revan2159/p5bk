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
                            <button class="btn mb-2 btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#setAspek" type="button"><i class="fas fa-plus"></i> Set Aspek Penilaian</button>
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
                                    <td>
                                        <!-- <a href="<?= base_url('') . $row['rencana_id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a> -->
                                        <button class="btn btn-sm btn-danger" id="swall-confirmation_<?= $row['rencana_id'] ?>" type="button"><i class="fas fa-trash"></i></button>
                                        <script>
                                            const confirmation = document.getElementById('swall-confirmation_<?= $row['rencana_id'] ?>')
                                            confirmation.addEventListener('click', function() {
                                                Swal.fire({
                                                    title: 'Apakah anda yakin?',
                                                    text: "Ini akan menghapus data nilai siswa yang sudah diinputkan!",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Ya, hapus data!'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        //delete data
                                                        window.location.href = "<?= base_url('admin/perencanaan/' . $row['rencana_id'])  ?>";
                                                        Swal.fire(
                                                            'Berhasil!',
                                                            'Data berhasil dihapus.',
                                                            'success'
                                                        )
                                                    }
                                                })
                                            })
                                        </script>

                                    </td>
                                </tr>
                            <?php endforeach;

                            ?>

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
                                                <option value="" selected>Pilih Kelas</option>
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
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
                    <div class="row mb-3">
                        <form action="<?= url_to('simpan-aspek'); ?>" method="post">
                            <div class="col-md-12">
                                <h4 class="text-center">Pilih Judul Project</h4>
                                <div class="d-flex justify-content-center">
                                    <select class="form-select" aria-label="Default select example" name="project_id[]" style="width: 300px;">
                                        <option value="0" selected>Pilih Project</option>
                                        <?php
                                        foreach ($project as $p) : ?>
                                            <option value="<?= $p['rencana_id']; ?>"><?= $p['nama']; ?></option>
                                        <?php endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 pt-2">
                                <h4 class="text-center">Pilih Aspek Penilaian</h4>
                                <p class="text-center">boleh pilih lebih dari satu</p>
                                <?php
                                $i = 1;
                                foreach ($dimensi as $d) : ?>
                                    <input class="btn-check" type="checkbox" name="dimensi_id[]" value="<?= $d->id_dimensi; ?>" id="<?= $d->id_dimensi; ?>" autocomplete="off">
                                    <label class="btn btn-sm btn-outline-primary m-1 " for="<?= $d->id_dimensi; ?>">
                                        <?= $d->nama_dimensi; ?>
                                    </label>
                                <?php endforeach;
                                ?>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>