<?php include "h_atas.php";?>
<script type="text/javascript" src="java/_tambah_icon.js"></script>
<script TYPE="text/javascript">	
	var url1="proses_bunga11.php";
</script>
<?php
$bln=date('m',strtotime($tanggal));
$thn=date('Y',strtotime($tanggal));
$bln1=intval($bln);
$tgl=tglAkhirBulan($thn,$bln1);
?>
<div class="ui-widget-content" align="center">
	<form id="formsearch" name="formsearch" method="post" action="">
		BULAN :
		<input type="hidden" name="tgl" id="tgl" value="<?php echo $tgl ;?>" readonly />
		<input type="hidden" name="bln" id="bln" value="<?php echo $blnxxx ;?>" readonly />
		<input type="text" name="nmbulan" id="nmbulan" value="<?php echo nmbulan($blnxxx) ;?>" readonly />
		<input type="text" name="thn" id="thn" value="<?php echo $thnxxx ;?>" readonly />
		<button type="button" id="proses_data">Proses Hitung Bunga</button>
	</form>
</div>
<div ID="divPageHasil"></div>