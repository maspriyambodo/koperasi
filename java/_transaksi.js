var dialog,nmuser=$("#nmuser"),nmpass=$("#password" );
$(function(){
	var cancel = function() {
		dialog.dialog( "close" );
		$('input[name=nmuser]').val('');
		$('input[name=password]').val('');
	}
	function addUser() {
		var dataString='nmuser='+nmuser.val()+'&password='+nmpass.val();
		$.ajax({
			type: "GET",
			url	: "validasid.php",
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
function formatAngka(angka) {
	if (typeof(angka) != 'string') angka = angka.toString();
	var reg = new RegExp('([0-9]+)([0-9]{3})');
	while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
	return angka;
}
function validasi(){
	var jumlah=new Number($("#jumlah").val().replace(/\./g, ''));
	if(jumlah<=0){
		alert('Nominal Belum Di Input');
		return false;
	}
	var r = confirm("Anda yakin data di simpan?");
	if (r == false) {
		return false;
	}	
}