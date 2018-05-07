<?php include 'h.php';?>
<script type="text/javascript" src="java/hanya_angka.js"></script>
<script TYPE="text/javascript">
$(document).ready(function(){
	$("input#nama").focus();
	jQuery(function($) {$("#tglsk").mask("99-99-9999");});
	jQuery(function($) {$("#tglktp").mask("99-99-9999");});
});
</script>
<?php 
$id=$result->c_d($_GET['id']);
$hasil=$result->query_x1("SELECT * FROM $tabel_sales WHERE id='$id' ORDER BY idsales");
if($result->num($hasil)!=0){
	$r=$result->row($hasil);$id=$r['ID'];$idsales=$r['IDSALES'];$nama=$r['NAMA'];$branch=$r['BRANCH'];$alamat=$r['ALAMAT'];$kelurahan=$r['KELURAHAN'];$kecamatan=$r['KECAMATAN'];$kabupaten=$r['KABUPATEN'];$noktp=$r['NOKTP'];$tglktp=$r['TGLKTP'];$notlp=$r['NOTLP'];$nosk=$r['NOSK'];$tglsk=$r['TGLMASUK'];$nama_bank_sales=$r['NAMA_BANK_SALES'];$rekening_bank_sales=$r['REKENING_BANK_SALES'];
}else{
	$hasil=$result->res("SELECT MAX(idsales) AS kode FROM $tabel_sales");
	$datamax= $result->row($hasil);$makscif = $datamax['kode'];$makscif++;$idsales=substr("10000"."".$makscif,-5);$id='';$nama='';$branch=$kcabang;$alamat='';$kelurahan='';$kecamatan='';$kabupaten='';$noktp='';$tglktp='';$notlp='';$nosk='';$tglsk='';$nama_bank_sales='';$rekening_bank_sales='';
}
?>
<div class="ui-widget-content" align="center">
	<form name="formm" id="formm" method="post" action="">
		<table width="100%">
		<input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>
		<tr>
			<td>Kode Sales</td>
			<td>: <input type="text" name="idsales" id="idsales" value="<?php echo $idsales;?>" maxlength="5" readonly size="10"/></td>
		</tr>
		<tr>
			<td>Nama Sales</td>
			<td>: <input type="text" name="nama" id="nama" value="<?php echo $nama;?>" size="45" maxlength="35" onKeyUp="caps(this)"/></td>
		</tr>
		<tr>
			<td>Kode Cabang</td><td>:
				<select name="branch" id="branch">
					<?php $hasil = $result->res("select kode,nama from $tabel_kantor order by kode");
					while ($data = $result->row($hasil)) {
						if ($branch == $data['kode']) 
							echo "<option value=\"".$data['kode']."\" selected>".$data['nama']."</option>";
						else
							 echo "<option value=\"".$data['kode']."\">".$data['nama']."</option>";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>: <input type="text" name="alamat" id="alamat" size="45" maxlength="40" value="<?php echo $alamat;?>" onKeyUp="caps(this)"/></td>
		</tr>
		<tr>
			<td>Kelurahan</td>
			<td>: <input type="text" name="kelurahan" id="kelurahan" size="45" maxlength="40" value="<?php echo $kelurahan;?>" onKeyUp="caps(this)"/></td>
		</tr>
		<tr>
			<td>Kecamatan</td>
			<td>: <input type="text" name="kecamatan" id="kecamatan" size="45" maxlength="40" value="<?php echo $kecamatan;?>" onKeyUp="caps(this)"/></td>
		</tr>
		<tr>
			<td>Kabupaten</td><td>: 
			<input name="kabupaten" type="text" id="kabupaten" size="45" maxlength="40" class="kabupaten" value="<?php echo $kabupaten;?>" onKeyUp="caps(this)"/></td>
		</tr>
		<tr>
			<td>No KTP / Tgl KTP</td><td>: 
			<input name="noktp" type="text" id="noktp" size="45" maxlength="20" value="<?php echo $noktp;?>" onkeyup="caps(this)"/>
			<input name="tglktp" type="text" id="tglktp" maxlength="10" value="<?php echo $tglktp;?>"/></td>
		</tr>
		<tr>
			<td>No SK / Tgl SK</td><td>: 
			<input type="text" name="nosk" id="nosk" value="<?php echo $nosk;?>" maxlength="25" size="45" onkeyup="caps(this)"/>
			<input type="text" name="tglsk" id="tglsk" value="<?php echo $tglsk;?>" maxlength="10"/></td>		
		</tr>
		<tr>	
			<td>Rekening Bank</td>
			<td>: <input type="text" name="rekening_bank_sales" id="rekening_bank_sales" value="<?php echo $rekening_bank_sales;?>" maxlength="25" size="45" onkeypress="return hanyaAngka(event, false)"/></td>
		</tr>
		<tr>	
			<td>Nama Bank</td>
			<td>: <input type="text" name="nama_bank_sales" id="nama_bank_sales" value="<?php echo $nama_bank_sales;?>" maxlength="40" size="45" onKeyUp="caps(this)"/></td>
		</tr>
		<tr>		
			<td>No Telepon</td>
			<td>: <input type="text" name="notlp" id="notlp" value="<?php echo $notlp;?>" maxlength="12" onkeypress="return hanyaAngka(event, false)" size="20"/></td>
		</tr>
		</table>
	</form>
</div>