<?php include "../gaji/par_atas01.php";?>
<script type="text/javascript" src="../java/_tombolback.js"></script>
<script type="text/javascript" src="../jQuery/combobox.js"></script>
<?php
$id=$result->clean_data($_GET['id']);
$hasil=$result->query_x("SELECT id,nik,tgl_masuk,tgl_keluar,kode_jabatan,predikat,keterangan,kode_aktif,kode_lokasi,kode_organisasi,kode_wilayah,kode_grade,grade FROM $tabel_riwayat_ja WHERE id='$id' LIMIT 1",'');
$r= $result->row($hasil);?>
<input name="nikx" type="hidden" id="nikx" value="<?php echo $r['nik'];?>"/>
<form id="formm" name="formm" method="POST" action="">
	<input type="hidden" name="id" id="id" value="<?php echo $r['id'];?>"/>
	<input name="nik" type="hidden" id="nik" value="<?php echo $r['nik'];?>"/>
	<table width="100%" class="table">
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
		</tr>
		<tr>
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
		</tr>
		<tr>
			<td align="right">JABATAN TERAKHIR :</td>
			<td>
				<select name="kode_jabatan" id="kode_jabatan" class="combobox">
					<option value="">Pilihan</option>
					<?php $kode_jabatan=$r['kode_jabatan'];include '../gaji/par_jabatan.php';?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">KODE DIREKTORAT :</td>
			<td>
				<select name="kode_organisasi" id="kode_organisasi" class="combobox">
					<option value="">Pilihan</option>
					<?php $kode_organisasi=$r['kode_organisasi'];include '../gaji/par_direktorat.php';?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">NILAI PREDIKAT :</td>
			<td><?php $predikat=$r['predikat'];include '../gaji/form_predikat.php';?></td>
		</tr>
		<tr>
			<td align="right">AREA :</td>
			<td>
				<select name="kode_lokasi" id="kode_lokasi" class="combobox">
					<option value="">Pilihan</option>
					<?php $kode_lokasi=$r['kode_lokasi'];include '../gaji/par_area.php';?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">KODE GRADE :</td>
			<td>
				<select name="kode_grade" id="kode_grade" class="combobox">
					<option value="">Pilihan</option>
					<?php $kode_grade=$r['kode_grade'];include '../gaji/par_grade.php';?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">GRADE :</td>
			<td>
				<select name="grade" id="grade" class="combobox">
					<option value="">Pilihan</option>
					<?php $grade=$r['grade'];include '../gaji/par_gradey.php';?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">KETERANGAN :</td>
			<td>
				<textarea name="keterangan" id="keterangan" form="masuk" style="width: 400px" maxlength="250"><?php echo $r['keterangan'];?></textarea>
			</td>
		</tr>
	</table>
</form>
<?php
include "../gaji/par_bawah01.php";
?>
