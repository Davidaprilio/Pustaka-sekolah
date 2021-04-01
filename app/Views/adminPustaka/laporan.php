<?= $this->extend('layout/adminPustaka'); ?>

<?= $this->section('Admin'); ?>
<style>
	ul.list-unstyled span.badge {
		font-size: 14px !important;
		font-weight: 400;
	}
</style>
	<div class="container">
		<div class="row mx-auto">
			<div class="col-7 pt-1 pl-1">
				<div class="card p-2">
					<span>Rata-rata aktif perhari</span>
					<table class="table table-responsive-sm table-sm">
					  <thead class="thead-light">
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Nama</th>
					      <th scope="col">Kelas</th>
					      <th scope="col">Aktif</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php $no=1; foreach ($siswa as $data): ?>
					    <tr>
					      <th scope="row"><?= $no++ ?></th>
					      <td><?= $data['nama_lengkap'] ?></td>
					      <td><?= $data['kelas'] ?></td>
					      <td><?= $data['readTimeAVGperDay'] ?></td>
					    </tr>
					  	<?php endforeach ?>
					  </tbody>
					</table>
				</div>
			</div>
			<div class="col-5 pt-1">
				<div class="card w-100 p-2">
					<ul class="list-unstyled">
						<li class="h2">1. David Apriio <span class="badge-warning badge">23 Jam</span></li>
						<li class="h3">2. Prio BUdi <span class="badge-warning badge">19 Jam</span></li>
						<li class="h4">3. Alwi Bayu <span class="badge-warning badge">17 Jam</span></li>
						<li class="h5">4. cnubvier <span class="badge-secondary badge">13 Jam</span></li>
						<li class="h6">5. cnubvier <span class="badge-secondary badge">9 Jam</span></li>
						<li class="h6">6. cnubvier <span class="badge-secondary badge">3 Jam</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?= $this->endSection(); ?>">