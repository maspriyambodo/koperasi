<?php
if(isset($_SESSION['SESS_USER'])){
	$userid=$_SESSION['SESS_USER'];
	require 'class/MySQL.php';
	$result->query_y1("UPDATE tbluser SET status=2,loginatmp=0 WHERE userid= '$userid' LIMIT 1");
	$catat='Keluar Dari Aplikasi';
	include 'around.php';
	$result->close();
}
function write_log($log){  
	$dtime=@date('[Ydm]');
	define('LOG','logfile/'.$dtime.'log.txt');
	$time = @date('[Y-d-m:H:i:s]');
	$op=$time.' '.'Action for '.$log."\n".PHP_EOL;
	$fp = @fopen(LOG, 'a');
	$write = @fwrite($fp, $op);
	@fclose($fp);
}
?>