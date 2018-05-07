<?php 
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$branch =$result->c_d($_GET['branch']);
$produk = $result->c_d($_GET['kdsales']);
$bulan=$bln.$thn;
$tabel=$tabel_tagihan.$bln.substr($thn,2,2).'m';
$tabelr= $tabel_transaksi.$bln.substr($thn,2,2);
$tabelm= $userid.'1';
if($branch=='0111'){
	$tabeln= $userid.'2';
	$result->query_x1("CREATE TEMPORARY TABLE $tabeln SELECT branch,norek,nama,kdtran,alasan_tt,solusi_tt,SUM(pokok) AS pokok,SUM(bunga) AS bunga,SUM(adm) AS adm,SUM(pokok+bunga+adm) AS jumlah FROM $tabel GROUP BY norek ORDER BY norek");
	$tabels= $userid.'3';
	$result->query_x1("CREATE TEMPORARY TABLE $tabels SELECT norek,SUM(IF(kdkredit=10,jumlah,0)) AS pokokm,SUM(IF(kdkredit=10,jumlah,0)) AS bungam,SUM(IF(kdkredit=30,jumlah,0)) AS admm FROM $tabelr WHERE substr(jtransaksi,1,1)=3 GROUP BY norek ORDER BY norek");
}else{
	$tabeln= $userid.'2';
	$result->query_x1("CREATE TEMPORARY TABLE $tabeln SELECT branch,norek,nama,kdtran,alasan_tt,solusi_tt,SUM(pokok) AS pokok,SUM(bunga) AS bunga,SUM(adm) AS adm,SUM(pokok+bunga+adm) AS jumlah FROM $tabel WHERE branch='$branch' GROUP BY norek ORDER BY norek");
	$tabels= $userid.'3';
	$result->query_x1("CREATE TEMPORARY TABLE $tabels SELECT norek,SUM(IF(kdkredit=10,jumlah,0)) AS pokokm,SUM(IF(kdkredit=10,jumlah,0)) AS bungam,SUM(IF(kdkredit=30,jumlah,0)) AS admm FROM $tabelr WHERE substr(jtransaksi,1,1)=3 AND branch='$branch' GROUP BY norek ORDER BY norek");
}
$result->query_x1("CREATE TEMPORARY TABLE $tabelm SELECT a.branch,a.norek,a.nama,a.kdtran,a.alasan_tt,a.solusi_tt,SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,IF(IFNULL(b.pokokm,0)+IFNULL(b.bungam,0)+IFNULL(b.admm,0)>0,1,0) AS jum FROM $tabeln a LEFT JOIN $tabels b ON a.norek=b.norek ORDER BY a.norek");
if($ada==TRUE){
	if($produk=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,a.pokok,a.bunga,a.adm,a.jumlah,a.alasan_tt,a.solusi_tt,b.kkbayar,b.nmbayar,b.kdbyr,b.produk,b.kdsales,c.nama as namas,d.nmproduk FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_sales c ON b.kdsales=c.idsales JOIN $tabel_produk d ON b.produk=d.kdproduk WHERE a.jum!=1 ORDER BY a.norek,b.produk,a.alasan_tt");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,a.pokok,a.bunga,a.adm,a.jumlah,a.alasan_tt,a.solusi_tt,b.kkbayar,b.nmbayar,b.kdbyr,b.produk,b.kdsales,c.nama as namas,d.nmproduk FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_sales c ON b.kdsales=c.idsales JOIN $tabel_produk d ON b.produk=d.kdproduk WHERE a.jum!=1 AND produk='$produk' ORDER BY a.norek,b.produk,a.alasan_tt");
	}
}else{
	if($produk=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,sum(a.pokok) as pokok,sum(a.bunga) as bunga,sum(a.adm) as adm,sum(a.jumlah) as jumlah,count(*) as rekening,a.alasan_tt,a.solusi_tt,b.kkbayar,b.nmbayar,b.kdbyr,b.produk,b.kdsales,c.nama as namas,d.nmproduk FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_sales c ON b.kdsales=c.idsales JOIN $tabel_produk d ON b.produk=d.kdproduk WHERE a.jum!=1 GROUP BY b.produk,a.alasan_tt,b.kkbayar,b.kdsales ORDER BY b.produk,a.alasan_tt,b.kdsales");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,sum(a.pokok) as pokok,sum(a.bunga) as bunga,sum(a.adm) as adm,sum(a.jumlah) as jumlah,count(*) as rekening,a.alasan_tt,a.solusi_tt,b.kkbayar,b.nmbayar,b.kdbyr,b.produk,b.kdsales,c.nama as namas,d.nmproduk FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_sales c ON b.kdsales=c.idsales JOIN $tabel_produk d ON b.produk=d.kdproduk WHERE a.jum!=1 AND produk='$produk' GROUP BY b.produk,a.alasan_tt,b.kdsales ORDER BY b.produk,a.alasan_tt,b.kdsales");
	}
}
?>