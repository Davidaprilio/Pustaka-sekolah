<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/fonts/font-awesome.min.css') ?>">
	<script src="<?= base_url('/pdfjs/build/pdf.js') ?>"></script>
	<style type="text/css">
		.btn:focus {
			border: 0;
			box-shadow: none;
		}
		#the-canvas {
		  	direction: ltr;
		}
		#btnZoom {
			position: absolute;
			background-color: #eee;
			right: 30px;
			z-index: 1031;
		}
		#btnZoom.zoomP {
			bottom: 120px;
		}
		#btnZoom.zoomM {
			bottom: 80px;
		}
		#prev, #next {
			position: absolute;
			top: 50%;
			border-radius: 40%;
			z-index: 1031;
		}
		#prev i, #next i {
			color: #ddd;
		}
		#prev:hover i, #next:hover i {
			transform: scale(1.1);
		}
		#prev {
			left: 30px;
		}
		#next {
			right: 30px;
		}
		#next:disabled {
			cursor: not-allowed;
		}
		.fa-spinner {
			position: absolute;
			top: 50%;
			left: 48%;
		}
		canvas {
		    display: block;
		    margin: 0 auto;
			margin-top: 5px;
			margin-bottom: 20px;
		}
		@media (max-width: 654px) {
			canvas {
				max-width: 100% !important;
				max-height: 100% !important;
			#prev, #next {
				top: 5px;
			}
			#prev {
				left: 20px;
			}
			#next {
				right: 20px;
			}
		}

	</style>
</head>
<body class="bg-light">
	<div class="navbar navbar-light bg-transparent fixed-top justify-content-center">
	  	<div class="badge badge-pill badge-dark text-white p-2">
	  		Page: <span id="page_num"></span> / <span id="page_count"></span>
	  	</div>
	</div>
	<main class="overflow-hidden vw-100 vh-100 bg-dark position-relative">
		<button class="btn bg-transparent p-0" id="prev">
			<i class="fa fa-2x fa-chevron-circle-left"></i>
		</button>
		<button class="btn bg-transparent p-0" disabled id="next">
			<i class="fa fa-2x fa-chevron-circle-right"></i>
		</button>
		<button id="btnZoom" class="d-none d-sm-block btn btn-sm zoomM rounded-circle border">
			<i class="fa fa-search-minus"></i>
		</button>
		<button id="btnZoom" class="d-none d-sm-block btn btn-sm zoomP rounded-circle border">
			<i class="fa fa-search-plus"></i>
		</button>
	  	<i id="load" class="fa fa-spinner fa-pulse fa-3x" style="color: #ccc"></i>
		
		<div id="card-canvas" style="overflow: auto;" class="vh-100 vw-100 d-flex d-sm-block justify-content-center align-items-center mt-n5 mt-sm-0">
			<canvas class="border rounded shadow-sm" height="673" width="476" id="the-canvas"></canvas>
		</div>
	</main>


	<script>
		// If absolute URL from the remote server is provided, configure the CORS
		// header on that server.
		var url = '<?= $fileBook; ?>';
		// Loaded via <script> tag, create shortcut to access PDF.js exports.
		var pdfjsLib = window['pdfjs-dist/build/pdf'];
		// The workerSrc property shall be specified.
		pdfjsLib.GlobalWorkerOptions.workerSrc = '<?= base_url('/pdfjs/build/pdf.worker.js') ?>';

		var pdfDoc = null,
		    pageNum = <?= $read_pages[0] ?>,
		    pageRendering = false,
		    pageNumPending = null,
		    scale = 1.5,
		    canvas = document.getElementById('the-canvas'),
		    card = document.getElementById('card-canvas'),
		    loading = document.getElementById('load'),
		    ctx = canvas.getContext('2d'),
		    nextP = false,
		    time,
		    lock = <?= $read_pages[0] ?> + 1;


		/**
		 * Get page info from document, resize canvas accordingly, and render page.
		 * @param num Page number.
		 */
		function renderPage(num) {
	      loading.style.display = "block";
	      loading.classList.add('fa-pulse');
	      if (num >= lock) {
	      	renderPage(lock -1);
	      	return false;
	      } else if (num == lock -1) {
	      	document.getElementById('next').disabled = true;
	      }

		  pageRendering = true;
		  // Using promise to fetch the page
		  pdfDoc.getPage(num).then(function(page) {
		    var viewport = page.getViewport({scale: scale});
		    canvas.height = viewport.height;
		    canvas.width = viewport.width;
		    // card.setAttribute('style', `height: ${viewport.height}px; width: ${viewport.width}px`);

		    // Render PDF page into canvas context
		    var renderContext = {
		      canvasContext: ctx,
		      viewport: viewport
		    };
		    var renderTask = page.render(renderContext);

		    // Wait for rendering to finish
		    renderTask.promise.then(function() {
		      pageRendering = false;
		      loading.style.display = "none";
		      loading.classList.remove('fa-pulse');
		      if (pageNumPending !== null) {
		        // New page rendering is pending
		        renderPage(pageNumPending);
		        pageNumPending = null;
		      }
		    });
		  });

		  // Update page counters
		  document.getElementById('page_num').textContent = num;
		}

		/**
		 * If another page rendering in progress, waits until the rendering is
		 * finised. Otherwise, executes rendering immediately.
		 */
		function queueRenderPage(num) {
		  document.getElementById('next').disabled = false;
		  if (pageRendering) {
		    pageNumPending = num;
		  } else {
		    renderPage(num);
		  }
		}

		/**
		 * Displays previous page.
		 */
		function onPrevPage() {
		  clearTimeout(time);
		  if (pageNum <= 1) {
		    return;
		  }
		  pageNum--;
		  queueRenderPage(pageNum);
		}
		document.getElementById('prev').addEventListener('click', onPrevPage);
		// document.getElementById('prev').addEventListener('touchstart', onPrevPage);

		/**
		 * Displays next page.
		 */
		function onNextPage() {
		  clearTimeout(time);
		  if (pageNum >= pdfDoc.numPages || pageNum > lock) {
		    return;
		  }
		  pageNum++;
		  if (pageNum == lock && nextP) {
		  	lock++;
		  	nextP = false;
		  	console.log('Buka Halaman');
		  	timer();
		  	queueRenderPage(pageNum);
		  } else if (pageNum == lock - 1) {
		  	console.log('Halaman penentu');
		  	timer();
			queueRenderPage(pageNum);
		  } else if (pageNum < lock) {
		  	console.log('next Biasa');
			queueRenderPage(pageNum);
		  } else {
		  	console.log('mbuh');
		  	pageNum--;
		  	return false;
		  }
		}
		document.getElementById('next').addEventListener('click', onNextPage);
		// document.getElementById('next').addEventListener('touchstart', onNextPage);

		/**
		 *	Zoom Page +/- 
		 */
		function min() {
			scale = scale - 0.2;
			queueRenderPage(pageNum);
		}
		document.getElementsByClassName('zoomM')[0].addEventListener('click', min);
		// document.getElementsByClassName('zoomM')[0].addEventListener('touchstart', min);
		function plus() {
			scale = scale + 0.2;
			queueRenderPage(pageNum);
		}
		document.getElementsByClassName('zoomP')[0].addEventListener('click', plus);
		// document.getElementsByClassName('zoomP')[0].addEventListener('touchstart', plus);

		function timer() {
			time = setTimeout(function() {
				document.getElementById('next').disabled = false;
				nextP = true;
				console.log('Lanjut');
			},1000 * 15);
		}
		/**
		 * Asynchronously downloads PDF.
		 */
		pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
		  pdfDoc = pdfDoc_;
		  document.getElementById('page_count').textContent = pdfDoc.numPages;

		  // Initial/first page rendering
		  renderPage(pageNum);
		  timer();
		});

		
	</script>
</body>
</html>