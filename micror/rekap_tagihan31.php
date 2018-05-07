<?php 
include '../h_tetap.php'; 
$pilih=$result->c_d($_GET['p']);
$ada=FALSE;include "../micror/rekap_tagihantt.php"; 
$desc="REKAP TIDAK TERTAGIH MICRO BULAN : ".nmbulan($bln).' '.$thn;
include '../judul.php'; ?>
<table  class="table" width="100%">
	<?php include "../realisasi/rekap_tagihanrr.php";?>
</table>
?>