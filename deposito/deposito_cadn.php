<?php include 'auth.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
		<title>Pencarian Data Kredit</title>
		<script type="text/javascript" src="js/global.js"></script>
		<script TYPE="text/javascript">
			$(document).ready(function(){
				$.ajax({
					type: 'POST',
					url: 'deposito_cadn_form.php',
					data: $(this).serialize(),
					beforeSend: function () {
						$('#loading').show();
					},
					success: function (data) {
						$("#divPageCadn").html(data);
						$('#loading').hide();
					}
				});
				return false;
			});
		</script>
	</head>
	<body>
		<div id="divPageCadn"></div>
	</body>
</html>