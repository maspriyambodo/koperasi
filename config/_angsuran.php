<?php
$bulany=$thnxxx.$blnxxx;
$hasil=$result->query_x1("SELECT angsurke,bulan FROM payment WHERE norek='$norek' AND bulan='$bulany' LIMIT 1");
if($result->num($hasil)<1){
	$hasil=$result->query_x1("SELECT angsurke,bulan FROM payment WHERE norek='$norek' ORDER BY angsurke DESC LIMIT 1");
	if($result->num($hasil)<1) $result->msg_erorr('Payment Tagihan Debitur Rekening '.$norek.' Tidak Ada ?');
	$data=$result->row($hasil);
	$angsurke=$data['angsurke'];
	$bulanke=$data['bulan'];
}else{
	$data=$result->row($hasil);
	$angsurke=$data['angsurke'];
	$bulanke=$data['bulan'];
}
?>