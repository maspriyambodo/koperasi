<?php 
$hasil=$result->query_2("SELECT kode,nama FROM $tabel_branch WHERE kode='$branch' ORDER BY kode LIMIT 1",'');$r=$result->row($hasil);echo $r['nama'];
?>