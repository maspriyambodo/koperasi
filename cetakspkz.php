<?php include 'h_tetap.php';$id=$result->c_d($_GET['mnorek']);$hasil=$result->res("SELECT nama1,nama2,nama3,telepon1,telepon2,telepon3,jabatan1,jabatan2,jabatan3 FROM $tabel_ttd WHERE branch='$kcabang'");if($result->num($hasil)<1)$result->msg_error('Tabel Tanda Tangan Belum Terdaftar...?');$ttd=$result->row($hasil);$hasil=$result->res("SELECT alamat,no_telepon,no_handphone,no_fax,nama_email FROM $tabel_kantor WHERE kode='$kcabang'");if($result->num($hasil)<1)$result->msg_error('Tabel Kantor Belum Terdaftar...?');$row=$result->row($hasil);$alamat=$row['alamat'];$no_telepon=$row['no_telepon'];$no_fax=$row['no_fax'];$nama_email=$row['nama_email'];$no_handphone=$row['no_handphone'];$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.nocitra,a.nopen,a.tglahir,a.norek,a.notran,a.tgtran,a.nomi,a.deb1,a.kkbayar,a.nmbayar,a.plunas,a.meterai,a.blunas,a.dbunga,a.alunas,a.jumpremi,a.jumrefund,a.jumprovisi,a.jumadm,a.jumbtl,a.jangka,a.suku,a.kdkop,a.branch,a.gaji,a.plain,a.pbank,a.kkbayar,a.produk,a.pokok,a.bunga,a.administrasi,a.umur,a.noktp,a.self1,a.self2,a.self3,a.tbunga,a.simpokok,a.simwajib,a.kdangsur,a.pot_angsuran,a.jumlah_period,a.jum_period,a.kdsales,a.premi,a.nmwaris,a.arekom,a.lrekom,a.krekom,a.trekom,a.instansi_pensiun,a.pengelola_pensiun,a.no_aso_bank,a.no_cif_bank,a.bank_transfer,a.nama_transfer,a.rekening_transfer,a.mitra_cheking,a.tanggal_transfer,a.nama_pendamping,a.tlp_pendamping,a.jenis,a.jenis1,a.kdpin,b.nama,b.pekerjaan1,b.alamat,b.noktp,b.masaktp,b.namaibu,b.kdpos,b.negara,b.tmplahir,b.tlprumah,b.tlphp1,b.rumah,b.jkelamin,b.lurah,b.camat,b.kota,a.nosk,a.pensk,a.tgsk,b.propinsi,b.pendidikan,b.kstatus,b.agama,b.status_anggota,c.nama_bank_sales,c.rekening_bank_sales,c.jumlah_insentif_sales,c.notlp,c.nama as nama_sales FROM $tabelKredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN $tabel_sales c ON a.kdsales=c.idsales WHERE a.id='$id'");$row=$result->row($hasil);$norek=$row['norek'];$tgtran=$row['tgtran'];$nomi=$row['nomi'];$kdkop=$row['kdkop'];$rumah=$row['rumah'];$jkelamin=$row['jkelamin'];$pendidikan=$row['pendidikan'];$agama=$row['agama'];$kstatus=$row['kstatus'];$cabang=$result->namacabang($row['branch']);$xtgtran=$result->jatuh_tempo($row['norek']);include('parameter/_kettagih.php');include('parameter/_agama.php');include('parameter/_pendidikan.php');include('parameter/_ketstatus.php');$jumangsura=$row['pokok']+$row['bunga']+$row['administrasi'];$jumlunas=$row['blunas']+$row['dbunga']+$row['alunas'];$jumbiaya=$row['jumprovisi']+$row['jumadm']+$row['jumpremi']+$row['meterai']+$row['simwajib']+$row['simpokok'];$jumpotong1=$row['plunas']+$row['pot_angsuran']+$row['jum_period']+$row['jumbtl']+$jumlunas;$jumterima=$nomi-($jumbiaya+$jumpotong1);ini_set("memory_limit","516M");$nama_dokumen='Aplikasi Kredit '.$norek;define('_MPDF_PATH','MPDF60/');include(_MPDF_PATH . "mpdf.php");$mpdf=new mPDF('utf-8','A4','','',3,3,18,3,3,3);$mpdf->SetHTMLHeader('<table width="100%" style="vertical-align: bottom;font-family:Arial;font-size:8pt;color:#000000;"><tr><td width="15%"></td><td width="70%" align="center" valign="top">Sk Menteri Koperasi Nomor : II/BH/XXIV/XI/2012 <br/> Tanggal : 19 Nopember 2012 <br/> Alamat : '.$alamat.'<br/> Telp. '.$no_telepon.',HP. '.$no_handphone.',Email '.$nama_email.'</td><td width="15%" align="right"><span><img src="logo.jpg" width="90"/></span></td></tr></table>');ob_start();?>
<table width="100%" border="1" style="font-size: 8pt;border-collapse: collapse;font-family: Arial">
	<tr><td colspan="6" align="center" style="font-size: 16;background:#c9c5c9"><strong>SURAT PERMINTAAN MENCAIRKAN UANG (SPMU) KREDIT</strong></td></tr>
	<tr><td colspan="6">Bersama ini disampaikan surat permintaan mencairkan uang untuk kredit  yang telah disetujui atas nama debitur yaitu :</td></tr>
	<tr><td colspan="6" align="center" style="font-size: 12pt;"><strong>DATA PRIBADI DEBITUR</strong></td></tr>
	<tr>
		<td width="23%">Nama Debitur Sesuai KTP</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['nama'];?></td>
		<td width="23%">No KTP / Masa Berlaku</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['noktp'].' / '.date_sql($row['masaktp']);?></td>
	</tr>
	<tr>
		<td width="23%">Tempat / Tanggal Lahir</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['tmplahir'].' / '.date_sql($row['tglahir']);?></td>
		<td width="23%">Usia / Umur Debitur</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['umur'].' Tahun';?></td>
	</tr>
	<tr>
		<td width="23%">Alamat Tempat Tinggal</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['alamat'];?></td>
		<td width="23%">Nama Gadis Ibu Kandung</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['namaibu'];?></td>
	</tr>
	<tr>
		<td width="23%">Kelurahan / Kecamatan</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['lurah'].' / '.$row['camat'];?></td>
		<td width="23%">No Telp / Hp Debitur / Peminjam</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['tlprumah'].' / '.$row['tlphp1'];?></td>		
	</tr>
	<tr>
		<td width="23%">Kodya / Propinsi</td>
		<td width="3%">:</td>
		<td width="23%">
		<?php 
		$file='json/kabupaten.json';
		$json_file = file_get_contents($file);
		$jfo = json_decode($json_file,TRUE);
		for ($i=0; $i<count($jfo); $i++) {
			if ($row['kota']==$jfo[$i]['kode']) {
				echo $jfo[$i]['desc1'];
			}
		}
		echo ' / '.$row['propinsi'];
		?>	
		</td>
		<td width="23%">Nama Suami / Istri / Ahli Waris</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['nmwaris'];?></td>
	</tr>
	<tr>
		<td width="23%">Kode Pos / Kewargaan</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['kdpos'].' / INDONESIA';?></td>
		<td width="23%">No Telepon Ahli Waris</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['trekom'];?></td>		
	</tr>
	<tr>
		<td width="23%">Pendidikan / Agama</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $xpendidikan.' / '.$xagama ;?></td>
		<td width="23%">Nama  Anak / Cucu Debitur</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['nama_pendamping'];?></td>
	</tr>
	<tr>
		<td width="23%">Jenis Kelamin / Status Perkawinan</td>
		<td width="3%">:</td>
		<td width="23%">
		<?php
		if($jkelamin==0){
			echo 'PRIA'." / ".$xkstatus;
		}else{
			echo 'WANITA'." / ".$xkstatus;
		}?>
		</td>
		<td width="23%">No Telepon  Anak / Cucu Debitur</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['tlp_pendamping'];?></td>
	</tr>
	<tr>
		<td width="23%">Pensiunan Dari</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['pensk'];?></td>
		<td width="23%">Pekerjaan Debitur</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['pekerjaan1'];?></td>
	</tr>
	<tr><td colspan="6" align="center" style="font-size: 12pt;"><strong>DATA PENGAJUAN KREDIT</strong></td></tr>
	<tr>
		<td width="23%">Nama</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['nama'];?></td>
		<td width="23%">Tanggal Pengajuan Kredit</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo date_sql($row['tgtran']);?></td>
	</tr>
	<tr>
		<td width="23%">No Pensiun</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['nopen'];?></td>
		<td width="23%">Tujuam Penggunaan Kredit</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['deb1'];?></td>		
	</tr>
	<tr>
		<td width="23%">No Skep Pensiun</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['nosk'];?></td>
		<td width="23%">Jenis Pinjaman / Kredit</td>
		<td width="3%">:</td>
		<td width="23%">
			<?php 
			$huruf = array("KREDIT PEMBAHARUAN","KREDIT BARU","KREDIT TAKE OVER","DOUBLE PINJAMAN","RESTRUKTURISASI KREDIT","KREDIT TAMBAHAN");$i = 0;
			while($i < 6){
				if($row['kdpin'] == $i){
					echo $huruf[$i];
				}else{
					echo "";
				}
				$i++;
			}
			?>
		</td>
	</tr>
	<tr>
		<td width="23%">Tanggal Skep Pensiun</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo date_sql($row['tgsk']);?></td>
		<td width="23%">Besar Pinjaman Yang Diajukan</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo formatrp($row['nomi']);?></td>
	</tr>
	<tr>
		<td width="23%">Penerbit Skep Pensiun</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['pensk'];?></td>
		<td width="23%">Jangka Waktu / Suku Bunga</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['jangka'].' Bulan / '.$row['suku'].' %';?></td>
	</tr>
	<tr>
		<td width="23%">Jenis / Kode Pensiun</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['jenis1'].' / '.$row['jenis'];?></td>
		<td width="23%">Jumlah Gaji Per Bulan</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo formatrp($row['gaji']);?></td>
	</tr>
	<tr>
		<td width="23%">Nama Instansi Pensiun</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['instansi_pensiun'];?></td>
		<td width="23%">Angsuran Kredit Per Bulan</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo formatrp($jumangsura).' IIR '.number_format((($jumangsura/$row['gaji'])*100),2).' %';?></td>
	</tr>
	<tr>
		<td width="23%">Nama Pengelola Pensiun</td>
		<td width="3%">:</td>
		<td width="23%">
		<?php
			if($row['pengelola_pensiun']==0){
				echo 'PT TASPEN';
			}elseif($row['pengelola_pensiun']==1){
				echo 'PT ASABRI';
			}else{
				echo 'LAINNYA';
			}
		?>	
		</td>
		<td width="23%">Kode Kantor Nabasa / RSO</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['branch'].' / '.$row['kdsales'];?></td>
	</tr>
	<tr><td colspan="6" align="center" style="font-size: 12pt;"><strong>PERHITUNGAN PERINCIAN PINJAMAN</strong></td></tr>
</table>
<table width="100%" style="font-size: 8pt;border-collapse: collapse;font-family: Arial">
	<tr>
		<td colspan="3"><strong>Data RSO Dan DEBITUR</strong></td>
		<td width="23%"><strong>Plafon Kredit Disetujui</strong></td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><?php echo formatrp($row['nomi']);?></td>
	</tr>
	<tr>
		<td width="23%">Nama RSO / Agen</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['nama_sales'];?></td>		
		<td colspan="3"><strong>Potongan</strong></td>
	</tr>
	<tr>
		<td width="23%">No Telepone RSO</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['notlp'];?></td>
		<td width="23%">- Simpanan Pokok</td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><?php echo formatrp($row['simpokok']);?></td>
	</tr>
	<tr>
		<td width="23%">Tgl Survey Domisili Debitur</td>
		<td width="3%">:</td>
		<td width="23%"></td>
		<td width="23%">- Simpanan Wajib</td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><?php echo formatrp($row['simwajib']);?></td>
	</tr>
	<tr>
		<td width="23%">Tanggal Jatuh Tempo Kredit</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo date_sql($xtgtran);?></td>
		<td width="23%">- Provisi Kredit</td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><?php echo formatrp($row['jumprovisi']);?></td>
	</tr>
	<tr>
		<td width="23%">NO ASO Bank BTPN</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['no_aso_bank'];?></td>
		<td width="23%">- Administrasi Kredit</td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><?php echo formatrp($row['jumadm']);?></td>
	</tr>
	<tr>
		<td width="23%">Cheking Database Oleh</td>
		<td width="3%">: </td>
		<td width="23%">
		<?php 
        $hasil=$result->res("SELECT idsales,nama FROM $tabel_sales WHERE idsales='".$row['mitra_cheking']."' ORDER BY nama");
		while($data = $result->row($hasil)){
			if($row['mitra_cheking'] == $data['idsales']){
				echo $data['nama'];
			}else{
				echo "";
			}
		}
		?>	
		</td>
		<td width="23%">- Premi Asuransi</td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><?php echo formatrp($row['jumpremi']);?></td>
	</tr>
	<tr>
		<td width="23%">CIF Bank</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['no_cif_bank'];?></td>
		<td width="23%">- Meterai</td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><?php echo formatrp($row['meterai']);?></td>
	</tr>	
	<tr>
		<td width="23%">Kolektibilitas Debitur</td>
		<td width="3%">:</td>
		<td width="23%">&nbsp;</td>
		<td width="23%"><strong>Jumlah Potongan</strong></td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><?php echo formatrp($jumbiaya);?></td>
	</tr>
	<tr>
		<td width="23%">Kantor Bayar Pensiun</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['nmbayar'];?></td>
		<td colspan="3"><strong>Pelunasan</strong></td>
	</tr>
	<tr>
		<td width="23%">Kode Kantor Bayar Pensiun</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['kkbayar'];?></td>
		<td width="23%">Denda Keterlambatan Angsuran</td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><?php echo formatrp($row['dbunga']);?></td>
	</tr>
	<tr>
		<td width="23%">No Tagihan Sistem</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['norek'];?></td>
		<td width="23%">Sisa Outstanding Kredit Lama</td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><?php echo formatrp($row['plunas']);?></td>
	</tr>	
	<tr>
		<td width="23%">No Rekening Bank BTPN</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['nocitra'];?></td>
		<td width="23%">Pelunasan Bunga+Adm</td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><?php echo formatrp($jumlunas);?></td>
	</tr>		
	<tr>
		<td width="23%">Tanggal Transaksi</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo date_sql($row['tgtran']);?></td>
		<td width="23%">Angsuran Pertama</td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><?php echo formatrp($row['pot_angsuran']);?></td>
	</tr>		
	<tr>
		<td width="23%">Nomor Angota Koperasi</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['nonas'];?></td>
		<td width="23%">Angsuran Grace Period</td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><?php echo formatrp($row['jum_period']);?></td>
	</tr>	
	<tr>
		<td width="23%">Status Anggota Koperasi</td>
		<td width="3%">:</td>
		<td width="23%">
		<?php
			if($row['status_anggota']==0){
				echo 'ANGGOTA';
			}else{
				echo 'CALON ANGGOTA';
			}
		?>	
		</td>
		<td width="23%">Blokir Pinjaaman/Jaminan Skep</td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><?php echo formatrp($row['jumbtl']);?></td>
	</tr>	
	<tr>
		<td width="23%">Tanggal Transfer</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo date_sql($row['tanggal_transfer']);?></td>
		<td width="23%">Sisa Hutang Pada Bank Lain</td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><?php echo formatrp(0);?></td>
	</tr>
	<tr>
		<td width="23%">Nama Bank Tujuan Transfer</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['bank_transfer'];?></td>
		<td width="23%"><strong>Jumlah Pelunasan</strong></td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><?php echo formatrp($jumpotong1);?></td>
	</tr>	
	<tr>
		<td width="23%">Nama Debitur Pada Bank</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['nama_transfer'];?></td>
		<td width="23%"><strong>Jumlah Potongan + Pelunasan</strong></td>
		<td width="3%">Rp</td>
		<td width="23%" align="right"><strong><?php echo formatrp($jumpotong1+$jumbiaya);?></strong></td>
	</tr>			
	<tr>
		<td width="23%">No Rekening Tujuan</td>
		<td width="3%">:</td>
		<td width="23%"><?php echo $row['rekening_transfer'];?></td>
		<td colspan="3">&nbsp;</td>
	</tr>	
	<tr>
		<td width="23%">Net Jumlah Di Transfer</td>
		<td width="3%">:</td>
		<td width="23%"><strong><?php echo formatrp($jumterima);?></strong></td>
		<td width="23%"><strong>Jumlah Penerimaan Bersih</strong></td>
		<td width="3%">Rp</td>
		<td width="23%" align="right" style="border-width: 2px"><strong><?php echo formatrp($jumterima);?></strong></td>
	</tr>	
	<tr>
		<td colspan="6">Terbilang : <strong><em> <?php echo ' ['. terbilang($jumterima).' rupiah ]';?> </em></strong></td>
	</tr>
</table>
<table style="font-size:8pt; border-collapse: collapse;font-family: Arial" width="100%" align="center">
	<tr><td colspan="4"><hr/></td></tr>
	<tr><td colspan="2" style="font-size: 12pt" align="center"><strong>PERNYATAAN DAN SURAT KUASA DEBITUR</strong></td></tr>
	<tr>
		<td valign="top">1.</td>
		<td align="justify">
		Semua informasi dan data dalam SPMU Kredit ini adalah lengkap dan benar, dengan ini saya memberikan kuasa kepada KSP Nabasa untuk melakukan pemeriksaan terhadap data dan dokumen tersebut dengan cara apa pun yang dianggap layak. KSP Nabasa telah memberikan penjelasan mengenai karakteristik kredit yang telah saya tanda tangani dan mengerti segala konsekwensi termasuk resiko dan biaya-biaya yang timbul. Saya tidak akan melunasi pinjaman sampai jatuh tempo kredit berakhir.
		</td>
	</tr>
	<tr>
		<td valign="top">2.</td>
		<td align="justify">
		Dengan menandatangani perjanjian kredit , saya telah memberikan dan menanda tangani Surat Kuasa untuk memotong manfaat pensiun saya setiap bulannya dan menyerahkannya hasil potongan tersebut ke rekening Ksp. Nabasa yang ditunjuk  serta saya mengikat diri terhadap ketentuan kredit ini termaksud perubahannya.
		</td>
	</tr>
	<tr>
		<td valign="top">3.</td>
		<td align="justify">
		Dengan menandatangani Surat Permintaan Mencairkan Uang ( SPMU ) Kredit , saya mengakui dan menyatakan bahwa uang hasil penerimaan bersih kredit  telah diterima seluruhnya melalui rekening bank yang saya tunjuk serta menerima segala perhitungannya yang merupakan bagian yang tidak terpisahkan dari ketentuan kredit saya ini.
		</td>
	</tr>
</table>
<table style="font-size:8pt; border-collapse: collapse;font-family: Arial" border="1" width="100%" align="center">
	<tr>
		<td align="center" width="25%">Disetujui Oleh Kreditur</td>
		<td align="center" width="25%">Diperiksa Oleh Kreditur</td>
		<td align="center" width="25%">Dibuat Oleh Kreditur</td>
		<td align="center" width="25%">Pemohon Oleh Peminjam</td>
	</tr>
	<tr>
		<td align="center"><?php echo $ttd['jabatan1'];?></td>
		<td align="center"><?php echo $ttd['jabatan3'];?></td>
		<td align="center"><?php echo $ttd['jabatan2'];?></td>
		<td align="center">Debitur</td>
	</tr>
	<tr>
		<td height="70" align="center" valign="bottom"><?php echo $ttd['nama1'];?></td>
		<td height="70" align="center" valign="bottom"><?php echo $ttd['nama3'];?></td>
		<td height="70" align="center" valign="bottom"><?php echo $ttd['nama2'];?></td>
		<td height="70" align="center" valign="bottom"><?php echo $row['nama'];?></td>
	</tr>
	<tr>
		<td align="center"><?php echo $ttd['telepon1'];?></td>
		<td align="center"><?php echo $ttd['telepon3'];?></td>
		<td align="center"><?php echo $ttd['telepon2'];?></td>
		<td align="center">&nbsp;</td>
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