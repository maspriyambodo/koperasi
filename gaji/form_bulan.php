<?php
$huruf = array("01","02","03","04","05","06","07","08","09","10","11","12");
$i = 0;$x = 1;
while($i<12){
	if ($blnxxx == $x) {
		echo "<option selected='selected' value='".$huruf[$i]."'>".nmbulan($huruf[$i])."</option>";
	}else{
		echo "<option value='".$huruf[$i]."'>".nmbulan($huruf[$i])."</option>";
	}
	$i++;$x++;
}?>