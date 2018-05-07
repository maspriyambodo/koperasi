<?php
$huruf = array("SD","SMP","SMA","AKADEMIK","SARJANA");$i = 0;
while($i<5){
	if($_pendidikan==$i) echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
	else  echo "<option value='".$i."'>".$huruf[$i]."</option>";
	$i++;
}
?>