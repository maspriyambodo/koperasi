<?php
$desc="LAPORAN REKAP SETORAN ANGSURAN BULAN : ".nmbulan($bln).' '.$thn;
$desc2="REKAP SETORAN ANGSURAN SELURUH";
$desc3="ANALISA REKAP SETORAN SELURUH";
$nama_dokumen='Rekap_Setoran'.$bln.$thn;
ini_set("memory_limit","516M");
define('_MPDF_PATH','../MPDF60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8','A4','','',15,10,25,15,10,5);
$mpdf->SetHTMLHeader('
<table width="100%" style="vertical-align: bottom; font-family: Arial; font-size: 10pt; color: #000000;">
<tr>
<td width="15%"><span ><img src="../logo.jpg" width="90"/></span></td>
<td width="70%" align="center" style="font-weight: bold;"> '.$desc.'<br>'.$cabang.'</td>
<td width="15%" ></td>
</tr>
</table>');
ob_start();?>
<table style="border-collapse: collapse;font-family: Arial;font-size: 7pt;" width="100%" border="1" cellpadding="2px">
	<tr><td colspan="10" align="center"><strong><?php echo $desc2; ?></strong></td></tr>
	<?php include "../laprekap/rekapsetor03x.php";?>
</table>
<?php
$html1 = ob_get_contents();
ob_end_clean();
ob_start();
include "../laprekap/query_setoran032.php"; 
?>
<table style="border-collapse: collapse;font-family: Arial;font-size: 7pt;" width="100%" border="1" cellpadding="2px">
	<tr><td colspan="12" align="center"><strong><?php echo $desc3; ?></strong></td></tr>
	<?php include "../laprekap/rekapsetor03y.php";?>
</table>
<?php
$html2 = ob_get_contents();
ob_end_clean();
$mpdf->SetFooter('Tanggal Cetak : {DATE j-m-Y}| |{PAGENO}');
$mpdf->packTableData =true;
$mpdf->simpleTables = true;
$mpdf->WriteHTML($html1);
$mpdf->AddPage('','NEXT-ODD','','','','','','','','','','','','','',1,1,0,0);
$mpdf->WriteHTML($html2);
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>