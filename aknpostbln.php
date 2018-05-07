<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/cariglobalakn.js"></script>
<script type="text/javascript" src="jQuery/jquery.ajax-progress.js"></script>
<script type="text/javascript">
var linkcaridata='aknprosesbln.php';
</script>
<div class="ui-widget-content">
	<form id="formsearch" name="formsearch" method="post" action="">
	<table  align="center">
		<tr>
			<td align="right">Bulan</td>
			<td>: 
			 <input type="hidden" id="bln" name="bln" size="5" maxlength="2" value="<?php echo $blnxxx;?>"/>
			 <input type="text" id="bln1" name="bln1" size="15" maxlength="15" value="<?php echo nmbulan($blnxxx);?>"/>
			 <input type="text" id="thn" name="thn" size="6" maxlength="4" value="<?php echo $thnxxx;?>"/>
			</td>
			<td colspan="2" align="center">
			<input type="submit" name="lacak" id="lacak" value="Proses Transaksi Bulanan" class="icon-proses"/>
			</td>
		</tr>
		<tr>
			<td colspan="4" align="center">
			<div id="prog"></div>
			</td>
		</tr>
	</table>
	</form>
</div>
<div id="divPageAkun"></div>
