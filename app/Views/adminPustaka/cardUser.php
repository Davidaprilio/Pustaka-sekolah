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
      <div class="card-body text-center">
        <h5 class="card-title mb-0"><?= $user['nama'] ?></h5>
        <small class="text-muted"><?= $user['kelas'] ?></small>
        <table class="table-sm table table-borderless card bg-light p-0">
        	<tbody>
        		<tr>
        			<td class="text-right">total waktu baca</td>
              <td>:</td>
        			<td class="text-left"><?= $timeRead ?></td>
        		</tr>
        		<tr>
        			<td class="text-right">rata-rata baca perhari</td>
              <td>:</td>
        			<td class="text-left"><?= $user['kelas'] ?></td>
        		</tr>
            <tr>
              <td class="text-right">banyak buku yang dibaca</td>
              <td>:</td>
              <td class="table-left"><?= $bukuDibaca ?> buku</td>
            </tr>
        	</tbody>
        </table>
      </div>
    </div>
  </div>
</div>