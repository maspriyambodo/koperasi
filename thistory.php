<?php include "auth.php";?>
<script type="text/javascript" src="js/_history.js"></script>
<script type="text/javascript">
	var url1='thistoryd.php';
	var url2='thistorydx.php?p=2';
	var url3='thistorydx.php?p=3';
	$("input#nonas").focus();
	$("#lookup_norek").lookupbox({
		title: 'Daftar Rekening',
		kodecabang: $("#branch").val(),
		url	 : './dist/_lookup_kredit.php?chars=',
		imgLoader: '<img src="./images/load.gif">',
		onItemSelected: function(a){
			$('input[name=nonas]').val(a.norek);
			$('input[name=branch]').val(a.branch);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Nama','Produk','Saldo']
	});
</script>
<?php include 'scr/form_norek.php'; ?>
<button id="btn1">Print PDF</button>
<button id="btn2">Print Excel</button>
<div ID="divPageHasil"></div>