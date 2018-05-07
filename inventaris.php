<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_inventaris.js"></script>
<script type="text/javascript">
	var url ="inventaris.php";
	var urls ='inventaris_01.php';
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
<form id="masuk" name="masuk" method="POST" action="">
<table width="100%">
	<tr><th colspan="6" class="ui-state-highlight">INPUT DATA INVENTARIS</th></tr>
	<tr>
		<td>Branch</td>
		<td>: 
			<select name="branch" id="branch">
				<?php include 'parameter/_kcabang.php';?>
			</select>
		</td>
		<td>Kode Inventaris</td>
		<td>: 
			<select name="kode_inventaris" id="kode_inventaris">
				<?php $kode_inventaris=0;$huruf = array("PILIHAN","PERALATAN KANTOR","PERALATAN MEUBEL","PERALATAN KOMPUTER","GEDUNG KANTOR","PERALATAN ELEKTRONIK","LAINNYA");$i = 0;
				while($i < 7){
					if($kode_inventaris== $i){
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
		$huruf = array("GOLONGAN I", "GOLONGAN II", "GOLONGAN III","GOLONGAN IV");$i=0;
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
			echo "<option value='".$huru."'>" . $huruf[$i]."</option>";
			$i++;
		}?>
		</select>
		</td>	
		<td>Nomor Inventaris</td>
		<td>: <input name="no_inventaris" type="text" id="no_inventaris" value="" size="33" maxlength="30" /></td>
	</tr>
	<tr>		
		<td>Nama Inventaris</td>
		<td>: <input name="nama_inventaris" type="text" id="nama_inventaris" value="" size="33" maxlength="80" onkeyup="caps(this)"/></td>
		<td>Harga Perolehan</td>
		<td>: <input name="harga_perolehan" type="text" id="harga_perolehan" value="" size="33" maxlength="11"/></td>
	</tr>
	<tr>		
		<td>Nilai Perolehan</td>
		<td>: <input name="nilai_perolehan" type="text" id="nilai_perolehan" value="" size="33" maxlength="11"/></td>
		<td>Jumlah Unit</td>
		<td>: <input name="jumlah_unit" type="text" id="jumlah_unit" value="" size="5" maxlength="4"/></td>
	</tr>
	<tr>		
		<td>Masa Manfaat</td>
		<td>: <input name="masa_manfaat" type="text" id="masa_manfaat" value="" size="5" maxlength="4"/> Tahun</td>
		<td>Tanggal Perolehan</td>
		<td>: <input name="tgl_perolehan" type="text" id="tgl_perolehan" value="" size="33" maxlength="10"/></td>
	</tr>
	<tr>		
		<td>Metode Depresiasi</td>
		<td>: 
			<select name="kode_penyusutan" id="kode_penyusutan">
				<?php $kode_penyusutan=0;$huruf = array("PILIHAN","GARIS LURUS","BEBAN BERKURANG","HASIL PRODUKSI","JAM JASA");$i = 0;
				while($i < 5){
					if($kode_penyusutan== $i){
						echo "<option value='" .$i. "' selected>" . $huruf[$i] . "</option>";
					}else{
						echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
					}
					$i++;
				} ?>
			</select>
		</td>
		<td>Nilai Residu</td>
		<td>: <input name="nilai_residu" type="text" id="nilai_residu" value="" size="33" maxlength="11"/></td>
	</tr>
	<tr>		
		<td>Jurnal Perolehan</td>
		<td>: 
			<select name="jurnal_perolehan" id="jurnal_perolehan">
				<?php $huruf = array("YA (OUTOMATIS)","TIDAK (MANUAL)");$i = 0;
				while($i < 2){
					echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
					$i++;
				} ?>
			</select>
		</td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td>GL Inventaris</td>
		<td>: <input name="sandi_inventaris" type="text" id="sandi_inventaris" value="" size="33" maxlength="13" readonly=""/>
			<input type="button" value="" id="lookup_sandia" class="icon-filter"/>
			<span id="nm_inventaris"></span>
		</td>
		<td>GL Biaya Penyusutan</td>
		<td>: <input name="sandi_biaya" type="text" id="sandi_biaya" value="" size="33" maxlength="13" readonly=""/>
			<input type="button" value="" id="lookup_sandib" class="icon-filter"/>
			<span id="nm_biaya"></span>
		</td>			
	</tr>
	<tr>		
		<td>GL Perolehan</td>
		<td>: <input name="sandi_perolehan" type="text" id="sandi_perolehan" value="" size="33" maxlength="13" readonly=""/>
			<input type="button" value="" id="lookup_sandid" class="icon-filter"/>
			<span id="nm_perolehan"></span>
		</td>			
		<td>GL Akumulasi Penyusutan</td>
		<td>: <input name="sandi_penyusutan" type="text" id="sandi_penyusutan" value="" size="33" maxlength="13" readonly=""/>
			<input type="button" value="" id="lookup_sandic" class="icon-filter"/>
			<span id="nm_penyusutan"></span>
		</td>
	</tr>		
	<tr><th colspan="4" class="ui-state-highlight"><button id="hitung">Simulasi</button></th></tr>
	<tr>
		<td colspan="2" align="right">JUMLAH PENYUSUTAN PER TAHUN</td>
		<td colspan="2" >: <input name="penyusutan_tahun" type="text" id="penyusutan_tahun" value="" size="33" maxlength="11"/></td>
	</tr>
	<tr>
		<td colspan="2" align="right">JUMLAH PENYUSUTAN PER BULAN</td>
		<td colspan="2">: <input name="penyusutan_bulan" type="text" id="penyusutan_bulan" value="" size="33" maxlength="11"/></td>
	</tr>
</table>
<div class="ui-widget-content" align="center">
	<button type="button" id="simpan">Simpan</button>
	<button type="button" id="kembali" onclick="goKembali();">Batal</button>
</div>
</form>