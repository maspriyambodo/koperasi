<?php
$hasil=$result->res("SELECT kdproduk,nmproduk FROM deposito.prd_deposito ORDER BY kdproduk");
while ($row=$result->row($hasil)){
	echo "<option value=\"" .$row['kdproduk']."\">" .$row['kdproduk'].' '.$row['nmproduk']."</option>";
}echo "<option selected='selected' value=9>KESELURUHAN</option>";
?>