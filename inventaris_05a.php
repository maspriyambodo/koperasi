<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_inventaris.js"></script>
<script type="text/javascript">
	var url ="inventaris_05.php";
	var urls ='inventaris_05b.php';
	$("#kembali").button({
		text: true,
		icons: {
	   		primary: 'ui-icon-circle-close'
	  	}
	});
	 $('#simpan').button({
	 	text: true,
		icons: {
			primary: 'ui-icon-disk'
		}
	});
</script>
<?php 
$no_inventaris=$result->c_d($_POST['nonas']);$hasil=$result->query_cari("SELECT id,branch,no_inventaris,nama_inventaris,harga_perolehan,nilai_perolehan,jumlah_unit,masa_manfaat,tgl_perolehan,kode_penyusutan,nilai_residu,nilai_buku,sandi_perolehan,sandi_penyusutan,sandi_biaya,sandi_inventaris,penyusutan_bulan,akumulasi_penyusutan,kode_proses,saldo_awal,mutasi_debet,mutasi_kredit,saldo_akhir,kode_inventaris,golongan FROM $tabel_inventaris WHERE no_inventaris='$no_inventaris' ORDER BY no_inventaris LIMIT 1");if($result->num($hasil)<1)$result->msg_error('Data Tidak Ditemukan...!!');$data=$result->row($hasil);?>
<form id="masuk" name="masuk" method="POST" action="">
<table width="100%">
	<input type="hidden" id="id" name="id" value="<?php echo $data['id'];?>"/>
	<tr><th colspan="6" class="ui-state-highlight">KOREKSI DATA INVENTARIS</th></tr>
	<tr>
		<td>Branch</td>
		<td>: 
			<select name="branch" id="branch">
				<?php $kcabang=$data['branch'];include 'parameter/_kcabang.php';?>
			</select>
		</td>
		<td>Kode Inventaris</td>
		<td>: 
			<select name="kode_inventaris" id="kode_inventaris">
				<?php $huruf = array("PILIHAN","PERALATAN KANTOR","PERALATAN MEUBEL","PERALATAN KOMPUTER","GEDUNG KANTOR","PERALATAN ELEKTRONIK","LAINNYA");$i = 0;
				while($i < 7){
					if($data['kode_inventaris']== $i){
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
		<td>Golongan Inventaris</td>
		<td>: 
		<select name="golongan" id="golongan">
		<?php
		$huruf = array("GOLONGAN I","GOLONGAN II","GOLONGAN III","GOLONGAN IV");$i=0;
		if($data['golongan']=='I'){
			$y=0;
		}elseif ($data['golongan']=='II'){
			$y=1;
		}elseif ($data['golongan']=='III'){
			$y=2;
		}else{
			$y=3;
		}
		while ($i < 4) {
			if($i==0){
				$huru='I';
			}elseif ($i==1){
				$huru='II';
			}elseif ($i==2){
				$huru='III';
			}else{
				$huru='IV';
			}
			if($i==$y){
			   echo "<option value='".$huru."' selected>".$huruf[$i]."</option>";
			}else{
			   echo "<option value='".$huru."'>" . $huruf[$i]."</option>";
			}
			$i++;
		}?>
		</select>
		</td>		
		<td>Nomor Inventaris</td>
		<td>: <input name="no_inventaris" type="text" id="no_inventaris" value="<?php echo $data['no_inventaris'];?>" size="33" maxlength="30" readonly=""/></td>
	</tr>
	<tr>		
		<td>Nama Inventaris</td>
		<td>: <input name="nama_inventaris" type="text" id="nama_inventaris" value="<?php echo $data['nama_inventaris'];?>" size="33" maxlength="80" onkeyup="caps(this)"/></td>
		<td>Harga Perolehan</td>
		<td>: <input name="harga_perolehan" type="text" id="harga_perolehan" value="<?php echo number_format($data['harga_perolehan']);?>" size="33" maxlength="11"/></td>
	</tr>
	<tr>		
		<td>Nilai Perolehan</td>
		<td>: <input name="nilai_perolehan" type="text" id="nilai_perolehan" value="<?php echo number_format($data['nilai_perolehan']);?>" size="33" maxlength="11"/></td>
		<td>Jumlah Unit</td>
		<td>: <input name="jumlah_unit" type="text" id="jumlah_unit" value="<?php echo $data['jumlah_unit'];?>" size="5" maxlength="4"/></td>
	</tr>
	<tr>		
		<td>Masa Manfaat</td>
		<td>: <input name="masa_manfaat" type="text" id="masa_manfaat" value="<?php echo $data['masa_manfaat'];?>" size="5" maxlength="4"/> Tahun</td>
		<td>Tanggal Perolehan</td>
		<td>: <input name="tgl_perolehan" type="text" id="tgl_perolehan" value="<?php echo date_sql($data['tgl_perolehan']);?>" size="33" maxlength="10"/></td>
	</tr>
	<tr>		
		<td>Metode Depresiasi</td>
		<td>: 
			<select name="kode_penyusutan" id="kode_penyusutan" class="combobox">
			<?php $huruf = array("PILIHAN","GARIS LURUS","BEBAN BERKURANG","HASIL PRODUKSI","JAM JASA");$i = 0;
			while($i < 5){
				if($data['kode_penyusutan']== $i){
					echo "<option value='" .$i. "' selected>" . $huruf[$i] . "</option>";
				}else{
					echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
				}
				$i++;
			} 
			?>
			</select>
		</td>
		<td>Nilai Residu</td>
		<td>: <input name="nilai_residu" type="text" id="nilai_residu" value="<?php echo number_format($data['nilai_residu']);?>" size="33" maxlength="11"/></td>
	</tr>
	<tr>		
		<td>Nilai Buku</td>	
		<?php
		if($data['nilai_buku']<0){ ?>
			<td>: <input name="nilai_buku" type="text" id="nilai_buku" value="<?php echo number_format($data['nilai_buku']);?>" size="33" maxlength="11" style="color: #ff0000"/></td> <?php
		}else{ ?>
			<td>: <input name="nilai_buku" type="text" id="nilai_buku" value="<?php echo number_format($data['nilai_buku']);?>" size="33" maxlength="11"/></td>	<?php
		} ?>
		<td colspan="2">
		&nbsp;
		<input name="sandi_inventaris" type="hidden" id="sandi_inventaris" value="<?php echo $data['sandi_inventaris'];?>"/>
		<input name="sandi_perolehan" type="hidden" id="sandi_perolehan" value="<?php echo $data['sandi_perolehan'];?>"/>
		</td>
	</tr>
	<tr>		
		<td>GL Biaya Penyusutan</td>
		<td>: <input name="sandi_biaya" type="text" id="sandi_biaya" value="<?php echo $data['sandi_biaya'];?>" size="33" maxlength="13" readonly=""/>
		<input type="button" value="" id="lookup_sandib" class="icon-filter"/>
		<span id="nama_biaya"></span>
		</td>			
		<td>GL Akumulasi Penyusutan</td>
		<td>: <input name="sandi_penyusutan" type="text" id="sandi_penyusutan" value="<?php echo $data['sandi_penyusutan'];?>" size="33" maxlength="13" readonly=""/>
		<input type="button" value="" id="lookup_sandic" class="icon-filter"/>
		<span id="nama_penyusutan"></span>
		</td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<th colspan="4" class="ui-state-highlight"><button id="hitung">Simulasi</button></th>
	</tr>			
	<tr>
		<td>PENYUSUTAN PER BULAN</td>
		<td>: <input name="penyusutan_bulan" type="text" id="penyusutan_bulan" value="<?php echo number_format($data['penyusutan_bulan']);?>" size="33" maxlength="11"/></td>
		<td>KODE PROSES</td>
		<td>: 
			<select name="kode_proses" id="kode_proses" class="combobox">
				<?php $huruf = array("AKTIF","NON AKTIF","HAPUS BUKU");$i = 0;
					while($i < 3){
						if($data['kode_proses']== $i){
							echo "<option value='" .$i. "' selected>" . $huruf[$i] . "</option>";
						}else{
							echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
						}
						$i++;
					} 
				?>
			</select>
		</td>
	</tr>
</table>
<div class="ui-widget-content" align="center">
	<button type="button" id="simpan">Simpan</button>
	<button type="button" id="kembali" onclick="goKembali();">Batal</button>
</div>
</form>