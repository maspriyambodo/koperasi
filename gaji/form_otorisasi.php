<?php
if($kode_aktif==0){
	$kode_aktifx='BELUM OTORISASI';
}elseif($kode_aktif==1){
	$kode_aktifx='SUDAH OTORISASI';
}else{
	$kode_aktifx='DI TOLAK';
}
?>