<?php include "auth.php";?>
<script type="text/javascript" src="js/_tambah_icon.js"></script>
<script type="text/javascript">
	var url1='retur_form.php';
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
<div ID="divPageHasil"></div>