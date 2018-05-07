<?php
if($kdkop==1){
	$bln=date('m',strtotime($t));
	$thn=date('Y',strtotime($t));
	$tglakhir=tglAkhirBulan($thn,intval($bln));
	$m =$thn.'-'.$bln.'-'.$tglakhir;
}else{
	$m=$t;
}
$result->kolek($norek,$m);
$result->close();
?>