<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>NONAS</th>
	<th>NOREK</th>
	<th>NAMA</th>
	<th>DEBET</th>
	<th>KREDIT</th>
	<th>NOTRAN</th>
	<th>KETERANGAN</th>
	<th>OPERATOR</th>
	<th>OTORISASI</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$jbunga=0;$no=1;$vbayar="";
	$tpokok=0;$tbunga=0;?>
	<tr>
		<td colspan="8">SALDO AWAL</td><td align="right" colspan="2"><?php echo number_format($saldo_awal); ?></td>
	</tr><?php
	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($vbayar!=$row['produk']){ 
			if($no>1){?>
			<tr>
				<td colspan="4" align="center">JUMLAH</td>
				<td align="right"><?php echo number_format($jpokok); ?></td>
				<td align="right"><?php echo number_format($jbunga); ?></td>
				<td align="right" colspan="4">&nbsp;</td>
				<?php $jpokok=0;$jbunga=0;?>
			</tr><?php
			}?>
			<tr>
				<td colspan="10"><strong><?php echo ' TYPE REKENING : '.$row['produk']; ?></strong></td>
			</tr><?php
			$no=1;
		}?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row['branch'].'-'.$row['nonas'].'-'.$row['sufix']; ?></td>
			<td><?php echo $row['norek']; ?></td>
			<td width="25%"><?php echo $row['nama']; ?></td> <?php
			 if (substr($row['kdtran'],0,1)=='1') { ?>
				<td align="right">  <?php  echo number_format($row['jumlah']); ?></td> 
				<td align="right">0</td>
				<?php
				$jpokok=$jpokok+$row['jumlah'];
				$tpokok=$tpokok+$row['jumlah'];
			 }else{ ?>
				<td align="right">0</td>
				<td align="right">  <?php  echo number_format($row['jumlah']); ?></td>
				<?php 
				$jbunga=$jbunga+$row['jumlah'];
				$tbunga=$tbunga+$row['jumlah'];
			} ?>
			<td><?php echo $row['notransaksi']; ?></td>
			<td><?php echo $row['keterangan']; ?></td>
			<td><?php echo $row['oper']; ?></td>
			<td><?php echo $row['otor']; ?></td>
		</tr><?php 
		$vbayar=$row['produk'];
		$no++;
	}?>
	<tr>
		<td colspan="4" align="center">JUMLAH</td>
		<td align="right"><?php echo number_format($jpokok); ?></td>
		<td align="right"><?php echo number_format($jbunga); ?></td>
		<td align="right" colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="4" align="center">TOTAL</td>
		<td align="right"><?php echo number_format($tpokok); ?></td>
		<td align="right"><?php echo number_format($tbunga); ?></td>
		<td align="right" colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="8">SALDO AKHIR</td><td align="right" colspan="2"><?php echo number_format($saldo_awal+$tpokok-$tbunga); ?></td>
	</tr>
</tbody>