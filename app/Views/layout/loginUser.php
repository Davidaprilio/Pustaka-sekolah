<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Akun Sekolah</title>
	<link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/css/auth.css') ?>">
</head>
<body class="d-flex flex-column">
	<div class="container">
	<div class="card form-signin needs-validation shadow position-relative mb-0 border-warning">
		<h5 class="mx-auto mb-2">Pustaka</h5>
		<h2 class="mx-auto m-0">Masuk</h2>
		<fieldset class="border p-3 rounded my-auto mb-auto">
			<legend class="text-secondary w-auto px-2" style="font-size: 15px">Masukan akun</legend>
		    <form action="<?= base_url('/Auth/login'); ?>" method="POST"> 
		        <?= csrf_field(); ?>
		        <input type="hidden" value="<?= ($direct == '' ) ? 'myprofile' : $direct ?>" name="next">
		        <div class="form-label-group" style="height: 60px">
		            <input type="text" onkeypress="c(this)" id="inputUser" class="form-control <?= (session()->getFlashdata('failUname'))? 'is-invalid' : ''?>" placeholder="Username" name="uname" required oninvalid="this.setCustomValidity('Username diperlukan')" oninput="setCustomValidity('')" value="<?= (old('uname'))? old('uname') : ''?>">
		            <div class="invalid-feedback" id="inputUser">
		                <?= session()->getFlashdata('failUname'); ?>
		            </div>
		            <label for="inputUser">Email</label>
		        </div>
		        <div class="form-label-group position-relative" style="height: 60px">
		            <input type="password" onkeypress="c(this)" id="inputPassword" class="form-control <?= (session()->getFlashdata('failPass'))? 'is-invalid' : ''?>" placeholder="Password" name="pass" required oninvalid="this.setCustomValidity('Password diperlukan')" oninput="setCustomValidity('')">
		            <div class="invalid-feedback" id="inputPassword">
		            	<?= session()->getFlashdata('failPass'); ?>
		            </div>
		            <label for="inputPassword">Kata Sandi</label>
		        </div>
		        <div class="d-flex flex-column justify-content-center position-absolute" style="bottom: 60px; left: 15px; right: 15px;">
			        <button class="btn btn-md btn-warning mx-2 mx-md-3 mx-xl-4" onclick="click(this)" type="submit">Lanjutkan</button>
					<a class="text-dark mx-2 mx-md-3 mx-xl-4" href="<?= base_url('/Register');?><?= (isset($_GET['ke']))? '/?ke='.$_GET['ke'] : '' ?>">Belum punya akun?</a>
		        </div>
		    </form>
		</fieldset>
	    <span class="my-auto"></span>
	</div>
</div>
	<small class="text-secondary mb-auto mt-1">Copyright Pustaka Elektronik Sekolah </small>
	<script>
		function c(id) {
			id.classList.remove('is-invalid')
		}
		function click(a) {
			a.setAttribute('disabled','true');
			a.innerHTML = `<div class="spinner-grow" role="status"><span class="sr-only">Loading...</span></div>`;
		}
	</script>
</body>
</html>