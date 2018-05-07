<?php include "../gaji/par_atas01.php";?>
<script type="text/javascript" src="../jQuery/formatinput.js"></script>
<script type="text/javascript" src="../jQuery/combobox.js"></script>
<script type="text/javascript" src="../gaji/java/tabel_absensi.js"></script>
<script>
	url1="../gaji/riwayat_kerjas.php?p=1";
	url2="../gaji/riwayat_kerjae.php";
	url3="../gaji/riwayat_kerjas.php?p=2";
	url4="../gaji/riwayat_kerjas.php?p=3";
	url5="../gaji/riwayat_kerjap.php";
	url6="../gaji/riwayat_kerja.php";
	uhead='DATA TABEL RIWAYAT PEKERJAAN';
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
			<tr><td colspan="4" align="center" class="ui-state-highlight">PENDATAAN RIWAYAT PEKERJAAN</td></tr>
			<tr>
				<td align="right">TANGGAL MASUK :</td>
				<td>
					<select name="tgl" id="tgl" style="width:50px" >
						<?php include '../gaji/form_tanggal.php'; ?>
					</select>
					<select name="bln" id="bln" style="width:80px" >
						<?php include '../gaji/form_bulan.php'; ?>
					</select>
					<select name="thn" id="thn" style="width:70px" >
						<?php include '../gaji/form_tahun.php'; ?>
					</select>
				</td>
				<td align="right">TANGGAL KELUAR :</td>
				<td>
					<select name="tgl_x" id="tgl_x" style="width:50px" >
						<?php include '../gaji/form_tanggal.php'; ?>
					</select>
					<select name="bln_x" id="bln_x" style="width:80px" >
						<?php include '../gaji/form_bulan.php'; ?>
					</select>
					<select name="thn_x" id="thn_x" style="width:70px" >
						<?php include '../gaji/form_tahun.php'; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">NAMA PERUSAHAAN :</td>
				<td><input name="nama_perusahaan" type="text" id="nama_perusahaan" size="40" maxlength="50" value="" onkeyup="caps(this)"/></td>
				<td align="right">JABATAN TERAKHIR :</td>
				<td><input name="jabatan" type="text" id="jabatan" size="40" maxlength="50" value="" onkeyup="caps(this)"/></td>
			</tr>
			<tr>
				<td align="right">PREDIKAT NILAI :</td>
				<td><?php $predikat=0;include '../gaji/form_predikat.php';?></td>
				<td align="right">KETERANGAN :</td>
				<td><textarea name="keterangan" id="keterangan" form="masuk" style="width: 300px" maxlength="250" onkeyup="caps(this)"></textarea></td>
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
		$hasil=$result->query_x("SELECT id,tgl_masuk,tgl_keluar,jabatan,predikat,keterangan,nama_perusahaan,kode_aktif FROM $tabel_riwayat WHERE nik='$nik' ORDER BY no_index",'');
		if($result->num($hasil)>0){ ?>
			<table class="table-line">
				<thead>
					<tr>
						<th>NO</th>
						<th>NAMA PERUSAHAAN</th>
						<th>JABATAN</th>
						<th>PREDIKAT</th>
						<th>TANGGAL MASUK</th>
						<th>TANGGAL KELUAR</th>
						<th>KETERANGAN</th>
						<th>OTORISASI</th>
						<th align="center">MAINTANCE</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$no=1;
				while($row = $result->row($hasil)){
					echo "<tr>";
					echo "<td>".$no."</td>";
					echo "<td>".$row['nama_perusahaan']."</td>";
					echo "<td>".$row['jabatan']."</td>";
					echo "<td>";$predikat=$row['predikat'];include '../gaji/form_predikatx.php';
					echo $predikatx;
					echo "</td>";
					echo "<td>".$row['tgl_masuk']."</td>";
					echo "<td>".$row['tgl_keluar']."</td>";
					echo "<td>".$row['keterangan']."</td>";
					echo "<td>";$kode_aktif=$row['kode_aktif'];include '../gaji/form_otorisasi.php';
					echo $kode_aktifx;
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