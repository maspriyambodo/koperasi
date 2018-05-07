<?php
include '../h_tetap.php';
$ada=TRUE;
include "../klaim/rpt_pengajuan00.php";
$cabang=$result->namacabang($branch);
ini_set('max_execution_time', 1200); 
ini_set("memory_limit","512M");
define('_MPDF_PATH','../MPDF60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('c','A4-P','','',10,10,30,30,15,15); 
$mpdf->SetHTMLHeader('<table width="100%" style="vertical-align: bottom; font-family: Arial; font-size: 12pt; color: #000000;"><tr><td width="15%"><span ><img src="../logo.jpg" width="90"/></span></td><td width="70%" align="center" style="font-weight: bold;">FORMOLIR KLAIM MENINGGAL DUNIA ASURANSI JIWA'.'<br>'.$cabang.'</td><td width="15%" ></td></tr><tr><td colspan="3"><hr/></td></tr></table>');
//$mpdf->shrink_tables_to_fit=1;
ob_start();
while ($row=$result->row($hasil)){
	$xkdkop=ket_tagihh($row['kdkop']);
	echo '<table style="border-collapse:collapse;font-family:Arial,sans-serif;font-size:9pt;" width="100%" cellpadding="3px">
	<tr>
	<td>
		<table>
			<tr><td colspan="3" height="30"> </td></tr>
			<tr><td collspan="3">Data Pengajuan Tertanggung</td></tr>
			<tr><td colspan="3" height="15"> </td></tr>
			<tr>
				<td width="40%">Nama</td>
				<td width="3%">:</td>
				<td>'.$row['nama'].'</td>
			</tr>
			<tr>
				<td width="40%">Tempat / Tanggal Lahir</td>
				<td width="3%">:</td>
				<td>'.$row['tmp_lahir'].'/'.date_sql($row['tgl_lahir']).'</td>
			</tr>
			<tr>
				<td width="40%">No Rekening Pinjaman / Anggota</td>
				<td width="3%">:</td>
				<td>'.$row['norek'].'/'.$row['nonas'].'</td>
			</tr>
			<tr>
				<td width="40%">Tanggal Awal Pinjam</td>
				<td width="3%">:</td>
				<td>'.date_sql($row['tgtran']).'</td>
			</tr>
			<tr>
				<td width="40%">Tanggal Akhir Pinjaman</td>
				<td width="3%">:</td>
				<td>'.date_sql($row['tgl_jatuh_tempo']).'</td>
			</tr>
			<tr>
				<td width="40%">Plafond</td>
				<td width="3%">:</td>
				<td>'.formatrp($row['plafond']).'</td>
			</tr>
			<tr>
				<td width="40%">OBD</td>
				<td width="3%">:</td>
				<td>'.formatrp($row['jumlah_klaim']).'</td>
			</tr>
			<tr>
				<td width="40%">Tempat / Tanggal Meninggal</td>
				<td width="3%">:</td>
				<td>'.$row['tmp_mati'].' / '.date_sql($row['tgl_mati']).'</td>
			</tr>
			<tr>
				<td width="40%">Sebab Meninggal</td>
				<td width="3%">:</td>
				<td>'.$row['sebab_mati'].'</td>
			</tr>
			<tr>
				<td width="40%">Keterangan Sebab Meninggal</td>
				<td width="3%">:</td>
				<td>'.$row['ket_mati'].'</td>
			</tr>
			<tr><td colspan="3" height="15"> </td></tr>
			<tr><td colspan="3">Sesuai polis, permohonan klaim asuransi ini harus dilengkapi dengan syarat-syarat berikut :</td></tr>
			<tr><td colspan="3" height="15"> </td></tr>
		</table>
	</td>
	</tr>
	<tr>
	<td>
		<table>
			<tr>
				<td valign="top"></td>
				<td align="justify">
				_______ Surat keterangan meninggal dunia  dari lurah/RS/Kepolisian asli ataupun legalisir.
				</td>
			</tr>
			<tr><td colspan="3" height="15"> </td></tr>
			<tr>
				<td valign="top"></td>
				<td align="justify">
				_______ Foto copy Karip Tertanggung.
				</td>
			</tr>
			<tr><td colspan="3" height="15"> </td></tr>
			<tr>
				<td valign="top"></td>
				<td align="justify">
				_______ Surat dari perwakilan Republik indonesia setempat dalam hal meninggal dunia di luar negeri.
				</td>
			</tr>
			<tr><td colspan="3" height="15"> </td></tr>
			<tr>
				<td valign="top"></td>
				<td align="justify">
				_______ Payment schedule/rekening koran /bukti Transaksi Bulanan.
				</td>
			</tr>
		</table>
	</td>
	</tr>
	<tr>
	<td>
		<table>
			<tr><td height="30" align="center"> </td></tr>
			<tr><td align="center">'.$ncabang.', '.$tanggal.'</td></tr>
			<tr><td align="center">Mengetahui,</td></tr>
			<tr><td height="70" align="center" valign="bottom">______________________________________</td></tr>
			<tr><td height="110"> </td></tr>
		</table>
	</td>
	</tr>
	</table>';
}
$html = ob_get_contents();
ob_end_clean();
$mpdf->SetFooter('Tanggal Cetak : {DATE j-m-Y}| |{PAGENO}');
$mpdf->useSubstitutions=false;
$mpdf->packTableData =true;
$mpdf->simpleTables = true;
//$mpdf->autoPageBreak = false;
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>