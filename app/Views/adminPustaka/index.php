<?= $this->extend('layout/adminPustaka'); ?>
<?= $this->section('Admin'); ?>
	<div class="container pt-3">
		<div class="row">
			<div class="col-12 col-md-7 mb-2">
				<div class="card" id="">
					<h6>Comming Soon</h6>
				</div>
			</div>
			<div class="col-12 col-md-5">
				<div class="card">
				  	<div class="card-header">
				    Siswa Aktif
				  	</div>
				  	<div class="card-body py-0 pr-0 pl-2">
						<table class="table table-sm table-borderless w-100">
						  <thead>
						    <tr>
						      <th scope="col">Nama</th>
						      <th scope="col">Kelas</th>
						      <th scope="col">Waktu baca</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      <td>David aprilio</td>
						      <td>12 tkj 2</td>
						      <td><span class="badge-warning badge">13m</span></td>
						    </tr>
						    <tr>
						      <td title="mohammad jacob jason jealadi mustofa amilatus amin">Arina pramita</td>
						      <td>12 tkj 2</td>
						      <td><span class="badge-success badge">0m</span></td>
						    </tr>
						    <tr>
						      <td>Bara anggara </td>
						      <td>12 tkj 2</td>
						      <td><span class="badge-success badge">0m</span></td>
						    </tr>
						  </tbody>
						</table>
				  	</div>
				</div>
			</div>
			<div class="col-12 col-md-7 mb-2">
				<div class="card" id="">
					
				</div>
			</div>
			<div class="col-12 col-md-5">
				<div class="card" id="chart">
					
				</div>
			</div>
		</div>
	</div>
<script src="<?= base_url('/apexcharts.js') ?>"></script>
<script>
	var options = {
        series: [
          	{
	          name: 'Minggu 1',
	          data: [10, 41, 35, 49, 38, 91, 148]
	        },
	        {
	          name: 'Minggu 2',
	          data: [35, 11, 49, 62, 30, 19, 100]
	        },
	        {
	          name: 'Minggu 3',
	          data: [41, 35, 49, 62, 69, 11, 10]
	        },
	        {
	          name: 'Minggu 4',
	          data: [10, 35, 51, 49, 62, 73, 50]
	        }
        ],
          chart: {
          type: 'heatmap',
          toolbar: {
	        tools: {
	          download: true,
	          zoom: false,
	          zoomin: false,
	          zoomout: false,
	          pan: false,
	          reset: false,
	        },
	      },
        },
        dataLabels: {
          enabled: false
        },
        colors: ["#008FFB"],
        title: {
          text: 'Statistik aktifitas membaca'
        },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
</script>
<?= $this->endSection(); ?>">