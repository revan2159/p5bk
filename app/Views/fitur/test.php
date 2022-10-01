<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    <form action="<?= base_url('test/') ?>" method="get" id="form1">
        <select class="select1" name="kelas" id="selectid">
            <option selected disabled><?php if (empty($pilih) == false) {
                                            echo $pilih['kelas_nama'];
                                        } else {
                                            echo "Pilih Kelas";
                                        }
                                        ?>
            </option>

            <?php foreach ($kelas as $k) : ?>
                <option value="<?= $k['kelas_id'] ?>"><?= $k['kelas_nama'] ?></option>
            <?php endforeach; ?>
        </select>
    </form>

    <form action="<?= base_url('test/') ?>" method="get" id="form2">

        <input type="hidden" name="kelas" value="<?= $id_kelas ?>">
        <select class="form-select" aria-label="Default select example" name="projek" id="select2">
            <option selected>Pilih Project</option>
            <?php foreach ($project as $p) : ?>
                <option value="<?= $p['rencana_id'] ?>"><?= $p['nama'] ?></option>
            <?php endforeach; ?>
        </select>
    </form>



    <form action="<?= url_to('input-nilai'); ?>" method="post" name="bejo">
        <?= csrf_field() ?>

        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th rowspan="2">Nama</th>
                    <th colspan="6">Aspek Penilaian</th>
                </tr>
                <tr>
                    <?php
                    foreach ($dimensi as $d) : ?>
                        <th><?= $d['nama_dimensi'] ?></th>

                    <?php endforeach ?>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($siswa as $s) :
                ?>

                    <tr>
                        <th scope="row"><?= $s['siswa_nama'] ?>
                            <input type="hidden" name="siswa_id[]" value="<?= $s['siswa_id'] ?>">
                        </th>
                        <?php
                        foreach ($dimensi as $d) :

                            echo '<td>
                    <input type="hidden" name="dimensi_id[]" value="' . $d['dimensi_id'] . '">
                    <input type="hidden" name="aspek_id[]" value="' . $d['aspek_id'] . '">
                    <table>
                        <tr>
                            <th scope="col">Elemen</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    ';
                            foreach ($elemen as $e) :
                                if ($e['dimensi_id'] == $d['dimensi_id']) :
                        ?>
                    <tr>
                        <td><?= $e['nama_elemen'] ?>
                            <input type="hidden" name="elemen_id[]" value="<?= $e['id_elemen'] ?>">
                        </td>
                        <td>
                            <select class="form-select" name="opsi_id[]" aria-label="Default select example" id="select3">
                                <option selected>-</option>
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
                                    </table>
                                    </td>";
                        endforeach ?>


        </tr>

    <?php
                endforeach
    ?>


            </tbody>
        </table>

        <input type="hidden" name="count" value="<?= $count ?>">
        <input type="hidden" name="count_siswa" value="<?= $count_siswa ?>">
        <input type="hidden" name="count_dimensi" value="<?= $count_dimensi ?>">
        <input type="hidden" name="count_aspek" value="<?= $count_aspek ?>">

        <input type="hidden" name="count_opsi" value="<?= $count_opsi ?>">

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

<script>
    $(document).ready(function() {
        //auto submit
        $('#selectid').change(function() {
            $('#form1').submit();
        });
        $('#select2').change(function() {
            $('#form2').submit();
        });

        //

    });
</script>
<script>

</script>

</html>