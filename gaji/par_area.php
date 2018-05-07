<?php 
$hasil=$result->query_y("SELECT kode_lokasi,nama_lokasi FROM $tabel_lokasi ORDER BY kode_lokasi",'');
while($data = $result->row($hasil)){
	if($kode_lokasi == $data['kode_lokasi']){
		echo "<option value=\"".$data['kode_lokasi']."\" selected>".$data['nama_lokasi']."</option>";
	}else{
		echo "<option value=\"".$data['kode_lokasi']."\">".$data['nama_lokasi']."</option>";
	}
}
?>