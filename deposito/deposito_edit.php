<?php include 'auth.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
		<title>Pencarian Data Kredit</title>
		<script type="text/javascript" src="js/carimaintdepo.js"></script>
		<script type="text/javascript" src="js/global.js"></script>
		<script TYPE="text/javascript">
			var linkcaridata='deposito_edit_form.php';
			$(document).ready(function(){
				$("#lookups").lookupbox({
					title: 'Daftar Rekening',
					url: 'lookupdepo.php?chars=',
					imgLoader: '<img src="images/load.gif">',
					onItemSelected: function(data)	{
						$('input[name=nomor_bilyet]').val(data.nomor_bilyet);
					},
					tableHeader: ['Nomor Nasabah','Nomor Bilyet','Nama']
				});
			});
		</script>
	</head>
	<body>
		<div class="ui-widget-content" align="center">
			<form id="formsearch" name="formsearch" method="post" action="">
				NO NASABAH : 
				<input  type="text" name="nomor_bilyet" id="nomor_bilyet" size="10"  maxlength="6" placeholder="No Nasabah" onKeyUp="caps(this)" autocomplete="off"/>
				<input type="button" value="" id="lookups" class="icon-filter"/>
				<input type="submit" name="lacak" id="lacak" value="Cari Data" class="icon-search"/>
			</form>
		</div>
		<div ID="divPageData"></div>
	</body>
</html>