<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Panel Guru | Perpustakaan Elektronik</title>
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/fonts/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/admin/css/styles.min.css') ?>">
    <script src="<?= base_url('/js/jquery-3.5.1.min.js') ?>"></script>
</head>
<body class="sb-nav-fixed <?= $tema ?> bg-light">
    <nav class="navbar navbar-expand shadow-sm sticky-top sb-topnav py-0 border-bottom border-warning">
        <div class="container-fluid">
            <button class="btn btn-link btn-sm ml-2 text-light order-1 order-md-2" id="sidebarToggle" type="button">
                <i class="fa fa-bars"></i>
            </button>
            <a href="<?= base_url('/Pustaka'); ?>" class="order-3">
            <button class="btn btn-link btn-sm text-light d-none d-sm-inline-block" type="button">
                <i class="fa fa-home"></i>
            </button></a>
            <a class="navbar-brand d-flex order-2 order-md-1" href="/Administrator">
                <img src="/img/logo/pustakaM.png">
                <div class="brand-txt">
                    <h4 class="mb-0">Pustaka</h4>
                    <small class="d-block">Panel Guru</small>
                </div>
            </a>
            <span class="ml-auto order-4">
            </span>

            <ul class="nav navbar-nav text-right d-flex order-5 ml-auto ml-md-0">
                <li class="nav-item float-right justify-content-end align-items-center border-0" role="presentation">
                    <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle active text-white" data-toggle="dropdown" aria-expanded="false" href="#">
                            <img class="rounded-circle" src="<?= base_url('/img/boy.jpg'); ?>">
                            <!-- $dataAdmin['fotoprofile'] -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow" role="menu" style="margin-top: 16px;padding-left: 13px;">
                            <span class="dropdown-item" id="settIddropdown">Pengaturan</span>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" role="presentation" href="<?= base_url('/Engine/out/') ?>">Keluar</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <div id="sidenavAccordion" class="sb-sidenav accordion">
                <div class="sb-sidenav-menu scrollBar">
                    <div class="nav mb-5">
                        <div class="mt-4">
                            <a class="nav-link" href="<?= base_url('/PanelGuru/dashboard'); ?>">
                                <div class="sb-nav-link-icon">
                                    <i class="fa fa-dashboard"></i>
                                </div><span>Dashboard</span></a>
                            <a class="nav-link" href="<?= base_url('/PanelGuru/penugasan'); ?>">
                                <div class="sb-nav-link-icon">
                                    <i class="fa fa-dashboard"></i>
                                </div><span>Penugasan</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="layoutSidenav_content">
            <main class="bg-light">
                <?=$this->renderSection('panel');?>
            </main>
        </div>
        <div class="settings" id="settPanel">
            <div class="topPanel">
                <h3>Pengaturan</h3>
                <div class="close">
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="menusett">
                <div class="themeM">
                    Tema
                    <div>
                    <button id="default">Default</button>
                    <button id="light">Light</button>
                    <button class="apply" id="dark">Dark</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('/admin/js/script.min.js') ?>"></script>
    <script src="<?= base_url('/admin/js/liveSearch.js') ?>"></script>
</body>
</html>