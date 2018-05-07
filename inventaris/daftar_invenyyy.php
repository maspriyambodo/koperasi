<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th rowspan="2">NO</th>
		<th rowspan="2">NAMA INVENTARIS</th>
		<th rowspan="2">HARGA PEROLEHAN (Rp)</th>
		<th rowspan="2">NILAI PEROLEHAN(Rp)</th>
		<th rowspan="2">NILAI RESIDU/SISA (Rp)</th>
		<th rowspan="2">AKUMULASI PENYUSUTAN (Rp)</th>
		<th rowspan="2">PENYUSUSTAN PER BULAN (Rp)</th>
		<th rowspan="2">NILAI BUKU (Rp)</th>
	</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";
	$jumlah1=0;$jumlah2=0;$jumlah3=0;$jumlah4=0;$jumlah5=0;$jumlah6=0;$jumlah7=0;
	$grand1=0;$grand2=0;$grand3=0;$grand4=0;$grand5=0;$grand6=0;$grand7=0;
	$total1=0;$total2=0;$total3=0;$total4=0;$total5=0;$total6=0;$total7=0;
	while ($row = $result->row($hasil)) {
		if ($vbayar!=$row['golongan']){ 
			if($no>1){?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="2" align="center"><strong>JUMLAH </strong></td>
					<td align="right"><?php echo number_format($jumlah2); ?></td>
					<td align="right"><?php echo number_format($jumlah3);?></td>
					<td align="right"><?php echo number_format($jumlah4);?></td>
					<td align="right"><?php echo number_format($jumlah5);?></td>
					<td align="right"><?php echo number_format($jumlah6);?></td>
					<td align="right"><?php echo number_format($jumlah7);?></td>
				</tr>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="2" align="center"><strong>GRAND TOTAL</strong></td>
					<td align="right"><?php echo number_format($grand2); ?></td>
					<td align="right"><?php echo number_format($grand3);?></td>
					<td align="right"><?php echo number_format($grand4);?></td>
					<td align="right"><?php echo number_format($grand5);?></td>
					<td align="right"><?php echo number_format($grand6);?></td>
					<td align="right"><?php echo number_format($grand7);?></td>
				</tr><?php
			}?>
			<tr><td colspan="9"><strong>GOLONGAN : <?php echo $row['golongan'];?></strong></td></tr><?php
			$jumlah1=0;$jumlah2=0;$jumlah3=0;$jumlah4=0;$jumlah5=0;$jumlah6=0;$jumlah7=0;
			$grand1=0;$grand2=0;$grand3=0;$grand4=0;$grand5=0;$grand6=0;$grand7=0;
		}?>	
		<tr>
			<td ><?php echo $no; ?></td>
			<td align="left">
				<?php 
					$kode_inventaris=$row['kode_inventaris'];
					include '../help/ket_inventaris.php';
					echo $xkode_inventaris;
				?>
			</td>
			<td align="right"><?php echo number_format($row['harga_perolehan']);?></td>
			<td align="right"><?php echo number_format($row['nilai_perolehan']);?></td>
			<td align="right"><?php echo number_format($row['nilai_residu']);?></td>
			<td align="right"><?php echo number_format($row['akumulasi_penyusutan']);?></td>
			<td align="right"><?php echo number_format($row['penyusutan_bulan']);?></td>
			<td align="right"><?php echo number_format($row['nilai_buku']);?></td>
		</tr><?php 
		$jumlah2=$jumlah2+$row['harga_perolehan'];
		$jumlah3=$jumlah3+$row['nilai_perolehan'];
		$jumlah4=$jumlah4+$row['nilai_residu'];
		$jumlah5=$jumlah5+$row['akumulasi_penyusutan'];
		$jumlah6=$jumlah6+$row['penyusutan_bulan'];
		$jumlah7=$jumlah7+$row['nilai_buku'];
		
		$grand2=$grand2+$row['harga_perolehan'];
		$grand3=$grand3+$row['nilai_perolehan'];
		$grand4=$grand4+$row['nilai_residu'];
		$grand5=$grand5+$row['akumulasi_penyusutan'];
		$grand6=$grand6+$row['penyusutan_bulan'];
		$grand7=$grand7+$row['nilai_buku'];

		$total2=$total2+$row['harga_perolehan'];
		$total3=$total3+$row['nilai_perolehan'];
		$total4=$total4+$row['nilai_residu'];
		$total5=$total5+$row['akumulasi_penyusutan'];
		$total6=$total6+$row['penyusutan_bulan'];
		$total7=$total7+$row['nilai_buku'];

		$vbayar=$row['golongan'];
		$kode_inventaris=$row['kode_inventaris'];
		include '../help/ket_inventaris.php';
		$vnmbayar=$xkode_inventaris;
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center"><strong>JUMLAH </strong></td>
		<td align="right"><?php echo number_format($jumlah2); ?></td>
		<td align="right"><?php echo number_format($jumlah3);?></td>
		<td align="right"><?php echo number_format($jumlah4);?></td>
		<td align="right"><?php echo number_format($jumlah5);?></td>
		<td align="right"><?php echo number_format($jumlah6);?></td>
		<td align="right"><?php echo number_format($jumlah7);?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center"><strong>GRAND TOTAL</strong></td>
		<td align="right"><?php echo number_format($grand2); ?></td>
		<td align="right"><?php echo number_format($grand3);?></td>
		<td align="right"><?php echo number_format($grand4);?></td>
		<td align="right"><?php echo number_format($grand5);?></td>
		<td align="right"><?php echo number_format($grand6);?></td>
		<td align="right"><?php echo number_format($grand7);?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center">TOTAL</td>
		<td align="right"><?php echo number_format($total2); ?></td>
		<td align="right"><?php echo number_format($total3);?></td>
		<td align="right"><?php echo number_format($total4);?></td>
		<td align="right"><?php echo number_format($total5);?></td>
		<td align="right"><?php echo number_format($total6);?></td>
		<td align="right"><?php echo number_format($total7);?></td>
	</tr>
</tbody>