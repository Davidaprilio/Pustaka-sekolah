<?= $this->extend('layout/adminPustaka'); ?>
<?= $this->section('Admin'); ?>
<div class="container bg-white rounded shadow p-4" style="min-height: 90vh;">
	<table id="tableBook" class="table table-striped table-bordered table-sm rounded w-100">
	  	<thead>
		    <tr>
		      <th>no.</th>
		      <th>Judul</th>
		      <th>Penulis</th>
		      <th>Penerbit</th>
		      <th>Deskripsi</th>
		      <th>Opsi</th>
		    </tr>
		</thead>
		<tbody up="no">
		    <?php 
		    $no = 1;
		    foreach ($table as $data): ?>
		    <tr id="<?= $data['slug_buku'] ?>" >
		      	<td><?= $no++ ?></td>
		      	<td title="<?= $data['judul_buku'] ?>" fc="1" class="tdup"><?= $data['judul_buku'] ?></td>
		      	<td title="<?= $data['penulis'] ?>" fc="2" class="tdup"><?= $data['penulis'] ?></td>
		      	<td title="<?= $data['penerbit'] ?>" fc="3" class="tdup"><?= $data['penerbit'] ?></td>
		      	<td title="<?= $data['deskripsi'] ?>" fc="4" class="tdup"><?= $data['deskripsi'] ?></td>
		      	<td id="opsi">
		      		<a class="badge badge-info text-white mb-1" id="getInfo" data-check="<?= $data['slug_buku'] ?>" style="cursor: pointer;" data-toggle="modal" data-target="#detailBuku">detail</a>
			      	<a href="<?= base_url('/Engine/dropBuku/').'/'.$data['slug_buku'] ?>" class="badge badge-danger" onclick="return confirm('Anda ingin menghapus data ini')">hapus</a>
		      	</td>
		    </tr>
		    <?php endforeach ?>
		</tbody>
	</table>
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

<script type="text/javascript">
	$(document).ready(function() {
		let vo = null;

    	$('table').on('click', '[up=no] tr td[title]', function() {
    		const data = $(this).html();
    		vo = data;
    		$(this).html(`<textarea type="text" class="w-100 " id="upCol" autofocus="">`+data+`</textarea>`);
    		$('tbody').attr('up','yes');
    	});

    	$('table').on('keyup', '#upCol', function(e) {
    		function closeE(oldVal=null) {
				const td = $('#upCol').parent(),
					  idbuku = td.parent().attr('id'),
					  fieldCol = td.attr('fc'),
					  urll = '<?= base_url('/Engine/updataTableBuku/') ?>/' + idbuku + '/' + fieldCol + '/' + datain;
				td.html((oldVal != null)? oldVal : datain);
				$('tbody').attr('up','no');
				return urll;
    		}
    		const datain = $('#upCol').val();	
			if (e.keyCode === 13) {
				const b = closeE();
				$.ajax({ url: b, type: 'get', dataType: 'ajax'});
				console.log(b);
			} else if (e.keyCode === 27) {
				if (datain == vo) {
					closeE();
				} else {
					let res = confirm('Batalkan perubahan?');
					if (res) {
						$('#upCol').parent().attr('title', vo);
						closeE(vo);
					}
				}
			} 
			else {
				$('#upCol').parent().attr('title', datain);
			}
    	});

    	$('#opsi #getInfo').on('click', function() {
    		let id = $(this).attr('data-check');
    		let ul = window.location.origin + '/API/book/' + id;
    		$.ajax({url: ul,type: 'get',dataType: 'json',success: function(a){$('.modal-body').html(`<div class="card mb-3 border-0 w-100"><h6 class="w-100 text-center d-md-none">`+a.items.judulBuku+`</h6><div class="row mx-auto"><div class="col-12 col-sm-3 col-lg-2  text-center"><img src="`+a.items.sampulMin+`" class="card-img imgdetialInfo"></div><div class="col-12 col-sm-9 col-lg-10"><div class="card-body pt-0">
    			<h5 class="card-title d-none d-md-block" style="text-overflow: ellipsis;overflow: hidden;width: 100%;white-space: nowrap;" title="`+a.items.judulBuku+`">`+a.items.judulBuku+`</h5>
    			<ul class="list-unstyled">
    				<li><span class="badge badge-secondary">Penulis</span> `+a.items.penulis+`</li>
    				<li><span class="badge badge-secondary">Penerbit</span> `+a.items.penerbit+`</li>
    				<li><span class="badge badge-secondary">Unduhan</span> `+a.items.unduhan+`x diunduh</li>
    				<li><span class="badge badge-secondary">Dibaca</span> `+a.items.dibaca+`x dibaca</li>
    				<li><span class="badge badge-secondary">Link unduh</span><a href="`+window.location.origin+`/Pustaka/unduh/`+a.items.idBuku+`">`+window.location.origin+`/Pustaka/unduh/`+a.items.idBuku+`</a></li>
    			</ul><p class="card-text"><small class="text-muted">Terakhir diupdate 12 ags 2021</small></p></div></div></div></div>`)}});
    	});
	});
</script>

<?= $this->endSection(); ?>">