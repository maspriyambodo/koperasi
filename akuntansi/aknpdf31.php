<?php 
include "../h_atas.php";
$thn=$result->c_d($_GET['thn']);$branch=$result->c_d($_GET['branch']);$desc="JURNAL PENUTUP TAHUN : ".$thn;$tabelx='akuntansi.transaksi_'.$thn;$cabang=$result->namacabang($branch);$result->res("CREATE TEMPORARY TABLE $userid SELECT branch,nonas,norekgl,nama,jtransaksi,SUM(IF(substr(kdtran,1,1)='1',jumlah,0)) AS debetkas,SUM(IF(substr(kdtran,1,1)='2',jumlah,0)) AS kreditkas,SUM(IF(substr(kdtran,1,1)='3',jumlah,0)) AS debetmemo,SUM(IF(substr(kdtran,1,1)='4',jumlah,0)) AS kreditmemo FROM $tabelx WHERE jtransaksi=70 GROUP BY norekgl,branch ORDER BY norekgl,branch");if($branch=='0111'){$hasil=$result->query_lap("SELECT branch,nonas,norekgl,nama,debetmemo,kreditmemo FROM $userid GROUP BY nonas ORDER BY nonas");}else{	$hasil=$result->query_lap("SELECT branch,nonas,norekgl,nama,debetmemo,kreditmemo FROM $userid WHERE branch='$branch' ORDER BY norekgl");}
ini_set("memory_limit","516M");
$nama_dokumen=$desc;
define('_MPDF_PATH','../MPDF60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8','A4','','',15,15,25,10,10,10); 
$mpdf->SetHTMLHeader('<table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 10pt; color: #000000;"><tr><td width="15%"><span ><img src="../logo.jpg" width="90"/></span></td><td width="70%" align="center" style="font-weight: bold;"> '.$desc.'<br>'.$cabang.'</td><td width="15%" ></td></tr></table>');
ob_start();
?>
<html>
<head>
</head>
<body style="font-family: sans-serif;font-size: 7pt;"> 
<table style="border-collapse: collapse;" width="100%" border="1" cellpadding="2px">
<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>URAIAN</th>
	<th>REKENING</th>
	<th>DEBET</th>
	<th>KREDIT</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$jbunga=0;$no=1;
	while ($row = $result->row($hasil)) { 
		$nonas=$row['nonas'];?>
		<tr>
			<td align="center" ><?php echo $no; ?></td>
			<td align="left" ><?php echo $row['nama']; ?></td>
			<td align="center" ><?php echo $row['branch'].'-'.$row['nonas'].'-360'; ?></td>
			<td align="right"><?php echo formatrp($row['debetmemo']); ?></td>
			<td align="right"><?php echo formatrp($row['kreditmemo']); ?></td> <?php
			$jpokok=$jpokok+$row['debetmemo'];
			$jbunga=$jbunga+$row['kreditmemo'];
			?>
		</tr><?php 
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center">JUMLAH</td> 
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
	</tr>
</tbody>
</table>
</body>
</html><?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->useSubstitutions=false;
$mpdf->packTableData =true;
$mpdf->simpleTables = true;
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>