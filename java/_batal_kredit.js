$(document).ready(function () {
	$("#simpan").click(function() {
		var level="<?php echo $level?>";
		if(Number(level)>2){
			alert('Anda Tidak Berhak Untuk Pembatalan Pinjaman');
			return false;
		}
		var r = confirm("Transaksi Pinjaman Dibatalkan..?");
		if (r == false) { 
			return false; 
		}
		$.ajax({
			type: "POST",
			url : "newbatalkrds.php",
			data: $('#masuk').serialize(),
			beforeSend: function(){
				$('#loading').show();
			},
			success: function(data){
				alert(data);
				var text=data
				$.notiflat(text,{animateIn: 'fade', animateOut: 'slide' });
				var n = data.search("Sukses");
				if(n==0){
					goKembali();
				}
				$('#loading').hide();
			}
		});
		return false;
	});
	$('#kembali').click(function(){
		goKembali();
	});
});
function goKembali() {
	var url='newbatalkrd.php';
	$('#innertub').load(url);
}