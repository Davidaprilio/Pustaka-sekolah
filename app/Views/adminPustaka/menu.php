<?= $this->extend('layout/adminPustaka'); ?>

<?= $this->section('Admin'); ?>
<style>
	/*ul, li { list-style: none; margin: 0; padding: 0; }
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
	}*/
	fieldset {
		border-radius: 10px;
	}
	fieldset li, .placeItem {
		background: #f7f7f7;
		border: 1px solid #ddd;
		padding: 5px 10px;
		border-radius: 5px;
	}
	fieldset li ul li{
		background-color: var(--light);
	}
	i.fa-pencil {
		font-size: 15px;
	}
	#editKat, #editSub {
		cursor: pointer;
	}
	.editMenu {
	    width: 100%;
	    border: none;
	    background: transparent;
	    margin-bottom: 4px;
	    border-color: var(--info) !important;
	}
	.placeCard {
		background: var(--light);
		width: 100%;
		height: 100px;
		border: 1px solid #eee;
		margin-bottom: 4px;
	}
	.lockUl {
		margin-bottom: 4px;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-7 pt-2">
				
				<fieldset class="border shadow bg-white p-2 position-relative">
					<button type="button" class="badge badge-primary border-0 position-absolute" data-toggle="modal" style="top: -25px; right: 9px;" data-target="#prodi">
					  Tambah
					</button>
					<legend class="w-auto mb-0 ml-2">
						<span class="h5 px-2 rounded p-1 bg-white">Kategori Menu Editor</span>
					</legend>
					<ul class="mt-0 list-unstyled mb-0">
						<?php foreach ($menuLock as $val => $subMenu): ?>
							<li class="mb-2 grub-kategori">
								<div>
									<span><?= $val ?></span>
									<span id="editKat" class="text-primary ml-1"><i class="fa fa-pencil"></i></span>
								</div>
								<ul class="pl-3 lockUl" id="subKatSort">
									<?php foreach ($subMenu as $val): ?>
											<li class="mb-1 d-flex justify-content-between">
												<span><?= $val['alias'] ?></span>
												<span id="editKat" class="text-primary"><i class="fa fa-pencil"></i></span>
											</li>
									<?php endforeach ?>
								</ul>
							</li>
						<?php endforeach ?>
					</ul>
					<ul class="mt-0 list-unstyled" id="katSort">
						<?php foreach ($menu as $val => $subMenu): ?>
							<li class="mb-2 grub-kategori">
								<div>
									<span><?= $val ?></span>
									<span id="editKat" class="text-primary ml-1"><i class="fa fa-pencil"></i></span>
								</div>
								<ul class="pl-3 lockUl" id="subKatSort">
									<?php foreach ($subMenu as $val): ?>
											<li class="mb-1 d-flex justify-content-between">
												<span><?= $val['alias'] ?></span>
												<span id="editKat" class="text-primary"><i class="fa fa-pencil"></i></span>
											</li>
									<?php endforeach ?>
								</ul>
							</li>
						<?php endforeach ?>
					</ul>
				</fieldset>

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
<script src="<?= base_url('/js/jquery-ui.js') ?>"></script>
<script type="text/javascript">
	$('fieldset').on('click', '#editKat', function() {
		const txt = $(this).prev().text();
		$(this).parent().html('<input type="text" id="editKatIn" class="editMenu border-bottom" value="'+txt+'">');
		$(this).parent().focus();
	})
	$('fieldset').on('keyup', '#editKatIn', function(e) {
		if (e.which === 13) {
			const txt = $(this).val();
			$(this).parent().html(`<span>${txt}</span><span id="editKat" class="text-primary ml-1"><i class="fa fa-pencil"></i>`);
		}
	})

	$(function() {
	    $( "#subKatSort").sortable({
	    	placeholder: "placeItem"
	    }).disableSelection();
	    $( "#katSort").sortable({
	    	placeholder: "placeCard",
	    	cancel: ".lockUl"
	    }).disableSelection();
 	});
</script>
<?= $this->endSection(); ?>">