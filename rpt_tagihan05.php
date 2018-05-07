<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_laporan_a.js"></script>
<script type="text/javascript">
	var url1="lapkredit/lap_kredit501.php";
	var url2="lapkredit/lap_kredit504.php";	
	var url3="lapkredit/lap_kredit601.php";
	var url4="lapkredit/lap_kredit604.php";
	var url5="lapkredit/lap_kredit701.php";
	var url6="lapkredit/lap_kredit704.php";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	<?php include 'form_bulanan.php';?>
	<table align="center">
	<tr>
		<td align="center"><button id="neraca1">Rekap Setoran Tagihan</button></td>
		<td align="center"><button id="neraca2">Daftar Setoran Tagihan</button></td>
		<td align="center"><button id="neraca3">Rekap Setoran Tdk Tertagih</button></td>
		<td align="center"><button id="neraca4">Daftar Setoran Tdk Tertagih</button></td>
		<td align="center"><button id="neraca5">Rekap Setoran Tunggakan</button></td>
		<td align="center"><button id="neraca6">Daftar Setoran Tunggakan</button></td>
	</tr>
	</table>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageAkun"></div>