<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_laporan_a.js"></script>
<script type="text/javascript">
	var url1="nominatif_aktif/daftar_nominatif12.php";
	var url2="nominatif_aktif/daftar_nominatif11.php";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	BRANCH
	<select name="branch" id="branch">
		<?php include 'parameter/_kcabang.php';?>
	</select>
	JENIS PRODUK
	<select name="produk" id="produk">
		<?php $_produk='';include 'parameter/_produkk.php';?>
	</select>
	<table align="center">
	<tr>
		<td align="center"><button id="neraca1">Rekap Nominatif Jaminan</button></td>
		<td align="center"><button id="neraca2">Nominatif Jaminan</button></td>
	</tr>
	</table>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageAkun"></div>