<?php
$x = 0;$i=1;
while($x<31){
	$i=substr('00'.$i,-2);
	if ($tgl_x1 == $i) {
		echo "<option selected='selected' value='".$i."'>".$i."</option>";
	}else{
		echo "<option value='".$i."'>".$i."</option>";
	}
	$x++;$i++;
}
?>