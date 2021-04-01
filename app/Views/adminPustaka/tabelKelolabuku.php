<table class="table table-striped table-sm">
  <thead class="thead-dark rounded">
    <tr>
      <th scope="col">no.</th>
      <th scope="col">Judul</th>
      <th scope="col">Penerbit</th>
      <th scope="col">Download</th>
      <th scope="col">Reader</th>
      <th scope="col">Rating</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody up="no">
    <?php
    $no =  1 + (5 * ($currentPage-1)) ;
    foreach ($table as $data) : ?>
      <tr id="<?= $data['slug_buku'] ?>">
        <th scope="row"><?= $no++ ?></th>
        <td title="<?= $data['judul_buku'] ?>" fc="1" class="tdup"><?= $data['judul_buku'] ?></td>
        <td title="<?= $data['penerbit'] ?>"><?= $data['penerbit'] ?></td>
        <td title="<?= $data['download'] ?>"><?= $data['download'] ?></td>
        <td title="<?= $data['download'] ?>"><?= $data['download'] ?></td>
        <td title="<?= $data['download'] ?>"><?= $data['download'] ?></td>
        <td id="opsi">
          <a class="badge badge-info text-white mb-1" id="getInfo" data-check="<?= $data['slug_buku'] ?>" style="cursor: pointer;" data-toggle="modal" data-target="#detailBuku">detail</a>
          <a href="<?= base_url('/Engine/dropBuku/') . '/' . $data['slug_buku'] ?>" class="badge badge-danger" onclick="return confirm('Anda ingin menghapus data ini')">hapus</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?= $pager->links(); ?>