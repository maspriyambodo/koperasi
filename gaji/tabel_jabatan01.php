<?php include "../gaji/par_atas01.php";?>
<script type="text/javascript" src="../jQuery/formatinput.js"></script>
<script type="text/javascript" src="../java/_tombolback.js"></script>
<?php
$id=$result->clean_data($_GET['id']);
$hasil=$result->query_x("SELECT id,kode_jabatan,nama_jabatan FROM $tabel_jabatan WHERE id='$id' ORDER BY kode_jabatan LIMIT 1",'');
$count=$result->num($hasil);
if($count>0){
	$r= $result->row($hasil);?>
	<form name="formm" id="formm" method="post" action="">
		<table width="100%">
		<input type="hidden" name="id" id="id" value="<?php echo $r['id'];?>"/>
		<tr>
			<td width="15%">KODE JABATAN</td>
			<td width="35%">: 
			<input type="text" name="kode_jabatan" id="kode_jabatan" value="<?php echo $r['kode_jabatan'];?>" size="10" maxlength="2" onKeyUp="caps(this)"/>
			</td>
		</tr>
		<tr>
			<td width="15%">NAMA JABATAN</td>
			<td width="35%">: 
			<input type="text" name="nama_jabatan" id="nama_jabatan" value="<?php echo $r['nama_jabatan'];?>" size="60" maxlength="50" onKeyUp="caps(this)"/>
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
			<td width="15%">KODE JABATAN</td>
			<td width="35%">: 
			<input type="text" name="kode_jabatan" id="kode_jabatan" value="" size="10" maxlength="2" onKeyUp="caps(this)"/>
			</td>
		</tr>
		<tr>
			<td width="15%">NAMA JABATAN</td>
			<td width="35%">: 
			<input type="text" name="nama_jabatan" id="nama_jabatan" value="" size="60" maxlength="50" onKeyUp="caps(this)"/>
			</td>
		</tr>
		</table>
	</form>
<?php
}
include "../gaji/par_bawah01.php";
?>
