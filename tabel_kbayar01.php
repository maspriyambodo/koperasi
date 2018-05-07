<?php 
include 'h_tetap.php';
$id=$result->c_d($_GET['id']);
$hasil=$result->query_x1("SELECT * FROM $tabel_kkb WHERE id='$id' ORDER BY kd");$r= $result->row($hasil);
?>
<div class="ui-widget-content" align="center">
<form name="formm" id="formm" method="post" action="">
	<table width="100%">
	<input type="hidden" name="id" id="id" value="<?php echo $r['ID'];?>"/>
	<tr>
		<td>Kode Kantor Bayar</td>
		<?php 
		if($r['KD']==''){ ?>
			<td>: <input type="text" name="kd" id="kd" value="<?php echo $r['KD'];?>" maxlength="8"/></td><?php
		}else{ ?>
			<td>: <input type="text" name="kd" id="kd" value="<?php echo $r['KD'];?>" maxlength="8" readonly/></td><?php
		}
		?>
	</tr>
	<tr>
		<td>Nama Kantor Bayar</td>
		<td>: <input type="text" name="nmkb" id="nmkb" value="<?php echo $r['NMKB'];?>" size="40" maxlength="35"/></td>
	</tr>
	<tr>
		<td>Kode Branch</td><td>:
			<select name="branch" id="branch">
				<?php
				$hasil=$result->res("select kode,nama from $tabel_kantor order by kode");
				while ($data = $result->row($hasil)) {
					if ($r['BRANCH'] == $data['kode']) 
						echo "<option value=\"".$data['kode']."\" selected>".$data['nama']."</option>";
					else
						 echo "<option value=\"".$data['kode']."\">".$data['nama']."</option>";		
				}
				?>
			</select>
		</td>
	</tr>
	</table>
</form>
</div>