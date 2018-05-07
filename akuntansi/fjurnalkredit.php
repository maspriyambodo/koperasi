<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2">NO</th>
	<th rowspan="2">REKENING</th>
	<th rowspan="2">URAIAN</th>
	<th colspan="2">MUTASI TRANSAKSI</th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<th>DEBET</th>
	<th>KREDIT</th>
</tr>
</thead>
<tbody>
	<tr><td colspan="5">JURNAL TRANSAKSI MEMORIAL</td></tr>
	<?php
	$jpokok=0;$no=1;$vbayar="";
	$tpokok=0;$jumlah1=0;$kdebet=0;$kkredit=0;$mdebet=0;$mkredit=0;
	while ($row = $result->row($hasil)) {
//		if ($vbayar!=substr($row['nonas'],0,1)){ 
//			if($no>1){
//				echo '<tr bgcolor="#e5e5e5">
//				<td colspan="3" align="center">JUMLAH </td>
//				<td align="right">'.formatrp($mdebet).'</td>
//				<td align="right">'.formatrp($mkredit).'</td>
//				</tr>';
//				$jpokok=0;$tpokok=0;$jumlah1=0;$no=1;$mdebet=0;$mkredit=0;
//			}
//		}
		echo '<tr>
		<td>'.$no.'</td>
		<td>';
		if($branch=='0111'){
			echo $branch.'-'.$row['nonas'].'-'.$row['produk']; 
		}else{
			echo $row['branch'].'-'.$row['nonas'].'-'.$row['produk'];	
		}
		echo '</td>
		<td>'.$row['nama'].'</td>
		<td align="right">'.formatrp($row['debetmemo']).'</td>
		<td align="right">'.formatrp($row['kreditmemo']).'</td>
		</tr>';
		$mdebet=$mdebet+$row['debetmemo'];
		$mkredit=$mkredit+$row['kreditmemo'];
		$kdebet=$kdebet+$row['debetmemo'];
		$kkredit=$kkredit+$row['kreditmemo'];
		$vbayar=substr($row['nonas'],0,1);
		$no++;
	}?>
	 <tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center">TOTAL MUTASI </td>
		<td align="right"><?php echo formatrp($kdebet); ?></td>
		<td align="right"><?php echo formatrp($kkredit); ?></td>
	</tr>
</tbody>