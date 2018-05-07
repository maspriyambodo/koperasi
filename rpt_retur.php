<?php include 'h_tetap.php';?>
<script type="text/javascript" src="js/_laporan.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url1="lap_retur/rtagihand.php?p=1";
	var url2="lap_retur/rtagihand.php?p=2";
	var url3="lap_retur/rtagihand.php?p=3";
	var url4="lap_retur/rtagihanr.php?p=1";
	var url5="lap_retur/rtagihanr.php?p=2";
	var url6="lap_retur/rtagihanr.php?p=3";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	<?php include 'scr/form_harian.php';?>
	<button id="layar">Daftar Layar</button>
	<button id="rekap">Rekap Layar</button>	
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageLaporan"></div>