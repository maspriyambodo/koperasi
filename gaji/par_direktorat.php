<?php 
$hasil=$result->query_y("SELECT kode_organisasi,nama_organisasi FROM $tabel_organisasi ORDER BY kode_organisasi",'');
while($data = $result->row($hasil)){
	if($kode_organisasi == $data['kode_organisasi']){
		echo "<option value=\"".$data['kode_organisasi']."\" selected>" .$data['nama_organisasi'] . "</option>";
	}else{
		echo "<option value=\"".$data['kode_organisasi']."\">" .$data['nama_organisasi'] . "</option>";
	}
}
?>