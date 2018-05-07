<?php 
$hasil=$result->query_x1("SELECT tanggal FROM tanggal WHERE tanggal<='$t' ORDER BY tanggal DESC LIMIT 2 OFFSET 1");
$ingat= $result->row($hasil);
$tgll=date('d',strtotime($ingat['tanggal']));
$blnl=date('m',strtotime($ingat['tanggal']));
$thnl=date('Y',strtotime($ingat['tanggal']));
$fieldhari1='hari'.substr('00'.$tgll,-2);
$hasil=$result->query_x1("SELECT $fieldhari1 FROM $tabel_sandi WHERE norekgssl='$norek' LIMIT 1");
$row= $result->row($hasil);
$saldo_awal=$row[$fieldhari1];
?>