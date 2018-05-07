<?php
include "h_tetap.php";
$id=$result->c_d($_GET['id']);
$hasil = $result->query_x1("SELECT id,nonas,sufix,norekgl,norekgsl,norekgssl,nama,produk,kode,tarik FROM akuntansi.sandim WHERE id='$id'");$r= $result->row($hasil);
?>
<div class="ui-widget-content" align="center">
<form name="formm" id="formm" method="post" action="">
	<table width="100%">
		<input type="hidden" name="id" id="id" value="<?php echo $r['id'];?>"/>
		<tr>
			<td>Norek GL</td>
			<?php 
			if($r['nonas']==''){ ?>
				<td>: <input type="text" name="nonas" id="nonas" value="<?php echo $r['nonas'];?>" maxlength="6"/></td><?php
			}else{ ?>
				<td>: <input type="text" name="nonas" id="nonas" value="<?php echo $r['nonas'];?>" maxlength="6" readonly/></td><?php
			}
			?>
		</tr>
		<tr>
			<td>Nama GL</td>
			<td>: <input type="text" name="nama" id="nama" value="<?php echo $r['nama'];?>" size="70" maxlength="70" onkeyup="caps(this)"/></td>
		</tr>
		<tr>
			<td>Saldo Normal</td><td>:
			<select name="kode" id="kode" class="combobox">
				<?php
				$huruf = array("DEBET","KREDIT");
				$y=1;$i = 0;
				if($r['kode']=='D'){
					$y=0;
					while ($i < 2) {
						if($y==$i){
							echo "<option selected='selected' value=D>" . $huruf[$i] . "</option>";
						}else{
							echo "<option value=K>" . $huruf[$i] . "</option>";}
						$i++;
					}
				}else{
					while ($i < 2) {
						if($y==$i){
							echo "<option selected='selected' value=K>" . $huruf[$i] . "</option>";
						}else{
							echo "<option value=D>" . $huruf[$i] . "</option>";}
						$i++;
					}
				}?>
			</select>
			</td>
		</tr>
		<tr>
			<td>Penarikan Tunai</td><td>:
			<select name="kode_tarik" id="kode_tarik" class="combobox">
				<?php
				$huruf = array("YA","TIDAK");
				$i=0;
				while ($i < 2) {
					if($r['tarik']==$i){
						echo "<option selected='selected' value='".$i."'>".$huruf[$i]."</option>";
					}else{
						echo "<option value='".$i."'>".$huruf[$i]."</option>";}
					$i++;
				}?>
			</select>
			</td>
		</tr>
	</table>
</form>
</div>