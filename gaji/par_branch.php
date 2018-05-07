<?php 
$hasil=$result->query_y("SELECT kode,nama FROM $tabel_branch ORDER BY kode",'');
while($data = $result->row($hasil)){
	if($branch == $data['kode']){
		echo "<option value=\"".$data['kode']."\" selected>" .$data['nama'] . "</option>";
	}else{
		echo "<option value=\"".$data['kode']."\">" .$data['nama'] . "</option>";
	}
}
?>