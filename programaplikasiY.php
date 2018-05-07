<?php
include 'h_tetap.php';
$text='';
if(isset($_POST["id"])){
	$idCount = count($_POST["id"]);
	for($i=0;$i<$idCount;$i++) {
		$text .="UPDATE tabel_menu SET kode0='".$_POST["kode0"][$i]."',kode1='".$_POST["kode1"][$i]."',kode2='".$_POST["kode2"][$i]."',kode3='".$_POST["kode3"][$i]."',kode4='".$_POST["kode4"][$i]."',kodem0='".$_POST["kodem0"][$i]."',kodem1='".$_POST["kodem1"][$i]."',kodem2='".$_POST["kodem2"][$i]."',kodem3='".$_POST["kodem3"][$i]."',kodem4='".$_POST["kodem4"][$i]."',kodem5='".$_POST["kodem5"][$i]."' WHERE id='".$_POST["id"][$i]."' LIMIT 1;";
	}
	$text=substr_replace($text,'',-1);
	$result->multi_y($text);
	echo 'Sukses Update';
}else{
	echo 'Error ID...?';
}
?>