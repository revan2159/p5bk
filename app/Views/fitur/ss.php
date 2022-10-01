<div class="col-lg-12">
    <div class="col-lg-12">
        <h1 class="page-header">
            <b>Input</b>
            <small>Mutasi</small>
        </h1>

        <div>
            <form action="<?php echo site_url('mutasi/cari_pegawai'); ?>" method="post">
                <input class="form-control" style="float:left; width:300px; margin-right:4px;" name="caripegawai" placeholder="Cari Pegawai">
                <button type="submit" value="caripegawai" style="float:left" class="btn btn-primary"><i class="fa fa-fw fa-search"></i></button>
            </form>
            </br></br></br></br>
        </div>
        <!--<div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><i class="icon-user icon-large"></i>&nbsp;Edit Multiple</strong>&nbsp;check first the radio button to edit the data you want to edit
                                </div>-->
        <form name="bejo" action="<?php echo site_url('mutasi/insert_mutasi/'); ?>" method="post">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th><b>PILIH</b></th>
                        <th><b>NIP</b></th>
                        <th style="width:150px;"><b>NAMA PEGAWAI</b></th>
                        <th style="width:100px;"><b>ALAMAT</b></th>
                        <th><b>PANGKAT</b></th>
                        <th><b>JABATAN</b></th>
                        <th><b>JABATAN BARU</b></th>
                    </tr>
                </thead>
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $jabatans = $this->jabatan_model->get_paged_list()->result();
                $data['jabatans'] = $jabatans;
                foreach ($jabatans as $jabatan) {
                    $result[$jabatan->kode_jabatan] = $jabatan->nama_jabatan;
                }
                ?>
                <?php
                $data['pegawai'] = $pegawai;
                if (is_array($pegawai) && count($pegawai)) {
                    foreach ($pegawai as $p) {
                ?>
                        <tr>
                            <td><input type="checkbox" name="checked_id[]" class="checked_id" value="<?= $p->nip; ?>"></td>
                            <td><input class="form-control" name="nip[<?= $p->nip; ?>]" type="hidden" value="<?= $p->nip; ?>"><?= $p->nip; ?></td>
                            <td><input class="form-control" name="nama_pegawai[<?= $p->nip; ?>]" type="hidden" value="<?= $p->nama_pegawai; ?>"><?= $p->nama_pegawai; ?></td>
                            <td><input class="form-control" name="alamat[<?= $p->nip; ?>]" type="hidden" value="<?= $p->alamat; ?>"><?= $p->alamat; ?></td>
                            <td><input class="form-control" name="pangkat[<?= $p->nip; ?>]" type="hidden" value="<?= $p->pangkat; ?>"><?= $p->pangkat; ?></td>
                            <td><input class="form-control" name="kode_jabatan[<?= $p->nip; ?>]" type="hidden" value="<?= $p->kode_jabatan; ?>"><?= $p->kode_jabatan = $result[$p->kode_jabatan]; ?></td>
                            <td><select name="kode_jabatan_baru[<?= $p->nip; ?>]" class="form-control">
                                    <option style="display:none;" disabled selected>Jabatan Baru</option>
                                    <?php

                                    $newjabatans = $this->jabatan_baru_model->get_paged_list()->result();
                                    $data['newjabatans'] = $newjabatans;
                                    foreach ($newjabatans as $newjabatan) {
                                        $result[$newjabatan->kode_jabatan_baru] = $newjabatan->nama_jabatan;
                                        echo "<option value=' " . $newjabatan->kode_jabatan_baru . " ''>" . $newjabatan->nama_jabatan . "</option>";
                                    } ?>
                                </select></td>
                            <td><input type="hidden" name="tgl_mutasi[<?= $p->nip; ?>]" value="<?php echo date('Y-m-d H:i:s'); ?>"></td>
                        </tr>
                <?php
                    }
                } ?>

            </table>
            <input type="submit" style="float:right" id="submit" name="submit" value="Submit" class="btn btn-primary" />
        </form>
        </br></br></br></br>

        <?php echo $this->pagination->create_links(); ?></br>
        Halaman
        </br>

        <script type="text/javascript">
            var form = document.getElementById("bejo"),
                inputs = form.getElementsByTagName("input"),
                arr = [];

            for (var i = 0, max = inputs.length; i < max; i += 1) {
                // Take only those inputs which are checkbox
                if (inputs[i].type === "checkbox" && inputs[i].checked) {
                    arr.push(inputs[i].value);
                }
            }
        </script>