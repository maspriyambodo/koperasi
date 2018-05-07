<?php
if($branch=='0111'){
	if($produk==9){
		$hasil=$result->query_lap("SELECT a.produk,SUM(IF(a.kolek=1,a.saldoa,0)) AS saldoa1,SUM(IF(a.kolek=1,1,0)) AS orang1,SUM(IF(a.kolek=2,a.saldoa,0)) AS saldoa2,SUM(IF(a.kolek=2,1,0)) AS orang2,SUM(IF(a.kolek=3,a.saldoa,0)) AS saldoa3,SUM(IF(a.kolek=3,1,0)) AS orang3,SUM(IF(a.kolek=4,a.saldoa,0)) AS saldoa4,SUM(IF(a.kolek=4,1,0)) AS orang4,SUM(IF(a.kolek=5,a.saldoa,0)) AS saldoa5,SUM(IF(a.kolek=5,1,0)) AS orang5,a.kolek,b.nmproduk FROM $tabel_kredit a JOIN debit1 b ON a.produk=b.kdproduk WHERE (a.saldo!=0 or a.mutdeb!=0 or a.mutkre!=0 or a.memdeb!=0 or a.memkre!=0 or a.saldoa!=0) AND a.ketnas=1 GROUP BY a.produk ORDER BY a.produk");
	}else{
			$hasil=$result->query_lap("SELECT a.produk,SUM(IF(a.kolek=1,a.saldoa,0)) AS saldoa1,SUM(IF(a.kolek=1,1,0)) AS orang1,SUM(IF(a.kolek=2,a.saldoa,0)) AS saldoa2,SUM(IF(a.kolek=2,1,0)) AS orang2,SUM(IF(a.kolek=3,a.saldoa,0)) AS saldoa3,SUM(IF(a.kolek=3,1,0)) AS orang3,SUM(IF(a.kolek=4,a.saldoa,0)) AS saldoa4,SUM(IF(a.kolek=4,1,0)) AS orang4,SUM(IF(a.kolek=5,a.saldoa,0)) AS saldoa5,SUM(IF(a.kolek=5,1,0)) AS orang5,a.kolek,b.nmproduk FROM $tabel_kredit a JOIN debit1 b ON a.produk=b.kdproduk WHERE (a.saldo!=0 or a.mutdeb!=0 or a.mutkre!=0 or a.memdeb!=0 or a.memkre!=0 or a.saldoa!=0) AND a.produk='$produk' AND a.ketnas=1 GROUP BY a.produk, ORDER BY a.produk");
	}
}else{
	if($produk==9){
		$hasil=$result->query_lap("SELECT a.produk,SUM(IF(a.kolek=1,a.saldoa,0)) AS saldoa1,SUM(IF(a.kolek=1,1,0)) AS orang1,SUM(IF(a.kolek=2,a.saldoa,0)) AS saldoa2,SUM(IF(a.kolek=2,1,0)) AS orang2,SUM(IF(a.kolek=3,a.saldoa,0)) AS saldoa3,SUM(IF(a.kolek=3,1,0)) AS orang3,SUM(IF(a.kolek=4,a.saldoa,0)) AS saldoa4,SUM(IF(a.kolek=4,1,0)) AS orang4,SUM(IF(a.kolek=5,a.saldoa,0)) AS saldoa5,SUM(IF(a.kolek=5,1,0)) AS orang5,a.kolek,b.nmproduk FROM $tabel_kredit a JOIN debit1 b ON a.produk=b.kdproduk WHERE (a.saldo!=0 or a.mutdeb!=0 or a.mutkre!=0 or a.memdeb!=0 or a.memkre!=0 or a.saldoa!=0) AND a.branch='$branch' AND a.ketnas=1 GROUP BY a.produk ORDER BY a.produk");
	}else{
		$hasil=$result->query_lap("SELECT a.produk,SUM(IF(a.kolek=1,a.saldoa,0)) AS saldoa1,SUM(IF(a.kolek=1,1,0)) AS orang1,SUM(IF(a.kolek=2,a.saldoa,0)) AS saldoa2,SUM(IF(a.kolek=2,1,0)) AS orang2,SUM(IF(a.kolek=3,a.saldoa,0)) AS saldoa3,SUM(IF(a.kolek=3,1,0)) AS orang3,SUM(IF(a.kolek=4,a.saldoa,0)) AS saldoa4,SUM(IF(a.kolek=4,1,0)) AS orang4,SUM(IF(a.kolek=5,a.saldoa,0)) AS saldoa5,SUM(IF(a.kolek=5,1,0)) AS orang5,a.kolek,b.nmproduk FROM $tabel_kredit a JOIN debit1 b ON a.produk=b.kdproduk WHERE (a.saldo!=0 or a.mutdeb!=0 or a.mutkre!=0 or a.memdeb!=0 or a.memkre!=0 or a.saldoa!=0) AND a.branch='$branch' AND a.produk='$produk' AND a.ketnas=1 GROUP BY a.produk ORDER BY a.produk");
	}
}
?>