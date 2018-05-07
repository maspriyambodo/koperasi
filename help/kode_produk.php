<?php 
$hasil = $result->res("SELECT kdproduk,nmproduk FROM debit1 ORDER BY kdproduk");
while($data = $result->row($hasil)){
	if($_produk==$data['kdproduk']){
		echo "<option value=\"" .$data['kdproduk']."\" selected>" .$data['kdproduk'].' '.$data['nmproduk']. "</option>";
	}else{
		echo "<option value=\"" .$data['kdproduk']."\">" .$data['kdproduk'].' '.$data['nmproduk']. "</option>";
	}
}
?>