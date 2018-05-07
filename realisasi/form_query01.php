<?php 
if($ada==TRUE){
	if($produk=='9'){
		$text="SELECT a.branch,a.norek,b.oper,b.tanggal,
		a.pokok,a.bunga,a.adm,a.pokok+a.bunga+a.adm AS jumlah,
		b.pokok1,b.bunga1,b.adm1,b.pokok1+b.bunga1+b.adm1 AS jumlah1,
		b.pokok2,b.bunga2,b.adm2,b.pokok2+b.bunga2+b.adm2 AS jumlah2,
		
		IF((b.pokok1+b.pokok2)>0,IF((a.pokok-b.pokok1-b.pokok2)>0,a.pokok-b.pokok1-b.pokok2,0),a.pokok) AS pokok3,
		IF((b.bunga1+b.bunga2)>0,IF((a.bunga-b.bunga1-b.bunga2)>0,a.bunga-b.bunga1-b.bunga2,0),a.bunga) AS bunga3,
		IF((b.adm1+b.adm2)>0,IF((a.adm-b.adm1-b.adm2)>0,a.adm-b.adm1-b.adm2,0),a.adm) AS adm3,
		IF((b.pokok1+b.pokok2+b.bunga1+b.bunga2+b.adm1+b.adm2)>0,
		IF(((a.pokok+a.bunga+a.adm)-(b.pokok1+b.pokok2+b.bunga1+b.bunga2+b.adm1+b.adm2))>0,(a.pokok+a.bunga+a.adm)-(b.pokok1+b.pokok2+b.bunga1+b.bunga2+b.adm1+b.adm2),0),a.pokok+a.bunga+a.adm) AS jumlah3,

		IF(a.pokok+a.bunga+a.adm>0,1,0) AS rek,
		IF(b.pokok1+b.bunga1+b.adm1>0,1,0) AS rek1,
		IF(b.pokok2+b.bunga2+b.adm2>0,1,0) AS rek2,
		IF((b.pokok1+b.pokok2+b.bunga1+b.bunga2+b.adm1+b.adm2)>0,0,1) AS rek3,
		c.nopen,c.jangka,c.nmbayar,c.kkbayar,c.produk,d.nmproduk,e.nama FROM $tabelm a LEFT JOIN $userid b ON a.norek=b.norek JOIN kredit c ON a.norek=c.norek JOIN debit1 d ON c.produk=d.kdproduk JOIN nasabah e ON c.nonas=e.nonas ORDER BY c.produk,c.kkbayar";
	}else{
		$text="SELECT a.branch,a.norek,b.oper,b.tanggal,
		a.pokok,a.bunga,a.adm,a.pokok+a.bunga+a.adm AS jumlah,
		b.pokok1,b.bunga1,b.adm1,b.pokok1+b.bunga1+b.adm1 AS jumlah1,
		b.pokok2,b.bunga2,b.adm2,b.pokok2+b.bunga2+b.adm2 AS jumlah2,
		
		IF((b.pokok1+b.pokok2)>0,a.pokok-b.pokok1-b.pokok2,a.pokok) AS pokok3,
		IF((b.bunga1+b.bunga2)>0,a.bunga-b.bunga1-b.bunga2,a.bunga) AS bunga3,
		IF((b.adm1+b.adm2)>0,a.adm-b.adm1-b.adm2,a.adm) AS adm3,
		IF((b.pokok1+b.pokok2+b.bunga1+b.bunga2+b.adm1+b.adm2)>0,(a.pokok+a.bunga+a.adm)-(b.pokok1+b.pokok2+b.bunga1+b.bunga2+b.adm1+b.adm2),a.pokok+a.bunga+a.adm) AS jumlah3,
		IF(a.pokok+a.bunga+a.adm>0,1,0) AS rek,
		IF(b.pokok1+b.bunga1+b.adm1>0,1,0) AS rek1,
		IF(b.pokok2+b.bunga2+b.adm2>0,1,0) AS rek2,
		IF((b.pokok1+b.pokok2+b.bunga1+b.bunga2+b.adm1+b.adm2)>0,0,1) AS rek3,
		c.nopen,c.jangka,c.nmbayar,c.kkbayar,c.produk,d.nmproduk,e.nama FROM $tabelm a LEFT JOIN $userid b ON a.norek=b.norek JOIN kredit c ON a.norek=c.norek JOIN debit1 d ON c.produk=d.kdproduk JOIN nasabah e ON c.nonas=e.nonas WHERE c.produk='$produk' AND a.branch='$branch' ORDER BY c.produk,c.kkbayar";
	}
}else{
	if($produk=='9'){
		$text="SELECT a.branch,a.norek,
		SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.pokok+a.bunga+a.adm) AS jumlah,
		SUM(b.pokok1) AS pokok1,SUM(b.bunga1) AS bunga1,SUM(b.adm1) AS adm1,SUM(b.pokok1+b.bunga1+b.adm1) AS jumlah1,
		SUM(b.pokok2) AS pokok2,SUM(b.bunga2) AS bunga2,SUM(b.adm2) AS adm2,SUM(b.pokok2+b.bunga2+b.adm2) AS jumlah2,
		
		SUM(IF((b.pokok1+b.pokok2)>0,IF((a.pokok-b.pokok1-b.pokok2)>0,a.pokok-b.pokok1-b.pokok2,0),a.pokok)) AS pokok3,
		SUM(IF((b.bunga1+b.bunga2)>0,IF((a.bunga-b.bunga1-b.bunga2)>0,a.bunga-b.bunga1-b.bunga2,0),a.bunga)) AS bunga3,
		SUM(IF((b.adm1+b.adm2)>0,IF((a.adm-b.adm1-b.adm2)>0,a.adm-b.adm1-b.adm2,0),a.adm)) AS adm3,
		SUM(IF((b.pokok1+b.pokok2+b.bunga1+b.bunga2+b.adm1+b.adm2)>0,
		IF(((a.pokok+a.bunga+a.adm)-(b.pokok1+b.pokok2+b.bunga1+b.bunga2+b.adm1+b.adm2))>0,(a.pokok+a.bunga+a.adm)-(b.pokok1+b.pokok2+b.bunga1+b.bunga2+b.adm1+b.adm2),0),a.pokok+a.bunga+a.adm)) AS jumlah3,
		count(*) AS rek,
		SUM(IF(b.pokok1+b.bunga1+b.adm1>0,1,0)) AS rek1,
		SUM(IF(b.pokok2+b.bunga2+b.adm2>0,1,0)) AS rek2,
		SUM(IF((b.pokok1+b.pokok2+b.bunga1+b.bunga2+b.adm1+b.adm2)>0,0,1)) AS rek3,
		c.nmbayar,c.kkbayar,c.produk,d.nmproduk,e.nama FROM $tabelm a LEFT JOIN $userid b ON a.norek=b.norek JOIN kredit c ON a.norek=c.norek JOIN debit1 d ON c.produk=d.kdproduk JOIN nasabah e ON c.nonas=e.nonas GROUP BY c.produk,c.kkbayar ORDER BY c.produk,c.kkbayar";
	}else{
		$text="SELECT a.branch,a.norek,
		SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.pokok+a.bunga+a.adm) AS jumlah,
		SUM(b.pokok1) AS pokok1,SUM(b.bunga1) AS bunga1,SUM(b.adm1) AS adm1,SUM(b.pokok1+b.bunga1+b.adm1) AS jumlah1,
		SUM(b.pokok2) AS pokok2,SUM(b.bunga2) AS bunga2,SUM(b.adm2) AS adm2,SUM(b.pokok2+b.bunga2+b.adm2) AS jumlah2,
		
		SUM(IF((b.pokok1+b.pokok2)>0,IF((a.pokok-b.pokok1-b.pokok2)>0,a.pokok-b.pokok1-b.pokok2,0),a.pokok)) AS pokok3,
		SUM(IF((b.bunga1+b.bunga2)>0,IF((a.bunga-b.bunga1-b.bunga2)>0,a.bunga-b.bunga1-b.bunga2,0),a.bunga)) AS bunga3,
		SUM(IF((b.adm1+b.adm2)>0,IF((a.adm-b.adm1-b.adm2)>0,a.adm-b.adm1-b.adm2,0),a.adm)) AS adm3,
		SUM(IF((b.pokok1+b.pokok2+b.bunga1+b.bunga2+b.adm1+b.adm2)>0,
		IF(((a.pokok+a.bunga+a.adm)-(b.pokok1+b.pokok2+b.bunga1+b.bunga2+b.adm1+b.adm2))>0,(a.pokok+a.bunga+a.adm)-(b.pokok1+b.pokok2+b.bunga1+b.bunga2+b.adm1+b.adm2),0),a.pokok+a.bunga+a.adm)) AS jumlah3,
		count(*) AS rek,
		SUM(IF(b.pokok1+b.bunga1+b.adm1>0,1,0)) AS rek1,
		SUM(IF(b.pokok2+b.bunga2+b.adm2>0,1,0)) AS rek2,
		SUM(IF((b.pokok1+b.pokok2+b.bunga1+b.bunga2+b.adm1+b.adm2)>0,0,1)) AS rek3,
		c.nmbayar,c.kkbayar,c.produk,d.nmproduk,e.nama FROM $tabelm a LEFT JOIN $userid b ON a.norek=b.norek JOIN kredit c ON a.norek=c.norek JOIN debit1 d ON c.produk=d.kdproduk JOIN nasabah e ON c.nonas=e.nonas WHERE c.produk='$produk' AND a.branch='$branch' GROUP BY c.produk,c.kkbayar ORDER BY c.produk,c.kkbayar";
	}
}
include '../query_data_laporan.php';
?>