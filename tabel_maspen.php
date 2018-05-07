<?php include 'h_tetap.php';?>
<script type="text/javascript">
	$("input#nonas").focus();
	url1="tabel_maspenx.php";
	$(document).ready(function(){
		$('#formsearch').submit(function () {
			$.ajax({
				type: 'POST',
				url : url1,
				data: $(this).serialize()+'&p=1',
				beforeSend: function () {
					$('#loading').show();
				},
				success: function (data) {
					$("#divPageMaspen").html(data);
					$('#loading').hide();
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert('Error: ' + xhr.status || ' - ' || thrownError);
				}
			});
			return false;
		});
		$('#lacak_data').click(function () {
			$.ajax({
				type: 'POST',
				url	: url1,
				data: $('#formsearch').serialize()+'&p=1',
				beforeSend: function () {
					$('#loading').show();
				},
				success: function (data) {
					$("#divPageMaspen").html(data);
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
	$(function() {
		$("#lacak_data").button({
			text: true,
			icons: {
				primary: 'ui-icon-search'
			}
		});
	});
</script>
<div class="ui-widget-content">
	<form id="formsearch" name="formsearch" method="post" action="">
		&nbsp;
		KRITERIA : <input type="text" name="nonas" id="nonas" size="40" maxlength="35" onKeyUp="caps(this)"/>
		<button type="button" id="lacak_data">Cari Data</button>
	</form>
</div>
<div ID="divPageMaspen" style="padding-top:3px;width: 100%;height: 500px;overflow: auto;"></div>