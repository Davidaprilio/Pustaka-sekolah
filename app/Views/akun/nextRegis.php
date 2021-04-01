			<h4 class="text-secondary mt-1 mt-sm-3 w-100 text-center" style="text-overflow: ellipsis;overflow: hidden;white-space: nowrap;height: 38px">Hai <?= $dataReg['Nama'] ?></h4>
		    <form action="<?= base_url('/OAuth/createnewAccount'); ?>" method="POST" class="h-100 mt-3 mt-sm-4"> 
				<fieldset class="border p-3 rounded">
					<legend class="text-secondary w-auto px-2" style="font-size: 15px">Lengkapi data diri</legend>
			        <?= csrf_field(); ?>
			        <input type="hidden" name="fullname" value="<?= $dataReg['Nama'] ?>">
			        <input type="hidden" name="class" value="<?= $dataReg['Kelas'] ?>">
			        <input type="hidden" name="nisn" value="<?= $dataReg['NISN'] ?>">
			        <input type="hidden" name="jk" value="<?= $dataReg['JK'] ?>">
			        <div class="row">
			        	<div class="col-12 col-sm-6 mb-3">
			        		<input type="text" name="name" placeholder="Nama panggilan" required oninvalid="this.setCustomValidity('Nama panggilan diperlukan')" oninput="setCustomValidity('')" class="form-control">
			        	</div>
			        	<div class="col-12 col-sm-6 mb-3">
			        		<input type="date" name="tglLahir" placeholder="Tanggal lahir" required oninvalid="this.setCustomValidity('Tanggal lahir diperlukan')" oninput="setCustomValidity('')" class="form-control">
			        	</div>
			        </div>
			        <div class="row">
			        	<div class="col-12 col-sm-6 mb-3">
			        		<input type="text" name="address" placeholder="Alamat" class="form-control">
			        	</div>
			        	<div class="col-12 col-sm-6 mb-3">
			        		<input type="text" name="user" placeholder="Username" class="form-control">
			        	</div>
			        </div>
			        <div class="row">
			        	<div class="col-12 col-sm-6 mb-3">
			        		<input type="password" name="pass" placeholder="Password" class="form-control">
			        	</div>
			        	<div class="col-12 col-sm-6 mb-3">
			        		<input type="password" name="cpass" onkeyup="cekP(this)" placeholder="Confirm password" class="form-control">
			        	</div>
			        </div>
				</fieldset>
		        <div class="d-flex justify-content-between mt-3 mt-sm-5 pt-sm-5">
					<a class="btn btn-outline-primary" href="<?= base_url('/Akun/daftar'); ?>">Batal</a>
			        <button class="btn btn-md btn-primary" disabled type="submit">Buat akun</button>
		        </div>
		        <?php if (isset($nxtP)): ?>
		        	<input type="hidden" name="ke" value="<?= $nxtP ?>">
		        <?php endif ?>
		    </form>