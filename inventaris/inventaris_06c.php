<?php
include '../h_tetap.php'; 
$ada=TRUE;include "../inventaris/inventaris_07x.php";
$desc='DAFTAR NOMINATIF INVENTARIS PENYUSUTAN HARIAN : '.nmbulan($bln).' '.$thn;
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Nominatif_Inventaris".nmbulan($bln).' '.$thn.".xls");
echo '<html>';
echo '<head>';
echo '<title>Daftar Inventaris</title>';
echo '</head>';
echo '<body>';
$no=1;?>
<table style="border-collapse: collapse;" width="100%" border="1" align="center" cellpadding="3px" >
	<tr><td colspan="23" align="center"><?php echo $desc.'<br>'.$cabang;?></td></tr>
	<?php include "../inventaris/inventaris_03y.php";?>
</table>
<?php
echo '</body>';
echo '</html>';
?>