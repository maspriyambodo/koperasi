<?php
switch ($pilih){
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	include '../judul.php';
	echo "<table width='100%' class='table'>";
	include $tabel_form;
	echo "</table>";
	break;
case "2":
	if($kertas==1){
		include '../h_pdf_l1.php';	
	}else{
		include '../h_pdf_p1.php';
	}
	echo '<table style="border-collapse:collapse;font-family:Arial,sans-serif;font-size:7pt;" width="100%" border="1" cellpadding="3px">';
	include $tabel_form;
	echo "</table>";
	include '../b_pdf.php';
	break;
case "3":
	include '../header_xls.php';
	echo '<table style="border-collapse: collapse;" width="100%" border="1" cellpadding="3px">';
	//echo '<table width="100%" class="table" style="font-family: Arial; font-size: 9pt;">';
	echo '<tr><td colspan="'.$kolom.'" align="center">'.$desc.'<br>'.$cabang.'</td></tr>';
	include $tabel_form;
	echo '</table>';
	include '../bawah_xls.php';
	break;
}
?>