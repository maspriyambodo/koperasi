<?php include 'auth.php';?>
<script type="text/javascript" src="java/_tambah_icon.js"></script>
<script TYPE="text/javascript">
	var url1='new_nasabah01.php';
	$("input#nonas").focus();
</script>
<div class="ui-widget-content" align="center">
	<form id="formsearch" name="formsearch" method="post" action="">
		MASUKAN NO KTP : 
		<input type="text" name="nonas" id="nonas" size="25" maxlength="23"/>
		<button type="button" id="lacak_data">Cari Data</button>
	</form>
</div>
<div ID="divPageHasil"></div>