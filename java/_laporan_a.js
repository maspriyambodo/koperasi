$(document).ready(function(){
	var branch,bln,thn,produk,kdsales,tgl1,tgl2,kkbayar,dataString;
	$(function() {
		$( "#tgl1" ).datepicker({
			dateFormat:"yy-mm-dd",
		});
		$( "#tgl2" ).datepicker({
			dateFormat:"yy-mm-dd",
		});
	});
	$('#btnpdf').hide();
	$('#btnxls').hide();
	$( "#btnpdf" ).button().on( "click", function() {
		variabel();
		var cetak=$('#cetakpdf').val();
		var url=cetak+'?p=2&'+dataString;
		newwindow=window.open(url,'Cetak','height=600,width=1000');
		if (window.focus) {newwindow.focus()};
		return false;
	});
	$( "#btnxls" ).button().on( "click", function() {
		variabel();
		var cetak=$('#cetakxls').val();
		var url=cetak+'?p=3&'+dataString;
		newwindow=window.open(url);
		return false;
	});
	$( "#neraca1" ).button().on( "click", function() {
		variabel();
		var x=dataString+'&p=1';
		$.ajax({
			type: "GET",
			url : url1,
			data: x,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url1);
				$('#cetakxls').val(url1);
			}
		});
		return false;
	});
	$( "#neraca2" ).button().on( "click", function() {
		variabel();
		var x=dataString+'&p=1';
		$.ajax({
			type: "GET",
			url : url2,
			data: x,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url2);
				$('#cetakxls').val(url2);
			}
		});
		return false;
	});
	$( "#neraca3" ).button().on( "click", function() {
		variabel();
		var x=dataString+'&p=1';
		$.ajax({
			type: "GET",
			url: url3,
			data: x,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url3);
				$('#cetakxls').val(url3);
			}
		});
		return false;
	});
	$( "#neraca4" ).button().on( "click", function() {
		variabel();
		var x=dataString+'&p=1';
		$.ajax({
			type: "GET",
			url : url4,
			data: x,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url4);
				$('#cetakxls').val(url4);
			}
		});
		return false;
	});
	$( "#neraca5" ).button().on( "click", function() {
		variabel();
		var x=dataString+'&p=1';
		$.ajax({
			type: "GET",
			url : url5,
			data: x,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url5);
				$('#cetakxls').val(url5);
			}
		});
		return false;
	});
	$( "#neraca6" ).button().on( "click", function() {
		variabel();
		var x=dataString+'&p=1';
		$.ajax({
			type: "GET",
			url : url6,
			data: x,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url6);
				$('#cetakxls').val(url6);
			}
		});
		return false;
	});
	$( "#neraca7" ).button().on( "click", function() {
		variabel();
		var x=dataString+'&p=1';
		$.ajax({
			type: "GET",
			url : url7,
			data: x,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url7);
				$('#cetakxls').val(url7);
			}
		});
		return false;
	});
	$( "#neraca8" ).button().on( "click", function() {
		variabel();
		var x=dataString+'&p=1';
		$.ajax({
			type: "GET",
			url : url8,
			data: x,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url8);
				$('#cetakxls').val(url8);
			}
		});
		return false;
	});
	$( "#neraca9" ).button().on( "click", function() {
		variabel();
		var x=dataString+'&p=1';
		$.ajax({
			type: "GET",
			url : url9,
			data: x,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url9);
				$('#cetakxls').val(url9);
			}
		});
		return false;
	});
	$( "#neraca10" ).button().on( "click", function() {
		variabel();
		var x=dataString+'&p=1';
		$.ajax({
			type: "GET",
			url : url10,
			data: x,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url10);
				$('#cetakxls').val(url10);
			}
		});
		return false;
	});
	$( "#neraca11" ).button().on( "click", function() {
		variabel();
		var x=dataString+'&p=1';
		$.ajax({
			type: "GET",
			url : url11,
			data: x,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url11);
				$('#cetakxls').val(url11);
			}
		});
		return false;
	});
	$( "#neraca12" ).button().on( "click", function() {
		variabel();
		var x=dataString+'&p=1';
		$.ajax({
			type: "GET",
			url : url12,
			data: x,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url12);
				$('#cetakxls').val(url12);
			}
		});
		return false;
	});
	$( "#neraca13" ).button().on( "click", function() {
		variabel();
		var x=dataString+'&p=1';
		$.ajax({
			type: "GET",
			url : url13,
			data: x,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url13);
				$('#cetakxls').val(url13);
			}
		});
		return false;
	});
	$( "#neraca14" ).button().on( "click", function() {
		variabel();
		var x=dataString+'&p=1';
		$.ajax({
			type: "GET",
			url : url14,
			data: x,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url14);
				$('#cetakxls').val(url14);
			}
		});
		return false;
	});
	$( "#neraca15" ).button().on( "click", function() {
		variabel();
		var x=dataString+'&p=1';
		$.ajax({
			type: "GET",
			url : url15,
			data: x,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url15);
				$('#cetakxls').val(url15);
			}
		});
		return false;
	});
	$( "#neraca16" ).button().on( "click", function() {
		variabel();
		var x=dataString+'&p=1';
		$.ajax({
			type: "GET",
			url : url16,
			data: x,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url16);
				$('#cetakxls').val(url16);
			}
		});
		return false;
	});
	function variabel(){
		bln=$("#bln").val();
		thn=$("#thn").val();
		produk=$("#produk").val();
		branch=$("#branch").val();
		kdsales=$("#kdsales").val();
		kkbayar =$("#kkbayar").val();
		tgl1=$("#tgl1").val();
		tgl2=$("#tgl2").val();
		dataString='branch='+branch+'&bln='+bln+'&thn='+thn+'&produk='+produk+'&kdsales='+kdsales+'&tgl1='+tgl1+'&tgl2='+tgl2+'&kkbayar='+kkbayar;
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