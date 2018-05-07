<?php 
$huruf = array("ISLAM","KATOLIK","PROTESTAN","HINDU","BUDHA");$i = 0;
while($i<5){
	if($_agama == $i) echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
	else  echo "<option value='".$i."'>".$huruf[$i]."</option>";
	$i++;
} ?>