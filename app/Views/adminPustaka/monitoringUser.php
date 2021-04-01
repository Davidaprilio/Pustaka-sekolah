<?= $this->extend('layout/adminPustaka'); ?>

<?= $this->section('Admin'); ?>
<style>
	.form-check {
		padding-left: 0;
	}
	.form-check input.form-check-input ~ label.btn-Select {
		background: var(--light);
		width: 100%;
		cursor: pointer;
	}
	.form-check input.form-check-input ~ label.btn-Select:hover {
		background: #eee;
	}
	.form-check input.form-check-input:checked ~ label.btn-Select {
		background: var(--blue);
		color: #fff;
	}
</style>
<div class="container mt-1">
		<!-- Modal -->
		<div class="modal fade" id="modalInfo" aria-labelledby="modalInfoLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalInfoLabel">Detail pengguna</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      </div>
		    </div>
		  </div>
		</div>

	<div class="card p-1">
		<div class="card-header p-1 d-flex justify-content-between">
			<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalFilter"> Filter </button>
			<form>
				<input type="text" class="form-control" id="searchName" placeholder=" Cari Nama">
			</form>
		</div>
		<div id="tableMon">
		<table class="table table-sm table-striped border table-hover table-light table-responsive-md">
		  <thead class="bg-dark text-white">
		    <tr class="text-center">
		      <th>#</th>
		      <th>Nama</th>
		      <th>status</th>
		      <th>baca</th>
		      <th>waktu</th>
		      <th>mulai</th>
		      <th>detail</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  	$no = 1;
		  	foreach ($users as $user): ?>
			    <tr>
				    <th><?= $no++ ?></th>
				    <td><span class="badge badge-success"><?= $user['kelas'] ?></span> <?= $user['nama'] ?></td>
				    <td><span class="badge badge-<?php 
					    if ($user['state']=='baca') { 
					    	echo 'primary';
					    } else if ($user['state']=='online') {
					    	echo 'success';
					    } else {
					    	echo 'danger';
					    }?> "><?= $user['state'] ?></span></td>
				    <td><?= (is_null($user['judulBuku']))? '-' : $user['judulBuku']; ?></td>
				    <td><?= (is_null($user['readTime']))? '-' : $user['readTime']; ?></td>
				    <td><?= (is_null($user['start']))? '-' : $user['start']; ?></td>
				    <td><button class="badge badge-info border-0" id="btnInfo" data-info="<?= $user['idUniq'] ?>" data-toggle="modal" data-target="#modalInfo">&nbsp&nbspInfo&nbsp&nbsp</button></td>
			    </tr>
		  	<?php endforeach ?>
		  </tbody>
		</table>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="modalFilter" aria-labelledby="modalFilterLabel" aria-hidden="true">
		  <div class="modal-dialog modal-xl">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalFilterLabel">Filter</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body p-1 p-md-2">
				<form action="<?= base_url('/Petugaspustaka/monitor') ?>" method="GET">
		        <div class="row">
					<div class="col-12">
						<div class="form-check">
						  	<input class="form-check-input d-none" type="checkbox" onclick="toggleCheck(this)" id="checkBox0">
						  	<label class="btn btn-sm btn-Select border" for="checkBox0">Semua</label>
						</div>
					</div>
					<?php 
					$node = 0; $noCBox = 1;
					foreach ($dataKelas as $kelas): 
					$checked = false; ?>
						<div class="col-4 col-md-3 col-lg-2">
							<div class="form-check">
								<?php if (is_null($filter)): ?>
								  	<input class="form-check-input d-none" type="checkbox" name="filter[]" id="checkBox<?= $noCBox ?>" value="<?= $kelas['kode_kelas'] ?>">
								<?php else : ?>
									<?php foreach ($filter as $idKelas) {
										if ($kelas['kode_kelas'] == $idKelas) {
											$checked = true;
										}
										$node++; } ?>
								  	<input class="form-check-input d-none" <?= ($checked) ? 'checked' : '' ?> type="checkbox" name="filter[]" id="checkBox<?= $noCBox ?>" value="<?= $kelas['kode_kelas'] ?>">
								<?php endif ?>
							  	<label class="btn btn-sm btn-Select border" for="checkBox<?= $noCBox++ ?>"><?= $kelas['kelas'] ?></label>
							</div>
						</div>
					<?php endforeach ?>
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn mx-auto btn-primary">Terapkan</button>
				</form>
		      </div>
		    </div>
		  </div>
		</div>


			
	</div>
</div>

<script>
function toggleCheck(source) {
  checkboxes = document.getElementsByName('filter[]');
  console.log(checkboxes);
  for(var i=0, n = checkboxes.length; i < n ;i++) {
    checkboxes[i].checked = source.checked;
  }
}
$(document).ready(function() {
	setInterval(function(){ 
		$.post('<?= base_url('/Petugaspustaka/monitor/sync') ?>'+window.location.search,{ key: $('#searchName').val() },function(data) {
			$('#tableMon').html(data);
		});
	}, 10000);
	$('#searchName').on('keyup', function() {
		$.post('<?= base_url('/Petugaspustaka/monitor/sync') ?>'+window.location.search,{ key: $('#searchName').val() },function(data) {
			$('#tableMon').html(data);
		});
	});
	$('#tableMon').on('click', '#btnInfo', function() {
		let id = '/'+ $(this).attr('data-info'),
			  url = '<?= base_url('/Petugaspustaka/infoUser') ?>'+id;
		console.log(id);
		$.get(url,function(data) {
			$('#modalInfo .modal-body').html(data);
		});
	});
})
</script>
<?= $this->endSection(); ?>">