<?php include 'h_tetap.php';?>
<script type='text/javascript'>
	$(function(){
		$('#tenor_premi').priceFormat({prefix:'',centsSeparator:'.',thousandsSeparator:'.',centsLimit:2});
	});
</script>
<?php
$id=$result->c_d($_GET['id']);
$hasil=$result->query_x1("SELECT id,kode_asuransi,umur,jangka_waktu,tenor_premi FROM tbl_premi WHERE id='$id' ORDER BY kode_asuransi");$row= $result->row($hasil);
?>
<div class="ui-widget-content" align="center">
<form name="formm" id="formm" method="post" action="">
<table width="70%">
	<input type="hidden" name="id" id="id" value="<?php echo $row['id'];?>"/>
	<tr>
		<td width="25%">Kode Asuransi</td>
		<td>: <?php 
		if($row['kode_asuransi']==""){ ?>
			<select name="kode_asuransi" id="kode_asuransi" class="combobox">
				<option value="">PILIHAN</option>
				<?php include "help/kode_asuransi.php"; ?>
			</select>
			<?php
		}else{ ?>
			<input type="text" readonly name="kode_asuransi" id="kode_asuransi" value="<?php echo $row['kode_asuransi'];?>" size="37" maxlength="5"/>	<?php
		} ?>
		</td>
	</tr>
	<tr>
		<td>Umur Nasabah</td><td>: 
		<input type="text" name="umur" id="umur" value="<?php echo $row['umur'];?>" size="37" maxlength="30" />TAHUN</td>
	</tr>
	<tr>
		<td>Jangka Waktu</td><td>: 
		<input type="text" name="jangka_waktu" id="jangka_waktu" value="<?php echo $row['jangka_waktu'];?>" size="37" maxlength="2" />BULAN</td>
	</tr>
	<tr>
		<td>Tenor Premi</td><td>: 
		<input type="text" name="tenor_premi" id="tenor_premi" value="<?php echo $row['tenor_premi'];?>" size="37" maxlength="5" />%</td>
	</tr>
	</table>
</form>
</div>