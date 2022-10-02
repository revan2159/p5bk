<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard &mdash; Arfa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/perfect-scrollbar/css/perfect-scrollbar.css">

    <!-- CSS for this page only -->
    <link rel="stylesheet" href="<?= base_url(); ?>/vendor/chart.js/dist/Chart.min.css">
    <!-- CSS for this page only -->
    <link href="<?= base_url(); ?>/vendor/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/vendor/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" />
    <!-- End CSS  -->

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap-override.min.css">
    <link rel="stylesheet" id="theme-color" href="<?= base_url(); ?>/assets/css/dark.min.css">
    <script src="<?= base_url(); ?>/vendor/jquery/dist/jquery.min.js"></script>
</head>

<body>
    <div id="app">
        <div class="shadow-header"></div>

        <?= $this->include('layout/topbar') ?>

        <nav class="main-sidebar ps-menu">
            <div class="sidebar-toggle action-toggle">
                <a href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
            <div class="sidebar-opener action-toggle">
                <a href="#">
                    <i class="ti-angle-right"></i>
                </a>
            </div>
            <div class="sidebar-header">
                <div class="text">KESRADA</div>
                <div class="close-sidebar action-toggle">
                    <i class="ti-close"></i>
                </div>
            </div>

            <div class="sidebar-content">
                <?= $this->include('layout/sidebar') ?>
            </div>

        </nav>
        <!-- Halaman Konten -->
        <?= $this->renderSection('h_content') ?>
        <!-- End Halaman Konten -->
        <div class="settings">
            <div class="settings-icon-wrapper">
                <div class="settings-icon">
                    <i class="ti ti-settings"></i>
                </div>
            </div>
            <div class="settings-content">
                <ul>
                    <li class="fix-header">
                        <div class="fix-header-wrapper">
                            <div class="form-check form-switch lg">
                                <label class="form-check-label" for="settingsFixHeader">Fixed Header</label>
                                <input class="form-check-input toggle-settings" name="Header" type="checkbox" id="settingsFixHeader">
                            </div>

                        </div>
                    </li>
                    <li class="fix-footer">
                        <div class="fix-footer-wrapper">
                            <div class="form-check form-switch lg">
                                <label class="form-check-label" for="settingsFixFooter">Fixed Footer</label>
                                <input class="form-check-input toggle-settings" name="Footer" type="checkbox" id="settingsFixFooter">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="theme-switch">
                            <label for="">Theme Color</label>
                            <div>
                                <div class="form-check form-check-inline lg">
                                    <input class="form-check-input lg theme-color" type="radio" name="ThemeColor" id="light" value="light">
                                    <label class="form-check-label" for="light">Light</label>
                                </div>
                                <div class="form-check form-check-inline lg">
                                    <input class="form-check-input lg theme-color" type="radio" name="ThemeColor" id="dark" value="dark">
                                    <label class="form-check-label" for="dark">Dark</label>
                                </div>

                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="fix-footer-wrapper">
                            <div class="form-check form-switch lg">
                                <label class="form-check-label" for="settingsFixFooter">Collapse Sidebar</label>
                                <input class="form-check-input toggle-settings" name="Sidebar" type="checkbox" id="settingsFixFooter">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <footer>
            Copyright © <?= date('Y') ?>
            &nbsp <a href="https://smkkes-rahanihusada-klt.sch.id/" target="_blank" class="ml-1"> KESRADA </a> <span> . All rights Reserved</span>
        </footer>
        <div class="overlay action-toggle">
        </div>
    </div>
</body>
<script src="<?= base_url(); ?>/vendor/bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="<?= base_url(); ?>/vendor/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>

<!-- js for this page only -->
<script src="<?= base_url(); ?>/vendor/chart.js/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="<?= base_url(); ?>/assets/js/page/index.js"></script>
<!-- js for this page only -->

<script src="<?= base_url(); ?>/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/page/datatables.js"></script>
<!-- ======= -->
<script src="<?= base_url(); ?>/assets/js/main.js"></script>
<script>
    Main.init()
</script>


<script>
    DataTable.init()
</script>

</html>