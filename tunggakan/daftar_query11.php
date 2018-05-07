<?php 
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$branch =$result->c_d($_GET['branch']);
$produk = $result->c_d($_GET['kdsales']);
$pilih=$result->c_d($_GET['p']);
$tglakhir=tglAkhirBulan($thn,intval($bln));
$m =$thn.'-'.$bln.'-'.$tglakhir;
if($branch=='0111'){
	$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT branch,norek,nama,SUM(if(kdtran=111,pokok,0))-SUM(if(kdtran=777,pokok,0)) as pokok,SUM(if(kdtran=111,bunga,0))-SUM(if(kdtran=777,bunga,0)) as bunga,SUM(if(kdtran=111,adm,0))-SUM(if(kdtran=777,adm,0)) as adm,(SUM(if(kdtran=111,pokok,0))-SUM(if(kdtran=777,pokok,0))+SUM(if(kdtran=111,bunga,0))-SUM(if(kdtran=777,bunga,0))+SUM(if(kdtran=111,adm,0))-SUM(if(kdtran=777,adm,0))) AS jumlah,tanggal,angsurke,bulan FROM payment WHERE tanggal<='$m' GROUP BY norek,angsurke ORDER BY norek,angsurke");
}else{
	$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT branch,norek,nama,SUM(if(kdtran=111,pokok,0))-SUM(if(kdtran=777,pokok,0)) as pokok,SUM(if(kdtran=111,bunga,0))-SUM(if(kdtran=777,bunga,0)) as bunga,SUM(if(kdtran=111,adm,0))-SUM(if(kdtran=777,adm,0)) as adm,(SUM(if(kdtran=111,pokok,0))-SUM(if(kdtran=777,pokok,0))+SUM(if(kdtran=111,bunga,0))-SUM(if(kdtran=777,bunga,0))+SUM(if(kdtran=111,adm,0))-SUM(if(kdtran=777,adm,0))) AS jumlah,tanggal,angsurke,bulan FROM payment a WHERE tanggal<='$m' AND branch='$branch' GROUP BY norek,angsurke ORDER BY norek,angsurke");
}
if($ada==TRUE){
	if($produk==9){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,SUM(a.pokok) as pokok,SUM(a.bunga) as bunga,SUM(a.adm) as adm,SUM(a.jumlah) as jumlah,count(*) as rekening,b.nopen,b.kkbayar,b.nmbayar,b.jangka,b.produk,b.saldoa,b.nomi,b.kolek,b.ketkolek,b.tgtran FROM $userid a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.jumlah>0 AND b.saldoa>0 AND b.ketnas=0 GROUP BY b.produk,b.kkbayar,a.norek ORDER BY b.produk,b.kkbayar,a.norek");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,SUM(a.pokok) as pokok,SUM(a.bunga) as bunga,SUM(a.adm) as adm,SUM(a.jumlah) as jumlah,count(*) as rekening,b.nopen,b.kkbayar,b.nmbayar,b.jangka,b.produk,b.saldoa,b.nomi,b.kolek,b.ketkolek,b.tgtran FROM $userid a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.jumlah>0 AND b.saldoa>0 AND b.produk='$produk' AND b.ketnas=0 GROUP BY b.produk,b.kkbayar,a.norek ORDER BY b.produk,b.kkbayar,a.norek");
	}
}else{
	$tabeln=$userid.'d';
	$result->query_x1("CREATE TEMPORARY TABLE $tabeln SELECT norek,SUM(pokok) as pokok,SUM(bunga) as bunga,SUM(adm) as adm,SUM(jumlah) as jumlah,count(*) as rekening FROM $userid WHERE jumlah>0 GROUP BY norek ORDER BY norek");
	if($produk==9){
		$hasil=$result->query_lap("SELECT SUM(a.pokok) as pokok,SUM(a.bunga) as bunga,SUM(a.adm) as adm,SUM(a.jumlah) as jumlah,count(*) as rekening,SUM(b.nomi) as nomi,SUM(b.saldoa) as saldoa,b.produk,b.kkbayar,b.nmbayar FROM $tabeln a JOIN $tabel_kredit b ON a.norek=b.norek WHERE b.saldoa>0 AND b.ketnas=0 GROUP BY b.produk,b.kkbayar ORDER BY b.produk,b.kkbayar");
	}else{
		$hasil=$result->query_lap("SELECT SUM(a.pokok) as pokok,SUM(a.bunga) as bunga,SUM(a.adm) as adm,SUM(a.jumlah) as jumlah,count(*) as rekening,SUM(b.nomi) as nomi,SUM(b.saldoa) as saldoa,b.produk,b.kkbayar,b.nmbayar FROM $tabeln a JOIN $tabel_kredit b ON a.norek=b.norek WHERE b.saldoa>0 AND b.produk='$produk' AND b.ketnas=0 GROUP BY b.produk,b.kkbayar ORDER BY b.produk,b.kkbayar");
	}
}
?>