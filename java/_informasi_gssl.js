var branch,nonas,sufix,bln,thn,bln_akhir,thn_akhir,dataString;
$(document).ready(function(){
	$('#btnpdf').hide();
	$('#btnxls').hide();
	$('#formsearch').submit(function () {
		$.ajax({
			url : 'akninfogsls.php?p=1',
			type: 'POST',
			data: $(this).serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageAkun75').html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
			}
		});
		return false;
	});
	$('#lacak_data').click(function () {
		$.ajax({
			type: 'POST',
			url	: 'akninfogsls.php?p=1',
			data: $('#formsearch').serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				$("#divPageAkun75").html(data);
				$('#loading').hide();
				$('#btnpdf').show();
				$('#btnxls').show();
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert('Error: ' + xhr.status || ' - ' || thrownError);
				$('#loading').hide();
			}
		});
		return false;
	});
	$( "#btnpdf" ).button().on( "click", function() {
		variabel();
		var url='akninfogsls.php?p=2'+dataString;
		newwindow=window.open(url,'Cetak','height=600,width=1000');
		if (window.focus) {newwindow.focus()};
		return false;
	});
	$( "#btnxls" ).button().on( "click", function() {
		variabel();
		var url='akninfogsls.php?p=3'+dataString;
		newwindow=window.open(url);
		return false;
	});
	function variabel(){
		bln=$("#bln").val();thn=$("#thn").val();bln_akhir=$("#bln_akhir").val();thn_akhir=$("#thn_akhir").val();nonas=$("#text2").val();
		branch=$("#text1").val();sufix=$("#text3").val();
		dataString='&branch='+branch+'&bln='+bln+'&thn='+thn+'&nonas='+nonas+'&sufix='+sufix+'&bln_akhir='+bln_akhir+'&thn_akhir='+thn_akhir;
	}
});