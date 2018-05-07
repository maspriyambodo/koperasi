<?php 
$hasilx=$result->query_y("SELECT kode_jabatan,nama_jabatan FROM $tabel_jabatan ORDER BY kode_jabatan",'');
while($data = $result->row($hasilx)){
	if($kode_jabatan == $data['kode_jabatan']){
		$nama_jabatanx=$data['nama_jabatan'];
	}else{
		$nama_jabatanx='';
	}
}
?>