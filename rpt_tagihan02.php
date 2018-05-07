<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_laporan_75.js"></script>
<script type="text/javascript">
	var url1="tagihan/lap_kreditr01.php";
	var url2="tagihan/lap_kreditr04.php";
	var url3="tagihan/lap_kredita01.php";
	var url4="tagihan/lap_kredita04.php";	
	var url5="tagihan/lap_kreditt01.php";
	var url6="tagihan/lap_kreditt04.php";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	<?php include 'form_bulanan.php';?>
	<table align="center">
	<tr>
		<td align="center"><button id="neraca3">Rek. Rencana Tagihan</button></td>
		<td align="center"><button id="neraca4">Daf. rencana Tagihan</button></td>
		<td align="center"><button id="neraca1">Rek. Realisasi Tagihan</button></td>
		<td align="center"><button id="neraca2">Daf. Realisasi Tagihan</button></td>
		<td align="center"><button id="neraca5">Rek. Tidak Tertagih</button></td>
		<td align="center"><button id="neraca6">Daf. Tidak Tertagih</button></td>
	</tr>
	</table>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageAkun75"></div>