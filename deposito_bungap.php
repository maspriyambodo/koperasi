<?php include 'h.php';?>
<script type="text/javascript" src="java/add_method.js"></script>
<script TYPE="text/javascript">
	var hal1='lap_deposito/daftar_bunga01.php?p=1';var confirm1='Pilihan Data Sudah Benar...?';
	function PdfMethod(id) {
		var dataString='id='+id;
		var cetak="lap_deposito/daftar_bunga01.php?p=2";
		var url=cetak+'&'+dataString;
		newwindow=window.open(url,'Cetak','height=600,width=1000');
		if (window.focus) {newwindow.focus()};
		return false;
	};
</script>
<?php include 'deposito_page.php';?>