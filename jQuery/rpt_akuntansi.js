$(document).ready(function(){
	var branch,bln,thn,tgl,dataString;
	$(function() {
		$( "#tgl1" ).datepicker({
			dateFormat:"dd-mm-yy",
		});
	});
	$('#btnpdf').hide();
	$( "#btnpdf" ).button().on( "click", function() {
		tgl=$("#tgl").val();
		bln=$("#bln").val();
		thn=$("#thn").val();
		branch=$("#branch").val();
		var cetak=$('#cetakpdf').val();
		var dataString=cetak+'.php?p=2'+'&branch='+branch+'&bln='+bln+'&thn='+thn+'&tgl='+tgl;
		newwindow=window.open(dataString,'Cetak','height=600,width=1000');
		if (window.focus) {newwindow.focus()};
		return false;
	});
	$( "#neraca1" ).button().on( "click", function() {
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
				$('#cetakpdf').val(url2);
			}
		});
		return false;
	});
	$( "#neraca2" ).button().on( "click", function() {
		variabel();
		$.ajax({
			type: "GET",
			url: url3,
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageLaporan').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url4);
			}
		});
		return false;
	});
	$( "#neraca3" ).button().on( "click", function() {
		variabel();
		$.ajax({
			type: "GET",
			url: url5,
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageLaporan').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url6);
			}
		});
		return false;
	});
	$( "#neraca4" ).button().on( "click", function() {
		variabel();
		$.ajax({
			type: "GET",
			url : url7,
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageLaporan').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
				$('#cetakpdf').val(url8);
			}
		});
		return false;
	});
	function variabel(){
		tgl=$("#tgl").val();
		bln=$("#bln").val();
		thn=$("#thn").val();
		branch=$("#branch").val();
		dataString='branch='+branch+'&bln='+bln+'&thn='+thn+'&tgl='+tgl;
	}
});
  $(function() {
	$("#btnpdf").button({
		text: true,
		icons: {
			primary: "ui-icon-print"
		}
	});
});