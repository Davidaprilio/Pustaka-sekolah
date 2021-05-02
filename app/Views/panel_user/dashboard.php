<?= $this->extend('panel_user/layout'); ?>

<?= $this->section('PanelUser'); ?>
  <div class="row">
    <div class="col-6">
      <div class="card shadow-sm card-item mt-2">
        <div class="card-body p-2 ">
          <span id="cardTitle" style="font-size: 28px; font-weight: lighter;">Tugas</span>
              <?php 
              $index = 0;
              foreach ($dataTugas as $val): ?>
                <div class="p-2 shadow-sm border-top rounded mb-2">
                  <a href="<?= base_url('/User/t/'.$val['kode_tugas']).'/view' ?>" class="text-decoration-none d-block mx-0 mb-n1">Membaca buku simdig</a>
                  <small class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit...</small>
                </div>
                <div class="p-2 shadow-sm border-top rounded mb-2">
                  <a href="#" class="text-decoration-none d-block mx-0 mb-n1">Membaca buku simdig</a>
                  <small class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit...</small>
                </div>
              <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>

<?= $this->endSection(); ?>">