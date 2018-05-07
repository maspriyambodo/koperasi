<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_formlaporan.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url1="susulan/rsusulanl.php?p=1";
	var url2="susulan/rsusulanl.php?p=2";
	var url3="susulan/rsusulanl.php?p=3";
	var url4="susulan/rsusulanr.php?p=1";
	var url5="susulan/rsusulanr.php?p=2";
	var url6="susulan/rsusulanr.php?p=3";
	var url7="susulan/cetakpdf.php";
	var url8="susulan/cetaklpt.php";
</script>
<?php
$t=date_sql($tanggal);
$tgl=date('d',strtotime($t));
$bln=date('m',strtotime($t));
$thn=date('Y',strtotime($t));
$bln++;
if($bln>12){$bln=1; $thn++;}
$kwitansi=TRUE;
include 'form_rencana.php';
?>