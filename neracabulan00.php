<?php
include '../h_atas.php';
include '../nmcabang.php';
$bln=$result->clean_data($_GET['bln']);
$thn=$result->clean_data($_GET['thn']);
$pilih=$result->clean_data($_GET['p']);
$branch=$result->clean_data($_GET['branch']);
$cabang=nmcabang($branch);
$blnx=intval($bln);
$y=1;$fieldhari1='bulan01';$fieldhari2='bulan02';$fieldhari3='bulan03';$fieldhari4='bulan04';$fieldhari5='bulan05';$fieldhari6='bulan06';$fieldhari7='bulan07';$fieldhari8='bulan08';$fieldhari9='bulan09';$fieldhari10='bulan10';$fieldhari11='bulan11';$fieldhari12='bulan12';$bulan1=1;$bulan2=2;$bulan3=3;$bulan4=4;$bulan5=5;$bulan6=6;$bulan7=7;$bulan8=8;$bulan9=9;$bulan10=10;$bulan11=11;$bulan12=12;
if($branch=='0111'){
	$hasil=$result->query_x("SELECT a.uraian,a.sandi,SUM(b.$fieldhari1) AS $fieldhari1,SUM(b.$fieldhari2) AS $fieldhari2,SUM(b.$fieldhari3) AS $fieldhari3,SUM(b.$fieldhari4) AS $fieldhari4,SUM(b.$fieldhari5) AS $fieldhari5,SUM(b.$fieldhari6) AS $fieldhari6,SUM(b.$fieldhari7) AS $fieldhari7,SUM(b.$fieldhari8) AS $fieldhari8,SUM(b.$fieldhari9) AS $fieldhari9,SUM(b.$fieldhari10) AS $fieldhari10,SUM(b.$fieldhari11) AS $fieldhari11,SUM(b.$fieldhari12) AS $fieldhari12 FROM $tabel a JOIN $tabel_sandi b ON a.sandi=b.nonas GROUP BY b.nonas ORDER BY b.nonas",'');
}else{
	$hasil=$result->query_x("SELECT a.uraian,a.sandi,$fieldhari1,$fieldhari2,$fieldhari3,$fieldhari4,$fieldhari5,$fieldhari6,$fieldhari7,$fieldhari8,$fieldhari9,$fieldhari10,$fieldhari11,$fieldhari12 FROM $tabel a JOIN $tabel_sandi b ON a.sandi=b.nonas ORDER BY b.nonas",'');
}
?>