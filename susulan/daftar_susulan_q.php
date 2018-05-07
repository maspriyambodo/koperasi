<?php $branch=$kcabang;$bln=$result->c_d($_GET['bln']);$thn=$result->c_d($_GET['thn']);$kkbayar =$result->c_d($_GET['kkbayar']);$cabang=nmcabang($kcabang);$tabel ='nabasa.'.$branch.$bln.substr($thn,2,2).'s';$tabelr =$userid;
if($branch=='0111'){
	if($kkbayar=='9'){
		$result->query_x1("CREATE TEMPORARY TABLE $tabelr(SELECT a.norek,SUM(a.pokok) as pokok,SUM(a.bunga) as bunga,SUM(a.adm) as adm,SUM(a.jumlah) as jumlah,count(*) as rekening,a.kdtran,b.kdbyr,b.kkbayar,b.nmbayar,b.kdsales FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek GROUP BY b.kdbyr,b.kkbayar ORDER BY b.kdbyr,b.kkbayar)");
	}else{
		$result->query_x1("CREATE TEMPORARY TABLE $tabelr(SELECT a.norek,SUM(a.pokok) as pokok,SUM(a.bunga) as bunga,SUM(a.adm) as adm,SUM(a.jumlah) as jumlah,count(*) as rekening,a.kdtran,b.kdbyr,b.kkbayar,b.nmbayar,b.kdsales FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek WHERE b.kkbayar LIKE '%$kkbayar%' GROUP BY b.kdbyr,b.kkbayar ORDER BY b.kdbyr,b.kkbayar)");
	}	
}else{
	if($kkbayar=='9'){
		$result->query_x1("CREATE TEMPORARY TABLE $tabelr(SELECT a.norek,SUM(a.pokok) as pokok,SUM(a.bunga) as bunga,SUM(a.adm) as adm,SUM(a.jumlah) as jumlah,count(*) as rekening,a.kdtran,b.kdbyr,b.kkbayar,b.nmbayar,b.kdsales FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.branch='$branch' GROUP BY b.kdbyr,b.kkbayar ORDER BY b.kdbyr,b.kkbayar)");
	}else{
		$result->query_x1("CREATE TEMPORARY TABLE $tabelr(SELECT a.norek,SUM(a.pokok) as pokok,SUM(a.bunga) as bunga,SUM(a.adm) as adm,SUM(a.jumlah) as jumlah,count(*) as rekening,a.kdtran,b.kdbyr,b.kkbayar,b.nmbayar,b.kdsales FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek WHERE b.kkbayar LIKE '%$kkbayar%' AND a.branch='$branch' GROUP BY b.kdbyr,b.kkbayar ORDER BY b.kdbyr,b.kkbayar)");
	}
}
$hasil=$result->query_lap("SELECT a.kdsales,a.kdtran,a.kdbyr,a.kkbayar,a.nmbayar,a.pokok,a.bunga,a.adm,a.jumlah,a.rekening,b.nmkb FROM $tabelr a JOIN wkb b ON a.kdbyr=b.kd ORDER BY a.kdbyr,kkbayar"); ?>