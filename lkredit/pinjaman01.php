<?php
//require_once('library/mpdf.php');
//ukuran kertas-->$mpdf = new mPDF('utf-8', array(190,236));
//$mpdf = new mPDF('',    // mode - default ''
// '',    // format - A4, for example, default ''
// 0,     // font size - default 0
// '',    // default font family
// 15,    // margin_left
// 15,    // margin right
// 16,     // margin top
// 16,    // margin bottom
// 9,     // margin header
// 9,     // margin footer
// 'L');  // L - landscape, P - portrait 
include '../h_tetap.php';
include '../lkredit/qpinjaman03.php';
$desc="DAFTAR PINJAMAN PER PRODUK BULAN  : ".strtoupper(nmbulan($bln))." ".$thn;
$tabel_form="../lkredit/fpinjaman.php";
$kolom=17;$kertas=1;
include '../pilih_laporan.php';
?>