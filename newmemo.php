<?php include "auth.php";?>
<script type="text/javascript" src="java/_teller.js"></script>
<script type="text/javascript">
	var url1='newmemof.php';
	$("input#nonas").focus();
</script>
<div class="ui-widget-content" align="center">
	<form id="formsearch" name="formsearch" method="post" action="">
		NO REFERENSI : 
		<input type="text" name="nonas" id="nonas" size="6" maxlength="4" autocomplete="off"/>
		<button type="button" id="lacak_data">Cari Data</button>
	</form>
</div>
<div ID="divPageHasil"></div>