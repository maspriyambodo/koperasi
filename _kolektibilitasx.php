<?php
if($kdkop==1){
	$bln=date('m',strtotime($t));
	$thn=date('Y',strtotime($t));
	$tglakhir=tglAkhirBulan($thn,intval($bln));
	$m =$thn.'-'.$bln.'-'.$tglakhir;
}else{
	$m=$t;
}
$hasil=$result->query_x1("SELECT SUM(mysum) AS mysum FROM (SELECT IF(SUM(IF(kdtran=111,pokok,0))-SUM(IF(kdtran=777,pokok,0))>0,1,0) AS mysum FROM $tabel_payment WHERE norek='$norek' AND tanggal<='$m' GROUP BY angsurke) AS bb");
$data=$result->row($hasil);
$kk=$data['mysum'];
$n=1;
if($kk<1){
	$n=1;
}elseif($kk<3){
	$n=2;
}elseif($kk<5){
	$n=3;
}elseif($kk<7){
	$n=4;
}else{
	$n=5;
}
$result->query_x1("UPDATE $tabel_kredit SET kolek='$n' WHERE norek='$norek' LIMIT 1");
//$result->kolek($norek,$m);
?>