<?php 
$hasil=$result->res("SELECT kode,nama FROM tblkantor ORDER BY nama");
while ($row=$result->row($hasil)){
	if($kcabang==$row['kode']){
		echo "<option value=\"".$row['kode']."\"selected>".$row['nama']."</option>";
	}else{
		echo "<option value=\"".$row['kode']."\">" . $row['nama']."</option>";
	}
}
?>