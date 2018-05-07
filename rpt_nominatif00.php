<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_laporan_a.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url2="nominatif_aktif/daftarjangkad.php";
	var url1="nominatif_aktif/rekap_produk.php";
	var url4="nominatif_pasif/daftarjangkad.php";
	var url3="nominatif_pasif/rekapjangkad.php";
	var url5="nominatif_asuransi/nomi_asuransi12.php";
	var url6="nominatif_asuransi/nomi_asuransi11.php";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	<?php include 'form_bulanan01.php';?>
	<table align="center">
	<tr>
		<td align="center"><button id="neraca1">Rekap Nominatif Kredit</button></td>
		<td align="center"><button id="neraca2">Daftar Nominatif Kredit</button></td>
		<td align="center"><button id="neraca3">Rekap Nomiatif Tidak Di Tagih</button></td>
		<td align="center"><button id="neraca4">Daftar Nominatif Tidak Di Tagih</button></td>
		<td align="center"><button id="neraca5">Rekap Nominatif Asuransi</button></td>
		<td align="center"><button id="neraca6">Daftar Nominatif Asuransi</button></td>
	</tr>
	</table>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageAkun"></div>