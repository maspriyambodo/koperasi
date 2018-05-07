<?php include 'h_tetap.php';$hasil=$result->res("SELECT nama4 FROM $tabel_ttd WHERE branch='$kcabang'");if($result->num($hasil)<1) $result->msg_error('Tabel Tanda Tangan Belum Di Isi...?');$ttd=$result->row($hasil);$id =$result->c_d($_GET['mnorek']);$hasil=$result->query_lap("SELECT a.id,a.branch,b.nama,a.produk,a.tglahir,a.kdpin,a.nocitra,a.norek,a.notran,a.nomi,a.kdkop,a.nopen,a.tgtran,a.jangka,a.suku,a.tbunga,a.pokok,a.bunga,a.administrasi,b.alamat,b.lurah,b.camat,c.nmproduk FROM $tabelKredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk WHERE a.id='$id'");$row=$result->row($hasil);$norek=$row['norek'];$kdkop=$row['kdkop'];ini_set("memory_limit","516M");$nama_dokumen='PDF With MPDF';define('_MPDF_PATH','MPDF60/');include(_MPDF_PATH . "mpdf.php");$mpdf=new mPDF('utf-8','A4','','',15,15,15,15,10,10);ob_start();$jumlah=$row['pokok']+$row['bunga']+$row['administrasi'];?>
<div style="font-size:9pt;font-family:Arial;">
	<div align="center"><strong><u>SURAT PERJANJIAN KREDIT</u></strong></div>
	<div align="center">Nomor : 
		<?php if($row['kdpin']==1){echo substr($row['nmproduk'],0,7).'.B/'.$row['notran'];}else{echo substr($row['nmproduk'],0,7).'.P/'.$row['notran'];}?>
	</div>
	<p>Yang bertanda tangan di bawah ini :</p>
	<table class="items" style="font-size:9pt; border-collapse: collapse;" width="100%" border="0" align="center" cellpadding="3px">
		<tr><td align="left" width="20%">Nama</td><td width="80%">: <?php echo $ttd['nama4'];?></td></tr>
		<tr><td align="left" width="20%">Jabatan</td><td width="80%">: Pemimpin Koperasi Simpan Pinjam "Nabasa" <?php echo $ncabang;?></td></tr>
	</table>
	Dalam Hal Ini bertindak untuk dan atas nama KSP Nabasa <?php echo $ncabang;?> yang selanjutnya disebut Pihak Pertama
	<p></p>
	<table class="items" style="font-size:9pt; border-collapse: collapse;" width="100%" border="0" align="center" cellpadding="3px">
		<tr><td align="left" width="20%">Nama</td><td width="80%">: <?php echo $row['nama'];?></td></tr>
		<tr><td align="left" width="20%">Alamat</td><td width="80%">: <?php echo $row['alamat'].' KEL. '.$row['lurah'].' KEC. '.$row['camat'];?></td></tr>
	</table>
	Dalam hal ini bertindak untuk dan atas nama Peminjam yang selanjutnya disebut Pihak Kedua"
	<p>Para Pihak Sepakat Dan setuju untuk mengadakan Perjanjian Kredit, dengan ketentuan dan syarat-syarat sebagai berikut:</p>
	<table class="items" style="font-size:9pt;font-family:Arial;border-collapse: collapse;" width="100%" border="0" align="center" cellpadding="3px">
		<tr>
			<td valign="top">1.</td>
			<td align="justify">Pihak Pertama telah memberikan kepada Pihak Kedua pinjaman uang tunai sebesar Rp.<?php echo formatrp($row['nomi']);?> dan Peminjam mengakui telah menerima pinjaman Uang Tunai tersebut dengan menanda tangani perjanjian ini sebagai bukti penerimaan uang/dana Tunai yang Syah.
			</td>
		</tr>
		<tr>
			<td valign="top">2.</td>
			<td align="justify">Pihak Kedua setuju dan bersedia membayar bunga pinjaman sebesar <?php echo $row['suku'];?> % Flat per bulan yang berlaku tetap selama jangka waktu kredit sampai dengan lunas.
			</td>
		</tr>
		<tr>
			<td valign="top">3.</td>
			<td align="justify">Pinjaman uang tunai  tersebut akan dibayar kembali oleh Pihak Kedua yaitu Pokok Pinjaman dan Bunga Pinjaman beserta administrasi pembulatan kepada Pihak Pertama dengan cara angsuran bulanan sebesar Rp.<?php echo formatrp($jumlah);?> selama <?php echo $row['jangka'];?> bulan atau sampai dengan pinjaman dinyatakan Lunas.
			</td>
		</tr>
		<tr>
			<td valign="top">4.</td>
			<td align="justify">Simpanan Pokok, Simpanan Wajib, Biaya Provisi , Biaya Tata Laksana , Premi Asuransi , bea materai telah dibayar lunas sekaligus oleh Pihak Kedua pada saat penanda tanganan perjanjian kredit.
			</td>
		</tr>
		<tr>
			<td valign="top">5.</td>
			<td align="justify">Untuk jaminan  pembayaran Kewajiban Pihak Kedua kepada Pihak Pertama,  maka Pihak kedua memberikan Surat Kuasa Khusus yang tidak dapat dicabut atau Dibatalkan dengan alasan apapun kepada Kantor Bayar Manfaat Pensiun untuk memotong manfaat pensiun Pihak Kedua  setiap bulannya sebesar tagihan yang diajukan  oleh Koperasi Simpan Pinjam Nabasa sampai kredit tersebut dinyatakan Lunas.
			</td>
		</tr>	
		<tr>
			<td valign="top">6.</td>
			<td align="justify">Pihak kedua bersedia dibebankan denda keterlambatan pembayaran angsuran yang tidak tepat waktu sebesar <?php echo $row['tbunga'];?> % dari besar angsuran bulanan yang tertunggak.
			</td>
		</tr>	
		<tr>
			<td valign="top">7.</td>
			<td align="justify">Bilamana karena sesuatu hal yang mengakibatkan tidak terpotongnya manfaat / uang pensiun Pihak Kedua, maka untuk ketertiban dan kelancaran pembayaran angsuran, Pihak Kedua bersedia dan wajib menyetorkan sendiri / langsung ke Kantor Pihak Pertama dan/atau ke Rekening Bank Pihak Pertama dan melaporkan bukti setoran kepada Petugas  Pihak Pertama yang ditunjuk tepat waktu sesuai dengan jadwal angsuran yang disepakati.
			</td>
		</tr>		
		<tr>
			<td valign="top">8.</td>
			<td align="justify">Dalam hal keadaan tertentu, Pihak Kedua tidak berkeberatan penagihan angsuran dialihkan kepada Pihak lain dan/atau Pihak kepolisian . Biaya yang timbul atas pengalihan penagihan sisa pinjaman adalah menjadi tanggung jawab pihak Kedua.
			</td>
		</tr>				
	</table>
	<p align="justify">Pihak Pertama dan Pihak Kedua telah membaca, memahami dan setuju seluruh ketentuan yang ada dalam perjanjian  kredit ini. Untuk pelaksanaan perjanjian ini dan segala akibatnya , para pihak memilih domisili yang tetap dan umum di Kantor Kepaniteraan Pengadilan Negeri di Bekasi.</p>
	<p align="justify">Demikian Surat Perjanjian Kredit ini dibuat dalam rangkap 2 ( dua ) masing-masing bermaterai cukup, disetujui dan ditanda tangani kedua belah pihak dalam keadaan sehat walafiat dan tanpa paksaan siapun juga .</p>
	<table class="items" style="font-size:9pt; border-collapse: collapse;" width="100%" border="0" align="center" cellpadding="3px">
		<tr><td align="center" colspan="2">Dibuat Di : <?php echo $ncabang;?></td></tr>
		<tr><td align="center" colspan="2">Hari/Tanggal : <?php echo $hari_indonesia[$hari].' / '.$tanggal;?></td></tr>
		<tr><td align="center">PIHAK PERTAMA</td><td align="center">PIHAK KEDUA</td></tr>
		<tr><td align="center">Koperasi SP "Nabasa"</td><td align="center">Debitur/Peminjam</td></tr>
		<tr><td colspan="2" height="20"><h1>&nbsp;</h1></td></tr>
		<tr><td colspan="2" height="20"><h1>&nbsp;</h1></td></tr>	
		<tr><td align="center"><?php echo $ttd['nama4'];?></td><td align="center"><?php echo $row['nama'];?></td></tr>
	</table>
</div>
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