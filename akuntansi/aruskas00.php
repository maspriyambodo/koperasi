<?php
include '../h_atas.php';
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$pilih=$result->c_d($_GET['p']);
$branch=$result->c_d($_GET['branch']);
$namafile='akuntansi.aruskas'.$thn;
$blnxx=400;
$naikx='jumlah'.$bln;
$naikxx=nmbulan($bln).' '.$thn;
$blnx=$bln;
$blnx--;
if($blnx==0){
	$blnxx=100;
}else{
	$naiky='jumlah'.substr('00'.$blnx,-2);
	$naikyy=nmbulan($blnx).' '.$thn;
	$blnx--;
	if($blnx==0){
		$blnxx=200;
	}else{
		$naikz='jumlah'.substr('00'.$blnx,-2);
		$naikzz=nmbulan($blnx).' '.$thn;
		$blnx--;
		if($blnx==0){
			$blnxx=300;
		}else{
			$naika='jumlah'.substr('00'.$blnx,-2);
			$naikaa=nmbulan($blnx).' '.$thn;
		}
	}
}
$fieldhari2='bulandk'.substr('00'.$bln,-2);
$fieldhari3='bulankk'.substr('00'.$bln,-2);
$fieldhari4='bulandm'.substr('00'.$bln,-2);
$fieldhari5='bulankm'.substr('00'.$bln,-2);
$fieldhari6='bulan'.substr('00'.$bln,-2);
$blnl=$bln-1;
$thnl=$thn;
if($blnl<1){
	$blnl=12;
	$thnl=$thn-1;
}
$fieldhari1='bulan'.substr('00'.$blnl,-2);
if($branch=='0111'){
	if($bln=='01'){
		$thnl=$thn-1;
		$fieldhari1='tahun12a';
		$tabeln='akuntansi.sandi'.$thnl;
		$result->res("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.nonas,a.norekgssl,SUM(a.$fieldhari6) AS $fieldhari6,SUM(b.$fieldhari1) AS $fieldhari1,SUM(a.$fieldhari1-b.$fieldhari6) AS naik FROM $tabel_sandi a JOIN $tabeln b ON a.norekgssl=b.norekgssl GROUP BY a.nonas ORDER BY a.nonas");
	}else{
		if($thn!=$thnxxx){
			if($bln=='01'){
				$thnl=$thn-1;
				$fieldhari1='tahun12a';
				$tabeln='akuntansi.sandi'.$thnl;
				$tabel_sandi='akuntansi.sandi'.$thn;
				$result->res("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.nonas,a.norekgssl,SUM(a.$fieldhari6) AS $fieldhari6,SUM(b.$fieldhari1) AS $fieldhari1,SUM(a.$fieldhari1-b.$fieldhari6) AS naik FROM $tabel_sandi a JOIN $tabeln b ON a.norekgssl=b.norekgssl GROUP BY a.nonas ORDER BY a.nonas");
			}else{
				$tabel_sandi='akuntansi.sandi'.$thn;
				$result->res("CREATE TEMPORARY TABLE $userid SELECT branch,nonas,norekgssl,SUM($fieldhari6) AS $fieldhari6,SUM($fieldhari1) AS $fieldhari1,SUM($fieldhari1-$fieldhari6) AS naik FROM $tabel_sandi GROUP BY nonas ORDER BY nonas");
			}
		}else{
			$result->res("CREATE TEMPORARY TABLE $userid SELECT branch,nonas,norekgssl,SUM($fieldhari6) AS $fieldhari6,SUM($fieldhari1) AS $fieldhari1,SUM($fieldhari1-$fieldhari6) AS naik FROM $tabel_sandi GROUP BY nonas ORDER BY nonas");
		}
	}
}else{
	if($bln=='01'){
		$thnl=$thn-1;
		$fieldhari1='tahun12a';
		$tabeln='akuntansi.sandi'.$thnl;
		$result->res("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.nonas,a.norekgssl,a.$fieldhari6,b.$fieldhari1,a.$fieldhari6-b.$fieldhari1 as naik FROM $tabel_sandi a JOIN $tabeln b ON a.norekgssl=b.norekgssl WHERE a.branch='$branch' ORDER BY a.norekgssl");
	}else{
		if($thn!=$thnxxx){
			if($bln=='01'){
				$thnl=$thn-1;
				$fieldhari1='tahun12a';
				$tabeln='akuntansi.sandi'.$thnl;
				$tabel_sandi='akuntansi.sandi'.$thn;
				$result->res("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.nonas,a.norekgssl,a.$fieldhari6,b.$fieldhari1,a.$fieldhari6-b.$fieldhari1 as naik FROM $tabel_sandi a JOIN $tabeln b ON a.norekgssl=b.norekgssl WHERE a.branch='$branch' ORDER BY a.norekgssl");
			}else{
				$tabel_sandi='akuntansi.sandi'.$thn;
				$result->res("CREATE TEMPORARY TABLE $userid SELECT branch,nonas,norekgssl,$fieldhari6,$fieldhari1,$fieldhari6-$fieldhari1 as naik FROM $tabel_sandi WHERE branch='$branch' ORDER BY norekgssl");
			}
		}else{
			$result->res("CREATE TEMPORARY TABLE $userid SELECT branch,nonas,norekgssl,$fieldhari6,$fieldhari1,$fieldhari6-$fieldhari1 as naik FROM $tabel_sandi WHERE branch='$branch' ORDER BY norekgssl");
		}
	}	
}
$tabel=$userid.'0';
$result->res("CREATE TEMPORARY TABLE $tabel SELECT a.id,a.kd03,a.kd02,a.urut,b.nonas,SUM(IF(b.nonas>=a.kd03 AND b.nonas<=a.kd02,b.naik,0)) as naik FROM $namafile a JOIN $userid b WHERE substr(nonas,-3)='000' GROUP BY a.id");
$tabelx=$userid.'1';
$result->res("CREATE TEMPORARY TABLE $tabelx SELECT nonas,SUM(IF(nonas='450000',naik,0)) as a,SUM(IF(nonas='102000',naik,0))+SUM(IF(nonas='105000',naik,0))+SUM(IF(nonas='108000',naik,0))+SUM(IF(nonas>='111000' AND nonas<='115000',naik,0)) as aktiva,SUM(IF(nonas>='201000' AND nonas<='205000',naik,0))+SUM(IF(nonas>='211000' AND nonas<='213000',naik,0)) as pasiva,(SUM(IF(nonas='450000',naik,0))+SUM(IF(nonas='102000',naik,0))+SUM(IF(nonas='105000',naik,0))+SUM(IF(nonas>='108000' AND nonas<='113000',naik,0)))-(SUM(IF(nonas>='201000' AND nonas<='204000',naik,0))+SUM(IF(nonas>='211000' AND nonas<='213000',naik,0))) as c,SUM(IF(nonas='109000',naik,0))+SUM(IF(nonas='110000',naik,0)) as g,SUM(IF(nonas='101000',$fieldhari1,0)) as e,SUM(IF(nonas='214000',naik,0))+SUM(IF(nonas='215000',naik,0))+SUM(IF(nonas='216000',naik,0)) as h FROM $userid WHERE substr(nonas,-3)='000'");
$hasil=$result->query_x1("SELECT nonas,a,aktiva,pasiva,g,e,h FROM $tabelx");
$row = $result->row($hasil);
$a=$row['a'];
$b=$row['aktiva']-$row['pasiva'];
$e=$row['e'];
$g=$row['g'];
$h=$row['h'];
$d=$row['a']-$b-$g+$h;
$f=$e+$d;
$result->res("UPDATE $namafile a LEFT JOIN $tabel b ON a.id=b.id SET a.$naikx=b.naik");
$result->res("UPDATE $namafile SET $naikx=$a WHERE sandi='A' LIMIT 1");
$result->res("UPDATE $namafile SET $naikx=$b WHERE sandi='B' LIMIT 1");
$result->res("UPDATE $namafile SET $naikx=$d WHERE sandi='D' LIMIT 1");
$result->res("UPDATE $namafile SET $naikx=$e WHERE sandi='E' LIMIT 1");
$result->res("UPDATE $namafile SET $naikx=$f WHERE sandi='F' LIMIT 1");
$result->res("UPDATE $namafile SET $naikx=$g WHERE sandi='G' LIMIT 1");
$result->res("UPDATE $namafile SET $naikx=$h WHERE sandi='H' LIMIT 1");
?>