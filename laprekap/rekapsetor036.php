<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekap_Setoran".$bln.$thn.".xls");
echo '<html>';
echo '<head>';
echo '<title>REKAP SETORAN</title>';
echo '</head>';
echo '<body>';
$ada=FALSE;
$desc="LAPORAN REKAP PEMBAYARAN ANGSURAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$no=1;?>
<table style="border-collapse: collapse;font-family: Arial;" width="100%" border="1" cellpadding="2px">
	<tr><td colspan="8" align="center"><?php echo $desc.'<br>'.$cabang;?></td></tr>
	<?php include "../laprekap/rekapsetor03x.php";?>
</table>
<p>&nbsp;</p>
<?php
include "../laprekap/query_setoran032.php";
$desc="ANALISA REKAP PEMBAYARAN ANGSURAN BULAN : ".nmbulan($bln).' '.$thn;
$no=1;?>
<table style="border-collapse: collapse;font-family: Arial;" width="100%" border="1" cellpadding="2px">
	<tr><td colspan="12" align="center"><?php echo $desc.'<br>'.$cabang;?></td></tr>
	<?php include "../laprekap/rekapsetor03y.php";?>
</table>
<?php
echo '</body>';
echo '</html>';
?>