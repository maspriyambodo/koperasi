<?php include 'auth.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<script type="text/javascript" src="js/global.js"></script>
<script type="text/javascript" src="jQuery/formatinput.js"></script>
<script TYPE="text/javascript">
$(document).ready(function(){
	$("input#bloterid").focus();
	$('#formsearch').submit(function () {
		$.ajax({
			url: 'bloter/tbltellerinf.php',
			type: "POST",
			data: $(this).serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#divPageData').html(data);
				$('#loading').hide();
			}
		});
		return false;
	});
	$("#lookups").lookupbox({
		title: 'Daftar ID Bloter',
		url: 'lookupb.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=bloterid]').val(data.bloterid);
		},
		tableHeader: ['Branch','Userid','Bloterid','nama','Saldo']
	});
});
</script>
</head>
<body>
<div class="ui-widget-content">
<form id="formsearch" name="formsearch" method="post" action="">
	<table  align="center">
		<tr>	<td>ID BLOTER CASH OUT</td>
			<td>: 
				<input type="text" name="bloterid" id="bloterid" size="10" maxlength="6" required /> 
				<input type="button" value="" id="lookups" class="icon-filter"/>
				<input type="submit" name="lacak" id="lacak" value="Cari Data" class="icon-search"/>
			</td>
		</tr>
	</table>
</form>
</div>
<div id="divPageData"></div>
</body>
</html>