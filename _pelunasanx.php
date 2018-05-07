<?php
$hasil=$result->query_x1("SELECT angsurke,tgtagihan,tanggal,SUM(if(kdtran=111,pokok,0))-SUM(if(kdtran=777,pokok,0)) AS pokok,SUM(if(kdtran=111,bunga,0))-SUM(if(kdtran=777,bunga,0)) AS bunga,SUM(if(kdtran=111,adm,0))-SUM(if(kdtran=777,adm,0)) AS adm FROM $tabel_payment WHERE norek='$no_paymet' GROUP BY angsurke ORDER BY angsurke");
$kkp=0;$kkb=0;$kka=0;$jkk=0;$kk=0;$jpokok=0;$jbunga=0;$jadm=0;$angsurke=0;$ada=FALSE;
$new_date_1x=date_sql($tanggal);
if($kdkop==1){
	$tglakhir=tglAkhirBulan($thnxxx,intval($blnxxx));
	$new_date_1x =$thn.'-'.$bln.'-'.$tglakhir;
}
list($year, $month, $day) = explode('-', $new_date_1x);
$new_date_1 = sprintf('%04d%02d%02d', $year, $month, $day);
while($r=$result->row($hasil)){
	$jkk=$r['pokok'];
	$jpokok=$jpokok+$r['pokok'];
	$jbunga=$jbunga+$r['bunga'];
	$jadm=$jadm+$r['adm'];
	$new_date_2x=$r['tanggal'];
	list($year, $month, $day) = explode('-', $new_date_2x);
	$new_date_2 = sprintf('%04d%02d%02d', $year, $month, $day);
	if($ada==FALSE){
		if($jangka==$r['angsurke']){
			$angsurke=$jangka;$ada=TRUE;
		}else{
			if($jkk>0 && $new_date_2>$new_date_1){
				$angsurke=intval($r['angsurke']);
				$angsurke=intval($angsurke-1);$ada=TRUE;
			}
		}
	}
	if($jkk>0 && $new_date_2<=$new_date_1){
		$kk++;
	}
}
?>