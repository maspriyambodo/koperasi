<?php
include '../h_tetap.php';
$ada=TRUE;include "../memorial/daftar_memorial66.php";
$desc="DAFTAR TRANSAKSI AKUMULASI BULAN : ".strtoupper(nmbulan($bln))." - ".$thn;
$tabel_form="../memorial/rekap_memorial55.php";
$kolom=6;$kertas=1;
if($pilih!=2){
	include '../pilih_laporan.php';	
}else{
	$result->msg_error('Print PDF Does Not Support');
}
?>