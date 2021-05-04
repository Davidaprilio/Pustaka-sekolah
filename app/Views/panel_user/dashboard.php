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
                  <a href="<?= base_url('/User/t/'.$val['kode_tugas']).'/view' ?>" class="text-decoration-none d-block mx-0 mb-n1"><?= $val['judul'] ?></a>
                  <small class="text-muted"><?= $val['deskripsi'] ?></small>
                </div>
              <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>

<?= $this->endSection(); ?>">

<!-- 
id => string (1) "4"
kode_tugas => string (5) "69NEq"
id_guru => string (14) "b5bYTbdVd417bD"
judul => string (20) "Membaca buku animasi"
deskripsi => string (59) "baca buku animasi yang tertera untuk tambahan nilai kalian "
id_buku => string (12) "Ys202Ywuir24"
id_kelas => string (7) "yqp6DXA"
read_pages => string (5) "22-24" -->
