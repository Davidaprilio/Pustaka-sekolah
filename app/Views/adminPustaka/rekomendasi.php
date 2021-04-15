<?= $this->extend('layout/adminPustaka'); ?>

<?= $this->section('Admin'); ?>
<style>
  figure button {
    position: absolute;
    right: 0;
    transition: .4s ease-out;
    bottom: 29px;
  }
  figure.hide {
    opacity: 0;
  }
</style>
<div class="container-xxl p-md-2">
  <div class="card p-3">
    <h5 class="mb-1">Rekomendasikan buku</h5>
    <div class="border rounded p-2" id="containerSuggestBook">
      <?= $this->include('adminPustaka/rowBookRecommend') ?>
    </div>

    <div>
      <nav class="navbar navbar-light justify-content-end">
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Cari Buku" aria-label="Search">
        </form>
      </nav>   
      <div class="border p-2 rounded">
        <?php
         foreach ($buku as $key): ?>
          <figure class="figure position-relative" title="<?= $key['judulBuku'] ?>">
            <img width="90" height="150" src="<?= base_url($key['sampulMin']) ?>" class="figure-img img-fluid rounded mb-0">
            <button data-buku="<?= $key['idBuku'] ?>" title="tambahkan buku" class="border-0 badge badge-success"><i class="fa fa-check"></i></button>
            <figcaption class="figure-caption">
              <small><?= ellipsize($key['judulBuku'], 11,1,'...') ?></small>
            </figcaption>
          </figure>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('.card.p-3').on('click', 'button.badge-danger', function() {
      const btn = $(this);
      console.log(btn.attr('data-buku'));
      btn.children().removeClass('fa-times').addClass('fa-spinner fa-pulse');
      $.post(
        'http://smektaliterasi.com/Petugaspustaka/rekomendasi/drop',
        { data: btn.attr('data-buku')},
        function(data) {
          btn.removeClass('badge-danger').addClass('badge-success');
          btn.children().removeClass('fa-spinner fa-pulse').addClass('fa-check');
          btn.parent().addClass('hide');
          setTimeout(function() {
            $('#containerSuggestBook').html(data);
          },500);
        }
      );
    })
    $('.card.p-3').on('click', 'button.badge-success', function() {
      const btn = $(this);
      console.log(btn.attr('data-buku'));
      btn.children().removeClass('fa-check').addClass('fa-spinner fa-pulse');
      $.post(
        'http://smektaliterasi.com/Petugaspustaka/rekomendasi/add',
        { data: btn.attr('data-buku')},
        function(data) {
          btn.removeClass('badge-success').addClass('badge-danger');
          btn.children().removeClass('fa-spinner fa-pulse').addClass('fa-times');
          nextStep(data, btn);
        }
      )
    })

    function nextStep(data, btn) {
      $('#containerSuggestBook').html(data);
      btn.parent().remove();
      setTimeout(function() {
        btn.parent().remove();
      },1000);
    }
  });
</script>
<?= $this->endSection(); ?>">