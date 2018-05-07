<?php include "../gaji/par_atas01.php";?>
<script type="text/javascript" src="../jQuery/formatinput.js"></script>
<script type="text/javascript" src="../java/_tombolback.js"></script>
<script>
$(function(){
	$('#jumlah_ptkp').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
});
</script>
<?php
$id=$result->clean_data($_GET['id']);
$hasil=$result->query_x("SELECT id,kode_ptkp,keterangan,jumlah_ptkp FROM $tabel_ptkp WHERE id='$id' ORDER BY kode_ptkp LIMIT 1",'');
$count=$result->num($hasil);
if($count>0){
	$r= $result->row($hasil);?>
	<form name="formm" id="formm" method="post" action="">
		<table width="100%">
		<input type="hidden" name="id" id="id" value="<?php echo $r['id'];?>"/>
		<tr>
			<td width="15%">KODE PTKP</td>
			<td width="35%">: 
			<input type="text" name="kode_ptkp" id="kode_ptkp" value="<?php echo $r['kode_ptkp'];?>" size="10" maxlength="6" onKeyUp="caps(this)"/>
			</td>
		</tr>
		<tr>
			<td width="15%">KETERANGAN</td>
			<td width="35%">: 
			<input type="text" name="keterangan" id="keterangan" value="<?php echo $r['keterangan'];?>" size="60" maxlength="50" onKeyUp="caps(this)"/>
			</td>
		</tr>
		<tr>
			<td>JUMLAH PTKP</td>
			<td>: 
			<input type="text" name="jumlah_ptkp" id="jumlah_ptkp" value="<?php echo $r['jumlah_ptkp'];?>"  maxlength="10" />
			</td>
		</tr>
		</table>
	</form>
<?php
}else{
	?>
	<form name="formm" id="formm" method="post" action="">
		<table width="100%">
		<input type="hidden" name="id" id="id" value=""/>
		<tr>
			<td width="15%">KODE PTKP</td>
			<td width="35%">: 
			<input type="text" name="kode_ptkp" id="kode_ptkp" value="" size="15" maxlength="6" onKeyUp="caps(this)"/>
			</td>
		</tr>
		<tr>
			<td width="15%">KETERANGAN</td>
			<td width="35%">: 
			<input type="text" name="keterangan" id="keterangan" value="" size="60" maxlength="50" onKeyUp="caps(this)"/>
			</td>
		</tr>
		<tr>
			<td>JUMLAH PTKP</td>
			<td>: 
			<input type="text" name="jumlah_ptkp" id="jumlah_ptkp" value="" maxlength="15"/>
			</td>
		</tr>
		</table>
	</form>
<?php
}
include "../gaji/par_bawah01.php";
?>
