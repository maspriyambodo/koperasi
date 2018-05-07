<?php
if(!isset($_FILES["datafile"]["name"]))die("Nama File Belum Di Pilih");
$nama_file=$_FILES['datafile']['name'];
$ukuran=$_FILES['datafile']['size'];
include 'frmrestorex.php';
$uploaddir='restore/';
$alamatfile=$uploaddir.$nama_file;
if (move_uploaded_file($_FILES['datafile']['tmp_name'],$alamatfile)){
	$filename = 'restore/'.$nama_file.'';
	$templine = '';
	$handle = fopen('backup/'.$filename,'r');
	$lines = file($handle);
	//foreach ($lines as $line){
	//	if (substr($line, 0, 2) == '--' || $line == '')continue;
	//	$templine .= $line;
	//	if (substr(trim($line), -1, 1) == ';'){
			$hasil=$mysql->query($lines);
	//		$templine = '';
	//	}
	//}
	if(!$hasil)die('Error performing query \'<strong>'.mysql_error().'<br/>');
	echo "Berhasil Restore Database, silahkan di cek";
}else{
	echo "Proses Upload Gagal, Kode Error = ".$_FILES['location']['error'];
}	
?>