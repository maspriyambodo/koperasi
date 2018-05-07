<?php include 'auth.php';?>
<script type="text/javascript" src="java/_tambah_icon.js"></script>
<script TYPE="text/javascript">
	$("input#nonas").focus();
	url1='daftar_kredit11.php';
	url2='daftar_kredit12.php'
	function showEdit(id) {
		$.ajax({
			url : url2,
			type: "GET",
			data: 'id='+id,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function(data){ 
				$('#dialog').html(data); 
				$('#loading').hide();
				$("#dialog").dialog({
					title :"View Details",
					height: 550,
					width : 1000,
					modal : true,
					buttons:{
						close: function (){
							$(this).dialog('close');
						}  
					}
				});
			}
		});
	}
	function showPayment(id) {
		$.ajax({
			url : 'thistorydd.php',
			type: "GET",
			data: 'id='+id,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function(data){ 
				$('#dialog').html(data); 
				$('#loading').hide();
				$("#dialog").dialog({
					title :"View Details",
					height: 600,
					width : 1000,
					modal : true,
					buttons:{
						close: function (){
							$(this).dialog('close');
						}  
					}
				});
			}
		});
	}
</script>
<div class="ui-widget-content">
	<form id="formsearch" name="formsearch" method="post" action="">
		&nbsp;
		KRITERIA : 
		<input type="text" name="nonas" id="nonas" size="40"  maxlength="35" onKeyUp="caps(this)"/>
		<button type="button" id="lacak_data">Cari Data</button>
	</form>
</div>
<div ID="divPageHasil"></div>
<div id="dialog" style="display: none"></div>