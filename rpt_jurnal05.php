<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_laporan_a.js"></script>
<script type="text/javascript">
	var url1="harian/daftar_nontunai51.php";
	var url2="harian/daftar_nontunai62.php";
	var url3="kas/daftar_nontunai51.php";
	var url4="kas/daftar_nontunai62.php";			
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	<?php include 'form_bulanan03.php';?>
	<table align="center">
	<tr>
		<td align="center"><button id="neraca1">Daftar Jurnal Memorial</button></td>
		<td align="center"><button id="neraca2">Rekap Jurnal Memorial</button></td>
		<td align="center"><button id="neraca3">Daftar Jurnal Kas</button></td>
		<td align="center"><button id="neraca4">Rekap Jurnal Kas</button></td>
	</tr>
	</table>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageAkun"></div>