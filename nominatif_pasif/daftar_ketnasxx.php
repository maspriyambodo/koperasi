<?php
$branch=$result->c_d($_GET['branch']);
$produk = $result->c_d($_GET['kdsales']);
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$pilih=$result->c_d($_GET['p']);
$tabel =$tabel_nominatif.$bln.$thn;
if($branch=='0111'){
	if($produk==9){
		$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,a.sufix,a.kdbyr,a.kkbayar,a.nmbayar,a.nomi,e.kdpremi,a.jangka,a.suku,a.tgtran,a.produk,a.saldo,a.mutdeb,a.mutkre,a.memdeb,a.memkre,a.saldoa,a.kdkop,a.kolek,a.kketnas,b.nama,c.jumlah,d.nmproduk FROM $tabel a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN (SELECT norek,SUM(IF(kdtran=777,pokok,0)) as jumlah FROM payment GROUP BY norek) as c ON a.norek=c.norek JOIN debit1 d ON a.produk=d.kdproduk JOIN $tabel_kredit e ON a.norek=e.norek WHERE (a.saldo!=0 or a.mutdeb!=0 or a.mutkre!=0 or a.memdeb!=0 or a.memkre!=0 or a.saldoa!=0) AND a.ketnas=1 ORDER BY a.produk,a.kkbayar,a.kolek,a.norek");
	}else{
		$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,a.sufix,a.kdbyr,a.kkbayar,a.nmbayar,a.nomi,e.kdpremi,a.jangka,a.suku,a.tgtran,a.produk,a.saldo,a.mutdeb,a.mutkre,a.memdeb,a.memkre,a.saldoa,a.kdkop,a.kolek,a.kketnas,b.nama,c.jumlah,d.nmproduk FROM $tabel a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN (SELECT norek,SUM(IF(kdtran=777,pokok,0)) as jumlah FROM payment GROUP BY norek) as c ON a.norek=c.norek JOIN debit1 d ON a.produk=d.kdproduk JOIN $tabel_kredit e ON a.norek=e.norek WHERE (a.saldo!=0 or a.mutdeb!=0 or a.mutkre!=0 or a.memdeb!=0 or a.memkre!=0 or a.saldoa!=0) AND a.ketnas=1 AND a.produk='$produk' ORDER BY a.produk,a.kkbayar,a.kolek,a.norek");
	}
}else{
	if($produk==9){
		$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,a.sufix,a.kdbyr,a.kkbayar,a.nmbayar,a.nomi,e.kdpremi,a.jangka,a.suku,a.tgtran,a.produk,a.saldo,a.mutdeb,a.mutkre,a.memdeb,a.memkre,a.saldoa,a.kdkop,a.kolek,a.kketnas,b.nama,c.jumlah,d.nmproduk FROM $tabel a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN (SELECT norek,SUM(IF(kdtran=777,pokok,0)) as jumlah FROM payment GROUP BY norek) as c ON a.norek=c.norek JOIN debit1 d ON a.produk=d.kdproduk JOIN $tabel_kredit e ON a.norek=e.norek WHERE (a.saldo!=0 or a.mutdeb!=0 or a.mutkre!=0 or a.memdeb!=0 or a.memkre!=0 or a.saldoa!=0) AND a.branch='$branch' AND a.ketnas=1 ORDER BY a.produk,a.kkbayar,a.kolek,a.norek");
	}else{
		$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,a.sufix,a.kdbyr,a.kkbayar,a.nmbayar,a.nomi,e.kdpremi,a.jangka,a.suku,a.tgtran,a.produk,a.saldo,a.mutdeb,a.mutkre,a.memdeb,a.memkre,a.saldoa,a.kdkop,a.kolek,a.kketnas,b.nama,c.jumlah,d.nmproduk FROM $tabel a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN (SELECT norek,SUM(IF(kdtran=777,pokok,0)) as jumlah FROM payment GROUP BY norek) as c ON a.norek=c.norek JOIN debit1 d ON a.produk=d.kdproduk JOIN $tabel_kredit e ON a.norek=e.norek WHERE (a.saldo!=0 or a.mutdeb!=0 or a.mutkre!=0 or a.memdeb!=0 or a.memkre!=0 or a.saldoa!=0) AND a.branch='$branch' AND a.ketnas=1 AND a.produk='$produk' ORDER BY a.produk,a.kkbayar,a.kolek,a.norek");
	}
}
?>