<?php $bln=$result->c_d($_GET['bln']);$thn=$result->c_d($_GET['thn']);$branch =$result->c_d($_GET['branch']);$kkbayar = $result->c_d($_GET['kkbayar']);$bulan=$bln.$thn;$tabel = $tabel_tagihan.$bln.substr($thn,2,2).'b';
if($ada==TRUE){
	if($branch=='0111'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,a.pokok,a.bunga,a.adm,a.jumlah,a.alasan_tt,a.solusi_tt,b.kkbayar,b.nocitra,b.nmbayar,b.kdbyr,b.produk,b.kdsales,c.nama as namas,d.nmproduk FROM $tabel a JOIN kredit b ON a.norek=b.norek JOIN sales c ON b.kdsales=c.idsales JOIN debit1 d ON b.produk=d.kdproduk WHERE a.kdtran=777 ORDER BY b.produk,b.kkbayar,a.norek");		
	}else{
		if($kkbayar=='9'){
			$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,a.pokok,a.bunga,a.adm,a.jumlah,a.alasan_tt,a.solusi_tt,b.kkbayar,b.nocitra,b.nmbayar,b.kdbyr,b.produk,b.kdsales,c.nama as namas,d.nmproduk FROM $tabel a JOIN kredit b ON a.norek=b.norek JOIN sales c ON b.kdsales=c.idsales JOIN debit1 d ON b.produk=d.kdproduk WHERE a.kdtran=777 AND a.branch='$branch' ORDER BY b.produk,b.kkbayar,a.norek");
		}else{
			$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,a.pokok,a.bunga,a.adm,a.jumlah,a.alasan_tt,a.solusi_tt,b.kkbayar,b.nocitra,b.nmbayar,b.kdbyr,b.produk,b.kdsales,c.nama as namas,d.nmproduk FROM $tabel a JOIN kredit b ON a.norek=b.norek JOIN sales c ON b.kdsales=c.idsales JOIN debit1 d ON b.produk=d.kdproduk WHERE a.kdtran=777 AND b.kkbayar='$kkbayar' AND a.branch='$branch' ORDER BY b.produk,b.kkbayar,a.norek");
		}
	}
}else{
	if($branch=='0111'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,sum(a.pokok) as pokok,sum(a.bunga) as bunga,sum(a.adm) as adm,sum(a.jumlah) as jumlah,count(*) as rekening,a.alasan_tt,a.solusi_tt,b.kkbayar,b.nmbayar,b.kdbyr,b.produk,b.kdsales,c.nama as namas,d.nmproduk FROM $tabel a JOIN kredit b ON a.norek=b.norek JOIN sales c ON b.kdsales=c.idsales JOIN debit1 d ON b.produk=d.kdproduk WHERE a.kdtran=777 GROUP BY b.produk,b.kkbayar,b.kdsales ORDER BY b.produk,b.kkbayar,b.kdsales");
	}else{
		if($kkbayar=='9'){
			$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,sum(a.pokok) as pokok,sum(a.bunga) as bunga,sum(a.adm) as adm,sum(a.jumlah) as jumlah,count(*) as rekening,a.alasan_tt,a.solusi_tt,b.kkbayar,b.nmbayar,b.kdbyr,b.produk,b.kdsales,c.nama as namas,d.nmproduk FROM $tabel a JOIN kredit b ON a.norek=b.norek JOIN sales c ON b.kdsales=c.idsales JOIN debit1 d ON b.produk=d.kdproduk WHERE a.kdtran=777 AND a.branch='$branch' GROUP BY b.produk,b.kkbayar,b.kdsales ORDER BY b.produk,b.kkbayar,b.kdsales");
		}else{
			$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nama,sum(a.pokok) as pokok,sum(a.bunga) as bunga,sum(a.adm) as adm,sum(a.jumlah) as jumlah,count(*) as rekening,a.alasan_tt,a.solusi_tt,b.kkbayar,b.nmbayar,b.kdbyr,b.produk,b.kdsales,c.nama as namas,d.nmproduk FROM $tabel a JOIN kredit b ON a.norek=b.norek JOIN sales c ON b.kdsales=c.idsales JOIN debit1 d ON b.produk=d.kdproduk WHERE a.kdtran=777 AND b.kkbayar='$kkbayar' AND a.branch='$branch' GROUP BY b.produk,b.kkbayar,b.kdsales ORDER BY b.produk,b.kkbayar,b.kdsales");
		}
	}
}
?>