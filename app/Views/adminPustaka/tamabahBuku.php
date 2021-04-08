<?= $this->extend('layout/adminPustaka'); ?>
<?= $this->section('Admin'); ?>
<link href="<?= base_url('/css/inputTag.css') ?>" rel="stylesheet" type="text/css">
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
	<div class="row p-3" style="max-width: 1000px">
		<div class="col-12 col-sm-4 text-center text-md-right">
			<form action="<?= base_url('/Engine/upBook') ?>" method="POST" enctype="multipart/form-data">
			<div class="img-Sampul">
				<img src="<?= base_url('img/book/default.jpg'); ?>" class="img-thumbnail">
				<label class="labelInput" for="fileSampul" data-browse="Sampul Buku">
					<i class="fa fa-camera"></i>
					<span>Pilih Sampul</span>
				 	<input type="file" class="custom-file-input" id="fileSampul" accept="image/x-png,image/jpeg,image/jpg" onchange="previewIMG()" name="imgSampul">
				</label>
			</div>
		</div>
		<div class="col-12 col-sm-8 bg-white rounded py-4 shadow">
				<div class="custom-file input-group-sm">
				  	<input type="file" class="custom-file-input" required="" id="inputBook" name="book" onchange="viewFilename()" accept="application/pdf">
				  	<label class="custom-file-label text-nowrap overflow-hidden" style="text-overflow: ellipsis;" for="inputBook" data-browse="Cari file" id="viewname">Pilih Buku dengan format PDF</label>
				</div>
				<div class="form-group input-group-sm">
				    <label for="judulbuku">Judul</label>
				    <input type="text" required="" class="form-control" id="judulbuku" name="titlebook">
				</div>
				<div class="form-group input-group-sm">
				    <label for="penulis">Penulis</label>
				    <input type="text" required="" class="form-control" id="penulis" name="writer">
				</div>
				<div class="form-group input-group-sm">
				    <label for="penerbit">Penerbit</label>
				    <input type="text" required="" class="form-control" id="penerbit" name="publisher">
				</div>
				<div class="form-group">
				    <label for="kate">Target</label>
				    <select class="form-control" required="" onchange="runSelect(this)" id="iniS" name="Kategori">
				    	<optgroup label="Untuk Kelas">
						    <option selected="" value="Buku Kelas 10">Kelas 10</option>
						    <option value="Buku Kelas 11">Kelas 11</option>
						    <option value="Buku Kelas 12">Kelas 12</option>
				    		<option value="Publik">Laninya</option>
				    	</optgroup>
				    </select>
				</div>
				<div class="form-group" id="kateThis">
				    <label for="kate">Kategori</label>
				    <select class="form-control" name="tag[]" multiple="multiple" id="selectHere">
				    	<optgroup label="pilih satu atau lebih">
				    		<?php foreach ($manuProdi as $val): ?>
						    	<option value="<?= $val['kat_menu'] ?>"><?= str_replace('Buku', '', $val['kat_menu']) ?></option>
				    		<?php endforeach ?>
				    	</optgroup>
				    </select>
				</div>
				<div class="form-group input-group-sm">
				    <label for="tag">Tag</label>
				    <input type="text" required="" class="form-control" id="tag" name="tag">
				</div>
				<div class="form-group input-group-sm">
				    <label for="kate">Deskripsi</label>
				    <textarea class="form-control" required="" name="deskripsi"></textarea>
				</div>
				
				<button type="submit" class="btn btn-primary" name="upload">Submit</button>
			</form>
		</div>

	</div>
</div>
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
			$('#selectHere').html(`
		    	<optgroup label="pilih satu atau lebih">
			    	<?php foreach ($manuUmum as $val): ?>
				    	<option value="<?= $val['kat_menu'] ?>"><?= str_replace('Buku', '', $val['kat_menu']) ?></option>
		    		<?php endforeach ?>
		    	</optgroup>
			`);
		} else {
			$('#selectHere').html(`
		    	<optgroup label="pilih satu atau lebih">
			    	<?php foreach ($manuProdi as $val): ?>
				    	<option value="<?= $val['kat_menu'] ?>"><?= str_replace('Buku', '', $val['kat_menu']) ?></option>
		    		<?php endforeach ?>
		    	</optgroup>
			`);
		}
	}
</script>
<?= $this->endSection(); ?>">