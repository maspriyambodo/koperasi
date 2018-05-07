<?php include 'h_tetap.php';$hasil=$result->res("SELECT nama7 FROM $tabel_ttd WHERE branch='$kcabang'");if($result->num($hasil)<1)$result->msg_error('Tabel Tanda Tangan Belum Di Isi...?');$ttd=$result->row($hasil);$id = $result->c_d($_GET['mnorek']);$hasil = $result->query_lap("SELECT a.branch,a.norek,b.nama,b.alamat,a.tglahir,a.nokarip,a.norek,a.nomi,a.kdkop,a.noktp,a.kdskep,a.pensk,a.tgsk,a.nosk,a.nmbayar,a.nopen,a.nocitra,a.tgtran,a.nomi,a.jangka,a.agunan1,a.agunan2,a.agunan3,a.agunan4,a.agunan5,a.agunan6 FROM $tabelKredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.id='$id'");$row = $result->row($hasil);$kdskep=$row['kdskep'];$nosk=$row['nosk'];$pensk=$row['pensk'];$tgsk=$row['tgsk'];$agunan1=$row['agunan1'];$agunan2=$row['agunan2'];$agunan3=$row['agunan3'];$agunan4=$row['agunan4'];$agunan5=$row['agunan5'];$agunan6=$row['agunan6'];$nocitra=$row['nocitra'];$nmbayar=$row['nmbayar'];$nopen=$row['nopen'];$norek=$row['norek'];$tgtran=$row['tgtran'];$nomi=$row['nomi'];$kdkop=$row['kdkop'];$nama=$row['nama'];$alamat=$row['alamat'];$tglahir=$row['tglahir'];$noktp=$row['noktp'];$jangka=$row['jangka'];$nokarip=$row['nokarip'];$xtgtran=$result->jatuh_tempo($row['norek']);ini_set("memory_limit","516M");$nama_dokumen='PDF With MPDF';define('_MPDF_PATH','MPDF60/');include(_MPDF_PATH . "mpdf.php");$mpdf=new mPDF('utf-8','A4','','',15,10,25,15,10,10);$mpdf->SetHTMLHeader('<table width="100%" style="vertical-align: bottom;font-family:sans-serif;font-size:8pt;color:#000000;"><tr><td width="20%"><span ><img src="logo.jpg" width="90"/></span></td><td width="60%" align="center" valign="top">Sk Menteri Koperasi Nomor : II/BH/XXIV/XI/2012 <br/>Tanggal : 19 Nopember 2012<br/>Alamat : PURI TAMAN SARI BLOK G.8 NO 11</td><td width="20%" ></td></tr><tr><td colspan="3"><hr/></td></tr></table>');ob_start();?>
<table style="font-size:8pt;font-family:Arial;border-collapse:collapse;" width="100%" align="center" cellpadding="3px">
	<tr><td colspan="3" align="center" style="font-size:12pt;">	<strong><u>TANDA TERIMA DOKUMEN</u></strong></td></tr>
	<tr><td colspan="2">&nbsp;<p>&nbsp;</p></td></tr>
	<tr>
		<td height="28" colspan="3">Yang bertanda tangan di bawah ini : </td>
		</tr>
	<tr>
		<td width="180">Nama </td>
		<td colspan="2" align="left">: <?php echo $nama;?></td>
	</tr>
	<tr>
		<td>Nomor Rekening </td>
		<td colspan="2" align="left">: <?php echo $norek;?></td>
	</tr>
	<tr>
		<td colspan="3" align="justify">Menyatakan bahwa untuk menjamin pembayaran semua kewajiban yang terhutang oleh saya kepada <strong>KSP NABASA</strong>, dengan ini menyerahkan asli <?php echo $xkdskep;?> dengan rincian sbb:</td>
	</tr>
	<tr>
		<td>1. Nomor Agunan </td>
		<td colspan="2">: <?php echo $nosk;?></td>
		</tr>
	<tr>
		<td>2. Atas Nama </td>
		<td colspan="2" align="left">: <?php echo $nama;?></td>
		</tr>
	<tr>
		<td>3. Pembuat Agunan </td>
		<td colspan="2" align="left">: <?php echo $pensk;?></td>
		</tr>
	<tr>
		<td >4. Tanggal Agunan</td>
		<td colspan="2" align="left">: <?php echo $tgsk;?></td>
	</tr>
	<tr>
		<td height="28" colspan="3" align="justify">Saya menyatakan bahwa selama saya masih memiliki kewajiban kepada <strong>KSP NABASA</strong>, maka agunan tidak dapat diambil/atau diminta oleh saya.</td>
	</tr>
</table>
<table class="items" style="font-size:9pt; border-collapse: collapse;" width="100%" border="0" align="center" cellpadding="3px">
	<tr>
		<td align="center">&nbsp;</td>
		<td align="center"><?php echo $ncabang;?> , <?php echo date("d F Y",strtotime($tgtran));?></td>
	</tr>
	<tr>
		<td align="center">YANG MENERIMA</td>
		<td align="center">YANG MENYERAHKAN</td>
	</tr>
	<tr>
		<td colspan="2" height="20"><h1>&nbsp;</h1></td>
	</tr>
	<tr>
		<td colspan="2" height="20"><h1>&nbsp;</h1></td>
	</tr>
	<tr>
		<td align="center"><?php echo $ttd['nama7'];?></td>
		<td align="center"><?php echo $row['nama'];?></td>
	</tr>
</table>
<?php
$html = ob_get_contents(); 
ob_end_clean();
$mpdf->SetFooter('Tanggal Cetak : {DATE j-m-Y}| | Lembar satu untuk nasabah');
$mpdf->useSubstitutions=false;
$mpdf->packTableData =true;
$mpdf->simpleTables = true;
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>
