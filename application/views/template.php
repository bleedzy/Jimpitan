<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jimpitan</title>
    <link rel="stylesheet" href="<?= base_url('assets/skydash/') ?>vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url('assets/skydash/') ?>vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/skydash/') ?>vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url('assets/skydash/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/skydash/') ?>js/select.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/skydash/') ?>css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="<?= base_url('assets/skydash/') ?>images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="<?= base_url('assets/skydash/') ?>index.html"><img src="<?= base_url('assets/skydash/') ?>images/logo.svg" class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="<?= base_url('assets/skydash/') ?>index.html"><img src="<?= base_url('assets/skydash/') ?>images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item">
                        Today (<?= date('d') . ' ' . date('M') . ' ' . date('Y') ?>)
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dashboard') ?>">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Bulan Ini</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('month') ?>">
                            <i class="ti-layout-grid2-alt menu-icon"></i>
                            <span class="menu-title">Bulan Lain</span>
                        </a>
                    </li>
                    <?php if (!isset($today)) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('add') ?>">
                                <i class="ti-pencil-alt menu-icon"></i>
                                <span class="menu-title">Tambah</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <?= $contents ?>
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/skydash/') ?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= base_url('assets/skydash/') ?>vendors/chart.js/Chart.min.js"></script>
    <script src="<?= base_url('assets/skydash/') ?>vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="<?= base_url('assets/skydash/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url('assets/skydash/') ?>js/dataTables.select.min.js"></script>
    <script src="<?= base_url('assets/skydash/') ?>js/off-canvas.js"></script>
    <script src="<?= base_url('assets/skydash/') ?>js/hoverable-collapse.js"></script>
    <script src="<?= base_url('assets/skydash/') ?>js/template.js"></script>
    <script src="<?= base_url('assets/skydash/') ?>js/settings.js"></script>
    <script src="<?= base_url('assets/skydash/') ?>js/todolist.js"></script>
    <script src="<?= base_url('assets/skydash/') ?>js/dashboard.js"></script>
    <script src="<?= base_url('assets/skydash/') ?>js/Chart.roundedBarCharts.js"></script>

    <script>
        $.fn.dataTable.ext.errMode = 'throw';

        $('#example').DataTable({
            "ajax": {
                "url": "<?= base_url() ?>",
                "dataSrc": "",
                "error": function(xhr, error, thrown) {
                    console.log("Error:", error);
                    console.log("Thrown:", thrown);
                    console.log(xhr.responseText);
                }
            }
        });
    </script>
</body>

</html>