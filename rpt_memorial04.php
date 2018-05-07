<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_laporan_a.js"></script>
<script type="text/javascript">
	var url1="harian/daftar_memorial11.php";
	var url2="harian/daftar_memorial22.php";	
	var url3="harian/daftar_nontunai01.php";
	var url4="harian/daftar_nontunai02.php";				
	var url5="harian/daftar_memorial31.php";
	var url6="harian/daftar_memorial32.php";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	<?php include 'form_harian.php';?>
	<table align="center">
	<tr>
		<td align="center"><button id="neraca1">Daftar Memorial System</button></td>
		<td align="center"><button id="neraca2">Rekap Memorial System</button></td>
		<td align="center"><button id="neraca3">Daftar Memorial Manual</button></td>
		<td align="center"><button id="neraca4">Rekap Memorial Manual</button></td>
		<td align="center"><button id="neraca5">Daftar Memorial Lainnya</button></td>
		<td align="center"><button id="neraca6">Rekap Memorial Lainnya</button></td>
	</tr>
	</table>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageAkun"></div>