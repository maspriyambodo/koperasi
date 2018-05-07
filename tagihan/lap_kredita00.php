<?php $bln=$result->c_d($_GET['bln']);$thn=$result->c_d($_GET['thn']);$branch=$result->c_d($_GET['branch']);$produk=$result->c_d($_GET['produk']);$pilih=$result->c_d($_GET['p']);$bulan=$bln.substr($thn,2,2);$tabelm= $userid.'1';$tabelr = $tabel_tagihan.$bln.substr($thn,2,2).'b';$tabelx = $tabel_tagihan.$bln.substr($thn,2,2).'s';
if($branch=='0111'){
	$result->query_x1("CREATE TEMPORARY TABLE $tabelm SELECT branch,norek,kdtran,angsurke,SUM(pokok) as pokok,SUM(bunga) as bunga,SUM(adm) AS adm,SUM(jumlah) AS jumlah,1 AS kd_tagih FROM $tabelr GROUP BY norek ORDER BY norek");
	$result->query_x1("INSERT INTO $tabelm SELECT branch,norek,kdtran,angsurke,SUM(pokok) as pokok,SUM(bunga) as bunga,SUM(adm) AS adm,SUM(jumlah) AS jumlah,2 AS kd_tagih FROM $tabelx GROUP BY norek ORDER BY norek");
}else{
	$result->query_x1("CREATE TEMPORARY TABLE $tabelm SELECT branch,norek,kdtran,angsurke,SUM(pokok) as pokok,SUM(bunga) as bunga,SUM(adm) AS adm,SUM(jumlah) AS jumlah,1 AS kd_tagih FROM $tabelr WHERE branch='$branch' GROUP BY norek ORDER BY norek");
	$result->query_x1("INSERT INTO $tabelm SELECT branch,norek,kdtran,angsurke,SUM(pokok) as pokok,SUM(bunga) as bunga,SUM(adm) AS adm,SUM(jumlah) AS jumlah,2 AS kd_tagih FROM $tabelx WHERE branch='$branch' GROUP BY norek ORDER BY norek");
}
include '../tagihan/lap_kreditxxx.php';
?>