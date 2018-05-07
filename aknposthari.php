<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/cariglobalakn.js"></script>
<script type="text/javascript" src="jQuery/jquery.ajax-progress.js"></script>
<script type="text/javascript">
var linkcaridata='aknproseshari.php';
$(document).ready(function(e) {
	$(function() {
		$( "#tgl1" ).datepicker({
			dateFormat:"dd-mm-yy",
		});
	});
});
</script>
<div class="ui-widget-content">
	<form id="formsearch" name="formsearch" method="post" action="">
	<table  align="center">
		<tr>
			<td align="right">Tanggal</td>
			<td>: <input type="text" id="tgl1" name="tgl1" size="20" maxlength="10" value="<?php echo $tanggal;?>"/></td>
			<td>	<input type="submit" name="lacak" id="lacak" value="Proses Transaksi Harian" class="icon-proses"/></td>
		</tr>
		<tr>
			<td colspan="3" align="center">
			<div id="prog"></div>
			</td>
		</tr>
	</table>
	</form>
</div>
<div id="divPageAkun"></div>