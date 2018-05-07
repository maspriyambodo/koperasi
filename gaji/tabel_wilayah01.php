<?php include "../gaji/par_atas01.php";?>
<script type="text/javascript" src="../jQuery/formatinput.js"></script>
<script type="text/javascript" src="../java/_tombolback.js"></script>
<?php
$id=$result->clean_data($_GET['id']);
$hasil=$result->query_x("SELECT id,kode_wilayah,kode_organisasi,nama_wilayah FROM $tabel_wilayah WHERE id='$id' ORDER BY kode_wilayah LIMIT 1",'');
$count=$result->num($hasil);
if($count>0){
	$r= $result->row($hasil);?>
	<form name="formm" id="formm" method="post" action="">
		<table width="100%">
		<input type="hidden" name="id" id="id" value="<?php echo $r['id'];?>"/>
		<tr>
			<td width="15%">KODE WILAYAH</td>
			<td width="35%">: 
			<input type="text" name="kode_wilayah" id="kode_wilayah" value="<?php echo $r['kode_wilayah'];?>" size="10" maxlength="4" onKeyUp="caps(this)"/>
			</td>
		</tr>
		<tr>
			<td width="15%">NAMA WILAYAH</td>
			<td width="35%">: 
			<input type="text" name="nama_wilayah" id="nama_wilayah" value="<?php echo $r['nama_wilayah'];?>" size="60" maxlength="50" onKeyUp="caps(this)"/>
			</td>
		</tr>
		<tr>
			<td width="15%">KODE DIREKTORAT</td>
			<td width="35%">: 
				<select name="kode_organisasi" id="kode_organisasi" class="combobox">
					<option value="">Pilihan</option>
					<?php
						$kode_organisasi=$r['kode_organisasi'];
						include '../gaji/par_direktorat.php';
					?>
				</select>
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
			<td width="15%">KODE WILAYAH</td>
			<td width="35%">: 
			<input type="text" name="kode_wilayah" id="kode_wilayah" value="" size="10" maxlength="4" onKeyUp="caps(this)"/>
			</td>
		</tr>
		<tr>
			<td width="15%">NAMA WILAYAH</td>
			<td width="35%">: 
			<input type="text" name="nama_wilayah" id="nama_wilayah" value="" size="60" maxlength="50" onKeyUp="caps(this)"/>
			</td>
		</tr>
		<tr>
			<td width="15%">KODE DIREKTORAT</td>
			<td width="35%">: 
				<select name="kode_organisasi" id="kode_organisasi" class="combobox">
					<option value="">Pilihan</option>
					<?php
						$kode_organisasi='';
						include '../gaji/par_direktorat.php';
					?>
				</select>
			</td>
		</tr>
		</table>
	</form>
<?php
}
include "../gaji/par_bawah01.php";
?>
