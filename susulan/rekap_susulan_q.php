<?php 
$branch=$kcabang;$bln=$result->c_d($_GET['bln']);$thn=$result->c_d($_GET['thn']);$kkbayar =$result->c_d($_GET['kkbayar']);$tabel =$tabel_tagihan.$bln.substr($thn,2,2).'s';
if($branch=='0111'){
	if($kkbayar=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.norek,b.nocitra,a.nama,b.nodapem,b.nopen,a.pokok,a.bunga,a.adm,a.angsurke,a.jumlah,a.kdtran,b.jangka,b.nrekom,b.trekom,b.kkbayar,b.nmbayar,b.kdsales,c.alamat,d.nama as namas,d.notlp FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_nasabah c ON a.nonas=c.nonas JOIN sales d ON b.kdsales=d.idsales ORDER BY kdbyr,kkbayar,norek");
	}elseif($kkbayar!='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.norek,b.nocitra,a.nama,b.nodapem,b.nopen,a.pokok,a.bunga,a.adm,a.angsurke,a.jumlah,a.kdtran,b.jangka,b.nrekom,b.trekom,b.kkbayar,b.nmbayar,b.kdsales,c.alamat,d.nama as namas,d.notlp FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_nasabah c ON a.nonas=c.nonas JOIN sales d ON b.kdsales=d.idsales WHERE b.kkbayar LIKE '%$kkbayar%'  ORDER BY kdbyr,kkbayar,norek");
	}
}else{
	if($kkbayar=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.norek,b.nocitra,a.nama,b.nodapem,b.nopen,a.pokok,a.bunga,a.adm,a.angsurke,a.jumlah,a.kdtran,b.jangka,b.nrekom,b.trekom,b.kkbayar,b.nmbayar,b.kdsales,c.alamat,d.nama as namas,d.notlp FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_nasabah c ON a.nonas=c.nonas JOIN sales d ON b.kdsales=d.idsales WHERE a.branch='$branch' ORDER BY kdbyr,kkbayar,norek");
	}elseif($kkbayar!='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.norek,b.nocitra,a.nama,b.nodapem,b.nopen,a.pokok,a.bunga,a.adm,a.angsurke,a.jumlah,a.kdtran,b.jangka,b.nrekom,b.trekom,b.kkbayar,b.nmbayar,b.kdsales,c.alamat,d.nama as namas,d.notlp FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_nasabah c ON a.nonas=c.nonas JOIN sales d ON b.kdsales=d.idsales WHERE b.kkbayar LIKE '%$kkbayar%' AND a.branch='$branch' ORDER BY kdbyr,kkbayar,norek");
	}	
}
?>