<?php include 'auth.php';?>
<script type="text/javascript" src="java/_tambah_icon.js"></script>
<script type="text/javascript">
	var url1='newbatalkrdd.php';
	$("input#nonas").focus();
</script>
<div class="ui-widget-content" align="center">
	<form id="formsearch" name="formsearch" method="post" action="">
		NO TRANSAKSI : 
		<input type="text" name="norek" id="norek" size="13" maxlength="11"/>
		<button type="button" id="lacak_data">Cari Data</button>
	</form>
</div>
<div ID="divPageHasil"></div>