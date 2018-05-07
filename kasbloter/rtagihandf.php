<?php
include '../auth.php';
include '../koneksi.php';
ini_set("memory_limit","512M");
$nama_dokumen='PDF With MPDF';
define('_MPDF_PATH','../MPDF60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8','A4','','',15,10,25,15,10,10); 
include "../kasbloter/qtagihand.php";
$desc="DAFTAR MUTASI KAS BESAR TANGGAL : ".$tgl1;
$mpdf->SetHTMLHeader('
	<table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 10pt; color: #000000;">
	<tr>
	<td width="15%"><span ><img src="../logo.jpg" width="90"/></span></td>
	<td width="70%" align="center" style="font-weight: bold;"> '.$desc.'<br>'.$cabang.'</td>
	<td width="15%" ></td>
	</tr>
	</table>
');ob_start(); ?>
<html>
<head> 
</head>
<body style="font-family: sans-serif;font-size: 7pt;">
<table class="table" style="border-collapse: collapse;" width="100%" border="1" cellpadding="2px">
	<?php include "../kasbesar/ftagihand.php";?>
</table>
</body>
</html><?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->SetFooter('Tanggal Cetak : {DATE j-m-Y}| |{PAGENO}');
$mpdf->useSubstitutions=false;
$mpdf->packTableData =true;
$mpdf->simpleTables = true;
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;?>
