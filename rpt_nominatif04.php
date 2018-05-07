<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_laporan_a.js"></script>
<script type="text/javascript">
	var url1="nominatif_aktif/daftar_nominatif12.php";
	var url2="nominatif_aktif/daftar_nominatif11.php";
	var url3="nominatif_pasif/daftar_nominatif24.php";
	var url4="nominatif_pasif/daftar_nominatif23.php";
	var url5="nominatif_asuransi/nomi_asuransi02.php";
	var url6="nominatif_asuransi/nomi_asuransi01.php";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	BRANCH
	<select name="branch" id="branch">
		<?php include 'parameter/_kcabang.php';?>
	</select>
	JENIS PRODUK
	<select name="kdsales" id="kdsales">
		<?php $_produk='';include 'parameter/_produkk.php';?>
	</select>
	<table align="center">
	<tr>
		<td align="center"><button id="neraca1">Rekap Nominatif Kredit</button></td>
		<td align="center"><button id="neraca2">Nominatif Kredit</button></td>
		<td align="center"><button id="neraca3">Rekap Nomiatif Tidak Ditagih</button></td>
		<td align="center"><button id="neraca4">Nominatif Tidak Ditagih</button></td>
		<td align="center"><button id="neraca5">Rekap Nominatif Asuransi</button></td>
		<td align="center"><button id="neraca6">Nominatif Asuransi</button></td>
	</tr>
	</table>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageAkun"></div>