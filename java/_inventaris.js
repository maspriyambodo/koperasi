$(document).ready(function () {
	$("#lookup_sandia").lookupbox({
		title: 'Daftar Rekening',
		url	 : 'lookup/lookup_sandi.php?chars=109',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data){
			$('input[name=sandi_inventaris]').val(data.norek);
			$('input[name=nm_inventaris]').val(data.nama);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Nama']
	});
	$("#lookup_sandib").lookupbox({
		title: 'Daftar Rekening',
		url: 'lookup/lookup_sandi.php?chars=41110',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=sandi_biaya]').val(data.norek);
			$('input[name=nm_biaya]').val(data.nama);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Nama']
	});
	$("#lookup_sandic").lookupbox({
		title: 'Daftar Rekening',
		url: 'lookup/lookup_sandi.php?chars=110',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=sandi_penyusutan]').val(data.norek);
			$('input[name=nm_penyusutan]').val(data.nama);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Nama']
	});
	$("#lookup_sandid").lookupbox({
		title: 'Daftar Rekening',
		url: 'lookup/lookup_sandi.php?chars=1131',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=sandi_perolehan]').val(data.norek);
			$('input[name=nm_perolehan]').val(data.nama);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Nama']
	});
	$('#simpan').click(function(){
		var nama_inventaris=document.forms["masuk"]["nama_inventaris"].value;
		if(nama_inventaris==''){
			alert("Nama Inventaris Belum Di Isi..?");
			$("#nama_inventaris").focus();
			return false;
		}
		var sandi_perolehan=document.forms["masuk"]["sandi_perolehan"].value;
		if(sandi_perolehan==''){
			alert("Sandi Perolehan Belum Di Isi..?");
			$("#sandi_perolehan").focus();
			return false;
		}
		var sandi_biaya=document.forms["masuk"]["sandi_biaya"].value;
		if(sandi_biaya==''){
			alert("Sandi Biaya Penyusutan Belum Di Isi..?");
			$("#sandi_biaya").focus();
			return false;
		}
		var sandi_penyusutan=document.forms["masuk"]["sandi_penyusutan"].value;
		if(sandi_penyusutan==''){
			alert("Sandi Penyusutan Belum Di Isi..?");
			$("#sandi_penyusutan").focus();
			return false;
		}
		var kode_penyusutan = $("#kode_penyusutan").val();
		if(kode_penyusutan!=1){
			alert('Maaf... metode digunakan hanya pilihan garis lurus');
			return false;
		}
		var r = confirm("Anda yakin data di simpan...?");
		if (r == false) {
			return false;
		}
		$.ajax({
			type: 'POST',
			url : urls,
			data: $('#masuk').serialize(),
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
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert('Error: ' + xhr.status || ' - ' || thrownError);
			}
		});
		return false;
	});
	$("#hitung").button().on("click",function(){
		var tgl_perolehan=document.forms["masuk"]["tgl_perolehan"].value;
		var dayfield=tgl_perolehan.split("-")[0];
		var monthfield=tgl_perolehan.split("-")[1];
		var yearfield=tgl_perolehan.split("-")[2];
		var dayobj = new Date(yearfield, monthfield-1, dayfield);
		if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield)){
			alert("Tanggal Salah, Format Tanggal DD-MM-YYYY");
			return false;
		}
		var nilai_perolehan = new Number($("#nilai_perolehan").val().replace(/\./g, ''));
		if(nilai_perolehan<10000){
			alert("Nilai Perolehan Belum Di ISI..!");
			$("#nilai_perolehan").focus();
			return false;
		}
		var nilai_residu = new $("#nilai_residu").val().replace(/\./g, ''); 
		var masa_manfaat = $("#masa_manfaat").val();
		if (masa_manfaat<1){
			alert("Masa Manfaat Belum Di Isi");
			$("#masa_manfaat").focus();
			return false;
		}
		var kode_penyusutan = $("#kode_penyusutan").val();
		if(kode_penyusutan!=1){
			alert('Maaf... metode digunakan hanya pilihan garis lurus');
			return false;
		}
		penyusutan_tahun=new Number(nilai_perolehan-nilai_residu);
		xpenyusutan_tahun=new Number(penyusutan_tahun/masa_manfaat);
		penyusutan_bulan=new Number(xpenyusutan_tahun/12);
		var a = Math.round(penyusutan_bulan);
		var b = Math.round(xpenyusutan_tahun);
		$("#penyusutan_tahun").val(formatAngka(b));
		$("#penyusutan_bulan").val(formatAngka(a));
		return false;
	});
//	$("#country").change(function() {
//		var select = $("#country option:selected").val();
//		switch (select) {
//			case "USA":
//				city(USA);
//				break;
//			case "AUSTRALIA":
//				city(AUSTRALIA);
//				break;
//			case "FRANCE":
//				city(FRANCE);
//				break;
//			default:
//				$("#city").empty();
//				$("#city").append("<option>--Select--</option>");
///				break;
//		}
//	});	
	$("#kode_inventaris").change(function() {
		var kode_inventaris=$("#kode_inventaris").val();
		if(kode_inventaris==0){
			$("#no_inventaris").val('');
			return false;
		}
		dataString='kode_inventaris='+kode_inventaris;
		$.ajax({
			type: 'GET',
			dataType: 'json',
			url : 'no_inventaris.php',
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				if(data.pesan=='Sukses'){
					$("#no_inventaris").val(data.no_inventaris);
				}else{
					alert(data.pesan);
				}
				$('#loading').hide();
			}
		});
		return false;
	});
});
$(function(){
	$('#harga_perolehan').priceFormat({
		prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#nilai_perolehan').priceFormat({
		prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#nilai_residu').priceFormat({
		prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#penyusutan_bulan').priceFormat({
		prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#nilai_buku').priceFormat({
		prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$("#hitung").button({
		text: true,
		icons: {
			primary: "ui-icon-calculator"
		}
	});
	$( "#tgl_perolehan" ).datepicker({
		dateFormat:"dd-mm-yy",
	});
});
function goKembali() {
	$('#innertub').load(url);
}
function formatAngka(angka) {
	if (typeof(angka) != 'string') angka = angka.toString();
	var reg = new RegExp('([0-9]+)([0-9]{3})');
	while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
	return angka;
}