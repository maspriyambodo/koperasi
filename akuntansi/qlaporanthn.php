<?php
include '../h_atas.php';
$thn=$result->c_d($_GET['thn']);
$pilih=$result->c_d($_GET['p']);
$branch=$result->c_d($_GET['branch']);
$fieldhari1='tahun01';
$fieldhari2='tahundk';
$fieldhari3='tahunkk';
$fieldhari4='tahundm';
$fieldhari5='tahunkm';
$fieldhari6='tahun12';
$thnl=$thn-1;
if($branch=='0111'){
	$hasil=$result->query_x1("SELECT a.uraian,a.sandi,SUM(b.$fieldhari1) AS $fieldhari1,SUM(b.$fieldhari2) AS $fieldhari2,SUM(b.$fieldhari3) AS $fieldhari3,SUM(b.$fieldhari4) AS $fieldhari4,SUM(b.$fieldhari5) AS $fieldhari5,SUM(b.$fieldhari6) AS $fieldhari6,SUM(b.$fieldhari6-b.$fieldhari1) AS naik,SUM((b.$fieldhari6-b.$fieldhari1)/b.$fieldhari6*100) AS turun FROM $tabel a JOIN $tabel_sandi b ON a.sandi=b.nonas GROUP BY b.nonas ORDER BY b.nonas");
}else{
	$hasil=$result->query_x1("SELECT a.uraian,a.sandi,b.$fieldhari1,b.$fieldhari2,b.$fieldhari3,b.$fieldhari4,b.$fieldhari5,b.$fieldhari6,b.$fieldhari6-b.$fieldhari1 as naik,(b.$fieldhari6-b.$fieldhari1)/b.$fieldhari6*100 as turun FROM $tabel a JOIN $tabel_sandi b ON a.sandi=b.nonas WHERE b.branch='$branch' ORDER BY b.nonas");
}
?>