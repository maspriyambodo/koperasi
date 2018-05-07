<?php include "auth.php";?>
<script type="text/javascript" src="js/_tambah_icon.js"></script>
<script type="text/javascript">
	var url1='realmanualb.php';
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
<div class="ui-widget-content" align="center">
	<form id="formsearch" name="formsearch" method="post" action="">
		NO REKENING : 
		<input type="text" name="branch" id="branch" size="4" maxlength="4" value="<?php echo $kcabang; ?>" title="Kode Cabang"/>
		<input type="text" name="nonas" id="nonas" size="30" maxlength="25" title="Nomor Rekening" onKeyUp="caps(this)"/>
		<button type="button" id="lookup_norek">&nbsp;</button>
		<button type="button" id="lacak_data">Cari Data</button>
	</form>
</div>
<div ID="divPageHasil"></div>