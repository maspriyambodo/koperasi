<?php include "h_tetap.php";?>
<script type="text/javascript" src="jQuery/jQuery.print.js"></script>
<script TYPE="text/javascript">
	$("#btnPrint").button().on( "click", function(){
		$("#divSimulasi").print({
			//Use Global styles
			globalStyles : false,
			//Add link with attrbute media=print
			mediaPrint : false,
			//Custom stylesheet
			//stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
			//Print in a hidden iframe
			iframe : true,
			//Don't print this
			noPrintSelector : ".avoid-this",
			//Add this at top
			prepend : "Informasi Sisa Pelunasan Kredit<br/>",
			//Add this on bottom
			append : "<br/>Print Informasi Sisa Pelunasan Kredit"
		});
	});
	function jadwall() {
		//alert('tes');
		norek=$("#norek").val();
		$("#jadwal").dialog({
			title:"Jadwal Angsuran",
			height: 500,
			width: 900,
			modal: true ,
			buttons: { 
				close: function() {
					$(this).dialog('close'); 
				} 
			} 
		})
		return false;
	}
</script>
<button id="btnPrint">Print</button>
<div id="divSimulasi" style="font-family: Arial;font-size: 9pt;">
<?php include '_pelunasany.php';?>
<table width="100%" class="table">
	<tr>
		<th colspan="4" class="ui-state-highlight">DATA DEBITUR</th>
	</tr>
	<?php include '_headerx.php';?>
	<tr>
		<td colspan="4" align="center" class="ui-state-highlight">
			<strong>DATA PELUNASAN PINJAMAN - <a style="cursor: pointer;" href="" onclick="jadwall();return false;">PAYMENT SCEDULE</a></strong>
		</td>
	</tr>
	<tr>
		<td align="right" colspan="2">POKOK PINJAMAN :</td>
		<td align="right"><?php echo formatRupiah($saldoa);?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="right" colspan="2">BUNGA PINJAMAN :</td>
		<td align="right"><?php echo formatRupiah($blunas); ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="right" colspan="2">ADM PINJAMAN :</td>
		<td align="right"><?php echo formatRupiah($alunas);?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="right" colspan="2">JUMLAH ANGSURAN :</td>
		<td align="right" style="background-color: #02e3fd"><?php echo formatRupiah($alunas+$blunas+$saldoa);?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="right" colspan="2">DENDA ANGSURAN :</td>
		<td align="right"><?php echo formatRupiah($bungakk);?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="right" colspan="2">FINALTY PELUNASAN :</td>
		<td align="right"><?php echo formatRupiah($flunas);?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="right" colspan="2">TOTAL PEMBAYARAN :</td>
		<td align="right" style="background-color: #02e3fd"><?php echo formatRupiah($jumlunas);?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="right">Terbilang :</td>
		<td colspan="3"><?php echo terbilang($jumlunas);?> rupiah</td>
	</tr>
</table>
</div>
<div id="jadwal" style="display: none">
<?php include 'payment_scedule.php';?>
</div>