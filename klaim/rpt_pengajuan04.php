<?php include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=FALSE;include "../klaim/rpt_pengajuan00.php";
$desc="REKAP PENGAJUAN PENGHAPUSAN OBD : ".$tgl1." S/D ".$tgl2;
$tabel_form="../klaim/rpt_pengajuanyy.php";
$kolom=6;$kertas=2;
include '../pilih_laporan.php';
?>