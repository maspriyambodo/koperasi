<?php 
include "h_atas.php";
if($result->c_d($_GET['p'] )==1){
	$nonas=$result->c_d($_POST['nonas']);$branch=$result->c_d($_POST['branch']);$sufix=$result->c_d($_POST['sufix']);
	$bln=$result->c_d($_POST['bln']);$thn=$result->c_d($_POST['thn']);$bln_akhir=$result->c_d($_POST['bln_akhir']);
	$thn_akhir=$result->c_d($_POST['thn_akhir']);
}else{
	$nonas=$result->c_d($_GET['nonas']);$branch=$result->c_d($_GET['branch']);$sufix=$result->c_d($_GET['sufix']);
	$bln=$result->c_d($_GET['bln']);$thn=$result->c_d($_GET['thn']);$bln_akhir=$result->c_d($_GET['bln_akhir']);
	$thn_akhir=$result->c_d($_GET['thn_akhir']);
}
include 'akninfogsld.php';
switch ($result->c_d($_GET['p'] )) {
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	include 'tagihan/judul.php';
	echo "<table width='100%' class='table'>";
	include 'akninfogsly.php';
	echo "</table>";
	break;
case "2":
	include 'h_pdf_l.php';
	echo "<table width='100%' class='table' style='font-family: Arial; font-size: 9pt;'>";
	include 'akninfogsly.php';
	echo "</table>";
	include 'b_pdf.php';
	break;
case "3":
	include 'header_xls.php';
	echo '<table width="100%" class="table" style="font-family: Arial; font-size: 9pt;">';
	echo '<tr><td colspan="9" align="center">'.$desc.'</td></tr>';
	include 'akninfogsly.php';
	echo '</table>';
	include 'bawah_xls.php';
	break;
}
?>