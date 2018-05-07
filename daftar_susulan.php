<?php $par_atas='Laporan Pinjaman';include 'h.php';?>
<script type="text/javascript" src="java/forml_aporan.js"></script>
<script type="text/javascript" src="jQuery/combobox.js"></script>
<script type="text/javascript">
	var url1="tagihan/rtagihanl.php?p=1";
	var url2="tagihan/rtagihanl.php?p=2";
	var url3="tagihan/rtagihanl.php?p=3";
	var url4="tagihan/rtagihanr.php?p=1";
	var url5="tagihan/rtagihanr.php?p=2";
	var url6="tagihan/rtagihanr.php?p=3";
	var url7="tagihan/cetakpdf.php";
	var url8="tagihan/cetaklpt.php";
</script>
</head>
<body>
	<?php
	$t=date_sql($tanggal);
	$tgl=date('d',strtotime($t));
	$bln=date('m',strtotime($t));
	$thn=date('Y',strtotime($t));
	$bln++;
	if($bln>12){$bln=1; $thn++;}
	$kwitansi=TRUE;
	include 'form_pensiun.php';
	?>
</body>
</html>