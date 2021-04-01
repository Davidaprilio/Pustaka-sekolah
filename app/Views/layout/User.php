<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><Pustaka></Pustaka></title>
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/fonts/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/css/pustaka.css'); ?>">
</head>
<body>

<nav class="navbar navbar-light navbar-expand-md sticky-top bg-navG shadow-sm navigation-clean-button" style="padding: 7px;">

    <div class="container-xxl">
        <span style="font-size:20px; cursor:pointer" class="ml-2" id="trigger-menu" onclick="closeNav()">&#9776;</span>
        <a class="navbar-brand my-n1 p-0" href="<?= base_url('/'); ?>">
            <img src="<?= base_url('/img/logo/pustakaL.png'); ?>">
        </a>
        <!-- <span type="button" class="btn ml-auto" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-th"></i>
        </span> -->
        <div class="dropdown no-arrow rounded-circle px-2 py-1 ml-auto mr-3">
            <i class="fa fa-th dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
            <div class="dropdown-menu shadow dropdown-menu-right mt-4 mr-4" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">
                    <img src="<?= base_url('/img/logo/pustakaM.png') ?>">
                    Pustaka
                </a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>
        <?php 
        if (!session()->get('status') == 'login'): ?>
            <ul class="nav navbar-nav">
                <li class="nav-item" role="presentation"><a class="nav-link btn btn-sm btn-warning py-1 mt-1" href="<?= base_url('/Pustaka/login'); ?>">Log in</a></li>
            </ul>
        <?php endif ?>

        <?php 
        if (session()->get('status') == 'login'): ?>
        <div class="dropdown d-none d-md-inline-block no-arrow">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">
                <img class="rounded-circle img-pp" src="<?= base_url('/img/testimonials-2.jpg'); ?>" style="width: 30px;">
            </a>
            <div class="dropdown-menu dropdown-menu-right" role="menu" style="width: 161px;margin-top: 10px;">
                <a class="dropdown-item" role="presentation" href="<?= base_url('/Siswa'); ?>">Dashboard</a>
                <a class="dropdown-item" role="presentation" href="<?= base_url('/Siswa/profile'); ?>">Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" role="presentation" href="#">Log out</a>
            </div>
        </div>
        <?php endif ?>

    </div>
</nav>

<div class="container-xxl shadow">
    <div id="mySidenav" class="sidenav bg-white position-fixed vh-100 scrollBar" style="width: 230px;">
        <div class="head border-bottom p-2 position-sticky" style="top: 0px;">
            <form action="form">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Buku ..." aria-label="Cari Buku ..." aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn" type="button" id="button-addon2"><i class="fa fa-search text-muted"></i></button>
                    </div>
                </div>
            </form> 
        </div>
        <ul class="nav navbar-nav pt-2 overflow-auto" id="menuBook">
            <span>tets</span>
            <li role="presentation" class="nav-item btn-bar-menu">
                <a class="nav-link">Cek</a>
            </li>                   
        </ul>
    </div>
    <!-- Konten -->
    <?=$this->renderSection('User');?>

</div> 
s<!-- ContainerXXL END -->
    
    <script src="<?= base_url('js/jquery-3.5.1.min.js'); ?>"></script>
    <script src="<?= base_url('/bootstrap/js/popper.js'); ?>"></script>
    <script src="<?= base_url('/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('/js/pustaka.js'); ?>"></script>

</body>
</html>