$(document).ready(function(){
	var bln,thn,nonas,norek,dataString;
	$('#btn1').hide();
	$('#btn2').hide();
	$('#formsearch').submit(function () {
		$.ajax({
			type: 'POST',
			url : url1,
			data: $(this).serialize()+'&p=1',
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				$("#divPageHasil").html(data);
				$('#loading').hide();
				$('#btn1').show();
				$('#btn2').show();
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert('Error: ' + xhr.status || ' - ' || thrownError);
			}
		});
		return false;
	});
	$('#lacak_data').click(function () {
		$.ajax({
			type: 'POST',
			url	: url1,
			data: $('#formsearch').serialize()+'&p=1',
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				$("#divPageHasil").html(data);
				$('#loading').hide();
				$('#btn1').show();
				$('#btn2').show();
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert('Error: ' + xhr.status || ' - ' || thrownError);
				$('#loading').hide();
			}
		});
		return false;
	});
	$("#btn1").button().on( "click", function() {
		variabel();
		var url = url2+dataString;
		newwindow=window.open(url,'Cetak','height=600,width=1000');
		if (window.focus) {newwindow.focus()};
		return false;
	});
	$("#btn2").button().on( "click", function() {
		variabel();
		var url = url3+dataString;
		newwindow=window.open(url);
		return false;
	});
	function variabel(){
		nonas=$("#nonas").val();
		branch=$("#branch").val();
		dataString='&nonas='+nonas+'&branch='+branch;
	}
});
$(function() {
	$("#lookup_norek").button({
		text: false,
		icons: {
	   		primary: 'ui-icon-circle-plus'
	  	}
	});
	$("#btn1").button({
		text: true,
		icons: {
			primary: "ui-icon-print"
		}
	});
	$("#btn2").button({
		text: true,
		icons: {
			primary: "ui-icon-note"
		}
	});
	$("#lacak_data").button({
		text: true,
		icons: {
			primary: 'ui-icon-search'
		}
	});
});