<?php
if($ada==FALSE){
	$hasil=$result->query_lap("SELECT nonas,norek,pekerjaan1,produk,kolek,nmproduk,saldo,mutdeb,mutkre,memdeb,memkre,saldoa,nama,namas FROM $userid  ORDER BY produk,pekerjaan1,kolek");
}else{
	$hasil=$result->query_lap("SELECT pekerjaan1,produk,nmproduk,kolek,SUM(saldo) saldo,SUM(mutdeb) mutdeb,SUM(mutkre) mutkre,SUM(memdeb) as memdeb,SUM(memkre) memkre,SUM(saldoa) saldoa,count(*) as org FROM $userid GROUP BY produk,pekerjaan1,kolek ORDER BY produk,pekerjaan1,kolek");
}
?>