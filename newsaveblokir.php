<?php include "auth.php";?>
<script type="text/javascript" src="java/_tambah_icon.js"></script>
<script type="text/javascript">
	var url1='newsaveblokirf.php';
	$("input#nonas").focus();
	$("#lookup_norek").lookupbox({
		title: 'Daftar Rekening',
		url	 : 'lookup/lookup_tabungan.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=nonas]').val(a.norek);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Nama','Produk']
	});
</script>
<div class="ui-widget-content" align="center">
	<form id="formsearch" name="formsearch" method="post" action="">
		NO REKENING : 
		<input type="text" name="nonas" id="nonas" size="20" maxlength="13" title="Nomor Rekening" onKeyUp="caps(this)"/>
		<button type="button" id="lookup_norek">&nbsp;</button>
		<button type="button" id="lacak_data">Cari Data</button>
	</form>
</div>
<div ID="divPageHasil"></div>