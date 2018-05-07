<?php include 'auth.php';?>
<script type="text/javascript" src="java/_tambah_icon.js"></script>
<script TYPE="text/javascript">
	$("input#nonas").focus();
	url1='infotabp.php';
	url2="infotabf.php";
	function editsaldo(id) {
		var dataString='id='+id;
		$.ajax({
			type: "GET",
			url	: url2,
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#koreksisaldo').html(data); 
				$('#loading').hide();
				$("#koreksisaldo").dialog({
					title :"Koreksi Saldo Nominatif Tabungan",
					height: 400,
					width : 600,
					modal : true ,
					buttons: { 
						Simpan: function() {
							simpan();
							$(this).dialog('close');
							$('#loading').hide();
						},
						close: function() {
							$(this).dialog('close');
						}
					}
				})
			}
		});
		return false;
	}
	function simpan() {
		$.ajax({
			type: 'GET',
			url : 'infotabs.php',
			data: $('#editmasuk').serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				alert(data);
				var tes = data.search("Sukses");
				if(tes!=0){
					$('#loading').hide();
					return false;
				}
			}
		});	
	}
</script>
<div class="ui-widget-content">
	<form id="formsearch" name="formsearch" method="post" action="">
		&nbsp;KRITERIA : 
		<input type="text" name="nonas" id="nonas" size="40"  maxlength="35" onKeyUp="caps(this)"/>
		<button type="button" id="lacak_data">Cari Data</button>
	</form>
</div>
<div ID="divPageHasil"></div>
<div id="koreksisaldo" style="display: none"></div>