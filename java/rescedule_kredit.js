var url ="rescedule_kredit.php";
$(document).ready(function () {
	var sbmt = document.getElementById("submit");
	sbmt.disabled = true;	
	var urls ='rescedule_kredits.php?';
	var xsaldoa,xblunas,xalunas;
	jQuery(function($) {
		$("#tgtran").mask("99-99-9999");
	});
	$('#masuk').submit(function () {
		var r = confirm("Anda yakin data di simpan...?");
		if (r == false) {
			return false;
		}
		$.ajax({
			type: 'POST',
			url : urls,
			data: $(this).serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
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
	$("#angsuran").button().on("click",function(){
		var nomi = new $("#nomi").val().replace(/\./g, ''); 
		if(nomi<100000){
			alert("Nominal Pinjaman di atas seratus ribu..!");
			$("#nomi").focus();
			return false;
		}
		var jangka = new $("#jangka").val();
		if (jangka<2){
			alert('Janka Waktu Belum Di Isi');
			$("#jangka").focus();
			return false;
		}
		var saldoa = new $("#saldoa").val().replace(/\./g, ''); 
		var blunas = new $("#blunas").val().replace(/\./g, ''); 
		var alunas = new $("#alunas").val().replace(/\./g, ''); 
		var jumlah = new $("#jumlah").val().replace(/\./g, ''); 
		if (jumlah<2){
			alert('Jumlah Angsuran Tidak Sesuai');
			return false;
		}
		var angsuran_ke = new $("#angsuran_ke").val();
		var norek = new $("#norek").val();
		var tgtran = new $("#tgtran").val();
		var kdkop = new $("#kdkop").val();
		dataString='nomi='+nomi+'&jangka='+jangka+'&saldoa='+saldoa+'&blunas='+blunas+'&alunas='+alunas+'&angsuran_ke='+angsuran_ke+'&jumlah='+jumlah+'&norek='+norek+'&tgtran='+tgtran+'&kdkop='+kdkop;
		$.ajax({
			type: 'GET',
			url: 'rescedule_kredit02.php',
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				$("#divPageAkun").html(data);
				$('#loading').hide();
				var sbmt = document.getElementById("submit");
				sbmt.disabled =false;	
			}
		});
		return false;
	});
	$("#hitungg").button().on("click",function(){
		var nomi = new $("#nomi").val().replace(/\./g, ''); 
		if(nomi<100000){
			alert("Nominal Pinjaman di atas seratus ribu..!");
			$("#nomi").focus();
			return false;
		}
		var jangka = new $("#jangka").val();
		if (jangka<2){
			alert('Jangka Waktu Belum Di Isi');
			$("#jangka").focus();
			return false;
		}
		var angsuran_ke = new $("#angsuran_ke").val();
		var produk = $("#produk").val();
		var gaji = new $("#gaji").val().replace(/\./g, ''); 
		var saldox = new $("#saldox").val().replace(/\./g, ''); 
		if (gaji<100){
			alert('Gaji Belum Di input');
			return false;
		}
		var suku = new $("#suku").val();
		var tglahir = new $("#tglahir").val();
		dataString='nomi='+nomi+'&jangka='+jangka+'&produk='+produk+'&gaji='+gaji+'&tglahir='+tglahir+'&suku='+suku+'&angsuran_ke='+angsuran_ke+'&saldox='+saldox;
		alert(dataString);
		$.ajax({
			type: 'GET',
			dataType: 'json',
			url : 'rescedule_kredit03.php',
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				if(data.pesan==='Sukses'){
					$("#saldoa").val(formatAngka(data.mpokok));
					$("#blunas").val(formatAngka(data.mbunga));
					$("#alunas").val(formatAngka(data.madm));
					$("#jumlah").val(formatAngka(data.jumlah));
					//alert('Umur Nasabah : '+data.umur+' Tahun')
				}else{
					alert(data.pesan);
				}
				$('#loading').hide();
			}
		});
		return false;
	});
	$('#saldoa').on('keyup', function() {
		variabel();
		var inp = $(this).val().replace(/\./g, '');
		xjum21=new Number(xblunas+xsaldoa+xalunas);
		$('#jumlah').val(formatAngka(xjum21));
	});
	$('#blunas').on('keyup', function() {
		variabel();
		var inp = $(this).val().replace(/\./g, '');
		xjum21=new Number(xblunas+xsaldoa+xalunas);
		$('#jumlah').val(formatAngka(xjum21));
	});
	$('#alunas').on('keyup', function() {
		variabel();
		var inp = $(this).val().replace(/\./g, '');
		xjum21=new Number(xblunas+xsaldoa+xalunas);
		$('#jumlah').val(formatAngka(xjum21));
	});
	function variabel(){
		xsaldoa = new Number($("#saldoa").val().replace(/\./g, ''));
		xblunas = new Number($("#blunas").val().replace(/\./g, ''));
		xalunas = new Number($("#alunas").val().replace(/\./g, ''));
	}
});
$(function(){
	$('#nomi').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#saldoa').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#blunas').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#alunas').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#suku').priceFormat({prefix: '', centsSeparator: '.', thousandsSeparator: '.', centsLimit: 2});
	$( "#hitung" ).button({
		text: true,
		icons: {
			primary: "ui-icon-calculator"
		}
	});
	$( "#angsuran" ).button({
		text: true,
		icons: {
			primary: "ui-icon-calculator"
		}
	})
});
function validasi(){
	var jumlah= new $("#jumlah").val().replace(/\./g, '');
	if (jumlah<=0){
		alert('Jumlah Angsuran Memenuhi Syarat...?');
		return false;
	}
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