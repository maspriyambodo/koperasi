<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Nominatif Bulanan.xls");
echo '<html>';
echo '<head>';
echo '<title>NOMINATIF</title>';
echo '</head>';
echo '<body>';
$desc='REKAP NOMINATIF MENURUT KOLEKTIBILITAS PEMINJAM BULAN : '.nmbulan($bln).' '.$thn;
$no=1;
echo '
<table style="border-collapse: collapse;" width="100%" border="1" align="center" cellpadding="3px">
<tr><th colspan="10"><strong>'.$desc.'</strong></th></tr>';
include "../nominatif_aktif/form_rekap_produk.php";
echo '</table>';
echo '<p>';
include "../nominatif_aktif/rekap_query_produkk.php";
$desc='REKAP OBD PER JENIS PEMINJAM BULAN : '.nmbulan($bln).' '.$thn;
$no=1;
echo '
<table style="border-collapse: collapse;" width="100%" border="1" align="center" cellpadding="3px">
<tr><th colspan="10"><strong>'.$desc.'</strong></th></tr>';
include "../nominatif_aktif/form_rekap_produkk.php";
echo '</table>';
echo '</body>';
echo '</html>';
?>