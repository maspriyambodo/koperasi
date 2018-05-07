<?php
$branch=$result->c_d($_GET['branch']);
$produk = $result->c_d($_GET['kdsales']);
if($branch=='0111'){
	if($produk==9){
		$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,a.sufix,a.kdbyr,a.kkbayar,a.nopen,a.nmbayar,a.nomi,a.jangka,a.suku,a.tgtran,a.produk,a.saldoa,a.kdkop,a.kolek,b.nama,d.nmproduk FROM $tabel_kredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN debit1 d ON a.produk=d.kdproduk WHERE (a.saldo!=0 or a.mutdeb!=0 or a.mutkre!=0 or a.memdeb!=0 or a.memkre!=0 or a.saldoa!=0) ORDER BY a.produk,a.kkbayar,a.kolek,a.norek");
	}else{
		$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,a.sufix,a.kdbyr,a.kkbayar,a.nopen,a.nmbayar,a.nomi,a.jangka,a.suku,a.tgtran,a.produk,a.saldoa,a.kdkop,a.kolek,b.nama,d.nmproduk FROM $tabel_kredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN debit1 d ON a.produk=d.kdproduk WHERE (a.saldo!=0 or a.mutdeb!=0 or a.mutkre!=0 or a.memdeb!=0 or a.memkre!=0 or a.saldoa!=0) AND produk='$produk' ORDER BY a.produk,a.kkbayar,a.kolek,a.norek");
	}
}else{
	if($produk==9){
		$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,a.sufix,a.kdbyr,a.kkbayar,a.nopen,a.nmbayar,a.nomi,a.jangka,a.suku,a.tgtran,a.produk,a.saldoa,a.kdkop,a.kolek,b.nama,d.nmproduk FROM $tabel_kredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN debit1 d ON a.produk=d.kdproduk WHERE (a.saldo!=0 or a.mutdeb!=0 or a.mutkre!=0 or a.memdeb!=0 or a.memkre!=0 or a.saldoa!=0) AND a.branch='$branch' ORDER BY a.produk,a.kkbayar,a.kolek,a.norek");
	}else{
		$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,a.sufix,a.kdbyr,a.kkbayar,a.nopen,a.nmbayar,a.nomi,a.jangka,a.suku,a.tgtran,a.produk,a.saldoa,a.kdkop,a.kolek,b.nama,d.nmproduk FROM $tabel_kredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN debit1 d ON a.produk=d.kdproduk WHERE (a.saldo!=0 or a.mutdeb!=0 or a.mutkre!=0 or a.memdeb!=0 or a.memkre!=0 or a.saldoa!=0) AND a.branch='$branch' AND a.produk='$produk' ORDER BY a.produk,a.kkbayar,a.kolek,a.norek");
	}
}
?>