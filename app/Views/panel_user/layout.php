<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>David Aprilio</title>
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/fonts/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/css/pustaka.css'); ?>">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400&display=swap');
    .ddown{ margin-left: auto; margin-right: 10px;}
    .raleway {
      font-family: 'Raleway', sans-serif;
    }
    .card-item {
      font-family: 'Raleway', sans-serif;
      border: none;
      border-top: 3px solid #ffd65b;
      font-weight: 400;
    }
    #cardTitle {
      font-weight: 200;
    }
  </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-light navbar-expand-md sticky-top bg-navG shadow-sm navigation-clean-button" style="padding: 7px;">

    <div class="container-xxl">
        <span style="font-size:20px; cursor:pointer" class="ml-2" id="trigger-menu" onclick="closeNav()">&#9776;</span>
        <a class="navbar-brand my-n1 p-0" href="<?= base_url('/'); ?>">
            <img src="<?= base_url('/img/logo/pustakaL.png'); ?>">
        </a>

        <div class="dropdown d-inline-block no-arrow bg-transparent">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">
                <img class="rounded-circle img-pp" src="<?= base_url('/img/'.$userInfo->foto); ?>" style="width: 42px;">
            </a>
            <div class="dropdown-menu dropdown-menu-right" role="menu" style="margin-top: 10px;">
                <span class="dropdown-item">
                    <?= $userInfo->panggilan ?></span>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" role="presentation" href="<?= base_url('/') ?>">Dashboard</a>
                <a class="dropdown-item" role="presentation" href="<?= base_url('/Logout') ?>">Log out</a>
            </div>
        </div>

    </div>
</nav>

<div class="container-xxl">
    <div id="mySidenav" class="sidenav position-fixed vh-100 scrollBar" style="width: 230px;">
        <div class="head border-bottom p-2 position-sticky" style="top: 0px;">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Buku ..." aria-label="Cari Buku ..." aria-describedby="button-addon2" id="search-Book">
                <div class="input-group-append">
                    <button class="btn" type="button" id="btnSearch"><i class="fa fa-search text-muted"></i></button>
                </div>
            </div>
        </div>

        <ul class="nav navbar-nav pt-2 pb-3 overflow-auto" id="menuBook" style="margin-bottom: 6rem!important;">
            <span>Menu</span>
            <li role="presentation" class="nav-item btn-bar-menu">
                <a class="nav-link" href="<?= base_url('/User') ?>">Dashboard</a>
            </li> 
            <li role="presentation" class="nav-item btn-bar-menu">
                <a class="nav-link" href="<?= base_url('/User/profile') ?>">Profile</a>
            </li> 
            <li role="presentation" class="nav-item btn-bar-menu">
                <a class="nav-link" href="<?= base_url('/User/mybook') ?>">Buku disimpan</a>
            </li>
        </ul>
    </div>
    <!-- Konten -->
    <div id="main" class="px-3 pt-0 pb-5 bg-transparent">
        <?=$this->renderSection('PanelUser');?>
    </div>

</div> t
    
    <script src="<?= base_url('js/jquery-3.5.1.min.js'); ?>"></script>
    <script src="<?= base_url('/bootstrap/js/bootstrap.min.js'); ?>"></script>
</body>
</html>