<?php 
if($kdskep==0){?>
	<tr>
		<td align="right">No SK Pensiun :</td>
		<td><input name="nosk" type="text" id="nosk" size="45" maxlength="45" value="<?php echo $nosk; ?>" onkeyup="caps(this)"/></td>
		<td align="right">Penerbit SK Pensiun :</td>
		<td><input name="pensk" type="text" id="pensk" size="45" maxlength="35" value="<?php echo $pensk; ?>" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">Tanggal SK Pensiun :</td>
		<td><input name="tgsk" type="text" id="tgsk" size="45" maxlength="10" value="<?php echo $tgsk; ?>"/></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<input name="agunan1" type="hidden" id="agunan1" size="45" maxlength="45" value=""/>
	<input name="agunan2" type="hidden" id="agunan2" size="45" maxlength="45" value=""/>
	<input name="agunan3" type="hidden" id="agunan3" size="45" maxlength="45" value=""/>
	<input name="agunan4" type="hidden" id="agunan4" size="45" maxlength="45" value=""/>
	<input name="agunan5" type="hidden" id="agunan5" size="45" maxlength="45" value=""/>
	<input name="agunan6" type="hidden" id="agunan6" size="45" maxlength="45" value=""/>
	<input name="tgstnk" type="hidden" id="tgstnk" size="45" maxlength="10" value=""/>
	<input name="tgpjk" type="hidden" id="tgpjk" size="45" maxlength="10" value=""/><?php 
}elseif($kdskep==1){?>
	<tr>
		<td align="right">No SK Pegawai Aktif :</td>
		<td><input name="nosk" type="text" id="nosk" size="45" maxlength="45" value="<?php echo $nosk; ?>" onkeyup="caps(this)"/></td>
		<td align="right">Penerbit SK Pegawai Aktif :</td>
		<td><input name="pensk" type="text" id="pensk" size="45" maxlength="35" value="<?php echo $pensk; ?>" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">Tanggal SK Pegawai Aktif :</td>
		<td><input name="tgsk" type="text" id="tgsk" size="45" maxlength="10" value="<?php echo $tgsk; ?>"/></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<input name="agunan1" type="hidden" id="agunan1" size="45" maxlength="45" value=""/>
	<input name="agunan2" type="hidden" id="agunan2" size="45" maxlength="45" value=""/>
	<input name="agunan3" type="hidden" id="agunan3" size="45" maxlength="45" value=""/>
	<input name="agunan4" type="hidden" id="agunan4" size="45" maxlength="45" value=""/>
	<input name="agunan5" type="hidden" id="agunan5" size="45" maxlength="45" value=""/>
	<input name="agunan6" type="hidden" id="agunan6" size="45" maxlength="45" value=""/>
	<input name="tgstnk" type="hidden" id="tgstnk" size="45" maxlength="10" value=""/>
	<input name="tgpjk" type="hidden" id="tgpjk" size="45" maxlength="10" value=""/><?php
}elseif($kdskep==2){?>
	<tr>
		<td align="right">Nomor BPKB :</td>
		<td><input name="nosk" type="text" id="nosk" size="45" maxlength="45" value="<?php echo $nosk; ?>" onkeyup="caps(this)"/></td>
		<td align="right">Pembuat BPKP :</td>
		<td><input name="pensk" type="text" id="pensk" size="45" maxlength="35" value="<?php echo $pensk; ?>" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">Tanggal BPKP :</td>
		<td><input name="tgsk" type="text" id="tgsk" size="45" maxlength="10" value="<?php echo $tgsk; ?>"/></td>
		<td align="right">DB / Tahun Pembuatan :</td>
		<td><input name="agunan1" type="text" id="agunan1"  maxlength="45" value="<?php echo $agunan1;?>" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">Nomor Rangka :</td>
		<td><input name="agunan2" type="text" id="agunan2" size="45" maxlength="45" value="<?php echo $agunan2;?>" onkeyup="caps(this)"/></td>
		<td align="right">Nomor Mesin :</td>
		<td><input name="agunan3" type="text" id="agunan3" size="45" maxlength="45" value="<?php echo $agunan3;?>" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">Type / Model :</td>
		<td><input name="agunan4" type="text" id="agunan4" size="45" maxlength="45" value="<?php echo $agunan4;?>" onkeyup="caps(this)"/></td>
		<td align="right">NO STNK :</td>
		<td><input name="agunan5" type="text" id="agunan5" size="45" maxlength="45" value="<?php echo $agunan5;?>" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">Tgl Berlaku STNK :</td>
		<td><input name="tgstnk" type="text" id="tgstnk" size="45" maxlength="10" value="<?php echo $tgstnk;?>"/></td>
		<td align="right">Tgl Berakhir Pajak :</td>
		<td><input name="tgpjk" type="text" id="tgpjk" size="45" maxlength="10" value="<?php echo $tgpjk; ?>"/></td>
	</tr>
	<input name="agunan6" type="hidden" id="agunan6" size="45" maxlength="45" value=""/><?php 
}elseif($kdskep==3){?>
	<tr>
		<td align="right">Nomor Sertifikat :</td>
		<td><input name="nosk" type="text" id="nosk" size="45" maxlength="45" value="<?php echo $nosk; ?>" onkeyup="caps(this)"/></td>
		<td align="right">Pembuat Sertifikat :</td>
		<td><input name="pensk" type="text" id="pensk" size="45" maxlength="35" value="<?php echo $pensk; ?>" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">Tanggal Sertifikat :</td>
		<td><input name="tgsk" type="text" id="tgsk" size="45" maxlength="10" value="<?php echo $tgsk; ?>"/></td>
		<td align="right">Nama Notaris :</td>
		<td><input name="agunan1" type="text" id="agunan1" size="45" maxlength="45" value="<?php echo $agunan1;?>" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">Alamat Notaris :</td>
		<td><input name="agunan2" type="text" id="agunan2" size="45" maxlength="45" value="<?php echo $agunan2;?>" onkeyup="caps(this)"/></td>
		<td align="right">Luas Tanah/Bangunan :</td>
		<td><input name="agunan3" type="text" id="agunan3" size="45" maxlength="45" value="<?php echo $agunan3;?>" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">Pemilik :</td>
		<td><input name="agunan4" type="text" id="agunan4" size="45" maxlength="45" value="<?php echo $agunan4;?>" onkeyup="caps(this)"/></td>
		<td align="right">Alamat :</td>
		<td><input name="agunan5" type="text" id="agunan5" size="45" maxlength="45" value="<?php echo $agunan5;?>" onkeyup="caps(this)"/></td>
	</tr>
	<input name="tgstnk" type="hidden" id="tgstnk" size="45" maxlength="10" value=""/>
	<input name="tgpjk" type="hidden" id="tgpjk" size="45" maxlength="10" value=""/>
	<input name="agunan6" type="hidden" id="agunan6" size="45" maxlength="35" value=""/><?php 
}elseif($kdskep==4){?>
	<tr>
		<td align="right">No Ijazah :</td>
		<td><input name="nosk" type="text" id="nosk" size="45" maxlength="45" value="<?php echo $nosk; ?>" onkeyup="caps(this)"/></td>
		<td align="right">Pembuat Ijazah :</td>
		<td><input name="pensk" type="text" id="pensk" size="45" maxlength="35" value="<?php echo $pensk; ?>" onkeyup="caps(this)"/></td>
	</tr><tr>
		<td align="right">Tanggal Ijazah :</td>
		<td><input name="tgsk" type="text" id="tgsk" size="45" maxlength="10" value="<?php echo $tgsk; ?>"/></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<input name="agunan1" type="hidden" id="agunan1" size="45" maxlength="45" value=""/>
	<input name="agunan2" type="hidden" id="agunan2" size="45" maxlength="45" value=""/>
	<input name="agunan3" type="hidden" id="agunan3" size="45" maxlength="45" value=""/>
	<input name="agunan4" type="hidden" id="agunan4" size="45" maxlength="45" value=""/>
	<input name="agunan5" type="hidden" id="agunan5" size="45" maxlength="45" value=""/>
	<input name="agunan6" type="hidden" id="agunan6" size="45" maxlength="45" value=""/>
	<input name="tgstnk" type="hidden" id="tgstnk" size="45" maxlength="10" value=""/>
	<input name="tgpjk" type="hidden" id="tgpjk" size="45" maxlength="10" value=""/><?php 
}elseif($kdskep==5){?>
	<tr>
		<td align="right">	No Akte Nikah :</td>
		<td><input name="nosk" type="text" id="nosk" size="45" maxlength="45" value="<?php echo $nosk; ?>" onkeyup="caps(this)"/></td>
		<td align="right">Pembuat Akte Nikah :</td>
		<td><input name="pensk" type="text" id="pensk" size="45" maxlength="35" value="<?php echo $pensk; ?>" onkeyup="caps(this)"/></td>
	</tr><tr>
		<td align="right">Tanggal Pernikahan :</td>
		<td><input name="tgsk" type="text" id="tgsk" size="45" maxlength="10" value="<?php echo $tgsk; ?>"/></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<input name="agunan1" type="hidden" id="agunan1" size="45" maxlength="45" value=""/>
	<input name="agunan2" type="hidden" id="agunan2" size="45" maxlength="45" value=""/>
	<input name="agunan3" type="hidden" id="agunan3" size="45" maxlength="45" value=""/>
	<input name="agunan4" type="hidden" id="agunan4" size="45" maxlength="45" value=""/>
	<input name="agunan5" type="hidden" id="agunan5" size="45" maxlength="45" value=""/>
	<input name="agunan6" type="hidden" id="agunan6" size="45" maxlength="45" value=""/>
	<input name="tgstnk" type="hidden" id="tgstnk" size="45" maxlength="10" value=""/>
	<input name="tgpjk" type="hidden" id="tgpjk" size="45" maxlength="10" value=""/><?php 
}elseif($kdskep==6){?>
	<input name="nosk" type="hidden" id="nosk" size="45" maxlength="45" value=""/>
	<input name="pensk" type="hidden" id="pensk" size="45" maxlength="45" value=""/>
	<input name="tgsk" type="hidden" id="tgsk" size="45" maxlength="10" value=""/>
	<input name="agunan1" type="hidden" id="agunan1" size="45" maxlength="45" value=""/>
	<input name="agunan2" type="hidden" id="agunan2" size="45" maxlength="45" value=""/>
	<input name="agunan3" type="hidden" id="agunan3" size="45" maxlength="45" value=""/>
	<input name="agunan4" type="hidden" id="agunan4" size="45" maxlength="45" value=""/>
	<input name="agunan5" type="hidden" id="agunan5" size="45" maxlength="45" value=""/>
	<input name="agunan6" type="hidden" id="agunan6" size="45" maxlength="45" value=""/>
	<input name="tgstnk" type="hidden" id="tgstnk" size="45" maxlength="10" value=""/>
	<input name="tgpjk" type="hidden" id="tgpjk" size="45" maxlength="10" value=""/>
	<?php
} ?>