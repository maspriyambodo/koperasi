<?php include "../gaji/par_atas01.php";?>
<script type="text/javascript" src="../jQuery/formatinput.js"></script>
<script type="text/javascript" src="../java/_tombolback.js"></script>
<?php
$id=$result->clean_data($_GET['id']);
$hasil=$result->query_x("SELECT id,kode_organisasi,nama_organisasi FROM $tabel_organisasi WHERE id='$id' ORDER BY kode_organisasi LIMIT 1",'');
$count=$result->num($hasil);
if($count>0){
	$r= $result->row($hasil);?>
	<form name="formm" id="formm" method="post" action="">
		<table width="100%">
		<input type="hidden" name="id" id="id" value="<?php echo $r['id'];?>"/>
		<tr>
			<td width="15%">KODE DIREKTORAT</td>
			<td width="35%">: 
			<input type="text" name="kode_organisasi" id="kode_organisasi" value="<?php echo $r['kode_organisasi'];?>" size="10" maxlength="4" onKeyUp="caps(this)"/>
			</td>
		</tr>
		<tr>
			<td width="15%">NAMA ORGANISASI</td>
			<td width="35%">: 
			<input type="text" name="nama_organisasi" id="nama_organisasi" value="<?php echo $r['nama_organisasi'];?>" size="60" maxlength="50" onKeyUp="caps(this)"/>
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
			<td width="15%">KODE ORGANISASI</td>
			<td width="35%">: 
			<input type="text" name="kode_organisasi" id="kode_organisasi" value="" size="10" maxlength="4" onKeyUp="caps(this)"/>
			</td>
		</tr>
		<tr>
			<td width="15%">NAMA ORGANISASI</td>
			<td width="35%">: 
			<input type="text" name="nama_organisasi" id="nama_organisasi" value="" size="60" maxlength="50" onKeyUp="caps(this)"/>
			</td>
		</tr>
		</table>
	</form>
<?php
}
include "../gaji/par_bawah01.php";
?>