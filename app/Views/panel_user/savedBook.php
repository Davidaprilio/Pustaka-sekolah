<?= $this->extend('panel_user/layout') ?>
<?= $this->section('PanelUser') ?>
<style>
	.trash {
		position: absolute;
		top: 1px;
		right: 5px;
	}
</style>
<h3 class="text-dark raleway pt-3">Buku yang disimpan</h3>
<div class="card border-0" style="min-height: 78vh">
	<div class="card-body">
		<div class="row" id="rowBook">
			<?php foreach ($book as $val): ?>
				<div class="card d-inline-block shadow-sm mb-1 mx-1 position-relative" >
					<div class="trash">
						<?php if ($val['afterRead'] == true): ?>
							<div class="fa fa-bookmark text-white fa-2x"></div>
						<?php else : ?>
							<div class="far fa-bookmark text-white fa-2x"></div>
						<?php endif ?>
					</div>
	                <img src="<?= base_url('/img/book/min/'.$val['sampul']) ?>" style="width: 140px" class="card-img-top mx-auto">
	                <div class="p-2">
	                    <a href="<?= base_url('/DetailBuku/'.$val['id_book']) ?>" class="text-dark my-0 py-0 buku_title" id="titleBook" uisb="`+data.idBuku+`" title="<?= $val['judul_buku'] ?>"><?= ellipsize($val['judul_buku'], 12, 1, '...') ?></a>
	                    <p href="#" class="d-block my-0 authorBook">
	                        <small class="text-muted"><?= $val['penulis'] ?></small>
	                    </p>
	                </div>
	            </div>
			<?php endforeach; if (count($book) == 0 ) { ?>
				<div class="d-flex text-center w-100 pt-5 flex-column">
					<i class="fa fa-search text-muted fa-3x mb-4"></i>
					<h4 class="raleway text-muted">Tidak ada buku yang disimpan</h4>
					<span style="font-size: 14px" class="pt-1 raleway">Cari buku untuk memulai membaca lebih banyak buku</span>
				</div>
			<?php }	?>

		</div>
	</div>
</div>
<?= $this->endSection() ?>