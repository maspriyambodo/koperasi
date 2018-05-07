<?php include 'h_tetap.php';?>
<script TYPE="text/javascript">
function lptMethod(id) {
	var dataString='id='+id;
	var url='deposito_cetaklpt.php?'+dataString;
	newwindow=window.open(url,'Cetak','height=600,width=1000');
	if (window.focus) {newwindow.focus()};
	return false;
};
</script>
<?php include 'deposito_page.php';?>