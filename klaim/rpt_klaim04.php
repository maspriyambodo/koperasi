<?php include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=FALSE;include "../klaim/rpt_klaim00.php";
$desc="REKAP PENCAIRAN PENGHAPUSAN OBD TANGGAL : ".date_sql($tgl1)." S/D ".date_sql($tgl2);
$tabel_form="../klaim/rpt_klaimyy.php";
$kolom=6;$kertas=2;
include '../pilih_laporan.php';
?>