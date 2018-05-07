<?php include "h_tetap.php";?>
<script type="text/javascript" src="java/_tambah_icon.js"></script>
<script type="text/javascript">
	var url1="rencana_susulanyy.php";
</script>
<?php
$bln++;
if($bln>12){
	$bln=1; $thn++;
	$bln=substr("00"."".$bln,-2);
}else{
	$bln=substr("00"."".$bln,-2);
}
?>
<div class="ui-widget-content" align="center">
<form id="formsearch" name="formsearch" method="post" action="">
	BULAN :
	<input type="hidden" name="bln" id="bln" value="<?php echo $bln ;?>" size="3" readonly />
	<input type="text" name="nmbulan" id="nmbulan" value="<?php echo nmbulan($bln) ;?>" readonly/>
	<input type="text" name="thn" id="thn" value="<?php echo $thn ;?>" size="5"  readonly />
	<button type="button" id="proses_data">Proser Rencana Tagihan Susulan</button>
</form>
</div>
<div ID="divPageHasil"></div>