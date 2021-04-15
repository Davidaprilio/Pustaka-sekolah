<?= $this->extend('layout/adminPustaka'); ?>

<?= $this->section('Admin'); ?>
<style>
  figure button {
    position: absolute;
    right: 0;
    bottom: 29px;
  }
</style>
<div class="container-xxl p-md-2">
  <div class="card p-3">
    <h5 class="mb-1">Rekomendasikan buku</h5>
    <div class="border rounded p-2">
      <figure class="figure position-relative" title="Simulasi digital - Kelas 10">
        <img width="90" height="150" src="<?= base_url('/img/book/min/21OGHQN0224.png') ?>" class="figure-img img-fluid rounded" >
        <button data-buku="testData" title="buang dari rekomendasi" class="border-0 badge badge-danger"><i class="fa fa-times"></i></button>
        <figcaption class="figure-caption">Simulasi </figcaption>
      </figure>
    </div>

    <div>
      <nav class="navbar navbar-light justify-content-end">
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Cari Buku" aria-label="Search">
        </form>
      </nav>   
      <div class="border p-2 rounded">
        <figure class="figure position-relative" title="Simulasi digital - Kelas 10">
          <img width="90" height="150" src="<?= base_url('/img/book/min/21OGHQN0224.png') ?>" class="figure-img img-fluid rounded" >
          <button data-buku="testData" title="tambahkan buku ini" class="border-0 badge badge-success"><i class="fa fa-check"></i></button>
          <figcaption class="figure-caption">Simulasi </figcaption>
        </figure>
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
        'http://smektaliterasi.com/PetugasPustaka/rekomendasi/remove',
        { data: btn.attr('data-buku')},
        function(data) {
          btn.removeClass('badge-danger').addClass('badge-success');
          btn.children().removeClass('fa-spinner fa-pulse').addClass('fa-check');
        }
      );
    })
    $('.card.p-3').on('click', 'button.badge-success', function() {
      const btn = $(this);
      console.log(btn.attr('data-buku'));
      btn.children().removeClass('fa-check').addClass('fa-spinner fa-pulse');
      $.post(
        'http://smektaliterasi.com/PetugasPustaka/rekomendasi/add',
        { data: btn.attr('data-buku')},
        function(data) {
          btn.removeClass('badge-success').addClass('badge-danger');
          btn.children().removeClass('fa-spinner fa-pulse').addClass('fa-times');
        }
      )
    })
  });
</script>
<?= $this->endSection(); ?>">