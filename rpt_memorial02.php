<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_laporan_a.js"></script>
<script type="text/javascript">
	var url1="memorial/daftar_memorial03.php";
	var url2="memorial/rekap_memorial03.php";
	var url3="memorial/daftar_memorial04.php";
	var url4="memorial/rekap_memorial04.php";
	var url5="memorial/daftar_memorial05.php";
	var url6="memorial/rekap_memorial05.php";
	var url7="memorial/daftar_memorial06.php";
	var url8="memorial/rekap_memorial06.php";	
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	<?php include 'form_bulanan03.php';?>
	<table align="center">
	<tr>
		<td align="center"><button id="neraca1">Daftar Mutasi Kas Bulanan</button></td>
		<td align="center"><button id="neraca3">Daftar Mutasi Memorial Bulanan</button></td>
		<td align="center"><button id="neraca5">Daftar Mutasi Transaksi Bulanan</button></td>
		<td align="center"><button id="neraca7">Daftar Akumulasi Transaksi Bulanan</button></td>			
	</tr>
	<tr>
		<td align="center"><button id="neraca2">Rekap Mutasi Kas Bulanan</button></td>
		<td align="center"><button id="neraca4">Rekap Mutasi Memorial Bulanan</button></td>
		<td align="center"><button id="neraca6">Rekap Mutasi Transaksi Bulanan</button></td>
		<td align="center"><button id="neraca8">Rekap Akumulasi Transaksi Bulanan</button></td>
	</tr>
	</table>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageAkun"></div>