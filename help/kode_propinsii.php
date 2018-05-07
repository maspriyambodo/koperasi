<?php 
$file='../json/propinsi.json';
$json_file = file_get_contents($file);
$jfo = json_decode($json_file,TRUE);
for($i=0; $i<count($jfo); $i++){
	if($_propinsi==$jfo[$i]['kode']){
		echo "<option value=\"".$jfo[$i]['kode']."\" selected>".$jfo[$i]['kode'].' '.$jfo[$i]['desc1']."</option>";
	}else{
		echo "<option value=\"".$jfo[$i]['kode']."\">".$jfo[$i]['kode'].' '.$jfo[$i]['desc1']."</option>";
	}
} ?>