<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="theme-color" content="#a299aa">
    <meta name="msapplication-navbutton-color" content="#a299aa">
    <meta name="apple-mobile-web-app-status-bar-style" content="#a299aa">
    <title>Login Pustaka</title>
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/fonts/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/css/login.css') ?>">
</head>
<body style="background: url('<?= base_url(''); ?>/img/bg-pattern.png') repeat, linear-gradient(165deg, #a299aa 50%, #B7B7B7 50%);">
	<div class="card form-signin needs-validation shadow">
	    <form action="<?= base_url('/Engine/auth'); ?>" method="POST"> 
	        <?= csrf_field(); ?>
	        <div class="text-center mb-4">
	            <img src="<?= base_url('/img/logo/pustakaL.png') ?>" width="150">
	            <h1 class="h3 mb-3 font-weight-normal">Masuk Pustaka</h1>
	        </div>
	        <div class="form-label-group">
	            <input type="text" id="inputUser" class="form-control " placeholder="Username" name="uname" required oninvalid="this.setCustomValidity('Username diperlukan')" oninput="setCustomValidity('')" value="<?= old('uname'); ?>">
	            <div class="invalid-feedback" id="inputUser">
	                <?= session()->getFlashdata('validateUname'); ?>
	            </div>
	            <label for="inputUser">Username / Email</label>
	        </div>
	        <div class="form-label-group position-relative">
	            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required oninvalid="this.setCustomValidity('Password diperlukan')" oninput="setCustomValidity('')" value="">
	            <div class="invalid-feedback" id="inputPassword">
	            </div>
	            <label for="inputPassword">Password</label>
	        </div>

	        <div class="checkbox mb-3">
	            <label>
	                <input type="checkbox" value="remember-me"> Remember me
	            </label>
	        </div>
	        <button class="btn btn-md btn-secondary btn-block" type="submit">Log in</button>
	        
	        <p class="mt-3 text-secondary">Jika kamu belum terdaftar <a href="<?= base_url('/Pustaka/register'); ?>">Daftar Sekarang</a></p>

	        <p class="mt-2 mb-3 text-muted text-center">SMeKTa Internal Web &copy; 2020-2021</p>
	    </form>
	</div>

    <script src="<?= base_url('/js/jquery-3.5.1.min.js') ?>"></script>
    <script src="<?= base_url('/bootstrap/js/popper.js') ?>"></script>
</body>
</html>