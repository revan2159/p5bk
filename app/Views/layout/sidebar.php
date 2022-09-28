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
    <li class="<?php if (!empty($active)) {
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
        </ul>
    </li>

    <li>
        <a href="#" class="main-menu has-dropdown">
            <i class="ti-notepad"></i>
            <span>Penilaian P5Bk</span>
        </a>
        <ul class="sub-menu">
            <li><a href="error-404.html" target="_blank" class="link"><span>Perencanaan</span></a></li>
            <li><a href="error-403.html" target="_blank" class="link"><span>Input Nilai</span></a></li>
            <li><a href="error-500.html" target="_blank" class="link"><span>Error 500</span></a></li>
        </ul>
    </li>
    <li>
        <a href="#" class="main-menu has-dropdown">
            <i class="ti-book"></i>
            <span>Rapor</span>
        </a>
        <ul class="sub-menu ">
            <li><a href="form-element.html" class="link">
                    <span>Form Element</span></a>
            </li>
            <li><a href="form-datepicker.html" class="link">
                    <span>Datepicker</span></a>
            </li>
            <li><a href="form-select2.html" class="link">
                    <span>Select2</span></a>
            </li>
        </ul>
    </li>
    <?php if (in_groups('admin')) : ?>
        <li>
            <a href="#" class="main-menu has-dropdown">
                <i class="ti-layers-alt"></i>
                <span>Pages</span>
            </a>
            <ul class="sub-menu ">
                <li><a href="pages-blank.html" class="link"><span>Blank</span></a></li>
            </ul>
        </li>
    <?php endif; ?>
    <li>
        <a href="#" class="main-menu has-dropdown">
            <i class="ti-hummer"></i>
            <span>Auth</span>
        </a>
        <ul class="sub-menu">
            <li><a href="auth-login.html" target="_blank" class="link"><span>Login</span></a></li>
            <li><a href="auth-register.html" target="_blank" class="link"><span>Register</span></a></li>
        </ul>
    </li>
    <li>
        <a href="#" class="main-menu has-dropdown">
            <i class="ti-write"></i>
            <span>Tables</span>
        </a>
        <ul class="sub-menu ">
            <li><a href="table-basic.html" class="link"><span>Table Basic</span></a></li>
            <li><a href="table-datatables.html" class="link"><span>DataTables</span></a></li>
        </ul>
    </li>
    <li>
        <a href="charts.html" class="link">
            <i class="ti-bar-chart"></i>
            <span>Charts</span>
        </a>
    </li>
</ul>