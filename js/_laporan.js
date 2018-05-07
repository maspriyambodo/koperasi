$(document).ready(function(){
	var branch,kdkop,kolek,tgl1,tgl2,kkbayar,kdsales,bln,thn,flag,kdbyr,produk,dataString;
	$('#btnpdf').hide();
	$('#btnxls').hide();
	$('#btncetakrls').hide();
	$( "#btnpdf" ).button().on( "click", function() {
		variabel();
		var cetak=$('#cetakpdf').val();
		var url=cetak+'&'+dataString;
		newwindow=window.open(url,'Cetak','height=600,width=1000');
		if (window.focus) {newwindow.focus()};
		return false;
	});
	$( "#btnxls" ).button().on( "click", function() {
		variabel();
		var cetak=$('#cetakxls').val();
		var url=cetak+'&'+dataString;
		newwindow=window.open(url);
		return false;
	});
	$( "#btncetakrls" ).button().on( "click", function() {
		variabel();
		var cetak=$('#cetakrls').val();
		var url=cetak+'&'+dataString;
		newwindow=window.open(url);
		return false;
	});
	$( "#layar" ).button().on( "click", function() {
		variabel();
		$.ajax({
			type: "GET",
			url : url1,
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageLaporan').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#btncetakrls').show();
				$('#cetakpdf').val(url2);
				$('#cetakxls').val(url3);
				$('#cetakrls').val(url7);
			}
		});
		return false;
	});
	$( "#rekap" ).button().on( "click", function() {
		variabel();
		$.ajax({
			type: "GET",
			url : url4,
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageLaporan').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url5);
				$('#cetakxls').val(url6);
			}
		});
		return false;
	});
	$( "#rincian" ).button().on( "click", function() {
		variabel();
		$.ajax({
			type: "GET",
			url : url9,
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageLaporan').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url10);
				$('#cetakxls').val(url11);
			}
		});
		return false;
	});
	$( "#rekapp" ).button().on( "click", function() {
		variabel();
		$.ajax({
			type: "GET",
			url : url12,
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageLaporan').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url13);
				$('#cetakxls').val(url14);
			}
		});
		return false;
	});
	$( "#kwitansi1" ).button().on( "click", function() {
		variabel();
		var urlc=url7+'?'+dataString;
		newwindow=window.open(urlc);
		if (window.focus) {newwindow.focus()};
		return false;
	});
	$( "#kwitansi2" ).button().on( "click", function() {
		variabel();
		var urlc=url8+'?'+dataString;
		newwindow=window.open(urlc);
		if (window.focus) {newwindow.focus()};
		return false;
	});
	$(function() {
		$( "#tgl1" ).datepicker({
			dateFormat:"yy-mm-dd",
		});
		$( "#tgl2" ).datepicker({
			dateFormat:"yy-mm-dd",
		});
	});
	function variabel(){
		tgl1=$("#tgl1").val();tgl2=$("#tgl2").val();
		bln=$("#bln").val();thn=$("#thn").val();
		branch=$("#branch").val();kdsales=$("#kdsales").val();kkbayar =$("#kkbayar").val();
		flag=$("#flag").val();kdbyr=$("#kdbyr").val();kdkop=$("#kdkop").val();
		produk=$("#produk").val();
		dataString='branch='+branch+'&kdsales='+kdsales+'&kdkop='+kdkop+'&bln='+bln+'&thn='+thn+'&tgl1='+tgl1+'&tgl2='+tgl2+'&kkbayar='+kkbayar+'&flag='+flag+'&kdbyr='+kdbyr+'&produk='+produk;
	}
});
  $(function() {
	$("#btnpdf").button({
		text: true,
		icons: {
			primary: "ui-icon-print"
		}
	});
	$("#btnxls").button({
		text: true,
		icons: {
			primary: "ui-icon-note"
		}
	});
});