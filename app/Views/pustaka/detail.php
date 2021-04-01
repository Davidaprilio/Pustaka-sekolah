<div class="card border-0 mb-3 text-dark">
  <div class="row no-gutters mt-md-3">
    <div class="col-12 pl-md-5 text-center d-md-none">
        <h5 class="card-title mb-3 mt-1 text-wrap text-center"><?= $user['judul_buku'] ?></h5>
    </div>
    <div class="col-3 col-md-3 pl-md-5 text-center">
        <img src="<?= base_url('/').'/img/book/min/'.$user['sampul'] ?>" class="card-img shadow-sm" style="max-width: 200px">
    </div>
    <div class="col-9 col-md-8">
      <div class="card-body pt-0">
        <h5 class="card-title mb-0 d-none d-md-block"><?= $user['judul_buku'] ?></h5>
        <p class="card-text my-0"><small class="text-muted">Unggah <?= $tgl ?> . <?= $user['kategori'] ?></small></p>
        <p class="mt-0">
            <span class="badge badge-primary">Dibaca 18</span>
            <span class="badge badge-danger" onClick="like(this)"><i class="fa fa-heart"></i> Suka <?= $user['judul_buku'] ?></span>
            <a class="badge badge-success" href="<?= base_url('/') ?>/Pustaka/downloadbuku/<?= $user['slug_buku'] ?>"><i class="fa fa-download"></i> Unduh <?= $user['download'] ?></a>
        </p>
        <p class="card-text my-auto">
            <ul class="font-weight-light list-unstyled" style="font-size: 15px;">
                <li>Penulis : <?= $user['penulis'] ?></li>
                <li>Penerbit : <?= $user['penerbit'] ?></li>
            </ul>
        </p>
        <a href="<?= base_url('/') ?>/Pustaka/Read/<?= $user['slug_buku'] ?>" class="btn btn-primary btn-sm mt-auto">Baca buku</a>
      </div>
    </div>
    <div class="col-12 col-md-8 mt-3">
        <div class="container p-3">
            <p class="text-wrap font-weight-lighter"><?= $user['deskripsi'] ?></p>
        </div>
    </div>
  </div>
</div>