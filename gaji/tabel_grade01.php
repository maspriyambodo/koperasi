<?php include "../gaji/par_atas01.php";?>
<script type="text/javascript" src="../jQuery/formatinput.js"></script>
<script type="text/javascript" src="../java/_tombolback.js"></script>
<script>
$(function(){
	$('#gaji_pokok').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#tunjangan_tkd').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#tunjangan_jabatan').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#tunjangan_perumahan').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#tunjangan_telepon').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#tunjangan_kesehatan').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#tunjangan_lain').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#uang_makan').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#uang_hadir').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#uang_transport').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
});
</script>
<?php
$id=$result->clean_data($_GET['id']);
$hasil=$result->query_x("SELECT id,kode_grade,grade,keterangan,gaji_pokok,tunjangan_tkd,tunjangan_jabatan,tunjangan_perumahan,tunjangan_telepon,tunjangan_kesehatan,tunjangan_lain,uang_makan,uang_hadir,uang_transport FROM $tabel_grade WHERE id='$id' ORDER BY kode_grade LIMIT 1",'');
$count=$result->num($hasil);
if($count>0){
	$r= $result->row($hasil);?>
	<form name="formm" id="formm" method="post" action="">
		<table width="100%">
		<input type="hidden" name="id" id="id" value="<?php echo $r['id'];?>"/>
		<tr>
			<td width="20%">KODE GRADE</td>
			<td width="30%">: 
			<input type="text" name="kode_grade" id="kode_grade" value="<?php echo $r['kode_grade'];?>" size="10" maxlength="4" onKeyUp="caps(this)"/>
			</td>
			<td width="20%">NAMA GRADE</td>
			<td width="30%">: 
			<input type="text" name="keterangan" id="keterangan" value="<?php echo $r['keterangan'];?>" size="30" maxlength="50" onKeyUp="caps(this)"/>
			</td>
		</tr>
		<tr>
			<td>GRADE</td>
			<td>: 
			<input type="text" name="grade" id="grade" value="<?php echo $r['grade'];?>" size="10" maxlength="2" onKeyUp="caps(this)"/>
			</td>
			<td>GAJI POKOK</td>
			<td>: 
			<input type="text" name="gaji_pokok" id="gaji_pokok" value="<?php echo $r['gaji_pokok'];?>" size="20" maxlength="15"/>
			</td>
		</tr>
		<tr>
			<td>TUNJANGAN TKD</td>
			<td>: 
			<input type="text" name="tunjangan_tkd" id="tunjangan_tkd" value="<?php echo $r['tunjangan_tkd'];?>" size="20" maxlength="15"/>
			</td>
			<td>TUNJANGAN JABATAN</td>
			<td>: 
			<input type="text" name="tunjangan_jabatan" id="tunjangan_jabatan" value="<?php echo $r['tunjangan_jabatan'];?>" size="20" maxlength="15"/>
			</td>
		</tr>
		<tr>
			<td>TUNJANGAN PERUMAHAN</td>
			<td>: 
			<input type="text" name="tunjangan_perumahan" id="tunjangan_perumahan" value="<?php echo $r['tunjangan_perumahan'];?>" size="20" maxlength="15"/>
			</td>
			<td>TUNJANGAN TELEPON</td>
			<td>: 
			<input type="text" name="tunjangan_telepon" id="tunjangan_telepon" value="<?php echo $r['tunjangan_telepon'];?>" size="20" maxlength="15"/>
			</td>
		</tr>
		<tr>
			<td>TUNJANGAN KESEHATAN</td>
			<td>: 
			<input type="text" name="tunjangan_kesehatan" id="tunjangan_kesehatan" value="<?php echo $r['tunjangan_kesehatan'];?>" size="20" maxlength="15"/>
			</td>
			<td>TUNJANGAN LAIN</td>
			<td>: 
			<input type="text" name="tunjangan_lain" id="tunjangan_lain" value="<?php echo $r['tunjangan_lain'];?>" size="20" maxlength="15"/>
			</td>
		</tr>
		<tr>
			<td>UANG MAKAN</td>
			<td>: 
			<input type="text" name="uang_makan" id="uang_makan" value="<?php echo $r['uang_makan'];?>" size="20" maxlength="15"/>
			</td>
			<td>UANG HADIR</td>
			<td>: 
			<input type="text" name="uang_hadir" id="uang_hadir" value="<?php echo $r['uang_hadir'];?>" size="20" maxlength="15"/>
			</td>
		</tr>
		<tr>
			<td>UANG TRANSPORT</td>
			<td>: 
			<input type="text" name="uang_transport" id="uang_transport" value="<?php echo $r['uang_transport'];?>" size="20" maxlength="15"/>
			</td>
			<td colspan="4">&nbsp;</td>
		</tr>
		</table>
	</form>
<?php
}else{
	$hasil=$result->query_x("SELECT id FROM $tabel_grade ORDER BY id DESC LIMIT 1",'');
	$count=$result->num($hasil);
	if($count<1){
		$count=1;
	}else{
		$d=$result->row($hasil);
		$count=$d['id'];
		$count++;
	}
	$kode_grade=substr("1000"."".$count,-4);
	?>
	<form name="formm" id="formm" method="post" action="">
		<table width="100%">
		<input type="hidden" name="id" id="id" value=""/>
		<tr>
			<td width="20%">KODE GRADE</td>
			<td width="30%">: 
			<input type="text" name="kode_grade" id="kode_grade" value="<?php echo $kode_grade;?>" size="10" maxlength="4" onKeyUp="caps(this)" readonly/>
			</td>
			<td width="20%">NAMA GRADE</td>
			<td width="30%">: 
			<input type="text" name="keterangan" id="keterangan" value="" size="30" maxlength="50" onKeyUp="caps(this)"/>
			</td>
		</tr>
		<tr>
			<td>GRADE</td>
			<td>: 
			<input type="text" name="grade" id="grade" value="" size="10" maxlength="2" onKeyUp="caps(this)"/>
			</td>
			<td>GAJI POKOK</td>
			<td>: 
			<input type="text" name="gaji_pokok" id="gaji_pokok" value="" size="20" maxlength="15"/>
			</td>
		</tr>
		<tr>
			<td>TUNJANGAN TKD</td>
			<td>: 
			<input type="text" name="tunjangan_tkd" id="tunjangan_tkd" value="" size="20" maxlength="15"/>
			</td>
			<td>TUNJANGAN JABATAN</td>
			<td>: 
			<input type="text" name="tunjangan_jabatan" id="tunjangan_jabatan" value="" size="20" maxlength="15"/>
			</td>
		</tr>
		<tr>
			<td>TUNJANGAN PERUMAHAN</td>
			<td>: 
			<input type="text" name="tunjangan_perumahan" id="tunjangan_perumahan" value="" size="20" maxlength="15"/>
			</td>
			<td>TUNJANGAN TELEPON</td>
			<td>: 
			<input type="text" name="tunjangan_telepon" id="tunjangan_telepon" value="" size="20" maxlength="15"/>
			</td>
		</tr>
		<tr>
			<td>TUNJANGAN KESEHATAN</td>
			<td>: 
			<input type="text" name="tunjangan_kesehatan" id="tunjangan_kesehatan" value="" size="20" maxlength="15"/>
			</td>
			<td>TUNJANGAN LAIN</td>
			<td>: 
			<input type="text" name="tunjangan_lain" id="tunjangan_lain" value="" size="20" maxlength="15"/>
			</td>
		</tr>
		<tr>
			<td>UANG MAKAN</td>
			<td>: 
			<input type="text" name="uang_makan" id="uang_makan" value="" size="20" maxlength="15"/>
			</td>
			<td>UANG HADIR</td>
			<td>: 
			<input type="text" name="uang_hadir" id="uang_hadir" value="" size="20" maxlength="15"/>
			</td>
		</tr>
		<tr>
			<td>UANG TRANSPORT</td>
			<td>: 
			<input type="text" name="uang_transport" id="uang_transport" value="" size="20" maxlength="15"/>
			</td>
			<td colspan="4">&nbsp;</td>
		</tr>
		</table>
	</form>
<?php
}
include "../gaji/par_bawah01.php";
?>