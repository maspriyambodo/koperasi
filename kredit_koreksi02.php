<form id="masuk" name="masuk" method="POST" action="">
<input name="id" type="hidden" id="id" value="<?php echo $id;?>" />
<input name="nama" type="hidden" id="nama" value="<?php echo $nama;?>" />
<input name="produkl" type="hidden" id="produkl" value="<?php echo $produkl;?>" />
<input name="umur" type="hidden" id="umur" value="<?php echo $umur;?>" />
<input name="kdjamin" type="hidden" id="kdjamin" value="<?php echo $kdjamin;?>" />
<input name="skredit" type="hidden" id="skredit" value="<?php echo $skredit;?>" />
<input name="kdguna" type="hidden" id="kdguna" value="<?php echo $kdguna;?>" />
<input name="kdgol" type="hidden" id="kdgol" value="<?php echo $kdgol;?>" />
<input name="notran" type="hidden" id="notran" value="<?php echo $notran;?>" />
<input name="kdsektor" type="hidden" id="kdsektor" value="<?php echo $kdsektor;?>" />
<input name="jkredit" type="hidden" id="jkredit" value="<?php echo $jkredit;?>" />
<input name="tenor_premi" type="hidden" id="tenor_premi" value="<?php echo $tenor_premi;?>"/>
<input name="norekw" type="hidden" id="norekw" value="<?php echo $norekw;?>" />
<input name="norekp" type="hidden" id="norekp" value="<?php echo $norekp;?>" />
<table width="100%" class="table">
<tr><th colspan="6" class="ui-widget-header">DATA DEBITUR || JAMINAN DEBITUR</th></tr>
<?php include '_headerx.php';?>
<tr>
   <td align="right">Pekerjaan :</td>
   <td><input name="pekerjaan" type="text" id="pekerjaan" value="<?php echo $pekerjaan;?>" size="45" maxlength="20" onkeyup="caps(this)"/></td>
   <td align="right">Nopen :</td>
   <td><input name="nopen" type="text" id="nopen" value="<?php echo $nopen; ?>" size="45" maxlength="15" onkeyup="caps(this)" /></td>
</tr>
<tr>
   <td align="right">Kode Jiwa :</td>
   <td><input name="kdjiwa" type="text" id="kdjiwa" value="<?php echo $kdjiwa; ?>" size="45" maxlength="4" /></td>
   <td align="right">Kode Pensiun :</td>
   <td>
       <select name="jenis" id="jenis" class="combobox">
           <option value="">PILIHAN</option>
           <?php include 'help/jenis_pensiun.php';?>
       </select>
   </td>
</tr>
<tr>
   <td align="right">Jenis Pensiun :</td>
   <td><input name="jenis1" type="text" id="jenis1" size="45" maxlength="20" value="<?php echo $jenis1; ?>" onkeyup="caps(this)"/></td>
   <td align="right">No Dapem :</td>
   <td><input name="nodapem" type="text" id="nodapem" size="45" maxlength="15" value="<?php echo $nodapem; ?>" onkeyup="caps(this)"/></td>
</tr>
<tr>
   <td align="right">No Karip :</td>
   <td><input name="nokarip" type="text" id="nokarip" size="45" maxlength="15" value="<?php echo $nokarip; ?>" onkeyup="caps(this)" /></td>
   <td align="right">Nama SID :</td>
   <td><input name="nmsid" type="text" id="nmsid" size="45" maxlength="30" value="<?php echo $nmsid; ?>" onkeyup="caps(this)"/></td>
</tr>
<tr>
	<td align="right">Pengelola Pensiun :</td>
	<td>
		<select name="pengelola_pensiun" id="pengelola_pensiun" class="combobox">
		<?php $huruf = array("PT TASPEN","PT ASABRI","LAINNYA");$i = 0;
		while($i<3){
			if($pengelola_pensiun == $i) echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
			else  echo "<option value='".$i."'>".$huruf[$i]."</option>";
			$i++;
		}?>
		</select>
	</td>
	<td align="right">Instansi Pensiun :</td>
	<td><input name="instansi_pensiun" type="text" id="instansi_pensiun" maxlength="55" size="45" value="<?php echo $instansi_pensiun;?>"/></td>
</tr>
<tr>
   <td align="center" colspan="4" style="color: #1fb122; font-size: 14px"><strong>JENIS JAMINAN :
   <?php $xkdskep=ket_jaminan($kdskep); echo $xkdskep;?></strong><input name="kdskep" type="hidden" id="kdskep" value="<?php echo $kdskep;?>"/></td>
</tr>
<?php include "agunan.php";?>
<tr><th colspan="6" class="ui-widget-header">DATA BANK NASABAH || DATA TRANSFER NASABAH</th></tr>
<tr>
   <td align="right">Referensi Standing Order :</td>
   <td><input name="no_aso_bank" type="text" id="no_aso_bank" size="45" maxlength="25" value="<?php echo $no_aso_bank; ?>" onkeyup="caps(this)" /></td>
   <td align="right">Rekening Bank Lain :</td>
   <td><input name="nocitra" type="text" id="nocitra" size="45" maxlength="20" value="<?php echo $nocitra; ?>"/></td>
</tr>
<tr>
   <td align="right">No CIF Bank :</td>
   <td><input name="no_cif_bank" type="text" id="no_cif_bank" size="45" maxlength="6" value="<?php echo $no_cif_bank; ?>" onkeyup="caps(this)" /></td>
   <td align="right">Nama Cheking Nasabah :</td>
   <td>
       <select name="mitra_cheking" id="mitra_cheking" class="combobox">
           <option value="">PILIHAN</option>
           <?php 
           $hasil=$result->res("SELECT idsales,nama FROM $tabel_sales WHERE branch='$branch' ORDER BY nama");
			while($data = $result->row($hasil)){
				if($mitra_cheking == $data['idsales']){
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
   <td align="right">Nama Bank Transfer :</td>
   <td><input name="bank_transfer" type="text" id="bank_transfer" size="45" maxlength="40" value="<?php echo $bank_transfer; ?>" onkeyup="caps(this)" /></td>
   <td align="right">Nama Rekening Transfer :</td>
   <td><input name="nama_transfer" type="text" id="nama_transfer" size="45" maxlength="40" value="<?php echo $nama_transfer; ?>" onkeyup="caps(this)" /></td>
</tr>
<tr>
   <td align="right">No Rekening Transfer :</td>
   <td><input name="rekening_transfer" type="text" id="rekening_transfer" size="45" maxlength="25" value="<?php echo $rekening_transfer; ?>"/></td>
   <td align="right">Tanggal Transfer :</td>
   <td><input name="tanggal_transfer" type="text" id="tanggal_transfer" size="45" maxlength="25" value="<?php echo $tanggal_transfer; ?>"/></td>
</tr>
<tr><th colspan="6" class="ui-widget-header">DATA AHLI WARIS</th></tr>
<tr>
   <td align="right">Nama :</td>
   <td><input name="nmwaris" type="text" id="nmwaris" size="45" maxlength="30" value="<?php echo $nmwaris; ?>" onkeyup="caps(this)"/></td>
   <td align="right">Alamat :</td>
   <td><input name="arekom" type="text" id="arekom" size="45" maxlength="40" value="<?php echo $arekom; ?>" onkeyup="caps(this)" /></td>
</tr>
<tr>
   <td align="right">Kelurahan :</td>
   <td><input name="lrekom" type="text" id="lrekom" size="45" maxlength="30" value="<?php echo $lrekom; ?>" onkeyup="caps(this)" /></td>
   <td align="right">Kecamatan :</td>
   <td><input name="krekom" type="text" id="krekom" size="45" maxlength="30" value="<?php echo $krekom;?>" onkeyup="caps(this)"/></td>
</tr>
<tr>
   <td align="right">Kabupaten :</td>
   <td>
   		<input name="brekom" type="text" id="brekom" size="10" maxlength="4" class="brekom" value="<?php echo $brekom;?>"/>
		<button type="button" id="lookup_kota">&nbsp;</button>
		<span id="nmkota" style="padding-left: 15px"></span>
	</td>
   <td align="right">No KTP :</td>
   <td><input name="nktprekom" type="text" id="nktprekom" size="45" maxlength="20" value="<?php echo $nktprekom;?>" onkeyup="caps(this)"/></td>
</tr>
<tr>
   <td align="right">Tanggal Lahir :</td>
   <td><input name="tglahirw" type="text" id="tglahirw" size="45" maxlength="10" value="<?php echo $tglahirw; ?>"/></td>
   <td align="right">No Telepon :</td>
   <td><input name="trekom" type="text" id="trekom" size="45" maxlength="12" value="<?php echo $trekom; ?>" /></td>
</tr>
<tr><th colspan="6" class="ui-widget-header">DATA PENDAMPING DEBITUR</th></tr>
<tr>
	<td align="right">Nama :</td>
	<td><input name="nama_pendamping" type="text" id="nama_pendamping" size="45" maxlength="50" value="<?php echo $nama_pendamping; ?>" onkeyup="caps(this)"/></td>
	<td align="right">Alamat :</td>
	<td><input name="alamat_pendamping" type="text" id="alamat_pendamping" size="45" maxlength="45" value="<?php echo $alamat_pendamping; ?>"  onkeyup="caps(this)"/></td>
</tr>
<tr>
	<td align="right">Kelurahan :</td>
	<td><input name="lurah_pendamping" type="text" id="lurah_pendamping" size="45" maxlength="45" value="<?php echo $lurah_pendamping; ?>" onkeyup="caps(this)"/></td>
	<td align="right">Kecamatan :</td>
	<td><input name="camat_pendamping" type="text" id="camat_pendamping" size="45" maxlength="45" value="<?php echo $camat_pendamping; ?>"  onkeyup="caps(this)"/></td>
</tr>
<tr>
	<td align="right">No telepon :</td>
	<td><input name="tlp_pendamping" type="text" id="tlp_pendamping" size="45" maxlength="45" value="<?php echo $tlp_pendamping; ?>"  onkeypress="return hanyaAngka(event, false)"/></td>
	<td align="right">No KTP :</td>
	<td><input name="ktp_pendamping" type="text" id="ktp_pendamping" size="45" maxlength="20" value="<?php echo $ktp_pendamping;?>" onkeyup="caps(this)"/></td>
</tr>
<tr><th colspan="6" class="ui-widget-header">DATA FINANSIAL DEBITUR</th></tr>
<tr>
   <?php if($kdkop==1){ echo '<td align="right">Pendapatan Per Bulan : </td>'; }elseif($kdkop==2){ echo '<td align="right">Pendapatan Per Hari : </td>'; }else{ echo '<td align="right">Pendapatan Per Minggu : </td>'; } ?>
   <td><input style="text-align:right" name="gaji" type="text" id="gaji" size="45" maxlength="15" value="<?php echo $gaji; ?>"/></td>
   <td align="right">Angsuran Pinjaman Bank :</td>
   <td><input style="text-align:right" name="pbank" type="text" id="pbank" size="45" maxlength="15" value="<?php echo $pbank;?>"/></td>
</tr>
<tr>
   <td align="right">Pendapatan Lainnya : </td>
   <td><input style="text-align:right" name="self1" type="text" id="self1" size="45" maxlength="15" value="<?php echo $self1;?>"/></td>
   <td align="right">Angsuran Pinjaman Lainnya :</td>
   <td><input style="text-align:right" name="plain" type="text" id="plain" size="45" maxlength="15" value="<?php echo $plain;?>"/></td>
</tr>
<tr>
   <td align="right">Pendapatan Kotor : </td>
   <td><input style="text-align:right;background-color: #6dc0be;" name="self2" type="text" id="self2" size="45" maxlength="15" value="<?php echo $self2;?>" readonly/></td>
   <td align="right">Pendapatan Bersih :</td>
   <td><input style="text-align:right;background-color: #6dc0be;" name="self3" type="text" id="self3" size="45" maxlength="15" value="<?php echo $self3;?>" readonly/></td>
</tr>
<tr><th colspan="6" class="ui-widget-header">DATA PINJAMAN BARU - <a style="cursor: pointer;" href="" onclick="showPayment();return false;">PAYMENT SCEDULE</a></th></tr>
<tr>
   <td align="right">Wilayah Kantor Bayar :</td>
   <td>
       <select name="kdbyr" id="kdbyr" required class="combobox">
           <option value="">PILIHAN</option>
           <?php $_wilayah=$kdbyr; include 'help/wilayah_kantor.php';?>
       </select>
   </td>
   <td align="right">Nama Sales :</td>
   <td>
       <select name="kdsales" id="kdsales" class="combobox">
           <option value="">PILIHAN</option>
           <?php include 'config/_sales.php';?>
       </select>
   </td>
</tr>
<tr>
   <td align="right">Tujuan Penggunaan Dana :</td>
   <td>
       <select name="deb1" id="deb1" class="combobox">
           <option value="">PILIHAN</option>
           <?php $huruf=array( "KONSUMTIF", "MODAL KERJA", "INVESTASI");$i=0 ;
           while($i < 3){ 
           if($deb1==$huruf[$i]){ 
           	echo "<option value='".$huruf[$i]. "' selected>".$huruf[$i]. "</option>";
           }else{
            	 echo "<option value='".$huruf[$i]. "'>".$huruf[$i]. "</option>"; 
           } $i++; } ?>
       </select>
   </td>
   <td align="right">Kode Produk :</td>
   <td>
       <select name="produk" id="produk" class="combobox">
           <option value="">PILIHAN</option>
           <?php include 'config/_produk.php';?>
       </select>
   </td>
</tr>
<tr>
   <td align="right">Kantor Bayar :</td>
   <td>
       <select name="kkbayar" id="kkbayar" class="combobox">
           <option value="">PILIHAN</option>
           <?php $_kkbayar=$kkbayar; include 'help/kantor_bayar.php';?>
       </select>
       <input name="nmbayar" type="hidden" id="nmbayar" size="25" maxlength="35" value="<?php echo $nmbayar; ?>" />
   </td>
   <td align="right">Pencairan Pinjaman :</td>
   <td>
       <select name="kode_cair" id="kode_cair" class="combobox">
           <option value="">PILIHAN</option>
           <?php $huruf=array( "GIRO BTPN", "TUNAI/TRANSFER", "TABUNGAN TASETO");$i=0 ; while($i < 3){ if($kode_cair==$i){ echo "<option value='".$i. "' selected>".$huruf[$i]. "</option>"; }else{ echo "<option value='".$i. "'>".$huruf[$i]. "</option>"; } $i++; } ?>
       </select>
   </td>
</tr>
<tr>
   <td align="right">Setoran Angsuran Pertama :</td>
   <td>
       <select name="kdangsur" id="kdangsur" class="combobox">
           <?php $huruf=array( "YA", "TIDAK");$i=0 ;$kdangsur=1; while($i < 2){ if($kdangsur==$i){ echo "<option value='".$i. "' selected>".$huruf[$i]. "</option>"; }else{ echo "<option value='".$i. "'>".$huruf[$i]. "</option>"; } $i++; } ?>
       </select>
   </td>
   <td align="right">Jumlah Grace Period :</td>
   <td>
       <select name="jumlah_period" id="jumlah_period" class="combobox">
           <?php $huruf=array( "0 PILIHAN", "1 BULAN", "2 BULAN", "3 BULAN", "4 BULAN", "5 BULAN", "6 BULAN", "7 BULAN", "8 BULAN");$i=0; while ($i<9) { if ($jumlah_period==$i){ echo "<option value='".$i. "' selected>".$huruf[$i]. "</option>"; }else{ echo "<option value='".$i. "'>".$huruf[$i]. "</option>"; } $i++; }?>
       </select>
   </td>
</tr>
<tr>
	<td align="right">Jumlah Setoran Pertama :</td>
   	<td>
       <select name="jum_kdangsur" id="jum_kdangsur" class="combobox">
           <?php $huruf=array( "0 PILIHAN", "1 BULAN", "2 BULAN", "3 BULAN", "4 BULAN", "5 BULAN", "6 BULAN");$i=0; while ($i<7) { if ($jum_kdangsur==$i){ echo "<option value='".$i. "' selected>".$huruf[$i]. "</option>"; }else{ echo "<option value='".$i. "'>".$huruf[$i]. "</option>"; } $i++; }?>
       </select>
   	</td>
	<td align="right">Rekening Tagihan:</td>
	<td><input name="noreks" type="text" id="noreks" maxlength="13" class="norek" size="35" value="<?php echo $noreks; ?>" readonly/></td>	
</tr>
<tr>
   <td align="right">Nama Asuransi :</td>
   <td>
       <select name="kdpremi" id="kdpremi" class="combobox">
           <?php echo "<option value=9 selected>TIDAK DI ASURANSIKAN</option>"; include 'config/_asuransi.php'; ?>
       </select>
   </td>
   <td align="right">Nama Rekomendasi :</td>
   <td>
       <select name="nrekom" id="nrekom" class="combobox">
           <option value="">PILIHAN</option>
           <?php include 'config/_rekomendasi.php';?>
       </select>
   </td>
</tr>
<tr>
   	<td align="right">Jenis Kredit :</td>
	<td>
		<select name="kdpin" id="kdpin" class="combobox">
		<?php 
		$huruf = array("KREDIT PEMBAHARUAN","KREDIT BARU","KREDIT TAKE OVER","DOUBLE PINJAMAN","RESTRUKTURISASI KREDIT","KREDIT TAMBAHAN");$i = 0;
		while($i < 6){
			if($kdpin == $huruf[$i]){
				echo "<option value='".$i."' selected>".$huruf[$i] . "</option>";
			}else{
				echo "<option value='".$i."'>".$huruf[$i]."</option>";
			}
			$i++;
		}?>
		</select>
	</td>
   	<td align="right" colspan="2">&nbsp;</td>
</tr>
<tr class="ui-widget-content" style="padding-top: 5px">
	<td align="right" colspan="2">Nominal Pinjaman :</td>
	<td colspan="2"><input style="text-align:right" name="nomi" type="text" id="nomi" maxlength="15" size="25" value="<?php echo $nomi; ?>"/></td>
</tr>
<tr class="ui-widget-content">
	<td align="right" colspan="2">Jangka Waktu :</td>
	<td colspan="2"><input style="text-align:right" name="jangka" type="text" id="jangka" maxlength="3" size="25" value="<?php echo $jangka;?>"/></td>
</tr>
<tr class="ui-widget-content">
	<td align="right" colspan="2">Suku Bunga :</td>
	<td colspan="2"><input style="text-align:right" name="suku" type="text" id="suku" maxlength="5" size="25" value="<?php echo $suku;?>"/></td>
</tr>
<tr class="ui-widget-content">
	<td align="right" colspan="2">Simpanan Pokok :</td>
	<td colspan="2"><input style="text-align:right" name="simpanan_pokok" type="text" id="simpanan_pokok" maxlength="15" size="25" value="<?php echo $simpanan_pokok;?>"/></td>
</tr>
<tr class="ui-widget-content">
	<td align="right" colspan="2">Simpanan Wajib :</td>
	<td colspan="2"><input style="text-align:right" name="simpanan_wajib" type="text" id="simpanan_wajib" maxlength="15" size="25" value="<?php echo $simpanan_wajib;?>"/></td>
</tr>
</table>
<div class="ui-widget-content" align="center" style="padding: 5px"><button id="hitung">Hitung Pinjaman</button></div>
<table width="100%">
<tr>
   <td>Saldo Pelunasan</td>
   <td>:
       <input style="text-align:right" readonly name="saldoa" type="text" id="saldoa" value="<?php echo $saldoa; ?>" />
       <input readonly size="3" name="tgbatas" type="text" id="tgbatas" value="<?php echo $tgbatas; ?>" />
   </td>
   <td>Pokok Angsuran</td>
   <td>: <input style="text-align:right" name="pokok" type="text" id="pokok" value="<?php echo $pokok;?>" readonly/></td>
   <td>Biaya Meterai</td>
   <td>: <input style="text-align:right" name="meterai" type="text" id="meterai" maxlength="15" value="<?php echo $meterai; ?>"/></td>
</tr>
<tr>
   <td>Bunga Pelunasan</td>
   <td>: 
	<?php
	if($aktif_satu==1){
		echo '<input style="text-align:right" name="blunas" type="text" id="blunas" maxlength="15" value="'.$blunas.'"/>';
	}else{
		echo '<input style="text-align:right" name="blunas" type="text" id="blunas" maxlength="15" value="'.$blunas.'" readonly/>';
	}
	?>
   </td>
   <td>Bunga Angsuran</td>
   <td>: <input style="text-align:right" name="bunga" type="text" id="bunga" value="<?php echo $bunga;?>" readonly/></td>
   <td>Biaya Asuransi</td>
   <td>: <input style="text-align:right" name="jumpremi" type="text" id="jumpremi" maxlength="15" value="<?php echo $jumpremi;?>" readonly/></td>
</tr>
<tr>
   <td>Adm Pelunasan</td>
   <td>: 
	<?php
	if($aktif_satu==1){
		echo '<input style="text-align:right" name="alunas" type="text" id="alunas" maxlength="15" value="'.$alunas.'"/>';
	}else{
		echo '<input style="text-align:right" name="alunas" type="text" id="alunas" maxlength="15" value="'.$alunas.'" readonly/>';
	}
	?>
   </td>
   <td>Adm Angsuran</td>
   <td>: <input style="text-align:right" name="madm" type="text" id="madm" value="<?php echo $madm;?>" readonly/></td>
   <td>Refund Asuransi</td>
   <td>: <input style="text-align:right" name="jumrefund" type="text" id="jumrefund" maxlength="15" value="<?php echo $jumrefund;?>" readonly/></td>
</tr>
<tr>
   <td>Denda Angsuran</td>
   <td>: 
	<?php
	if($aktif_satu==1){
		echo '<input style="text-align:right" name="bungakk" type="text" id="bungakk" maxlength="15" value="'.$bungakk.'"/>';
	}else{
		echo '<input style="text-align:right" name="bungakk" type="text" id="bungakk" maxlength="15" value="'.$bungakk.'" readonly/>';
	}
	?>
   </td>
   <td><strong>JUMLAH ANGSURAN</strong></td>
   <td>: <input style="text-align:right;background-color: #6dc0be;" name="jumangsur" type="text" id="jumangsur" value="<?php echo $jumangsur;?>" readonly/></td>
   <td>Potongan Lainnya</td>
   <td>: <input style="text-align:right" name="jumbtl" type="text" id="jumbtl" maxlength="15" value="<?php echo $jumbtl; ?>"/></td>
</tr>
<tr>
   <td><strong>JUMLAH PELUNASAN</strong></td>
   <td>: <input style="text-align:right;background-color: #6dc0be;" name="jumlunas" type="text" id="jumlunas" value="<?php echo $jumlunas;?>" readonly/></td>
   <td>Biaya Administrasi</td>
   <td>: <input style="text-align:right" name="jumadm" type="text" id="jumadm" maxlength="15" value="<?php echo $jumadm; ?>" readonly/></td>
   <td>Potongan Grace Period</td>
   <td>: <input style="text-align:right" name="jum_period" type="text" id="jum_period" value="<?php echo $jum_period;?>"/></td>
</tr>
<tr>
   <td>JUMLAH ANG. PERTAMA</td>
   <td>: <input style="text-align:right" name="pot_angsuran" type="text" id="pot_angsuran" maxlength="15" value="<?php echo $pot_angsuran;?>" readonly/></td>
   <td>Biaya Provisi</td>
   <td>: <input style="text-align:right" name="jumprovisi" type="text" id="jumprovisi" maxlength="15" value="<?php echo $jumprovisi;?>" readonly/></td>
   <td><strong>JUMLAH POTONGAN</strong></td>
   <td>: <input style="text-align:right;background-color: #6dc0be;" name="jumpotong" type="text" id="jumpotong" value="<?php echo $jumpotong; ?>" readonly/></td>
</tr>
<tr>
   <td colspan="4">&nbsp;</td>
   <td><strong>JUMLAH DITERIMA</strong></td>
   <td>: <input style="text-align:right;background-color: #6dc0be;" name="jumbersih" type="text" id="jumbersih" value="<?php echo $jumbersih; ?>" readonly/></td>
</tr>
</table>
<div class="ui-widget-content" align="center">
	<input type="submit" value="Simpan" id="submit" class="icon-save" onclick="return validasi();" />
	<input type="button" value="Batal" id="submit" onclick="goKembali();" class="icon-cancel" />
</div>
</form>