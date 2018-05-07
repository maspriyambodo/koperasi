<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_laporan_75.js"></script>
<script type="text/javascript">
	var url1="realisasi/form_realisasi01.php";
	var url2="realisasi/form_realisasi02.php";
	var url3="realisasi/form_realisasi03.php";
	var url4="realisasi/form_realisasi04.php";
	var url5="realisasi/form_realisasi05.php";
	var url6="realisasi/rekap_tagihan32.php";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	<table align="center">
	<tr>
		<td align="center">
		<?php include 'form_bulanan.php';?>
		</td>
	</tr>
	<tr>
		<td>
		<button id="neraca1">Daftar Realisasi Tagihan</button>
		<button id="neraca2">Rekap Realisasi Tagihan</button>
		<button id="neraca3">Daftar Realisasi Susulan</button>
		<button id="neraca4">Rekap Realisasi Susulan</button>
		<button id="neraca5">Rekap Tdk Tertagih I</button>
		<button id="neraca6">Rekap Tdk Tertagih II</button>
		</td>
	</tr>
	</table>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageAkun75"></div>