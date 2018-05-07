<?php 
$tgl=date('d',strtotime($t));
$bln=date('m',strtotime($t));
$thn=date('Y',strtotime($t));
$hasil=$result->query_x1("SELECT tanggal FROM tanggal WHERE tanggal<='$t' ORDER BY tanggal DESC LIMIT 2 OFFSET 1");
$ingat=$result->row($hasil);
$tgll=date('d',strtotime($ingat['tanggal']));
$blnl=date('m',strtotime($ingat['tanggal']));
$thnl=date('Y',strtotime($ingat['tanggal']));
$fieldhari1='hari'.substr('00'.$tgll,-2);
if($bln!=$blnl && $thn!=$thnl){
	$blnl=12;
	$thnl=$thn-1;
	$fieldhari1='bulan'.substr('00'.$blnl,-2);
	$tabeln='akuntansi.sandi'.$thnl;
	$hasil=$result->query_lap("SELECT branch,norekgssl,$fieldhari1 FROM $tabeln WHERE norekgssl='$rekening' ORDER BY norekgssl LIMIT 1");
}else{
	if($bln!=$blnl){
		$fieldhari1='bulan'.substr('00'.$blnl,-2);
	}
	$hasil=$result->query_lap("SELECT branch,norekgssl,$fieldhari1 FROM $tabel_sandi WHERE norekgssl='$rekening' ORDER BY norekgssl LIMIT 1");
}
$row=$result->row($hasil);
$saldo_awal=$row[$fieldhari1];
?>