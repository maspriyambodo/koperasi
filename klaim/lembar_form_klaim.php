<tr><td colspan="4" align="center" class="ui-state-highlight">PENGAJUAN KLAIM ASURANSI / PENGHAPUSAN OBD</td></tr>
<tr>
	<td align="right">Status Tagihan :</td>
	<td>
		<select name="ketnas" id="ketnas" style="width:250px;">
		<?php $huruf = array("DI TAGIH","TIDAK DITAGIH");$i=0;
		while($i < 2){
			if($ketnas == $i){
				echo "<option value='" .$i. "' selected>" . $huruf[$i] . "</option>";
			}else{
				echo "<option value='".$i."'>".$huruf[$i] . "</option>";
			}
			$i++;
		} ?>
		</select>
	</td>
	<td align="right">Alasan Tidak Ditagih :</td>
	<td>
		<select name="kketnas" id="kketnas" style="width:250px;">
		<?php $huruf=array("PILIHAN","MENINGGAL DUNIA","JAMINAN TIDAK ADA","JAMINAN PALSU","DOUBLE PINJAMAN BANK","PENGURUSAN KLAIM ASURANSI","GAJI TIDAK TERBIT/STOP","DEBITUR NAKAL/TIDAK BAIK","MUTASI UANG PENSIUN","GAJI MINUS/TURUN");
		$i=0;
		while($i<10){
			if($kketnas==$i){
				echo "<option value='" .$i. "' selected>" . $huruf[$i] . "</option>";
			}else{
				echo "<option value='".$i."'>".$huruf[$i] . "</option>";
			}
			$i++;
		}?>
		</select>
	</td>
</tr>
<tr>
	<td align="right">Nama :</td>
	<td><input type="text" name="nama" id="nama" maxlength="45" size="40" value="<?php echo $nama; ?>" onkeyup="caps(this)"/></td>
	<td align="right">No Rekening :</td>
	<td><input type="text" name="norek" id="norek" maxlength="15" size="40" value="<?php echo $norek; ?>" readonly onkeyup="caps(this)"/></td>
</tr>
<tr>
	<td align="right">Tanggal Lahir :</td>
	<td><input type="text" name="tgl_lahir" id="tgl_lahir" maxlength="15" size="40" value="<?php echo $tglahir;?>" readonly/></td>
	<td align="right">Tempat lahir :</td>
	<td><input type="text" name="tmp_lahir" id="tmp_lahir" maxlength="45" size="40" value="<?php echo $tmplahir; ?>" onkeyup="caps(this)"/></td>
</tr>
<tr>
	<td align="right">Tanggal Meninggal :</td>
	<td><input name="tgl_mati" type="text" id="tgl_mati" maxlength="15" size="40" value="<?php echo $r['tgl_mati']; ?>" onblur="cekDateTime(this)"/></td>
	<td align="right">Tempat Meninggal :</td>
	<td><input type="text" name="tmp_mati" id="tmp_mati" maxlength="45" size="40" value="<?php echo $r['tmp_mati']; ?>" onkeyup="caps(this)"/></td>
</tr>
<tr>
	<td align="right">Sebab Meninggal :</td>
	<td><input name="sebab_mati" type="text" id="sebab_mati" maxlength="45" size="40" value="<?php echo $r['sebab_mati']; ?>" onkeyup="caps(this)"/></td>
	<td align="right">Ket. Sebab Meninggal :</td>
	<td><input type="text" name="ket_mati" id="ket_mati" maxlength="150" size="40" value="<?php echo $r['ket_mati']; ?>" onkeyup="caps(this)"/></td>
</tr>
<tr>
	<td align="right">Tanggal Pengajuan</td>
	<td><input name="tgl_klaim" type="text" id="tgl_klaim" maxlength="15" size="40" value="<?php echo $r['tgl_klaim']; ?>" onblur="cekDateTime(this)"/></td>
	<td align="right">Jenis Pengajuan Klaim: </td>
	<td>
		<select name="jenis_klaim" id="jenis_klaim" style="width:250px;">
		<?php $huruf = array("PREMI ASURANSI","PPAP CAD. UMUM PENSIUN","PPAP CAD UMUM PEGAWAI","PPAP CAD UMUM MICRO","PPAP CAD. KHUSUS PENSIUN","PPAP CAD KHUSUS PEGAWAI","PPAP CAD KHUSUS MICRO","TKAK PENSIUN","TKAK PEGAWAI","TKAK UMUM","SKAK PENSIUN","SKAK PEGAWAI","SKAK UMUM");$i = 0;
		while($i < 13){
			if($r['jenis_klaim']== $i){
				echo "<option value='" .$i. "' selected>" . $huruf[$i] . "</option>";
			}else{
				echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
			}
			$i++;
		}?>
		</select>
	</td>
</tr>
<tr>
	<td align="right">Plafond :</td>
	<td><input name="nomi" type="text" id="nomi" maxlength="45" size="40" value="<?php echo formatrp($nomi); ?>" /></td>
	<td align="right">Outstanding :</td>
	<td><input type="text" name="saldoa" id="saldoa" maxlength="15" size="40" value="<?php echo formatrp($saldox); ?>" /></td>
</tr>	
<tr>
	<td align="right">Status Klaim :</td>
	<td>
		<select name="status_klaim" id="status_klaim" style="width:250px;">
		<?php $huruf = array("BELUM DIAJUKAN","DALAM PROSES PENGJUAN");$i=0;
		while($i < 2){
			if($r['status_klaim'] == $i){
				echo "<option value='" .$i. "' selected>" . $huruf[$i] . "</option>";
			}else{
				echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
			}
			$i++;
		}?>
		</select>
	</td>
	<td align="right">Jumlah Pengajuan Klaim :</td>
	<td><input name="jumlah_klaim" type="text" id="jumlah_klaim" maxlength="15" size="40" value="<?php echo $saldox; ?>"/></td>
</tr>
<tr>
	<td align="right">No Akte Kematian :</td>
	<td><input name="no_akte_kematian" type="text" id="no_akte_kematian" maxlength="50" size="40" value="<?php echo $r['no_akte_kematian']; ?>" onkeyup="caps(this)"/></td>
	<td align="right">Tanggal Akte Kematian :</td>
	<td><input name="tgl_akte_kematian" type="text" id="tgl_akte_kematian" maxlength="15" size="40" value="<?php echo $r['tgl_akte_kematian']; ?>" onblur="cekDateTime(this)"/></td>
</tr>
<tr>
	<td align="right">No Surat Taspen :</td>
	<td><input name="no_surat_taspen" type="text" id="no_surat_taspen" maxlength="50" size="40" value="<?php echo $r['no_surat_taspen']; ?>" onkeyup="caps(this)"/></td>
	<td align="right">Tanggal Surat Taspen :</td>
	<td><input name="tgl_surat_taspen" type="text" id="tgl_surat_taspen" maxlength="15" size="40" value="<?php echo $r['tgl_surat_taspen']; ?>" onblur="cekDateTime(this)"/></td>
</tr>
<tr>
	<td align="right">Nama Ahli Waris :</td>
	<td><input name="nama_ahli_waris" type="text" id="nama_ahli_waris" maxlength="50" size="40" value="<?php echo $r['nama_ahli_waris']; ?>" onkeyup="caps(this)"/></td>
	<td align="right">Hubungan Dengan Debitur :</td>
	<td>
		<select name="hub_ahli_waris" id="hub_ahli_waris" style="width:250px;">
		<?php $huruf = array("SUAMI/ISTRI","ANAK KANDUNG","KAKAK/ADIK","HUBUNGAN KELUARGA");$i=0;
		while($i < 4){
			if($r['hub_ahli_waris'] == $i){
				echo "<option value='" .$i. "' selected>" . $huruf[$i] . "</option>";
			}else{
				echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
			}
			$i++;
		}?>
		</select>
	</td>
</tr>
<tr>
	<td align="right">Alamat Ahli Waris :</td>
	<td><input name="alt_ahli_waris" type="text" id="alt_ahli_waris" maxlength="50" size="40" value="<?php echo $r['alt_ahli_waris']; ?>" onkeyup="caps(this)"/></td>
	<td align="right">Telepon Ahli Waris :</td>
	<td><input name="tlp_ahli_waris" type="text" id="tlp_ahli_waris" maxlength="15" size="40" value="<?php echo $r['tlp_ahli_waris']; ?>"/></td>
</tr>