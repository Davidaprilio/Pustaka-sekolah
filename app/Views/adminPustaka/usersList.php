<?= $this->extend('layout/adminPustaka'); ?>
<?= $this->section('Admin'); ?>
<div class="container py-4">
	<div class="card bg-white p-2 shadow">
		<table id="tableBook" class="table table-striped table-bordered table-sm rounded w-100">
			<thead>
				<tr>
				<th>no.</th>
				<th>Nama</th>
				<th>Kelas</th>
				<th>JK</th>
				<th>last active</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
				foreach ($dataUser as $data): ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $data['nama'] ?></td>
					<td><?= $data['kelas'] ?></td>
					<td><?= $data['jk'] ?></td>
					<td><?= tgl_Id(date('Y-m-d',strtotime($data['updated_at']))) ?> (<?= date('H:i',strtotime($data['updated_at'])) ?>)</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#tableBook').DataTable({
        	stateSave: true,
        	"scrollX": true
    	});
	});
</script>

<?= $this->endSection(); ?>">