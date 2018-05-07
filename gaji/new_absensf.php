<?php include "../gaji/par_atas01.php";?>
<script type="text/javascript" src="../jQuery/formatinput.js"></script>
<script type="text/javascript" src="../jQuery/combobox.js"></script>
<script type="text/javascript" src="../gaji/java/tabel_absensi.js"></script>
<script>
	url1="../gaji/new_absenss.php?p=1";
	url2="../gaji/new_absense.php";
	url3="../gaji/new_absenss.php?p=2";
	url4="../gaji/new_absenss.php?p=3";
	url5="../gaji/new_absensp.php";
	url6="../gaji/new_absensi.php";
	uhead='DATA TABEL ABSENSI';
</script>
<div class='ui-widget'>
	<?php
	$nik=$result->clean_data($_POST['nonas']);
	$hasil=$result->query_x("SELECT id,branch,nik,nama_karyawan,no_ktp,alamat,kelurahan,kecamatan,tgl_lahir,tempat_lahir FROM $tabel_master WHERE nik='$nik' LIMIT 1",'');
	if($result->num($hasil)<1){
		$result->msg_error('Nik Karyawan Tidak Terdaftar!');
	}
	$bulan_absensi=$blnxxx.$thnxxx;
	$row=$result->row($hasil); ?>
	<form id="masuk" name="masuk" method="POST" action="">
		<input name="nik" type="hidden" id="nik" value="<?php echo $nik; ?>"/>
		<table width="100%" class="table">
			<?php include '../gaji/form_info.php'; ?>
			<tr><td colspan="4" align="center" class="ui-state-highlight">PENDATAAN ABSENSI</td></tr>
			<tr>
				<td align="right">BULAN ABSENSI :</td>
				<td>
					<select name="bln" id="bln" style="width:80px" >
						<?php include '../gaji/form_bulan.php'; ?>
					</select>
					<select name="thn" id="thn" style="width:70px" >
						<?php include '../gaji/form_tahun.php'; ?>
					</select>					
				</td>
				<td align="right">JUMLAH SAKIT :</td>
				<td><input name="jumlah_sakit" type="text" id="jumlah_sakit" size="20" maxlength="4" value=""/></td>
			</tr>
			<tr>
				<td align="right">JUMLAH IZIN :</td>
				<td><input name="jumlah_izin" type="text" id="jumlah_izin" size="20" maxlength="4" value=""/></td>
				<td align="right">JUMLAH HADIR :</td>
				<td><input name="jumlah_hadir" type="text" id="jumlah_hadir" size="20" maxlength="4" value=""/></td>
			</tr>
			<tr>
				<td align="right">JUMLAH ALPHA :</td>
				<td><input name="jumlah_alpha" type="text" id="jumlah_alpha" size="20" maxlength="4" value=""/></td>
				<td align="right">JUMLAH JAM LEMBUR :</td>
				<td><input name="jumlah_lembur" type="text" id="jumlah_lembur" size="20" maxlength="4" value=""/></td>
			</tr>
		</table>
		<div class="ui-widget-content" align="center">
			<input type="submit" value="Simpan" id="submit" class="icon-save"onclick="return validasi();"/>
			<input type="button" value="Batal" id="submit" onclick="kembali();" class="icon-cancel"/>
		</div>
	</form>
	<input name="nikx" type="hidden" id="nikx" value="<?php echo $nik;?>"/>
	<div ID='divPageHasil'>
		<?php
		$hasil=$result->query_x("SELECT id,jumlah_sakit,jumlah_izin,jumlah_alpha,jumlah_hadir,bulan_absensi,jam_lembur FROM $tabel_absensi WHERE nik='$nik' AND bulan_absensi='$bulan_absensi' ORDER BY bulan_absensi",'');
		if($result->num($hasil)>0){ ?>
			<table class="table-line">
				<thead>
					<tr>
						<th>NO</th>
						<th>BULAN ABSENSI</th>
						<th>JUMLAH HADIR</th>
						<th>JUMLAH IZIN</th>
						<th>JUMLAH ALPHA</th>
						<th>JUMLAH SAKIT</th>
						<th>JUMLAH LEMBUR</th>
						<th align="center">MAINTANCE</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$no=1;
				while($row = $result->row($hasil)){
					echo "<tr>";
					echo "<td>".$no."</td>";
					echo "<td>".$row['bulan_absensi']."</td>";
					echo "<td>".$row['jumlah_hadir']."</td>";
					echo "<td>".$row['jumlah_izin']."</td>";
					echo "<td>".$row['jumlah_alpha']."</td>";
					echo "<td>".$row['jumlah_sakit']."</td>";
					echo "<td>".$row['jam_lembur']."</td>";
					echo "<td align='center'>"; ?>
					<a title='Edit Direktorat' class='standar' onClick='showEdit("<?php echo $row['id'];?>")'><img src='../css/images/edit.png'></a>
					<a title='Hapus Direktorat' class='standar' onClick='showDelete("<?php echo $row['id'];?>")'><img src='../css/images/delete.png'></a>
					<?php
					echo "</td>";
					echo "</tr>";
					$no++;
				}
				?>
				</tbody>
			</table>
			<?php
		}
		?>
	</div>
</div>
<div id="dialog" style="display: none"></div>
<?php
include '../gaji/par_bawah01.php';
?>