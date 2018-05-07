<?php
$file=$_GET['nama_file'];
header("Content-Disposition: attachment; filename=".$file);
header("Content-length: ".$file);
header("Content-type: ".$file);
$fp = fopen("backup/".$file, 'r');
$content = fread($fp, filesize('./backup/'.$file));
fclose($fp);
echo $content;
exit;
?>
