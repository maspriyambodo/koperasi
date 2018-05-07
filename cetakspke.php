<?php include 'h_tetap.php';include 'Lib/ftanggal.php';$hasil=$result->res("SELECT nama6 FROM $tabel_ttd WHERE branch='$kcabang'");if($result->num($hasil)<1)$result->msg_error('Tabel Tanda Tangan Belum Di Isi...?');$ttd=$result->row($hasil);$id=$result->c_d($_GET['mnorek']);$hasil=$result->query_lap("SELECT a.branch,a.norek,a.tgtran,b.nama,a.tglahir,a.nocitra,a.norek,a.nomi,a.kdkop,a.nopen,a.tgtran,a.jangka,a.pokok,a.bunga,a.administrasi,a.noktp,b.alamat,b.lurah,b.camat FROM $tabelKredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.id='$id'");$row = $result->row($hasil);$norek=$row['norek'];$kdkop=$row['kdkop'];$nama=$row['nama'];$jangka=$row['jangka'];$tgtran=$row['tgtran'];$xtgtran=$result->jatuh_tempo($row['norek']);$dy='01';$bl=date('m',strtotime($row['tgtran']));$th=date('Y',strtotime($row['tgtran']));$date=new DateTime();$date->setDate($th,$bl,$dy);addMonths($date,1);$mtgtran=$date->format('Y-m-d');ini_set("memory_limit","516M");$nama_dokumen='PDF With MPDF';define('_MPDF_PATH','MPDF60/');include(_MPDF_PATH . "mpdf.php");$mpdf=new mPDF('utf-8','A4','','',15,15,25,15,10,10);$mpdf->SetHTMLHeader('<table width="100%" style="vertical-align: bottom;font-family:sans-serif;font-size:8pt;color:#000000;"><tr><td width="20%"><span ><img src="logo.jpg" width="90"/></span></td><td width="60%" align="center" valign="top">Sk Menteri Koperasi Nomor : II/BH/XXIV/XI/2012 <br/>Tanggal : 19 Nopember 2012<br/>Alamat : PURI TAMAN SARI BLOK G.8 NO 11</td><td width="20%" ></td></tr><tr><td colspan="3"><hr/></td></tr></table>');ob_start(); //date('d',strtotime($row['tgtran']));?>
<table style="font-size:8pt;font-family:Arial;border-collapse:collapse;" width="100%" align="center" cellpadding="3px">
	<tr><td colspan="3" align="center" style="font-size:12pt;">	<strong><u>SURAT KUASA</u></strong></td></tr>
	<tr><td colspan="2">&nbsp;<p>&nbsp;</p></td></tr>
	<tr><td colspan="2">Yang bertanda tangan di bawah ini :</td></tr>
	<tr>
		<td align="left">Nama</td><td>: <?php echo $row['nama'];?></td>
	</tr>
	<tr>
		<td align="left">Alamat</td><td>: <?php echo $row['alamat'].' KEL. '.$row['lurah'].' KEC. '.$row['camat'];?></td>
	</tr>
	<tr>
		<td align="left">Nopen</td><td>: <?php echo $row['nopen'];?></td>
	</tr>
	<tr>
		<td align="left">Nomor Rekening</td><td>: <?php echo $row['nocitra'];?></td>
	</tr>
	<tr>
		<td align="left">Nomor KTP</td><td>: <?php echo $row['noktp'];?></td>
	</tr>
</table>
<div style="font-size:8pt;font-family:Arial;">
<p>Selanjutnya disebut "Pemberi Kuasa"</p>
<p>Dengan ini menerangkan terlebih dahulu bahwa sehubungan dengan telah ditandatangani :</p>
<p align="justify">Perjanjian Kredit Nomor <?php echo $row['norek'];?> tanggal <?php echo date_sql($row['tgtran']);?> yang telah ditandatangani oleh Pemberi Kuasa dengan Koperasi KSP <?php echo $ncabang; ?>, yang berlaku terhitung mulai tanggal <?php $bl1=date('m',strtotime($mtgtran));$th1=date('Y',strtotime($mtgtran)); echo '01-'.$bl1.'-'.$th1;?> sampai dengan tanggal <?php $bl1=date('m',strtotime($xtgtran));$th1=date('Y',strtotime($xtgtran));echo '01-'.$bl1.'-'.$th1;?> (selanjutnya disebut "Perjanjian") </p><p>Dengan ini Pemberi Kuasa memberi kuasa dan instruksi dengan hak substitusi kepada :</p><p>Koperasi KSP <?php echo $ncabang; ?>, (untuk selanjutnya disebut "Penerima Kuasa") untuk dan atas nama Pemberi Kuasa</p>
<p align="center">-------------------------------------- KHUSUS---------------------------------</p>
<p>Melakukan tindakan-tindakan sebagai berikut :</p>
</div>
<table style="font-size:9pt; border-collapse: collapse;" width="100%" border="0" align="center" cellpadding="3px">
	<tr>
		<td valign="top">1.</td>
		<td align="justify">Melakukan pendebetan Rekening Manfaat Pensiun Pemberi Kuasa untu pembayaran angsuran kredit sebesar Rp. <?php echo number_format($row['pokok']+$row['bunga']+$row['administrasi']).' ('.terbilang($row['pokok']+$row['bunga']+$row['administrasi']).')';?> berdasarkan Perjanjian dengan pendebetan otomatis pada setiap hari kerja pertama setiap bulannya melalui PT. Bank Tabungan Pensiunan Nasinal, Tbk sebagai kantor bayar pensiun Pemberi Kuasa.
		</td>
	</tr>
	<tr>
		<td valign="top">2.</td>
		<td>Mentransfer dan hasil pendebetan Rekening tersebut pada point 1 ke rekening Penerima Kuasa Yaitu : <br />
			<table style="font-size:9pt; border-collapse: collapse;" width="100%" border="0" align="center" cellpadding="3px">
				<tr>
					<td>- Nama </td><td>: KSP Nabasa</td>
				</tr>
				<tr>
					<td>- Nomor Rekening</td><td>: 00293001146</td>
				</tr>
				<tr>
					<td>- Cabang Bank</td><td>: KC Makasar</td>
				</tr>
			</table>
		</td>
	<</tr>
	<tr>
		<td valign="top">3.</td>
		<td align="justify">Melakukan segala sesuatu yang baik dan perlu untuk terlaksananya pendebetan dana Rekening atau pemindahbukuan/transfer tersebut guna terlaksananya isi kuasa ini.
		<br /><br />Selama hutang Pemberi Kuasa berdasarkan Perjanjian belum dibayar lunas kepada Penerima Kuasa, Kuasa ini tidak dapat dicabut kembali dan tidak akan berakhir oleh karena sebab apapun juga termasuk namun tidak terbatas oleh sebab-sebab berakhirnya kuasa sebagaimana tercantum dalam Pasal 1813 Kitab Undang-Undang Hukum Perdata. 
		<br /><br />Segala risiko atau akibat yang mungkin timbul dengan adanya Surat Kuasa ini merupakan tanggung jawab Pemberi Kuasa dan Penerima Kuasa sepenuhnya dan oleh karenanya Pemberi Kuasa dan Penerima Kuasa membebaskan PT Bank Tabungan Pensiunan Nasional, Tbk dari segala risiko, kerugian dan tuntutan apapun baik dari Pemberi Kuasa dan Penerima Kuasa maupun dari pihak manapun juga.
		</td>
	</tr>
</table>
<div style="font-size:8pt;font-family:Arial;">
<p>Demikian Surat Kuasa ini dibuat untuk dapat dipergunakan sebagaimana mestinya</p>
</div>
<table  style="font-size:9pt; border-collapse: collapse;" width="100%" border="0" align="center" cellpadding="3px">
	<tr>
		<td align="center" colspan="2"> <?php echo $ncabang.','.date("d F Y",strtotime($tgtran));?> </td>
	</tr>
	<tr>
		<td align="center">Pemberi Kuasa</td>
		<td align="center">Penerima Kuasa</td>
	</tr>
	<tr>
		<td colspan="2" height="20"><h1>&nbsp;</h1></td>
	</tr>
	<tr>
		<td colspan="2" height="20"><h1>&nbsp;</h1></td>
	</tr>	
	<tr>
		<td align="center"><?php echo $row['nama'];?></td>
		<td align="center"><?php echo $ttd['nama6'];?></td>
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