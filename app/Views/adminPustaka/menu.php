<?= $this->extend('layout/adminPustaka'); ?>

<?= $this->section('Admin'); ?>
<style>
	ul, li { list-style: none; margin: 0; padding: 0; }
	ul { padding-left: 1em; }
	li { 
	  padding-left: 1em;
	  border: 1px solid #bbb;
	  border-width: 0 0 1px 1px; 
	}
	li.menu { border-bottom: 0px; }
	li.empty { font-style: italic;
	  color: silver;
	  border-color: silver;
	}
	li p { 
	  margin: 0 0 0 5px;
	  padding-left: 7px;
	  background: white;
	  position: relative;
	  top: 0.5em; 
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-12 pt-2">
			<div class="card">
				<div class="card-header">
					Kelola Menu
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12 col-sm-6 col-md-4">
							<fieldset class="border rounded pb-4 position-relative">
								<button type="button" class="badge badge-primary border-0 position-absolute" data-toggle="modal" style="top: -25px; right: 9px;" data-target="#prodi">
								  Tambah
								</button>
								<legend class="w-auto mb-0 ml-2">
									<span class="h5 px-2">Buku Produktif</span>
								</legend>
								<ul class="mt-0">
									<?php foreach ($menuProduktif as $val): ?>
										<li>
											<p>
												<?= $val['kat_menu'] ?>
												<a onclick="confirm('Yakin ingin menghapus kategori ini? kemunkinan buku yang didalam kategori ini tidak akan bisa diakses lagi!')" href="<?= base_url('/Engine/rmKategori/'.$val['id']) ?>" class="badge badge-danger" style="font-size: 13px !important ">Hapus</a>
											</p>
										</li>
									<?php endforeach ?>
								</ul>
							</fieldset>
						</div>
						<div class="col-12 col-sm-6 col-md-4">
							<fieldset class="border rounded pb-4 position-relative">
								<button type="button" class="badge badge-primary border-0 position-absolute" data-toggle="modal" style="top: -25px; right: 9px;" data-target="#umumM">
								  Tambah
								</button>
								<legend class="w-auto mb-0 ml-2">
									<span class="h5 px-2">Lainya</span>
								</legend>
								<ul class="mt-0">
									<?php foreach ($Umum as $val): ?>
										<li>
											<p>
												<?= $val['kat_menu'] ?>
												<a onclick="confirm('Yakin ingin menghapus kategori ini? kemunkinan buku yang didalam kategori ini tidak akan bisa diakses lagi!')" href="<?= base_url('/Engine/rmKategori/'.$val['id']) ?>" class="badge badge-danger" style="font-size: 13px !important ">Hapus</a>
											</p>
										</li>
									<?php endforeach ?>
								</ul>
							</fieldset>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="prodi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Prodi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('/Engine/addKategori') ?>" method="POST">
        	<input type="hidden" name="def" value="Buku Produktif">
	        <div class="input-group">
	        	<input type="text" name="value" class="form-control" aria-describedby="button-addon1">
		        <div class="input-group-append">
				    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Simpan</button>
				</div>
	        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="umumM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Umum</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('/Engine/addKategori') ?>" method="POST">
        	<input type="hidden" name="def" value="Lainnya">
	        <div class="input-group">
	        	<input type="text" name="value" class="form-control" aria-describedby="button-addon2">
		        <div class="input-group-append">
				    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Simpan</button>
				</div>
			</div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>">