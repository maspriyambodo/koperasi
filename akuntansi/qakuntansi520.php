<?php
if($branch=='0111'){
	$result->res("CREATE TEMPORARY TABLE $userid SELECT branch,nonas,norekgl,notransaksi,kdtran,jtransaksi,tanggal,noreferensi,IF(substr(kdtran,1,1)='1',jumlah,0) AS debetkas,IF(substr(kdtran,1,1)='2',jumlah,0) AS kreditkas,IF(substr(kdtran,1,1)='3',jumlah,0) AS debetmemo,IF(substr(kdtran,1,1)='4',jumlah,0) AS kreditmemo FROM $tabel ORDER BY tanggal,norekgl");
}else{
	$result->res("CREATE TEMPORARY TABLE $userid SELECT branch,nonas,norekgl,notransaksi,kdtran,jtransaksi,tanggal,noreferensi,IF(substr(kdtran,1,1)='1',jumlah,0) AS debetkas,IF(substr(kdtran,1,1)='2',jumlah,0) AS kreditkas,IF(substr(kdtran,1,1)='3',jumlah,0) AS debetmemo,IF(substr(kdtran,1,1)='4',jumlah,0) AS kreditmemo FROM $tabel WHERE branch='$branch' ORDER BY tanggal,norekgl");
}
?>