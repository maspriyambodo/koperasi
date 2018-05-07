<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_laporan_a.js"></script>
<script type="text/javascript">
	var url1="rekap_nominatif/rekapprodukd.php";
	var url2="rekap_nominatif/rekapkkbayard.php";
	var url3="rekap_nominatif/rekapwilayahd.php";
	var url4="rekap_nominatif/rekapjangkad.php";
	var url5="rekap_nominatif/rekaplurahd.php";
	var url6="rekap_nominatif/rekapkerjad.php";
	var url7="rekap_nominatif/rekapsalesd.php";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	<?php include 'form_bulanan.php';?>
	<table align="center">
	<tr>
		<!--<td align="center"><button id="neraca1">Rekap Per Jenis Peminjam</button></td>-->
		<td align="center"><button id="neraca2">Rekap Per Kantor Bayar</button></td>
		<td align="center"><button id="neraca3">Rekap Per Wilayah Kantor</button></td>
		<td align="center"><button id="neraca4">Rekap Per Jangka Waktu</button></td>
		<td align="center"><button id="neraca5">Rekap Per Kelurahan</button></td>
		<td align="center"><button id="neraca6">Rekap Per Pekerjaan</button></td>
		<td align="center"><button id="neraca7">Rekap Per Sales</button></td>
	</tr>
	</table>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageAkun"></div>