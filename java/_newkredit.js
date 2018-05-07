var xsimpokok,xjumangsur,xsimwajib,xsaldoa,xblunas,xalunas,xbungakk,xjumprovisi,xjumbtl,xjumpremi,xnomi,xmeterai,xjumadm,xgaji,xpbank,xplain,xself1,xjum_period;
$(document).ready(function () {
	jQuery(function($) {
		$("#tglahirw").mask("99-99-9999");
		$("#tgtran").mask("99-99-9999");
		$("#tglahir").mask("99-99-9999");
		$("#tgsk").mask("99-99-9999");
		$("#tgpjk").mask("99-99-9999");
		$("#tgstnk").mask("99-99-9999");
		$("#tgmati").mask("99-99-9999");
		$("#tgklaim").mask("99-99-9999");
		$("#tktprekom").mask("99-99-9999");
		$("#tanggal_transfer").mask("99-99-9999");
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
				var text=data;
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
	
	$("#cek_nopen").button().on("click",function(){
		var cek_nopen = $("#nopen").val();
		dataString='cek_nopen='+cek_nopen;
		$.ajax({
			type: 'GET',
			dataType: 'json',
			url : 'newnopen.php',
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				if(data.pesan==='Sukses'){
					$("#nopen").val(data.nopen);
					$("#kdjiwa").val(data.kdjiwa);
					$("#jenis").val(data.jenis);
					$("#nodapem").val(data.norutdapem);
					$("#nopen").val(data.nopen);
					$("#nosk").val(data.nomor_skep);
					$("#pensk").val(data.penerbit_skep);
					$("#tgsk").val(data.tanggal_skep);
					$("#gaji").val(formatAngka(data.gaji));
					var kdstop=data.kdstop;
					alert('Nopen Nasabah Ditemukan : '+data.nopen);
					//document.getElementById("nomi").disabled=false;
				}else{
					alert(data.pesan);
					//document.getElementById("nomi").disabled=true;
				}
				$('#loading').hide();
			}
		});
		return false;
	});	
	$("#hitung").button().on("click",function(){
		var tgl1=document.forms["masuk"]["tglahir"].value;
		var dayfield=tgl1.split("-")[0];
		var monthfield=tgl1.split("-")[1];
		var yearfield=tgl1.split("-")[2];
		var dayobj = new Date(yearfield, monthfield-1, dayfield);
		if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield)){
			alert("Tanggal Lahir Salah, Format Tanggal DD-MM-YYYY");
			return false;
		}
		var gaji = new Number($("#gaji").val().replace(/\./g, ''));
		if(gaji<100000){
			alert("Pendapatan Harus di atas seratus ribu..!");
			$("#gaji").focus();
			return false;
		}
		var nomi = new $("#nomi").val().replace(/\./g, ''); 
		if(nomi<100000){
			alert("Nominal Pinjaman di atas seratus ribu..!");
			$("#nomi").focus();
			return false;
		}
		var jangka = new $("#jangka").val();
		if(jangka<1){
			alert(jangka);
			$("#nomi").focus();
			return false;
		}		
		var produk = new $("#produk").val();
		if(produk.length==0){
			alert("Kode Produk Belum Di Isi..!");
			$("#produk").focus();
			return false;
		}
		var jumlah_period = new $("#jumlah_period").val();
		if(produk=='KMP'){
			if(jumlah_period<1){
				alert("Jumlah Grace Period Belum Di Isi..!");
				$("#jumlah_period").focus();
				return false;
			}
			if(kdangsur==0){
				alert('Jenis Produk '+produk+' Tidak Bisa Ada Potongan Angsuran');
				$("#kdangsur").focus();
				return false
			}
		}		
		var jum_kdangsur = new $("#jum_kdangsur").val();
		var kdangsur=$("#kdangsur").val();
		if(kdangsur==0){
			if(jum_kdangsur<1){
				alert('Jumlah Setoran Pertama Belum Di Isi');
				$("#jum_kdangsur").focus();
				return false
			}
		}
		var saldoa = new $("#saldoa").val();
		var blunas = new $("#blunas").val();
		var alunas = new $("#alunas").val();
		var bungakk = new $("#bungakk").val();
		var tglahir = new $("#tglahir").val();
		var suku = new $("#suku").val();
		var kdpremi = new $("#kdpremi").val();
		var jumbtl = new $("#jumbtl").val();
		var simpanan_wajib = new $("#simpanan_wajib").val();
		var simpanan_pokok = new $("#simpanan_pokok").val();
		dataString='nomi='+nomi+'&jangka='+jangka+'&saldoa='+saldoa+'&blunas='+blunas+'&bungakk='+bungakk+'&produk='+produk+'&gaji='+gaji+'&tglahir='+tglahir+'&alunas='+alunas+'&suku='+suku+'&kdangsur='+kdangsur+'&jum_kdangsur='+jum_kdangsur+'&kdpremi='+kdpremi+'&jumlah_period='+jumlah_period+'&jumbtl='+jumbtl+'&simpanan_pokok='+simpanan_pokok+'&simpanan_wajib='+simpanan_wajib;
		$.ajax({
			type: 'GET',
			dataType: 'json',
			url : 'newhitung.php',
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				if(data.pesan==='Sukses'){
					$("#pokok").val(formatAngka(data.pokok));
					$("#bunga").val(formatAngka(data.bunga));
					$("#madm").val(formatAngka(data.madm));
					$("#jumangsur").val(formatAngka(data.jumangsur));
					$("#jumlunas").val(formatAngka(data.jumlunas));
					$("#jumpotong").val(formatAngka(data.jumpotong));
					$("#jumbersih").val(formatAngka(data.jumbersih));
					$("#jumadm").val(formatAngka(data.jumadm));
					$("#jumpremi").val(formatAngka(data.jumpremi));
					$("#jumprovisi").val(formatAngka(data.jumprovisi));
					$("#meterai").val(formatAngka(data.meterai));
					$("#jumrefund").val(formatAngka(data.jumrefund));
					$("#umur").val(formatAngka(data.umur));
					$("#pot_angsuran").val(formatAngka(data.pot_angsuran));
					$("#tenor_premi").val(data.tenor_premi);
					$("#jum_period").val(formatAngka(data.jum_period));
					alert('Umur Nasabah : '+data.umur+' Tahun')
				}else{
					alert(data.pesan);
				}
				$('#loading').hide();
			}
		});
		return false;
	});
	$("#kkbayar").on('change', function () {
		var nmbayar=$("#kkbayar option:selected").text();
		$('#nmbayar').val(nmbayar);
	});
	$('#jumadm').on('keyup', function() {
		variabel();
		var inp = $(this).val().replace(/\./g, '');
		xjumadm = new Number(inp);
		xjum21=new Number(xblunas+xbungakk+xsaldoa+xalunas);
		xjum1 = new Number(xjumadm+xjumprovisi+xjumbtl+xjumpremi+xmeterai+xjum_period+xpot_angsuran);
		xjumlah_simpanan=new Number(xsimpanan_pokok+xsimpanan_wajib);
		xjum2 = new Number(xnomi-xjum1-xjum21-xjumlah_simpanan);
		$('#jumlunas').val(formatAngka(xjum21));
		$('#jumpotong').val(formatAngka(xjum1));
		$('#jumbersih').val(formatAngka(xjum2));
	});
	$('#jumbtl').on('keyup', function() {
		variabel();
		var inp = $(this).val().replace(/\./g, '');
		xjumbtl = new Number(inp);
		xjum21=new Number(xblunas+xbungakk+xsaldoa+xalunas);
		xjum1 = new Number(xjumadm+xjumprovisi+xjumbtl+xjumpremi+xmeterai+xjum_period+xpot_angsuran);
		xjumlah_simpanan=new Number(xsimpanan_pokok+xsimpanan_wajib);
		xjum2 = new Number(xnomi-xjum1-xjum21-xjumlah_simpanan);
		$('#jumlunas').val(formatAngka(xjum21));
		$('#jumpotong').val(formatAngka(xjum1));
		$('#jumbersih').val(formatAngka(xjum2));
	});
	$('#jumpremi').on('keyup', function() {
		variabel();
		var inp = $(this).val().replace(/\./g,'');
		xjumpremi = new Number(inp);
		xjum21=new Number(xblunas+xbungakk+xsaldoa+xalunas);
		xjum1 = new Number(xjumadm+xjumprovisi+xjumbtl+xjumpremi+xmeterai+xjum_period+xpot_angsuran);
		xjumlah_simpanan=new Number(xsimpanan_pokok+xsimpanan_wajib);
		xjum2 = new Number(xnomi-xjum1-xjum21-xjumlah_simpanan);
		$('#jumlunas').val(formatAngka(xjum21));
		$('#jumpotong').val(formatAngka(xjum1));
		$('#jumbersih').val(formatAngka(xjum2));
	});
	$('#jumprovisi').on('keyup', function() {
		variabel();
		var inp = $(this).val().replace(/\./g,'');
		xjumprovisi = new Number(inp);
		xjum21=new Number(xblunas+xbungakk+xsaldoa+xalunas);
		xjum1 = new Number(xjumadm+xjumprovisi+xjumbtl+xjumpremi+xmeterai+xjum_period+xpot_angsuran);
		xjumlah_simpanan=new Number(xsimpanan_pokok+xsimpanan_wajib);
		xjum2 = new Number(xnomi-xjum1-xjum21-xjumlah_simpanan);
		$('#jumlunas').val(formatAngka(xjum21));
		$('#jumpotong').val(formatAngka(xjum1));
		$('#jumbersih').val(formatAngka(xjum2));
	});
	$('#meterai').on('keyup', function() {
		variabel();
		var inp = $(this).val().replace(/\./g,'');
		xmeterai = new Number(inp);
		xjum21=new Number(xblunas+xbungakk+xsaldoa+xalunas);
		xjum1 = new Number(xjumadm+xjumprovisi+xjumbtl+xjumpremi+xmeterai+xjum_period+xpot_angsuran);
		xjumlah_simpanan=new Number(xsimpanan_pokok+xsimpanan_wajib);
		xjum2 = new Number(xnomi-xjum1-xjum21-xjumlah_simpanan);
		$('#jumlunas').val(formatAngka(xjum21));
		$('#jumpotong').val(formatAngka(xjum1));
		$('#jumbersih').val(formatAngka(xjum2));
	});
	$('#blunas').on('keyup', function() {
		variabel();
		var inp = $(this).val().replace(/\./g,'');
		xblunas = new Number(inp);
		xjum21= new Number(xblunas+xbungakk+xsaldoa+xalunas);
		xjum1 = new Number(xjumadm+xjumprovisi+xjumbtl+xjumpremi+xmeterai+xjum_period+xpot_angsuran);
		xjumlah_simpanan=new Number(xsimpanan_pokok+xsimpanan_wajib);
		xjum2 = new Number(xnomi-xjum1-xjum21-xjumlah_simpanan);
		$('#jumlunas').val(formatAngka(xjum21));
		$('#jumpotong').val(formatAngka(xjum1));
		$('#jumbersih').val(formatAngka(xjum2));
	});
	$('#alunas').on('keyup', function() {
		variabel();
		var inp = $(this).val().replace(/\./g, '');
		xalunas = new Number(inp);
		xjum21= new Number(xblunas+xbungakk+xsaldoa+xalunas);
		xjum1 = new Number(xjumadm+xjumprovisi+xjumbtl+xjumpremi+xmeterai+xjum_period+xpot_angsuran);
		xjumlah_simpanan=new Number(xsimpanan_pokok+xsimpanan_wajib);
		xjum2 = new Number(xnomi-xjum1-xjum21-xjumlah_simpanan);
		$('#jumlunas').val(formatAngka(xjum21));
		$('#jumpotong').val(formatAngka(xjum1));
		$('#jumbersih').val(formatAngka(xjum2));
	});
	$('#bungakk').on('keyup', function() {
		variabel();
		var inp = $(this).val().replace(/\./g, '');
		xbungakk = new Number(inp);
		xjum21= new Number(xblunas+xbungakk+xsaldoa+xalunas);
		xjum1 = new Number(xjumadm+xjumprovisi+xjumbtl+xjumpremi+xmeterai+xjum_period+xpot_angsuran);
		xjumlah_simpanan=new Number(xsimpanan_pokok+xsimpanan_wajib);
		xjum2 = new Number(xnomi-xjum1-xjum21-xjumlah_simpanan);
		$('#jumlunas').val(formatAngka(xjum21));
		$('#jumpotong').val(formatAngka(xjum1));
		$('#jumbersih').val(formatAngka(xjum2));
	});
	$('#simpanan_pokok').on('keyup', function() {
		variabel();
		var inp = $(this).val().replace(/\./g, '');
		xsimpanan_pokok = new Number(inp);
		xjum21= new Number(xblunas+xbungakk+xsaldoa+xalunas);
		xjum1 = new Number(xjumadm+xjumprovisi+xjumbtl+xjumpremi+xmeterai+xjum_period+xpot_angsuran);
		xjumlah_simpanan=new Number(xsimpanan_pokok+xsimpanan_wajib);
		xjum2 = new Number(xnomi-xjum1-xjum21-xjumlah_simpanan);
		$('#jumlunas').val(formatAngka(xjum21));
		$('#jumpotong').val(formatAngka(xjum1));
		$('#jumbersih').val(formatAngka(xjum2));
	});
	$('#simpanan_wajib').on('keyup', function() {
		variabel();
		var inp = $(this).val().replace(/\./g, '');
		xsimpanan_wajib = new Number(inp);
		xjum21= new Number(xblunas+xbungakk+xsaldoa+xalunas);
		xjum1 = new Number(xjumadm+xjumprovisi+xjumbtl+xjumpremi+xmeterai+xjum_period+xpot_angsuran);
		xjumlah_simpanan=new Number(xsimpanan_pokok+xsimpanan_wajib);
		xjum2 = new Number(xnomi-xjum1-xjum21-xjumlah_simpanan);
		$('#jumlunas').val(formatAngka(xjum21));
		$('#jumpotong').val(formatAngka(xjum1));
		$('#jumbersih').val(formatAngka(xjum2));
	});
	$('#gaji').on('keyup', function() {
		variabell();
		var inp=$(this).val().replace(/\./g, '');
		xgaji=new Number(inp);
		xjum11=new Number(xgaji+xself1);
		xjum21=new Number(xjum11-xpbank-xplain);
		$('#self2').val(formatAngka(xjum11));
		$('#self3').val(formatAngka(xjum21));
	});
	$('#pbank').on('keyup', function() {
		variabell();
		var inp=$(this).val().replace(/\./g, '');
		xpbank=new Number(inp);
		xjum11=new Number(xgaji+xself1);
		xjum21=new Number(xjum11-xpbank-xplain);
		$('#self2').val(formatAngka(xjum11));
		$('#self3').val(formatAngka(xjum21));
	});
	$('#plain').on('keyup', function() {
		variabell();
		var inp=$(this).val().replace(/\./g, '');
		xplain=new Number(inp);
		xjum11=new Number(xgaji+xself1);
		xjum21=new Number(xjum11-xpbank-xplain);
		$('#self2').val(formatAngka(xjum11));
		$('#self3').val(formatAngka(xjum21));
	});
	$('#self1').on('keyup', function() {
		variabell();
		var inp=$(this).val().replace(/\./g, '');
		xself1=new Number(inp);
		xjum11=new Number(xgaji+xself1);
		xjum21=new Number(xjum11-xpbank-xplain);
		$('#self2').val(formatAngka(xjum11));
		$('#self3').val(formatAngka(xjum21));
	});
	function variabel(){
		xsaldoa = new Number($("#saldoa").val().replace(/\./g,''));
		xblunas = new Number($("#blunas").val().replace(/\./g,''));
		xalunas = new Number($("#alunas").val().replace(/\./g,''));
		xbungakk = new Number($("#bungakk").val().replace(/\./g,''));
		xjumprovisi = new Number($("#jumprovisi").val().replace(/\./g,''));
		xjumbtl = new Number($("#jumbtl").val().replace(/\./g,''));
		xjumpremi  = new Number($("#jumpremi").val().replace(/\./g,''));
		xnomi = new Number($("#nomi").val().replace(/\./g,''));
		xmeterai = new Number($("#meterai").val().replace(/\./g,''));
		xjumadm = new Number($("#jumadm").val().replace(/\./g,''));
		xpot_angsuran= new Number($("#pot_angsuran").val().replace(/\./g,''));
		xjum_period= new Number($("#jum_period").val().replace(/\./g,''));
		xsimpanan_pokok= new Number($("#simpanan_pokok").val().replace(/\./g,''));
		xsimpanan_wajib= new Number($("#simpanan_wajib").val().replace(/\./g,''));
	}
	function variabell(){
		xgaji=new Number($("#gaji").val().replace(/\./g,''));
		xpbank=new Number($("#pbank").val().replace(/\./g,''));
		xplain=new Number($("#plain").val().replace(/\./g,''));
		xself1=new Number($("#self1").val().replace(/\./g,''));
	}
});
$(function(){
	$('#gaji').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#self1').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#self2').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#self3').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#plain').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#pbank').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#nomi').priceFormat({prefix: '',centsSeparator:',',thousandsSeparator:'.',centsLimit: 0});
	$('#blunas').priceFormat({prefix: '',centsSeparator:',',thousandsSeparator:'.', centsLimit: 0});
	$('#alunas').priceFormat({prefix: '',centsSeparator:',',thousandsSeparator:'.', centsLimit: 0});
	$('#bungakk').priceFormat({prefix: '',centsSeparator:',',thousandsSeparator:'.', centsLimit: 0});
	$('#saldoa').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator: '.', centsLimit: 0});
	$('#jumlunas').priceFormat({prefix: '',centsSeparator:',',thousandsSeparator: '.', centsLimit: 0});
	$('#mnomi').priceFormat({prefix: '',centsSeparator:',',thousandsSeparator: '.', centsLimit: 0});
	$('#jumadm').priceFormat({prefix: '',centsSeparator:',',thousandsSeparator: '.', centsLimit: 0});
	$('#jumprovisi').priceFormat({prefix: '',centsSeparator:',',thousandsSeparator: '.', centsLimit: 0});
	$('#jumpremi').priceFormat({prefix: '',centsSeparator:',',thousandsSeparator: '.', centsLimit: 0});
	$('#jumbtl').priceFormat({prefix: '',centsSeparator:',',thousandsSeparator: '.', centsLimit: 0});
	$('#meterai').priceFormat({prefix: '',centsSeparator:',',thousandsSeparator: '.', centsLimit: 0});
	$('#suku').priceFormat({prefix: '',centsSeparator:'.',thousandsSeparator: '.', centsLimit: 2});
	$('#pot_angsuran').priceFormat({prefix: '',centsSeparator:'.',thousandsSeparator: '.', centsLimit: 0});
	$('#jum_period').priceFormat({prefix: '',centsSeparator:'.',thousandsSeparator: '.', centsLimit: 0});
	$('#jumbersih').priceFormat({prefix: '',centsSeparator:'.',thousandsSeparator: '.', centsLimit: 0});
	$('#jumpotong').priceFormat({prefix: '',centsSeparator:'.',thousandsSeparator: '.', centsLimit: 0});
	$('#pokok').priceFormat({prefix: '',centsSeparator:'.',thousandsSeparator: '.', centsLimit: 0});
	$('#bunga').priceFormat({prefix: '',centsSeparator:'.',thousandsSeparator: '.', centsLimit: 0});
	$('#madm').priceFormat({prefix: '',centsSeparator:'.',thousandsSeparator: '.', centsLimit: 0});
	$('#jumangsur').priceFormat({prefix: '',centsSeparator:'.',thousandsSeparator: '.', centsLimit: 0});
	$('#simpanan_pokok').priceFormat({prefix: '',centsSeparator:'.',thousandsSeparator: '.', centsLimit: 0});
	$('#simpanan_wajib').priceFormat({prefix: '',centsSeparator:'.',thousandsSeparator: '.', centsLimit: 0});
	$( "#hitung" ).button({
		text: true,
		icons: {
			primary: "ui-icon-calculator"
		}
	});
	$(".brekom").autocomplete({
		minLength:2,
		source:'auto_kabupaten.php',
		select:function(event, ui){
			$('#nmkota').html(ui.item.nama);
		}
	});
});
function validasi(){
	var kode_cair=document.forms["masuk"]["kode_cair"].value;
	if(kode_cair==''){
		alert("Pencairan Pinjaman Belum Di Isi..?");
		$("#kode_cair").focus();
		return false;
	}
	var jumbersih= new $("#jumbersih").val().replace(/\./g, '');
	if (jumbersih<=0){
		alert('Jumlah Di Terima Tidak Memenuhi Syarat...?');
		$("#nomi").focus();
		return false;
	}
	var nominal= new $("#nomi").val().replace(/\./g, '');
	if (nominal<=0){
		alert('Nominal Pinjaman Belum Di input...?');
		$("#nomi").focus();
		return false;
	}
	var kdbyr=document.forms["masuk"]["kdbyr"].value;
	if (kdbyr==null || kdbyr==""){
		alert("Wilayah Kantor Bayar Belum Di Pilih !");
		$("#kdbyr").focus();
		return false;
	}
	var kkbayar=document.forms["masuk"]["kkbayar"].value;
	if (kkbayar==null || kkbayar==""){
		alert("Kantor Bayar Belum Di Pilih !");
		$("#kkbayar").focus();
		return false;
	}
	var kdsales=document.forms["masuk"]["kdsales"].value;
	if (kdsales==null || kdsales==""){
		alert("Kode Sales Belum Di Pilih !");
		$("#kdsales").focus();
		return false;
	}
	var noreks=document.forms["masuk"]["noreks"].value;
	if (noreks==null || noreks==""){
		alert("Rekening Pembayaran Belum Di Isi !");
		$("#noreks").focus();
		return false;
	}
	var kdpremi=document.forms["masuk"]["kdpremi"].value;
	var nmwaris=document.forms["masuk"]["nmwaris"].value;
	if (kdpremi==9 && nmwaris==""){
		alert("Tidak Di Asuransikan !, Nama Ahli Waris Tidak Boleh Kosong");
		$("#kdpremi").focus();
		return false;
	}
	var jumlah_period = new $("#jumlah_period").val();
	if(produk=='KMP'){
		if(jumlah_period<1){
			alert("Jumlah Grace Period Belum Di Isi..!");
			$("#jumlah_period").focus();
			return false;
		}
		if(kdangsur==0){
			alert('Jenis Produk '+produk+' Tidak Bisa Ada Potongan Angsuran');
			$("#kdangsur").focus();
			return false
		}
	}
	var jum_kdangsur = new $("#jum_kdangsur").val();
	var kdangsur=$("#kdangsur").val();
	if(kdangsur==0){
		if(jum_kdangsur<1){
			alert('Jumlah Setoran Pertama Belum Di Isi');
			$("#jum_kdangsur").focus();
			return false
		}
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