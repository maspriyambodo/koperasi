<?php include 'h_tetap.php';?>
<script type="text/javascript" src="js/_laporan_75.js"></script>
<script type="text/javascript">
	var url1="tunggakan/tunggakan41.php";
	var url2="tunggakan/tunggakan42.php";
	var url3="tunggakan/tunggakan21.php";
	var url4="tunggakan/tunggakan10.php";
	var url5="tunggakan/tunggakan31.php";
	var url6="tunggakan/tunggakan32.php";
</script>
<?php echo'
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	<table align="center">
	<tr><td align="center">'; include 'scr/lap_bulanan.php'; echo '</td></tr>
	<tr><td align="center">
		<button id="neraca1">Daftar Tunggakan</button>
		<button id="neraca2">Rekap Tunggakan</button>
		<button id="neraca3">Daftar Tunggakan <= JT</button>
		<button id="neraca4">Rekap Tunggakan <= JT</button>
		<button id="neraca5">Daftar Tunggakan > JT</button>
		<button id="neraca6">Rekap Tunggakan > JT</button>
	</td></tr>
	</table>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageAkun75"></div>'; ?>