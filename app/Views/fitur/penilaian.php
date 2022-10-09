<?= $this->extend('layout/index'); ?>
<?= $this->section('h_content'); ?>
<div class="main-content">
    <div class="title">
        <?= $title ?>
    </div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Input Penilaian</h4>
                    </div>
                    <div class="card-body">
                        <div class="container text-center">
                            <div class="row justify-content-md-center">
                                <div class="col-md-auto">
                                    <form action="<?= url_to('penilaian'); ?>" method="get" id="formkelas">
                                        <div class="mb-3">
                                            <label for="pilihkelas" class="form-label">Kelas</label>
                                            <select name="kelas" class="form-select" id="pilihkelas">
                                                <option disabled selected><?php
                                                                            if ($projek == null) {
                                                                                echo "Pilih Kelas";
                                                                            } else {
                                                                                echo $projek[0]['kelas_nama'];
                                                                            }
                                                                            ?>
                                                </option>
                                                <?php foreach ($kelas as $k) : ?>
                                                    <option value="<?= $k['kelas_id'] ?>"><?= $k['kelas_nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </form>
                                    <form action="<?= url_to('penilaian'); ?>" method="get" id="formprojek">
                                        <div class="mb-3">
                                            <label for="pilihprojek" class="form-label">Project</label>
                                            <select name="projek" class="form-select" id="pilihprojek">
                                                <option selected>Pilih Judul Project</option>
                                                <?php foreach ($projek as $p) : ?>
                                                    <option value="<?= $p['rencana_id'] ?>"><?= $p['nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Project</h4>
                    </div>
                    <div class="card-body">
                        <?php if (empty($pilih) == true) : ?>
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Data Tidak Ditemukan</h4>
                                <p>Maaf, data yang anda cari tidak ditemukan. Silahkan pilih kelas dan project yang sesuai.</p>
                                <hr>
                                <p class="mb-0">Jika anda yakin data yang anda cari sudah benar, silahkan hubungi admin.</p>
                            </div>
                        <?php else : ?>
                            <p>Kelas : <?= $pilih['nama_kelas'] ?></p>
                            <p>Project : <?= $pilih['nama_projek'] ?></p>
                            <?php if (($pilih['aspek_id'] == null) == false) : ?>
                                <form action="<?= url_to('input-nilai'); ?>" method="post" name="bejo">
                                    <?= csrf_field() ?>

                                    <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="align-middle">Nama</th>
                                                <th colspan="6" class="text-center">Aspek Penilaian</th>
                                            </tr>
                                            <tr>
                                                <?php
                                                foreach ($dimensi as $d) : ?>
                                                    <th class="text-center"><?= $d['nama_dimensi'] ?></th>
                                                <?php endforeach ?>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($siswa as $s) :
                                            ?>

                                                <tr>
                                                    <th scope="row" class="align-middle"><?= $s['siswa_nama'] ?>
                                                        <input type="hidden" name="siswa_id[]" value="<?= $s['siswa_id'] ?>">
                                                    </th>
                                                    <?php
                                                    foreach ($dimensi as $d) :

                                                        echo '<td>
                                                        <table class="table table-sm table-striped table-hover" >
                                                         <thead>
                                                        <tr>
                                                        <th class="text-start">Elemen</th>
                                                        <th class="text-start">Nilai</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        ';
                                                        foreach ($elemen as $e) :
                                                            if ($e['dimensi_id'] == $d['dimensi_id']) :
                                                    ?>
                                                <tr>
                                                    <td><?= $e['nama_elemen'] ?>
                                                        <input type="hidden" name="dimensi_id[]" value="<?= $e['dimensi_id'] ?>">
                                                        <input type="hidden" name="elemen_id[]" value="<?= $e['id_elemen'] ?>">
                                                        <input type="hidden" name="aspek_id[]" value="<?= $pilih['aspek_id'] ?>">
                                                        <input type="hidden" name="p_id[]" value="<?= $pilih['projek_id'] ?>">
                                                    </td>
                                                    <td>
                                                        <select class="form-select" name="opsi_id[]" aria-label="Default select example" id="select3" style="width: 80px;">
                                                            <option value="0" selected>-</option>
                                                            <?php foreach ($opsi as $o) : ?>
                                                                <option value="<?= $o['opsi_id'] ?>"><?= $o['kode_opsi'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                    <?php endif;
                                                        endforeach;
                                                        echo "
                                    </tr>
                                    </tbody>
                                    </table>
                                    </td>";
                                                    endforeach ?>

                                    </tr>
                                <?php endforeach ?>

                                        </tbody>
                                    </table>
                                    <input type="hidden" name="count" value="<?= $count_elemen ?>">
                                    <input type="hidden" name="count_siswa" value="<?= $count_siswa ?>">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            <?php else :  ?>
                                <div class="alert alert-warning" role="alert">
                                    <h4 class="alert-heading">Aspek Penilaian Kosong!</h4>
                                    <p>Aww yeah, Silahkan Set Aspek Penilain.</p>
                                    <hr>
                                    <p class="mb-0">Jika anda yakin data aspek penilaian sudah benar, silahkan hubungi admin.</p>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            //oncklick
            $('#pilihkelas').change(function() {
                $('#formkelas').submit();
            });
            $('#pilihprojek').change(function() {
                $('#formprojek').submit();
            });
        });
    </script>



</div>

<?= $this->endSection(); ?>