<?php
include '../h_tetap.php';
include "../susulan/qtagihand.php"; 
error_reporting(0);
ini_set('max_execution_time', 1200); 
ini_set("memory_limit","512M");
$nama_dokumen='KwITANSI TAGIHAN';
define('_MPDF_PATH','../MPDF60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8','A5','','',15,10,10,10,10,10); 
ob_start(); ?>
<html>
<head>
</head>
<body style="font-family: sans-serif;font-size: 8pt;">
<table> <?php  
$kolom=2;  
$i=0;  
$no=1;  
while($row = $result->row($hasil)){
	if($i % $kolom == 0){  
		?><tr><?php  
	}  
	$total=$row['pokok']+$row['bunga']+$row['adm'];
	?>    
	<td width="400px" >
	<table width="100%" cellspacing="0" style="text-align: left; font-size: 9pt;">
		<tr><td height="2px" colspan="2">&nbsp;</td></tr>	
		<tr><td height="2px" colspan="2">&nbsp;</td></tr>	
		<tr>
			<td width="15%" valign="top"><span ><img src="../logo.jpg" width="90"/></span></td>
			<td width="85%" align="center">KWITANSI PENERIMAAN ANGSURAN PINJAMAN<br/>Sk Menteri Koperasi No : II/BH/XXIV/XI/2012<br/>Tanggal 19 Nopember 2012<br/>Alamat : Makasar</td>
		</tr>			
		<tr><td height="2px" colspan="2"><hr/></td></tr>
		<tr><td width="30%">Sudah terima dari</td><td width="80%">:</td></tr>
		<tr><td >Nama</td><td >: <?php echo $row["nama"];?></td></tr>
		<tr><td >Alamat</td><td >: <?php echo $row["alamat"];?></td></tr>
		<tr><td >Rekening</td><td >: <?php echo $row["norek"].'-'.$row["nonas"];?></td></tr>
		<tr><td >Kantor Bayar</td><td >: <?php echo $row["nmbayar"].'-'.$row["kkbayar"];?></td></tr>
		<tr><td >Angsuran Ke</td><td >: <?php echo $row["angsurke"]." Dari ".$row["jangka"];?></td></tr>
		<tr><td >Jumlah</td><td >: <?php echo formatRupiah($total);?></td></tr>
		<tr><td colspan="2" style="font-size:8px">Terbilang : <?php echo " ".terbilang($total);?></td></tr>
		<tr><td >Nama Rekomendasi</td><td >: <?php echo $row["namas"];?></td></tr>
		<tr><td >Nomor Telepon</td><td >: <?php echo $row["notlp"];?></td></tr>
		<tr><td ></td><td align="center" ><?php echo $ncabang.", ".date("d-m-Y");?></td></tr>
		<tr><td height="30px" colspan="2"></td></tr>
		<tr><td ></td><td align="center" ><?php echo $nameuser;?></td></tr>
		<tr><td height="2px" colspan="2"><hr/></td></tr>	
		<tr><td colspan="2">Asli untuk nasabah dan di simpan dengan baik</td></tr>
		<tr><td colspan="2"></td></tr>
	</table>
	</td>
	<?php  
	if(($i%$kolom)==($kolom-1) or ($i+1)==$jml_baris){  
		?></tr><?php  
	}  
	$no++;  
	$i++;  
}?>
</table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->packTableData =true;
$mpdf->simpleTables = true;
$mpdf->WriteHTML($html,0);
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>
