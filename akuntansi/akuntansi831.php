<?php 
include "../h_atas.php";$thn=$result->c_d($_GET['thn']);$branch=$result->c_d($_GET['branch']);$desc="JURNAL PENUTUP TAHUN : ".$thn;$cabang=$result->namacabang($branch);$tabelx='akuntansi.transaksi_'.$thn;$result->res("CREATE TEMPORARY TABLE $userid SELECT branch,nonas,norekgl,nama,jtransaksi,SUM(IF(substr(kdtran,1,1)='1',jumlah,0)) AS debetkas,SUM(IF(substr(kdtran,1,1)='2',jumlah,0)) AS kreditkas,SUM(IF(substr(kdtran,1,1)='3',jumlah,0)) AS debetmemo,SUM(IF(substr(kdtran,1,1)='4',jumlah,0)) AS kreditmemo FROM $tabelx WHERE jtransaksi=70 GROUP BY norekgl,branch ORDER BY norekgl,branch");if($branch=='0111'){$text = "SELECT branch,nonas,norekgl,nama,debetmemo,kreditmemo FROM $userid GROUP BY nonas ORDER BY nonas";}else{$text = "SELECT branch,nonas,norekgl,nama,debetmemo,kreditmemo FROM $userid WHERE branch='$branch' ORDER BY norekgl";}$hasil=$result->query_lap($text);include '../judul.php'; ?>
<table width="100%" class="table">
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
		$nonas=$row['nonas'];	?>
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