<?php include "h_tetap.php";$norek=$result->c_d($_GET['nonas']);$branch=$result->c_d($_GET['branch']);$pilih=$result->c_d($_GET['p']);$hasil=$result->query_y1("SELECT a.norek,a.nonas,a.sufix,a.produk,a.kdkop,a.tgtran,a.nomi,a.jangka,a.suku,b.nama,a.saldoa,a.kolek,a.nopen FROM $tabel_kredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.norek='$norek' AND a.branch='$branch' LIMIT 1");$row=$result->row($hasil);$norek=$row['norek'];$saldoa=$row['saldoa'];$nonas=$row['nonas'];$nama=$row['nama'];$tgtran=$row['tgtran'];$jangka=$row['jangka'];$nomi=$row['nomi'];$suku=$row['suku'];$kdkop=$row['kdkop'];$kolek=$row['kolek'];$nopen=$row['nopen'];$tabel_form="payment_scedule.php";$kolom=9;$kertas=1;$desc="JADAWAL PEMBAYARAN ANGSURAN";
if($pilih==2){
	$cabang=$result->namacabang($branch);
	ini_set('max_execution_time', 1200); 
	ini_set("memory_limit","512M");
	define('_MPDF_PATH','MPDF60/');
	include(_MPDF_PATH . "mpdf.php");
	$mpdf=new mPDF('c','A4','','',5,5,25,15,10,10); 
	$mpdf->SetHTMLHeader('
	<table width="100%" style="vertical-align: bottom; font-family: Arial; font-size: 10pt; color: #000000;"><tr><td width="15%"><span ><img src="logo.jpg" width="90"/></span></td><td width="70%" align="center" style="font-weight: bold;">'.$desc.'<br>'.$cabang.'</td><td width="15%"></td></tr></table>');
	ob_start();include $tabel_form;
	
	$html = ob_get_contents();
	ob_end_clean();
	$mpdf->SetFooter('Tanggal Cetak : {DATE j-m-Y}| |{PAGENO}');
	$mpdf->useSubstitutions=false;
	$mpdf->packTableData =true;
	$mpdf->simpleTables = true;
	$mpdf->WriteHTML(utf8_encode($html));
	$mpdf->Output($nama_dokumen.".pdf" ,'I');
	exit;
}else{
	include 'header_xls.php';
	echo '<table style="border-collapse: collapse;" width="100%" border="1" cellpadding="3px">';
	//echo '<table width="100%" class="table" style="font-family: Arial; font-size: 9pt;">';
	echo '<tr><td colspan="'.$kolom.'" align="center">'.$desc.'<br>'.$cabang.'</td></tr>';
	include $tabel_form;
	echo '</table>';
	include 'bawah_xls.php';	
} ?>