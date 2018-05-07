<?php
if($kdkop==1){
	$bln=date('m',strtotime($t));
	$thn=date('Y',strtotime($t));
	$tglakhir=tglAkhirBulan($thn,intval($bln));
	$m =$thn.'-'.$bln.'-'.$tglakhir;
}else{
	$m=$t;
}
$kolek=$result->kolek(0,$norek,$m);
?>