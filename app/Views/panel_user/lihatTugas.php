<?= $this->extend('panel_user/layout') ?>
<?= $this->section('PanelUser') ?>
<div class="container pt-3">
  <div class="card border-0">
    <div class="card-header bg-transparent border-0 mb-0">
	  	<h4 class="raleway mb-0"><?= $tugas['judul'] ?></h4>
	  	<small class="text-muted d-block mb-2">
	    	<svg aria-hidden="true" width="12" focusable="false" data-prefix="far" data-icon="clock" class="svg-inline--fa fa-clock fa-w-16" style="margin-top: -2px;" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"></path></svg>
	    	<?= tgl_Id(date('Y-m-d', strtotime($tugas['created_at']))) ?>
	  	</small>
	  	<span style="color: #666; font-size: 14px">Dari : <?= $tugas['nama'] ?></span>
	  	<br>
	  	<hr class="w-100 float-left mb-0" style="max-width: 700px">
		</div>
		<div class="card-body pt-0">
		  <p class="mb-4" style="color: #666"><?= $tugas['deskripsi'] ?></p>
			<div class="card mb-3" style="max-width: 540px;">
			  <div class="row no-gutters">
			    <div class="col-md-4">
			      <img src="<?= base_url('/img/book/min/'.$buku['sampul']) ?>" class="card-img">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title text-dark raleway"><?= $buku['judul_buku'] ?></h5>
			        <p class="text-dark card-text" style="font-size: 14.5px;">
			        	Hal : <?= $tugas['read_pages'] ?></p>
			        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
			        <a href="<?= base_url('/User/t/'.$tugas['kode_tugas'].'/baca') ?>" class="btn badge-pill badge-primary">Mulai Baca</a>
			      </div>
			    </div>
			  </div>
			</div>

			<div class="mt-5">
			  <h6 class="border-bottom pb-2 mb-3" style="max-width: 700px">Teman</h6>
			  <?php foreach ($teman as $val): ?>
				<div class="media mb-3">
				  <img src="<?= base_url('/img/boy.jpg') ?>" class="align-self-center mt-n2 mr-3 rounded-circle" width="40">
				  <div class="media-body">
				    <h6 class="mt-0 text-dark"><?= $val['nama'] ?></h6>
				  </div>
				</div>
			  <?php endforeach ?>
			</div>
		</div>
  </div>
</div>

<?= $this->endSection(); ?>