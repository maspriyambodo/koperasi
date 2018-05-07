<?php include 'h.php';?>
<script TYPE="text/javascript">
var url1='deposito_cadnposta.php';
$(document).ready(function(){
	$('#formsearch').submit(function () {
		var r = confirm("Anda yakin Proses Di Lanjutkan...?");
		if (r == false) {
			return false;
		}
		$.ajax({
			type: 'POST',
			url	: url1,
			data: $(this).serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				$("#divPageData").html(data);
				$('#loading').hide();
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert('Error: ' + xhr.status || ' - ' || thrownError);
				$('#loading').hide();
			}
		});
		return false;
	});
});
</script>
<div class="ui-widget-content" align="center">
<form id="formsearch" name="formsearch" method="post" action="">
	BULAN 
	<select name="bln" id="bln" style="width: 150px">
		<?php $bln_x1=$blnxxx+1;include 'form_bulan.php';?>
	</select>
	<select name="thn" id="thn" style="width: 100px">
		<?php $thn_x1=$thnxxx+1;include 'form_tahun.php';?>
	</select>
	<input type="submit" name="lacak" id="lacak" value="Posting Cadangan Bunga Bulanan" class="icon-proses"/>
</form>
</div>
<div id="divPageData"></div>