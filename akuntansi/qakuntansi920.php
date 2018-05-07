<?php
include '../h_atas.php';
$thn=$result->c_d($_GET['thn']);
$pilih=$result->c_d($_GET['p']);
$branch=$result->c_d($_GET['branch']);
$namafile='akuntansi.aruskas'.$thn;
$fieldhari1='tahun01';
$fieldhari2='tahundk';
$fieldhari3='tahunkk';
$fieldhari4='tahundm';
$fieldhari5='tahunkm';
$fieldhari6='tahun12';
$thnl=$thn-1;
if($branch=='0111'){
	$result->res("CREATE TEMPORARY TABLE $userid SELECT branch,nonas,norekgssl,SUM($fieldhari6) AS $fieldhari6,SUM($fieldhari1) AS $fieldhari1,SUM($fieldhari6-$fieldhari1) AS naik FROM $tabel_sandi GROUP BY nonas ORDER BY nonas");
}else{
	$result->res("CREATE TEMPORARY TABLE $userid SELECT branch,nonas,norekgssl,$fieldhari6,$fieldhari1,$fieldhari6-$fieldhari1 as naik FROM $tabel_sandi WHERE branch='$branch' ORDER BY norekgssl");
}
$tabel=$userid.'0';
$result->res("CREATE TEMPORARY TABLE $tabel SELECT a.id,a.kd03,a.kd02,a.urut,b.nonas,SUM(IF(b.nonas>=a.kd03 AND b.nonas<=a.kd02,b.naik,0)) as naik FROM $namafile a JOIN $userid b WHERE substr(nonas,-3)='000' GROUP BY a.id");
$tabelx=$userid.'1';
$result->res("CREATE TEMPORARY TABLE $tabelx SELECT nonas,SUM(IF(nonas='450000',naik,0)) as a,SUM(IF(nonas='102000',naik,0))+SUM(IF(nonas='105000',naik,0))+SUM(IF(nonas='108000',naik,0))+SUM(IF(nonas>='111000' AND nonas<='115000',naik,0)) as aktiva,SUM(IF(nonas>='201000' AND nonas<='204000',naik,0))+SUM(IF(nonas>='211000' AND nonas<='213000',naik,0)) as pasiva,(SUM(IF(nonas='450000',naik,0))+SUM(IF(nonas='102000',naik,0))+SUM(IF(nonas='105000',naik,0))+SUM(IF(nonas>='108000' AND nonas<='113000',naik,0)))-(SUM(IF(nonas>='201000' AND nonas<='204000',naik,0))+SUM(IF(nonas>='211000' AND nonas<='213000',naik,0))) as c,SUM(IF(nonas='109000',naik,0))+SUM(IF(nonas='110000',naik,0)) as g,SUM(IF(nonas>='214000' AND nonas<='216000',naik,0)) AS h,SUM(IF(nonas='101000',$fieldhari1,0)) as e  FROM $userid WHERE substr(nonas,-3)='000'");
$hasil=$result->query_x1("SELECT nonas,a,aktiva,pasiva,g,h,e FROM $tabelx");
$row = $result->row($hasil);
$a=$row['a'];
$b=$row['aktiva']-$row['pasiva'];
$e=$row['e'];
$g=$row['g'];
$h=$row['h'];
$d=$row['a']-$b-$g+$h;
$f=$e+$d;
$hasil=$result->query_x1("SELECT a.uraian,a.sandi,a.kd03,a.kd02,b.naik FROM $namafile a LEFT JOIN $tabel b ON a.id=b.id");