TANGGAL
<input type="text" id="tgl1" size="15" maxlength="10" value="<?php echo $t;?>"/>
S/D
<input type="text" id="tgl2" size="15" maxlength="10" value="<?php echo $t;?>"/>
<select name="branch" id="branch">
	<?php include 'parameter/_kcabang.php';?>
</select>
<select name="produk" id="produk">
	<?php $_produk='';include 'parameter/_produkd.php';?>
</select>