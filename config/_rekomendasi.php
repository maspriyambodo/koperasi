<?php
$hasil=$result->res("SELECT branch,idsales,nama FROM nabasa.sales WHERE branch='$branch' ORDER BY nama");
if($result->num($hasil)<1) die('Tabel Kode Sales Masih Kosong!!');
while($data = $result->row($hasil)){
	if($nrekom == $data['nama']){
		echo "<option value=\"" .$data['nama']. "\" selected>" . $data['nama'] . "</option>";
	}else{
		echo "<option value=\"" .$data['nama']. "\">" .$data['nama']. "</option>";
	}
}
?>