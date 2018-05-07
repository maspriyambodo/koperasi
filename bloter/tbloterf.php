<?php 
include '../auth.php';
include '../koneksi.php';
include '../function.php';?>
<script type="text/javascript">
	jQuery(function($) {
		$("#date_expire").mask("99-99-9999");
	});
$(function(){
	$('#saldo_awal').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#saldo_akhir').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#mutasi_debet').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#mutasi_kredit').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
});
</script>
<?php
$id=clean($_GET['id']);
$result = $mysql->query("SELECT id,branch,userid,bloterid,saldo_awal,mutasi_debet,mutasi_kredit,saldo_akhir,valid,date_open,date_expire FROM tbl_bloter WHERE id='$id' ORDER BY userid");include '../pesanerr.php';
$r= $result->fetch_array(MYSQLI_ASSOC);?>
<form name="formm" id="formm" method="post" action="">
	<table width="100%">
	<input type="hidden" name="id" id="id" value="<?php echo $r['id'];?>"/>
	<tr>
		<td width="15%">Bloter ID</td>
		<?php
		if($r['bloterid']==''){
			$resultt=$mysql->query("SELECT MAX(bloterid) AS bloterid FROM tbl_bloter");
			$datamax= $resultt->fetch_array(MYSQLI_BOTH);
			if($datamax['bloterid']=='') {
				$bloterid='100001';
			}else {
				$makscif=$datamax['bloterid'];
				$makscif++;
				$bloterid=$makscif;
			}
			echo '<td width="35%">: <input type="text" name="bloterid" id="bloterid" value="'.$bloterid.'" maxlength="6" readonly/></td> ';
			echo '<td width="15%">Branch</td>';
			echo '<td width="35%">: <input type="text" name="branch" id="branch" value="'.$kcabang.'" maxlength="20" readonly/></td>';
		}else{ ?>
			<td width="35%">: <input type="text" name="bloterid" id="bloterid" value="<?php echo $r['bloterid'];?>" maxlength="20" readonly/></td> 
			<td width="15%">Branch</td>
			<td width="35%">: <input type="text" name="branch" id="branch" value="<?php echo $r['branch'];?>" maxlength="20" readonly/></td>
			<?php
		}?>
	</tr>
	<tr>
		<td>Status</td>
		<td>: 
			<select name="valid" id="valid" class="combobox">
				<option value=""></option><?php $huruf = array("ENABLE","DISABLE");$i = 0;
				while ($i < 2) {
					if ($r['valid']==$i){
						echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
					}else{
						echo "<option value='".$i."'>".$huruf[$i]."</option>";
					}
					$i++;
				} ?>
			</select>
		</td>
		<td>User ID</td>
		<td>: 
		<select name="useridx" id="useridx" class="combobox">
			<?php
			$result = $mysql->query("SELECT userid,nama FROM tbluser WHERE branch='$kcabang' ORDER BY nama");
			if ($result) {
				while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
					if ($r['userid']==$data['userid']){
						echo "<option value=\"".$data['userid']."\" selected>".$data['userid'].'-'.$data['nama']."</option>";
					}else{
						echo "<option value=\"".$data['userid']."\">".$data['userid'].'-'.$data['nama']."</option>";
					}
				}
			}?>
		</select>
		</td>
	</tr>
	<tr>
		<td>Saldo Awal</td>
		<td>: <input type="text" name="saldo_awal" id="saldo_awal" value="<?php echo $r['saldo_awal'];?>" maxlength="12"/></td>
		<td>Mutasi Debet</td>
		<td>: <input type="text" name="mutasi_debet" id="mutasi_debet" value="<?php echo $r['mutasi_debet'];?>" maxlength="12"/></td>
	</tr>
	<tr>
		<td>Saldo Akhir</td>
		<td>: <input type="text" name="saldo_akhir" id="saldo_akhir" value="<?php echo $r['saldo_akhir'];?>" maxlength="12"/></td>
		<td>Mutasi Kredit</td>
		<td>: <input type="text" name="mutasi_kredit" id="mutasi_kredit" value="<?php echo $r['mutasi_kredit'];?>" maxlength="12"/></td>
	</tr>
	<tr>
		<td>Tanggal Berakhir</td>
		<td>: <input type="text" name="date_expire" id="date_expire" value="<?php echo date_sql($r['date_expire']);?>"/></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	</table>
</form>