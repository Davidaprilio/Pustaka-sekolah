<div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4 p-3">
      <img src="<?= base_url('/img/book/min') ?>/<?= $data['sampul'] ?>" class="card-img">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Info detail buku</h5>
        <table class="table-sm table table-light table-striped">
        	<tbody>
        		<tr>
        			<td>Judul</td>
        			<td><?= $data['judul_buku'] ?></td>
        		</tr>
        		<tr>
        			<td>Penulis</td>
        			<td><?= $data['penulis'] ?></td>
        		</tr>
        		<tr>
        			<td>Penerbit</td>
        			<td><?= $data['penerbit'] ?></td>
        		</tr>
            <tr>
              <td>deskripsi</td>
              <td><?= $data['deskripsi'] ?> buku</td>
            </tr>
        	</tbody>
        </table>
      </div>
    </div>
  </div>
</div>