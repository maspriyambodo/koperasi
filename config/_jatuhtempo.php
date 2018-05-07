<?php $tabel ='nabasa.tem_payment';$tabel .=$blnxxx;$tabel .=substr('00'.$thnxxx,-2);
$r=$result->res("SELECT tanggal FROM $tabel WHERE norek='$norek' ORDER BY angsurke DESC LIMIT 1");
if($result->num($r)>0){$b=$result->row($r);$xtgtran=$b['tanggal'];}else{$result->msg_error('Data Tagihan Tidak Ditemukan..?');}
if($kdkop==1){
	$xket='Pendapatan Per Bulan';
	$yket='Pendapatan Kotor Per Bulan';
	$wket='Pendapatan Bersih Per Bulan';
}elseif($kdkop==2){
	$xket='Pendapatan Per Hari';
	$yket='Pendapatan Kotor Per Hari';
	$wket='Pendapatan Bersih Per Hari';
}else{
	$xket='Pendapatan Per Minggu';
	$yket='Pendapatan Kotor Per Minggu';
	$wket='Pendapatan Bersih Per Minggu';
}
?>