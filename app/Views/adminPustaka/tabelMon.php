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