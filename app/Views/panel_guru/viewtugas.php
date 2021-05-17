<?= $this->extend('layout/panelGuru'); ?>

<?= $this->section('panel'); ?>
<style type="text/css">
	.container-xxl .card .nav .nav-item a {
		color: var(--blue);
	}

	.card p {
		font-size: 14.5px;
		color: var(--gray-dark);
	}

	table tbody tr td:nth-child(3) {
		font-size: 13px;
	}
</style>
<div class="container-xxl p-md-2">
	<div class="card p-3 shadow-sm" style="min-height: 88vh;">
		<h4 class="text-dark mb-0">Tugas </h4>
		<hr class="mt-1">
		<small class="text-muted"><?= tgl_ID(date('Y-m-d', strtotime($tugas['created_at']))) ?></small>
		<p class="text-dark">
			<?= $tugas['deskripsi'] ?>
		</p>
		<div class="d-flex justify-content-start bg-light p-2 rounded shadow-sm">
			<figure class="figure position-relative">
				<img width="90" height="150" src="<?= base_url('/img/book/min/'.$tugas['buku']['sampul']) ?>" class="figure-img img-fluid rounded mb-0">
				<figcaption class="figure-caption">
					<small>Pustaka E-book</small>
				</figcaption>
			</figure>
			<div class="ml-2 pl-2">
				<ul style="font-size: 14px" class="list-unstyled">
					<li>Lorem ipsum dolor sit, amet consectetur.</li>
					<li>Hal <?= $tugas['buku']['page'] ?></li>
				</ul>
			</div>
		</div>

		<table class="table table-borderless table-sm">
			<thead>
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Nama</th>
					<th scope="col" class="w-75">Progress</th>
				</tr>
			</thead>
			<tbody class="text-dark">
				<?php 
				$no=0;
				foreach ($tugas['data']['siswa'] as $val): ?>
				<tr>
					<th scope="row"><?= $no++ ?></th>
					<td><?= $val['nama'] ?></td>
					<td><?= $val['progress'] ?>%
						<div class="progress" style="height: 8px">
							<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= $val['progress'] ?>%;" aria-valuenow="<?= $val['progress'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>

		<button class="btn btn-danger mx-md-5">Stop Tugas</button>

	</div>
</div>
<?= $this->endSection(); ?>">