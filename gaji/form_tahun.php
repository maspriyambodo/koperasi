<?php
$i = 0;$x=$thn;
while($i<11){
	if ($x == $thn) {
		echo "<option  selected='selected' value='".$x."' selected>".$x."</option>";
	}else{
		echo "<option value='".$x."'>".$x."</option>";
	}
	$i++;$x--;
}
?>