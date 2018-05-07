<?php
include '../h_atas.php';
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$pilih=$result->c_d($_GET['p']);
$branch=$result->c_d($_GET['branch']);
$fieldhari2='bulandk'.substr('00'.$bln,-2);
$fieldhari3='bulankk'.substr('00'.$bln,-2);
$fieldhari4='bulandm'.substr('00'.$bln,-2);
$fieldhari5='bulankm'.substr('00'.$bln,-2);
$fieldhari6='bulan'.substr('00'.$bln,-2);
$blnl=$bln-1;$thnl=$thn;
$fieldhari1='bulan'.substr('00'.$blnl,-2);
if($branch=='0111'){
	if($bln=='01'){
		$thnl=$thn-1;
		$fieldhari1='tahun12a';
		$tabeln='akuntansi.sandi'.$thnl;
		$result->res("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.nonas,a.norekgssl,SUM(b.$fieldhari1) AS $fieldhari1,SUM(a.$fieldhari2) AS $fieldhari2,SUM(a.$fieldhari3) AS $fieldhari3,SUM(a.$fieldhari4) AS $fieldhari4,SUM(a.$fieldhari5) AS $fieldhari5,SUM(a.$fieldhari6) AS $fieldhari6 FROM $tabel_sandi a JOIN $tabeln b ON a.norekgssl=b.norekgssl GROUP BY a.nonas ORDER BY a.nonas");
		$hasil=$result->query_x1("SELECT a.uraian,a.sandi,b.$fieldhari1,b.$fieldhari2,b.$fieldhari3,b.$fieldhari4,b.$fieldhari5,b.$fieldhari6,b.$fieldhari6-b.$fieldhari1 AS naik,(b.$fieldhari6-b.$fieldhari1)/b.$fieldhari6*100 AS turun FROM $tabel a JOIN $userid b ON a.sandi=b.nonas ORDER BY b.nonas");
	}else{
		if($thn!=$thnxxx){
			if($bln=='01'){
				$thnl=$thn-1;
				$fieldhari1='tahun12a';
				$tabeln='akuntansi.sandi'.$thnl;
				$tabel_sandi='akuntansi.sandi'.$thn;
				$result->res("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.nonas,a.norekgssl,SUM(b.$fieldhari1) AS $fieldhari1,SUM(a.$fieldhari2) AS $fieldhari2,SUM(a.$fieldhari3) AS $fieldhari3,SUM(a.$fieldhari4) AS $fieldhari4,SUM(a.$fieldhari5) AS $fieldhari5,SUM(a.$fieldhari6) AS $fieldhari6 FROM $tabel_sandi a JOIN $tabeln b ON a.norekgssl=b.norekgssl GROUP BY a.nonas ORDER BY a.nonas");
				$hasil=$result->query_x1("SELECT a.uraian,a.sandi,b.$fieldhari1,b.$fieldhari2,b.$fieldhari3,b.$fieldhari4,b.$fieldhari5,b.$fieldhari6,b.$fieldhari6-b.$fieldhari1 AS naik,(b.$fieldhari6-b.$fieldhari1)/b.$fieldhari6*100 AS turun FROM $tabel a JOIN $userid b ON a.sandi=b.nonas ORDER BY b.nonas");
			}else{
				$tabel_sandi='akuntansi.sandi'.$thn;
				if($bln!=$blnl){
					$fieldhari1='bulan'.substr('00'.$blnl,-2);
				}
				$hasil=$result->query_x1("SELECT a.uraian,a.sandi,SUM(b.$fieldhari1) AS $fieldhari1,SUM(b.$fieldhari2) AS $fieldhari2,SUM(b.$fieldhari3) AS $fieldhari3,SUM(b.$fieldhari4) AS $fieldhari4,SUM(b.$fieldhari5) AS $fieldhari5,SUM(b.$fieldhari6) AS $fieldhari6,SUM(b.$fieldhari6-b.$fieldhari1) AS naik,SUM((b.$fieldhari6-b.$fieldhari1)/b.$fieldhari6*100) AS turun FROM $tabel a JOIN $tabel_sandi b ON a.sandi=b.nonas GROUP BY b.nonas ORDER BY b.nonas");
			}
		}else{
			if($bln!=$blnl){
				$fieldhari1='bulan'.substr('00'.$blnl,-2);
			}
				$hasil=$result->query_x1("SELECT a.uraian,a.sandi,SUM(b.$fieldhari1) AS $fieldhari1,SUM(b.$fieldhari2) AS $fieldhari2,SUM(b.$fieldhari3) AS $fieldhari3,SUM(b.$fieldhari4) AS $fieldhari4,SUM(b.$fieldhari5) AS $fieldhari5,SUM(b.$fieldhari6) AS $fieldhari6,SUM(b.$fieldhari6-b.$fieldhari1) AS naik,SUM((b.$fieldhari6-b.$fieldhari1)/b.$fieldhari6*100) AS turun FROM $tabel a JOIN $tabel_sandi b ON a.sandi=b.nonas GROUP BY b.nonas ORDER BY b.nonas");
		}
	}		
}else{
	if($bln=='01'){
		$thnl=$thn-1;
		$fieldhari1='tahun12a';
		$tabeln='akuntansi.sandi'.$thnl;
		$result->res("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.nonas,a.norekgssl,b.$fieldhari1,a.$fieldhari2,a.$fieldhari3,a.$fieldhari4,a.$fieldhari5,a.$fieldhari6 FROM $tabel_sandi a JOIN $tabeln b ON a.norekgssl=b.norekgssl WHERE a.branch='$branch' ORDER BY a.norekgssl");
		$hasil=$result->query_x1("SELECT a.uraian,a.sandi,b.$fieldhari1,b.$fieldhari2,b.$fieldhari3,b.$fieldhari4,b.$fieldhari5,b.$fieldhari6,b.$fieldhari6-b.$fieldhari1 AS naik,(b.$fieldhari6-b.$fieldhari1)/b.$fieldhari6*100 AS turun FROM $tabel a JOIN $userid b ON a.sandi=b.nonas ORDER BY b.nonas");
	}else{
		if($thn!=$thnxxx){
			if($bln=='01'){
				$thnl=$thn-1;
				$fieldhari1='tahun12a';
				$tabeln='akuntansi.sandi'.$thnl;
				$tabel_sandi='akuntansi.sandi'.$thn;
				$result->res("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.nonas,a.norekgssl,b.$fieldhari1,a.$fieldhari2,a.$fieldhari3,a.$fieldhari4,a.$fieldhari5,a.$fieldhari6 FROM $tabel_sandi a JOIN $tabeln b ON a.norekgssl=b.norekgssl WHERE a.branch='$branch' ORDER BY a.norekgssl");
				$hasil=$result->query_x1("SELECT a.uraian,a.sandi,b.$fieldhari1,b.$fieldhari2,b.$fieldhari3,b.$fieldhari4,b.$fieldhari5,b.$fieldhari6,b.$fieldhari6-b.$fieldhari1 AS naik,(b.$fieldhari6-b.$fieldhari1)/b.$fieldhari6*100 AS turun FROM $tabel a JOIN $userid b ON a.sandi=b.nonas ORDER BY b.nonas");
			}else{
				$tabel_sandi='akuntansi.sandi'.$thn;
				if($bln!=$blnl){
					$fieldhari1='bulan'.substr('00'.$blnl,-2);
				}
				$hasil=$result->query_x1("SELECT a.uraian,a.sandi,b.$fieldhari1,b.$fieldhari2,b.$fieldhari3,b.$fieldhari4,b.$fieldhari5,b.$fieldhari6,b.$fieldhari6-b.$fieldhari1 as naik,(b.$fieldhari6-b.$fieldhari1)/b.$fieldhari6*100 as turun FROM $tabel a JOIN $tabel_sandi b ON a.sandi=b.nonas WHERE b.branch='$branch' ORDER BY b.nonas");
			}
		}else{
			if($bln!=$blnl){
				$fieldhari1='bulan'.substr('00'.$blnl,-2);
			}
			$hasil=$result->query_x1("SELECT a.uraian,a.sandi,b.$fieldhari1,b.$fieldhari2,b.$fieldhari3,b.$fieldhari4,b.$fieldhari5,b.$fieldhari6,b.$fieldhari6-b.$fieldhari1 as naik,(b.$fieldhari6-b.$fieldhari1)/b.$fieldhari6*100 as turun FROM $tabel a JOIN $tabel_sandi b ON a.sandi=b.nonas WHERE b.branch='$branch' ORDER BY b.nonas");
		}
	}	
}
?>