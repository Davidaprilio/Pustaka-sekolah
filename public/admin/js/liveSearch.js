$(document).ready(function() {
	$('#namaSiswa').on('keyup', function() {
		$.get('/Admin/cariSiswa?keyword=' + $('#namaSiswa').val(), function(data) {
			$('#Tbody').html(data);
		});
		// console.log($('#namaSiswa').val());
		// $('#Tbody').load('ajax/data.php?keyword=' + $('#namaSiswa').val());
	});

	$('#jumlahData').on('click', function() {
		$.get('/Admin/banyakData?keyword=' + $('#jumlahData').val(), function(data) {
			$('#Tbody').html(data);
		});
		// console.log($('#jumlahData').val());
		// $('#Tbody').load('ajax/data.php?keyword=' + $('#jumlahData').val());
	})
})