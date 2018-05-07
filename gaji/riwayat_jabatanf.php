<?php include "../gaji/par_atas01.php";?>
<script type="text/javascript" src="../jQuery/formatinput.js"></script>
<script type="text/javascript" src="../jQuery/combobox.js"></script>
<script type="text/javascript" src="../gaji/java/tabel_absensi.js"></script>
<script>
	url1="../gaji/riwayat_jabatans.php?p=1";
	url2="../gaji/riwayat_jabatane.php";
	url3="../gaji/riwayat_jabatans.php?p=2";
	url4="../gaji/riwayat_jabatans.php?p=3";
	url5="../gaji/riwayat_jabatanp.php";
	url6="../gaji/riwayat_jabatan.php";
	uhead='DATA TABEL RIWAYAT JABATAN';
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
			<tr><td colspan="4" align="center" class="ui-state-highlight">PENDATAAN RIWAYAT JABATAN</td></tr>
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
				<td align="right">KODE WILAYAH :</td>
				<td>
					<select name="kode_wilayah" id="kode_wilayah" class="combobox">
						<option value="">Pilihan</option>
						<?php $kode_wilayah='';include '../gaji/par_wilayah.php';?>
					</select>
				</td>
				<td align="right">JABATAN TERAKHIR :</td>
				<td>
					<select name="kode_jabatan" id="kode_jabatan" class="combobox">
						<option value="">Pilihan</option>
						<?php $kode_jabatan='';include '../gaji/par_jabatan.php';?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">KODE DIREKTORAT :</td>
				<td>
					<select name="kode_organisasi" id="kode_organisasi" class="combobox">
						<option value="">Pilihan</option>
						<?php $kode_organisasi='';include '../gaji/par_direktorat.php';?>
					</select>
				</td>	
				<td align="right">NILAI PREDIKAT :</td>
				<td><?php $predikat=0;include '../gaji/form_predikat.php';?></td>			
			</tr>
			<tr>
				<td align="right">AREA :</td>
				<td>
					<input name="kode_lokasi" type="text" id="kode_lokasi" size="6" maxlength="4" value=""/>
					<input type="button" value="" id="lookup_lokasi" class="icon-filter"/>
					<span id="nm_lokasi" style="padding-left: 40px"></span>
				</td>
				<td align="right">GRADE :</td>
				<td>
					<input name="kode_grade" type="text" id="kode_grade" size="6" maxlength="4" value=""/>
					<input name="grade" type="text" id="grade" size="3" maxlength="2" value=""/>
					<input type="button" value="" id="lookup_grade" class="icon-filter"/>
					<span id="nm_grade" style="padding-left: 40px"></span>
				</td>
			</tr>
			<tr>
				<td align="right">KETERANGAN :</td>
				<td colspan="3">
					<textarea name="keterangan" id="keterangan" form="masuk" style="width: 300px" maxlength="250" onkeyup="caps(this)"></textarea>
				</td>
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
		$hasil=$result->query_x("SELECT id,tgl_masuk,tgl_keluar,kode_jabatan,predikat,keterangan,kode_lokasi,kode_aktif FROM $tabel_riwayat_ja WHERE nik='$nik' ORDER BY no_index",'');
		if($result->num($hasil)>0){ ?>
			<table class="table-line">
				<thead>
					<tr>
						<th>NO</th>
						<th>AREA</th>
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
					echo "<td>";$kode_lokasi=$row['kode_lokasi'];include '../gaji/par_areax.php'; 
					echo $nama_lokasix;
					echo "</td>";
					echo "<td>";$kode_jabatan=$row['kode_jabatan'];include '../gaji/par_jabatanx.php'; 
					echo $nama_jabatanx;
					echo "</td>";
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