<?php $bln=$result->c_d($_GET['bln']);$thn=$result->c_d($_GET['thn']);$branch=$result->c_d($_GET['branch']);$produk=$result->c_d($_GET['produk']);$bulan=$bln.$thn;$tabel = $tabel_tagihan.$bln.substr($thn,2,2).'s';
if($ada==TRUE){
	if($branch=='0111'){
		if($produk=='9'){
			$hasil=$result->query_x1("SELECT SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,SUM(IF(a.jumlah>0,1,0)) AS rekening,SUM(IF(a.kdtran=777,a.pokok,0)) AS pokok1,SUM(IF(a.kdtran=777,a.bunga,0)) AS bunga1,SUM(IF(a.kdtran=777,a.adm,0)) AS adm1,SUM(IF(a.kdtran=777,a.jumlah,0)) AS jumlah1,SUM(IF(a.kdtran=777 AND a.jumlah>0,1,0)) AS rekening1,SUM(IF(a.kdtran=333,a.pokok,0)) AS pokok2,SUM(IF(a.kdtran=333,a.bunga,0)) AS bunga2,SUM(IF(a.kdtran=333,a.adm,0)) AS adm2,SUM(IF(a.kdtran=333,a.jumlah,0)) AS jumlah2,SUM(IF(a.kdtran=333 AND a.jumlah>0,1,0)) AS rekening2,b.kkbayar,b.nmbayar,b.produk,c.nmproduk,a.nama FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk GROUP BY b.produk,b.norek ORDER BY b.produk,b.norek");
		}else{
			$hasil=$result->query_x1("SELECT SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,SUM(IF(a.jumlah>0,1,0)) AS rekening,SUM(IF(a.kdtran=777,a.pokok,0)) AS pokok1,SUM(IF(a.kdtran=777,a.bunga,0)) AS bunga1,SUM(IF(a.kdtran=777,a.adm,0)) AS adm1,SUM(IF(a.kdtran=777,a.jumlah,0)) AS jumlah1,SUM(IF(a.kdtran=777 AND a.jumlah>0,1,0)) AS rekening1,SUM(IF(a.kdtran=333,a.pokok,0)) AS pokok2,SUM(IF(a.kdtran=333,a.bunga,0)) AS bunga2,SUM(IF(a.kdtran=333,a.adm,0)) AS adm2,SUM(IF(a.kdtran=333,a.jumlah,0)) AS jumlah2,SUM(IF(a.kdtran=333 AND a.jumlah>0,1,0)) AS rekening2,b.kkbayar,b.nmbayar,b.produk,c.nmproduk,a.nama FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE b.produk='$produk' GROUP BY b.produk,b.norek ORDER BY b.produk,b.norek");
		}
	}else{
		if($produk=='9'){
			$hasil=$result->query_x1("SELECT SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,SUM(IF(a.jumlah>0,1,0)) AS rekening,SUM(IF(a.kdtran=777,a.pokok,0)) AS pokok1,SUM(IF(a.kdtran=777,a.bunga,0)) AS bunga1,SUM(IF(a.kdtran=777,a.adm,0)) AS adm1,SUM(IF(a.kdtran=777,a.jumlah,0)) AS jumlah1,SUM(IF(a.kdtran=777 AND a.jumlah>0,1,0)) AS rekening1,SUM(IF(a.kdtran=333,a.pokok,0)) AS pokok2,SUM(IF(a.kdtran=333,a.bunga,0)) AS bunga2,SUM(IF(a.kdtran=333,a.adm,0)) AS adm2,SUM(IF(a.kdtran=333,a.jumlah,0)) AS jumlah2,SUM(IF(a.kdtran=333 AND a.jumlah>0,1,0)) AS rekening2,b.kkbayar,b.nmbayar,b.produk,c.nmproduk,a.nama FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE a.branch='$branch' GROUP BY b.produk,b.norek ORDER BY b.produk,b.norek");
		}else{
			$hasil=$result->query_x1("SELECT SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,SUM(IF(a.jumlah>0,1,0)) AS rekening,SUM(IF(a.kdtran=777,a.pokok,0)) AS pokok1,SUM(IF(a.kdtran=777,a.bunga,0)) AS bunga1,SUM(IF(a.kdtran=777,a.adm,0)) AS adm1,SUM(IF(a.kdtran=777,a.jumlah,0)) AS jumlah1,SUM(IF(a.kdtran=777 AND a.jumlah>0,1,0)) AS rekening1,SUM(IF(a.kdtran=333,a.pokok,0)) AS pokok2,SUM(IF(a.kdtran=333,a.bunga,0)) AS bunga2,SUM(IF(a.kdtran=333,a.adm,0)) AS adm2,SUM(IF(a.kdtran=333,a.jumlah,0)) AS jumlah2,SUM(IF(a.kdtran=333 AND a.jumlah>0,1,0)) AS rekening2,b.kkbayar,b.nmbayar,b.produk,c.nmproduk,a.nama FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE b.produk='$produk' AND a.branch='$branch' GROUP BY b.produk,b.norek ORDER BY b.produk,b.norek");
		}		
	}
}else{
	if($branch=='0111'){	
		if($produk=='9'){
			$hasil=$result->query_x1("SELECT SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,SUM(IF(a.jumlah>0,1,0)) AS rekening,SUM(IF(a.kdtran=777,a.pokok,0)) AS pokok1,SUM(IF(a.kdtran=777,a.bunga,0)) AS bunga1,SUM(IF(a.kdtran=777,a.adm,0)) AS adm1,SUM(IF(a.kdtran=777,a.jumlah,0)) AS jumlah1,SUM(IF(a.kdtran=777 AND a.jumlah>0,1,0)) AS rekening1,SUM(IF(a.kdtran=333,a.pokok,0)) AS pokok2,SUM(IF(a.kdtran=333,a.bunga,0)) AS bunga2,SUM(IF(a.kdtran=333,a.adm,0)) AS adm2,SUM(IF(a.kdtran=333,a.jumlah,0)) AS jumlah2,SUM(IF(a.kdtran=333 AND a.jumlah>0,1,0)) AS rekening2,b.kkbayar,b.nmbayar,b.produk,c.nmproduk FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk GROUP BY b.produk,b.kkbayar ORDER BY b.produk,b.kkbayar");
		}else{
			$hasil=$result->query_x1("SELECT SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,SUM(IF(a.jumlah>0,1,0)) AS rekening,SUM(IF(a.kdtran=777,a.pokok,0)) AS pokok1,SUM(IF(a.kdtran=777,a.bunga,0)) AS bunga1,SUM(IF(a.kdtran=777,a.adm,0)) AS adm1,SUM(IF(a.kdtran=777,a.jumlah,0)) AS jumlah1,SUM(IF(a.kdtran=777 AND a.jumlah>0,1,0)) AS rekening1,SUM(IF(a.kdtran=333,a.pokok,0)) AS pokok2,SUM(IF(a.kdtran=333,a.bunga,0)) AS bunga2,SUM(IF(a.kdtran=333,a.adm,0)) AS adm2,SUM(IF(a.kdtran=333,a.jumlah,0)) AS jumlah2,SUM(IF(a.kdtran=333 AND a.jumlah>0,1,0)) AS rekening2,b.kkbayar,b.nmbayar,b.produk,c.nmproduk FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE b.produk='$produk' GROUP BY b.produk,b.kkbayar ORDER BY b.produk,b.kkbayar");
		}
	}else{
		if($produk=='9'){
			$hasil=$result->query_x1("SELECT SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,SUM(IF(a.jumlah>0,1,0)) AS rekening,SUM(IF(a.kdtran=777,a.pokok,0)) AS pokok1,SUM(IF(a.kdtran=777,a.bunga,0)) AS bunga1,SUM(IF(a.kdtran=777,a.adm,0)) AS adm1,SUM(IF(a.kdtran=777,a.jumlah,0)) AS jumlah1,SUM(IF(a.kdtran=777 AND a.jumlah>0,1,0)) AS rekening1,SUM(IF(a.kdtran=333,a.pokok,0)) AS pokok2,SUM(IF(a.kdtran=333,a.bunga,0)) AS bunga2,SUM(IF(a.kdtran=333,a.adm,0)) AS adm2,SUM(IF(a.kdtran=333,a.jumlah,0)) AS jumlah2,SUM(IF(a.kdtran=333 AND a.jumlah>0,1,0)) AS rekening2,b.kkbayar,b.nmbayar,b.produk,c.nmproduk FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE a.branch='$branch' GROUP BY b.produk,b.kkbayar ORDER BY b.produk,b.kkbayar");
		}else{
			$hasil=$result->query_x1("SELECT SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,SUM(IF(a.jumlah>0,1,0)) AS rekening,SUM(IF(a.kdtran=777,a.pokok,0)) AS pokok1,SUM(IF(a.kdtran=777,a.bunga,0)) AS bunga1,SUM(IF(a.kdtran=777,a.adm,0)) AS adm1,SUM(IF(a.kdtran=777,a.jumlah,0)) AS jumlah1,SUM(IF(a.kdtran=777 AND a.jumlah>0,1,0)) AS rekening1,SUM(IF(a.kdtran=333,a.pokok,0)) AS pokok2,SUM(IF(a.kdtran=333,a.bunga,0)) AS bunga2,SUM(IF(a.kdtran=333,a.adm,0)) AS adm2,SUM(IF(a.kdtran=333,a.jumlah,0)) AS jumlah2,SUM(IF(a.kdtran=333 AND a.jumlah>0,1,0)) AS rekening2,b.kkbayar,b.nmbayar,b.produk,c.nmproduk FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE b.produk='$produk' AND a.branch='$branch' GROUP BY b.produk,b.kkbayar ORDER BY b.produk,b.kkbayar");
		}		
	}
}
?>