<?php 
$hasil=$result->query_y1("SELECT kdproduk,nmproduk FROM $tabel_produk ORDER BY kdproduk");
if($result->num($hasil)<1) die('Data Produk Tidak Di Temukan!!');
$nmproduk='';
while($data = $result->row($hasil)){
	if($produk==$data['kdproduk']){
		$nmproduk=$data['nmproduk'];
	}
}
?>