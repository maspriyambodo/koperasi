$(document).ready(function(){
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
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert('Error: ' + xhr.status || ' - ' || thrownError);
				$('#loading').hide();
			}
		});
		return false;
	});
	$('#proses_data').click(function () {
		var r = confirm("Anda Yakin Data Di Proses...?");
		if (r == false) {
			return false;
		}
		$.ajax({
			type: 'POST',
			url	: url1,
			data: $('#formsearch').serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				$("#divPageHasil").html(data);
				$('#loading').hide();
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert('Error: ' + xhr.status || ' - ' || thrownError);
				$('#loading').hide();
			}
		});
		return false;
	});
});
$(function() {
	$("#lookup_norek").button({
		text: false,
		icons: {
	   		primary: 'ui-icon-circle-plus'
	  	}
	});
	$("#lookups").button({
		text: false,
		icons: {
	   		primary: 'ui-icon-circle-plus'
	  	}
	});
	$("#lookup_inven").button({
		text: false,
		icons: {
	   		primary: 'ui-icon-circle-plus'
	  	}
	});
	$("#lookup_sandi").button({
		text: false,
		icons: {
	   		primary: 'ui-icon-circle-plus'
	  	}
	});
	$("#lookup_nonas").button({
		text: false,
		icons: {
	   		primary: 'ui-icon-circle-plus'
	  	}
	});
	 $('button:submit').button({
	 	text: true,
		icons: {
			primary: 'ui-icon-search'
		}
	});
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
	$("#lacak_data").button({
		text: true,
		icons: {
			primary: 'ui-icon-search'
		}
	});
	$("#proses_data").button({
		text: true,
		icons: {
			primary: 'ui-icon-key'
		}
	});
});