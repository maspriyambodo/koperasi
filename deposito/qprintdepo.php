<?php
include('koneksi.php');
$id=$_POST['id'];
$query = $mysql->query("UPDATE deposits SET flag_cetak=1 WHERE  id='$id'");
?>