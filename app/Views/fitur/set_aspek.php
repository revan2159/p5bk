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
                        <h4>Set Penilaian</h4>
                    </div>
                    <div class="col-md-6">
                        <div class="float-end">
                            <a href="<?= url_to('admin-perencanaan'); ?>" class="btn mb-2 btn-primary btn-sm" type="button">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table display">
                        <thead>
                            <tr>
                                <th>Projec</th>
                                <th>First</th>
                                <th>Last</th>
                                <th>Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    <?= $this->endSection(); ?>