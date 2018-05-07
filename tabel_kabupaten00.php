<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<?php
$id=$result->c_d($_GET['id']);
$hasil=$result->query_x1("SELECT id,kode,desc1,kode_provinsi FROM kode_kabupaten WHERE id='$id' LIMIT 1");
$r= $result->row($hasil)
?>
<div class="ui-widget-content" align="center">
<form name="formm" id="formm" method="post" action="">
	<table width="70%">
	<input type="hidden" name="id" id="id" value="<?php echo $r['id'];?>"/>
	<tr>
		<td>Kode Kabupaten</td>
		<?php 
		if($r['kode']==''){ ?>
			<td>: <input type="text" name="kode" id="kode" value="<?php echo $r['kode'];?>" maxlength="4"/></td><?php
		}else{ ?>
			<td>: <input type="text" name="kode" id="kode" value="<?php echo $r['kode'];?>" maxlength="4" readonly/></td><?php
		}
		?>
	</tr>
	<tr>
		<td>Nama Kabupaten</td>
		<td>: <input type="text" name="desc1" id="desc1" value="<?php echo $r['desc1'];?>" size="40" maxlength="50"/></td>
	</tr>
	<tr>
		<td>Provinsi</td><td>:
			<select name="kode_provinsi" id="kode_provinsi" class="combobox">
				<?php $_propinsi=$r['kode_provinsi']; include 'help/kode_propinsi.php';?>
			</select>
		</td>
	</tr>
	</table>
</form>
</div>