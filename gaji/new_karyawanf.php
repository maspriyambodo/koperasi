<form id="masuk" name="masuk" method="POST" action="">
<input name="id" type="hidden" id="id" value="<?php echo $id; ?>"/>
<table width="100%" class="table">
	<tr>
		<td width="15%" align="right">BRANCH :</td>
		<td width="35%">
			<select name="branch" id="branch" class="combobox">
				<?php $branch=$kcabang;include '../gaji/par_branch.php';?>
			</select>
		</td>
		<td width="15%" align="right">NIK :</td>
		<td width="35%"><input name="nik" type="text" id="nik" value="<?php echo $nik; ?>" size="40" maxlength="10" readonly/></td>
	</tr>
	<tr>
		<td align="right">NAMA :</td>
		<td><input name="nama_karyawan" type="text" id="nama_karyawan" value="" size="40" maxlength="70" onkeyup="caps(this)"/></td>
		<td align="right">NO KTP :</td>
		<td><input name="no_ktp" type="text" id="no_ktp" value="" size="40" maxlength="30" /></td>
	</tr>
	<tr>
		<td align="right">TANGGAL LAHIR :</td>
		<td><input name="tgl_lahir" type="text" id="tgl_lahir" size="15" maxlength="10" value=""/></td>
		<td align="right">TEMPAT LAHIR :</td>
		<td><input name="tempat_lahir" type="text" id="tempat_lahir" size="40" maxlength="50" value="" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">ALAMAT :</td>
		<td><input name="alamat" type="text" id="alamat" size="40" maxlength="100" value="" onkeyup="caps(this)"/></td>
		<td align="right">KELURAHAN :</td>
		<td><input name="kelurahan" type="text" id="kelurahan" size="40" maxlength="50" value="" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">KECAMATAN :</td>
		<td><input name="kecamatan" type="text" id="kecamatan" size="40" maxlength="50" value="" onkeyup="caps(this)"/></td>
		<td align="right">KABUPATEN :</td>
		<td>	
			<input name="kabupaten" type="text" id="kabupaten" size="10" maxlength="4" value="" onkeyup="caps(this)"/>
			<input type="button" id="lookup_kabupaten" class="icon-filter"/>
			<span id="nm_kabupaten" style="padding-left: 40px"></span>
		</td>
	</tr>
	<tr>
		<td align="right">PROPINSI :</td>
		<td><input name="propinsi" type="text" id="propinsi" size="10" maxlength="2" value="" readonly/></td><span id="nm_propinsi" style="padding-left: 40px"></span>
		<td align="right">STATUS KARYAWAN :</td>
		<td>
			<select name="kode_ptkp" id="kode_ptkp" class="combobox">
				<option value="">Pilihan</option>
				<?php $kode_ptkp='';include '../gaji/par_kawin.php';?>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right">JENIS KELAMIN :</td>
		<td>
			<select name="jenis_kelamin" id="jenis_kelamin" class="combobox">
				<?php $huruf = array("PRIA","WANITA");$i = 0;$jenis_kelamin=0;
				while($i < 2){
					if($jenis_kelamin == $i){
						echo "<option value='" .$i. "' selected>" . $huruf[$i] . "</option>";
					}else{
						echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
					}
					$i++;
				} ?>
			</select>
		</td>
		<td align="right">NO TELEPON I :</td>
		<td><input name="no_telepon_1" type="text" id="no_telepon_1" size="20" maxlength="15" value=""/></td>
	</tr>
	<tr>
		<td align="right">NO TELEPON II :</td>
		<td><input name="no_telepon_2" type="text" id="no_telepon_2" size="20" maxlength="15" value=""/></td>
		<td align="right">GRADE :</td>
		<td>
		<input name="kode_grade" type="text" id="kode_grade" size="10" maxlength="4" value=""/>
		<input name="grade" type="text" id="grade" size="10" maxlength="2" value=""/>
		<input type="button" value="" id="lookup_grade" class="icon-filter"/>
		<span id="nm_grade" style="padding-left: 40px"></span>
		</td>
	</tr>
	<tr>
		<td align="right">GAJI POKOK :</td>
		<td><input name="gaji_pokok" type="text" id="gaji_pokok" size="20" maxlength="15" value="" /></td>
		<td align="right">JABATAN :</td>
		<td>
			<select name="kode_jabatan" id="kode_jabatan" class="combobox">
				<option value="">Pilihan</option>
				<?php $kode_jabatan='';include '../gaji/par_jabatan.php';?>
			</select>
		</td>
	</tr>
	<tr>
		<td align="right">AREA :</td>
		<td>
		<input name="kode_lokasi" type="text" id="kode_lokasi" size="10" maxlength="4" value=""/>
		<input type="button" value="" id="lookup_lokasi" class="icon-filter"/>
		<span id="nm_lokasi" style="padding-left: 40px"></span>
		</td>
		<td align="right">DIREKTORAT :</td>
		<td><input name="kode_organisasi" type="text" id="kode_organisasi" size="10" maxlength="4" value="" readonly/><span id="nm_organisasi"></span></td>
	</tr>
	<tr>
		<td align="right">WILAYAH :</td>
		<td><input name="kode_wilayah" type="text" id="kode_wilayah" size="10" maxlength="4" value="" readonly/><span id="nm_wilayah"></span></td>
		<td align="right">No NPWP :</td>
		<td><input name="no_npwp" type="text" id="no_npwp" size="40" maxlength="20" value="" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">NO JAMSOSTEK :</td>
		<td><input name="no_jamsostek" type="text" id="no_jamsotek" size="40" maxlength="20" value="" onkeyup="caps(this)"/></td>
		<td align="right">REKENING INTERNAL :</td>
		<td><input name="no_rekening" type="text" id="no_rekening" size="40" maxlength="20" value="" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">REKENING BANK :</td>
		<td><input name="no_rekening_lain" type="text" id="no_rekening_lain" size="40" maxlength="20" value="" onkeyup="caps(this)"/></td>
		<td align="right">REKENING KREDIT :</td>
		<td><input name="no_kredit" type="text" id="no_kredit" size="40" maxlength="20" value="" onkeyup="caps(this)"/></td>
	</tr>
</table>
<div class="ui-widget-content" align="center">
	<input type="submit" value="Simpan" id="submit" class="icon-save"onclick="return validasi();"/>
	<input type="button" value="Batal" id="submit" onclick="goKembali();" class="icon-cancel"/>
</div>
</form>