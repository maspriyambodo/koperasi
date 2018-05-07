<?php include "h_atas.php";?>
<script type="text/javascript" src="java/_tambah_icon.js"></script>
<script type="text/javascript">
	var url1="inventaris_06a.php";
</script>
<div class="ui-widget-content">
	<form id="formsearch" name="formsearch" method="post" action="">
		<table align="center">
			<tr><td>BULAN :
			<input type="hidden" name="bln" id="bln" value="<?php echo $blnxxx ;?>" readonly />
			<input type="text" name="nmbulan" id="nmbulan" value="<?php echo nmbulan($blnxxx) ;?>" readonly />
			<input type="text" name="thn" id="thn" value="<?php echo $thnxxx;?>" readonly />
			<button type="button" id="proses_data">Proser Nominatif Inventaris</button>
			</td></tr>
		</table>
	</form>
</div>
<div ID="divPageHasil"></div>