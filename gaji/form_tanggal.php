<?php
$x = 1;
while($x<32){
	$i=substr('00'.$x,-2);
	if ($tglxxx == $x) {
		echo "<option selected='selected' value='".$i."'>".$i."</option>";
	}else{
		echo "<option value='".$i."'>".$i."</option>";
	}
	$x++;
}?>