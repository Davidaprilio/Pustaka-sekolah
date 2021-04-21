<?= $this->extend('layout/adminPustaka'); ?>
<?= $this->section('Admin'); ?>
<link href="<?= base_url('/css/inputTag.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?= base_url('/css/dropZone.css') ?>">
<div class="container-xxl">
	<div class="card text-center">
	  <div class="card-header">
	    <ul class="nav nav-tabs card-header-tabs">
	      <li class="nav-item">
	        <a class="nav-link active" href="#">Upload Book</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Informasi Buku</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Finish</a>
	      </li>
	    </ul>
	  </div>
	  <div class="card-body">
	  	<form action="#">
	  	  <div class="w-100">
	  	  	<div class="boxFile">
	  	  		<div class="contentBoxFile">
		  	  		<canvas id="pdfViewer"></canvas>
	  	  			<h3>Unggah buku disini</h3>
	  	  			<small class="text-muted">Drag & drop atau klik cari buku untuk mengunggah buku</small>
	  	  		</div>
			  		<input type="file" name="file" title="Unggah Buku" id="inputFile">  	
	  	  	</div>
		    </div>
	  	</form>
	  </div>
	</div>
</div>
<script src="<?= base_url('/js/inputTag.js') ?>"></script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
<script>
	// Loaded via <script> tag, create shortcut to access PDF.js exports.
var pdfjsLib = window['pdfjs-dist/build/pdf'];
// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

$("#inputFile").on("change", function(e){
	var file = e.target.files[0]
	if(file.type == "application/pdf"){
		var fileReader = new FileReader();  
		fileReader.onload = function() {
			var pdfData = new Uint8Array(this.result);
			// Using DocumentInitParameters object to load binary data.
			var loadingTask = pdfjsLib.getDocument({data: pdfData});
			loadingTask.promise.then(function(pdf) {
			  console.log('PDF loaded');
			  $('.contentBoxFile').addClass('show');
			  
			  // Fetch the first page
			  var pageNumber = 1;
			  pdf.getPage(pageNumber).then(function(page) {
				console.log('Page loaded');
				
				var scale = 1.5;
				var viewport = page.getViewport({scale: scale});

				// Prepare canvas using PDF page dimensions
				var canvas = $("#pdfViewer")[0];
				var context = canvas.getContext('2d');
				canvas.height = viewport.height;
				canvas.width = viewport.width;

				// Render PDF page into canvas context
				var renderContext = {
				  canvasContext: context,
				  viewport: viewport
				};
				var renderTask = page.render(renderContext);
				renderTask.promise.then(function () {
				  console.log('Page rendered');
				});
			  });
			}, function (reason) {
			  // PDF loading error
			  console.error(reason);
			});
		};
		fileReader.readAsArrayBuffer(file);
	}
});
</script>
<?= $this->endSection(); ?>