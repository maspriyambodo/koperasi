<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_formlaporan.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url1="lap_deposito/daftar_jtt01.php?p=1";
	var url2="lap_deposito/daftar_jtt01.php?p=2";
	var url3="lap_deposito/daftar_jtt01.php?p=3";
	var url4="lap_deposito/rekap_jtt01.php?p=1";
	var url5="lap_deposito/rekap_jtt01.php?p=2";
	var url6="lap_deposito/rekap_jtt01.php?p=3";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	BULAN
	<select name="bln" id="bln" style="width: 140px" >
		<?php $bln_x1=$blnxxx;include 'form_bulan.php';?>
	</select>
	<select name="thn" id="thn" style="width: 80px" >
		<?php $thn_x1=$thnxxx;include 'form_tahun.php';?>
	</select>
	<select name="branch" id="branch">
		<?php include 'parameter/_kcabang.php';?>
	</select>
	<select name="produk" id="produk">
		<?php include 'parameter/_produk_deposito.php';?>
	</select>
	<button id="layar">Daftar Layar</button>
	<button id="rekap">Rekap Layar</button>	
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageLaporan"></div>