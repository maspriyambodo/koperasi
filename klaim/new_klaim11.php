<?php include '../h_tetap.php';?>
<script type="text/javascript" src="js/new_klaim.js"></script>
<script type="text/javascript">var url  ="./klaim/new_klaim00.php";var urls ="./klaim/new_klaimss.php";</script>
<?php $norek=$result->c_d($_POST['nonas']);$branch=$result->c_d($_POST['branch']);$fieldss="a.ketnas,a.kketnas,a.status_klaim,a.kode_cair,a.user_cair,DATE_FORMAT(a.tgl_cair,'%d-%m-%Y %H:%i:%s') AS tgl_cair";include '../dist/_header.php';if($row['kode_cair']==1)$result->msg_error('Nasabah Sudah Pencairan Klaim Asuransi/Penghapusan OBD Oleh '.$row['user_cair'].' Tanggal '.$row['tgl_cair']);if($row['status_klaim']==0 || $row['status_klaim']==1)$result->msg_error('Nasabah Belum Pengajuan Penghapusan OBD Atau Belum Otorisasi');$r=$result->row($result->query_x1("SELECT norek,nama,DATE_FORMAT(tgl_lahir,'%d-%m-%Y %H:%i:%s') AS tgl_lahir,tmp_lahir,DATE_FORMAT(tgl_mati,'%d-%m-%Y') AS tgl_mati,tmp_mati,sebab_mati,ket_mati,DATE_FORMAT(tgl_klaim,'%d-%m-%Y') AS tgl_klaim,jenis_klaim,DATE_FORMAT(tgl_jatuh_tempo,'%d-%m-%Y %H:%i:%s') AS tgl_jatuh_tempo,plafond,saldo,jumlah_klaim,kode_hapus,user_hapus,DATE_FORMAT(tgl_hapus,'%d-%m-%Y %H:%i:%s') AS tgl_hapus,angsur_ke FROM $tabel_klaim WHERE id_kredit='$idd'"));if($r['kode_hapus']==1)$result->msg_error('Pengajuan Klaim Telah Dibatalkan Oleh '.$r['user_hapus'].' Tanggal '.$r['tgl_hapus'].' ? Ajukan Kembali');$norekl='';$flunas=0;$kode_cair=0;$sufixl='';include '../config/_angsuran.php'; ?>
<form id="masuk" name="masuk" method="POST" action="">
	<input type="hidden" name="id" id="id" value="<?php echo $idd; ?>"/>
	<input name="nama" type="hidden" id="nama" value="<?php echo $nama; ?>"/>
	<input name="kdkop" type="hidden" id="kdkop" value="<?php echo $kdkop;?>"/>
	<input name="produk" type="hidden" id="produk" value="<?php echo $produk; ?>"/>
	<table width="100%">
		<tr><th colspan="4" class="ui-state-highlight">DATA DEBITUR</th></tr>
		<?php include '../_headerx.php';?>
		<tr><td colspan="4" align="center" class="ui-state-highlight">TRANSAKSI PENCAIRAN PENGHAPUSAN OBD</td></tr>
		<tr>
			<td align="right">Nama :</td>
			<td><input type="text" name="nama" id="nama" maxlength="45" size="40" value="<?php echo $r['nama']; ?>" readonly/></td>
			<td align="right">No Rekening :</td>
			<td><input type="text" name="norek" id="norek" maxlength="15" size="40" value="<?php echo $norek; ?>" readonly/></td>
		</tr>
		<tr>
			<td align="right">Tanggal Lahir :</td>
			<td><input type="text" name="tgl_lahir" id="tgl_lahir" maxlength="15" size="40" value="<?php echo $r['tgl_lahir'];?>" readonly/></td>
			<td align="right">Tempat lahir :</td>
			<td><input type="text" name="tmp_lahir" id="tmp_lahir" maxlength="45" size="40" value="<?php echo $r['tmp_lahir']; ?>" readonly/></td>
		</tr>
		<tr>
			<td align="right">Tanggal Meninggal :</td>
			<td><input name="tgl_mati" type="text" id="tgl_mati" maxlength="15" size="40" value="<?php echo $r['tgl_mati']; ?>"/></td>
			<td align="right">Tempat Meninggal :</td>
			<td><input type="text" name="tmp_mati" id="tmp_mati" maxlength="45" size="40" value="<?php echo $r['tmp_mati']; ?>"/></td>
		</tr>
		<tr>
			<td align="right">Sebab Meninggal :</td>
			<td><input name="sebab_mati" type="text" id="sebab_mati" maxlength="45" size="40" value="<?php echo $r['sebab_mati']; ?>"/></td>
			<td align="right">Ket. Sebab Meninggal :</td>
			<td><input type="text" name="ket_mati" id="ket_mati" maxlength="150" size="40" value="<?php echo $r['ket_mati']; ?>"/></td>
		</tr>
		<tr>
			<td align="right">Tanggal Pengajuan</td>
			<td><input name="tgl_klaim" type="text" id="tgl_klaim" maxlength="15" size="40" value="<?php echo $r['tgl_klaim']; ?>"/></td>
			<td align="right">Jenis Pengajuan Klaim</td>
			<td>
				<select name="jenis_klaim" id="jenis_klaim" style="width:250px;">
				<?php $huruf = array("PP ASURANSI","PPAP CAD. UMUM PENSIUN","PPAP CAD UMUM PEGAWAI","PPAP CAD UMUM MICRO","PPAP CAD. KHUSUS PENSIUN","PPAP CAD KHUSUS PEGAWAI","PPAP CAD KHUSUS MICRO");$i = 0;
				while($i < 7){
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
			<td><input name="nomi" type="text" id="nomi" maxlength="45" size="40" value="<?php echo formatrp($r['plafond']); ?>" readonly/></td>
			<td align="right">Outstanding :</td>
			<td><input type="text" name="saldoa" id="saldoa" maxlength="15" size="40" value="<?php echo formatrp($r['saldo']); ?>" readonly/></td>
		</tr>	
		<tr>
			<td align="right">Bulan Angsuran Ke</td>
			<td><input name="fangsur" type="text" id="fangsur" value="<?php echo $r['angsur_ke'];?>" size="30" readonly/> BULAN</td>
			<td align="right">Jumlah Pencairan Klaim :</td>
			<td><input name="jumlah_cair" type="text" id="jumlah_cair" maxlength="15" size="40" value="<?php echo $r['jumlah_klaim']; ?>"/></td>
		</tr>
		<tr>
			<td colspan="4" class="ui-state-highlight" align="center">
				<div class="ui-widget-content" align="center">
					<input type="submit" value="Simpan" id="submit" class="icon-save"/>
					<input type="button" value="Batal" id="submit" onclick="goKembali();" class="icon-cancel"/>
				</div>
			</td>
		</tr>
	</table>
</form>
<div id="divPageList"></div>
<div id="dialog-form" title="Otorisasi">
	<table>
		<tr>
			<td>User Name</td>
			<td>: <input type="text" name="nmuser" id="nmuser" onKeyUp="caps(this)" class="text ui-widget-content ui-corner-all"/></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>: <input type="password" name="password" id="password" class="text ui-widget-content ui-corner-all"/></td>
		</tr>
	</table>
</div>
<script type="text/javascript">
	var tglklaim=$('#tgl_klaim').val();
	var str2 = tglklaim.split('-',3);
	var str22 = str2[2] + '-' +str2[1] + '-' + str2[0];
	//if(new Date(mulai) > new Date(akhir)) {
	//	alert('Tanggal Mulai harus lebih kecil dari tanggal akhir.');
	//}else {
	//	alert('Tanggal valid.');
	//}	
	var re = /^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/; 
	if(!str22.match(re) ) {
		var sbmt = document.getElementById("submit");
		sbmt.disabled = true;
		alert('Format Tanggal Pengajuan '+tglklaim+' ?');
		//$('form#masuk').children('input[type=submit]').attr('disabled', 'disabled');
	 	//$('form#masuk').find('input[type=submit]').prop('disabled', true);
	 	//return false;
	}
</script>