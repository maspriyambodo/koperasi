<?php 
include 'h_tetap.php';
$hasil = $result->res("SELECT nama1,nama2,nama3,nama4,nama5,nama6,nama7,nama8 FROM $tabel_ttd WHERE branch='$kcabang'");if($result->num($hasil)<1)$result->msg_error('Tabel Tanda Tangan Belum Di Isi...?');$row=$result->row($hasil);$nama1=$row['nama1'];$nama2=$row['nama2'];$nama3=$row['nama3'];$id=$result->c_d($_GET['mnorek']);$hasil=$result->query_lap("SELECT a.branch,b.nama,b.alamat,a.tglahir,a.norek,a.notran,a.tgtran,a.nomi,a.deb1,a.plunas,a.meterai,a.blunas,a.dbunga,a.alunas,a.jumpremi,a.jumrefund,a.jumprovisi,a.jumadm,a.jumbtl,a.jangka,a.suku,a.kdkop,a.branch,a.nonas,a.gaji,a.plain,a.pbank,a.kkbayar,a.produk,a.pokok,a.bunga,a.administrasi,a.umur,a.noktp,a.self1,a.self2,a.self3,a.tbunga,a.simpokok,a.simwajib,a.kdangsur,a.pot_angsuran,a.jumlah_period,a.jum_period,b.kdpos,b.tmplahir,b.tlphp1,b.rumah,b.jkelamin,b.lurah,b.camat,b.camatu,b.alamatu,b.lurahu,b.sistri,b.usaha1,b.usaha2,b.kstatus,b.pendidikan,b.agama,masaktp,b.camatb,b.alamatb,b.lurahb,b.namaibu FROM $tabelKredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.id='$id'");$row=$result->row($hasil);$norek=$row['norek'];$tgtran=$row['tgtran'];$nomi=$row['nomi'];$kdkop=$row['kdkop'];$rumah=$row['rumah'];$jkelamin=$row['jkelamin'];$sistri=$row['sistri'];$kstatus=$row['kstatus'];$pendidikan=$row['pendidikan'];$agama=$row['agama'];$cabang=$result->namacabang($row['branch']);$xtgtran=$result->jatuh_tempo($row['norek']);include('parameter/_kettagih.php');$jumangsura=$row['pokok']+$row['bunga']+$row['administrasi'];$jumlunas=$row['blunas']+$row['dbunga']+$row['alunas'];$jumbiaya=$row['jumprovisi']+$row['jumadm']+$row['jumpremi']+$row['meterai']+$row['simwajib']+$row['simpokok'];$jumpotong1=$row['plunas']+$jumlunas+$row['pot_angsuran']+$row['jum_period']+$row['jumbtl'];$jumpotong2=$jumbiaya-$row['jumrefund'];$jumterima=$nomi-($jumpotong2+$jumpotong1);
ini_set("memory_limit","516M");
$nama_dokumen='Aplikasi Kredit '.$norek;
define('_MPDF_PATH','MPDF60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8','A4','','',10,10,23,10,8,8); 
$mpdf->SetHTMLHeader('<table width="100%" style="vertical-align: bottom;font-family:Arial;font-size:8pt;color:#000000;"><tr><td width="20%"><span ><img src="logo.jpg" width="90"/></span></td><td width="60%" align="center" valign="top">Sk Menteri Koperasi Nomor : II/BH/XXIV/XI/2012 <br/>Tanggal : 19 Nopember 2012<br/>Alamat : PURI TAMAN SARI BLOK G.8 NO 11</td><td width="20%"></td></tr></table>');
ob_start();
?>
<table style="font-size:8pt; border-collapse: collapse;font-family: Arial;" width="100%" align="center">
	<thead>
	<tr>
		<td colspan="4" align="center" style="font-size:12pt;">
			<strong>APLIKASI KREDIT <?php echo $row['deb1'];?></strong>
		</td>
	</tr>
	<tr><td colspan="4"><hr/></td></tr>
	</thead>
	<tbody>
	<tr>
		<td>Rekening : <?php echo $norek;?></td>
		<td colspan="2" align="center">Jenis Kredit : 
			<?php 
			if($row['plunas']>0){ 
				echo 'PEMBAHARUAN'.' ['.$row['notran'].']'; 
			}else{ 
				echo 'BARU'.' ['.$row['notran'].']';
			}?>
		</td>
		<td width="24%">
			Tanggal Aplikasi : <?php echo date_sql($row['tgtran']);?>
		</td>
	</tr>
	<tr><td colspan="4"><hr/></td></tr>
	<tr><td colspan="4" align="center" style="font-size: 10pt;"><strong>DATA DEBITUR</strong></td></tr>
	<tr><td colspan="4"><hr/></td></tr>
	<tr>
		<td>Nama Debitur Sesuai KTP</td>
		<td width="30%" align="left">: <?php echo $row['nama'];?></td>
		<td width="23%">	Jenis Kelamin / No KTP</td>
		<td>: 
		<?php
		if($jkelamin==0){
			echo 'PRIA'." / ".$row['noktp'];
		}else{
			echo 'WANITA'." / ".$row['noktp'];
		}?>
		</td>
	</tr>
	<tr>
		<td>Alamat Sesuai KTP</td>
		<td align="left" colspan="3">: <?php echo $row['alamat'];?></td>
	</tr>
	<tr>
		<td>Kelurahan</td>
		<td>: <?php echo $row['lurah'];?>	</td>
		<td>Tempat / Tgl Lahir</td>
		<td align="left">: <?php echo $row['tmplahir']." / ".date_sql($row['tglahir']);?></td>
	</tr>
	<tr>
		<td>Kecamatan</td>
		<td align="left">: <?php echo $row['camat'];?></td>
		<td>Kode Pos</td>
		<td align="left">: <?php echo $row['kdpos'];?></td>
	</tr>
	<tr>
		<td colspan="2">Di isi apabila berbeda dengan KTP</td>
		<td>Telepone</td>
		<td align="left">: <?php echo $row['tlphp1'];?></td>
	</tr>
	<tr>
		<td>Alamat Tempat Tinggal</td>
		<td align="left" colspan="3">: <?php echo $row['alamatb']." KEL ".$row['lurahb'];?></td>
	</tr>
	<tr>
		<td>Kecamatan</td>
		<td align="left">: <?php echo $row['camatb'];?></td>
		<td>Pendidikan</td>
		<td align="left">: <?php echo $xpendidikan;?></td>
	</tr>
	<tr>
		<td>Status Perkawinan</td>
		<td align="left">: <?php echo $xkstatus;?></td>
		<td>Umur / Agama</td>
		<td align="left">: <?php echo age($row['tglahir'])." Tahun / ".$xagama;?></td>
	</tr>
	<tr>
		<td>Nama Ibu Kandung</td>
		<td align="left">: <?php echo $row['namaibu'];?></td>
		<td>Nama Suami/Istri</td>
		<td align="left">: <?php echo $sistri;?></td>
	</tr>
	<tr><td colspan="4"><hr/></td></tr>
	<tr>
		<td colspan="2" style="color: #ff0000">KET : Apabila Pinjaman Sdh Jatuh Tempo Belum Lunas</td>
		<td><?php echo $xket;?></td>
		<td align="left">: Rp. <?php echo formatrp($row['gaji']);?></td>
	</tr>
	<tr>
		<td colspan="2" style="color: #ff0000">Maka Saldo Pinjaman Diperpanjang Otomatis</td>
		<td>Penghasilan Lainnya</td>
		<td align="left">: Rp. <?php echo formatrp($row['self1']);?></td>
	</tr>
	<tr>
		<td>Jenis Usaha / Pekerjaan</td>
		<td align="left">: <?php echo $row['usaha1'];?></td>
		<td><?php echo $yket;?></td>
		<td>: Rp. <?php echo formatrp($row['self2']);?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="left">: <?php echo $row['usaha2'];?>	</td>
		<td>Pnjaman Kredit Di Bank</td>
		<td align="left">: Rp. <?php echo formatrp($row['pbank']);?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td align="left" colspan="3">: <?php echo $row['alamatu'];?></td>
	</tr>
	<tr>
		<td>Kelurahan</td>
		<td align="left">: <?php echo $row['lurahu'];?></td>
		<td>Pinjaman Kredit Lain</td>
		<td align="left">: Rp. <?php echo formatrp($row['plain']);?></td>
	</tr>
	<tr>
		<td>Kecamatan</td>
		<td align="left">: <?php echo $row['camatu'];?></td>
		<td><?php echo $wket;?></td>
		<td align="left">: Rp. <?php echo formatrp($row['self3']);?></td>
	</tr>
	<tr><td colspan="4"><hr/></td>
	</tr>
	<tr><td colspan="4" align="center" style="font-size: 10pt;"><strong>DATA PENGAJUAN KREDIT</strong></td></tr>
	<tr><td colspan="4"><hr/></td></tr>
	<tr>
		<td>Pengajuan Plafon Pinjaman</td>
		<td align="left">: Rp. <?php echo formatrp($nomi);?></td>
		<td>Tujuan Penggunaan Kredit</td>
		<td align="left">: <?php echo $row['deb1'];?></td>
	</tr>
	<tr>
		<td>Jangka Waktu Kredit</td>
		<td align="left">: <?php echo $row['jangka'].' '.$xkdkop;?></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr><td colspan="4"><hr/></td></tr>
	<tr><td colspan="4" align="center" style="font-size: 10pt;"><strong>DAFTAR PERINCIAN PINJAMAN</strong></td></tr>
	<tr><td colspan="4"><hr/></td></tr>
	<tr>
		<td>Tanggal Mulai Kredit</td>
		<td align="left">: <?php echo date_sql($row['tgtran'])." S/D ".date_sql($xtgtran);?></td>
		<td>Kredit Yang Disetujui</td>
		<td align="left">: Rp. <?php echo formatrp($nomi);?></td>
	</tr>
	<tr>
		<td>Suku Bunga</td>
		<td align="left">: <?php echo $row['suku']." / FLAT";?></td>
		<td>Simpanan Pokok</td>
		<td align="left">: Rp. <?php echo formatrp($row['simpokok']);?></td>
	</tr>
	<tr>
		<td>Denda Keterlambatan Ang</td>
		<td align="left">: <?php echo $row['tbunga']." %";?></td>
		<td>Simpanan Wajib</td>
		<td align="left">: Rp. <?php echo formatrp($row['simwajib']);?></td>
	</tr>
	<tr>
		<td>Jumlah Angsuran</td>
		<td align="left">: Rp. <?php echo formatrp($jumangsura).' / '.$xkdkop;?></td>
		<td>Provisi</td>
		<td align="left">: Rp. <?php echo formatrp($row['jumprovisi']);?></td>
	</tr>
	<tr>
		<td><u><strong>PELUNASAN</strong></u></td>
		<td>&nbsp;</td>
		<td>Administrasi</td>
		<td align="left">: Rp. <?php echo formatrp($row['jumadm']);?></td>
	</tr>
	<tr>
		<td>Outstanding Kredit Lama</td>
		<td align="left">: Rp. <?php echo formatrp($row['plunas']);?></td>
		<td>Premi Asuransi</td>
		<td align="left">: Rp. <?php echo formatrp($row['jumpremi']);?></td>
	</tr>
	<tr>
		<td>Pelunasan Bunga+Adm</td>
		<td align="left">: Rp. <?php echo formatrp($jumlunas);?></td>
		<td>Meterai</td>
		<td align="left">: Rp. <?php echo formatrp($row['meterai']);?></td>
	</tr>
	<tr>
		<td>Angsuran Pertama</td>
		<td align="left">: Rp. <?php echo formatrp($row['pot_angsuran']);?></td>
		<td><strong>Jumlah Biaya Kredit</strong></td>
		<td align="left"><strong>: <u>Rp. <?php echo formatrp($jumbiaya);?></u> +</strong></td>
	</tr>
	<tr>
		<td>Angsuran Grace Period</td>
		<td align="left">: Rp. <?php echo formatrp($row['jum_period']);?></td>
		<td>Refund Premi</td>
		<td align="left">: Rp. <?php echo formatrp($row['jumrefund']);?></td>
	</tr>
	<tr>
		<td>Blokir Pinjaman</td>
		<td align="left">: Rp. <?php echo formatrp($row['jumbtl']);?></td>
	</tr>
	<tr>
		<td><strong>Jumlah Setelah Dikurangi</strong></td>
		<td align="left"><strong>: <u>Rp. <?php echo formatrp($jumpotong1);?></u> +</strong></td>
		<td><strong>Jumlah Setelah Dikurangi</strong></td>
		<td align="left"><strong>: <u>Rp. <?php echo formatrp($jumpotong2);?></u> +</strong></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
		<td><strong>Jumlah Penerimaan</strong></td>
		<td align="left"><strong>: <u>Rp. <?php echo formatrp($jumterima);?></u> -</strong></td>
	</tr>
	<tr>
		<td align="left" colspan="4">Terbilang : <strong><em><?php echo ' ['. terbilang($jumterima).' rupiah ]';?></em></strong></td>
	</tr>
	<tr><td colspan="4"><hr/></td></tr>
	<tr>
		<td height="30" colspan="4" align="center" style="font-size: 10pt;"><strong>PERSYARATAN DAN SURAT KUASA</strong></td>
	</tr>
	</tbody>
	</table>
	<table style="font-size:8pt; border-collapse: collapse;" width="100%" align="center">
	<tr>
		<td valign="top">1.</td>
		<td align="justify">
		Semua informasi data dalam Aplikasi Kredit ini adalah lengkap dan benar, dan dengan ini saya memberikan kuasa kepada kreditur melakukan pemeriksaan terhadap data dan dokumen tersebut dengan cara apapun dianggap layak oleh kreditur.
		</td>
	</tr>
	<tr>
		<td valign="top">2.</td>
		<td align="justify">
		Dengan menandatangani kredit ini, saya menyatakan telah membaca dan memahami syarat dan ketentuan umum kredit ini yang tercantum dibalik aplikasi ini, oleh karenanya saya mengikatkan diri terhadap ketentuan kredit ini termasuk perubajan, atau pembaharuan yang akan diberitahukan oleh Kreditur kepada saya.
		</td>
	</tr>
	<tr>
		<td valign="top">3.</td>
		<td align="justify">
		Semua data dan dokumen yang saya berikan akan menjadi milik kreditur, sehingga kreditur tidak berkewajiban mengembalikannya. Aplikasi ini merupakan satu kesatuan dan bagian yang tak terpisahkan dari ketentuan kredit ini.
		</td>
	</tr>
	</table>
	<table style="font-size:8pt; border-collapse: collapse;" width="100%" align="center">
	<tr><td colspan="4"><hr/></td></tr>
	<tr>
		<td align="center" width="25%">Pemohon</td>
		<td align="center" width="25%">Petugas Kredit,</td>
		<td align="center" width="25%">Bendahara</td>
		<td align="center" width="25%">Menyetujui</td>
	</tr>
	<tr>
		<td height="70" align="center" valign="bottom"><?php echo $row['nama'];?></td>
		<td height="70" align="center" valign="bottom"><?php echo $nama1;?></td>
		<td height="70" align="center" valign="bottom"><?php echo $nama2;?></td>
		<td height="70" align="center" valign="bottom"><?php echo $nama3;?></td>
	</tr>
</table>
<?php
$html = ob_get_contents(); 
ob_end_clean();
$mpdf->SetFooter('Tanggal Cetak : {DATE j-m-Y}| |');
$mpdf->useSubstitutions=false;
$mpdf->packTableData =true;
$mpdf->simpleTables = true;
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>