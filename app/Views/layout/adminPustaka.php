<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Petugas Perpustakaan</title>
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/fonts/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/admin/css/styles.min.css') ?>">
    <script src="<?= base_url('/js/jquery-3.5.1.min.js') ?>"></script>
    <script src="<?= base_url('/bootstrap/js/bootstrap.min.js') ?>"></script>
    <style type="text/css">
        .toast {
            width: 100vh;
        }
    </style>
</head>
<body class="sb-nav-fixed <?= $tema ?> bg-light" >
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
                    <small class="d-block">Pengurus perpustakaan</small>
                </div>
            </a>
            <span class="ml-auto order-4">
            </span>

            <ul class="nav navbar-nav text-right d-flex order-5 ml-auto ml-md-0">
                <li class="nav-item float-right justify-content-end align-items-center border-0" role="presentation">
                    <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle active text-white" data-toggle="dropdown" aria-expanded="false" href="#">
                            <img class="rounded-circle" src="<?= base_url('/img/'.$dataAdmin->foto); ?>">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow" role="menu" style="margin-top: 16px;padding-left: 13px;">
                            <span class="dropdown-item" id="settIddropdown">Pengaturan</span>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" role="presentation" href="<?= base_url('/Petugaspustaka/out/') ?>">Keluar</a>
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
                            <a class="nav-link" href="<?= base_url('/Petugaspustaka/dashboard'); ?>">
                                <div class="sb-nav-link-icon">
                                    <i class="fa fa-dashboard"></i>
                                </div><span>Dashboard</span></a>
                            <a class="nav-link" href="<?= base_url('/Petugaspustaka/monitor'); ?>">
                                <div class="sb-nav-link-icon">
                                    <i class="fa fa-dashboard"></i>
                                </div><span>Monitoring</span></a>
                            <a class="nav-link" href="<?= base_url('/Petugaspustaka/rekomendasi'); ?>">
                                <div class="sb-nav-link-icon">
                                    <i class="fa fa-dashboard"></i>
                                </div><span>Rekomendasi</span></a>
                        </div>
                        <div>
                            <div class="sb-sidenav-menu-heading"><span>Kelola Pustaka</span></div>
                            <a class="nav-link" href="<?= base_url('/Petugaspustaka/menu'); ?>">
                                <div class="sb-nav-link-icon"><i class="fa fa-list-ol"></i></div>
                                <span>Kelola Menu</span></a>
                            <a class="nav-link" href="<?= base_url('/Petugaspustaka/kelolabuku'); ?>">
                                <div class="sb-nav-link-icon "><i class="fa fa-list-alt"></i></div>
                                <span>Kelola Buku</span></a>
                            <a class="nav-link" href="<?= base_url('/Petugaspustaka/tambahbuku'); ?>">
                                <div class="sb-nav-link-icon"><i class="fa fa-plus"></i></div>
                                <span>Tambah Buku</span></a>
                        </div>
                        <div>
                            <div class="sb-sidenav-menu-heading"><span>Lainya</span></div>
                            <span class="nav-link" id="settId">
                                <div class="sb-nav-link-icon"><i class="fa fa-cog"></i></div>
                                <span>Pengaturan</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="layoutSidenav_content">
            <main class="bg-light" style="overflow-x: hidden;">
                <?=$this->renderSection('Admin');?>
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


    <div class="position-fixed" style="bottom: 0; right: 0; z-index: 10">
      <div aria-live="polite" aria-atomic="true" class="position-relative" style="min-height: 200px;">
        <div class="position-absolute" onshow="console.log('loaded');" id="containerToast" style=" bottom: 10px; right: 5px;">
          <!-- Then put toasts within -->
        </div>
      </div>
    </div>


    <script type="text/javascript">
        function notif(title, message, autoHide=false) {
            $('.toast.hide').remove();
            const id = randomString(7);
            const hide = (autoHide) ? `data-delay="${autoHide}"` : `data-autohide="false"`;
            const progress = `
            <div class="progress" id="${id}" style="height: 3px;">
              <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>`;
            const notifDOM = `
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" ${hide}>
                <div class="toast-header">
                  <img src="<?= base_url('/img/boy.jpg') ?>" class="rounded mr-2" width="30">
                  <strong class="mr-auto">${title}</strong>
                  <small class="text-muted">2 seconds ago</small>
                  <button type="button" class="ml-2 mb-1 close" id="closeToast" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="toast-body">${message}</div>
                ${(autoHide)?progress:''}
            </div>`;
            $('#containerToast').append(notifDOM);
            $('.toast').toast('show');
            if (autoHide) {
                runProgress(document.getElementById(id).children[0], autoHide);
            }
        }
        function runProgress(bar, time) {
            var t = time / 1000;
            bar.style.transition = t + 's linear';
            bar.style.width = '100%';
        }
        function randomString(length) {
            var result           = [];
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
              result.push(characters.charAt(Math.floor(Math.random() * 
         charactersLength)));
           }
           return result.join('');
        }

        $('.toast').toast('show');
    </script>

    <script src="<?= base_url('/admin/js/script.min.js') ?>"></script>
    <script src="<?= base_url('/admin/js/liveSearch.js') ?>"></script>
</body>
</html>