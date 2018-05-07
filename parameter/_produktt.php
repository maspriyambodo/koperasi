<?php
$hasil=$result->res("SELECT kdproduk,nmproduk FROM produkt ORDER BY kdproduk");
while ($row=$result->row($hasil)){
	if($_produkt==$row['kdproduk']){
		echo "<option value=".$row['kdproduk'].">".$row['kdproduk'].' - '.$row['nmproduk']."</option>";
	}else{
		echo "<option value=".$row['kdproduk'].">".$row['kdproduk'].' - '.$row['nmproduk']."</option>";
	}
}
echo "<option value=9 selected>KESELURUHAN</option>";
?>