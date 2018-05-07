<?php 
$file='../json/jpensiun.json';
$json_file = file_get_contents($file);
$jfo = json_decode($json_file,TRUE);
for($i=0; $i<count($jfo); $i++){
	if($row['jenis']==$jfo[$i]['kdpen']){
		echo "<option value=\"".$jfo[$i]['kdpen']."\" selected>".$jfo[$i]['kdpen'].' '.$jfo[$i]['ketpen']."</option>";
	}else{
		echo "<option value=\"".$jfo[$i]['kdpen']."\">".$jfo[$i]['kdpen'].' '.$jfo[$i]['ketpen']."</option>";
	}
} ?>