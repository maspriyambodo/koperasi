<?php 
$hasil=$result->query_y("SELECT kode_wilayah,nama_wilayah FROM $tabel_wilayah ORDER BY kode_wilayah",'');
while($data = $result->row($hasil)){
	if($kode_wilayah == $data['kode_wilayah']){
		echo "<option value=\"".$data['kode_wilayah']."\" selected>" .$data['nama_wilayah'] . "</option>";
	}else{
		echo "<option value=\"".$data['kode_wilayah']."\">" .$data['nama_wilayah'] . "</option>";
	}
}
?>