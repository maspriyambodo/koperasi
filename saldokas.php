<?php 
$t=date_sql($tanggal);
$tgl=date('d',strtotime($t));
$bln=date('m',strtotime($t));
$thn=date('Y',strtotime($t));
$tabel ='nabasa.tran';
$tabel .=$bln;
$tabel .=substr($thn,2,2);
$hasil=$result->query_y1("SELECT tanggal  FROM tanggal ORDER BY tanggal DESC LIMIT 2 OFFSET 1");
if ($result->num($hasil)<1){ 
	$xp='Tabel Tanggal Belum Ada...?';
	$result->msg_error($xp);
}
$ingat= $row=$result->row($hasil);
$tgll = date('d',strtotime($ingat['tanggal']));
$blnl=date('m',strtotime($ingat['tanggal']));
$thnl=date('Y',strtotime($ingat['tanggal']));
$fieldhari1='hari'.substr('00'.$tgll,-2);
if($bln!=$blnl && $thn!=$thnl){
	$blnl=12;
	$thnl=$thn-1;
	$fieldhari1='bulan'.substr('00'.$blnl,-2);
	$tabeln='akuntansi.sandi'.$thnl;
	$hasil=$result->query_y("SELECT branch,norekgssl,$fieldhari1 FROM $tabeln WHERE norekgssl='$rekening' ORDER BY norekgssl LIMIT 1");
}else{
	if($bln!=$blnl){
		$fieldhari1='bulan'.substr('00'.$blnl,-2);
	}
	$hasil=$result->query_y("SELECT branch,norekgssl,$fieldhari1 FROM $tabel_sandi WHERE norekgssl='$rekening' ORDER BY norekgssl LIMIT 1");
}
if ($result->num($hasil)<1){ 
	$xp='Rekening Kas Tidak Ditemukan...?';
	$result->msg_error($xp);
}
$row=$result->row($hasil);
$saldo_kas=$row[$fieldhari1];
$hasil=$result->query_y1("SELECT branch,norekgl,tanggal,SUM(IF(substr(kdtran,1,1)='1',jumlah,0)) AS debetkas,SUM(IF(substr(kdtran,1,1)='2',jumlah,0)) AS kreditkas FROM $tabel WHERE tanggal='$t' AND kdbranch='$branch' AND jtransaksi=88 GROUP BY jtransaksi ORDER BY jtransaksi");
if ($result->num($hasil)>0){ 
	$row=$result->row($hasil);
	$saldo_kas=$saldo_kas+$row['debetkas']-$row['kreditkas'];
}
?>