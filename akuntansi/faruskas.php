<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>URAIAN</th>
	<th>REKENING</th>
	<th>JUMLAH</th>
	<th>+/-</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$no=1;$vbayar="";
	$tpokok=0;$jumlah1=0;
	while ($row = $result->row($hasil)) { 
		if($row['sandi']=='A') { ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td >&nbsp;</td>
				<td ><?php echo $row['uraian']; ?></td>
				<td ><?php echo $row['kd03'].'-'.$row['kd02']; ?></td>
				<td >&nbsp;</td>
				<td align="right"><?php echo formatrp($a); ?></td>
			</tr> <?php
		}elseif($row['sandi']=='B') { ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td >&nbsp;</td>
				<td ><?php echo $row['uraian']; ?></td>
				<td ><?php echo $row['kd03'].'-'.$row['kd02']; ?></td>
				<td >&nbsp;</td>
				<td align="right"><?php echo formatrp($b); ?></td>
			</tr> <?php
		}elseif($row['sandi']=='D') { ?>
			<tr class="td">
				<td >&nbsp;</td>
				<td ><?php echo $row['uraian']; ?></td>
				<td ><?php echo $row['kd03'].'-'.$row['kd02']; ?></td>
				<td >&nbsp;</td>
				<td align="right"><?php echo formatrp($d); ?></td>
			</tr> <?php			
		}elseif($row['sandi']=='E') { ?>
			<tr class="td">
				<td >&nbsp;</td>
				<td ><?php echo $row['uraian']; ?></td>
				<td ><?php echo $row['kd03'].'-'.$row['kd02']; ?></td>
				<td >&nbsp;</td>
				<td align="right"><?php echo formatrp($e); ?></td>
			</tr> <?php
		}elseif($row['sandi']=='F') { ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td >&nbsp;</td>
				<td ><?php echo $row['uraian']; ?></td>
				<td ><?php echo $row['kd03'].'-'.$row['kd02']; ?></td>
				<td >&nbsp;</td>
				<td align="right"><?php echo formatrp($f); ?></td>
			</tr> <?php			
		}elseif($row['sandi']=='G') { ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td >&nbsp;</td>
				<td ><?php echo $row['uraian']; ?></td>
				<td ><?php echo $row['kd03'].'-'.$row['kd02']; ?></td>
				<td >&nbsp;</td>
				<td align="right"><?php echo formatrp($g); ?></td>
			</tr> <?php
		}elseif($row['sandi']=='H') { ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td >&nbsp;</td>
				<td ><?php echo $row['uraian']; ?></td>
				<td ><?php echo $row['kd03'].'-'.$row['kd02']; ?></td>
				<td >&nbsp;</td>
				<td align="right"><?php echo formatrp($h); ?></td>
			</tr> <?php
		}else{ ?>
			<tr>
				<td ><?php echo $no; ?></td>
				<td ><?php echo $row['uraian']; ?></td>
				<td align="center"><?php echo $row['kd03'].'-'.$row['kd02']; ?></td>
				<td align="right"><?php echo formatrp($row['naik']); ?></td>
				<td >&nbsp;</td>
			</tr><?php
		}
		$no++;
	}?>
</tbody>