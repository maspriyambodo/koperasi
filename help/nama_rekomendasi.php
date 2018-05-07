<?php 
$hasil=$result->res("SELECT branch,idsales,nama FROM sales WHERE branch='$branch' ORDER BY idsales");
while($data = $result->row($hasil)){
	if($nrekom == $data['nama']){
		echo "<option value=\"" .$data['nama']. "\" selected>" . $data['nama'] . "</option>";
	}else{
		echo "<option value=\"" .$data['nama']. "\">" .$data['nama']. "</option>";
	}
}
?>