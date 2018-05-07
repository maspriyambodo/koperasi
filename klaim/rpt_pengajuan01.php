<?php include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../klaim/rpt_pengajuan00.php";
$desc="DAFTAR PENGAJUAN PENGHAPUSAN OBD : ".$tgl1." S/D ".$tgl2;
$tabel_form="../klaim/rpt_pengajuanxx.php";
$kolom=11;$kertas=1;
include '../pilih_laporan.php';
?>