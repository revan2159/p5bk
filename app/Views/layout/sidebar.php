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

    <li class="<?php if (!empty($active) && $active === 'data_sekolah' || $active === 'data_siswa' || $active === 'data_guru' || $active === 'data_p5bk' || $active === 'data_kelas' || $active === 'data_mapel' || $active === 'data_jurusan' || $active === 'data_tahun_ajaran' || $active === 'data_semester' || $active === 'data_jadwal' || $active === 'data_absensi' || $active === 'data_nilai' || $active === 'data_pengumuman' || $active === 'data_pengguna' || $active === 'data_akun' || $active === 'data_akun_guru' || $active === 'data_akun_siswa' || $active === 'data_akun_p5bk') {
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
                <!-- <li><a href="element-tabs-collapse.html" class="link"><span>Data Akademik</span></a></li> -->
            <?php endif; ?>
            <li class="<?php if ($active === 'data-guru') {
                            echo 'active';
                        } else echo '' ?>"><a href="<?= url_to('data-guru') ?>" class="link"><span>Data Guru</span></a></li>
            <li class="<?php if ($active === 'data_siswa') {
                            echo 'active';
                        } else echo '' ?>"><a href="<?= url_to('data-siswa') ?>" class="link"><span>Data Siswa</span></a></li>
            <li class="<?php if ($active === 'data_kelas') {
                            echo 'active';
                        } else echo '' ?>"><a href="<?= url_to('data-kelas') ?>" class="link"><span>Data Kelas</span></a></li>
            <li class="<?php if ($active === 'data_p5bk') {
                            echo 'active';
                        } else echo '' ?>"><a href="<?= url_to('data-p5bk') ?>" class="link"><span>Data p5bk</span></a></li>
        </ul>
    </li>

    <li class="<?php if (!empty($active) && $active === 'perencanaan' || $active === 'penilaian') {
                    echo 'active';
                } else echo '' ?>">
        <a href="#" class="main-menu has-dropdown">
            <i class="ti-notepad"></i>
            <span>Penilaian P5Bk</span>
        </a>
        <ul class="sub-menu">
            <li class="<?php if ($active === 'perencanaan') {
                            echo 'active';
                        } else echo '' ?>"><a href="<?= url_to('perencanaan') ?>" class="link"><span>Perencanaan</span></a></li>
            <li class="<?php if ($active === 'penilaian') {
                            echo 'active';
                        } else echo '' ?>"><a href="<?= url_to('penilaian'); ?>" class="link"><span>Input Nilai</span></a></li>
        </ul>
    </li>
    <li class="<?php if (!empty($active) && $active === 'laporan') {
                    echo 'active';
                } else echo '' ?>">
        <a href="#" class="main-menu has-dropdown">
            <i class="ti-book"></i>
            <span>Rapor</span>
        </a>
        <ul class="sub-menu ">
            <li class="<?php if ($active === 'laporan') {
                            echo 'active';
                        } else echo '' ?>"><a href="<?= url_to('laporan') ?>" class="link">
                    <span>Laporan</span></a>
            </li>
        </ul>
    </li>
    <?php if (in_groups('admin')) : ?>

    <?php endif; ?>

</ul>