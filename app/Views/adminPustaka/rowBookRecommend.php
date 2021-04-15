<?php foreach ($suggest as $key): ?>
    <figure class="figure position-relative" title="<?= $key['judul_buku'] ?>">
	    <img width="90" height="150" src="<?= base_url('/img/book/min/'.$key['sampul']) ?>" class="figure-img img-fluid rounded mb-0">
	    <button data-buku="<?= $key['slug_buku'] ?>" title="buang dari rekomendasi" class="border-0 badge badge-danger"><i class="fa fa-times"></i></button>
	    <figcaption class="figure-caption">
	    	<small><?= ellipsize($key['judul_buku'], 13,1,'...') ?></small>
	    </figcaption>
	</figure>
<?php endforeach ?>