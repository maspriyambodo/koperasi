<?php 
$hasil=$result->res("SELECT kode_asuransi,nama_asuransi FROM tbl_asuransi WHERE status_asuransi=1 ORDER BY nama_asuransi");
while($data = $result->row($hasil)){
	if($kdpremi == $data['kode_asuransi']){
		echo "<option value=\"".$data['kode_asuransi']."\" selected>" .$data['nama_asuransi'] . "</option>";
	}else{
		echo "<option value=\"".$data['kode_asuransi']."\">" .$data['nama_asuransi'] . "</option>";
	}
}
?>