var dialog,nmuser=$("#nmuser"),nmpass=$("#password" ),noreferensi;
$(document).ready(function(){
	$('#simpan').click(function () {
		var kdtran=new $('#kdtran').val();
		var norek=$('#text2').val();
		var jumlah=new Number($("#jumlah").val().replace(/\./g, ''));
		if(norek.substr(-2)=='00'){
			alert('Rekening GSL Tidak Bisa Bertransaksi...?');
			$("input#text2").focus();
			return false;
		};
		if(norek.length!=6){
			alert('Rekening Tidak Sesuai Format (6 angka)?');
			$("input#text2").focus();
			return false;
		};
		if(jumlah<=0){
			alert('Jumlah Transaksi Belum Di Input...?');
			$("input#jumlah").focus();
			return false;
		};
		if(kdtran==''){
			alert('Kode Transaksi  Belum Di Input...?');
			$('#kdtran').select();
			return false;
		};
		var r = confirm("Anda Yakin Data Di Simpan...?");
		if (r == false) {
			return false;
		};
		var limitk= $("#limitk").val();
		var limitd= $("#limitd").val();
		if(jumlah>=limitd || jumlah>=limitk){
			dialog.dialog("open");
		}else{
			simpan('');
		};
		return false;
	});
});
$(function(){
	$('#jumlah').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	var cancel = function() {
		dialog.dialog( "close" );
		$('input[name=nmuser]').val('');
		$('input[name=password]').val('');
	};
	function addUser() {
		var dataString='nmuser='+nmuser.val()+'&password='+nmpass.val();
		$.ajax({
			type: "GET",
			url	: "validasi.php",
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
	} ;
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
	$(".norek").autocomplete({
		minLength:2,
		source:'auto_norek.php',
		select:function(event, ui){
			$('#nama').val(ui.item.nama);
			$('#text1').val(ui.item.branch);
			$('#text3').val(ui.item.sufix);
		}
	});
});
function blurFunction() {
	var text1= $("#text1").val();
	var text2= $("#text2").val();
	var text3= $("#text3").val();
	dataString='text1='+text1+'&text2='+text2+'&text3='+text3;
	$.ajax({
		type: 'GET',
		dataType: 'json',
		url : 'tampilreke.php',
		data: dataString,
		beforeSend: function (){
			$('#loading').show();
		},
		success: function (data){
			if(data.pesan=='Sukses'){
				$("#nama").val(data.nama);
			}else{
				$("#nama").val(data.pesan);
			};
			$('#loading').hide();
		}
	});
	return false;
};
function simpan(xuser){
	$.ajax({
		type: 'POST',
		url : 'newsavess.php?p=5',
		data: $('#masuk').serialize()+'&xuser='+xuser,
		beforeSend: function () {
			$('#loading').show();
		},
		success: function (data) {
			//alert(data);
			var text=data;
			$.notiflat(text,{animateIn: 'fade', animateOut: 'slide' });
			var n = data.search("Sukses");
			if(n==0){
				var nonas= $("#nonas").val();
				ListData(nonas);
				$('input#norek').focus();
			};
			$('#loading').hide();
		}
	});
	return false;
};
function showEditt(id) {
	var r = confirm("Anda Yakin Data Di Hapus..?");
	if (r == false) {
		return false;
	};
	var dataString='id='+id;
	$.ajax({
		type: "POST",
		url : 'newsavess.php?p=6',
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success: function(data){
			alert(data);
			var text=data;
			$.notiflat(text,{animateIn: 'fade', animateOut: 'slide' });
			var n = data.search("Sukses");
			if(n==0){
				var nonas= $("#nonas").val();
				ListData(nonas);
			};
			$('#loading').hide();
		}
	});
	return false;
};
function showEdit(id) {
	var r = confirm("Anda Yakin Data Di Rubah..?");
	if (r == false) {
		return false;
	};
	var dataString='id='+id;
	$.ajax({
		type	: 'GET',
		dataType: 'json',
		url	: 'newmemoe.php',
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success: function(data){
			if(data.pesan==='Sukses'){
				$("#id").val(data.id);
				$("#text1").val(data.text1);
				$("#text2").val(data.text2);
				$("#text3").val(data.text3);
				$("#nama").val(data.nama);
				$("#kdtran").val(data.kdtran);
				$("#kd_lama").val(data.kdtran);
				$("#jumlah").val(formatAngka(data.jumlah));
				$("#saldo_lama").val(formatAngka(data.jumlah));
				$("#kete").val(data.kete);
			}else{
				alert(data.pesan);
			};
			$('#loading').hide();
		}
	});
	return false;
};
function ListData(nonas) {
	var dataString='nonas='+nonas;
	$.ajax({
		type: "POST",
		url   : "newmemof.php",
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success: function(data){
			$("#divPageHasil").html(data);
			$('#loading').hide();
		}
	});
	return false;
};
function formatAngka(angka) {
	if (typeof(angka) != 'string') angka = angka.toString();
	var reg = new RegExp('([0-9]+)([0-9]{3})');
	while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
	return angka;
}