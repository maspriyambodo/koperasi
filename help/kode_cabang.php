<?php 
$hasil=$result->res("SELECT kode,nama FROM tblkantor ORDER BY nama");
while($data=$result->row($hasil)){
	if($_kantor==$data['kode']){
		echo "<option value=\"" . $data['kode'] . "\" selected>" . $data['nama'] . "</option>";
	}else{
		echo "<option value=\"" . $data['kode'] . "\">" . $data['nama'] . "</option>";
	}
}
?>