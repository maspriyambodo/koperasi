<?php $bln=$result->c_d($_GET['bln']);$thn=$result->c_d($_GET['thn']);$tabeln="nabasa.tran".$bln.substr($thn,2,2);$bulan=$bln.substr($thn,2,2);$branch=$result->c_d($_GET['branch']);$produk=$result->c_d($_GET['produk']);$pilih=$result->c_d($_GET['p']);$tabelm= $userid.'1';$tabelr = $tabel_tagihan.$bln.substr($thn,2,2).'b';$tabelx = $tabel_tagihan.$bln.substr($thn,2,2).'m';$where='WHERE kdtran=333';$where1='WHERE branch='.$branch.' AND kdtran=333';include '../rpt_tagihanxx.php';
if($ada==TRUE){
	if($produk=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,a.kdtran,a.pokok,a.bunga,a.adm,a.jumlah,e.pokok1,e.bunga1,e.adm1,e.jumlah1,(IFNULL(a.pokok,0)-IFNULL(e.pokok1,0)) AS pokok2,(IFNULL(a.bunga,0)-IFNULL(e.bunga1,0)) AS bunga2,(IFNULL(a.adm,0)-IFNULL(e.adm1,0)) AS adm2,(IFNULL(a.jumlah,0)-IFNULL(e.jumlah1,0)) AS jumlah2,a.angsurke,b.nopen,b.nodapem,b.jangka,b.kkbayar,b.nmbayar,b.kdsales,b.produk,c.nmproduk,d.nama as namas FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales LEFT JOIN $userid e ON a.norek=e.norek ORDER BY b.produk,b.kkbayar");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,a.kdtran,a.pokok,a.bunga,a.adm,a.jumlah,e.pokok1,e.bunga1,e.adm1,e.jumlah1,(IFNULL(a.pokok,0)-IFNULL(e.pokok1,0)) AS pokok2,(IFNULL(a.bunga,0)-IFNULL(e.bunga1,0)) AS bunga2,(IFNULL(a.adm,0)-IFNULL(e.adm1,0)) AS adm2,(IFNULL(a.jumlah,0)-IFNULL(e.jumlah1,0)) AS jumlah2,a.angsurke,b.nopen,b.nodapem,b.jangka,b.kkbayar,b.nmbayar,b.kdsales,b.produk,c.nmproduk,d.nama as namas FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales LEFT JOIN $userid e ON a.norek=e.norek WHERE b.produk='$produk' ORDER BY b.produk,b.kkbayar");
	}
}else{
	if($produk=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.kdtran,SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,SUM(e.pokok1) AS pokok1,SUM(e.bunga1) AS bunga1,SUM(e.adm1) AS adm1,SUM(e.jumlah1) AS jumlah1,SUM(IFNULL(a.pokok,0)-IFNULL(e.pokok1,0)) AS pokok2,SUM(IFNULL(a.bunga,0)-IFNULL(e.bunga1,0)) AS bunga2,SUM(IFNULL(a.adm,0)-IFNULL(e.adm1,0)) AS adm2,SUM(IFNULL(a.jumlah,0)-IFNULL(e.jumlah1,0)) AS jumlah2,count(*) AS rekening,b.nopen,b.jangka,b.kkbayar,b.nmbayar,b.kdsales,b.produk,c.nmproduk,d.nama as namas FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales LEFT JOIN $userid e ON a.norek=e.norek GROUP BY b.produk,b.kkbayar ORDER BY b.produk,b.kkbayar");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.kdtran,SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,SUM(e.pokok1) AS pokok1,SUM(e.bunga1) AS bunga1,SUM(e.adm1) AS adm1,SUM(e.jumlah1) AS jumlah1,SUM(IFNULL(a.pokok,0)-IFNULL(e.pokok1,0)) AS pokok2,SUM(IFNULL(a.bunga,0)-IFNULL(e.bunga1,0)) AS bunga2,SUM(IFNULL(a.adm,0)-IFNULL(e.adm1,0)) AS adm2,SUM(IFNULL(a.jumlah,0)-IFNULL(e.jumlah1,0)) AS jumlah2,count(*) AS rekening,b.nopen,b.jangka,b.kkbayar,b.nmbayar,b.kdsales,b.produk,c.nmproduk,d.nama as namas FROM $tabelm a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales LEFT JOIN $userid e ON a.norek=e.norek WHERE b.produk='$produk' GROUP BY b.produk,b.kkbayar ORDER BY b.produk,b.kkbayar");
	}
}
?>