<?= $this->extend('layout/Pustaka'); ?>
<?= $this->section('Pustaka'); ?>
    <div id="main" class="px-0 pt-0 pb-5">

        <div class="pt-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white pb-0">
                    <li class="breadcrumb-item">Pustaka</li>
                    <li class="breadcrumb-item" id="katGrub">Profile</li>
                    <li class="breadcrumb-item active" id="katMenu" aria-current="page"><?= $userInfo->nama_lengkap ?></li>
                </ol>
            </nav>
            <div class="container d-flex pt-2" id="buku">
                <div class="row w-100">
                    <div class="col-12 col-lg-3 justify-content-center">
                        <img src="<?= base_url('/img/boy.jpg') ?>" class="img-thumbnail rounded-circle" style="width: 90%">
                    </div>
                    <div class="col-12 col-lg-9 pt-md-1 ml-lg-n5">
                        <div class="border rounded p-4">
                            <h1><?= $namaUser ?></h1>
                            <p>Kelas : <?= $userInfo->kelas ?></p>
                            <p>Tanggal Lahir : <?= $userInfo->kelas ?></p>
                            <p><?= ($userInfo->gender == 'L') ? 'Laki-laki' : 'Perempuan' ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        
                    </div>
                    <div class="col-lg-9 pt-2 ml-lg-n5">
                        <div class="border rounded p-4">
                            <h2>Info </h2>
                            <p>Rata-rata waktu baca perhari 7 menit</p>
                            <p>Waktu baca 127808 Jam</p>
                            <p>Buku Favorite {}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?= $this->endSection(); ?>