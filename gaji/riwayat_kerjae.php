<?php include "../gaji/par_atas01.php";?>
<script type="text/javascript" src="../java/_tombolback.js"></script>
<?php
$id=$result->clean_data($_GET['id']);
$hasil=$result->query_x("SELECT id,nik,tgl_masuk,tgl_keluar,jabatan,predikat,keterangan,nama_perusahaan,kode_aktif FROM $tabel_riwayat WHERE id='$id' LIMIT 1",'');
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
			<td align="right">NAMA PERUSAHAAN :</td>
			<td><input name="nama_perusahaan" type="text" id="nama_perusahaan" size="40" maxlength="50" value="<?php echo $r['nama_perusahaan'];?>" onkeyup="caps(this)"/></td>
		</tr>
		<tr>
			<td align="right">JABATAN TERAKHIR :</td>
			<td><input name="jabatan" type="text" id="jabatan" size="40" maxlength="50" value="<?php echo $r['jabatan'];?>" onkeyup="caps(this)"/></td>
		</tr>
		<tr>
			<td align="right">PREDIKAT NILAI :</td>
			<td><?php $predikat=$r['predikat'];include '../gaji/form_predikat.php';?></td>
		</tr>
		<tr>
			<td align="right">KETERANGAN :</td>
			<td><textarea name="keterangan" id="keterangan" form="masuk" style="width: 400px" maxlength="250"><?php echo $r['keterangan'];?></textarea></td>
		</tr>
	</table>
</form>
<?php
include "../gaji/par_bawah01.php";
?>
