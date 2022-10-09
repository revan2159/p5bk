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
                                    echo '<li><a class="dropdown-item" href="' . base_url('capaian/' . $d->id_dimensi)  . '">' . $d->nama_dimensi . ' </a></li>';
                                }
                                ?>
                            </ul>

                        </div>
                    </div>
                    <div class="col-md-6">

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
                        echo '<div class="alert alert-warning" role="alert">
                                    <h4 class="alert-heading">Stop!</h4>
                                    <p>Aww yeah, Silahkan Pilih Dimensi.</p>
                                </div>';
                    endif
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>