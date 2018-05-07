<?php
$branch=$result->c_d($_GET['branch']);
$produk=$result->c_d($_GET['kdsales']);
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$tabel=$tabel_nominatif.$bln.$thn;
if($branch=='0111'){
	if($produk==9){
		$hasil=$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.norek,a.nonas,a.kkbayar,a.nmbayar,a.nomi,a.saldoa,a.umur,a.suku,a.jangka,a.produk,c.nmproduk FROM $tabel a JOIN debit1 c ON a.produk=c.kdproduk WHERE (ISNULL(a.kdpremi) OR a.kdpremi=9) AND a.jumpremi<=0 AND a.saldoa>0 ORDER BY a.produk,a.norek");
	}else{
		$hasil=$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.norek,a.nonas,a.kkbayar,a.nmbayar,a.nomi,a.saldoa,a.umur,a.suku,a.jangka,a.produk,c.nmproduk FROM $tabel a JOIN debit1 c ON a.produk=c.kdproduk WHERE (ISNULL(a.kdpremi) OR a.kdpremi=9)) AND a.jumpremi<=0 a.produk='$produk' AND a.saldoa>0 ORDER BY a.produk,a.norek");
	}
}else{
	if($produk==9){
		$hasil=$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.norek,a.nonas,a.kkbayar,a.nmbayar,a.nomi,a.saldoa,a.umur,a.suku,a.jangka,a.produk,c.nmproduk FROM $tabel a JOIN debit1 c ON a.produk=c.kdproduk WHERE (ISNULL(a.kdpremi) OR a.kdpremi=9) AND a.jumpremi<=0 AND a.branch='$branch' AND a.saldoa>0 ORDER BY a.produk,a.norek");
	}else{
		$hasil=$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.norek,a.nonas,a.kkbayar,a.nmbayar,a.nomi,a.saldoa,a.umur,a.suku,a.jangka,a.produk,c.nmproduk FROM $tabel a JOIN debit1 c ON a.produk=c.kdproduk WHERE (ISNULL(a.kdpremi) OR a.kdpremi=9) AND a.jumpremi<=0 AND a.branch='$branch' AND a.produk='$produk' AND a.saldoa>0 ORDER BY a.produk,a.norek");
	}
}
$hasil=$result->query_lap("SELECT branch,kkbayar,nmbayar,sum(nomi) as nomi,sum(saldoa) as saldoa,suku,jangka,umur,produk,nmproduk,count(*) as org FROM $userid GROUP BY kkbayar,jangka,umur,produk ORDER BY kkbayar,jangka,umur,produk");
?>