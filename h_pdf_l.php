<?php
$cabang=$result->namacabang($branch);
ini_set('max_execution_time', 1200); 
ini_set("memory_limit","512M");
define('_MPDF_PATH','MPDF60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('c','A4-L','','',10,10,25,15,10,10); 
$mpdf->SetHTMLHeader('<table width="100%" style="vertical-align: bottom; font-family: Arial; font-size: 10pt; color: #000000;"><tr><td width="15%"><span ><img src="logo.jpg" width="90"/></span></td><td width="70%" align="center" style="font-weight: bold;"> '.$desc.'<br>'.$cabang.'</td><td width="15%" ></td></tr></table>');
ob_start();
?>