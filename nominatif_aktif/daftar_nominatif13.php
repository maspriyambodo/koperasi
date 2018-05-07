<?php
error_reporting(0);
ini_set('max_execution_time', 1200); 
ini_set("memory_limit","512M");
$desc='REKAP NOMINATIF HARIAN TANGGAL : '.$tanggal;
$nama_dokumen='REKAP NOMINATIF';
define('_MPDF_PATH','../MPDF60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('c','A4-L','','',10,10,25,10,10,05); 
$mpdf->SetHTMLHeader('<table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 10pt; color: #000000;"><tr><td width="15%"><span ><img src="../logo.jpg" width="90"/></span></td><td width="70%" align="center" style="font-weight: bold;"> '.$desc.'<br>'.$cabang.'</td><td width="15%" ></td></tr></table>');
ob_start();
?>
<table style="border-collapse: collapse;font-family: Arial;font-size: 7pt;" width="100%" border="1" cellpadding="2px">
	<?php include "../ketnas/form_rekap.php";?>
</table>
<?php
$html = ob_get_contents();
ob_end_clean();
ob_start();
include "../nominatif_aktif/daftar_nominatif15.php";?>
<table style="border-collapse: collapse;font-family: Arial;font-size: 7pt;" width="100%" border="1" cellpadding="2px">
	<?php include "../ketnas/form_rekap01.php";?>
</table>
<?php
$html1 = ob_get_contents();
ob_end_clean();
$mpdf->SetFooter('Tanggal Cetak : {DATE j-m-Y}| |{PAGENO}');
$mpdf->packTableData =true;
$mpdf->simpleTables = true;
$mpdf->WriteHTML($html);
$mpdf->AddPage('','NEXT-ODD','','','','','','','','','','','','','',1,1,0,0);
$mpdf->WriteHTML($html1);
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>