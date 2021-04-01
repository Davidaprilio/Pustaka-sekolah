<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Akun Sekolah</title>
	<link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/css/auth.css') ?>">
	<style >
		.frmAni {
			transition: .6s ease-out;
		}
		.formNew {
			max-width: 600px;
			width: 90%;
			min-height: 542px;
		}
		@media (max-width: 575px) {
			.formNew {
				min-height: 621px;
			}			
		}
	</style>
</head>
<body class="d-flex flex-column">
	<div class="card form-signin needs-validation shadow position-relative frmAni">
		<div class="progress position-absolute rounded-0 p-0" style="top:0;left: 0;right: 0; height: 0px;transform: .3s">
		  	<div class="progress-bar progress-bar-striped progress-bar-animated w-100" role="progressbar"></div>
		</div>
		<h5 class="mx-auto">AppSchool</h5>
		<h2 class="mx-auto m-0">Daftar</h2>
		<small class="text-secondary text-center mb-n5 mt-5" id="delEl1">Silahkan Masukan NISN kalian untuk melanjutkan pendaftaran.</small>
		<div id="delEl2" class="my-auto">
		    <div class="my-auto" style="height: 70px"> 
		        <div class="form-label-group">
		            <input type="text" id="inputUser" class="form-control" placeholder="Username" name="nisn" required oninvalid="this.setCustomValidity('Username diperlukan')" oninput="setCustomValidity('')" value="<?= old('nisn'); ?>">
		            <div class="invalid-feedback" id="inputUser"></div>
		            <label for="inputUser">NISN Siswa</label>
		        </div>

		        <div class="d-flex justify-content-between position-absolute" style="bottom: 60px; left: 15px; right: 15px;">
			        <a class="btn btn-outline-primary" href="<?= base_url('/Akun/masuk'); ?><?= (isset($_GET['ke']))? '/?ke='.$_GET['ke'] : '' ?>">Sudah punya akun</a>
			        <button class="btn btn-md btn-primary" onclick="send()">Lanjutkan</button>
		        </div>
			</div>
	    </div>
	    <span class="mb-auto" id="delEl3"></span>
	</div>
	<small class="text-secondary mb-auto mt-1">Daftar dengan AppsSchool </small>
	<script src="<?= base_url('/js/jquery-3.5.1.min.js') ?>"></script>
	<script>const urlNxt = '<?= (isset($_GET['ke']))? $_GET['ke'] : '' ?>';</script>
	<script src="<?= base_url('/js/regis.js') ?>"></script>
</body>
</html>