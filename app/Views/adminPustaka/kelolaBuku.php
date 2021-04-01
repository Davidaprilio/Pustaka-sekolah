<?= $this->extend('layout/adminPustaka'); ?>
<?= $this->section('Admin'); ?>
<div class="container bg-white rounded shadow p-4" style="min-height: 90vh;">
  <div class="d-flex justify-content-between mb-3">
    <select id="" class="form-control" style="max-width: 70px;">
      <option value="5">5</option>
      <option value="10">10</option>
      <option value="15">15</option>
      <option value="20">20</option>
    </select>
    <input type="text" class="form-control px-3" style="max-width: 270px;" id="searchInput" placeholder=" Cari ...">
  </div>
  <div id="Tbody">
    <table class="table table-striped table-sm">
      <thead class="thead-dark rounded">
        <tr>
          <th scope="col">no.</th>
          <th scope="col">Judul</th>
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
            <td title="<?= $data['download'] ?>"><?= $data['download'] ?></td>
            <td title="<?= $data['reader'] ?>"><?= $data['reader'] ?></td>
            <td title="<?= $data['rating'] ?>"><?= $data['rating'] ?></td>
            <td id="opsi">
              <a class="badge badge-info text-white mb-1" id="getInfo" data-check="<?= $data['slug_buku'] ?>" style="cursor: pointer;" data-toggle="modal" data-target="#detailBuku">detail</a>
              <a class="badge badge-primary text-white" style="cursor: pointer;" data-toggle="modal" data-target="#modalEdit" data-edit="$data['slug_buku'] ?>" class="badge badge-primary">edit</a>
              <a href="<?= base_url('/Engine/dropBuku/').'/'.$data['slug_buku'] ?>" class="badge badge-danger" onclick="return confirm('Anda ingin menghapus data ini')">hapus</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <?= $pager->links(); ?>
  </div>
</div>
<div class="modal fade" id="detailBuku" tabindex="-1" aria-labelledby="labelModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="mConten">
      <div class="modal-header">
        <h5 class="modal-title" id="labelModal">Detail </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"></div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel">Edit data buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('/Engine/editBook') ?>" method="POST">
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul">
          </div>
          <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" class="form-control" id="penulis" name="penulis">
          </div>
          <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit">
          </div>
          <div class="form-group">
            <label for="target">Target</label>
            <input type="text" class="form-control" id="target" name="target">
          </div>
          <div class="form-group">
            <label for="target">Katego</label>
            <input type="text" class="form-control" id="target" name="target">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<script>
  $('#searchInput').on('keyup', function() {
    $.get('/Petugaspustaka/kelolabuku/cari?keyword=' + $('#searchInput').val(), function(data) {
      $('#Tbody').html(data);
    });
  })
  $('#opsi #getInfo').on('click', function(e) {
    $.get('/Petugaspustaka/infoBook/'+ $(this).attr('data-check'), function(data) {
      $('#detailBuku .modal-body').html(data);
    });
  })
</script>
<?= $this->endSection(); ?>">