<?php include 'h_tetap.php';$hasil=$result->res("SELECT nama5 FROM $tabel_ttd WHERE branch='$kcabang'");if($result->num($hasil)<1)$result->msg_error('Tabel Tanda Tangan Belum Di Isi...?');$ttd=$result->row($hasil);$id=$result->c_d($_GET['mnorek']);$hasil=$result->query_lap("SELECT a.branch,a.norek,a.tgtran,a.nomi,a.kdkop,a.jangka,b.nama,b.alamat,a.noktp,a.tglahir,a.umur,a.gaji,a.plain,a.pbank,a.arekom,a.nrekom,a.trekom,a.nonas,a.kdskep,b.tmplahir,b.tlphp1,b.sistri,b.usaha1,b.usaha2,b.pekerjaan1,b.pendidikan,b.agama,b.masaktp,b.namaibu,b.tanggungan FROM $tabelKredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.id='$id'");$row = $result->row($hasil);$arekom=$row['arekom'];$nrekom=$row['nrekom'];$trekom=$row['trekom'];$norek=$row['norek'];$tgtran=$row['tgtran'];$nomi=$row['nomi'];$kdkop=$row['kdkop'];$gaji=$row['gaji'];$plain=$row['plain'];$pbank=$row['pbank'];$nama=$row['nama'];$alamat=$row['alamat'];$tglahir=$row['tglahir'];$noktp=$row['noktp'];$tmplahir=$row['tmplahir'];$tlphp1=$row['tlphp1'];$usaha1=$row['usaha1'];$usaha2=$row['usaha2'];$namaibu=$row['namaibu'];$pekerjaan=$row['pekerjaan1'];$jtanggung=$row['tanggungan'];$kdskep=$row['kdskep'];$jangka=$row['jangka'];$cabang=$result->namacabang($row['branch']);$xtgtran=$result->jatuh_tempo($row['norek']);$xkdkop=ket_tagihh($kdkop);ini_set("memory_limit","516M");$nama_dokumen='Surat Permohonan '.$norek;define('_MPDF_PATH','MPDF60/');include(_MPDF_PATH . "mpdf.php");$mpdf=new mPDF('utf-8','A4','','',15,10,30,15,15,10);$mpdf->SetHTMLHeader('<table width="100%" style="vertical-align: bottom;font-family:sans-serif;font-size:8pt;color:#000000;"><tr><td width="20%"><span ><img src="logo.jpg" width="90"/></span></td><td width="60%" align="center" style="font-size:12pt;" valign="middle">SURAT PERMOHONAN KREDIT</td><td width="20%" ></td></tr></table>');ob_start();?>
<table style="font-size:8pt;font-family:Arial;border-collapse:collapse;" width="100%" border="1" align="center" cellpadding="3px">
	<tr>
		<td width="80%" height="40" colspan="2" >Kepada Yth : KSP Nabasa <?php echo $ncabang;?> </td>
		<td width="20%" align="center" >Tanggal : <?php echo date_sql($tgtran);?></td>
	</tr>
	<tr>
		<td colspan="2" >
			<table class="items" style="font-size:8pt; border-collapse: collapse;" width="100%" border="1" align="center" cellpadding="4px">
				<tr>
					<td colspan="4" align="left" ><strong>DATA PEMOHON</strong></td>
				</tr>
				<tr>
					<td width="25%">Nama Sesuai KTP </td>
					<td width="75%" colspan="3">: <?php echo $nama;?></td>
					</tr>
				<tr>
					<td>Alamat Sesuai KTP</td>
					<td colspan="3" align="left">: <?php echo $alamat;?></td>
					</tr>
				<tr>
					<td>No KTP</td>
					<td colspan="3">: <?php echo $noktp;?></td>
					</tr>
				<tr>
					<td>NO Telepon</td>
					<td colspan="3" align="left">: <?php echo $notlp1;?></td>
					</tr>
				<tr>
					<td>Tempat / Tgl Lahir</td>
					<td colspan="3" align="left">: <?php echo $tmplahir.' / '.date_sql($tglahir);?></td>
					</tr>
				<tr>
					<td height="24">Besar Pinjaman</td>
					<td colspan="3" align="left">: <?php echo formatRupiah($nomi);?></td>
					</tr>
				<tr>
					<td>Skim Pembayaran</td>
					<td colspan="3" align="left">: 
					<?php 
					if ($kdkop==1){
						echo '<u> V </u>&nbsp;Bulanan ___ Harian ___ Mingguan ___ Disetor Sendiri';
					}elseif ($kdkop==2){
						echo '___ Bulanan <u> V </u>&nbsp;Harian ___ Mingguan ___ Disetor Sendiri';
					}elseif ($kdkop==3){
						echo '<u> V </u> Bulanan ___ Harian <u> V </u>&nbsp;Mingguan ___ Disetor Sendiri';
					}else{
						echo '<u> V </u> Bulanan ___ Harian ___ Mingguan <u> V </u>&nbsp;Disetor Sendiri';
					}
					?></td>
					</tr>
				<tr>
					<td>Jaminan Yang Di Serahkan</td>
					<td colspan="3" align="left">: 
					<?php 
					if ($kdskep==0){
						echo 'SK PENSIUN';
					}elseif ($kdskep==1){
						echo 'SK PEGAWAI';
					}elseif ($kdskep==2){
						echo 'BPKP KENDARAAN';
					}elseif ($kdskep==3){
						echo 'SERTIFIKAT TANAH';
					}else{
						echo 'TAMPA AGUNAN';
					}
					?></td>
					</tr>
				<tr>
					<td >Pekerjaan Pemohon</td>
					<td colspan="3" align="left">: <?php echo $pekerjaan;?> / Jumlah Tanggungan : <?php echo $jtanggung;?></td>
					</tr>
				<tr>
					<td >Penghasilan Kotor / Bln</td>
					<td colspan="3">: ___Dibawah Rp 3 Juta___Rp 3 s/d 5 Juta___Diatas Rp 5 Juta</td>
					</tr>
				<tr>
					<td>Pekerjaan Pasangan</td>
					<td colspan="3" align="left">: ___Dibawah Rp 3 Juta___Rp 3 s/d 5 Juta___Diatas Rp 5 Juta</td>
					</tr>
				<tr>
					<td width="25%">Dokumen Kredit</td>
					<td width="15%" align="left">: YES NO </td>
					<td width="45%" align="left">&nbsp;</td>
					<td width="15%" align="center"> YES NO</td>
					</tr>
				<tr>
					<td>Foto Copy KTP (Asli ada)</td>
					<td align="left">: ____   ____</td>
					<td align="left">       Fotocopy Kartu Keluarga (asli ada)  </td>
					<td align="center"> ____  ____</td>
					</tr>
				<tr>
					<td>Pas Foto Terbaru</td>
					<td align="left">: ____   ____</td>
					<td align="left">Surat Jaminan Kredit (BPKB / Serifikat Tanah</td>
					<td align="center"> ____  ____</td>
					</tr>
				<tr>
					<td>FC Rekening Listrik</td>
					<td align="left">: ____   ____</td>
					<td align="left">        FC Rek Air / Telepon bln Terakhir</td>
					<td align="center">____  ____</td>
					</tr>
				<tr>
					<td >Kegiatan Usaha</td>
					<td align="left">: YES     NO </td>
					<td align="left">Sumber Pembayaran Angsuran Dari</td>
					<td align="center"> Gaji  Usaha</td>
					</tr>
				<tr>
					<td>Memiliki Usaha Sendiri</td>
					<td align="left">: ____   ____</td>
					<td align="left">        Apakah Penggunaan Kredit Utk Usaha</td>
					<td align="center"> ____   ____</td>
					</tr>
				<tr>
					<td>Pengalaman Usaha</td>
					<td align="left">: ___Thn___Bln</td>
					<td align="left">Apakah Memiliki Pinjaman Di Tempat lain</td>
					<td align="center"> ____  ____</td>
					</tr>
				<tr>
					<td >Nama Rekomendasi </td>
					<td colspan="3" align="left">:  <?php echo $nrekom;?></td>
					</tr>
				<tr>
					<td>Alamat Rekomendasi</td>
					<td colspan="3" align="left">: <?php echo $arekom;?></td>
					</tr>
				<tr>
					<td>No Tlp Rekomendasi Krd</td>
					<td colspan="3" align="left">: <?php echo $trekom;?></td>
					</tr>
				<tr>
					<td>Daerah Asal Pemohon</td>
					<td colspan="3" align="left">: </td>
					</tr>
				<tr>
					<td>Nama Daerah Asal</td>
					<td colspan="3" align="left">: </td>
					</tr>
				<tr>
					<td>No Tlp Yg Dpt Dihubungi </td>
					<td colspan="3" align="left">: </td>
					</tr>
				<tr>
					<td >Nama Ibu Kandung</td>
					<td colspan="3" align="left">: <?php echo $namaibu;?></td>
					</tr>
				<tr>
					<td>Dokumen Lainnya</td>
					<td colspan="3" align="left">: Dokumen Lainnya :  ____  ____ (Lampirkan) </td>
					</tr>
			</table>
		</td>
		<td rowspan="4" align="center" valign="top" >
					 <p>PERMOHONAN KREDIT<br/>N      L     R</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
					 <p>PROSES KREDIT <br/>YES   NO   CSL <br/><?php echo 'TGL : '.$tgtran;?></p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
					 <p>TINDAKAN SURVEY <br/> YES   NO   CSL <br/><?php echo 'TGL : '.$tgtran;?> </p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
					 <p>WAWANCARA<br/>YES   NO   CSL<br/><?php echo 'TGL : '.$tgtran;?> </p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
					 <p>________________<br/>BIAYA KREDIT </p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
					 <p>PENCAIRAN KREDIT<br/>YES   NO   CSL<br/><?php echo 'TGL : '.$tgtran;?> </p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
					 <p>SYARAT KREDIT <br/>YES   NO   CSL</p>
		</td>
	</tr>
	<tr>
		<td width="49%" align="center">Rekomendasi Petugas Koperasi</td>
		<td width="34%" rowspan="2" align="center" valign="bottom"><?php echo $nama;?></td>
	</tr>
	<tr>
		<td height="100" align="center" valign="bottom"><?php echo $ttd['nama5'];?></td>
	</tr>
	<tr>
		<td align="center">TTD dan nama petugas</td>
		<td align="center">TTD dan Nama Pemohon</td>
	</tr>
</table>
<?php
$html = ob_get_contents(); 
ob_end_clean();
$mpdf->SetFooter('Tanggal Cetak : {DATE j-m-Y}| | Lembar satu untuk nasabah');
$mpdf->packTableData =true;
$mpdf->simpleTables = true;
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>