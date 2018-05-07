<?php include 'h_tetap.php';?>
<script TYPE="text/javascript">
$(function(){
	$('#saldoawal').priceFormat({prefix: '',centsSeparator: ',',thousandsSeparator: '.', centsLimit: 0});
	$('#mutdebet').priceFormat({prefix: '',centsSeparator: ',',thousandsSeparator: '.', centsLimit: 0});
	$('#mutkredit').priceFormat({prefix: '',centsSeparator: ',',thousandsSeparator: '.', centsLimit: 0});
	$('#memdebet').priceFormat({prefix: '', centsSeparator: ',',thousandsSeparator: '.', centsLimit: 0});
	$('#memkredit').priceFormat({prefix: '',centsSeparator: ',',thousandsSeparator: '.', centsLimit: 0});
	$('#saldoakhir').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
});
</script>
<?php 
$id=$result->c_d($_GET['id']);$hasil=$result->query_lap("SELECT id,saldoawal,mutdebet,mutkredit,memdebet,memkredit,saldoakhir FROM $tabel_tabungan WHERE id='$id'");$row = $result->row($hasil);?>
<form id="editmasuk" name="editmasuk" method="get" action="">
	<input name="id" type="hidden" id="id" value="<?php echo $id;?>"/>
	<table>
	<tr>
		<td align="right">Saldo Awal</td>
		<td>: 
			<input style="text-align:right" name="saldoawal" type="text" id="saldoawal" value="<?php echo $row['saldoawal'];?>"/>
		</td>
	</tr>
	<tr>
		<td align="right">Mutasi Debet Kas</td>
		<td>: 
			<input style="text-align:right" name="mutdebet" type="text" id="mutdebet" value="<?php echo $row['mutdebet'];?>"/>
		</td>
	</tr>
	<tr>
		<td align="right">Mutasi Kredit Kas</td>
		<td>: 
			<input style="text-align:right" name="mutkredit" type="text" id="mutkredit" value="<?php echo $row['mutkredit'];?>"/>
		</td>
	</tr>
	<tr>
		<td align="right">Mutasi Debet Memorial</td>
		<td>: 
			<input style="text-align:right" name="memdebet" type="text" id="memdebet" value="<?php echo $row['memdebet'];?>"/>
		</td>
	</tr>
	<tr>
		<td align="right">Mutasi Kredit Memorial</td>
		<td>: 
			<input style="text-align:right" name="memkredit" type="text" id="memkredit" value="<?php echo $row['memkredit'];?>"/>
		</td>
	</tr>
	<tr>
		<td align="right">Saldo AKhir</td>
		<td>: 
			<input style="text-align:right" name="saldoakhir" type="text" id="saldoakhir" value="<?php echo $row['saldoakhir'];?>"/>
		</td>
	</tr>
	</table>
</form>