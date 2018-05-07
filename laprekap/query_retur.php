<?php $bln=$result->c_d($_GET['bln']);$thn=$result->c_d($_GET['thn']);$thn=substr($thn,-2);$bulan=$bln.$thn;$branch=$result->c_d($_GET['branch']);$kdsales=$result->c_d($_GET['kdsales']);$pilih=$result->c_d($_GET['p']);$tabel=$tabel_transaksi.$bulan;
if($branch=='0111'){
	$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT branch,norek,oper,tanggal,SUM(IF(kdkredit=10,jumlah,0)) AS pokok,SUM(IF(kdkredit=20,jumlah,0)) AS bunga,SUM(IF(kdkredit=30,jumlah,0)) AS adm,SUM(IF(kdkredit=40,jumlah,0)) AS denda,SUM(IF(kdkredit=50,jumlah,0)) AS finalti,IF(SUBSTR(kdtran,1,1)<=2,'K','M') AS mutasi FROM $tabel  WHERE jtransaksi=80 GROUP BY norek ORDER BY norek");
}else{
	$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT branch,norek,oper,tanggal,SUM(IF(kdkredit=10,jumlah,0)) AS pokok,SUM(IF(kdkredit=20,jumlah,0)) AS bunga,SUM(IF(kdkredit=30,jumlah,0)) AS adm,SUM(IF(kdkredit=40,jumlah,0)) AS denda,SUM(IF(kdkredit=50,jumlah,0)) AS finalti,IF(SUBSTR(kdtran,1,1)<=2,'K','M') AS mutasi FROM $tabel  WHERE jtransaksi=80 AND branch='$branch' GROUP BY norek ORDER BY norek");
}
if($ada==TRUE){
	if($kdsales=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.pokok,a.bunga,a.adm,a.denda,a.finalti,a.pokok+a.bunga+a.adm+a.denda+a.finalti AS jumlah,a.mutasi,a.oper,a.tanggal,b.nopen,b.jangka,b.nmbayar,b.kdsales,b.produk,c.nmproduk,d.nama as namas,e.nama FROM $userid a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales JOIN $tabel_nasabah e ON b.nonas=e.nonas ORDER BY b.produk,b.kdsales,a.norek");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.pokok,a.bunga,a.adm,a.denda,a.finalti,a.pokok+a.bunga+a.adm+a.denda+a.finalti AS jumlah,a.mutasi,a.oper,a.tanggal,b.nopen,b.jangka,b.nmbayar,b.kdsales,b.produk,c.nmproduk,d.nama as namas,e.nama FROM $userid a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales JOIN $tabel_nasabah e ON b.nonas=e.nonas WHERE b.kdsales='$kdsales' ORDER BY b.produk,a.norek");
	}
}else{
	if($kdsales=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.denda) AS denda,SUM(a.finalti) AS finalti,SUM(a.pokok+a.bunga+a.adm+a.denda+a.finalti) AS jumlah,a.mutasi,a.oper,a.tanggal,b.nopen,b.jangka,b.nmbayar,b.kdsales,b.produk,SUM(b.saldoa) AS saldoa,SUM(b.nomi) AS nomi,c.nmproduk,d.nama as namas,e.nama,count(*) AS rekening FROM $userid a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales JOIN $tabel_nasabah e ON b.nonas=e.nonas GROUP BY b.produk,b.kkbayar ORDER BY b.produk,b.kkbayar");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.denda) AS denda,SUM(a.finalti) AS finalti,SUM(a.pokok+a.bunga+a.adm+a.denda+a.finalti) AS jumlah,a.mutasi,a.oper,a.tanggal,b.nopen,b.jangka,b.nmbayar,b.kdsales,b.produk,SUM(b.saldoa) AS saldoa,SUM(b.nomi) AS nomi,c.nmproduk,d.nama as namas,e.nama,count(*) AS rekening FROM $userid a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales JOIN $tabel_nasabah e ON b.nonas=e.nonas WHERE b.kdsales='$kdsales' GROUP BY b.produk,b.kkbayar ORDER BY b.produk,b.kkbayar");
	}
}
?>