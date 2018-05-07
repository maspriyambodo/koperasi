<?php
$file='./json/kbayar.json';
$json_file = file_get_contents($file);
$jfo = json_decode($json_file,TRUE);
for($i=0; $i<count($jfo); $i++){
	if($jfo[$i]['branch']==$branch){
		if($_kkbayar==$jfo[$i]['kd']){
			echo "<option value=\"".$jfo[$i]['kd']."\" selected>".$jfo[$i]['nmkb']."</option>";
		}else{
			echo "<option value=\"".$jfo[$i]['kd']."\">".$jfo[$i]['nmkb']."</option>";
		}
	}
} 
?>
