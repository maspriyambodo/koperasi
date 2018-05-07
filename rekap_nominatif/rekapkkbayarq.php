<?php
if($ada==FALSE){
	$hasil=$result->query_lap("SELECT nonas,norek,kkbayar,nmbayar,produk,kolek,nmproduk,saldo,mutdeb,mutkre,memdeb,memkre,saldoa,nama,namas FROM $userid  ORDER BY produk,kkbayar,kolek");
}else{
	$hasil=$result->query_lap("SELECT kkbayar,nmbayar,produk,nmproduk,kolek,SUM(saldo) saldo,SUM(mutdeb) mutdeb,SUM(mutkre) mutkre,SUM(memdeb) as memdeb,SUM(memkre) memkre,SUM(saldoa) saldoa,count(*) as org FROM $userid GROUP BY produk,kkbayar,kolek ORDER BY produk,kkbayar,kolek");
}
?>