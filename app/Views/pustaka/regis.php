<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Akun</title>
	<link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/fonts/font-awesome.min.css'); ?>">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10 mx-auto">
				<div class="card p-4">
					<h1>Buat Akun Baru</h1>
					<hr>
					<form action="<?= base_url('/Engine/register') ?>" method="POST">
						<form>
							<div class="form-group">
							    <label for="fname">Nama Depan</label>
							    <input type="text" class="form-control" id="fname" name="fname">
							</div>
							<div class="form-group">
							    <label for="lname">Nama Belakang</label>
							    <input type="text" class="form-control" id="lname" name="lname">
							</div>
							<div class="form-group">
							    <label for="age">Umur</label>
							    <input type="text" class="form-control" id="age" name="age">
							</div>
							<div class="form-group">
							    <label for="jk">Jenis Kelamin</label>
							    <input type="text" class="form-control" id="jk" name="jk">
							</div>
							<div class="form-group">
							    <label for="kelas">Kelas</label>
							    <input type="text" class="form-control" id="kelas" name="kelas">
							</div>
							<div class="form-group">
							    <label for="uname">Username</label>
							    <input type="text" class="form-control" id="uname" name="uname">
							</div>
							<div class="form-group">
							    <label for="pass">Password</label>
							    <input type="password" class="form-control" id="pass" name="pass">
							</div>
							<div class="form-group">
							    <label for="passConfirm">Konfirmasi password</label>
							    <input type="password" class="form-control" id="passConfirm" name="passConfirm">
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>