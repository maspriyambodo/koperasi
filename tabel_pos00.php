<?php 
include 'h_tetap.php';
$id=$result->c_d($_GET['id']);
$hasil=$result->query_x1("SELECT id,kode,desc1,desc2,desc3,desc4 FROM kode_pos WHERE id='$id' LIMIT 1");
$r= $result->row($hasil)
?>
<div class="ui-widget-content" align="center">
<form name="formm" id="formm" method="post" action="">
	<table width="70%">
	<input type="hidden" name="id" id="id" value="<?php echo $r['id'];?>"/>
	<tr>
		<td>Kode Pos</td>
		<?php 
		if($r['kode']==''){ ?>
			<td>: <input type="text" name="kode" id="kode" value="<?php echo $r['kode'];?>" maxlength="5"/></td> <?php
		}else{ ?>
			<td>: <input type="text" name="kode" id="kode" value="<?php echo $r['kode'];?>" maxlength="5" readonly/></td> <?php
		}
		?>
	</tr>
	<tr>
		<td>Kelurahan</td>
		<td>: <input type="text" name="desc1" id="desc2" value="<?php echo $r['desc1'];?>" size="40" maxlength="50"/></td>
	</tr>
	<tr>
		<td>Kecamatan</td>
		<td>: <input type="text" name="desc2" id="desc3" value="<?php echo $r['desc2'];?>" size="40" maxlength="50"/></td>
	</tr>
	<tr>
		<td>Kabupaten</td>
		<td>: <input type="text" name="desc3" id="desc4" value="<?php echo $r['desc3'];?>" size="40" maxlength="50"/></td>
	</tr>
	<tr>
		<td>Propinsi</td>
		<td>: <input type="text" name="desc4" id="desc4" value="<?php echo $r['desc4'];?>" size="40" maxlength="50"/></td>
	</tr>
	</table>
</form>
</div>