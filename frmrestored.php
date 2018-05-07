<?php include 'h_tetap.php';?>
<script type="text/javascript">
$(document).ready(function(){
	$("#restor").on('submit',(function(e) {
		//$("#data").submit(function(event){
		event.preventDefault();
		var r = confirm("Anda yakin restore data?");
		if (r == false) {
			return false;
		}
		var formData = new FormData($(this)[0]);
		$.ajax({
			url : 'frmrestore.php',
			type: 'post',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#dbackup').html(data);
				$('#loading').hide();
			}
		});
		return false;		
	}));
});	
</script>
<form enctype="multipart/form-data" action="" method="post" name="restor" id="restor">
	<div align="center">
		<p><em>Aplikasi ini digunakan untuk restore data kredit,tabungan,sandi,payment,transaksi ke  database <strong>KSP Nabasa</strong></em> </p>
		<table align="center">
			<tr><td>File Backup Database (*.sql)<input type="file" name="datafile"id="datafile"  size="50" /></td></tr>
			<tr><td align="center">&nbsp;</td></tr>	  
			<tr><td align="center"><input type="submit" name="restore" value="Proses Restore Data"/></td></tr>
		</table>
	</div>
</form>
<div id="dbackup"></div>

