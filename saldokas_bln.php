<?php 
$blnl=$bln-1;
$thnl=$thn;
if($blnl==0){
	$blnl=12;
	$thnl=$thn-1;
}
$fieldhari1='bulan'.substr('00'.$blnl,-2);
if($thn!=$thnxxx){
	if($bln=='01'){
		$blnl=12;
		$thnl=$thn-1;
		$fieldhari1='tahun12a';
		$tabeln='akuntansi.sandi'.$thnl;
		$tabel_sandi='akuntansi.sandi'.$thn;
		$hasil=$result->query_lap("SELECT branch,norekgssl,$fieldhari1 FROM $tabeln WHERE norekgssl='$rekening' AND branch='$branch' ORDER BY norekgssl LIMIT 1");
	}else{
		$tabeln='akuntansi.sandi'.$thn;
		$hasil=$result->query_lap("SELECT branch,norekgssl,$fieldhari1 FROM $tabeln WHERE norekgssl='$rekening' AND branch='$branch' ORDER BY norekgssl LIMIT 1");	
	}
}else{
	$hasil=$result->query_lap("SELECT branch,norekgssl,$fieldhari1 FROM $tabel_sandi WHERE norekgssl='$rekening' AND branch='$branch' ORDER BY norekgssl LIMIT 1");
}
$row=$result->row($hasil);
$saldo_awal=$row[$fieldhari1];
?>