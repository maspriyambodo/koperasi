<?php 
include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../lap_deposito/query_bunga00.php";
$desc="RINCIAN PEMBAYARAN BUNGA DEPOSITO";
$tabel_form="../lap_deposito/daftar_bunga00.php";
$kolom=8;$kertas=2;
switch ($pilih){
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	include '../judul.php';
	echo "<table width='100%' class='table'>";
	include $tabel_form;
	echo "</table>";
	break;
case "2":
	ini_set('max_execution_time', 1200); 
	ini_set("memory_limit","512M");
	define('_MPDF_PATH','../MPDF60/');
	include(_MPDF_PATH . "mpdf.php");
	$mpdf=new mPDF('c','A4','','',10,10,25,15,10,10); 
	$nama_dokumen=$branch.$nonas.$sufix;
	$mpdf->SetHTMLHeader('<table width="100%" style="vertical-align: bottom; font-family: Arial; font-size: 8pt; color: #000000;"><tr><td style="vertical-align: middle;" width="20%">Tanggal : {DATE W F Y} </td><td width="60%" align="center" style="font-weight: bold;"></td><td style="vertical-align: middle;" width="20%"><span><img src="../logo.jpg" width="90"/></span></td></tr></table>');

	ob_start();
	echo '<table style="border-collapse:collapse;font-family: Arial;font-size: 9pt;" width="100%" cellpadding="3px">
	<tr><td colspan="2">Kepada YTH</td></tr>
	<tr><td colspan="2">Bpk/Ibu '.$nama.'</td></tr>
	<tr><td colspan="2">Di Tempat</td></tr>
	<tr><td colspan="2">Perihal : <u>Perpanjangan Deposito Jatuh Tempo</u></td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="2">Bersama ini kami sampaikan bahwa deposito Bpk/Ibu telah di perpanjang secara otomatis by system dengan rincian sebagai berikut :</td></tr>
	<tr><td width="20%">NO NASABAH</td><td width="80%">: '.$branch.$nonas.$sufix.'</td></tr>
	<tr><td>NO BILYET</td><td>: '.$nomor_bilyet.'-'.$seri_bilyet.'</td></tr>
	<tr><td>NOMINAL / JW / SB</td><td>: '.formatRupiah($nominal).' / '.$jangka_waktu.' Bulan / '.$suku_bunga.' %</td></tr>
	<tr><td>TGL BUKA</td><td>: '.date_sql($tgl_buka).' S/D '.date_sql($tgl_akhir).'</td></tr>
	</table>
	<table style="border-collapse: collapse;font-family: Arial;font-size: 8pt;" width="100%" border="1" cellpadding="2px">';
	include $tabel_form;
	echo '</table>
	<table style="border-collapse:collapse;font-family: Arial;font-size: 9pt;" width="100%" cellpadding="3px">
	<tr><td>&nbsp;</td></tr>
	<tr><td>Demikian disampaikan, atas perhatian dan kerja samanya diucapkan terima kasih</td></tr>
	</table>';
	$html = ob_get_contents();
	ob_end_clean();


	$mpdf->SetFooter('
	<table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt;color: #000000; font-weight: bold; font-style: italic;"><tr><td width="90%"><span style="font-weight: bold; font-style: italic;">Advis deposito ini dicetak oleh system dan tidak memerlukan tanda tangan pejabat koperasi serta tidak dapat digunakan untuk pencairan deposito.</span></td></tr></table>');
	$mpdf->useSubstitutions=false;
	$mpdf->packTableData =true;
	$mpdf->simpleTables = true;
	$mpdf->WriteHTML(utf8_encode($html));
	$mpdf->Output($nama_dokumen.".pdf" ,'I');
	exit;
	break;
}
?>