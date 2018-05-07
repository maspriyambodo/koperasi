<?php
include 'openharian.php';
if($branch=='0111'){
	if($thn!=$thnl){
		$blnl=12;
		$thnl=$thn-1;
		$fieldhari1='tahun12a';
		$tabeln='akuntansi.sandi'.$thnl;
		$result->res("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.nonas,a.nama,a.norekgssl,a.produk,SUM(b.$fieldhari1) AS $fieldhari1,SUM(a.$fieldhari2) AS $fieldhari2,SUM(a.$fieldhari3) AS $fieldhari3,SUM(a.$fieldhari4) AS $fieldhari4,SUM(a.$fieldhari5) AS $fieldhari5,SUM(a.$fieldhari6) AS $fieldhari6 FROM $tabel_sandi a JOIN $tabeln b ON a.norekgssl=b.norekgssl GROUP BY a.nonas ORDER BY a.nonas");
	}else{
		if($bln!=$blnl)$fieldhari1='bulan'.substr('00'.$blnl,-2);
		$result->res("CREATE TEMPORARY TABLE $userid SELECT branch,nonas,nama,norekgssl,produk,SUM($fieldhari1) AS $fieldhari1,SUM($fieldhari2) AS $fieldhari2,SUM($fieldhari3) AS $fieldhari3,SUM($fieldhari4) AS $fieldhari4,SUM($fieldhari5) AS $fieldhari5,SUM($fieldhari6) AS $fieldhari6 FROM $tabel_sandi GROUP BY nonas ORDER BY nonas");
	}
}else{
	if($thn!=$thnl){
		$blnl=12;
		$thnl=$thn-1;
		$fieldhari1='tahun12a';
		$tabeln='akuntansi.sandi'.$thnl;
		$result->res("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.nonas,a.nama,a.norekgssl,a.produk,b.$fieldhari1,a.$fieldhari2,a.$fieldhari3,a.$fieldhari4,a.$fieldhari5,a.$fieldhari6 FROM $tabel_sandi a JOIN $tabeln b ON a.norekgssl=b.norekgssl WHERE a.branch='$branch' ORDER BY a.norekgssl");
	}else{
		if($bln!=$blnl)$fieldhari1='bulan'.substr('00'.$blnl,-2);
		$result->res("CREATE TEMPORARY TABLE $userid SELECT branch,nonas,nama,norekgssl,produk,$fieldhari1,$fieldhari2,$fieldhari3,$fieldhari4,$fieldhari5,$fieldhari6 FROM $tabel_sandi WHERE branch='$branch' ORDER BY norekgssl");
	}
}
$hasil=$result->query_x1("SELECT branch,nonas,nama,norekgssl,produk,$fieldhari1,$fieldhari2,$fieldhari3,$fieldhari4,$fieldhari5,$fieldhari6 FROM $userid WHERE $fieldhari1!=0 OR $fieldhari2!=0 OR $fieldhari3!=0 OR $fieldhari4!=0 OR $fieldhari5!=0 OR $fieldhari6!=0 ORDER BY nonas");
?>