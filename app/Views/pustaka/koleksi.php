<?= $this->extend('layout/Pustaka'); ?>
<?= $this->section('Pustaka'); ?>
    <div id="main" class="px-0 pt-0 pb-5">

        <div class="pt-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white pb-0">
                    <li class="breadcrumb-item">Pustaka</li>
                    <li class="breadcrumb-item" id="katGrub">Koleksi</li>
                    <li class="breadcrumb-item active" id="katMenu" aria-current="page">Buku</li>
                </ol>
            </nav>
            <div class="container d-flex pt-2" id="buku">
                <div class="row ">
                    <?php foreach ($koleksi as $buku): ?>
                        <div class="card d-inline-block shadow-sm mb-1 mx-1" >
                            <img src="<?= base_url('/img/book/min/').'/'.$buku->sampul ?>" class="card-img-top mx-auto">
                            <div class="p-2">
                                <p class="text-dark my-0 py-0 buku_title" id="titleBook" uisb="<?= $buku->slug_buku ?>" title="<?= $buku->judul_buku ?>"><?= $buku->judul_buku ?></p>
                                <p href="#" class="d-block my-0 authorBook">
                                    <small class="text-muted"><?= $buku->penulis ?></small>
                                </p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

    </div>
<?= $this->endSection(); ?>