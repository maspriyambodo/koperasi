<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>NONAS</th>
	<th>NOREK</th>
	<th>NOREK GSSL</th>
	<th>NAMA</th>
	<th>DEBET</th>
	<th>KREDIT</th>
	<th>OPERATOR</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$jbunga=0;$no=1;$vbayar="";
	$tpokok=0;$tbunga=0;?>
	<tr>
		<td colspan="7">SALDO AWAL</td><td align="right"><?php echo number_format($saldo_awal); ?></td>
	</tr><?php
	while ($row = $result->fetch_array(MYSQLI_BOTH)) {
		if ($vbayar!=$row['produk']){
			if($no>1){?>
			<tr>
				<td colspan="5" align="center">JUMLAH</td>
				<td align="right"><?php echo number_format($jpokok); ?></td>
				<td align="right"><?php echo number_format($jbunga); ?></td>
				<td align="right">&nbsp;</td>
				<?php $jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;?>
			</tr><?php
			}?>
			<tr>
				<td colspan="8"><strong><?php echo ' TYPE REKENING : '.$row['produk']; ?></strong></td>
			</tr><?php
			$no=1;
		}?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row['branch'].'-'.$row['nonas'].'-'.$row['sufix']; ?></td>
			<td><?php echo $row['norek']; ?></td>
			<td><?php echo substr($row['norekgl'],0,4).'-'.substr($row['norekgl'],4,6).'-'.substr($row['norekgl'],-3); ?></td>
			<td width="30%"><?php echo $row['nama']; ?></td>
			<td align="right"><?php echo number_format($row['debetm']); ?></td>
			<td align="right"><?php echo number_format($row['kreditm']); ?></td>
			<td align="center"><?php echo $row['oper']; ?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['debetm'];
		$jbunga=$jbunga+$row['kreditm'];
		
		$tpokok=$tpokok+$row['debetm'];
		$tbunga=$tbunga+$row['kreditm'];
		$vbayar=$row['produk'];
		$no++;
	}?>
	<tr>
		<td colspan="5" align="center">JUMLAH</td>
		<td align="right"><?php echo number_format($jpokok); ?></td>
		<td align="right"><?php echo number_format($jbunga); ?></td>
		<td align="right">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5" align="center">TOTAL</td>
		<td align="right"><?php echo number_format($tpokok); ?></td>
		<td align="right"><?php echo number_format($tbunga); ?></td>
		<td align="right">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="7">SALDO AKHIR</td><td align="right"><?php echo number_format($saldo_awal+$tpokok-$tbunga); ?></td>
	</tr>
</tbody>