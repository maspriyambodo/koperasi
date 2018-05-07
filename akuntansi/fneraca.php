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
			if($no>1){
				echo '<tr class="td" bgcolor="#e5e5e5">';
				echo '<td colspan="3" align="center">JUMLAH AKTIVA</td>';
				echo '<td align="right">'.formatrp($jpokok).'</td>';
				echo '</tr>';
				$jpokok=0;$no=1;
			}
		}
		echo '<tr>';
		echo '<td align="center">'.$no.'</td>';
		echo '<td align="left">'.$row['uraian'].'</td>';
		echo '<td align="center">'.$branch.'-'.$row['sandi'].'-360'.'</td>';
		echo '<td align="right">'.formatrp($row[$fieldhari6]).'</td>';
		echo '</tr>';
		$jpokok=$jpokok+$row[$fieldhari6];
		$vbayar=substr($row['sandi'],0,1);
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center">JUMLAH PASIVA</td>
		<td align="right"><?php echo number_format($jpokok); ?></td>
	</tr>
</tbody>