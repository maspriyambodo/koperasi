<?php include 'h_tetap.php';?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<script src="jQuery/jquery.ajax-progress.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('input[name=backup]').click(function(){
	var r = confirm("Anda yakin data di backup?");
	if (r == false) {
		return false;
	}
	$('#prog').progressbar({ value: 0 });
	$.ajax({
		url : 'frmbackupp.php',
		type: "GET",
		data: '',
		beforeSend: function () {
			$('#loading').show();
		},
		success:function(data){
			$('#dbackup').html(data);
			$('#loading').hide();
		},
        progress: function(e) {
			if(e.lengthComputable) {
			    var pct = (e.loaded / e.total) * 100;
			    $('#prog')
			        .progressbar('option', 'value', pct)
			        .children('.ui-progressbar-value')
			        .html(pct.toPrecision(3) + '%')
			        .css('display', 'block');
			} else {
			    console.warn('Content Length not reported!');
			}
		}
	});
	return false;
});
});
</script>
<form action="" method="post" name="postform">
	<div align="center">
	<p><em>Aplikasi ini digunakan untuk backup data kredit,tabungan,akuntansi,payment,transaksi,asuransi yang ada didalam database <strong>KSP Nabasa</strong></em> </p>
	<input type="submit" name="backup" value="Proses Backup Data" />
	</div>
</form>
<div id="prog"></div>
<div id="dbackup"></div>

