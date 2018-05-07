<tr><td colspan="4" align="center" class="ui-state-highlight">PENGAJUAN KLAIM ASURANSI / PENGHAPUSAN OBD</td></tr>
<tr>
	<td>Status Tagihan</td>
	<td>: 
		<?php $huruf = array("DI TAGIH","TIDAK DITAGIH");$i=0;
		while($i < 2){
			if($ketnas == $i){
				echo $huruf[$i];
			}else{
				echo "";
			}
			$i++;
		} ?>
	</td>
	<td>Alasan Tidak Ditagih</td>
	<td>: 
		<?php $huruf=array("PILIHAN","MENINGGAL DUNIA","JAMINAN TIDAK ADA","JAMINAN PALSU","DOUBLE PINJAMAN BANK","PENGURUSAN KLAIM ASURANSI","GAJI TIDAK TERBIT/STOP","DEBITUR NAKAL/TIDAK BAIK","MUTASI UANG PENSIUN","GAJI MINUS/TURUN");
		$i=0;
		while($i<10){
			if($kketnas==$i){
				echo $huruf[$i];
			}else{
				echo "";
			}
			$i++;
		}?>
	</td>
</tr>
<tr>
	<td>Nama</td>
	<td>: <?php echo $nama; ?></td>
	<td>No Rekening</td>
	<td>: <?php echo $norek; ?></td>
</tr>
<tr>
	<td>Tanggal Lahir</td>
	<td>: <?php echo $tglahir; ?></td>
	<td>Tempat lahir</td>
	<td>: <?php echo $tmplahir; ?></td>
</tr>
<tr>
	<td>Tanggal Meninggal</td>
	<td>: <?php echo $r['tgl_mati']; ?></td>
	<td>Tempat Meninggal</td>
	<td>: <?php echo $r['tmp_mati']; ?></td>
</tr>
<tr>
	<td>Sebab Meninggal</td>
	<td>: <?php echo $r['sebab_mati']; ?></td>
	<td>Ket. Sebab Meninggal</td>
	<td>: <?php echo $r['ket_mati']; ?></td>
</tr>
<tr>
	<td>Tanggal Pengajuan</td>
	<td>: <?php echo $r['tgl_klaim']; ?></td>
	<td>Jenis Pengajuan Klaim: </td>
	<td>: 
		<?php $huruf = array("PREMI ASURANSI","PPAP CAD. UMUM PENSIUN","PPAP CAD UMUM PEGAWAI","PPAP CAD UMUM MICRO","PPAP CAD. KHUSUS PENSIUN","PPAP CAD KHUSUS PEGAWAI","PPAP CAD KHUSUS MICRO","TKAK PENSIUN","TKAK PEGAWAI","TKAK UMUM","SKAK PENSIUN","SKAK PEGAWAI","SKAK UMUM");$i = 0;
		while($i < 13){
			if($r['jenis_klaim']== $i){
				echo $huruf[$i];
			}else{
				echo "";
			}
			$i++;
		}?>
	</td>
</tr>
<tr>
	<td>Plafond</td>
	<td>: <?php echo formatrp($nomi); ?></td>
	<td>Outstanding</td>
	<td>: <?php echo formatrp($saldox); ?></td>
</tr>	
<tr>
	<td>Status Klaim</td>
	<td>: 
		<?php $huruf = array("BELUM DIAJUKAN","DALAM PROSES PENGJUAN");$i=0;
		while($i < 2){
			if($r['status_klaim'] == $i){
				echo $huruf[$i];
			}else{
				echo "";
			}
			$i++;
		}?>
	</td>
	<td>Jumlah Pengajuan Klaim</td>
	<td>: <?php echo $saldox; ?></td>
</tr>
<tr>
	<td>No Akte Kematian</td>
	<td>: <?php echo $r['no_akte_kematian']; ?></td>
	<td>Tanggal Akte Kematian</td>
	<td>: <?php echo $r['tgl_akte_kematian']; ?></td>
</tr>
<tr>
	<td>No Surat Taspen</td>
	<td>: <?php echo $r['no_surat_taspen']; ?></td>
	<td>Tanggal Surat Taspen</td>
	<td>: <?php echo $r['tgl_surat_taspen']; ?></td>
</tr>
<tr>
	<td>Nama Ahli Waris</td>
	<td>: <?php echo $r['nama_ahli_waris']; ?></td>
	<td>Hubungan Dengan Debitur</td>
	<td>: 
		<?php $huruf = array("SUAMI/ISTRI","ANAK KANDUNG","KAKAK/ADIK","HUBUNGAN KELUARGA");$i=0;
		while($i < 4){
			if($r['hub_ahli_waris'] == $i){
				echo $huruf[$i];
			}else{
				echo "";
			}
			$i++;
		}?>
	</td>
</tr>
<tr>
	<td>Alamat Ahli Waris</td>
	<td>: <?php echo $r['alt_ahli_waris']; ?></td>
	<td>Telepon Ahli Waris</td>
	<td>: <?php echo $r['tlp_ahli_waris']; ?></td>
</tr>
<tr>
	<td>Bulan Angsuran Ke</td>
	<td>: <?php echo $r['angsur_ke']; ?> BULAN</td>
	<td align="right" colspan="2">&nbsp;</td>
</tr>