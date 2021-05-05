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
                <img class="rounded-circle img-pp" src="<?= base_url('/img/'.$userInfo->foto); ?>" style="width: 42px;">
            </a>
            <div class="dropdown-menu dropdown-menu-right w-100" role="menu" style="margin-top: 10px; max-width: 700px; min-width: 15rem">
                <div class="w-100 text-center p-2">
                    <img src="<?= base_url('/img/'.$userInfo->foto) ?>" width="100" class="rounded-circle">
                    <small class="text-muted d-block" style="font-size: 14px"><?= $userInfo->panggilan ?></small>
                </div>
                <div class="dropdown-divider"></div>
                <?php if ($userInfo->role == 'guru'): ?>
                    <a class="dropdown-item" role="presentation" href="<?= base_url('/PanelGuru/dashboard') ?>">Dashboard Guru</a>
                <?php else : ?>                    
                    <a class="dropdown-item" role="presentation" href="<?= base_url('/User') ?>">Dashboard</a>
                    <a class="dropdown-item" role="presentation" href="<?= base_url('/User/profile') ?>">Profile</a>
                    <a class="dropdown-item" role="presentation" href="<?= base_url('/User/mybook') ?>">Buku disimpan</a>
                <?php endif ?>
                <a class="dropdown-item" role="presentation" href="<?= base_url('/Logout') ?>">Log out</a>
            </div>
        </div>
        <?php else : ?>
        <ul class="nav navbar-nav">
            <li class="nav-item" role="presentation">
                <a class="nav-link btn btn-sm btn-warning py-1 mt-1" href="<?= base_url('/Login') ?>?ke=http://smektaliterasi.com/">Log in</a>
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
            <li role="presentation" class="nav-item btn-bar-menu">
                    <a class="nav-link <?= ('Semua-buku' == $baseM) ? 'activeMenu' : ''; ?>" id="B1" spacialAtt="true" unicCode='21' key="allBook">Semua Buku</a>
                </li>    
            <?php 
            $noAct = 1; $kNO = 1;
            foreach ($kategori as $grub => $val): ?> 
                <span id="kG<?= $kNO ?>"><?= $val[0] ?></span>
                <?php unset($val[0]);
                 foreach ($val as $key): ?>
                <li role="presentation" class="nav-item btn-bar-menu">
                    <a class="nav-link <?= ($key['alias'] == $baseM) ? 'activeMenu' : ''; ?>" id="G<?= $kNO ?>" unicCode='go<?= $noAct ?>m' key="<?= $key['kode'] ?>"><?= $key['alias'] ?></a>
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
    <script>
        const dpjsc = <?= $dataJson ?>;
    </script>
    <script src="<?= base_url('js/pustaka.js'); ?>"></script>
</body>
</html>