<?php
include '../h_atas.php';
$pilih=$result->c_d($_GET['p']);
$thn=$result->c_d($_GET['thn']);
$branch=$result->c_d($_GET['branch']);
$fieldhari1='tahun01';
$fieldhari2='tahundk';
$fieldhari3='tahunkk';
$fieldhari4='tahundm';
$fieldhari5='tahunkm';
$fieldhari6='tahun12';
$thnl=$thn-1;
if($branch=='0111'){
	$result->res("CREATE TEMPORARY TABLE $userid SELECT branch,nonas,nama,norekgssl,produk,SUM($fieldhari1) AS $fieldhari1,SUM($fieldhari2) AS $fieldhari2,SUM($fieldhari3) AS $fieldhari3,SUM($fieldhari4) AS $fieldhari4,SUM($fieldhari5) AS $fieldhari5,SUM($fieldhari6) AS $fieldhari6 FROM $tabel_sandi GROUP BY nonas ORDER BY nonas,norekgssl");
}else{
	$result->res("CREATE TEMPORARY TABLE $userid SELECT branch,nonas,nama,norekgssl,produk,$fieldhari1,$fieldhari2,$fieldhari3,$fieldhari4,$fieldhari5,$fieldhari6 FROM $tabel_sandi WHERE branch='$branch' ORDER BY norekgssl");
}
$hasil=$result->query_x1("SELECT branch,nonas,nama,norekgssl,produk,$fieldhari1,$fieldhari2,$fieldhari3,$fieldhari4,$fieldhari5,$fieldhari6 FROM $userid WHERE $fieldhari1!=0 OR $fieldhari2!=0 OR $fieldhari3!=0 OR $fieldhari4!=0 OR $fieldhari5!=0 OR $fieldhari6!=0 ORDER BY norekgssl");
?>