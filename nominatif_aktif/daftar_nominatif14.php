<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Nominatif Bulanan.xls");
echo '<html>';
echo '<head>';
echo '<title>NOMINATIF</title>';
echo '</head>';
echo '<body>';
$desc='REKAP NOMINATIF HARIAN TANGGAL : '.$tanggal;
$no=1;
include "../ketnas/form_rekapx.php";
include "../nominatif_aktif/daftar_nominatif15.php";
$desc='REKAP OBD PER JENIS PEMINJAM HARIAN TANGGAL : '.$tanggal;
$no=1;
include "../ketnas/form_rekapx01.php";
echo '</body>';
echo '</html>';
?>