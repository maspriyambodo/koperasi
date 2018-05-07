<?php
$huruf = array("PRIA","WANITA");$i = 0;
while ($i<2){
	if($_jkelamin == $i) echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
	else  echo "<option value='".$i."'>".$huruf[$i]."</option>";
	$i++;
}
?>