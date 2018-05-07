<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_formlaporan.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url1="klaim/rpt_klaim01.php?p=1";
	var url2="klaim/rpt_klaim01.php?p=2";
	var url3="klaim/rpt_klaim01.php?p=3";
	var url4="klaim/rpt_klaim04.php?p=1";
	var url5="klaim/rpt_klaim04.php?p=2";
	var url6="klaim/rpt_klaim05.php?p=3";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>	
	<?php include 'form_harian.php';?>
	<button id="layar">Daftar Layar</button>
	<button id="rekap">Rekap Layar</button>	
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageLaporan"></div>
