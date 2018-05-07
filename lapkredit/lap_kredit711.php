<?php $bln=$result->c_d($_GET['bln']);$thn=$result->c_d($_GET['thn']);$branch=$result->c_d($_GET['branch']);$produk=$result->c_d($_GET['produk']);$pilih=$result->c_d($_GET['p']);$tabeln=$tabelTransaksi_.$bln.substr($thn,2,2);$bulan=$bln.substr($thn,2,2);$tabelm= $userid.'1';$tabelr = $tabel_tagihan.$bln.substr($thn,2,2).'b';$tabelx = $tabel_tagihan.$bln.substr($thn,2,2).'m';$where='WHERE kdtran!=999';$where1='WHERE branch='.$branch.' AND kdtran!=999';include '../rpt_tagihanxx.php';
$tabels ='m';
$result->query_x1("CREATE TEMPORARY TABLE $tabels SELECT b.branch,b.kdtran,a.norek,a.pokok1 as pokok,a.bunga1 as bunga,a.adm1 as adm,(a.pokok1+a.bunga1+a.adm1)as jumlah,a.denda1 as denda ,a.finalti1 as finalti,IF(IFNULL(b.pokok,0)+IFNULL(b.bunga,0)+IFNULL(b.adm,0)>0,1,0) AS jum FROM $userid a LEFT JOIN $tabelm b on a.norek=b.norek ORDER BY norek");
if($ada==TRUE){
	if($produk=='9'){
		$hasil=$result->query_lap("SELECT a.norek,f.nama,a.kdtran,a.pokok,a.bunga,a.adm,a.jumlah,b.saldoa,b.nopen,b.nodapem,b.jangka,b.kkbayar,b.nmbayar,b.kdsales,b.produk,c.nmproduk,d.nama as namas FROM $tabels a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales JOIN $tabel_nasabah f ON b.nonas=f.nonas WHERE a.jum!=1 ORDER BY b.produk,b.kkbayar");
	}else{
		$hasil=$result->query_lap("SELECT a.norek,f.nama,a.kdtran,a.pokok,a.bunga,a.adm,a.jumlah,b.saldoa,b.nopen,b.nodapem,b.jangka,b.kkbayar,b.nmbayar,b.kdsales,b.produk,c.nmproduk,d.nama as namas FROM $tabels a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales JOIN $tabel_nasabah f ON b.nonas=f.nonas WHERE a.jum!=1 AND b.produk='$produk' ORDER BY b.produk,b.kkbayar");
	}
}else{
	if($produk=='9'){
		$hasil=$result->query_lap("SELECT a.norek,a.kdtran,SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,SUM(b.saldoa) AS saldoa,count(*) AS rekening,b.kkbayar,b.nmbayar,b.produk,c.nmproduk,d.nama as namas FROM $tabels a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales WHERE a.jum!=1 GROUP BY b.produk,b.kkbayar ORDER BY b.produk,b.kkbayar");
	}else{
		$hasil=$result->query_lap("SELECT a.norek,a.kdtran,SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,SUM(b.saldoa) AS saldoa,count(*) AS rekening,b.kkbayar,b.nmbayar,b.produk,c.nmproduk,d.nama as namas FROM $tabels a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk JOIN sales d ON b.kdsales=d.idsales WHERE a.jum!=1 AND b.produk='$produk' GROUP BY b.produk,b.kkbayar ORDER BY b.produk,b.kkbayar");
	}
}
?>