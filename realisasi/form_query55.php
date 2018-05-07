<?php $bln=$result->c_d($_GET['bln']);$thn=$result->c_d($_GET['thn']);$branch=$result->c_d($_GET['branch']);$produk=$result->c_d($_GET['produk']);$bulan=$bln.$thn;$tabel=$tabel_tagihan.$bln.substr($thn,2,2).'b';
if($branch=='0111'){
	if($produk=='9'){
		$hasil=$result->query_x1("SELECT SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,SUM(b.saldoa) AS saldoa,a.alasan_tt,a.solusi_tt,b.kkbayar,b.nmbayar,b.produk,c.nmproduk,a.nama,count(*) AS rekening FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE a.kdtran=333 GROUP BY b.kkbayar,a.alasan_tt,a.solusi_tt ORDER BY b.kkbayar,a.alasan_tt,a.solusi_tt");
	}else{
		$hasil=$result->query_x1("SELECT SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,SUM(b.saldoa) AS saldoa,a.alasan_tt,a.solusi_tt,b.kkbayar,b.nmbayar,b.produk,c.nmproduk,a.nama,count(*) AS rekening FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE a.kdtran=333 AND b.produk='$produk' GROUP BY b.kkbayar,a.alasan_tt,a.solusi_tt ORDER BY b.kkbayar,a.alasan_tt,a.solusi_tt");
	}	
}else{
	if($produk=='9'){
		$hasil=$result->query_x1("SELECT SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,SUM(b.saldoa) AS saldoa,a.alasan_tt,a.solusi_tt,b.kkbayar,b.nmbayar,b.produk,c.nmproduk,a.nama,count(*) AS rekening FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE a.kdtran=333 AND a.branch='$branch' GROUP BY b.kkbayar,a.alasan_tt,a.solusi_tt ORDER BY b.kkbayar,a.alasan_tt,a.solusi_tt");
	}else{
		$hasil=$result->query_x1("SELECT SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,SUM(b.saldoa) AS saldoa,a.alasan_tt,a.solusi_tt,b.kkbayar,b.nmbayar,b.produk,c.nmproduk,a.nama,count(*) AS rekening FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE a.kdtran=333 AND b.produk='$produk' AND a.branch='$branch' GROUP BY b.kkbayar,a.alasan_tt,a.solusi_tt ORDER BY b.kkbayar,a.alasan_tt,a.solusi_tt");
	}
}
?>