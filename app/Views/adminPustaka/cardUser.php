<div class="card mb-3">
  <div class="row no-gutters">
    <div class="col-md-4 p-3">
      <img src="<?= $detail['foto'] ?>" class="card-img rounded-circle">
      <div class="w-100 text-center mt-2">
	      <span class="badge badge-<?php 
					    if ($user['state']=='baca') { 
					    	echo 'primary';
					    } else if ($user['state']=='online') {
					    	echo 'success';
					    } else {
					    	echo 'danger';
					    }?>"><?= $user['state'] ?></span>
        <?php if ($user['state']=='offline'): ?>
          <p class="card-text"><small class="text-muted">Online 3min ago</small></p>
        <?php endif ?>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $user['nama'] ?></h5>
        <table class="table-sm table table-light table-striped">
        	<tbody>
        		<tr>
        			<td>kelas</td>
        			<td><?= $user['kelas'] ?></td>
        		</tr>
        		<tr>
        			<td>total waktu baca</td>
        			<td><?= $timeRead ?></td>
        		</tr>
        		<tr>
        			<td>rata-rata baca perhari</td>
        			<td><?= $user['kelas'] ?></td>
        		</tr>
            <tr>
              <td>banyak buku yang dibaca</td>
              <td><?= $bukuDibaca ?> buku</td>
            </tr>
        	</tbody>
        </table>
      </div>
    </div>
  </div>
</div>