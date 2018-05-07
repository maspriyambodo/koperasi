<?php $bln=$result->c_d($_GET['bln']);$thn=$result->c_d($_GET['thn']);$branch=$result->c_d($_GET['branch']);$produk=$result->c_d($_GET['produk']);$bulan=$bln.substr($thn,2,2);$tabelm= $userid.'1';$tabelr = $tabel_tagihan.$bln.substr($thn,2,2).'s';
if($branch=='0111'){
	$result->query_x1("CREATE TEMPORARY TABLE $tabelm SELECT branch,norek,kdtran,angsurke,SUM(pokok) as pokok,SUM(bunga) as bunga,SUM(adm) AS adm,SUM(jumlah) AS jumlah FROM $tabelr GROUP BY norek ORDER BY norek");
}else{
	$result->query_x1("CREATE TEMPORARY TABLE $tabelm SELECT branch,norek,kdtran,angsurke,SUM(pokok) as pokok,SUM(bunga) as bunga,SUM(adm) AS adm,SUM(jumlah) AS jumlah FROM $tabelr WHERE branch='$branch' GROUP BY norek ORDER BY norek");
}
if($ada==TRUE){
	if($produk=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.kdtran,a.pokok,a.bunga,a.adm,a.jumlah,a.angsurke,b.nopen,b.nodapem,b.jangka,b.kkbayar,b.nmbayar,b.kdsales,b.produk,c.nmproduk,d.nama as namas,e.nama FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales JOIN $tabel_nasabah e ON b.nonas=e.nonas ORDER BY b.produk,b.kkbayar");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.kdtran,a.pokok,a.bunga,a.adm,a.jumlah,a.angsurke,b.nopen,b.nodapem,b.jangka,b.kkbayar,b.nmbayar,b.kdsales,b.produk,c.nmproduk,d.nama as namas,e.nama FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales JOIN $tabel_nasabah e ON b.nonas=e.nonas WHERE b.produk='$produk' ORDER BY b.produk,b.kkbayar");
	}
}else{
	if($produk=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.kdtran,SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,b.nopen,b.jangka,b.kkbayar,b.nmbayar,b.kdsales,b.produk,c.nmproduk,d.nama as namas,e.nama,count(*) AS rekening FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales JOIN $tabel_nasabah e ON b.nonas=e.nonas GROUP BY b.produk,b.kkbayar ORDER BY b.produk,b.kkbayar");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.kdtran,SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,b.nopen,b.jangka,b.kkbayar,b.nmbayar,b.kdsales,b.produk,c.nmproduk,d.nama as namas,e.nama,count(*) AS rekening FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales JOIN $tabel_nasabah e ON b.nonas=e.nonas WHERE b.produk='$produk' GROUP BY b.produk,b.kkbayar ORDER BY b.produk,b.kkbayar");
	}
} ?>