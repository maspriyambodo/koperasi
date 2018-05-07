TANGGAL
<input type="text" id="tgl1" size="15" maxlength="10" value="<?php echo $t;?>"/>
S/D
<input type="text" id="tgl2" size="15" maxlength="10" value="<?php echo $t;?>"/>
<select name="branch" id="branch">
	<?php include 'dist/_kcabang.php';?>
</select>
<select name="kkbayar" id="kkbayar">
	<?php include 'dist/_userid.php';?>
</select>