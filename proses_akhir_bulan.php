<?php include 'auth.php';?>
<script TYPE="text/javascript">	
	$(document).ready(function(){
		$('#proses_data').click(function () {
			var r = confirm("Closing Akhir Bulan...?");
			if (r == false) {
				return false;
			}
			var tgl1=$("#tgl1").val();
			var tgl2=$("#tgl2").val();
			if(tgl2.length==0){
				alert('Tanggal Selanjutnya Tidak Boleh Kososng');
				$("#tgl2").focus();
				return false;
			}
			if(tgl2<=tgl1){
				alert('Tanggal Selanjutnya Lebih Kecil Tanggal Hari Ini');
				$("#tgl2").focus();
				return false;
			}
			$.ajax({
				type : "GET",
				url	 : "proses_akhir_bulanp.php",
				data : 'tgl1='+tgl1+'&tgl2='+tgl2,
				beforeSend: function(){
					$('#loading').show();
				},
				success: function(data){
					alert(data);
					if(data=='Sukses'){
						document.location.href = "logout.php";
					}
					$('#loading').hide();
				}
			});
			return false;
		});
		$(function() {
			$( "#tgl1" ).datepicker({
				dateFormat:"yy-mm-dd",
			});
			$( "#tgl2" ).datepicker({
				dateFormat:"yy-mm-dd",
			});
			$("#proses_data").button({
				text: true,
				icons: {
					primary: 'ui-icon-key'
				}
			});
		});
	});
</script>
<div class="ui-widget-content" align="center">
<form id="formsearch" name="formsearch" method="post" action="">
	TANGGAL HARI INI : <input type="text" name="tgl1" id="tgl1" value="<?php echo date_sql($tanggal);?>" readonly />
	TANGGAL SELANJUTNYA : <input type="text" name="tgl2" id="tgl2" value="<?php echo date('Y-m-d',strtotime($tanggal."+1 day"));?>"/>
	<button id="proses_data">Closing Akhir Bulan</button>
</form>
</div>
<div ID="divPageData"></div>