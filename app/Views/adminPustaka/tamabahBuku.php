<?= $this->extend('layout/adminPustaka'); ?>
<?= $this->section('Admin'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link href="<?= base_url('/')?>/summernote/summernote-lite.min.css" rel="stylesheet">
<script src="<?= base_url('/')?>/summernote/summernote-lite.min.js"></script>
<link href="<?= base_url('/css/inputTag.css') ?>" rel="stylesheet" type="text/css">
<style>
	.note-dropdown-menu.dropdown-style {
		width: 200px;
	}
	.dropdown-item {
	    padding: .25rem 1.5rem !important;
	    font-size: 14.5px !important;
	}
	.dropdown-item.active::before {
	    content: '';
	    background-color: var(--primary);
	    width: 5px;
	    border-bottom-right-radius: 10px;
	    border-top-right-radius: 10px;
	    position: absolute;
	    top: 0;
	    bottom: 0;
	    left: 0;
	}
	.card-item {
		border: none;
		border-top: 5px solid var(--warning);
	}
	.row .col-sm-9{
		margin-top: 25px;
	}
	label[for=penerbit] ~ span.twitter-typeahead {
		display: block !important;
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
						    <input type="text" required="" class="form-control w-100" id="penerbit" name="publisher">
						</div>
					</div>
					
					<div class="col-sm-9 pt-3 border rounded">
						<div class="form-group">
						    <label for="kate">Simpan buku di menu</label>
						    <select class="form-control selectpicker show-tick border rounded mb-1" data-width="100%" data-show-subtext="true" required="" id="iniS" name="Kategori">
					    		<?php foreach ($menu as $val): ?>
							    	<optgroup label="<?= $val[0] ?>">
							    		<?php unset($val[0]);
							    		foreach ($val as $value): ?>
										    <option value="<?= $value['kode'] ?>"><?= $value['alias'] ?></option>
							    		<?php endforeach ?>
							    	</optgroup>
					    		<?php endforeach ?>
						    </select>
						</div>
						<!-- <div class="form-group" id="kateThis">
						    <label for="kate">Kategori</label>
						    <select class="selectpicker show-tick border rounded mb-1" required="" data-width="100%" name="menu" id="selectHere" data-show-subtext="true">
						    	<option value="semua">semua</option>
						    </select>
						</div> -->
					</div>
					<div class="col-sm-9 pt-3 border rounded">
						<div class="form-group input-group-sm">
						    <label for="tag">Tag</label>
						    <input type="text" class="form-control" id="tag" name="tag">
						</div>
						<div class="form-group input-group-sm">
						    <label for="editDesk">Deskripsi</label>
						    <textarea id="editDesk" class="form-control" rows="7" required="" name="deskripsi"></textarea>
						</div>
					</div>
					<div class="col-12 col-sm-9 col-xl-3 d-flex align-items-end">
						<div class="card">
							<div class="card-body">
								<h4 class="raleway">Unggah Buku</h4>
								<p class="text-justify text-dark" style="font-size: 14px">Isikan semua data yang diminta lalu cantumkan sinopsis buku di deskripsi agar memiliki standar yang rapi, dan berikan Hastag yang relevan agar pencarian lebih optimal</p>
								<small class="d-block">Jika semua form sudah di isi silahkan klik Unggah buku</small>
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
	
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
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

	$(document).ready(function() {
		$(window).keydown(function(event){
		    if(event.keyCode == 13) {
		      event.preventDefault();
		      return false;
		    }
		});

        $('#editDesk').summernote({
        	placeholder: 'Deskripsi Buku atau isikan sinopsis buku',
        	minHeight: 200,
        	toolbar: [
			    ['style', ['bold', 'italic', 'underline']],
			    ['font', ['strikethrough', 'superscript', 'subscript']],
			    ['para', ['ul', 'ol', 'paragraph']],
			    ['height', ['height']]
			]
        });



		<?php 
		if (!is_null( session()->getFlashdata('formKosong') )): ?>
			notif('Formulir Kosong!', '<?= session()->getFlashdata('formKosong') ?>', 900);
		<?php elseif (!is_null( session()->getFlashdata('success') )) : ?>
			notif('Buku berhasil diunggah', 'Buku berhasil diunggah, anda bisa melihatnya pada tautan berikut <p class="w-100"><a class="badge-primary badge-pill py-1 px-3" style="font-size: 13px; cursor: pointer" href="<?= session()->getFlashdata('success') ?>">Lihat buku</a></p>', 999, 6000);
		<?php endif ?>
    });

function getData(uRl) {
	var resource = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  prefetch: {
	    url: uRl,
	    filter: function(list) {
	      	return $.map(list, function(cityname) {
	        	return { name: cityname }; 
	    	});
	    }
	  }
	});
	resource.initialize();
	return resource.ttAdapter();
}
function substringMatcher (strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;
    matches = [];
    substrRegex = new RegExp(q, 'i');
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

var states;
$.ajax({
  url: window.location.origin + '/API/abstractBook/publisher',
  dataType: 'json',
  async: false,
  data: 'get',
  success: function(data) {
	states = data;
  }
});


$('#penulis').tagsinput({
  typeaheadjs: {
  	name: 'citynames',
    displayKey: 'name',
    valueKey: 'name',
    source: getData(window.location.origin + '/API/abstractBook/writer'),
  }
});	
$('#penerbit').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'states',
  source: substringMatcher(states)
});
$('#tag').tagsinput({
  typeaheadjs: {
  	maxTags: 7,
  	name: 'citynames',
    displayKey: 'name',
    valueKey: 'name',
    source: getData(window.location.origin + '/API/abstractBook/tag'),
  }
});	
</script>
<?= $this->endSection(); ?>">