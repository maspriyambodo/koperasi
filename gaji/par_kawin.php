<?php 
$hasil=$result->query_y("SELECT kode_ptkp,keterangan FROM $tabel_ptkp ORDER BY kode_ptkp",'');
while($data = $result->row($hasil)){
	if($kode_ptkp == $data['kode_ptkp']){
		echo "<option value=\"".$data['kode_ptkp']."\" selected>" .$data['keterangan'] . "</option>";
	}else{
		echo "<option value=\"".$data['kode_ptkp']."\">" .$data['keterangan'] . "</option>";
	}
}
?>