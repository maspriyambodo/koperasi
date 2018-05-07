<?php 
$hasil=$result->query_y("SELECT kode_grade,grade,keterangan FROM $tabel_grade ORDER BY grade",'');
while($data = $result->row($hasil)){
	if($kode_grade == $data['kode_grade']){
		echo "<option value=\"".$data['grade']."\" selected>".$data['grade'].' - '.$data['kode_grade']."</option>";
	}else{
		echo "<option value=\"".$data['grade']."\">".$data['grade'].' - '.$data['kode_grade']."</option>";
	}
}
?>