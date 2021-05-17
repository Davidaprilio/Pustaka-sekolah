<?= $this->extend('layout/adminPustaka'); ?>
<?= $this->section('Admin'); ?>
<style>
  #btnRemove, .rowList {
    transition: .5s linear;
  }
</style>
<div class="container-xxl mt-4 p-2 position-relative" style="min-height: 90vh;">

  <div class="d-flex justify-content-between mb-3 bg-white rounded border shadow-sm p-2 mx-1 mx-md-3 mx-xl-5 position-sticky" style="top: 30px; z-index: 2">
    <select id="" class="form-control" style="max-width: 70px;">
      <option value="5">5</option>
      <option value="10">10</option>
      <option value="15">15</option>
      <option value="20">20</option>
    </select>
    <input type="text" class="form-control px-3" style="max-width: 270px;" id="searchInput" placeholder=" Cari ...">
  </div>

  <div id="Tbody" class="card p-2 position-relative" style="background: url('http://smektaliterasi.com/img/bg-pattern.png') repeat , #fbfbfb; background-size: 50px">
    <table class="table table-borderless table-hover table-sm" style="z-index: 1;">
      <thead class="border-bottom">
        <tr class="text-white">
          <th scope="col">no.</th>
          <th scope="col">Judul</th>
          <th scope="col">Size</th>
          <th scope="col">Upload</th>
          <th scope="col">Halaman</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody up="no">
        <?php
        $no =  1 + (5 * ($currentPage-1)) ;
        foreach ($table as $data) : 
          $tgl = tgl_ID(date('Y-m-d', strtotime($data['created_at']))); ?>
          <tr id="<?= $data['slug_buku'] ?>" class="border-bottom rowList">
            <th scope="row"><?= $no++ ?></th>
            <td title="<?= $data['judul_buku'] ?>" fc="1" class="tdup"><?= $data['judul_buku'] ?></td>
            <td title="besar file buku ini <?= $data['size'] ?>"><?= $data['size'] ?></td>
            <td title="diunggah pada <?= $tgl ?>"><?= $tgl ?></td>
            <td title="<?= $data['rating'] ?>"><?= $data['rating'] ?></td>
            <td id="opsi">
              <a class="badge badge-info text-white mb-1" title="Detail buku" id="getInfo" data-check="<?= $data['slug_buku'] ?>" style="cursor: pointer;" data-toggle="modal" data-target="#detailBuku">
                <i class="fa fa-info-circle"></i>
              </a>
              <a class="badge badge-primary text-white" title="Edit data buku" style="cursor: pointer;" data-toggle="modal" data-target="#modalEdit" data-edit="$data['slug_buku'] ?>" class="badge badge-primary">
                <i class="fa fa-pencil-square-o"></i>
              </a>
              <!-- <a href=" base_url('/Engine/dropBuku/').'/'.$data['slug_buku']" title="Hapus buku ini" class="badge badge-danger" onclick="return confirm('Anda ingin menghapus data ini')"> -->
              <buttton title="Hapus buku ini" class="badge badge-danger" data-id="<?= $data['slug_buku'] ?>" onclick="remove(this)">
                <i class="fa fa-trash"></i>
              </buttton>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <?php if (count($table) == 0): ?>
      <div class="w-100 text-center">
        <h4 class="text-muted mb-0 mt-1">Kosong</h4>
      </div>
    <?php endif ?>
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
            <label for="kate">Katego</label>
            <input type="text" class="form-control" id="kate" name="kate">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dropBuku">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="dropBuku" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="dropBukuLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-transparent">
      <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">
          <h5 class="modal-title" id="dropBukuLabel">Menghapus Buku ini?</h5>
        </h4>
        <p>Buku ini akan dihapus secara permanen termasuk foto sampul juga akan dihapus. buku yang sudah dihapus tidak dapat di kembalikan lagi!</p>
        <hr>
        <div class="text-center">
          <p class="mb-0">Tetap hapus buku ini?...</p>
          <small id="nameBook" class="pb-3 pt-0"></small>
          <br>
          <input type="hidden" id="inpId" value="">
          <button type="button" class="btn btn-sm badge-pill badge-warning" data-dismiss="modal">Tidak jadi</button>
          <button type="button" onclick="runRemove(this)" id="btnRemove" class="text-white btn btn-sm badge-pill badge-danger">Tetap Hapus</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  let elListBook = '';
  function remove(a) {
    const id = a.getAttribute('data-id');
    $('#nameBook').text(a.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.textContent);
    elListBook = a;
    $('#inpId').val(id);
    console.log(id);
    $('#dropBuku').modal('show');
  }
  function runRemove(a) {
    const id = $('#inpId').val();
    $('#inpId').val('');
    a.disabled = true;
    a.innerHTML = '<i class="fa fa-spinner fa-pulse"></i> Menghapus';
    $.post(window.location.origin+'/Engine/dropBuku', {data: id}, function(res) {
      console.log(res);
    })
    setTimeout(function() {
      a.previousElementSibling.hidden = true;
      a.innerHTML = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTerhapus&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
      setTimeout(function() {
        $('#dropBuku').modal('hide');
        $('#nameBook').text('');
        a.disabled = false;
        a.previousElementSibling.hidden = false;
        a.innerHTML = 'tetap Hapus';
        elListBook.parentElement.parentElement.style.transform = 'scale(0)';
        setTimeout(function() {
          elListBook.parentElement.parentElement.remove();
        },1000);
      },700);
    },2000);
  }
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