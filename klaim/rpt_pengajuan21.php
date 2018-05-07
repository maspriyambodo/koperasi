<?php include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../klaim/rpt_pengajuan22.php";
$desc="DAFTAR PENCAIRAN PENGHAPUSAN OBD : ".$tgl1." S/D ".$tgl2;
$tabel_form="../klaim/rpt_pengajuan23.php";
$kolom=11;$kertas=1;
include '../pilih_laporan.php';
?>