<?= $this->extend('layout/index'); ?>
<?= $this->section('h_content'); ?>

<div class="main-content">
    <div class="title">
        <?= $title ?>
    </div>

    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h4>Ubah Data</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $field => $error) : ?>
                            <p><?= $error ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                <form action="<?= url_to('ubah-sekolah'); ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="basicInput" class="form-label">Nama Sekolah</label>
                                <input type="text" name="nama" placeholder="<?= $sekolah['sekolah_nama'] ?>" value="<?= $sekolah['sekolah_nama'] ?>" class="form-control" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="withHelperText" class="form-label">NPSN Sekolah</label>
                                <input type="text" name="npsn" placeholder="<?= $sekolah['sekolah_npsn'] ?>" value="<?= $sekolah['sekolah_npsn'] ?>" class="form-control" id="withHelperText">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="disableInput" class="form-label">No Telepon</label>
                                <input type="text" name="no_telp" placeholder="<?= $sekolah['sekolah_telepon'] ?>" value="<?= $sekolah['sekolah_telepon'] ?>" class="form-control" id="disableInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="withHelperTextBottom" class="form-label">E-Mail Sekolah</label>
                                <input type="email" name="email" class="form-control" id="withHelperTextBottom" placeholder="<?= $sekolah['sekolah_email'] ?>" value="<?= $sekolah['sekolah_email'] ?>" aria-describedby="withHelperTextBottomHelp">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="readOnlyInput" class="form-label">Kode Pos</label>
                                <input type="number" name="kode_pos" placeholder="<?= $sekolah['sekolah_kodepos'] ?>" value="<?= $sekolah['sekolah_kodepos'] ?>" class="form-control" id="readOnlyInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="readOnlyInputPlain" class="form-label">Website Sekolah</label>
                                <input type="text" name="website" placeholder="<?= $sekolah['sekolah_website'] ?>" value="<?= $sekolah['sekolah_website'] ?>" class="form-control" id="readOnlyInputPlain">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat Sekolah</label>
                                <textarea class="form-control" name="alamat" placeholder="<?= $sekolah['sekolah_alamat'] ?>" id="exampleFormControlTextarea1" rows="3"><?= $sekolah['sekolah_alamat'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Logo</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>