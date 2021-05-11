<?= $this->extend('layout/adminPustaka'); ?>
<?= $this->section('Admin'); ?>
<link href="<?= base_url('/css/inputTag.css') ?>" rel="stylesheet" type="text/css">
<style>
	.card-item {
		border: none;
		border-top: 5px solid var(--warning);
	}
	.row .col-sm-9{
		margin-top: 25px;
	}
	@media (max-width: 576px) {
		.border.rounded {
			border: none !important;
		}
	}
</style>
<div class="container">
	<?php 
	// session()->getFlashdata('pesan')
	if (false): ?>
		<div class="alert alert-success alert-dismissible fade show position-fixed" role="alert" style=" z-index: 2000; top: 10px; right: 10px" >
		  <strong>Berhasil!</strong> buku berhasil diupload.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	<?php endif ?>
	<form action="<?= base_url('/Engine/upBook') ?>" method="POST" enctype="multipart/form-data">
		<div class="card card-item mt-2 mb-3 shadow-sm">
			<h3 class="raleway text-muted text-center pt-3">Tambah Buku</h3>
			<div class="card-body p-3 p-md-5">
				<div class="row">
					<div class="col-12 col-sm-9 pt-3 mt-0 border rounded">
						<span>Pilih Buku</span>
						<div class="custom-file input-group-sm mb-2">
						  	<label class="custom-file-label text-nowrap overflow-hidden" style="text-overflow: ellipsis;" for="inputBook" data-browse="Cari file" id="viewname">Pilih Buku dengan format PDF</label>
						  	<input type="file" class="custom-file-input" required="" id="inputBook" name="book" onchange="viewFilename()" accept="application/pdf">
						</div>
						<div class="form-group input-group-sm">
						    <label for="judulbuku">Judul</label>
						    <input type="text" required="" class="form-control" id="judulbuku" name="titlebook">
						</div>
					</div>
					<div class="col-12 col-sm-3">
						<div class="img-Sampul">
							<img src="<?= base_url('img/book/default.jpg'); ?>" class="img-thumbnail">
							<label class="labelInput" for="fileSampul" data-browse="Sampul Buku">
								<i class="fa fa-camera"></i>
								<span>Pilih Sampul</span>
							 	<input type="file" class="custom-file-input" id="fileSampul" accept="image/x-png,image/jpeg,image/jpg" onchange="previewIMG()" name="imgSampul">
							</label>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-sm-9 pt-3 border rounded">
						<div class="form-group input-group-sm">
						    <label for="penulis">Penulis</label>
						    <input type="text" required="" class="form-control" id="penulis" name="writer">
						</div>
						<div class="form-group input-group-sm">
						    <label for="penerbit">Penerbit</label>
						    <input type="text" required="" class="form-control" id="penerbit" name="publisher">
						</div>
					</div>
					<div class="col-sm-9 pt-3 border rounded">
						<div class="form-group">
						    <label for="kate">Target</label>
						    <select class="form-control" required="" onchange="runSelect(this)" id="iniS" name="Kategori">
						    	<optgroup label="Buku Pelajaran">
								    <option selected value="Buku Kelas 10">Kelas 10</option>
								    <option value="Buku Kelas 11">Kelas 11</option>
								    <option value="Buku Kelas 12">Kelas 12</option>
						    	</optgroup>
						    	<optgroup label="Buku Umum">
						    		<option value="Publik">Umum</option>
						    	</optgroup>
						    </select>
						</div>
						<div class="form-group" id="kateThis">
						    <label for="kate">Kategori</label>
						    <select class="form-control" name="tag[]" multiple="multiple" id="selectHere">
						    	<optgroup label="pilih satu atau lebih">
								    	<option value="">icnweuh</option>
						    	</optgroup>
						    </select>
						</div>
					</div>
					<div class="col-sm-9 pt-3 border rounded">
						<div class="form-group input-group-sm">
						    <label for="tag">Tag</label>
						    <input type="text" class="form-control" id="tag" name="tag">
						</div>
						<div class="form-group input-group-sm">
						    <label for="kate">Deskripsi</label>
						    <textarea class="form-control" rows="7" required="" name="deskripsi"></textarea>
						</div>
					</div>
					<div class="col-12 col-sm-9 col-xl-3 d-flex align-content-end">
						<div class="card">
							<div class="card-body">
								<h4 class="raleway">Unggah Buku</h4>
								<p class="text-justify text-dark" style="font-size: 14px">Isikan semua data yang diminta lalu cantumkan sinopsis buku di deskripsi agar memiliki standar yang rapi, dan berikan Hastag yang relevan agar pencarian lebih optimal</p>
								<small class="d-block">Jika sudah form di isi silahkan Unggah buku</small>
								<button type="submit" class="btn btn-primary" name="upload">
									<i class="fa fa-upload"></i>&nbsp Unggah Buku ini
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<script src="http://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
<script src="<?= base_url('/js/inputTag.js') ?>"></script>
<script>

	function previewIMG() {
		const sampul = document.querySelector('#fileSampul'),
			  imgPreview =  document.querySelector('.img-thumbnail'),
			  fileSampul = new FileReader();
		fileSampul.readAsDataURL(sampul.files[0]);

		fileSampul.onload = function(e) {
			imgPreview.src = e.target.result;
		}
	}
	function viewFilename() {
		const book =  document.querySelector('#inputBook'),
			  judul =  document.querySelector('#judulbuku'),
			  label =  document.querySelector('#viewname'),
			  nameFile = book.files[0].name;
		label.textContent = nameFile;
		judul.value = nameFile.replace(".pdf","");
	}
	function runSelect(id) {
		let k = $("select#iniS option:selected").val();
		console.log(k);
		if (k == 'Publik') {
			$('#selectHere').html(``);
		} else {
			$('#selectHere').html(``);
		}
	}
</script>
<script>

function getData(url) {
	var writer = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  prefetch: {
	    url: url,
	    filter: function(list) {
	      	return $.map(list, function(cityname) {
	        	return { name: cityname }; 
	    	});
	    }
	  }
	});
	writer.initialize();
	return writer.ttAdapter();
}

$('#tag').tagsinput({
  typeaheadjs: {
  	maxTags: 7,
  	name: 'tag',
    displayKey: 'name',
    source: getData(window.location.origin + '/API/abstractBook/tag/5'),
  }
});	
$('#penerbit').tagsinput({
  typeaheadjs: {
  	name: 'publisher',
    displayKey: 'name',
    source: getData(window.location.origin + '/API/abstractBook/publisher/5'),
  }
});	
$('#penulis').tagsinput({
  typeaheadjs: {
  	name: 'writer',
    displayKey: 'name',
    source: getData(window.location.origin + '/API/abstractBook/writer/5'),
  }
});	
</script>
<?= $this->endSection(); ?>">