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
                        <h4>Data Kelas</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="float-end">
                            <?php if (in_groups('admin')) : ?>
                                <button class="btn mb-2 btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#importdata" type="button"><i class="fas fa-plus"></i> Import Data</button>
                                <button class="btn mb-2 btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#verticalCenter" type="button"><i class="fas fa-plus"></i> Tambah Data</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example2" class="table display">
                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Program Keahlian</th>
                            <th>Jumlah Siswa</th>
                            <?php if (in_groups('admin')) : ?>
                                <th>Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($kelas as $s) : ?>
                            <tr>
                                <td><?= $s['kelas_nama'] ?></td>
                                <td><?= $s['kelas_jurusan'] ?></td>
                                <td><?= $s['jumlah_siswa'] ?></td>
                                <?php if (in_groups('admin')) : ?>
                                    <td>
                                        <a href="<?= base_url('fitur/siswa/edit/' . $s['kelas_id']) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="<?= base_url('fitur/siswa/delete/' . $s['kelas_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="modal fade" id="verticalCenter" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">Attention!</h4>
                        <p>Maaf Fitur ini belum tersedia.</p>
                        <hr>
                        <p class="mb-0">Silahkan gunakan Fitur Import Data.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#importdata" data-bs-toggle="modal">Import Data</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="importdata" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Import Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading">Attention!</h4>
                        <p>Saat ini fitur impor data siswa hanya bisa melalui file excel.</p>
                        <hr>
                        <p class="mb-0">Pastikan data yang akan diimpor sudah benar.</p>
                    </div>
                    <form action="<?= base_url('fitur/siswa/import') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="input-group">
                            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Import</button>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#verticalCenter" data-bs-toggle="modal">Manual Add</button>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>