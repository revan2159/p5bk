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
                <form action="<?= url_to('ubah-sekolah'); ?>" method="PUT">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="basicInput" class="form-label">Nama Sekolah</label>
                                <input type="text" placeholder="Input Here" class="form-control" id="basicInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="withHelperText" class="form-label">NPSN Sekolah</label>
                                <small class="text-muted">@description top</small>
                                <input type="text" class="form-control" id="withHelperText">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="disableInput" class="form-label">No Telepon</label>
                                <input type="password" disabled class="form-control" id="disableInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="withHelperTextBottom" class="form-label">E-Mail Sekolah</label>
                                <input type="text" class="form-control" id="withHelperTextBottom" aria-describedby="withHelperTextBottomHelp">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="readOnlyInput" class="form-label">Kode Pos</label>
                                <input type="text" value="You can't edit this value" class="form-control" readonly id="readOnlyInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="readOnlyInputPlain" class="form-label">Website Sekolah</label>
                                <input type="text" value="You can't edit this value" class="form-control" readonly id="readOnlyInputPlain">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Alamat Sekolah</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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