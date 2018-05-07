<?php include "h_atas.php";?>
<script type="text/javascript" src="java/_tambah_icon.js"></script>
<script type="text/javascript">
	var url1="proses_nominatif11.php";
	function loadLayar(){
		var bln= $("#bln").val();
		var thn= $("#thn").val();
		$.ajax({
			type: "GET",
			url	: "proses_nominatif22.php",
			data: 'bln='+bln+'&thn='+thn,
			success:function(data){
				$('#divPageHasil').html(data);
			}
		});
	}
</script>
<div class="ui-widget-content" align="center">
	<form id="formsearch" name="formsearch" method="post" action="">
		BULAN :
		<input type="hidden" name="bln" id="bln" value="<?php echo $blnxxx ;?>" readonly />
		<input type="text" name="nmbulan" id="nmbulan" value="<?php echo nmbulan($blnxxx) ;?>" readonly />
		<input type="text" name="thn" id="thn" value="<?php echo $thnxxx ;?>" readonly />
		<button type="button" id="proses_data">Proser Nominatif Kredit</button>
	</form>
</div>
<div ID="divPageHasil"></div>