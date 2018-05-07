<?php
include 'h_tetap.php';
$id=$result->c_d($_GET['id']);
$hasil=$result->query_x1("SELECT id,kode,desc1 FROM kode_provinsi WHERE id='$id' LIMIT 1");
$r= $result->row($hasil);
?>
<div class="ui-widget-content" align="center">
<form name="formm" id="formm" method="post" action="">
	<table width="70%">
	<input type="hidden" name="id" id="id" value="<?php echo $r['id'];?>"/>
	<tr>
		<td>Kode Propinsi</td>
		<?php 
		if($r['kode']==''){ ?>
			<td>: <input type="text" name="kode" id="kode" value="<?php echo $r['kode'];?>" maxlength="3"/></td> <?php
		}else{ ?>
			<td>: <input type="text" name="kode" id="kode" value="<?php echo $r['kode'];?>" maxlength="3" readonly/></td> <?php
		}
		?>
	</tr>
	<tr>
		<td>Nama Propinsi</td>
		<td>: <input type="text" name="desc1" id="desc1" value="<?php echo $r['desc1'];?>" size="40" maxlength="50"/></td>
	</tr>
	</table>
</form>
</div>