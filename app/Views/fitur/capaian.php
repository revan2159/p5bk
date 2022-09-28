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
                        <div class="dropdown mb-3">
                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Pilih Dimensi
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <?php
                                foreach ($dimensi as $d) {
                                    echo '<li><a class="dropdown-item" href="' . base_url('admin/capaian/' . $d->id_dimensi)  . '">' . $d->nama_dimensi . ' </a></li>';
                                }
                                ?>
                            </ul>

                        </div>
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
                <div class="row">
                    <div class="col-md-12">

                    </div>
                    <?php
                    //if emty $p5bk

                    if (!empty($p5bk)) : ?>

                        <table id="example2" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Elemen</th>
                                    <th>Sub Elemen</th>
                                    <th>Capaian Fase E</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($p5bk as $p) :  ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $p->nama_elemen; ?></td>
                                        <td><?= $p->nama_sub_elemen; ?></td>
                                        <td><?= $p->capaian; ?></td>
                                    </tr>
                                <?php endforeach ?>


                            </tbody>
                        </table>

                    <?php else :
                        echo '<div class="alert alert-danger" role="alert">'
                            . 'Silahkan Pilih Dimensi Terlebih Dahulu'
                            . '</div>';

                    endif

                    ?>

                </div>
            </div>

        </div>
        <div class="modal fade" id="verticalCenter" tabindex="-1" aria-labelledby="verticalCenterLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verticalCenterLabel">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet
                        consequatur
                        sint libero esse assumenda provident placeat sed porro ad iusto.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->endSection(); ?>