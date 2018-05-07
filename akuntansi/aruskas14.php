<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>URAIAN</th>
	<th>REKENING</th>
	<th><?php echo $naikzz;?></th>
	<th><?php echo $naikyy;?></th>
	<th><?php echo $naikxx;?></th>
</tr>
</thead>
<tbody><?php
	$no=1;
	$hasil=$result->query_x1("SELECT uraian,sandi,kd03,kd02,$naikz,$naiky,$naikx FROM $namafile");
	while ($row=$result->row($hasil)) {
		if($row['sandi']=='A') { ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td >&nbsp;</td>
				<td ><?php echo $row['uraian']; ?></td>
				<td ><?php echo $row['kd03'].'-'.$row['kd02']; ?></td>
				<td align="right"><?php echo formatrp($row[$naikz]);?></td>
				<td align="right"><?php echo formatrp($row[$naiky]);?></td>
				<td align="right"><?php echo formatrp($row[$naikx]);?></td>
			</tr> <?php
		}elseif($row['sandi']=='B') { ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td >&nbsp;</td>
				<td ><?php echo $row['uraian']; ?></td>
				<td ><?php echo $row['kd03'].'-'.$row['kd02']; ?></td>
				<td align="right"><?php echo formatrp($row[$naikz]);?></td>
				<td align="right"><?php echo formatrp($row[$naiky]);?></td>
				<td align="right"><?php echo formatrp($row[$naikx]);?></td>
			</tr> <?php
		}elseif($row['sandi']=='D') { ?>
			<tr class="td">
				<td >&nbsp;</td>
				<td ><?php echo $row['uraian']; ?></td>
				<td ><?php echo $row['kd03'].'-'.$row['kd02']; ?></td>
				<td align="right"><?php echo formatrp($row[$naikz]);?></td>
				<td align="right"><?php echo formatrp($row[$naiky]);?></td>
				<td align="right"><?php echo formatrp($row[$naikx]);?></td>
			</tr> <?php
		}elseif($row['sandi']=='E') { ?>
			<tr class="td">
				<td >&nbsp;</td>
				<td ><?php echo $row['uraian']; ?></td>
				<td ><?php echo $row['kd03'].'-'.$row['kd02']; ?></td>
				<td align="right"><?php echo formatrp($row[$naikz]);?></td>
				<td align="right"><?php echo formatrp($row[$naiky]);?></td>
				<td align="right"><?php echo formatrp($row[$naikx]);?></td>
			</tr> <?php
		}elseif($row['sandi']=='F') { ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td >&nbsp;</td>
				<td ><?php echo $row['uraian']; ?></td>
				<td ><?php echo $row['kd03'].'-'.$row['kd02']; ?></td>
				<td align="right"><?php echo formatrp($row[$naikz]);?></td>
				<td align="right"><?php echo formatrp($row[$naiky]);?></td>
				<td align="right"><?php echo formatrp($row[$naikx]);?></td>
			</tr> <?php
		}elseif($row['sandi']=='G') { ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td >&nbsp;</td>
				<td ><?php echo $row['uraian']; ?></td>
				<td ><?php echo $row['kd03'].'-'.$row['kd02']; ?></td>
				<td align="right"><?php echo formatrp($row[$naikz]);?></td>
				<td align="right"><?php echo formatrp($row[$naiky]);?></td>
				<td align="right"><?php echo formatrp($row[$naikx]);?></td>
			</tr> <?php
		}elseif($row['sandi']=='H') { ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td >&nbsp;</td>
				<td ><?php echo $row['uraian']; ?></td>
				<td ><?php echo $row['kd03'].'-'.$row['kd02']; ?></td>
				<td align="right"><?php echo formatrp($row[$naikz]);?></td>
				<td align="right"><?php echo formatrp($row[$naiky]);?></td>
				<td align="right"><?php echo formatrp($row[$naikx]);?></td>
			</tr> <?php
		}else{ ?>
			<tr>
				<td ><?php echo $no; ?></td>
				<td ><?php echo $row['uraian']; ?></td>
				<td align="center"><?php echo $row['kd03'].'-'.$row['kd02'];?></td>
				<td align="right"><?php echo formatrp($row[$naikz]);?></td>
				<td align="right"><?php echo formatrp($row[$naiky]);?></td>
				<td align="right"><?php echo formatrp($row[$naikx]);?></td>
			</tr><?php
		}
		$no++;
	}?>
</tbody>