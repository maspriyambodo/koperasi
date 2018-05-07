<?php $bln=$result->c_d($_GET['bln']);$thn=$result->c_d($_GET['thn']);$branch=$result->c_d($_GET['branch']);$produk=$result->c_d($_GET['kdsales']);$pilih=$result->c_d($_GET['p']);$tabel=TBL_TRAN.$bln.substr($thn,-2);
if($branch=='0111'){
	$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT branch,norek,tanggal,jtransaksi,SUM(IF(kdkredit=10,jumlah,0)) AS pokok,SUM(IF(kdkredit=20,jumlah,0)) AS bunga,SUM(IF(kdkredit=30,jumlah,0)) AS adm,SUM(IF(kdkredit=40,jumlah,0)) AS denda,SUM(IF(kdkredit=50,jumlah,0)) AS finalti FROM $tabel WHERE substr(jtransaksi,1,1)=5 GROUP BY norek,jtransaksi ORDER BY norek,jtransaksi");
}else{
	$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT branch,norek,tanggal,jtransaksi,SUM(IF(kdkredit=10,jumlah,0)) AS pokok,SUM(IF(kdkredit=20,jumlah,0)) AS bunga,SUM(IF(kdkredit=30,jumlah,0)) AS adm,SUM(IF(kdkredit=40,jumlah,0)) AS denda,SUM(IF(kdkredit=50,jumlah,0)) AS finalti FROM $tabel WHERE substr(jtransaksi,1,1)=5 AND branch='$branch' GROUP BY norek,jtransaksi ORDER BY norek,jtransaksi");
}
if($ada==TRUE){
	if($produk=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.pokok,a.bunga,a.adm,a.denda,a.finalti,a.pokok+a.bunga+a.adm+a.denda+a.finalti AS jumlah,a.tanggal,a.jtransaksi,b.nopen,b.jangka,b.nmbayar,b.kdsales,b.produk,c.nmproduk,d.nama as namas,e.nama FROM $userid a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk JOIN $tabel_sales d ON b.kdsales=d.idsales JOIN $tabel_nasabah e ON b.nonas=e.nonas ORDER BY b.produk,a.norek,a.jtransaksi");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.pokok,a.bunga,a.adm,a.denda,a.finalti,a.pokok+a.bunga+a.adm+a.denda+a.finalti AS jumlah,a.tanggal,a.jtransaksi,b.nopen,b.jangka,b.nmbayar,b.kdsales,b.produk,c.nmproduk,d.nama as namas,e.nama FROM $userid a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk JOIN $tabel_sales d ON b.kdsales=d.idsales JOIN $tabel_nasabah e ON b.nonas=e.nonas WHERE b.produk='$produk' ORDER BY b.produk,a.norek,jtransaksi");
	}
}else{
	if($produk=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.denda) AS denda,SUM(a.finalti) AS finalti,SUM(a.pokok+a.bunga+a.adm+a.denda+a.finalti) AS jumlah,a.tanggal,a.jtransaksi,b.nopen,b.jangka,b.nmbayar,b.kdsales,b.produk,SUM(b.saldo) AS saldoa,SUM(b.nomi) AS nomi,c.nmproduk,d.nama as namas,e.nama,count(*) AS rekening FROM $userid a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk JOIN $tabel_sales d ON b.kdsales=d.idsales JOIN $tabel_nasabah e ON b.nonas=e.nonas GROUP BY a.jtransaksi,b.produk,b.kkbayar ORDER BY a.jtransaksi,b.produk,b.kkbayar");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.denda) AS denda,SUM(a.finalti) AS finalti,SUM(a.pokok+a.bunga+a.adm+a.denda+a.finalti) AS jumlah,a.tanggal,a.jtransaksi,b.nopen,b.jangka,b.nmbayar,b.kdsales,b.produk,SUM(b.saldo) AS saldoa,SUM(b.nomi) AS nomi,c.nmproduk,d.nama as namas,e.nama,count(*) AS rekening FROM $userid a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk JOIN $tabel_sales d ON b.kdsales=d.idsales JOIN $tabel_nasabah e ON b.nonas=e.nonas WHERE b.produk='$produk' GROUP BY a.jtransaksi,b.produk,b.kkbayar ORDER BY a.jtransaksi,b.produk,b.kkbayar");
	}
}
?>