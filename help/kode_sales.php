<?php 
$hasil=$result->res("SELECT branch,idsales,nama FROM sales WHERE branch='$branch' ORDER BY idsales");
while($data = $result->row($hasil)){
	if($_sales == $data['idsales']){
		echo "<option value=\"" . $data['idsales'] . "\" selected>" . $data['nama'] . "</option>";
	}else{
		echo "<option value=\"" . $data['idsales'] . "\">" . $data['nama'] . "</option>";
	}
}
?>