<ul>
    <li class="<?php if ($active === 'dashboard') {
                    echo 'active';
                } else echo '' ?>
    ">
        <a href="<?php if (in_groups('admin')) {
                        echo base_url('admin/dashboard');
                    } else {
                        echo base_url('guru/dashboard');
                    } ?>" class="link">
            <i class="ti-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="<?php if (!empty($active) && $active === 'data_sekolah' || $active === 'data_siswa' || $active === 'data_guru' || $active === 'data_akademik') {
                    echo 'active';
                } else echo '' ?>
    ">
        <a href="#" class="main-menu has-dropdown">
            <i class="ti-desktop"></i>
            <span>Data Master</span>
        </a>
        <ul class="sub-menu">
            <?php if (in_groups('admin')) : ?>
                <li class="<?php if ($active === 'data_sekolah') {
                                echo 'active';
                            } else echo '' ?>"><a href="<?= url_to('data-sekolah') ?>" class="link"><span>Data Sekolah</span></a></li>
                <li><a href="element-button.html" class="link"><span>Data Guru</span></a></li>
                <li><a href="element-tabs-collapse.html" class="link"><span>Data Akademik</span></a></li>
            <?php endif; ?>
            <li class="<?php if ($active === 'data_siswa') {
                            echo 'active';
                        } else echo '' ?>"><a href="<?= url_to('data-siswa') ?>" class="link"><span>Data Siswa</span></a></li>
            <li><a href="element-card.html" class="link"><span>Data Kelas</span></a></li>
            <li class="<?php if ($active === 'data_p5bk') {
                            echo 'active';
                        } else echo '' ?>"><a href="<?= url_to('data-p5bk') ?>" class="link"><span>Data p5bk</span></a></li>
        </ul>
    </li>

    <li class="<?php if (!empty($active) && $active === 'perencanaan' || $active === 'input_nilai' || $active === 'error_500') {
                    echo 'active';
                } else echo '' ?>">
        <a href="#" class="main-menu has-dropdown">
            <i class="ti-notepad"></i>
            <span>Penilaian P5Bk</span>
        </a>
        <ul class="sub-menu">
            <li class="<?php if ($active === 'data_sekolah') {
                            echo 'active';
                        } else echo '' ?>"><a href="<?php if (in_groups('admin')) {
                                                        echo url_to('admin-perencanaan');
                                                    } else {
                                                        echo url_to('guru-perencanaan');
                                                    } ?>" class="link"><span>Perencanaan</span></a></li>
            <li><a href="<?= url_to('penilaian'); ?>" class="link"><span>Input Nilai</span></a></li>
        </ul>
    </li>
    <li>
        <a href="#" class="main-menu has-dropdown">
            <i class="ti-book"></i>
            <span>Rapor</span>
        </a>
        <ul class="sub-menu ">
            <li><a href="form-element.html" class="link">
                    <span>Cetak Rapor</span></a>
            </li>
        </ul>
    </li>
    <?php if (in_groups('admin')) : ?>

    <?php endif; ?>

</ul>