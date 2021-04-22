let nisn = '';
function showFalid(msg) {
	$('.invalid-feedback#inputUser').html(msg);
	$('input#inputUser').addClass('is-invalid');
}
$('.my-auto input[name=nisn]').on("keyup",function(event) {    
   	$('#inputUser').html('');
	$('input#inputUser').removeClass('is-invalid');
   	if (!isNaN($(this).val())) {
        nisn = $(this).val();
        // console.log(nisn);
    }else {
    	showFalid('NISN hanya berisi angka');
    }
});
function cekP(id) {
    if ($('input[name=pass]').val() == id.value ) {
        $('button[type=submit]').removeAttr('disabled');
        id.classList.remove('border-danger');
    }else{
        $('button[type=submit]').attr('disabled','');
        id.classList.add('border-danger');
    }
}
function send() {
    $('.progress').css('height','10px');
    $('.invalid-feedback').html('NISN Tidak terdaftar');
    $.post( window.location.origin + '/Auth/daftar', {nisn: nisn ,nxtPage: urlNxt}).done(function( data ) { 
        if (data != 'false') {
            $('#delEl1').css({'transition': '.5s','opacity': 0});
            $('#delEl2').css({'transition': '.5s','opacity': 0});
            $('#delEl3').css({'transition': '.5s','opacity': 0});
            setTimeout(function() {
                $('#delEl1').remove();
                $('#delEl2').remove();
                $('#delEl3').remove();
                $('.card.form-signin').addClass('formNew');
                $('.card.form-signin').append(data);
                $('.progress').css('height','0');
            },800);
        }else{
            $('input[id=inputUser]').addClass('is-invalid');
            $('.progress').css('height','0');
        }
    });
}
