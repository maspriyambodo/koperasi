<?php
if($ada==FALSE){
	$hasil=$result->query_lap("SELECT nonas,norek,lurah,produk,kolek,nmproduk,saldo,mutdeb,mutkre,memdeb,memkre,saldoa,nama,namas FROM $userid  ORDER BY produk,lurah,kolek");
}else{
	$hasil=$result->query_lap("SELECT lurah,produk,nmproduk,kolek,SUM(saldo) saldo,SUM(mutdeb) mutdeb,SUM(mutkre) mutkre,SUM(memdeb) as memdeb,SUM(memkre) memkre,SUM(saldoa) saldoa,count(*) as org FROM $userid GROUP BY produk,lurah,kolek ORDER BY produk,lurah,kolek");
}
?>