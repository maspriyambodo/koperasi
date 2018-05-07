<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_tambah_icon.js"></script>
<script type="text/javascript">
	$("input#nonas").focus();
	url1="tabel_kwilayahyy.php";
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
	$hasil=$result->query_lap("SELECT branch,kd,nmkb,tgl_input FROM $tabel_wkb ORDER BY kd");$no=1;
	include "tabel_kwilayahxx.php";
	?>
</div>
