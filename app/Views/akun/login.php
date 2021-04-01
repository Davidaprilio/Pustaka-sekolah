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
	<div class="card form-signin needs-validation shadow position-relative mb-0">
		<h5 class="mx-auto mb-2">AppSchool</h5>
		<h2 class="mx-auto m-0">Masuk</h2>
		<fieldset class="border p-3 rounded my-auto mb-auto">
			<legend class="text-secondary w-auto px-2" style="font-size: 15px">Masukan akun</legend>
		    <form action="<?= base_url('/OAuth/login'); ?>" method="POST"> 
		        <?= csrf_field(); ?>
		        <input type="hidden" value="<?= ($lanjutke == '' ) ? 'myprofile' : $lanjutke ?>" name="next">
		        <div class="form-label-group" style="height: 60px">
		            <input type="text" onkeypress="c(this)" id="inputUser" class="form-control <?= (session()->getFlashdata('validateUname'))? 'is-invalid' : ''?>" placeholder="Username" name="uname" required oninvalid="this.setCustomValidity('Username diperlukan')" oninput="setCustomValidity('')" value="<?= (session()->getFlashdata('oldUname'))? session()->getFlashdata('oldUname') : ''?>">
		            <div class="invalid-feedback" id="inputUser">
		                <?= session()->getFlashdata('validateUname'); ?>
		            </div>
		            <label for="inputUser">Email</label>
		        </div>
		        <div class="form-label-group position-relative" style="height: 60px">
		            <input type="password" onkeypress="c(this)" id="inputPassword" class="form-control <?= (session()->getFlashdata('validatePass'))? 'is-invalid' : ''?>" placeholder="Password" name="pass" required oninvalid="this.setCustomValidity('Password diperlukan')" oninput="setCustomValidity('')">
		            <div class="invalid-feedback" id="inputPassword">
		            	<?= session()->getFlashdata('validatePass'); ?>
		            </div>
		            <label for="inputPassword">Kata Sandi</label>
		        </div>
		        <div class="d-flex justify-content-between position-absolute" style="bottom: 60px; left: 15px; right: 15px;">
					<a class="btn btn-outline-primary" href="<?= base_url('/Akun/daftar');?><?= (isset($_GET['ke']))? '/?ke='.$_GET['ke'] : '' ?>">Daftar</a>
			        <button class="btn btn-md btn-primary" type="submit">Lanjutkan</button>
		        </div>
		    </form>
		</fieldset>
	    <span class="my-auto"></span>
	</div>
	<small class="text-secondary mb-auto mt-1">Login dengan AppsSchool </small>
	<script>
		function c(id) {
			id.classList.remove('is-invalid')
		}
	</script>
</body>
</html>