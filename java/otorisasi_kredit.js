$(document).ready(function () {
	$('#setuju').click(function(){
		var level="<?php echo $level?>";
		if(Number(level)>2){
			alert('Anda Tidak Berhak Untuk Otorisasi Pinjaman');
			return false;
		}
		var r = confirm("Pinjaman Ini Dicairkan..?");
		if (r == false) { 
			return false; 
		}
		var id= $("#id").val();
		$.ajax({
			type: "GET",
			url: "mkreditvsave.php",
			data: 'id='+id,
			beforeSend: function(){
				$('#loading').show();
			},
			success: function(data){
				alert(data);
				var text=data;
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
	$('#batal').click(function(){
		var level="<?php echo $level?>";
		if(Number(level)>2){
			alert('Anda Tidak Berhak Untuk Otorisasi Pinjaman');
			return false;
		}
		var r = confirm("Pinjaman Ini Ditolak..?");
		if (r == false) { 
			return false; 
		}
		var id= $("#id").val();
		$.ajax({
			type: "GET",
			url: "mkreditvb.php",
			data: 'id='+id,
			beforeSend: function(){
				$('#loading').show();
			},
			success: function(data){
				alert(data);
				var text=data;
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
$(function(){
	$( "#tabs" ).tabs({
		event: "mouseover",
		collapsible: true
	});
});
function goKembali() {
	var url='mkreditvp.php';
	$('#innertub').load(url);
}
//function goKembali(id) {
//	var dataString='id='+id;
//	$.ajax({
//		type: "POST",
//		url: "mkreditvp.php",
//		data: dataString,
//		beforeSend: function () {
//			$('#loading').show();
//		},
//		success: function(data){
//			$("#innertub").html(data);
//			$('#loading').hide();
//		}
//	});
//	return false;
//}