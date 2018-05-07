var dialog,nmuser=$("#nmuser"),nmpass=$("#password" );
$(document).ready(function () {
	$('#submit').click(function(){
		var jumlah=new Number($("#jumlah_cair").val().replace(/\./g, ''));
		if(jumlah<=0){
			alert('Saldo Pencairan Tidak Ada');
			return false;
		}
		var r = confirm("Anda yakin data di simpan?");
		if (r == false) {
			return false;
		}
		var limitk="<?php echo $limitk?>";
		var limitd="<?php echo $limitd?>";
		if(jumlah>=limitd){
			dialog.dialog("open");
		}else{
			simpan('');
		}
		return false;
	});
});
$(function(){
	$('#jumlah_cair').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	var cancel = function() {
		dialog.dialog( "close" );
		$('input[name=nmuser]').val('');
		$('input[name=password]').val('');
	}
	function addUser() {
		var dataString='nmuser='+nmuser.val()+'&password='+nmpass.val();
		$.ajax({
			type: "GET",
			url	: "../validasid.php",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function(data){
				$('#loading').hide();
				if(data=='Sukses'){
					dialog.dialog( "close" );
					simpan(nmuser.val());
					$('input[name=nmuser]').val('');
					$('input[name=password]').val('');
				}else{
					alert(data);
				}
			}
		});
	} 
	dialog = $( "#dialog-form" ).dialog({
		autoOpen: false,
		height: 300,
		width: 350,
		modal: true,
		buttons: {
			"OK" : addUser,
			Cancel: cancel
		}
	});
});
function simpan(xuser){
	$.ajax({
		type: 'POST',
		url : urls,
		data: $('#masuk').serialize()+'&xuser='+xuser,
		beforeSend: function () {
			$('#loading').show();
		},
		success: function (data) {
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
}
function goKembali() {
	$('#innertub').load(url);
}