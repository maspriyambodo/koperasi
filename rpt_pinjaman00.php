<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_laporan_a.js"></script>
<script type="text/javascript">
	var url1="lkredit/pinjaman01.php";
	var url2="lkredit/pinjaman02.php";
	var url3="lkredit/pinjaman03.php";
	var url4="lkredit/pinjaman04.php";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	<?php include 'form_bulanan01.php';?>
	<table align="center">
	<tr>
		<td align="center"><button id="neraca1">Daftar Penyaluran Per Produk</button></td>
		<td align="center"><button id="neraca2">Rekap Penyaluran Per Produk</button></td>
		<td align="center"><button id="neraca3">Daftar Penyaluran Kantor Bayar</button></td>
		<td align="center"><button id="neraca4">Rekap Penyaluran Kantor Bayar</button></td>
	</tr>
	</table>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageAkun"></div>