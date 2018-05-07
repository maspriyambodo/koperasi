<?php 
$branch=$kcabang;
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$produk =$result->c_d($_GET['produk']);
$kdsales=$result->c_d($_GET['kdsales']);
$tabel = $tabel_tagihan.$bln.substr($thn,2,2).'m';
if($ada==TRUE){
	if($kdsales=='9' AND $produk=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.norek,a.nama,sum(a.pokok) as pokok,sum(a.bunga) as bunga,sum(a.adm) as adm,sum(a.jumlah) as jumlah,count(*) as rekening,a.angsurke,a.tanggal,b.produk,b.nodapem,b.nopen,b.jangka,b.nrekom,b.kkbayar,b.nmbayar,b.kdsales,c.alamat,c.lurah,c.camat,d.nama as namas,d.notlp,e.nmproduk FROM $tabel a JOIN kredit b ON a.norek=b.norek JOIN nasabah c ON a.nonas=c.nonas JOIN sales d ON b.kdsales=d.idsales JOIN debit1 e ON b.produk=e.kdproduk GROUP BY b.produk,b.kdsales,a.norek ORDER BY b.produk,b.kdsales,a.norek");
	}elseif($kdsales=='9' AND $produk!='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.norek,a.nama,sum(a.pokok) as pokok,sum(a.bunga) as bunga,sum(a.adm) as adm,sum(a.jumlah) as jumlah,count(*) as rekening,a.angsurke,a.tanggal,b.produk,b.nodapem,b.nopen,b.jangka,b.nrekom,b.kkbayar,b.nmbayar,b.kdsales,c.alamat,c.lurah,c.camat,d.nama as namas,d.notlp,e.nmproduk FROM $tabel a JOIN kredit b ON a.norek=b.norek JOIN nasabah c ON a.nonas=c.nonas JOIN sales d ON b.kdsales=d.idsales JOIN debit1 e ON b.produk=e.kdproduk WHERE b.produk='$produk' GROUP BY b.produk,b.kdsales,a.norek ORDER BY b.produk,b.kdsales,a.norek");
	}elseif($kdsales!='9' AND $produk=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.norek,a.nama,sum(a.pokok) as pokok,sum(a.bunga) as bunga,sum(a.adm) as adm,sum(a.jumlah) as jumlah,count(*) as rekening,a.angsurke,a.tanggal,b.produk,b.nodapem,b.nopen,b.jangka,b.nrekom,b.kkbayar,b.nmbayar,b.kdsales,c.alamat,c.lurah,c.camat,d.nama as namas,d.notlp,e.nmproduk FROM $tabel a JOIN kredit b ON a.norek=b.norek JOIN nasabah c ON a.nonas=c.nonas JOIN sales d ON b.kdsales=d.idsales JOIN debit1 e ON b.produk=e.kdproduk WHERE b.kdsales='$kdsales' GROUP BY b.produk,b.kdsales,a.norek ORDER BY b.produk,b.kdsales,a.norek");
	}elseif($kdsales!='9' AND $produk!='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.norek,a.nama,sum(a.pokok) as pokok,sum(a.bunga) as bunga,sum(a.adm) as adm,sum(a.jumlah) as jumlah,count(*) as rekening,a.angsurke,a.tanggal,b.produk,b.nodapem,b.nopen,b.jangka,b.nrekom,b.kkbayar,b.nmbayar,b.kdsales,c.alamat,c.lurah,c.camat,d.nama as namas,d.notlp,e.nmproduk FROM $tabel a JOIN kredit b ON a.norek=b.norek JOIN nasabah c ON a.nonas=c.nonas JOIN sales d ON b.kdsales=d.idsales JOIN debit1 e ON b.produk=e.kdproduk WHERE b.produk='$produk' AND b.kdsales='$kdsales' GROUP BY b.produk,b.kdsales,a.norek ORDER BY b.produk,b.kdsales,a.norek");
	}
}else{
	if($kdsales=='9' AND $produk=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.norek,a.nama,sum(a.pokok) as pokok,sum(a.bunga) as bunga,sum(a.adm) as adm,sum(a.jumlah) as jumlah,count(*) as rekening,a.angsurke,a.tanggal,b.produk,b.nodapem,b.nopen,b.jangka,b.nrekom,b.kkbayar,b.nmbayar,b.kdsales,c.alamat,c.lurah,c.camat,d.nama as namas,d.notlp,e.nmproduk FROM $tabel a JOIN kredit b ON a.norek=b.norek JOIN nasabah c ON a.nonas=c.nonas JOIN sales d ON b.kdsales=d.idsales JOIN debit1 e ON b.produk=e.kdproduk GROUP BY b.produk,b.kdsales ORDER BY b.produk,b.kdsales");
	}elseif($kdsales=='9' AND $produk!='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.norek,a.nama,sum(a.pokok) as pokok,sum(a.bunga) as bunga,sum(a.adm) as adm,sum(a.jumlah) as jumlah,count(*) as rekening,a.angsurke,a.tanggal,b.produk,b.nodapem,b.nopen,b.jangka,b.nrekom,b.kkbayar,b.nmbayar,b.kdsales,c.alamat,c.lurah,c.camat,d.nama as namas,d.notlp,e.nmproduk FROM $tabel a JOIN kredit b ON a.norek=b.norek JOIN nasabah c ON a.nonas=c.nonas JOIN sales d ON b.kdsales=d.idsales JOIN debit1 e ON b.produk=e.kdproduk WHERE b.produk='$produk' GROUP BY b.produk,b.kdsales ORDER BY b.produk,b.kdsales");
	}elseif($kdsales!='9' AND $produk=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.norek,a.nama,sum(a.pokok) as pokok,sum(a.bunga) as bunga,sum(a.adm) as adm,sum(a.jumlah) as jumlah,count(*) as rekening,a.angsurke,a.tanggal,b.produk,b.nodapem,b.nopen,b.jangka,b.nrekom,b.kkbayar,b.nmbayar,b.kdsales,c.alamat,c.lurah,c.camat,d.nama as namas,d.notlp,e.nmproduk FROM $tabel a JOIN kredit b ON a.norek=b.norek JOIN nasabah c ON a.nonas=c.nonas JOIN sales d ON b.kdsales=d.idsales JOIN debit1 e ON b.produk=e.kdproduk WHERE b.kdsales='$kdsales' GROUP BY b.produk,b.kdsales ORDER BY b.produk,b.kdsales");
	}elseif($kdsales!='9' AND $produk!='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.norek,a.nama,sum(a.pokok) as pokok,sum(a.bunga) as bunga,sum(a.adm) as adm,sum(a.jumlah) as jumlah,count(*) as rekening,a.angsurke,a.tanggal,b.produk,b.nodapem,b.nopen,b.jangka,b.nrekom,b.kkbayar,b.nmbayar,b.kdsales,c.alamat,c.lurah,c.camat,d.nama as namas,d.notlp,e.nmproduk FROM $tabel a JOIN kredit b ON a.norek=b.norek JOIN nasabah c ON a.nonas=c.nonas JOIN sales d ON b.kdsales=d.idsales JOIN debit1 e ON b.produk=e.kdproduk WHERE b.produk='$produk' AND b.kdsales='$kdsales' GROUP BY b.produk,b.kdsales ORDER BY b.produk,b.kdsales");
	}
}
?>