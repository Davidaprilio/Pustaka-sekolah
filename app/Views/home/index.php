<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AppsSchool</title>
	<link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/fonts/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/css/home.css'); ?>">
</head>
<body class="container-xxl position-relative">
	<nav class="navbar navbar-expand-md navbar-light">
		<div class="container">
		  	<a class="navbar-brand font-weight-bold text-dark" href="#">AppsSchool</a>
		  	<a href="#" class="btn btn-light px-2 order-md-1"> Masuk </a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>
		  	<div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav ml-auto">
			      	<li class="nav-item active">
			        	<a class="nav-link" href="#">Home</a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="#">Features</a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="#">Pricing</a>
			      	</li>
			    </ul>
			</div>
		  	<button id="this-ddown"></button>
	  	</div>
	</nav>
	<svg xmlns="http://www.w3.org/2000/svg" class="position-absolute top-0 bg-back" viewBox="0 0 1440 320"><path fill="#eaf4f9" fill-opacity="1" d="M0,160L120,186.7C240,213,480,267,720,282.7C960,299,1200,277,1320,266.7L1440,256L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path></svg>
	<div class="jumbotron jumbotron-fluid bg-transparent position-relative">
		<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="position-absolute svgTop">
		  <path fill="#08BDBA" d="M31.2,-55.3C38.5,-44,41,-31.9,39.2,-22C37.5,-12,31.4,-4.2,35.4,8.8C39.4,21.9,53.4,40.1,53.1,53C52.8,65.9,38.3,73.4,24.4,72.8C10.5,72.1,-2.7,63.2,-16.6,58.3C-30.5,53.5,-45.1,52.6,-57.8,45.7C-70.5,38.9,-81.3,26.1,-78,14.4C-74.7,2.8,-57.3,-7.7,-45.2,-15C-33.1,-22.3,-26.4,-26.4,-19.7,-38.1C-13.1,-49.8,-6.5,-69,2.7,-73.2C12,-77.5,24,-66.7,31.2,-55.3Z" transform="translate(100 100)" />
		</svg>
	  	<div class="p-3 pl-md-5">
		    <h1 class="display-4">Apps School</h1>
		    <p class="lead">Aplikasi sekolah SMK Negri 1 Tanjunaganom.</p>
	  	</div>
	</div>
	<section class="position-relative">
		<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="position-absolute itemAppBg">
		  <path fill="#08BDBA" d="M38.1,-57.2C49.1,-52.3,57.3,-41.1,64,-28.6C70.7,-16.1,75.8,-2.2,70.2,7.4C64.7,17,48.4,22.4,38.8,33.8C29.2,45.1,26.3,62.4,17.3,70.2C8.3,78,-6.9,76.4,-16.2,67.8C-25.5,59.3,-29,43.7,-37.1,32.9C-45.1,22.1,-57.8,16.1,-58.6,8.6C-59.4,1.1,-48.3,-8,-41.3,-17C-34.3,-26.1,-31.4,-35.2,-25.2,-42.2C-19,-49.2,-9.5,-54.1,2.1,-57.3C13.6,-60.5,27.2,-62,38.1,-57.2Z" transform="translate(100 100)" />
		</svg>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,128L48,128C96,128,192,128,288,154.7C384,181,480,235,576,245.3C672,256,768,224,864,224C960,224,1056,256,1152,256C1248,256,1344,224,1392,208L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
		<div class="container-fluid bg-white pb-5">
			<div class="container">
				<h2 class="text-center mb-4">Semua Aplikasi</h2>
				<div class="row justify-content-center">
					<div class="col-12 col-sm-6 col-md-4 col-lg-3">
						<div class="card shadow-sm cardApp d-flex justify-content-center flex-column pt-3">
							<img src="<?= base_url('/img/logo/pustakaM.png') ?>" class="mx-auto img-Appicon">
							<div class="card-body">
						      	<h5 class="text-dark font-weight-bold text-center">Pustaka</h5>
						      	<p class="font-weight-lighter text-center">Perpustakaan SMeKTa yang berisi banyak buku pelajaran dan buku komik.</p>
						      	<p class="card-text"><small class="text-muted">26 Feb 20210</small></p>
						    </div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-md-4 col-lg-3">
						<div class="card shadow-sm cardApp d-flex justify-content-center flex-column pt-3">
							<img src="<?= base_url('/img/logo/blogKitaIcon.png') ?>" class="mx-auto img-Appicon">
							<div class="card-body">
						      	<h5 class="text-dark font-weight-bold text-center">BlogKita</h5>
						      	<p class="font-weight-lighter text-center">Membuat dan menilis di blog pribadi kamu sendiri dan pamerkan hasil karyamu.</p>
						      	<p class="card-text"><small class="text-muted">Comming Soon</small></p>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="bg-white">
		<svg xmlns="http://www.w3.org/2000/svg" class="mb-n1" viewBox="0 0 1440 320"><path fill="#F2F8F6" fill-opacity="1" d="M0,96L60,90.7C120,85,240,75,360,80C480,85,600,107,720,101.3C840,96,960,64,1080,64C1200,64,1320,96,1380,112L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
	</section>
	<section>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#08BDBA" fill-opacity="1" d="M0,96L0,0L36.9,0L36.9,160L73.8,160L73.8,256L110.8,256L110.8,0L147.7,0L147.7,128L184.6,128L184.6,224L221.5,224L221.5,64L258.5,64L258.5,160L295.4,160L295.4,192L332.3,192L332.3,160L369.2,160L369.2,0L406.2,0L406.2,160L443.1,160L443.1,192L480,192L480,288L516.9,288L516.9,64L553.8,64L553.8,64L590.8,64L590.8,128L627.7,128L627.7,128L664.6,128L664.6,32L701.5,32L701.5,128L738.5,128L738.5,0L775.4,0L775.4,64L812.3,64L812.3,96L849.2,96L849.2,256L886.2,256L886.2,128L923.1,128L923.1,96L960,96L960,128L996.9,128L996.9,128L1033.8,128L1033.8,96L1070.8,96L1070.8,224L1107.7,224L1107.7,32L1144.6,32L1144.6,256L1181.5,256L1181.5,96L1218.5,96L1218.5,96L1255.4,96L1255.4,256L1292.3,256L1292.3,160L1329.2,160L1329.2,0L1366.2,0L1366.2,192L1403.1,192L1403.1,224L1440,224L1440,320L1403.1,320L1403.1,320L1366.2,320L1366.2,320L1329.2,320L1329.2,320L1292.3,320L1292.3,320L1255.4,320L1255.4,320L1218.5,320L1218.5,320L1181.5,320L1181.5,320L1144.6,320L1144.6,320L1107.7,320L1107.7,320L1070.8,320L1070.8,320L1033.8,320L1033.8,320L996.9,320L996.9,320L960,320L960,320L923.1,320L923.1,320L886.2,320L886.2,320L849.2,320L849.2,320L812.3,320L812.3,320L775.4,320L775.4,320L738.5,320L738.5,320L701.5,320L701.5,320L664.6,320L664.6,320L627.7,320L627.7,320L590.8,320L590.8,320L553.8,320L553.8,320L516.9,320L516.9,320L480,320L480,320L443.1,320L443.1,320L406.2,320L406.2,320L369.2,320L369.2,320L332.3,320L332.3,320L295.4,320L295.4,320L258.5,320L258.5,320L221.5,320L221.5,320L184.6,320L184.6,320L147.7,320L147.7,320L110.8,320L110.8,320L73.8,320L73.8,320L36.9,320L36.9,320L0,320L0,320Z"></path></svg>
		<div class="w-100 mt-n1 row" style="background: #08BDBA; height: 300px;">
			<div class="col-12">
				<h2 class="text-white border-bottom border-white pb-3 mx-3 mx-md-5 font-weight-bold">AppsShool</h2>
			</div>
			
		</div>
	</section>

	<script src="<?= base_url('js/jquery-3.5.1.min.js'); ?>"></script>
    <script src="<?= base_url('/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script>
    	$(window).on('scroll',function() {
    		let sc = document.querySelector(".navbar");
    		sc.classList.toggle('stiky', window.scrollY > 0);
    	})
    </script>
    <script>
    	const thisDdown=document.getElementById('this-ddown'),css = `.ddown{position:relative}.ddown button#btn-ddown{width:39px;height:39px;background:0 0;border:none;border-radius:50%;padding:10px;text-align:center}.ddown button#btn-ddown svg{display:block;width:20px;height:20px;border:none;margin:auto}.ddown button#btn-ddown:focus{outline:0}.ddown button#btn-ddown:hover{background:rgba(0,0,0,.1)}.ddown .menu-ddown{position:absolute;top:100%;left:0;display:none;z-index:1000!important;transform:translateX(-230px);box-shadow:0 3px 10px #bbb;float:left;min-width:300px;min-height:300px;max-height:450px;overflow-y:auto;padding:10px 6px;margin:.125rem 0 0;font-size:1rem;color:#212529;text-align:left;list-style:none;background-color:#fff;background-clip:padding-box;border:1px solid rgba(0,0,0,.15);border-radius:.25rem}.ddown .menu-ddown::-webkit-scrollbar{width:6px}.ddown .menu-ddown::-webkit-scrollbar-track{background:#fff;border-radius:5px}.ddown .menu-ddown::-webkit-scrollbar-thumb{border-radius:5px;background:#999}.ddown .menu-ddown::-webkit-scrollbar-thumb:hover{background:#aaa}.ddown.show-ddown .menu-ddown{display:flex;flex-wrap:wrap}.ddown .menu-ddown a{position:relative;display:block;flex:0 0 50%;max-width:50%;text-align:center;padding:5px;text-decoration:none;cursor:default}.ddown .menu-ddown a div{padding:8px}.ddown .menu-ddown a div img{width:50px;height:50px}.ddown .menu-ddown a div span{display:block;color:#444;font-size:19px;cursor:pointer}.ddown 
.menu-ddown a div span:hover{color:#1090c4}
.rowddownApp {
	width: 100%;
	display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
    justify-content: center !important;
}
.coldddownApp {
	text-align: center;
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
}
.cardddownApp {
	padding: 5px;
}
.cardddownApp:hover {
	background: #eee;
}
.cardddownApp img {
	width: 70px;
}
.cardddownApp h5 {
	font-weight: light;
}

`
,head=document.head || document.getElementsByTagName('head')[0],cStyle=document.createElement('style');thisDdown.classList.add('ddown');thisDdown.innerHTML = `<button id="btn-ddown"><svg enable-background="new 0 0 276.167 276.167" version="1.1" viewBox="0 0 276.17 276.17" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m33.144 2.471c-17.808 0-32.294 14.487-32.294 32.294s14.48 32.293 32.294 32.293 32.294-14.486 32.294-32.293-14.487-32.294-32.294-32.294z"/><path d="m137.66 2.471c-17.807 0-32.294 14.487-32.294 32.294s14.487 32.293 32.294 32.293c17.808 0 32.297-14.486 32.297-32.293s-14.483-32.294-32.297-32.294z"/><path d="m243.87 67.059c17.804 0 32.294-14.486 32.294-32.293s-14.478-32.295-32.294-32.295-32.294 14.487-32.294 32.294 14.489 32.294 32.294 32.294z"/><path d="m32.3 170.54c17.807 0 32.297-14.483 32.297-32.293 0-17.811-14.49-32.297-32.297-32.297s-32.3 14.487-32.3 32.297 14.493 32.293 32.3 32.293z"/><path d="m136.82 170.54c17.804 0 32.294-14.483 32.294-32.293 0-17.811-14.478-32.297-32.294-32.297-17.813 0-32.294 14.486-32.294 32.297 0 17.81 14.487 32.293 32.294 32.293z"/><path d="m243.04 170.54c17.811 0 32.294-14.483 32.294-32.293 0-17.811-14.483-32.297-32.294-32.297s-32.306 14.486-32.306 32.297c0 17.81 14.49 32.293 32.306 32.293z"/><path d="m33.039 209.11c-17.807 0-32.3 14.483-32.3 32.294 0 17.804 14.493 32.293 32.3 32.293s32.293-14.482 32.293-32.293-14.486-32.294-32.293-32.294z"/><path d="m137.56 209.11c-17.808 0-32.3 14.483-32.3 32.294 0 17.804 14.487 32.293 32.3 32.293 17.804 0 32.293-14.482 32.293-32.293s-14.489-32.294-32.293-32.294z"/><path d="m243.77 209.11c-17.804 0-32.294 14.483-32.294 32.294 0 17.804 14.49 32.293 32.294 32.293 17.811 0 32.294-14.482 32.294-32.293s-14.49-32.294-32.294-32.294z"/></svg></button>
<div class="menu-ddown p-3" id="ddownMenu">
	<div class="rowddownApp">
		<div class="coldddownApp">
			<a class="cardddownApp" href="http://project.location">
				<img src="http://project.localhost/img/logo/pustakaM.png">
				<h5>Pustaka</h5>
			</a>
		</div>
		<div class="coldddownApp">
			<a class="cardddownApp" href="http://project.location">
				<img src="http://project.localhost/img/logo/blogKitaIcon.png">
				<h5>BlogKita</h5>
			</a>
		</div>
		<div class="coldddownApp">
			<a class="cardddownApp" href="http://project.location">
				<img src="http://project.localhost/img/logo/pustakaM.png">
				<h5>Pustaka</h5>
			</a>
		</div>
		<div class="coldddownApp">
			<a class="cardddownApp" href="http://project.location">
				<img src="http://project.localhost/img/logo/blogKitaIcon.png">
				<h5>BlogKita</h5>
			</a>
		</div>
		<div class="coldddownApp">
			<a class="cardddownApp" href="http://project.location">
				<img src="http://project.localhost/img/logo/pustakaM.png">
				<h5>Pustaka</h5>
			</a>
		</div>
		<div class="coldddownApp">
			<a class="cardddownApp" href="http://project.location">
				<img src="http://project.localhost/img/logo/blogKitaIcon.png">
				<h5>BlogKita</h5>
			</a>
		</div>
		<div class="coldddownApp">
			<a class="cardddownApp" href="http://project.location">
				<img src="http://project.localhost/img/logo/pustakaM.png">
				<h5>Pustaka</h5>
			</a>
		</div>
		<div class="coldddownApp">
			<a class="cardddownApp" href="http://project.location">
				<img src="http://project.localhost/img/logo/blogKitaIcon.png">
				<h5>BlogKita</h5>
			</a>
		</div>
		<div class="coldddownApp">
			<a class="cardddownApp" href="http://project.location">
				<img src="http://project.localhost/img/logo/pustakaM.png">
				<h5>Pustaka</h5>
			</a>
		</div>
		<div class="coldddownApp">
			<a class="cardddownApp" href="http://project.location">
				<img src="http://project.localhost/img/logo/blogKitaIcon.png">
				<h5>BlogKita</h5>
			</a>
		</div>
		<div class="coldddownApp">
			<a class="cardddownApp" href="http://project.location">
				<img src="http://project.localhost/img/logo/pustakaM.png">
				<h5>Pustaka</h5>
			</a>
		</div>
		<div class="coldddownApp">
			<a class="cardddownApp" href="http://project.location">
				<img src="http://project.localhost/img/logo/blogKitaIcon.png">
				<h5>BlogKita</h5>
			</a>
		</div>
	</div>
</div>`;thisDdown.id = 'ddown';head.appendChild(cStyle);cStyle.type = 'text/css';if(cStyle.styleSheet){cStyle.styleSheet.cssText=css;}else{cStyle.appendChild(document.createTextNode(css));}const ddown=document.getElementById('ddown'),btnDdown = document.getElementById('btn-ddown');btnDdown.addEventListener("focus", function() {ddown.classList.add('show-ddown')});btnDdown.addEventListener("blur",  function() {ddown.classList.remove('show-ddown')});
    </script>
</body>
</html>