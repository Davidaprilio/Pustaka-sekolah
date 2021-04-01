<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Akun Sekolah</title>
	<link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('/css/auth.css') ?>">
	<style>
.play-btn {
}


.timer {
  width: 120px;
  height: 120px;
  margin: 0 auto;
}

.timer__color-indicator {
  width: 100%;
  height: 100%;
  transition: 0.3s linear;
  position: relative;
}

.timer__dash {
  display: block;
  width: 100%;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  font-size: 30px;
  line-height: 30px;
  font-weight: bold;
  text-align: center;
}
	</style>
</head>
<body class="d-flex flex-column" onload="startTime()">
	<div class="card form-signin needs-validation shadow position-relative mb-0">
		<h5 class="mx-auto mb-2">AppSchool</h5>
		<h2 class="mx-auto m-0">Daftar</h2>
	    <div class="my-auto text-center">
	    	<h4>Selamat datang di AppsSchool</h4>
	    	<span>Kamu akan dialihkan ke halaman login</span>
	    	<div class="timer">
			  <div class="timer__color-indicator">
			    <span class="timer__dash"></span>
			  </div>
			</div>
			<small class="text-secondary">jika tidak redirect ke login klik tombol ini</small>

	    </div>
	    <span class="mb-auto"></span>
	</div>
	<small class="text-secondary mb-auto mt-1">Login dengan AppsSchool </small>
	<a class="btn btn-primary btn-sm" href="<?= base_url('/Akun/masuk') ?><?= (isset($link))? '/?ke='.$link : '' ?>"></a>
</body>
<script>
	const COLOR_MAX_OPACITY = 1;
const ONE_SECOND = 1000;

class Timer {
  constructor(countdown = 3) {
    this._countdown = countdown;
    this._timerDash = document.querySelector(`.timer__dash`);
    this._timerColorIndicator = document.querySelector(`.timer__color-indicator`);
    
    if (typeof this._countdown !== `number` || this._countdown < 1) {
      throw new Error(`Wrong countdown value`);
    } else if (!this._timerDash || !this._timerColorIndicator) {
      throw new Error(`Required DOM node(s) not found`);
    }
    
    this._currentColorOpacity = 0;
    this._colorOpacityStep = +(COLOR_MAX_OPACITY / countdown).toFixed(4);
  }
  
  start() {
    this._tick = setInterval(() => {
      if (this._countdown < 0) {
        this.stop();
        this._timerDash.textContent = `Redirect`;
        return;
      }
      
      this._timerDash.textContent = this._countdown;
      this._currentColorOpacity += this._colorOpacityStep;
      
      this._countdown--;
    }, ONE_SECOND);
  }
  
  stop() {
    if (this._tick) {
      clearInterval(this._tick);
    }
  }
}
function startTime() {
  new Timer().start();
}
</script>
</html>