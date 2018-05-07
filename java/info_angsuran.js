$(document).ready(function(){
	var bln,thn,nonas,norek,dataString;
	$('#btn1').hide();
	$('#btn2').hide();
	$('#formsearch').submit(function () {
		var nonas= $("input#nonas").val();
		if (nonas.replace(/\s/g,"") == ""){ 
			alert("Maaf, field harus diisi!");
			$("input#nonas").focus();
			return false;
		}
		$.ajax({
			type: 'POST',
			url : url1,
			data: $(this).serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				$("#divPageData").html(data);
				//$('#btn1').show();
				//$('#btn2').show();				
				$('#loading').hide();
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert('Error: ' + xhr.status || ' - ' || thrownError);
				$('#loading').hide();
			}
		});
		return false;
	});
	$("#lookup_kredit").lookupbox({
		title: 'Daftar Rekening',
		url	 : 'lookupk.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=nonas]').val(a.norek);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Produk','Saldo','Nama']
	});
	$("#lookups").lookupbox({
		title: 'Daftar Rekening',
		url	 : 'lookupw.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=nonas]').val(a.norek);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Produk','Nama']
	});
	$("#btn1").button().on( "click", function() {
		variabel();
		var url = url2+'?'+dataString;
		newwindow=window.open(url,'Cetak','height=600,width=1000');
		if (window.focus) {newwindow.focus()};
		return false;
	});
	$("#btn2").button().on( "click", function() {
		variabel();
		var url = url3+'?'+dataString;
		newwindow=window.open(url);
		return false;
	});
	function variabel(){
		bln=$("#bln").val();
		thn=$("#thn").val();
		nonas=$("#nonas").val();
		norek=$("#nonas").val();
		dataString='bln='+bln+'&thn='+thn+'&nonas='+nonas+'&norek='+norek;
	}
});