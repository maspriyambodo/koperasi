<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_formlaporan.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url4="nomihari/nomitaburl.php?p=1";
	var url5="nomihari/nomitaburl.php?p=2";
	var url6="nomihari/nomitaburl.php?p=3";
	var url1="nomihari/nomitabudl.php?p=1";
	var url2="nomihari/nomitabudl.php?p=2";
	var url3="nomihari/nomitabudl.php?p=3";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	BRANCH
	<select name="branch" id="branch">
		<?php include 'parameter/_kcabang.php';?>
	</select>
	<select name="kdsales" id="kdsales">
		<?php $_produkt='';include 'parameter/_produktt.php';?>
	</select>	
	<button id="layar">Daftar Layar</button>
	<button id="rekap">Rekap Layar</button>	
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageLaporan"></div>