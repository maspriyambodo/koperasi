<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/hanya_angka.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
	$('#masuk').submit(function () {
		$.ajax({
			type: 'POST',
			url : 'tabel_ttds.php',
			data: $(this).serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				$('#loading').hide();
				alert(data);
			}
		});
		return false;
	});
});
</script>
<?php $branch=$result->c_d($_POST['branch']);$hasil=$result->query_x1("SELECT nama1,nama2,nama3,nama4,nama5,nama6,nama7,nama8,telepon1,telepon2,telepon3,telepon4,telepon5,telepon6,telepon7,telepon8,jabatan1,jabatan2,jabatan3,jabatan4,jabatan5,jabatan6,jabatan7,jabatan8 FROM $tabel_ttd WHERE branch='$branch'");$row = $result->row($hasil);?>
<div class="ui-widget-content">
<form name="masuk" id="masuk" action="" method="post">
<input type="hidden" name="branch" id="branch" value="<?php echo $branch;?>"/>
<table class="table-no" align="center">
	<tr>
		<td align="right">SPPUM I (KIRI)</td>
		<td align="left">: <input type="text" name="nama1" id="nama1" value="<?php echo $row['nama1'];?>" size="40" maxlength="30" onkeyup="caps(this)"/></td>
		<td align="right">NO TELEPON</td>
		<td align="left">: <input type="text" name="telepon1" id="telepon1" value="<?php echo $row['telepon1'];?>" size="20" maxlength="15" onkeypress="return hanyaAngka(event, false)"/></td>
		<td align="right">JABATAN</td>
		<td align="left">: <input type="text" name="jabatan1" id="jabatan1" value="<?php echo $row['jabatan1'];?>" size="40" maxlength="40" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">SPPUM II (TENGAH)</td>
		<td align="left">: <input type="text" name="nama2" id="nama2" value="<?php echo $row['nama2'];?>" size="40" maxlength="30" onkeyup="caps(this)"/></td>
		<td align="right">NO TELEPON</td>
		<td align="left">: <input type="text" name="telepon2" id="telepon2" value="<?php echo $row['telepon2'];?>" size="20" maxlength="15" onkeypress="return hanyaAngka(event, false)"/></td>
		<td align="right">JABATAN</td>
		<td align="left">: <input type="text" name="jabatan2" id="jabatan2" value="<?php echo $row['jabatan2'];?>" size="40" maxlength="40" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">SPPUM III (KANAN)</td>
		<td align="left">: <input type="text" name="nama3" id="nama3" value="<?php echo $row['nama3'];?>" size="40" maxlength="30" onkeyup="caps(this)"/></td>
		<td align="right">NO TELEPON</td>
		<td align="left">: <input type="text" name="telepon3" id="telepon3" value="<?php echo $row['telepon3'];?>" size="20" maxlength="15" onkeypress="return hanyaAngka(event, false)"/></td>
		<td align="right">JABATAN</td>
		<td align="left">: <input type="text" name="jabatan3" id="jabatan3" value="<?php echo $row['jabatan3'];?>" size="40" maxlength="40" onkeyup="caps(this)"/></td>

	</tr>
	<tr>
		<td align="right">KETUM KREDIT</td>
		<td align="left">: <input type="text" name="nama4" id="nama4" value="<?php echo $row['nama4'];?>" size="40" maxlength="30" onkeyup="caps(this)"/></td>
		<td align="right">NO TELEPON</td>
		<td align="left">: <input type="text" name="telepon4" id="telepon4" value="<?php echo $row['telepon4'];?>" size="20" maxlength="15" onkeypress="return hanyaAngka(event, false)"/></td>
		<td align="right">JABATAN</td>
		<td align="left">: <input type="text" name="jabatan4" id="jabatan4" value="<?php echo $row['jabatan4'];?>" size="40" maxlength="40" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">SURAT PERMOHONAN</td>
		<td align="left">: <input type="text" name="nama5" id="nama5" value="<?php echo $row['nama5'];?>" size="40" maxlength="30" onkeyup="caps(this)"/></td>
		<td align="right">NO TELEPON</td>
		<td align="left">: <input type="text" name="telepon5" id="telepon5" value="<?php echo $row['telepon5'];?>" size="20" maxlength="15" onkeypress="return hanyaAngka(event, false)"/></td>
		<td align="right">JABATAN</td>
		<td align="left">: <input type="text" name="jabatan5" id="jabatan5" value="<?php echo $row['jabatan5'];?>" size="40" maxlength="40" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">SURAT KUASA</td>
		<td align="left">: <input type="text" name="nama6" id="nama6" value="<?php echo $row['nama6'];?>" size="40" maxlength="30" onkeyup="caps(this)"/></td>
		<td align="right">NO TELEPON</td>
		<td align="left">: <input type="text" name="telepon6" id="telepon6" value="<?php echo $row['telepon6'];?>" size="20" maxlength="15" onkeypress="return hanyaAngka(event, false)"/></td>
		<td align="right">JABATAN</td>
		<td align="left">: <input type="text" name="jabatan6" id="jabatan6" value="<?php echo $row['jabatan6'];?>" size="40" maxlength="40" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">PENERIMA DOKUMEN</td>
		<td align="left">: <input type="text" name="nama7" id="nama7" value="<?php echo $row['nama7'];?>" size="40" maxlength="30" onkeyup="caps(this)"/></td>
		<td align="right">NO TELEPON</td>
		<td align="left">: <input type="text" name="telepon7" id="telepon7" value="<?php echo $row['telepon7'];?>" size="20" maxlength="15" onkeypress="return hanyaAngka(event, false)"/></td>
		<td align="right">JABATAN</td>
		<td align="left">: <input type="text" name="jabatan7" id="jabatan7" value="<?php echo $row['jabatan7'];?>" size="40" maxlength="40" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="right">PREMI ASURANSI</td>
		<td align="left">: <input type="text" name="nama8" id="nama8" value="<?php echo $row['nama8'];?>" size="40" maxlength="30" onkeyup="caps(this)"/></td>
		<td align="right">NO TELEPON</td>
		<td align="left">: <input type="text" name="telepon8" id="telepon8" value="<?php echo $row['telepon8'];?>" size="20" maxlength="15" onkeypress="return hanyaAngka(event, false)"/></td>
		<td align="right">JABATAN</td>
		<td align="left">: <input type="text" name="jabatan8" id="jabatan8" value="<?php echo $row['jabatan8'];?>" size="40" maxlength="40" onkeyup="caps(this)"/></td>
	</tr>
	<tr>
		<td align="center" colspan="6"><input type="submit" id="submit" name="submit" value="Simpan" class="icon-save"/></td>
	</tr>	
</table>
</form>
</div>