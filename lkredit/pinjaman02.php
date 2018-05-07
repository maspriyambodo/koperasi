<?php
include '../h_tetap.php';
include '../lkredit/qpinjaman04.php';
$desc="REKAP PINJAMAN PER PRODUK BULAN  : ".strtoupper(nmbulan($bln))." ".$thn;
$tabel_form="../lkredit/pinjaman_rform.php";
$kolom=17;$kertas=1;
include '../pilih_laporan.php';
?>