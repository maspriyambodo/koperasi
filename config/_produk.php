<?php 
$hasil=$result->query_y1("SELECT kdproduk,nmproduk FROM $tabel_produk ORDER BY kdproduk");
if($result->num($hasil)<1) die('Data Produk Tidak Di Temukan!!');
while($data = $result->row($hasil)){
	if($produk==$data['kdproduk']){
		echo "<option value=\"" .$data['kdproduk']."\" selected>" .$data['kdproduk'].' '.$data['nmproduk']. "</option>";
	}else{
		echo "<option value=\"" .$data['kdproduk']."\">" .$data['kdproduk'].' '.$data['nmproduk']. "</option>";
	}
}
?>