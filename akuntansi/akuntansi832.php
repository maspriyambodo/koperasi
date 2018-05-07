<?php 
include "../h_atas.php";$thn=$result->c_d($_GET['thn']);$branch=$result->c_d($_GET['branch']);$desc="NERACA PENUTUP TAHUN : ".$thn;$fieldhari61='tahun12a';$cabang=$result->namacabang($branch);if($branch=='0111'){$text = "SELECT a.uraian,a.sandi,b.nonas,SUM(b.$fieldhari61) AS $fieldhari61 FROM akuntansi.neraca a JOIN $tabel_sandi b ON a.sandi=b.nonas GROUP BY b.nonas ORDER BY b.nonas";}else{$text = "SELECT a.uraian,a.sandi,b.nonas,b.$fieldhari61  FROM akuntansi.neraca a JOIN $tabel_sandi b ON a.sandi=b.nonas WHERE b.branch='$branch' ORDER BY b.nonas";}$hasil=$result->query_lap($text);include '../judul.php';
?>
<table width="100%" class="table">
<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>URAIAN</th>
	<th>REKENING</th>
	<th>SALDO</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$no=1;$vbayar="";
	while ($row = $result->row($hasil)) { 
		if ($vbayar!=substr($row['sandi'],0,1)){ 
			if($no>1){  ?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="3" align="center">JUMLAH AKTIVA</td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<?php $jpokok=0;$no=1;?>
				</tr> <?php
			}
		}?>
		<tr>
			<td align="center" ><?php echo $no; ?></td>
			<td align="left" ><?php echo $row['uraian']; ?></td>
			<td align="center" ><?php echo $branch.'-'.$row['sandi'].'-360'; ?></td>
			<td align="right"><?php echo formatrp($row[$fieldhari61]); ?></td>
		</tr><?php 
		$jpokok=$jpokok+$row[$fieldhari61];
		$vbayar=substr($row['sandi'],0,1);
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center">JUMLAH PASIVA</td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
	</tr>
</tbody>
</table>