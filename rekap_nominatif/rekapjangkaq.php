<?php
if($ada==FALSE){
	$hasil=$result->query_lap("SELECT jangka,suku,kdkop,produk,kolek,nmproduk,saldo,mutdeb,mutkre,memdeb,memkre,saldoa,nama,namas FROM $userid  ORDER BY produk,kolek,jangka,suku");
}else{
	$hasil=$result->query_lap("SELECT jangka,suku,jangka,kdkop,produk,nmproduk,kolek,SUM(saldo) saldo,SUM(mutdeb) mutdeb,SUM(mutkre) mutkre,SUM(memdeb) as memdeb,SUM(memkre) memkre,SUM(saldoa) saldoa,count(*) as org FROM $userid GROUP BY produk,kolek,jangka,suku ORDER BY produk,kolek,jangka,suku");
}
?>