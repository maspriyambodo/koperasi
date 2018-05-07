BULAN :
<select name="bln" id="bln" style="width: 130px" >
	<?php $bln_x1=$blnxxx;include 'form_bulan.php';?>
</select>
<select name="thn" id="thn"  style="width: 80px" >
	<?php $thn_x1=$thnxxx;include 'form_tahun.php';?>
</select>
<select name="branch" id="branch" style=" width: 200px" >
	<?php include 'parameter/_kcabang.php';?>
</select>
<select name="produk" id="produk" style=" width: 250px" >
	<?php $_produk='';include 'parameter/_produkk.php';?>
</select>