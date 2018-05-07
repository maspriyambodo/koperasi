<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../laprekap/daftarbesarq.php";
$desc="LAPORAN OBD 25 DEBITUR TERBESAR : ".nmbulan($bln).' '.$thn;
$tabel_form="../laprekap/fdaftarbesar.php";
$kolom=10;$kertas=1;
include '../pilih_laporan.php';
?>