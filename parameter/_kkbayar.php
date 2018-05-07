<?php 
$hasil=$result->res("SELECT kd,nmkb FROM $tabel_kkb ORDER BY kd");
while($data = $result->row($hasil)){
	if($_kkbayar == $data['kd']){
		echo "<option value=\"".$data['kd']."\" selected>" .$data['nmkb'] . "</option>";
	}else{
		echo "<option value=\"".$data['kd']."\">" .$data['nmkb'] . "</option>";
	}
}
?>