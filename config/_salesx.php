<?php
$hasil=$result->query_y1("SELECT idsales,nama FROM $tabel_sales WHERE idsales='$kdsales' LIMIT 1");if($result->num($hasil)<1) die('Tabel Kode Sales Masih Kosong!!');
$data=$result->row($hasil);$nmsales=$data['nama'];
?>