<?php 
$huruf = array("KAWIN","TIDAK KAWIN","DUDA/JANDA");$i = 0;
while($i<3){
	if($_kstatus == $i) echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
	else  echo "<option value='".$i."'>".$huruf[$i]."</option>";
	$i++;
} ?>