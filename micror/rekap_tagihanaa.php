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
	$result->query_x1("CREATE TEMPORARY TABLE $tabeln SELECT branch,norek,nama,kdtran,alasan_tt,solusi_tt,SUM(pokok) AS pokok,SUM(bunga) AS bunga,SUM(adm) AS adm FROM $tabel GROUP BY norek ORDER BY norek");
}else{
	$tabeln= $userid.'2';
	$result->query_x1("CREATE TEMPORARY TABLE $tabeln SELECT branch,norek,nama,kdtran,alasan_tt,solusi_tt,SUM(pokok) AS pokok,SUM(bunga) AS bunga,SUM(adm) AS adm FROM $tabel WHERE branch='$branch' GROUP BY norek ORDER BY norek");
}
$result->query_x1("CREATE TEMPORARY TABLE $tabelm SELECT a.branch,a.norek,a.nama,a.kdtran,a.alasan_tt,a.solusi_tt,SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(IF(b.kdkredit=10,b.jumlah,0)) AS pokokm,SUM(IF(b.kdkredit=10,b.jumlah,0)) AS bungam,SUM(IF(b.kdkredit=30,b.jumlah,0)) AS admm FROM $tabeln a JOIN $tabelr b ON a.norek=b.norek WHERE substr(b.jtransaksi,1,1)=3 GROUP BY a.norek ORDER BY a.norek");
if($ada==TRUE){
	if($produk=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,a.alasan_tt,a.solusi_tt,a.kdtran,a.pokok,a.bunga,a.adm,a.pokok+a.bunga+a.adm AS jumlah,a.pokokm,a.bungam,a.admm,a.pokokm+a.bungam+a.admm AS jumlahm,b.kkbayar,b.nmbayar,b.kdbyr,b.produk,b.kdsales,c.nama as namas,d.nmproduk FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_sales c ON b.kdsales=c.idsales JOIN $tabel_produk d ON b.produk=d.kdproduk ORDER BY b.produk,b.kkbayar,a.norek");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,a.alasan_tt,a.solusi_tt,a.kdtran,a.pokok,a.bunga,a.adm,a.pokok+a.bunga+a.adm AS jumlah,a.pokokm,a.bungam,a.admm,a.pokokm+a.bungam+a.admm AS jumlahm,b.kkbayar,b.nmbayar,b.kdbyr,b.produk,b.kdsales,c.nama as namas,d.nmproduk FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_sales c ON b.kdsales=c.idsales JOIN $tabel_produk d ON b.produk=d.kdproduk WHERE produk='$produk' ORDER BY b.produk,b.kkbayar,a.norek");
	}
}else{
	if($produk=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,a.alasan_tt,a.solusi_tt,a.kdtran,SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.pokok+a.bunga+a.adm) AS jumlah,SUM(a.pokokm) AS pokokm,SUM(a.bungam) AS bungam,SUM(a.admm) AS admm,SUM(a.pokokm+a.bungam+a.admm) AS jumlahm,count(*) AS rekening,b.kkbayar,b.nmbayar,b.kdbyr,b.produk,b.kdsales,c.nama as namas,d.nmproduk FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_sales c ON b.kdsales=c.idsales JOIN $tabel_produk d ON b.produk=d.kdproduk GROUP BY b.produk,a.alasan_tt,b.kkbayar,b.kdsales ORDER BY b.produk,b.kdsales");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,a.alasan_tt,a.solusi_tt,a.kdtran,SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.pokok+a.bunga+a.adm) AS jumlah,SUM(a.pokokm) AS pokokm,SUM(a.bungam) AS bungam,SUM(a.admm) AS admm,SUM(a.pokokm+a.bungam+a.admm) AS jumlahm,count(*) AS rekening,b.kkbayar,b.nmbayar,b.kdbyr,b.produk,b.kdsales,c.nama as namas,d.nmproduk FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_sales c ON b.kdsales=c.idsales JOIN $tabel_produk d ON b.produk=d.kdproduk WHERE produk='$produk' GROUP BY b.produk,a.alasan_tt,b.kdsales ORDER BY b.produk,b.kkbayar,b.kdsales");
	}
}
?>