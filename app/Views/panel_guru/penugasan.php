<?= $this->extend('layout/panelGuru'); ?>

<?= $this->section('panel'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<style type="text/css">
	.container-xxl .card .nav .nav-item a {
		color: var(--blue);
	}

	.hoverCard {
		transition: .2s ease-in-out;
	}

	.hoverCard:hover {
		transform: scale(1.015);
		transition: .1s ease-in-out;
		box-shadow: 5px 0 5px grey;
	}
</style>
<!-- Modal -->
<div class="modal fade" id="addNew" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<form action="">
				<div class="modal-header border-0">
					<h5 class="modal-title" id="addNewLabel">Membuat Tugas baru</h5>
					<div>
						<button type="submit" class="btn btn-primary">Simpan</button>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<div class="modal-body">

				</div>
			</form>
		</div>
	</div>
</div>

<div class="container-xxl p-md-2">
	<?= csrf_field() ?>
	<div class="card p-3 shadow-sm" style="min-height: 88vh;">
		<!-- <ul class="nav border-bottom rounded-0 mb-1">
			<li class="nav-item">
				<a class="nav-link active" href="javascript:void(0)" data-toggle="modal" data-target="#addNew">+ Buat</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Link</a>
			</li>
		</ul> -->
		<ul class="nav nav-tabs mb-2" id="tugasTab" role="tablist">
			<li class="nav-item" role="presentation">
				<a class="nav-link active" id="daftar-tugas-tab" data-toggle="tab" href="#daftar-tugas" role="tab" aria-controls="daftar-tugas" aria-selected="true">Tugas</a>
			</li>
			<li class="nav-item" role="presentation">
				<a class="nav-link" id="buat-tugas-tab" data-toggle="tab" href="#buat-tugas" role="tab" aria-controls="buat-tugas" aria-selected="false">+ Buat</a>
			</li>
		</ul>
		<div class="tab-content" id="tugasTabContent">
			<div class="tab-pane fade show active" id="daftar-tugas" role="tabpanel" aria-labelledby="daftar-tugas-tab">
				<div class="row">
					<?php if (count($dataTugas) > 0) : ?>
						<?php foreach ($dataTugas as $data) : ?>
							<div class="col-4">
								<div class="border rounded p-2 shadow-sm mb-2 hoverCard">
									<div class="d-flex justify-content-between">
										<h5 class="mb-1">Tugas <?= $data['kelas'] ?></h5>
										<span><i class="fa fa-user-o"></i> <?= $data['users'] ?> siswa</span>
									</div>
									<a href="<?= base_url('/PanelGuru/tugas/' . $data['kode_tugas']) ?>" class="text-blue"><?= $data['judul'] ?></a>
									<hr class="mb-1 mt-0">
									<p class="ml-3 mb-1" style="font-size: 14.5px"><?= ellipsize($data['deskripsi'], 100, 1, '...') ?></p>
									<small class="text-muted">Tanggal <?= tgl_ID(date('Y-m-d', strtotime($data['created_at']))) ?></small>
								</div>
							</div>
						<?php endforeach ?>
					<?php else : ?>
						<div class="col-12 text-center pt-3">
							<h1 class="display-3 text-muted">Tidak ada tugas</h1>
						</div>
					<?php endif ?>
				</div>
			</div>
			<div class="tab-pane fade" id="buat-tugas" role="tabpanel" aria-labelledby="buat-tugas-tab">
				<form method="POST" action="<?= base_url('/Engine/tugas') ?>">
					<div class="card mb-3 p-2" style="">
						<div class="row no-gutters">
							<div class="col-md-8">
								<div class="form-group">
									<label for="title"><small>Judul tugas</small></label>
									<input type="text" name="inJudul" placeholder="Judul tugas" max="255" class="form-control" id="title">
								</div>
								<div class="form-group">
									<label for="text"><small>Penjelasan tugas untuk membaca buku</small></label>
									<textarea name="inDeskripsi" class="form-control" rows="3" placeholder="deskripsi atau pesan perintah untuk tugas" id="text"></textarea>
								</div>
								<div class="form-group">
									<label for="kelas"><small>Penerima tugas</small></label>
									<select class="selectpicker show-tick border rounded mb-1" data-width="100%" data-live-search="true" name="selKelas" id="kelas" data-size="5" title="Cari kelas ...">
										<?php foreach ($kelas as $val) : ?>
											<option data-tokens="<?= $val['idkelas'] ?>" value="<?= $val['idkelas'] ?>" class="px-2 h6">
												<small><?= $val['kelas'] ?></small>
											</option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-4 text-center">
								<div class="form-group ml-2 form-control-sm">
									<label for="buku"><small>Pilih buku</small></label>
									<select class="selectpicker show-tick border rounded mb-1" name="selBuku" data-width="100%" data-live-search="true" id="buku" data-size="6" title="Cari buku ...">
										<?php foreach ($buku as $val) : ?>
											<option data-tokens="<?= $val['slug_buku'] ?>" value="<?= $val['slug_buku'] ?>" class="px-2 h6">
												<small data-toggle="tooltip" data-placement="right" title="<?= $val['judul_buku'] ?>"><?= ellipsize($val['judul_buku'], 25, 1, '...') ?></small>
											</option>
										<?php endforeach ?>
									</select>
									<div class="card p-2 w-100 text-left">
										<div class="row no-gutters">
											<div class="col-md-3">
												<img width="90" height="150" id="img-sampul-buku" src="<?= base_url('/img/book/default.jpg') ?>" class="figure-img d-block img-fluid rounded mb-0">
											</div>
											<div class="col-md-9">
												<div class="card-body">
													<p class="d-flex flex-column">
														<small>Nama: <span id="nama">-</span></small>
														<small>Hal: <span id="hal">-</span></small>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
							<button class="btn btn-primary" type="submit">Buat</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
	$('.selectpicker').selectpicker();
	$('#buku').on('change', function() {
		const id = $('#buku').val();
		$.ajax({
			url: window.location.origin + '/API/book/' + id,
			type: 'get',
			dataType: 'json',
			success: function(result) {
				$('#nama').text(result.items.judulBuku);
				$('#img-sampul-buku').attr('src', result.items.sampulMin);
				console.log(result);
			}
		});
	});
</script>
<?= $this->endSection(); ?>">