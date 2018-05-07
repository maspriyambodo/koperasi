<?php
include "koneksi.php";
$xxx=date('m',strtotime($tanggal));
$yyy=date('Y',strtotime($tanggal));	
$xxxx  ='k';
$xxxx  .=$xxx;
$xxxx  .=$yyy;
$text  ="SELECT norek FROM $xxxx";
$result= $mysql->query($text);
if($result) {
	echo '<table width="100%" class="ui-widget ui-widget-content">';
	echo '<tr><td align="center" bgcolor="#FF0000">Closing Akhir Bulan Sudah Dilakukan, Transaksi Batal</td></tr>';
	echo '</table>';
	exit();
}
?>