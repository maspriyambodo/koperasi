<?php
$hasil=$result->res("SELECT userid,nama FROM tbluser WHERE branch='$kcabang' ORDER BY userid");
while ($row=$result->row($hasil)){
	if($userid==$row['userid']){
		echo "<option value=\"".$row['userid']."\" selected>".$row['userid'].' - '.$row['nama']."</option>";
	}else{
		echo "<option value=\"".$row['userid']."\">".$row['userid'].' - '.$row['nama']."</option>";
	}
}
echo "<option value=9>KESELURUHAN</option>";
?>