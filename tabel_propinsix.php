<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_tambah_icon.js"></script>
<script type="text/javascript">
	$("input#nonas").focus();
	url1="tabel_propinsiyy.php";
</script>
<div class="ui-widget-content">
	<form id="formsearch" name="formsearch" method="post" action="">
		&nbsp;
		KRITERIA : <input type="text" name="nonas" id="nonas" size="40" maxlength="35" onKeyUp="caps(this)"/>
		<button type="button" id="lacak_data">Cari Data</button>
	</form>
</div>
<div ID="divPageHasil">
	<?php
	$hasil=$result->query_lap("SELECT kode,desc1,bussdate FROM kode_provinsi ORDER BY kode");$no=1;
	include "tabel_propinsixx.php";
	?>
</div>
