<?= $this->extend('layout/index'); ?>
<?= $this->section('h_content'); ?>

<div class="main-content">
    <div class="title">
        <?= $title ?>
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Identitas Sekolah</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Nama Sekolah</th>
                                <td>:</td>
                                <td><?= $identitas['sekolah_nama'] ?></td>
                            </tr>
                            <tr>
                                <th>NPSN</th>
                                <td>:</td>
                                <td><?= $identitas['sekolah_npsn'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td><?= $identitas['sekolah_alamat'] ?></td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>:</td>
                                <td><?= $identitas['sekolah_telepon'] ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td>
                                    <a href="mailto:<?= $identitas['sekolah_email'] ?>"><?= $identitas['sekolah_email'] ?></a>
                                </td>
                            </tr>
                            <tr>
                                <th>Website</th>
                                <td>:</td>
                                <td>
                                    <a href="<?= $identitas['sekolah_website'] ?>"><?= $identitas['sekolah_website'] ?></a>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Logo Sekolah</h4>
                    </div>
                    <div class="card-body">
                        <img class="img-thumbnail rounded mx-auto d-block mb-3" src="https://smkkes-rahanihusada-klt.sch.id/wp-content/uploads/2018/05/rahani.png" alt="" width="200">

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>