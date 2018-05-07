<?php include 'h_tetap.php';?>
<script type="text/javascript" src="js/_laporan_75.js"></script>
<script type="text/javascript">
	var url1="laprekap/daftar_setor031.php";
	var url2="laprekap/rekapsetor031.php";
</script>
<?php echo'
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>';
	include 'scr/lap_bulanan.php'; echo '
	<button id="neraca1">Daftar Layar</button>
	<button id="neraca2">Rekap Layar</button>	
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageAkun75"></div>'; ?>