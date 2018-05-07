<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_formlaporan.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript" src="js/laporankas.js"></script>
<script type="text/javascript">
	var fulder="kasbloter/";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	TANGGAL
	<input type="text" id="tgl1" maxlength="10" value="<?php echo date_sql($tanggal);?>" readonly/>
	<button id="layar">Daftar Layar</button>
	<button id="rekap">Rekap Layar</button>
</div>
<div>
	<button id="btnpdf">PDF</button>
	<button id="btnxls">XLS</button>
</div>
<div id="divPageAkun"></div>
