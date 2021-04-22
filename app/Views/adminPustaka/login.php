<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#101115">
	<meta name="msapplication-navbutton-color" content="#101115">
	<meta name="apple-mobile-web-app-status-bar-style" content="#101115">
    <link rel="stylesheet" href="<?= base_url('/fonts/fontawesome-all.min.css'); ?>">
	<title>Login Petugas Perpustakaan SMK Negeri 1 Tanjunganom</title>
	<link rel="stylesheet" href="<?= base_url('/css/loginAdmin.css'); ?>">
</head>
<body class="light">
	<div class="form">
		<!-- <i class="fa fa-user fa-5x"></i> -->
		<img src="<?= base_url('/img/smektabgremove.png'); ?>">
		<h2>login</h2>
		<h5>Petugas Pustaka</h5>
		<small style="color: red !important;">
		<?= (isset($pesan)) ? $pesan : ' '; ?>
		</small>
		<form action="<?= base_url('/Auth/admin') ?>" method="POST">
			<?= csrf_field(); ?>
			<div class="input">
				<div class="inputBox">
					<label>Username</label>
					<input type="text" required="" placeholder="Admin@SMeKTa.sch.id" name="uname">
				</div>
				<div class="inputBox">
					<label>Password</label>
					<input type="password" required="" placeholder="Password" name="pass">
				</div>
				<div class="inputBox">
					<input type="submit" value="Login" name="signin">
				</div>
			</div>
		</form>
	</div>
</body>
</html>