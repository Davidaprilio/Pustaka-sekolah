<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= $titleBar; ?></title>
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/fonts/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/css/pustaka.css'); ?>">
    <style>
        .ddown{ margin-left: auto; margin-right: 10px;}
    </style>
</head>
<body>

<nav class="navbar navbar-light navbar-expand-md sticky-top bg-navG shadow-sm navigation-clean-button" style="padding: 7px;">

    <div class="container-xxl">
        <span style="font-size:20px; cursor:pointer" class="ml-2" id="trigger-menu" onclick="closeNav()">&#9776;</span>
        <a class="navbar-brand my-n1 p-0" href="<?= base_url('/'); ?>">
            <img src="<?= base_url('/img/logo/pustakaL.png'); ?>">
        </a>

        <?php if ( $userInfo ): ?>
        <div class="dropdown d-inline-block no-arrow bg-transparent">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">
                <img class="rounded-circle img-pp" src="<?= base_url('/img/'.$userInfo->fotoprofile); ?>" style="width: 42px;">
            </a>
            <div class="dropdown-menu dropdown-menu-right" role="menu" style="margin-top: 10px;">
                <span class="dropdown-item">
                    <?= $userInfo->nama_lengkap ?></span>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" role="presentation" href="<?= base_url('/Engine/out') ?>">Log out</a>
            </div>
        </div>
        <?php else : ?>
        <ul class="nav navbar-nav">
            <li class="nav-item" role="presentation">
                <a class="nav-link btn btn-sm btn-warning py-1 mt-1" href="http://appsschool.smektaliterasi.com/Akun/masuk/?ke=http://smektaliterasi.com/Engine/sycUser/">Log in</a>
            </li>
        </ul>
        <?php endif ?>

    </div>
</nav>

<div class="container-xxl shadow">
    <div id="mySidenav" class="sidenav bg-white position-fixed vh-100 scrollBar" style="width: 230px;">
        <div class="head border-bottom p-2 position-sticky" style="top: 0px;">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Buku ..." aria-label="Cari Buku ..." aria-describedby="button-addon2" id="search-Book">
                <div class="input-group-append">
                    <button class="btn" type="button" id="btnSearch"><i class="fa fa-search text-muted"></i></button>
                </div>
            </div>
        </div>

        <ul class="nav navbar-nav pt-2 pb-3 overflow-auto" id="menuBook" act="" baseMenu="<?= $baseM ?>" style="margin-bottom: 6rem!important;">
            <?php 
            $noAct = 1; $kNO = 1;
            foreach ($kate as $grub => $val): ?> 
                <span id="kG<?= $kNO ?>"><?= $grub ?></span>
                <?php foreach ($val as $key): ?>
                <li role="presentation" class="nav-item btn-bar-menu">
                    <a class="nav-link <?= ($key == $baseM) ? 'activeMenu' : ''; ?>" id="G<?= $kNO ?>" <?= ($noAct++ == 1) ? 'spacialAtt="true"' : 'spacialAtt="false"'; ?> unicCode='go<?= $noAct ?>m' key="<?= str_replace(' ', '', $key) ?>"><?= $key ?></a>
                </li>                    
                <?php endforeach ?>
            <?php $kNO++; endforeach ?>
        </ul>
    </div>
    <!-- Konten -->
    <?=$this->renderSection('Pustaka');?>

</div> t
<span id="baseUrl" class="d-none" bmG="<?= $bGk ?>" bmK="<?= $bK ?>" latestOpen="" style="z-index: -5"><?= base_url('/') ?></span><!-- ContainerXXL END -->
    
    <script src="<?= base_url('js/jquery-3.5.1.min.js'); ?>"></script>
    <script src="<?= base_url('/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('js/pustaka.js'); ?>"></script>
</body>
</html>