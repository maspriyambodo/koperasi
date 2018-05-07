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
	<tr><td colspan="5">JURNAL TRANSAKSI KAS</td></tr>
	<?php
	$jpokok=0;$no=1;$vbayar="";
	$tpokok=0;$jumlah1=0;$kdebet=0;$kkredit=0;$mdebet=0;$mkredit=0;
	while ($row = $result->row($hasil)) {
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
		<td align="right">'.formatrp($row['debetkas']).'</td>
		<td align="right">'.formatrp($row['kreditkas']).'</td>
		</tr>';
		$kdebet=$kdebet+$row['debetkas'];
		$kkredit=$kkredit+$row['kreditkas'];
		$mdebet=$mdebet+$row['debetkas'];
		$mkredit=$mkredit+$row['kreditkas'];
		$vbayar=substr($row['nonas'],0,1);
		$no++;
	}?>
	 <tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center">TOTAL MUTASI</td>
		<td align="right"><?php echo formatrp($mdebet); ?></td>
		<td align="right"><?php echo formatrp($mkredit); ?></td>
	</tr>
</tbody>