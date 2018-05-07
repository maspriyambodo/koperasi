<?php
include '../auth.php';
require_once '../class/MySQL.php';
ini_set("memory_limit","516M");
$nama_dokumen='PDF With MPDF';
define('_MPDF_PATH','../MPDF60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8','A4','','',15,10,25,15,10,10);
$ada=FALSE;
include "../lainnya/qpenyusutand.php";
$desc="REKAP MUTASI BIAYA PENYUSUTAN TANGGAL  : ".$tgl1." S/D ".$tgl2;
$mpdf->SetHTMLHeader('
	<table width="100%" style="vertical-align: bottom; font-family:Arial; font-size: 10pt; color: #000000;">
	<tr>
	<td width="15%"><span ><img src="../logo.jpg" width="90"/></span></td>
	<td width="70%" align="center" style="font-weight: bold;"> '.$desc.'<br>'.$cabang.'</td>
	<td width="15%" ></td>
	</tr>
	</table>');
ob_start(); ?>
<table style="border-collapse: collapse;font-family: Arial;font-size: 7pt;" width="100%" border="1" cellpadding="2px">
	<?php include "../memorial/rekap_nontunaixx.php";?>
</table>
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
$mpdf->SetFooter('Tanggal Cetak : {DATE j-m-Y}| |{PAGENO}');
$mpdf->useSubstitutions=false;
$mpdf->packTableData =true;
$mpdf->simpleTables = true;
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>
