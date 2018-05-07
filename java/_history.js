$(document).ready(function(){
	var bln,thn,nonas,norek,dataString;
	$('#btn1').hide();
	$('#btn2').hide();
	$("#lookup_norek").lookupbox({
		title: 'Daftar Rekening',
		url	 : 'lookup/lookup_kredit.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=nonas]').val(a.norek);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Nama','Produk','Saldo']
	});
	$("#lookups").lookupbox({
		title: 'Daftar Rekening',
		url	 : 'lookup/lookup_tabungan.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=nonas]').val(a.norek);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Nama','Produk']
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