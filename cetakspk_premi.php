<?php include 'h_tetap.php';$id=$result->c_d($_GET['mnorek']);$hasil=$result->query_lap("SELECT a.id,a.branch,b.nama,b.alamat,a.tglahir,a.norek,a.notran,a.tgtran,a.nomi,a.jumpremi,a.jangka,a.suku,a.kdkop,a.nonas,a.umur,a.noktp,b.masaktp,a.nopremi,a.premi,b.kdpos,b.tmplahir,b.jkelamin,b.lurah,b.camat,a.arekom,a.lrekom,a.krekom,a.nktprekom,a.nmwaris,a.brekom,a.nopen,a.kdpremi FROM $tabelKredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.id='$id'");$row = $result->row($hasil);$norek=$row['norek'];$notran=$row['notran'];$tgtran=$row['tgtran'];$nomi=$row['nomi'];$jumpremi=$row['jumpremi'];$kdkop=$row['kdkop'];$jangka=$row['jangka'];$suku=$row['suku'];$nonas=$row['nonas'];$branch=$row['branch'];$nama=$row['nama'];$alamat=$row['alamat'];$tglahir=$row['tglahir'];$umur=$row['umur'];$noktp=$row['noktp'];$tmplahir=$row['tmplahir'];$jkelamin=$row['jkelamin'];$lurah=$row['lurah'];$camat=$row['camat'];$masaktp=$row['masaktp'];$arekom=$row['arekom'];$nmwaris=$row['nmwaris'];$lrekom=$row['lrekom'];$krekom=$row['krekom'];$brekom=$row['brekom'];$nktprekom=$row['nktprekom'];$nopen=$row['nopen'];$kdpremi=$row['kdpremi'];$nopremi=$row['nopremi'];$premi=$row['premi'];ini_set("memory_limit","516M");$nama_dokumen='Aplikasi Kredit '.$norek;define('_MPDF_PATH','MPDF60/');include(_MPDF_PATH . "mpdf.php");$mpdf=new mPDF('utf-8','A4','','',15,15,25,10,8,8); $mpdf->SetHTMLHeader('<table width="100%" style="vertical-align: bottom;font-family:sans-serif;font-size:8pt;color:#000000;"><tr><td width="20%"><span ><img src="logo.jpg" width="90"/></span></td><td width="60%" align="center" valign="top">Sk Menteri Koperasi Nomor : II/BH/XXIV/XI/2012 <br/>Tanggal : 19 Nopember 2012<br/>Alamat : PURI TAMAN SARI BLOK G.8 NO 11</td><td width="20%" ></td></tr><tr><td colspan="3"><hr/></td></tr></table>');ob_start();?>
<html>
<head>
</head>
<body style="font-family: sans-serif;font-size: 9pt;">
	<?php 
	if($kdpremi!=9){ ?>
		<table style="font-size:8pt; border-collapse: collapse;" width="100%" align="center">
			<tr>
				<td colspan="4" align="center" style="font-size:12pt;"><strong><u>SERTIFIKAT ASURANSI JIWA KREDIT PENSIUN KSP NABASA</u></strong></td>
			</tr>
			<tr><td colspan="4">&nbsp;<p>&nbsp;</p></td></tr>
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Nama Peserta</td>:
				<td><?php echo $nama;?></td>
				<td>Tempat / Tgl Lahir</td>:
				<td><?php echo $tmplahir.', '.$tglahir;?></td>:
			</tr>
			<tr>
				<td>Alamat</td>:
				<td colspan="3"><?php echo $alamat.' KEL '.$lurah.' KEC '.$camat;?></td>
			</tr>
			<tr>
				<td>Nominal Pinjaman</td>:
				<td><?php echo number_format($nomi);?></td>
				<td>Usia</td>:
				<td><?php echo $umur. ' Tahun';?></td>:
			</tr>
			<tr>
				<td>Jangka Waktu</td>:
				<td>
				<?php 
				if($kdkop=1){
					$ket_kdkop='BULAN';
				}elseif($kdkop){
					$ket_kdkop='HARI';
				}else{
					$ket_kdkop='MINGGU';
				}
				echo $jangka.' '.$ket_kdkop;
				?>
				</td>
				<td>Tenor Premi</td>:
				<td><?php echo $premi.' %';?></td>:
			</tr>
			<tr>
				<td>Nomor Kepersertaan</td>:
				<td><?php echo $nopremi;?></td>
				<td>Jumlah Premi</td>:
				<td><?php echo number_format($jumpremi);?></td>
			</tr>
			<tr>	<td colspan="4"><em>Terbilang</em> <?php echo terbilang($jumpremi);?></td>	</tr>
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td colspan="4" align="justify">Bukti kepersertaan ini diberikan khusus kepada para pensiunan yang mendapatkan fasilitas Kredit Pensiun ("Pinjaman") dari KSP Nabasa sebagai peserta, untuk berhak mendapatkan manfaat asuransi jiwa kredit melalui KSP Nabasa yaitu Manfaat asuransi yang akan digunakan untuk membayar sisa Pinjaman pensiunan apabila terjadi resiko meninggal dunia sesuai dengan syarat dan ketentuan</td>
			</tr>
		</table>
		<table style="font-size:9pt; border-collapse: collapse;" width="100%" border="0" align="center" cellpadding="3px">
			<tr>
				<td valign="top">1.</td>
				<td align="justify">MANFAAT ASURANSI <p>Apabila Peserta meninggal dunia maka KSP nabasa akan membayarkan sisa pokok Pinjaman pesrta selama selama pertanggungan masih berlaku. Hal tersebut berlaku untuk kejadian karena Peserta meninggal dunia yang disebabkan karena kecelakaan maupun sakit</p></td>
			</tr>
			<tr>
				<td valign="top">2.</td>
				<td align="justify">BERAKHIRNYA PERTANGGUNGAN <p>Pertanggungan akan berakhir apabila terjadi kondisi sebagai berikut :</p><p>1. Pada tanggal di mana Peserta melakukan pelunasan Pinjaman</p><p>2. Pada tanggal di mana pembayaran premi peserta dihentikan</p><p>3. Peserta meninggal dunia</p></td>
			</tr>
			<tr>
				<td valign="top">3.</td>
				<td align="justify">PENGECUALIAN<p>KSP Nabasa tidak akan membayar manfaat Asuransi Jiwa Kredit dalam hal Peserta meninggal dunia yang berhubungan dengan atau disebakan oleh :</p><p>1. Bunuh diri, baik dalam keadaan sadar atau pun tidak yang terjadi dalam kurun waktu 1 (satu) tahun sejak tanggal peserta terdaftar dalam pertanggungan asuransi atau tanggal pemulihan pertanggungan Peserta, yang mana yang lebih akhir</p><p>2. Dihukum mati berdasarkan putusan pengadilan</p><p>3. Meninggal dunia akibat melakukan tindak kejahatan</p></td>
			</tr>
			<tr><td colspan="2"><hr/></td></tr>
			<tr>
				<td colspan="2" align="justify">Pada hari ini <?php echo date("l",strtotime($tgtran));?> Tanggal <?php echo date("d",strtotime($tgtran));?> Bulan <?php echo date("F",strtotime($tgtran));?> Tahun <?php echo date("Y",strtotime($tgtran));?> Saya <?php echo $nama;?> Dengan ini menyatakan bahwa saya telah menerima sertifikat Asuransi Jiwa Kredit Pensiun dari KSP Nabasa dan telah memahami karakteristik, manfaat, persyartan klaim serta resiko produk asuransi</td>
			</tr>
			<tr><td colspan="2"><hr/></td></tr>
			<tr><td colspan="2">Yang Menerima</td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr><td colspan="2"> <?php echo $nama;?></td></tr>
		</table>
		<?php 
	}else{ 
		?>
		<table style="font-size:8pt; border-collapse: collapse;" width="100%" align="center">
			<tr><td colspan="2" align="center" style="font-size:12pt;">	<strong><u>SURAT PERNYATAAN</u></strong></td></tr>
			<tr><td colspan="2">&nbsp;<p>&nbsp;</p></td></tr>
			<tr>
				<td width="25%">Nama </td>
				<td width="75%">: <?php echo $nama;?></td>
			</tr>
			<tr>
				<td>No KTP </td>
				<td>: <?php echo $noktp;?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>: <?php echo $alamat.' Kel '.$lurah.' Kec '.$camat;?></td>
			</tr>
			<tr>
				<td>No Pensiun</td>
				<td>: <?php echo $nopen;?></td>
			</tr>
			<tr>
				<td>No Rekening</td>
				<td>: <?php echo $norek;?></td>
			</tr>
			<tr><td colspan="2">Keterangan Ahli Waris</td></tr>
			<tr>
				<td width="25%">Nama </td>
				<td width="75%">: <?php echo $nmwaris;?></td>
			</tr>
			<tr>
				<td>No KTP </td>
				<td>: <?php echo $nktprekom;?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>: <?php echo $arekom.' Kel '.$lrekom.' Kec '.$krekom;?></td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td>: <?php echo $pekerjaan;?></td>
			</tr>
			<tr><td colspan="2">&nbsp;<p>&nbsp;</p></td></tr>
			<tr><td colspan="2">Menerangkan Bahwa :</td></tr>
			<tr><td colspan="2">&nbsp;<p>&nbsp;</p></td></tr>
		</table>
		<table style="font-size:9pt; border-collapse: collapse;" width="100%" border="0" align="center" cellpadding="3px">
			<tr>
				<td valign="top">1.</td>
				<td align="justify">Mengakui bahwa saya telah menerima Pinjaman Kredit Pensiun dengan Nominal uang tunai dari KSP Nabasa sebesar Rp. <?php echo number_format($nomi).',- ('.terbilang($nomi).')';?></td>
			</tr>
			<tr>
				<td valign="top">2.</td>
				<td align="justify">Pembayaran angsuran pinjaman kredit pensiun saya kepada Ksp Nabasa akan saya bayar dengan pemotongan gaji pension yang saya tenma setiap bulannya di Bank Btpn dan Bank Btpn akan memblokir dan mendebetkan angsuran pinjaman kredit pension saya ke pada pihak Ksp Nabasa melalui Rekening Giro Ksp Nabasa. yang ada di Bank Btpn Sisa Gaji dan uang Duka dari PT. (TaspenPersero)</td>
			</tr>
			<tr>
				<td valign="top">3.</td>
				<td align="justify">Saya penerima gaji pension dan ahli waris yang syah yang telah menandatangani perjanjian kredit pension saya kepada Ksp Nabasa dengan ini menyatakan yang sebenar-benarnya bahwa gaji pension yang saya teritna di Bank Btpn Cabang Manado tidak akan saya pindahkan kekantor bayar lainnya sebelum pinjaman kredit saya lunas di Ksp Nabasa.</td>
			</tr>
			<tr>
				<td valign="top">4.</td>
				<td align="justify">Apa bila nantinya saya dengan sengaja untuk memindahkan gaji pension saya kepada pihak kantor bayar lainnya, maka saya dan ahli waris dengan ikias menerima tuntutan secara hokum yang berlaku, dan siap untuk melunasi sisa pinjaman kredit saya di Ksp Nabasa</td>
			</tr>
			<tr>
				<td valign="top">5.</td>
				<td align="justify">Apa bila nantinya saya meninggal dunia. maka ahli waris yang ikut serta menandatangani perjanjian pinjaman kredit di Ksp Nabasa akan bertanggung jawab untuk melunasi sisa pinjaman kredit saya kepada pihak Ksp Nabasa yang saldo pinjaman kredit tersebut akan dilunasi sesuai dengan ketentuan dari Ksp Nabasa</td>
			</tr>
			<tr>
				<td valign="top">6.</td>
				<td align="justify">Kami sebagai ahli waris dari orang tua kami nantinya, langsung memberi informasi kepada pihak Ksp Nabasa apabila nantinya orang tua kami meninggal dunia dan akan secepatnya untuk mengurus hak-hak yang akan kami teritna dari PT. Taspen Persero dan akan dibayarkan oleh ahli waris untuk melunasi sisa pinjaman dari orang tua kami yang telah meninggal dunia kepada Ksp Nabasa</td>
			</tr>
			<tr>
				<td valign="top">7.</td>
				<td align="justify">Apa bila nantinya kami sebagai ahli wari yang syah menerima uang duka wafat dari PT. Taspen Persero tidak 	cukup untuk melunasi pinjaman pension orang tua kami yang telah meninggal dunia, maka kami sebagai ahli waris yang syah beserta anak kandung dan kemanakan dari orang tua kami siap dan sanggup untuk melunasi sisa dari pinjaman kredit tersebut</td>
			</tr>
			<tr>
				<td align="justify" colspan="2">Demikian Surat pemyataan ini ditandatangani oleh saya sebagai peminjam pensiunan dan diikut sertakan oleh ahli waris yang syah dengan sebaik-baiknya dan tanpa ada unsur paksaan dari pihakmana pun</td>
			</tr>
			<tr><td colspan="2">&nbsp;<p>&nbsp;</p></td></tr>
			<tr><td colspan="2"><?php echo $ncabang;?> , <?php echo date("d F Y",strtotime($tgtran));?></td></tr>
			<tr><td colspan="2">Hormat Saya</td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr><td colspan="2"> <?php echo '( '.$nama.' )    ('.$nmwaris.' )';?></td></tr>
		</table>
		<?php
	}?>
</body>
</html>
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