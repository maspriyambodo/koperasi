<?php 
include '../auth.php';
require_once '../class/MySQL.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=rtagihanx.xls");
echo '<html>';
echo '<head>';
echo '<title>RETUR TAGIHAN</title>';
echo '</head>';
echo '<body>';
$ada=TRUE;
include "../lainnya/qpenyusutand.php";
$desc="DAFTAR MUTASI BIAYA PENYUSUTAN TANGGAL  : ".$tgl1." S/D ".$tgl2;
$no=1;?>
<table style="border-collapse: collapse;" width="100%" border="1" align="center" cellpadding="3px">
	<tr><td colspan="10" align="center"><?php echo $desc.'<br>'.$cabang;?></td></tr>
	<?php include "../memorial/daftar_nontunaixx.php";?>
</table>
<?php
echo '</body>';
echo '</html>';
?>