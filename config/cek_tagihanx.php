<?php 
if($kdkop==1){
	$hasil=$result->query_x1("SELECT norek FROM $tabelTagihan WHERE norek='$norekl' AND kdtran=111 LIMIT 1");
	if($result->num($hasil)>0)$result->msg_error('Tagihan Reguler Bulan Ini Belum Realisasi..!!');
	$hasil=$result->query_x1("SELECT norek FROM $tabelSusulan WHERE norek='$norekl' AND kdtran=111 LIMIT 1");
	if($result->num($hasil)>0)$result->msg_error('Tagihan Reguler Bulan Ini Belum Realisasi..!!');
}else{
	$hasil=$result->query_x1("SELECT norek FROM $tabelMicro WHERE norek='$norekl' AND kdtran=111 LIMIT 1");
	if($result->num($hasil)>0) $result->msg_error('Tagihan Micro Bulan Ini Belum Realisasi..!!');
}
?>