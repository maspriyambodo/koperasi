<?php include "../gaji/par_atas01.php";?>
<script type="text/javascript" src="../java/_tombolback.js"></script>
<?php
$id=$result->clean_data($_GET['id']);
$hasil=$result->query_x("SELECT id,nik,jumlah_sakit,jumlah_izin,jumlah_alpha,jumlah_hadir,bulan_absensi,jam_lembur FROM $tabel_absensi WHERE id='$id' LIMIT 1",'');
$r= $result->row($hasil);?>
<input name="nikx" type="hidden" id="nikx" value="<?php echo $r['nik'];?>"/>
<form name="formm" id="formm" method="post" action="">
	<table width="100%">
		<input type="hidden" name="id" id="id" value="<?php echo $r['id'];?>"/>
		<input type="hidden" name="nik" id="nik" value="<?php echo $r['nik'];?>"/>
		<tr>
			<td align="right">BULAN ABSENSI :</td>
			<td><?php include '../gaji/form_bulan.php';include '../gaji/form_tahun.php';?></td>
			<td align="right">JUMLAH SAKIT :</td>
			<td><input name="jumlah_sakit" type="text" id="jumlah_sakit" size="20" maxlength="4" value="<?php echo $r['jumlah_sakit']; ?>"/></td>
		</tr>
		<tr>
			<td align="right">JUMLAH IZIN :</td>
			<td><input name="jumlah_izin" type="text" id="jumlah_izin" size="20" maxlength="4" value="<?php echo $r['jumlah_izin']; ?>"/></td>
			<td align="right">JUMLAH HADIR :</td>
			<td><input name="jumlah_hadir" type="text" id="jumlah_hadir" size="20" maxlength="4" value="<?php echo $r['jumlah_hadir']; ?>"/></td>
		</tr>
		<tr>
			<td align="right">JUMLAH ALPHA :</td>
			<td><input name="jumlah_alpha" type="text" id="jumlah_alpha" size="20" maxlength="4" value="<?php echo $r['jumlah_alpha']; ?>"/></td>
			<td align="right">JUMLAH JAM LEMBUR :</td>
			<td><input name="jumlah_lembur" type="text" id="jumlah_lembur" size="20" maxlength="4" value="<?php echo $r['jam_lembur']; ?>"/></td>
		</tr>
	</table>
</form>
<?php
include "../gaji/par_bawah01.php";
?>
