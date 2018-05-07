<?php 
include '../h_atas.php';
$t=$result->c_d($_GET['tgl']);
$pilih=$result->c_d($_GET['p']);
$branch=$result->c_d($_GET['branch']);
$t0=date_sql($t);
$namafile='akuntansi.aruskas'.substr($t,-4);
$hasil = $result->query_x1("SELECT tanggal FROM nabasa.tanggal WHERE tanggal='$t0' ORDER BY tanggal LIMIT 1");
if($result->num($hasil)<1){
	$result->msg_error('Tanggal Tersebut Tidak Ada Transaksi..?');
}
$tgl = date('d',strtotime($t0));
$bln=date('m',strtotime($t0));
$thn=date('Y',strtotime($t0));
$fieldhari2='haridk'.substr('00'.$tgl,-2);
$fieldhari3='harikk'.substr('00'.$tgl,-2);
$fieldhari4='haridm'.substr('00'.$tgl,-2);
$fieldhari5='harikm'.substr('00'.$tgl,-2);
$fieldhari6='hari'.substr('00'.$tgl,-2);
$hasil = $result->query_x1("SELECT tanggal FROM tanggal WHERE tanggal<='$t0' ORDER BY tanggal DESC LIMIT 2 OFFSET 1");
$ingat= $result->row($hasil);
$t1=date_sql($ingat['tanggal']);
$tgll = date('d',strtotime($ingat['tanggal']));
$blnl=date('m',strtotime($ingat['tanggal']));
$thnl=date('Y',strtotime($ingat['tanggal']));
$fieldhari1='hari'.substr('00'.$tgll,-2);
?>