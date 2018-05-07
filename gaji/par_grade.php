<?php 
$hasil=$result->query_y("SELECT kode_grade,keterangan FROM $tabel_grade ORDER BY kode_grade",'');
while($data = $result->row($hasil)){
	if($kode_grade == $data['kode_grade']){
		echo "<option value=\"".$data['kode_grade']."\" selected>".$data['kode_grade'].' '.$data['keterangan']."</option>";
	}else{
		echo "<option value=\"".$data['kode_grade']."\">".$data['kode_grade'].' '.$data['keterangan']."</option>";
	}
}
?>