<?php
$hasil=$result->res("SELECT idsales,nama FROM sales WHERE branch='$kcabang' ORDER BY idsales");
while ($row=$result->row($hasil)){
	if($_idsales==$row['idsales']){
		echo "<option value=".$row['idsales'].">".$row['idsales'].' - '.$row['nama']."</option>";
	}else{
		echo "<option value=".$row['idsales'].">".$row['idsales'].' - '.$row['nama']."</option>";
	}
}
echo "<option value=9 selected>KESELURUHAN</option>";
?>