<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/cariglobalakn.js"></script>
<script type="text/javascript">
var linkcaridata='aknprosesthn.php';
</script>
<div class="ui-widget-content">
	<form id="formsearch" name="formsearch" method="post" action="">
	<table  align="center">
		<tr>
			<td align="right">Tahun</td>
			<td>: 
			 <input type="text" id="thn" name="thn" size="6" maxlength="4" value="<?php echo $thnxxx;?>" readonly/>
			</td>
			<td colspan="2" align="center">
			<input type="submit" name="lacak" id="lacak" value="Proses Transaksi Tahunan" class="icon-proses"/>
			</td>
		</tr>
	</table>
	</form>
</div>
<div id="divPageAkun"></div>
