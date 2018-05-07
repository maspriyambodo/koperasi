<form id="masuk" name="masuk" method="POST" action="">
<input name="id" type="hidden" id="id" value="<?php echo $row['id']; ?>"/>
<input name="kdkop" type="hidden" id="kdkop" value="<?php echo $row['kdkop']; ?>"/>
<input name="kdjamin" type="hidden" id="kdjamin" value="<?php echo $row['kdjamin']; ?>"/>
<input name="skredit" type="hidden" id="skredit" value="<?php echo $row['skredit']; ?>"/>
<input name="kdguna" type="hidden" id="kdguna" value="<?php echo $row['kdguna']; ?>"/>
<input name="kdgol" type="hidden" id="kdgol" value="<?php echo $row['kdgol']; ?>"/>
<input name="kdsektor" type="hidden" id="kdsektor" value="<?php echo $row['kdsektor'];?>"/>
<input name="jkredit" type="hidden" id="jkredit" value="<?php echo $row['jkredit'];?>"/>
<table width="100%">
	<tr><th colspan="6" class="ui-state-highlight">	
		<?php
		if($level < 2){
			echo '<a href="" onclick="editsaldo();return false;">DATA DEBITUR</a>';
		}else{
			echo 'DATA DEBITUR || JAMINAN DEBITUR';
		}?>
	</th></tr>
	<?php include '../_headerx.php';?>
	<tr>
		<td>Pekerjaan</td>
		<td><input name="pekerjaan" type="text" id="pekerjaan" value="<?php echo $row['pekerjaan']; ?>" size="45" maxlength="20" onkeyup="caps(this)"/></td>
		<td>Nopen</td>
		<td><input name="nopen" type="text" id="nopen" value="<?php echo $row['nopen']; ?>" size="45" maxlength="15" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td>Kode Jiwa</td>
		<td><input name="kdjiwa" type="text" id="kdjiwa" value="<?php echo $row['kdjiwa']; ?>" size="45" maxlength="4"/></td>
		<td>Kode Pensiun</td>
		<td>
			<select name="jenis" id="jenis" class="combobox">
				<option value="">PILIHAN</option>
				<?php include '../config/jenis_pensiun.php';?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Jenis Pensiun</td>
		<td><input name="jenis1" type="text" id="jenis1" size="45" maxlength="20" value="<?php echo $row['jenis1']; ?>" onkeyup="caps(this)"/></td>
		<td>No Dapem</td>
		<td><input name="nodapem" type="text" id="nodapem" size="45" maxlength="15" value="<?php echo $row['nodapem']; ?>" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td>No Karip</td>
		<td><input name="nokarip" type="text" id="nokarip" size="45" maxlength="15" value="<?php echo $row['nokarip']; ?>" onkeyup="caps(this)"/></td>
		<td>Nama SID</td>
		<td><input name="nmsid" type="text" id="nmsid" size="45" maxlength="30" value="<?php echo $row['nmsid']; ?>" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td><input name="tgl_lahir" type="text" id="tgl_lahir" size="45" maxlength="15" onblur="cekDateTime(this)" value="<?php echo date_sql($row['tgllahir']); ?>"</td>
		<td>No KTP</td>
		<td><input name="no_ktp" type="text" id="no_ktp" size="45" maxlength="15" value="<?php echo $row['noktp']; ?>" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		
		<td>Pengelola Pensiun</td>
		<td>
			<select name="pengelola_pensiun" id="pengelola_pensiun" class="combobox">
			<?php $huruf = array("PT TASPEN","PT ASABRI","LAINNYA");$i = 0;
			while($i<3){
				if($row['pengelola_pensiun'] == $i) echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
				else  echo "<option value='".$i."'>".$huruf[$i]."</option>";
				$i++;
			}?>
			</select>
		</td>
		<td>Instansi Pensiun</td>
		<td><input name="instansi_pensiun" type="text" id="instansi_pensiun" maxlength="55" size="45" value="<?php echo $row['instansi_pensiun'];?>"/></td>
	</tr>
	<tr><th colspan="6" class="ui-state-highlight">DATA BANK NASABAH || DATA TRANSFER NASABAH</th></tr>
	<tr>
	   <td>Referensi Standing Order</td>
	   <td><input name="no_aso_bank" type="text" id="no_aso_bank" size="45" maxlength="25" value="<?php echo $row['no_aso_bank']; ?>" onkeyup="caps(this)" /></td>
	   <td>Rekening Bank Lain</td>
	   <td><input name="nocitra" type="text" id="nocitra" size="45" maxlength="20" value="<?php echo $row['nocitra']; ?>"/></td>
	</tr>
	<tr>
	   <td>No CIF Bank</td>
	   <td><input name="no_cif_bank" type="text" id="no_cif_bank" size="45" maxlength="6" value="<?php echo $row['no_cif_bank']; ?>" onkeyup="caps(this)" /></td>
	   <td>Nama Cheking Nasabah</td>
	   <td>
	       <select name="mitra_cheking" id="mitra_cheking" class="combobox">
	           <option value="">PILIHAN</option>
	           <?php 
	           $hasil=$result->res("SELECT idsales,nama FROM $tabel_sales WHERE branch='$branch' ORDER BY nama");
				while($data = $result->row($hasil)){
					if($row['mitra_cheking'] == $data['idsales']){
						echo "<option value=\"" . $data['idsales'] . "\" selected>" .$data['idsales'].' - '.$data['nama'] . "</option>";
					}else{
						echo "<option value=\"" . $data['idsales'] . "\">" .$data['idsales'].' - '.$data['nama'] . "</option>";
					}
				}
	           ?>
	       </select>
	   </td>
	</tr>
	<tr>
	   <td>Nama Bank Transfer</td>
	   <td><input name="bank_transfer" type="text" id="bank_transfer" size="45" maxlength="40" value="<?php echo $row['bank_transfer']; ?>" onkeyup="caps(this)" /></td>
	   <td>Nama Rekening Transfer</td>
	   <td><input name="nama_transfer" type="text" id="nama_transfer" size="45" maxlength="40" value="<?php echo $row['nama_transfer']; ?>" onkeyup="caps(this)" /></td>
	</tr>
	<tr>
	   <td>No Rekening Transfer</td>
	   <td><input name="rekening_transfer" type="text" id="rekening_transfer" size="45" maxlength="25" value="<?php echo $row['rekening_transfer']; ?>"/></td>
		<td>Nama Rekomendasi</td>
		<td> <?php include '../config/nama_rekomendasi.php';?></td>
	</tr>
	<tr><th colspan="6" class="ui-state-highlight">DATA AHLI WARIS</th></tr>
	<tr>
		<td>Nama Ahli Waris</td>
		<td><input name="nmwaris" type="text" id="nmwaris" size="45" maxlength="30" value="<?php echo $row['nmwaris']; ?>" onkeyup="caps(this)"/></td>
		<td>Alamat</td>
		<td><input name="arekom" type="text" id="arekom" size="45" maxlength="40" value="<?php echo $row['arekom']; ?>"  onkeyup="caps(this)"/></td>
	</tr>
	<tr>		
		<td>Kelurahan</td>
		<td><input name="lrekom" type="text" id="lrekom" size="45" maxlength="30" value="<?php echo $row['lrekom']; ?>" onkeyup="caps(this)"/></td>
		<td>Kecamatan</td>
		<td><input name="krekom" type="text" id="krekom" size="45" maxlength="30" value="<?php echo $row['krekom']; ?>"  onkeyup="caps(this)"/></td>
	</tr>
	<tr>		
		<td>Kabupaten</td>
		<td>
			<input name="brekom" type="text" id="brekom" size="10" maxlength="4" value="<?php echo $row['kota'];?>"/>
			<button type="button" id="lookupkota">&nbsp;</button>
			<span id="nmkota" style="padding-left: 40px"></span>
		</td>
		<td>No KTP</td>
		<td><input name="nktprekom" type="text" id="nktprekom" size="45" maxlength="20" value="<?php echo $row['nktprekom'];?>" onkeyup="caps(this)"/></td>
	</tr>
	<tr>		
		<td>Tgl Lahir Ahli Waris</td>
		<td><input name="tglahirw" type="text" id="tglahirw" size="45" maxlength="10" value="<?php echo date_sql($row['tglahirw']); ?>"/></td>
		<td>No Telepon</td>
		<td><input name="trekom" type="text" id="trekom" size="45" maxlength="12" value="<?php echo $row['trekom']; ?>"/></td>
	</tr>
	<tr>		
		<td>Tgl Berlaku KTP</td>
		<td><input name="tktprekom" type="text" id="tktprekom" size="45" maxlength="10" value="<?php echo date_sql($row['tktprekom']); ?>"/></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<th colspan="6" class="ui-state-highlight">DATA FINANSIAL DEBITUR</th>
	</tr>
	<tr>
		<?php
		$kdkop=$row['kdkop'];
		if($kdkop==1){ 
			echo '<td>Pendapatan Per Bulan </td>';
		}elseif($kdkop==2){
			echo '<td>Pendapatan Per Hari </td>';
		}else{
			echo '<td>Pendapatan Per Minggu </td>';
		}
		?>
		<td><input style="text-align:right" name="gaji" type="text" id="gaji" size="45"  maxlength="15" value="<?php echo $row['gaji']; ?>"/></td>
		<td>Pinjaman Bank</td>
		<td><input style="text-align:right" name="pbank" type="text" id="pbank" size="45" maxlength="15" value="<?php echo $row['pbank'];?>"/></td>
	</tr>
	<tr>
		<td>Pendapatan Lainnya </td>
		<td><input style="text-align:right" name="self1" type="text" id="self1" size="45" maxlength="15" value="<?php echo $row['self1'];?>"/></td>
		<td>Pinjaman Lainnya</td>
		<td><input style="text-align:right" name="plain" type="text" id="plain" size="45" maxlength="15" value="<?php echo $row['plain'];?>"/></td>
	</tr>
	<tr>
		<td>Pendapatan Kotor </td>
		<td><input style="text-align:right;background-color: #6dc0be;" name="self2" type="text" id="self2" size="45" maxlength="15" value="<?php echo $row['self2'];?>" readonly/></td>
		<td>Jumlah Pinjaman Bersih</td>
		<td><input style="text-align:right;background-color: #6dc0be;" name="self3" type="text" id="self3" size="45" maxlength="15" value="<?php echo $row['self3'];?>" readonly/></td>
	</tr>
	<tr><th colspan="6" class="ui-state-highlight">DATA PINJAMAN BARU</th></tr>
	<tr>
		<td>Wilayah Kantor Bayar</td>
		<td>
			<select name="kdbyr" id="kdbyr" required class="combobox">
				<option value="">PILIHAN</option>
				<?php $_wilayah=$row['kdbyr']; include '../config/wilayah_kantor.php';?>
			</select>
		</td>
		<td>Nama Sales</td>
		<td><?php include '../config/kode_sales.php';?></td>
	</tr>
	<tr>
		<td>Kantor Bayar</td>
		<td>
			<select name="kkbayar" id="kkbayar" class="combobox">
				<option value="">PILIHAN</option>
				<?php $_kkbayar=$row['kkbayar']; include '../config/kantor_bayar.php';?>
			</select>
		</td>
		<td>Kode Produk</td>
		<td><?php include '../config/kode_produk.php';?></td>
	</tr>
	<tr>
	   	<td>Jenis Kredit :</td>
		<td>
			<select name="kdpin" id="kdpin" class="combobox">
			<?php 
			$huruf = array("KREDIT PEMBAHARUAN","KREDIT BARU","KREDIT TAKE OVER","DOUBLE PINJAMAN","RESTRUKTURISASI KREDIT","KREDIT TAMBAHAN");$i = 0;
			while($i < 6){
				if($row['kdpin'] == $huruf[$i]){
					echo "<option value='".$i."' selected>".$huruf[$i] . "</option>";
				}else{
					echo "<option value='".$i."'>".$huruf[$i]."</option>";
				}
				$i++;
			}?>
			</select>
		</td>
		<td>Nama Asuransi</td>
		<td><?php include '../config/_kode_asuransi.php'; ?></td>
	</tr>	
	<tr>
		<td>Tujuan Penggunaan Dana</td>
		<td>
			<select name="deb1" id="deb1">
			<option value="">PILIHAN</option>
			<?php $huruf = array("KONSUMTIF","MODAL KERJA","INVESTASI");$i = 0;
			while($i < 3){
				if($row['deb1'] == $huruf[$i]){
					echo "<option value='".$huruf[$i]."' selected>".$huruf[$i]."</option>";
				}else{
					echo "<option value='" . $huruf[$i] . "'>" . $huruf[$i] . "</option>";
				}
				$i++;
			} ?>
			</select>
		</td>
		<td>Status Tagihan</td>
		<td>
			<select name="ketnas" id="ketnas">
				<option value="">PILIHAN</option>
				<?php $huruf = array("DI TAGIH","TIDAK DITAGIH");$i=0;
				while($i < 2){
					if($row['ketnas'] == $i){
						echo "<option value='" .$i. "' selected>" . $huruf[$i] . "</option>";
					}else{
						echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
					}
					$i++;
				} ?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Rekening Tagihan</td>
		<td><input name="noreks" type="text" id="noreks" maxlength="13" class="norek" size="22" value="<?php echo $row['noreks']; ?>" readonly/></td>
		<td>Alasan Tidak Ditagih</td>
		<td>
			<select name="kketnas" id="kketnas">
				<?php $huruf=array("PILIHAN","MENINGGAL DUNIA","JAMINAN TIDAK ADA","JAMINAN PALSU","DOUBLE PINJAMAN BANK","PENGURUSAN KLAIM ASURANSI","GAJI TIDAK TERBIT/STOP","DEBITUR NAKAL/TIDAK BAIK","MUTASI UANG PENSIUN","GAJI MINUS/TURUN","SETOR SENDIRI");
				$i=0;
				while($i<11){
					if($row['kketnas']==$i){
						echo "<option value='".$i."' selected>" . $huruf[$i] . "</option>";
					}else{
						echo "<option value='".$i."'>" . $huruf[$i] . "</option>";
					}
					$i++;
				}?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Kolektibilitas</td>
		<td>
			<select name="kolek" id="kolek">
				<?php $huruf = array("PILIHAN","LANCAR","PERHATIAN KHUSUS","KURANG LANCAR","DIRAGUKAN","MACET");
				$i = 0;
				while($i < 6){
					if($row['kolek'] == $i){
						echo "<option value='" . $i . "' selected>" . $huruf[$i] . "</option>";
					}else{
						echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
					}
					$i++;
				} ?>
			</select>
		</td>
		<td>Alasan Kolektibilitas</td>
		<td>
			<select name="ketkolek" id="ketkolek">
				<?php $huruf = array("PILIHAN","MENINGGAL DUNIA","JAMINAN TIDAK ADA/PALSU","DOUBLE PINJAMAN PADA BANK","PENGURUSAN KLAIM ASURANSI","GAJI TIDAK TERBIT/STOP","DEBITUR NAKAL/TIDAK BAIK","MUTASI GAJI UANG PENSIUN","GAJI MINUS/TURUN","TIDAK TERTAGIH PADA KANTOR BAYAR");
				$i = 0;
				while($i<10){
					if($row['ketkolek'] == $i){
						echo "<option value='" . $i . "' selected>" . $huruf[$i] . "</option>";
					}else{
						echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
					}
					$i++;
				} ?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Denda Angsuran</td>
		<td><input style="text-align:right" name="tbunga" type="text" id="tbunga" size="22" maxlength="5" value="<?php echo $row['tbunga']; ?>"/></td>
		<td>Finalty Pelunasan</td>
		<td><input style="text-align:right" name="flunas" type="text" id="flunas"  size="22" maxlength="5" value="<?php echo $row['flunas']; ?>"/></td>
	</tr>
</table>
<div class="ui-widget-content" align="center">
	<button type="button" id="simpan">Simpan</button>
	<button type="button" id="kembali" onclick="goKembali();">Batal</button>
</div>
</form>