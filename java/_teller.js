$(document).ready(function(){
	$('#formsearch').submit(function () {
		var norek=$('#nonas').val();
		var res = norek.substr(10,3);
		if(res==360){
			var res = norek.substr(8,2);
			if(res==00){
				alert('No Rekening GSSL Tidak Boleh...?');
				return false;
			}
		}
		var res = norek.substr(4,6);
		if(res==101101){
			alert('Rekening Tidak Bisa Transaksi Per Kas...?');
			return false;
		}
		$.ajax({
			type: 'POST',
			url	: url1,
			data: $(this).serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				$("#divPageHasil").html(data);
				$('#loading').hide();
			}
		});
		return false;
	});
	$('#lacak_data').click(function () {
		var norek=$('#nonas').val();
		var res = norek.substr(10,3);
		if(res==360){
			var res = norek.substr(8,2);
			if(res==00){
				alert('No Rekening GSSL Tidak Boleh...?');
				return false;
			}
		}
		var res = norek.substr(4,6);
		if(res==101101){
			alert('Rekening Tidak Bisa Transaksi Per Kas...?');
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
	$("#lacak_data").button({
		text: true,
		icons: {
			primary: 'ui-icon-search'
		}
	});
});