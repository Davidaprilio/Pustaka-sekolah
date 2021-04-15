<?= $this->extend('layout/panelGuru'); ?>

<?= $this->section('panel'); ?>
<style type="text/css">
	.container-xxl .card .nav .nav-item a {
		color: var(--blue);
	}
	.card p {
		font-size: 14.5px;
		color: var(--gray-dark);
	}
	table tbody tr td:nth-child(3) {
		font-size: 13px;
	}
</style>
<div class="container-xxl p-md-2">
	<div class="card p-3 shadow-sm" style="min-height: 88vh;">
		<h4 class="text-dark mb-0">Tugas 12 TKJ 2</h4>
		<hr class="mt-1">
		<small class="text-muted">14 agustus 2021</small>
		<p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, corrupti odio veniam, commodi vitae voluptatem? Et officiis aliquam nam ullam pariatur, incidunt. Asperiores tempore esse, enim commodi. Excepturi, debitis, exercitationem!</p>
		<div class="d-flex justify-content-start bg-light p-2 rounded shadow-sm">
			<figure class="figure position-relative">
	            <img width="90" height="150" src="<?= base_url('/img/book/default.jpg') ?>" class="figure-img img-fluid rounded mb-0">
	            <figcaption class="figure-caption">
	              <small>Pustaka E-book</small>
	            </figcaption>
          	</figure>
          	<div class="ml-2 pl-2">
      			<ul style="font-size: 14px" class="list-unstyled">
      				<li>Lorem ipsum dolor sit, amet consectetur.</li>
      				<li>Hal  153</li>
      			</ul>
	      	</div>
		</div>

		<table class="table table-borderless table-sm">
		  <thead>
		    <tr>
		      <th scope="col">No.</th>
		      <th scope="col">Nama</th>
		      <th scope="col" class="w-75">Progress</th>
		    </tr>
		  </thead>
		  <tbody class="text-dark">
		    <tr>
		      <th scope="row">1</th>
		      <td>Mark</td>
		      <td>25%
		      	<div class="progress" style="height: 8px">
				  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
			  </td>
		    </tr>
		    <tr>
		      <th scope="row">2</th>
		      <td>Thornton</td>
		      <td>100%
		      	<div class="progress" style="height: 8px">
				  <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
		      </td>
		    </tr>
		    <tr>
		      <th scope="row">3</th>
		      <td>Bagas Arisandi</td>
		      <td>35%
		      	<div class="progress" style="height: 8px">
				  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
		      </td>
		    </tr>
		  </tbody>
		</table>

	</div>
</div>
<?= $this->endSection(); ?>">