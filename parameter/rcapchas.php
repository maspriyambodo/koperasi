<?php
include '../h_tetap.php';
$id=$result->c_d($_GET['id']);
$result->query_y1("DELETE FROM ipcapcha WHERE id = '$id' LIMIT 1");
echo "Sukses Dihapus";
?>