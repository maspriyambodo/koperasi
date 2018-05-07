$(document).ready(function(){
	$("#sandi_pokok").lookupbox({
		title: 'Daftar Rekening Akuntansi',
		url	 : 'lookup/lookup_sandix.php?chars=105',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=spokok]').val(a.nonas);
		},
		tableHeader: ['Norek','Keterangan','Produk','Kode']
	});
	$("#sandi_bunga").lookupbox({
		title: 'Daftar Rekening Akuntansi',
		url	 : 'lookup/lookup_sandix.php?chars=3031',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=sbunga]').val(a.nonas);
		},
		tableHeader: ['Norek','Keterangan','Produk','Kode']
	});
	$("#sandi_pelunasan").lookupbox({
		title: 'Daftar Rekening Akuntansi',
		url	 : 'lookup/lookup_sandix.php?chars=3033',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=slunas]').val(a.nonas);
		},
		tableHeader: ['Norek','Keterangan','Produk','Kode']
	});
	$("#sandi_administrasi").lookupbox({
		title: 'Daftar Rekening Akuntansi',
		url	 : 'lookup/lookup_sandix.php?chars=3102',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=sadm]').val(a.nonas);
		},
		tableHeader: ['Norek','Keterangan','Produk','Kode']
	});
	$("#sandi_provisi").lookupbox({
		title: 'Daftar Rekening Akuntansi',
		url	 : 'lookup/lookup_sandix.php?chars=3081',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=sprovisi]').val(a.nonas);
		},
		tableHeader: ['Norek','Keterangan','Produk','Kode']
	});
	$("#sandi_premi").lookupbox({
		title: 'Daftar Rekening Akuntansi',
		url	 : 'lookup/lookup_sandix.php?chars=2138',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=spremi]').val(a.nonas);
		},
		tableHeader: ['Norek','Keterangan','Produk','Kode']
	});
	$("#sandi_refund").lookupbox({
		title: 'Daftar Rekening Akuntansi',
		url	 : 'lookup/lookup_sandix.php?chars=2138',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=srefund]').val(a.nonas);
		},
		tableHeader: ['Norek','Keterangan','Produk','Kode']
	});
	$("#sandi_meterai").lookupbox({
		title: 'Daftar Rekening Akuntansi',
		url	 : 'lookup/lookup_sandix.php?chars=1132',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=smeterai]').val(a.nonas);
		},
		tableHeader: ['Norek','Keterangan','Produk','Kode']
	});
	$("#sandi_finalti").lookupbox({
		title: 'Daftar Rekening Akuntansi',
		url	 : 'lookup/lookup_sandix.php?chars=3109',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=glfinalti]').val(a.nonas);
		},
		tableHeader: ['Norek','Keterangan','Produk','Kode']
	});
	$("#sandi_denda").lookupbox({
		title: 'Daftar Rekening Akuntansi',
		url	 : 'lookup/lookup_sandix.php?chars=3109',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=sdenda]').val(a.nonas);
		},
		tableHeader: ['Norek','Keterangan','Produk','Kode']
	});
	$("#sandi_blokir").lookupbox({
		title: 'Daftar Rekening Akuntansi',
		url	 : 'lookup/lookup_sandix.php?chars=2134',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=sbtl]').val(a.nonas);
		},
		tableHeader: ['Norek','Keterangan','Produk','Kode']
	});
});