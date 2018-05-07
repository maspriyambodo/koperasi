<?php 
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$kkbayar=$result->c_d($_GET['kkbayar']);
$pilih=$result->c_d($_GET['p']);
$bulan=$bln.substr($thn,2,2);
$branch=$kcabang;
$tabelm= $userid.'1';
$tabelr = $tabel_tagihan.$bln.substr($thn,2,2).'b';
$tabelx = $tabel_tagihan.$bln.substr($thn,2,2).'s';
if($branch=='0111'){
	$result->query_x1("CREATE TEMPORARY TABLE $tabelm SELECT branch,norek,kdtran,angsurke,SUM(pokok) as pokok,SUM(bunga) as bunga,SUM(adm) AS adm,SUM(jumlah) AS jumlah,1 AS kd_tagih FROM $tabelr GROUP BY norek ORDER BY norek");
	$result->query_x1("INSERT INTO $tabelm SELECT branch,norek,kdtran,angsurke,SUM(pokok) as pokok,SUM(bunga) as bunga,SUM(adm) AS adm,SUM(jumlah) AS jumlah,2 AS kd_tagih FROM $tabelx GROUP BY norek ORDER BY norek");
}else{
	$result->query_x1("CREATE TEMPORARY TABLE $tabelm SELECT branch,norek,kdtran,angsurke,SUM(pokok) as pokok,SUM(bunga) as bunga,SUM(adm) AS adm,SUM(jumlah) AS jumlah,1 AS kd_tagih FROM $tabelr WHERE branch='$branch' GROUP BY norek ORDER BY norek");
	$result->query_x1("INSERT INTO $tabelm SELECT branch,norek,kdtran,angsurke,SUM(pokok) as pokok,SUM(bunga) as bunga,SUM(adm) AS adm,SUM(jumlah) AS jumlah,2 AS kd_tagih FROM $tabelx WHERE branch='$branch' GROUP BY norek ORDER BY norek");
}
$tabels= $userid.'2';
$result->query_x1("CREATE TEMPORARY TABLE $tabels SELECT a.branch,a.norek,a.kdtran,SUM(IF(a.kd_tagih=1,a.pokok,0)) AS pokok,SUM(IF(a.kd_tagih=1,a.bunga,0)) AS bunga,SUM(IF(a.kd_tagih=1,a.adm,0)) AS adm,SUM(IF(a.kd_tagih=1,a.jumlah,0)) AS jumlah,SUM(IF(a.kd_tagih=2,a.pokok,0)) AS pokok1,SUM(IF(a.kd_tagih=2,a.bunga,0)) AS bunga1,SUM(IF(a.kd_tagih=2,a.adm,0)) AS adm1,SUM(IF(a.kd_tagih=2,a.jumlah,0)) AS jumlah1,a.angsurke,b.nopen,b.nodapem,b.jangka,b.kkbayar,b.nmbayar,b.kdsales,b.produk,b.nocitra,c.nmproduk,d.nama as namas,e.nama FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales JOIN $tabel_nasabah e ON b.nonas=e.nonas GROUP BY a.norek ORDER BY a.norek");
if($ada==TRUE){
	if($kkbayar=='9'){
		$hasil=$result->query_lap("SELECT branch,norek,kdtran,pokok,bunga,adm,jumlah,pokok1,bunga1,adm1,jumlah1,pokok+pokok1 AS pokok2,bunga+bunga1 AS bunga2,adm+adm1 AS adm2,jumlah+jumlah1 AS jumlah2,angsurke,nopen,nocitra,nodapem,jangka,kkbayar,nmbayar,kdsales,produk,nmproduk,namas,nama FROM $tabels ORDER BY produk,kkbayar");
	}else{
		$hasil=$result->query_lap("SELECT branch,norek,kdtran,pokok,bunga,adm,jumlah,pokok1,bunga1,adm1,jumlah1,pokok+pokok1 AS pokok2,bunga+bunga1 AS bunga2,adm+adm1 AS adm2,jumlah+jumlah1 AS jumlah2,angsurke,nopen,nocitra,nodapem,jangka,kkbayar,nmbayar,kdsales,produk,nmproduk,namas,nama FROM $tabels WHERE kkbayar='$kkbayar' ORDER BY produk,kkbayar");
	}
}else{
	if($kkbayar=='9'){
		$hasil=$result->query_lap("SELECT branch,norek,kdtran,SUM(pokok) AS pokok,SUM(bunga) AS bunga,SUM(adm) AS adm,SUM(jumlah) AS jumlah,SUM(pokok1) AS pokok1,SUM(bunga1) AS bunga1,SUM(adm1) AS adm1,SUM(jumlah1) AS jumlah1,SUM(pokok+pokok1) AS pokok2,SUM(bunga+bunga1) AS bunga2,SUM(adm+adm1) AS adm2,SUM(jumlah+jumlah1) AS jumlah2,nopen,jangka,kkbayar,nmbayar,kdsales,produk,nmproduk,namas,nama,count(*) AS rekening FROM $tabels GROUP BY produk,kkbayar ORDER BY produk,kkbayar");
	}else{
		$hasil=$result->query_lap("SELECT branch,norek,kdtran,SUM(pokok) AS pokok,SUM(bunga) AS bunga,SUM(adm) AS adm,SUM(jumlah) AS jumlah,SUM(pokok1) AS pokok1,SUM(bunga1) AS bunga1,SUM(adm1) AS adm1,SUM(jumlah1) AS jumlah1,SUM(pokok+pokok1) AS pokok2,SUM(bunga+bunga1) AS bunga2,SUM(adm+adm1) AS adm2,SUM(jumlah+jumlah1) AS jumlah2,nopen,jangka,kkbayar,nmbayar,kdsales,produk,nmproduk,namas,nama,count(*) AS rekening FROM $tabels WHERE kkbayar='$kkbayar' GROUP BY produk,kkbayar ORDER BY produk,kkbayar");
	}
}
?>