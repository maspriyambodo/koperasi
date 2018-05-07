<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2">NO</th>
	<th colspan="2">NO REKENING</th>
	<th rowspan="2">NAMA</th>
	<th colspan="2">MUTASI KAS</th>
	<th rowspan="2">TGL TRANSAKSI</th>
	<th rowspan="2">NO TRANSAKSI</th>
	<th rowspan="2">KETERANGAN</th>
	<th rowspan="2">OPERATOR</th>
	<th rowspan="2">OTORISASI</th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<th>NASABAH</th>
	<th>AKUNTANSI</th>
	<th>DEBET</th>
	<th>KREDIT</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$jbunga=0;$no=1;$vbayar="";
	$tpokok=0;$tbunga=0;?>
	<tr>
		<td colspan="9" align="center">SALDO AWAL</td><td align="right" colspan="2"><?php echo formatrp($saldo_awal); ?></td>
	</tr><?php
	while ($row=$result->row($hasil)){ 
		if ($vbayar!=$row['produk']){ 
			if($no>1){?>
			<tr class="td" bgcolor="#e5e5e5">
				<td colspan="4" align="center">JUMLAH</td>
				<td align="right"><?php echo formatrp($jpokok); ?></td>
				<td align="right"><?php echo formatrp($jbunga); ?></td>
				<td align="right" colspan="5">&nbsp;</td>
				<?php $jpokok=0;$jbunga=0;?>
			</tr><?php
			}?>
			<tr>
				<td colspan="11"><strong><?php echo ' TYPE REKENING : '.$row['produk'];?></strong></td>
			</tr><?php
			$no=1;
		}?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row['norek']; ?></td>
			<td><?php echo $row['norekgl']; ?></td>
			<td width="20%"><?php echo $row['nama']; ?></td> <?php
			 if (substr($row['kdtran'],0,1)=='2') { ?>
				<td align="right">  <?php  echo formatrp($row['jumlah']);?></td> 
				<td align="right">0</td>
				<?php
				$jpokok=$jpokok+$row['jumlah'];
				$tpokok=$tpokok+$row['jumlah'];
			 }else{ ?>
				<td align="right">0</td>
				<td align="right">  <?php  echo formatrp($row['jumlah']);?></td>
				<?php 
				$jbunga=$jbunga+$row['jumlah'];
				$tbunga=$tbunga+$row['jumlah'];
			} ?>
			<td><?php echo date_sql($row['tanggal']);?></td>
			<td><?php echo $row['notransaksi'];?></td>
			<td><?php echo $row['keterangan'];?></td>
			<td><?php echo $row['oper'];?></td>
			<td><?php echo $row['otor'];?></td>
		</tr><?php 
		$vbayar=$row['produk'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center">JUMLAH</td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right" colspan="5">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right" colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="9" align="center">SALDO AKHIR</td><td align="right" colspan="2"><?php echo formatrp($saldo_awal-$tbunga+$tpokok); ?></td>
	</tr>
</tbody>