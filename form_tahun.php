<?php
$i=0;$x=$thn;
while($i<91){
	if($x == $thn_x1) {
		echo "<option  selected='selected' value='".$x."' selected>".$x."</option>";
	}else{
		echo "<option value='".$x."'>".$x."</option>";
	}
	$i++;$x--;
}
?>