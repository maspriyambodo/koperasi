<?php 
$hasil=$result->query_y("SELECT kode_jabatan,nama_jabatan FROM $tabel_jabatan ORDER BY kode_jabatan",'');
while($data = $result->row($hasil)){
	if($kode_jabatan == $data['kode_jabatan']){
		echo "<option value=\"".$data['kode_jabatan']."\" selected>" .$data['nama_jabatan'] . "</option>";
	}else{
		echo "<option value=\"".$data['kode_jabatan']."\">" .$data['nama_jabatan'] . "</option>";
	}
}
?>