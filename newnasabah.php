<div class="ui-widget">
	<form id="masuk" name="masuk" method="POST" action="" >
		<input name="id" type="hidden" id="id" value="<?php echo $id; ?>" maxlength="11" size="11"/>
		<table width="100%">
			<tr><td colspan="4" align="center" class="ui-state-highlight">DATA NASABAH</td></tr>
			<tr>
				<td width="15%" align="right">Branch</td>
				<td width="35">: <input  name="kcabang" type="text" id="kcabang" value="<?php echo $kcabang; ?>" size="50" maxlength="4"  readonly /></td>
				<td width="15%" align="right">No Nasabah</td>
				<td width="35%">: <input  name="nonas" type="text" id="nonas" value="<?php echo $nonas; ?>" size="50" maxlength="6" readonly /></td>
			</tr>
			<tr>
				<td align="right">Nama Sesuai KTP</td>
				<td>: <input name="nama" type="text" id="nama" size="50" maxlength="40" value="<?php echo $nama; ?>" onKeyUp="caps(this)" required /></td>
				<td align="right">Tempat Lahir</td>
				<td>: <input name="tmplahir" type="text" id="tmplahir" size="50" maxlength="30" value="<?php echo $tmplahir; ?>" onKeyUp="caps(this)" required/></td>
			</tr>
			<tr>
				<td align="right">Tanggal Lahir</td>
				<td>: <input name="tgllahir" type="text" id="tgllahir" size="50"  maxlength="10" value="<?php echo $tgllahir; ?>" required/></td>
				<td align="right">No KTP</td>
				<td>: <input name="noktp" type="text" id="noktp" size="50" maxlength="25" value="<?php echo $noktp; ?>"required /></td>
			</tr>
			<tr>
				<td align="right">Masa Berlaku KTP</td>
				<td>: <input name="masaktp" type="text" id="masaktp" size="50" maxlength="10" value="<?php echo $masaktp; ?>" required /></td>
				<td align="right">No NPWP</td>
				<td>: <input name="npwp" type="text" id="npwp" size="50" maxlength="25" value="<?php echo $npwp; ?>" onKeyUp="caps(this)"/></td>
			</tr>
			<tr>
				<td align="right">Jenis Kelamin</td>
				<td>: 
					<select name="jkelamin" id="jkelamin">
						<?php $_jkelamin=$jkelamin;include 'help/jenis_kelamin.php';?>
					</select>
				</td>
				<td align="right">Agama</td>
				<td>	: 
					<select name="agama" id="agama">
						<?php $_agama=$agama;include 'help/jenis_agama.php';?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">Pendidikan</td>
				<td>	: 
					<select name="pendidikan" id="pendidikan">
						<?php $_pendidikan=$pendidikan;include 'help/jenis_pendidikan.php';?>
					</select>
				</td>
				<td align="right">Pekerjaan</td>
				<td>: <input name="pekerjaan1" type="text" id="pekerjaan1" size="50" maxlength="30" value="<?php echo $pekerjaan1;?>" onKeyUp="caps(this)"/>
				</td>
			</tr>
			<tr>
				<td align="right">Status Nasabah</td>
				<td>:
					 <select name="kstatus" id="kstatus">
						<?php $_kstatus=$kstatus;include 'help/status_kawin.php';?>
					</select>
				</td>
				<td align="right">Jml Tanggungan</td>
				<td>: <input name="tanggungan" type="text" id="tanggungan" size="50" maxlength="1" value="<?php echo $tanggungan; ?>"/></td>
			</tr>
			<tr>
				<td align="right">Nama Ibu Kandung</td>
				<td>: <input name="namaibu" type="text" id="namaibu" size="50" maxlength="30" value="<?php echo $namaibu; ?>" onkeyup="caps(this)" required/></td>
				<td align="right">Telepon Rumah</td>
				<td>: <input name="tlprumah" type="text" id="tlprumah" size="50" maxlength="12" value="<?php echo $tlprumah; ?>"/></td>
			</tr>
			<tr>
				<td align="right">No Faximile</td>
				<td>: <input name="tlpfax" type="text" id="tlpfax" size="50" maxlength="12" value="<?php echo $tlpfax; ?>" /></td>
				<td align="right">No Handphone I</td>
				<td>: <input name="tlphp1" type="text" id="tlphp1" size="50" maxlength="12" value="<?php echo $tlphp1; ?>" /></td>
			</tr>
			<tr>
				<td align="right">No Handphone II</td>
				<td>: <input name="tlphp2" type="text" id="tlphp2" size="50" maxlength="12" value="<?php echo $tlphp2; ?>" /></td>
				<td align="right">Alamat</td>
				<td>: <input name="alamat" type="text" id="alamat" size="50" maxlength="45" value="<?php echo $alamat; ?>" onKeyUp="caps(this)" required/></td>
			</tr>
			<tr>
				<td align="right">Kelurahan</td>
				<td>: <input name="lurah" type="text" id="lurah" size="50" maxlength="30" value="<?php echo $lurah; ?>" onKeyUp="caps(this)" required/></td>
				<td align="right">Kecamatan</td>
				<td>: <input name="camat" type="text" id="camat" size="50" maxlength="30" value="<?php echo $camat; ?>" onKeyUp="caps(this)" required/></td>
			</tr>
			<tr>
				<td align="right">Kabupaten</td>
				<td>: 
					<input name="kota" type="text" id="kota" size="10" maxlength="4" class="kota" value="<?php echo $kota;?>"</td>
					<input type="button" value="" id="lookupkota" class="icon-filter"/>
					<span id="nmkota" style="padding-left: 40px"></span>
				<td align="right">Kode Pos</td>
				<td>: 
					<input name="kdpos" type="text" id="kdpos" size="10" maxlength="5" class="kdpos" value="<?php echo $kdpos;?>"</td>
					<input type="button" value="" id="lookuppos" class="icon-filter"/>
					<span id="nmpos" style="padding-left: 40px"></span>
			</tr>
			<tr>
				<td align="right">Propinsi</td>
				<td>: 
					<select name="propinsi" id="propinsi" class="combobox">
					<option value=""></option>
					<?php $_propinsi=$propinsi;include "help/kode_propinsi.php"; ?>
					</select>
				</td>
				<td align="right">Negara</td>
				<td>: <input name="negara" type="text" id="negara" size="50" maxlength="2" value="<?php echo $negara; ?>"/></td>
			</tr>
			<tr>
				<td align="right">Status Rumah</td>
				<td>: 
					<select name="rumah" id="rumah">
						<?php $_rumah=$rumah;include "help/status_rumah.php"; ?>
					</select>
				</td>
				<td align="right">Lama Menempati</td>
				<td>: <input name="lamarmh" type="text" id="lamarmh" size="50" maxlength="2" value="<?php echo $lamarmh; ?>" /></td>
			</tr>
			<tr>
				<td align="right">Nama Suami Istri</td>
				<td>: <input name="sistri" type="text" id="sistri" size="50" maxlength="30" value="<?php echo $sistri; ?>" onKeyUp="caps(this)"/></td>
				<td align="right">Pekerjaan Suami/Istri</td>
				<td>: <input name="pekerjaan2" type="text" id="pekerjaan2" size="50" maxlength="30" value="<?php echo $pekerjaan2; ?>" onKeyUp="caps(this)"/></td>
			</tr>
			<tr>
				<td align="right">Pendapatan Bersih</td>
				<td>: <select name="hasilb" id="hasilb">
						<?php $huruf = array("<= 1 JUTA",">1 JUTA - 5 JUTA",">5 JUTA - 10 JUTA",">10 JUTA - 25 JUTA",">25 JUTA");$i = 0;
						while($i<5){
							if($hasilb == $i) echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
							else  echo "<option value='".$i."'>".$huruf[$i]."</option>";
							$i++;
						} ?>
					</select>
				</td>
				<td align="right">Penghasilan Kotor	</td>
				<td>: <select name="hasilk" id="hasilk">
						<?php $huruf = array("<= 25 JUTA",">25 JUTA - 50 JUTA",">50 JUTA - 100 JUTA",">100 JUTA - 500 JUTA",">500 JUTA");$i = 0;
						while($i<5){
							if($hasilk == $i) echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
							else  echo "<option value='".$i."'>".$huruf[$i]."</option>";
							$i++;
						} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">Sumber Pendapatan Lain</td>
				<td>: <select name="sumberl" id="sumberl">
						<?php $huruf = array("<= 5 JUTA",">5 JUTA - 10 JUTA",">10 JUTA - 25 JUTA",">25 JUTA - 100 JUTA",">100 JUTA");$i = 0;
						while($i<5){
							if($sumberl == $i) echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
							else  echo "<option value='".$i."'>".$huruf[$i]."</option>";
							$i++;
						} ?>
					</select>
				</td>
				<td align="right">Tujuan Pembukaan Rek</td>
				<td>: <select name="tujuanrek" id="tujuanrek">
						<?php $huruf = array("KREDIT","GAJI","TABUNGAN","TRANSAKSI PRIBADI","LAINNYA");$i = 0;
						while($i < 5){
							if($tujuanrek == $i) echo "<option value='" . $i . "' selected>" . $huruf[$i] . "</option>";
							else echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
							$i++;
						} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="4" align="center" class="ui-state-highlight">DI ISI APABILA BERBEDA DENGAN KTP</td>
			</tr>
			<tr>
				<td align="right">Alamat</td>
				<td>: <input name="alamatb" type="text" id="alamatb" size="50" maxlength="45" value="<?php echo $alamatb; ?>"  onkeyup="caps(this)"/></td>
				<td align="right">Kelurahan</td>
				<td>: <input name="lurahb" type="text" id="lurahb" size="50" maxlength="30" value="<?php echo $lurahb; ?>" onKeyUp="caps(this)"/></td>
			</tr>
			<tr >
				<td align="right">Kecamatan</td>
				<td>: <input name="camatb" type="text" id="camatb" size="50" maxlength="30" value="<?php echo $camatb; ?>" onKeyUp="caps(this)"/></td>
				<td align="right">Kabupaten</td>
				<td>: 
					<input name="kotab" type="text" id="kotab" size="10" maxlength="4" class="kotab" value="<?php echo $kotab;?>"</td>
					<input type="button" value="" id="lookupkotab" class="icon-filter"/>
					<span id="nmkotab" style="padding-left: 40px"></span>
			</tr>
			<tr>
				<td align="right">Kode Pos</td>
				<td>: 
					<input name="kdposb" type="text" id="kdposb" size="10" maxlength="5" class="kdposb" value="<?php echo $kdposb;?>"</td>
					<input type="button" value="" id="lookupposb" class="icon-filter"/>
					<span id="nmposb" style="padding-left: 40px"></span>
				<td align="right">Propinsi</td>
				<td>: 
					<select name="propinsib" id="propinsib" class="combobox">
					<option value=""></option>
					<?php $_propinsi=$propinsib;include "help/kode_propinsi.php"; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="4" align="center" class="ui-state-highlight">DATA USAHA NASABAH</td>
			</tr>
			<tr>
				<td align="right">Nama Usaha Satu</td>
				<td>: <input name="usaha1" type="text" id="usaha2" size="50" maxlength="40" value="<?php echo $usaha1; ?>" onKeyUp="caps(this)"/></td>
				<td align="right">Nama Usaha Dua</td>
				<td>: <input name="usaha2" type="text" id="usaha2" size="50" maxlength="40" value="<?php echo $usaha2; ?>" onKeyUp="caps(this)"/></td>
			</tr>
			<tr>
				<td align="right">NPWP Usaha</td>
				<td>: <input name="npwpu" type="text" id="npwpu" size="50" maxlength="25" value="<?php echo $npwpu; ?>" /></td>
				<td align="right">Bidang Usaha</td>
				<td>: <select name="bidang" id="bidang">
						<?php $huruf = array("PENSIUNAN","PERDAGANGAN","INDUSTRI","JASA USAHA","JASA SOSIAL","PEMERINTAH");$i = 0;
						while($i<6){
							if($bidang == $i) echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
							else  echo "<option value='".$i."'>".$huruf[$i]."</option>";
							$i++;
						} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">Alamat</td>
				<td>: <input name="alamatu" type="text" id="alamatu" size="50" maxlength="45" value="<?php echo $alamatu; ?>"  onkeyup="caps(this)"/></td>
				<td align="right">Kelurahan</td>
				<td>: <input name="lurahu" type="text" id="lurahu" size="50" maxlength="30" value="<?php echo $lurahu; ?>" onKeyUp="caps(this)"/></td>
			</tr>
			<tr>
				<td align="right">Kecamatan</td>
				<td>: <input name="camatu" type="text" id="camatu" size="50" maxlength="30" value="<?php echo $camatu; ?>" onKeyUp="caps(this)"/></td>
				<td align="right">Kabupaten</td>
				<td>: 
					<input name="kotau" type="text" id="kotau" size="10" maxlength="4" class="kotau" value="<?php echo $kotau;?>"</td>
					<input type="button" value="" id="lookupkotau" class="icon-filter"/>
					<span id="nmkotau" style="padding-left: 40px"></span>
			</tr>
			<tr>
				<td align="right">Kode Pos</td>
				<td>: 
					<input name="kdposu" type="text" id="kdposu" size="10" maxlength="5" class="kdposu" value="<?php echo $kdposu;?>"</td>
					<input type="button" value="" id="lookupposu" class="icon-filter"/>
					<span id="nmposu" style="padding-left: 40px"></span>
				<td align="right">Propinsi</td>
				<td>: 
					<select name="propinsiu" id="propinsiu">
					<option value=""></option>
					<?php $_propinsi=$propinsiu; include "help/kode_propinsi.php"; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">No Telepon HP</td>
				<td>: <input name="tlphpu" type="text" id="tlphpu" size="50" maxlength="12" value="<?php echo $tlphpu; ?>" /></td>
				<td align="right">No Telepon Kantor</td>
				<td>: <input name="tlpfaxu" type="text" id="tlpfaxu" size="50" maxlength="12" value="<?php echo $tlpfaxu; ?>" /></td>
			</tr>
		</table>
		<div class="ui-widget-content" align="center">
			<input type="submit" value="Simpan" id="submit" onClick="return validasi();" class="icon-ok"/>
			<input type="button" value="Batal" id="submit" onClick="goKembali();" class="icon-no"/>
		</div>
	</form>
</div>