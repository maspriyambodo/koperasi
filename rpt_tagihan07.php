<?php include 'auth.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<title>Laporan Keuangan Lainnya</title>
<script type="text/javascript" src="js/global.js"></script>
<script type="text/javascript" src="jQuery/combobox.js"></script>
<script type="text/javascript" src="js/laporan_kredit.js"></script>
<script type="text/javascript">
var url1="lapkredit/lap_kredit701.php";
var url2="lapkredit/lap_kredit702.php";
var url3="lapkredit/lap_kredit703.php";
var url4="lapkredit/lap_kredit704.php";
var url5="lapkredit/lap_kredit705.php";
var url6="lapkredit/lap_kredit706.php";
</script>
</head>
<body>
<?php
include 'koneksi.php';
$bln=date('m',strtotime($tanggal));
$thn=date('Y',strtotime($tanggal));
include 'function.php';?>
<div class="ui-widget-content">
<table align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	<?php include 'formtagihan01.php';?>
	<tr>
		<td align="center" colspan="6">
			<button id="neraca1">Laporan Rekap Setoran Tunggakan</button>
			<button id="neraca2">Laporan Daftar Setoran Tunggakan</button>
		</td>
	</tr>
</table>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageAkun"></div>
</body>
</html>