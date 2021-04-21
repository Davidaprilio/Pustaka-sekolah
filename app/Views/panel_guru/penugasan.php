<?= $this->extend('layout/panelGuru'); ?>

<?= $this->section('panel'); ?>
<style type="text/css">
	.container-xxl .card .nav .nav-item a {
		color: var(--blue);
	}
	.hoverCard {
		transition: .3s ease-in-out;
	}
	.hoverCard:hover {
		transform: translateY(-5px);
		transition: .1s ease-in-out;
		box-shadow: 5px 0 5px grey;
	}
</style>
<!-- Modal -->
<div class="modal fade" id="addNew" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      	<form action="">
		    <div class="modal-header border-0">
		        <h5 class="modal-title" id="addNewLabel">Membuat Tugas baru</h5>
		        <div>
			        <button type="submit" class="btn btn-primary">Simpan</button>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
		        </div>
		    </div>
		    <div class="modal-body">
		        <figure class="figure position-relative">
		            <img width="90" height="150" src="<?= base_url('/img/book/default.jpg') ?>" class="figure-img img-fluid rounded mb-0">
		            <figcaption class="figure-caption">
		              <small>Pustaka E-book</small>
		            </figcaption>
		      	</figure>
		      	<br>
		      	<label for="text"><small>Penjelasan tugas</small></label>
	      		<textarea class="form-control" id="text"></textarea>
		    </div>
      	</form>
    </div>
  </div>
</div>

<div class="container-xxl p-md-2">
	<div class="card p-3 shadow-sm" style="min-height: 88vh;">
		<ul class="nav border-bottom rounded-0 mb-1">
		  <li class="nav-item">
		    <a class="nav-link active" href="javascript:void(0)" data-toggle="modal" data-target="#addNew">+ Buat</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="#">Link</a>
		  </li>
		</ul>
		<div class="row">
			<div class="col-4">
				<div class="border rounded p-2 shadow-sm mb-2 hoverCard">
					<div class="d-flex justify-content-between">
						<h5 class="mb-1">Tugas 12 TKJ 2</h5>
						<span><i class="fa fa-user-o"></i> 20/36</span>
					</div>
					<a href="<?= base_url('/PanelGuru/tugas/12tkj2') ?>" class="text-blue">Membaca buku Sejarah indonesia</a>
					<hr class="mb-1 mt-0">
					<p class="ml-3 mb-1" style="font-size: 14.5px">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae obcaecati veniam nemo quis corporis molestias.</p>
					<small class="text-muted">Tanggal 12 April 2020</small>
				</div>
			</div>
			<div class="col-4">
				<div class="border rounded p-2 shadow-sm mb-2 hoverCard">
					<div class="d-flex justify-content-between">
						<h5 class="mb-1">Tugas 12 TKJ 2</h5>
						<span><i class="fa fa-user-o"></i> 20/36</span>
					</div>
					<a href="#" class="text-blue">Membaca buku Sejarah indonesia</a>
					<hr class="mb-1 mt-0">
					<p class="ml-3 mb-1" style="font-size: 14.5px">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae obcaecati veniam nemo quis corporis molestias.</p>
					<small class="text-muted">Tanggal 12 April 2020</small>
				</div>
			</div>
			<div class="col-4">
				<div class="border rounded p-2 shadow-sm mb-2 hoverCard">
					<div class="d-flex justify-content-between">
						<h5 class="mb-1">Tugas 12 TKJ 2</h5>
						<span><i class="fa fa-user-o"></i> 20/36</span>
					</div>
					<a href="#" class="text-blue">Membaca buku Sejarah indonesia</a>
					<hr class="mb-1 mt-0">
					<p class="ml-3 mb-1" style="font-size: 14.5px">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae obcaecati veniam nemo quis corporis molestias.</p>
					<small class="text-muted">Tanggal 12 April 2020</small>
				</div>
			</div>
			<div class="col-4">
				<div class="border rounded p-2 shadow-sm mb-2 hoverCard">
					<div class="d-flex justify-content-between">
						<h5 class="mb-1">Tugas 12 TKJ 2</h5>
						<span><i class="fa fa-user-o"></i> 20/36</span>
					</div>
					<a href="#" class="text-blue">Membaca buku Sejarah indonesia</a>
					<hr class="mb-1 mt-0">
					<p class="ml-3 mb-1" style="font-size: 14.5px">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae obcaecati veniam nemo quis corporis molestias.</p>
					<small class="text-muted">Tanggal 12 April 2020</small>
				</div>
			</div>
			<div class="col-4">
				<div class="border rounded p-2 shadow-sm mb-2 hoverCard">
					<div class="d-flex justify-content-between">
						<h5 class="mb-1">Tugas 12 TKJ 2</h5>
						<span><i class="fa fa-user-o"></i> 20/36</span>
					</div>
					<a href="#" class="text-blue">Membaca buku Sejarah indonesia</a>
					<hr class="mb-1 mt-0">
					<p class="ml-3 mb-1" style="font-size: 14.5px">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae obcaecati veniam nemo quis corporis molestias.</p>
					<small class="text-muted">Tanggal 12 April 2020</small>
				</div>
			</div>
			<div class="col-4">
				<div class="border rounded p-2 shadow-sm mb-2 hoverCard">
					<div class="d-flex justify-content-between">
						<h5 class="mb-1">Tugas 12 TKJ 2</h5>
						<span><i class="fa fa-user-o"></i> 20/36</span>
					</div>
					<a href="#" class="text-blue">Membaca buku Sejarah indonesia</a>
					<hr class="mb-1 mt-0">
					<p class="ml-3 mb-1" style="font-size: 14.5px">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae obcaecati veniam nemo quis corporis molestias.</p>
					<small class="text-muted">Tanggal 12 April 2020</small>
				</div>
			</div>
			<div class="col-4">
				<div class="border rounded p-2 shadow-sm mb-2 hoverCard">
					<div class="d-flex justify-content-between">
						<h5 class="mb-1">Tugas 12 TKJ 2</h5>
						<span><i class="fa fa-user-o"></i> 20/36</span>
					</div>
					<a href="#" class="text-blue">Membaca buku Sejarah indonesia</a>
					<hr class="mb-1 mt-0">
					<p class="ml-3 mb-1" style="font-size: 14.5px">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae obcaecati veniam nemo quis corporis molestias.</p>
					<small class="text-muted">Tanggal 12 April 2020</small>
				</div>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection(); ?>">