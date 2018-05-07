BRANCH : 
<input type="text" name="branch" id="branch" size="4" maxlength="4" value="<?php echo $kcabang; ?>" title="Kode Cabang"/>
BULAN : 
<select name="bln" id="bln" style="width: 130px" title="Bulan Laporan">
	<?php $bln_x1=$blnxxx;include './scr/form_bulan.php';?>
</select>
<select name="thn" id="thn" style="width: 80px" title="Tahun Laporan">
	<?php $thn_x1=$thnxxx;include './scr/form_tahun.php';?>
</select>
PRODUK : 
<select name="produk" id="produk" title="Produk Kredit">
	<?php include './scr/produk_kredit.php';?>
</select>