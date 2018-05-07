<?php 
include 'h_tetap.php';
$id=$result->c_d($_GET['id']);
$hasil=$result->query_x1("SELECT * FROM $tabel_kantor WHERE id='$id' ORDER BY kode");$r= $result->row($hasil);
?>
<div class="ui-widget-content" align="center">
<form name="formm" id="formm" method="post" action="">
	<table width="100%">
	<input type="hidden" name="id" id="id" value="<?php echo $r['ID'];?>"/>
	<tr>
		<td>Kode Cabang</td>
		<?php 
		if($r['KODE']==''){ ?>
			<td>: <input type="text" name="kode" id="kode" value="<?php echo $r['KODE'];?>" maxlength="4"/></td><?php
		}else{ ?>
			<td>: <input type="text" name="kode" id="kode" value="<?php echo $r['KODE'];?>" maxlength="4" readonly=""/></td><?php
		}
		?>
	</tr>
	<tr>
		<td>Nama Cabang</td>
		<td>: <input type="text" name="nama" id="nama" value="<?php echo $r['NAMA'];?>" size="40" maxlength="30"/></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>: <input type="text" name="alamat" id="alamat" value="<?php echo $r['ALAMAT'];?>" size="60" maxlength="140"/></td>
	</tr>
	<tr>
		<td>No Telepon</td>
		<td>: <input type="text" name="no_telepon" id="no_telepon" value="<?php echo $r['NO_TELEPON'];?>" size="30" maxlength="15"/></td>
	</tr>
	<tr>
		<td>No Handphone</td>
		<td>: <input type="text" name="no_handphone" id="no_handphone" value="<?php echo $r['NO_HANDPHONE'];?>" size="30" maxlength="15"/></td>
	</tr>
	<tr>
		<td>No Fax</td>
		<td>: <input type="text" name="no_fax" id="no_fax" value="<?php echo $r['NO_FAX'];?>" size="30" maxlength="15"/></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>: <input type="text" name="nama_email" id="nama_email" value="<?php echo $r['NAMA_EMAIL'];?>" size="60" maxlength="50"/></td>
	</tr>
	</table>
</form>
</div>