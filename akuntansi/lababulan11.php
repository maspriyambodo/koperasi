<?php 
$tabel='akuntansi.labarugi';
$ada=FALSE;include 'neracabulan00.php';
$desc="POSISI SHU BULANAN PER : ".strtoupper(nmbulan($bln)).' '.$thn;
switch ($pilih){
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	include '../judul.php';
	echo "<table width='100%' class='table'>";
	include 'neracabulan22.php';
	echo "</table>";
	break;
case "2":
	include 'h_pdf_l.php';
	echo '<table style="border-collapse:collapse;font-size:8pt;font-family: Arial;" width="100%" border="1" cellpadding="3px">';
	include 'neracabulan22b.php';
	echo "</table>";
	$html = ob_get_contents();
	ob_end_clean();
	ob_start();
	$y=1;$fieldhari7='bulan07';$fieldhari8='bulan08';$fieldhari9='bulan09';$fieldhari10='bulan10';$fieldhari11='bulan11';$fieldhari12='bulan12';$bulan1=1;$bulan2=2;$bulan3=3;$bulan4=4;$bulan5=5;$bulan6=6;$bulan7=7;$bulan8=8;$bulan9=9;$bulan10=10;$bulan11=11;$bulan12=12;
	if($branch=='0111'){
		if($thn!=$thnxxx){
			$tabel_sandi='akuntansi.sandi'.$thn;
		}
		$hasil=$result->query_x1("SELECT a.uraian,a.sandi,SUM(b.$fieldhari7) AS $fieldhari7,SUM(b.$fieldhari8) AS $fieldhari8,SUM(b.$fieldhari9) AS $fieldhari9,SUM(b.$fieldhari10) AS $fieldhari10,SUM(b.$fieldhari11) AS $fieldhari11,SUM(b.$fieldhari12) AS $fieldhari12 FROM $tabel a JOIN $tabel_sandi b ON a.sandi=b.nonas GROUP BY b.nonas ORDER BY b.nonas");
	}else{
		if($thn!=$thnxxx){
			$tabel_sandi='akuntansi.sandi'.$thn;
		}
		$hasil=$result->query_x1("SELECT a.uraian,a.sandi,$fieldhari7,$fieldhari8,$fieldhari9,$fieldhari10,$fieldhari11,$fieldhari12 FROM $tabel a JOIN $tabel_sandi b ON a.sandi=b.nonas ORDER BY b.nonas");
	}
	echo '<table style="border-collapse:collapse;font-size:8pt;font-family: Arial;" width="100%" border="1" cellpadding="3px">';
	include 'neracabulan22a.php';
	echo "</table>";
	$html1 = ob_get_contents();
	ob_end_clean();
	$mpdf->SetFooter('Tanggal Cetak : {DATE j-m-Y}| |{PAGENO}');
	$mpdf->useSubstitutions=false;
	$mpdf->packTableData =true;
	$mpdf->simpleTables = true;
	$mpdf->WriteHTML($html);
	$mpdf->AddPage('','NEXT-ODD','','','','','','','','','','','','','',1,1,0,0);
	$mpdf->WriteHTML($html1);
	$mpdf->Output($nama_dokumen.".pdf" ,'I');
	exit;	
	break;
case "3":
	include 'header_xls.php';
	echo '<table width="100%" class="table" style="font-family: Arial; font-size: 9pt;">';
	echo '<tr><td colspan="9" align="center">'.$desc.'</td></tr>';
	include 'neracabulan22.php';
	echo '</table>';
	include 'bawah_xls.php';
	break;
}
?>