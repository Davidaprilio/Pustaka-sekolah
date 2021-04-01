<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Administrators</title>
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/fonts/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/admin/css/styles.min.css') ?>">
    <script src="<?= base_url('/js/jquery-3.5.1.min.js') ?>"></script>
</head>
<body class="sb-nav-fixed dark">
    <nav class="navbar navbar-dark navbar-expand shadow-sm sticky-top bg-dark sb-topnav py-0 border-bottom border-warning">
        <div class="container-fluid">
            <button class="btn btn-link btn-sm text-light order-1 order-md-2" id="sidebarToggle" type="button">
                <i class="fa fa-bars" style="font-size: 20px;"></i>
            </button>
            <a href="<?= base_url('/'); ?>" class="order-3">
            <button class="btn btn-link btn-sm text-light d-none d-sm-inline-block" type="button">
                <i class="fa fa-home" style="font-size: 20px;"></i>
            </button></a>
            <a class="navbar-brand order-2 order-md-1" href="/Administrator" style="width: 50%;min-width: 200px;max-width: 255px;">
                <img src="/img/SMKN%201%20Tanjunganom-logo.png" style="width: 28px;margin-right: 10px;border-width: 3px;border-style: solid;border-radius: 8px;">
                <span class="d-none d-sm-inline-block">SMeKTa Administrator</span>
                <span class="d-sm-none">&nbsp;Admin SMeKTa</span>
            </a>
            <form class="form-inline d-none d-md-inline-block order-2 ml-auto mr-0 mr-md-3 my-2 my-md-0 w-50 order-4">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder=" Search for ...">
                    <div class="input-group-append">
                        <button class="btn btn-light" type="button" style="border-style: none;">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <ul class="nav navbar-nav text-right d-flex order-5 ml-auto ml-md-0">
                <li class="nav-item dropdown d-md-none no-arrow py-1">
                    <a data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle nav-link mr-3" href="#">
                        <i class="fa fa-search" style="font-size: 25px;"></i>
                    </a>
                    <div role="menu" class="dropdown-menu dropdown-menu-right p-1 mt-3 mr-n5 animated--grow-in" aria-labelledby="searchDropdown" style="width: 300px;">
                        <form class="form-inline navbar-search">
                            <div class="input-group">
                                <input type="text" class="bg-light form-control border-0 small" placeholder="Search for ..." />
                                <div class="input-group-append">
                                    <button class="btn bg-light py-0" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item float-right justify-content-end align-items-center" role="presentation">
                    <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle active text-white" data-toggle="dropdown" aria-expanded="false" href="#">
                            <img class="rounded-circle border-secondary" src="<?= base_url('/img/').'/'.$admin['foto']?>" style="width: 8vw; max-width: 40px; border: 2px solid;">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow" role="menu" style="margin-top: 16px;padding-left: 13px;">
                            <a class="dropdown-item" role="presentation" href="#">Pengaturan</a>
                            <a class="dropdown-item" role="presentation" href="#">Log Aktivitas</a>
                            <a class="dropdown-item" role="presentation" href="#">Pelanggaran</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" role="presentation" href="<?= base_url('/Engine/out?to=http://project.localhost/Administrator') ?>">Keluar</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <div id="sidenavAccordion" class="sb-sidenav accordion sb-sidenav-dark">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="mt-4">
                            <a class="nav-link" href="<?= base_url('/Administrator/dashboard'); ?>">
                                <div class="sb-nav-link-icon">
                                    <i class="fa fa-dashboard"></i>
                                </div><span>Dashboard</span></a>
                        </div>
                        <div>
                            <div class="sb-sidenav-menu-heading"><span>Management</span></div>
                            <a class="nav-link" href="<?= base_url('/Administrator/artikelMan'); ?>">
                                <div class="sb-nav-link-icon"><i class="fa fa-file-text"></i></div><span>Blog Manage</span></a>

                            <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-id-card-o"></i></div>
                                <span>User Manage</span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-chevron-circle-down"></i></div>
                            </a>
                            <div id="collapseLayouts" class="collapse" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <div class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url('/Administrator/guruman'); ?>">Guru</a>
                                    <a class="nav-link" href="<?= base_url('/Administrator/siswaman'); ?>">Siswa</a>
                                </div>
                            </div>

                            <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseSumUser" aria-expanded="false" aria-controls="collapseSumUser">
                                <div class="sb-nav-link-icon"><i class="fa fa-plus"></i></div>
                                <span>Tambah User</span>
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-chevron-circle-down"></i></div>
                            </a>
                            <div id="collapseSumUser" class="collapse" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <div class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url('/Administrator/addguru'); ?>">Guru</a>
                                    <a class="nav-link" href="<?= base_url('/Administrator/addsiswa'); ?>">Siswa</a>
                                </div>
                            </div>

                            <a class="nav-link" href="<?= base_url('/Administrator/importUserReg') ?>">
                                <div class="sb-nav-link-icon"><i class="fa fa-table"></i></div><span>Import table register</span></a>
                        </div>
                        <div>
                            <div class="sb-sidenav-menu-heading"><span>conten</span></div>
                            <a class="nav-link" href="<?= base_url('Dev/Docs') ?>">
                                <div class="sb-nav-link-icon"><i class="fa fa-cloud-upload"></i></div><span>Dokumentasi API</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div id="layoutSidenav_content">
    <main>
    <div class="position-fixed" style="z-index: -5; height: 100vh; width: 100%;background-color: #EDF0F5"></div>
    <div class="position-fixed" style="z-index: -5; height: 25vh; width: 100%;background-color: #343a40"></div>
   

        <?=$this->renderSection('Admin');?>
    
    </main>
    </div>
    </div>
    <script src="<?= base_url('/admin/js/script.min.js') ?>"></script>
    <script src="<?= base_url('/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>

</html>