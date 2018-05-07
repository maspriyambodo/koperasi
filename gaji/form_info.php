<tr><th colspan="4" class="ui-state-highlight">DATA KARYAWAN</th></tr>
<tr class="ui-state-error">
	<td width="15%" align="right">BRANCH :</td>
	<td width="35%"><?php $branch=$row['branch'];include '../gaji/par_branchx.php';?></td>
	<td width="15%" align="right">NIK :</td>
	<td width="35%"><?php echo $row['nik'];?></td>
</tr>
<tr class="ui-state-error">
	<td align="right">NAMA :</td>
	<td><?php echo $row['nama_karyawan']; ?></td>
	<td align="right">NO KTP :</td>
	<td><?php echo $row['no_ktp']; ?></td>
</tr>
<tr class="ui-state-error">
	<td align="right">TANGGAL LAHIR :</td>
	<td><?php echo date_sql($row['tgl_lahir']); ?></td>
	<td align="right">TEMPAT LAHIR :</td>
	<td><?php echo $row['tempat_lahir']; ?></td>
</tr>
<tr class="ui-state-error">
	<td align="right">ALAMAT :</td>
	<td colspan="3"><?php echo $row['alamat'].' KEL '.$row['kelurahan'].' KEC '.$row['kecamatan']; ?>
	</td>
</tr>