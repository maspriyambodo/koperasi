$(document).ready(function(){
	$("#lookup_kredit").lookupbox({
		title: 'Daftar Rekening',
		url	 : 'lookupk.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=nonas]').val(a.norek);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Produk','Saldo','Nama']
	});
	$("#lookup_sandi").lookupbox({
		title: 'Daftar Rekening',
		url  : 'lookup_sandi.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data){
			$('input[name=branch]').val(data.branch);
			$('input[name=nonas]').val(data.nonas);
			$('input[name=sufix]').val(data.sufix);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Nama']
	});
	$("#lookup_nonas").lookupbox({
		title: 'Daftar Rekening',
		url  : 'lookup_nonas.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=nonas]').val(data.nonas);
		},
		tableHeader: ['Branch','Nonas','Nama','No KTP']
	});
	$("#lookup_norek").lookupbox({
		title: 'Daftar Rekening',
		url	 : 'lookupn.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=rekening_internal]').val(a.norek);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Nama','Produk','Saldo']
	});
	$("#lookup_sales").lookupbox({
		title: 'Daftar Account Officer',
		url	 : 'lookup_sales.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=sales_id]').val(a.idsales);
			$('input[name=nama_sales').val(a.nama);
		},
		tableHeader: ['Branch','Kode Sales','Nama']
	});
	$("#lookup_norekx").lookupbox({
		title: 'Daftar Rekening',
		url  : 'lookup_norekx.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=branch_]').val(data.branch);
			$('input[name=nonas_]').val(data.nonas);
			$('input[name=sufix_]').val(data.sufix);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Produk','Nama']
	});
	$("#lookup_kota").lookupbox({
		title: 'Daftar Kabupaten',
		url: 'lookupkota.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=brekom]').val(data.kode);
			$('#nmkota').html(data.desc1);
		},
		tableHeader: ['Kode','Kabupaten','Propinsi']
	});
});