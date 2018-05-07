<?php 
$huruf = array("MILIK SENDIRI","SEWA/KONTRAK","RUMAH KELUARGA","RUMAH DINAS","RUMAH KPR");
$i = 0;
while($i<5){
	if($_rumah == $i) echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
	else  echo "<option value='".$i."'>".$huruf[$i]."</option>";
	$i++;
} ?>
