<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th>NO</th>
		<th>NO INVENTARIS</th>
		<th>NAMA INVENTARIS</th>
		<th>PENYUSUSTAN PER BULAN (Rp)</th>
		<th>HARGA PEROLEHAN (Rp)</th>
		<th>TANGGAL PEROLEHAN</th>
		<th>MASA MANFAAT</th>
		<th>NILAI BUKU SAAT INI (Rp)</th>
		<th>NILAI RESIDU/SISA (Rp)</th>
		<th>PENYUSUSTAN BULAN INI (Rp)</th>
		<th>AKUMULASI PENYUSUTAN (Rp)</th>
		<th>NILAI BUKU AKHIR (Rp)</th>
	</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";$golongan='';
	$jumlah1=0;$jumlah2=0;$jumlah3=0;$jumlah4=0;$jumlah5=0;$jumlah6=0;$jumlah7=0;
	$grand1=0;$grand2=0;$grand3=0;$grand4=0;$grand5=0;$grand6=0;$grand7=0;
	$total1=0;$total2=0;$total3=0;$total4=0;$total5=0;$total6=0;$total7=0;
	while ($row = $result->row($hasil)) {
		if ($vbayar!=$row['kode_inventaris']){ 
			if($no>1){
				?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="3" align="center"><strong>JUMLAH </strong></td>
					<td align="right"><?php echo number_format($jumlah1); ?></td>
					<td align="right"><?php echo number_format($jumlah2); ?></td>
					<td align="right">&nbsp;</td>
					<td align="right">&nbsp;</td>
					<td align="right"><?php echo number_format($jumlah3);?></td>
					<td align="right"><?php echo number_format($jumlah4);?></td>
					<td align="right"><?php echo number_format($jumlah5);?></td>
					<td align="right"><?php echo number_format($jumlah6);?></td>
					<td align="right"><?php echo number_format($jumlah7);?></td>
				</tr>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="3" align="center"><strong>GRAND TOTAL</strong></td>
					<td align="right"><?php echo number_format($grand1); ?></td>
					<td align="right"><?php echo number_format($grand2); ?></td>
					<td align="right">&nbsp;</td>
					<td align="right">&nbsp;</td>
					<td align="right"><?php echo number_format($grand3);?></td>
					<td align="right"><?php echo number_format($grand4);?></td>
					<td align="right"><?php echo number_format($grand5);?></td>
					<td align="right"><?php echo number_format($grand6);?></td>
					<td align="right"><?php echo number_format($grand7);?></td>
				</tr>
				<?php
			}
			$kode_inventaris=$row['kode_inventaris'];
			include '../help/ket_inventaris.php';
			$vnmbayar=$xkode_inventaris; ?>
			<tr>
				<td colspan="12"><strong><?php echo $vnmbayar; ?></strong></td>
			</tr>
			<tr>
				<td>&nbsp;</td><td colspan="12"><strong>GOLONGAN : <?php echo $row['golongan'];?></strong></td>
			</tr>
			<?php
			$jumlah1=0;$jumlah2=0;$jumlah3=0;$jumlah4=0;$jumlah5=0;$jumlah6=0;$jumlah7=0;
			$grand1=0;$grand2=0;$grand3=0;$grand4=0;$grand5=0;$grand6=0;$grand7=0;
		}else{
			if($golongan<>$row['golongan']){?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="3" align="center"><strong>JUMLAH</strong></td>
					<td align="right"><?php echo number_format($jumlah1); ?></td>
					<td align="right"><?php echo number_format($jumlah2); ?></td>
					<td align="right">&nbsp;</td>
					<td align="right">&nbsp;</td>
					<td align="right"><?php echo number_format($jumlah3);?></td>
					<td align="right"><?php echo number_format($jumlah4);?></td>
					<td align="right"><?php echo number_format($jumlah5);?></td>
					<td align="right"><?php echo number_format($jumlah6);?></td>
					<td align="right"><?php echo number_format($jumlah7);?></td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td colspan="11"><strong>GOLONGAN : <?php echo $row['golongan'];?></strong></td>
				</tr>
				<?php
				$jumlah1=0;$jumlah2=0;$jumlah3=0;$jumlah4=0;$jumlah5=0;$jumlah6=0;$jumlah7=0;
			}
		}
		?>
		<tr>
			<td ><?php echo $no; ?></td>
			<td align="left"><?php echo $row['no_inventaris']; ?></td>
			<td align="left" width="20%"><?php echo $row['nama_inventaris']; ?></td>
			<td align="right"><?php echo number_format($row['penyusutan_bulan']);?></td>
			<td align="right"><?php echo number_format($row['harga_perolehan']);?></td>
			<td align="right"><?php echo $row['tgl_perolehan'];?></td>
			<td align="right"><?php echo $row['masa_manfaat'].' Tahun';?></td>
			<td align="right"><?php echo number_format($row['nilai_bukua']);?></td>
			<td align="right"><?php echo number_format($row['nilai_residu']);?></td>
			<td align="right"><?php echo number_format($row['mutasi_debet']);?></td>
			<td align="right"><?php echo number_format($row['akumulasi_penyusutan']);?></td>
			<td align="right"><?php echo number_format($row['nilai_buku']);?></td>			
		</tr><?php 
		$jumlah1=$jumlah1+$row['penyusutan_bulan'];
		$jumlah2=$jumlah2+$row['harga_perolehan'];
		$jumlah3=$jumlah3+$row['nilai_bukua'];
		$jumlah4=$jumlah4+$row['nilai_residu'];
		$jumlah5=$jumlah5+$row['mutasi_debet'];
		$jumlah6=$jumlah6+$row['akumulasi_penyusutan'];
		$jumlah7=$jumlah7+$row['nilai_buku'];

		$grand1=$grand1+$row['penyusutan_bulan'];
		$grand2=$grand2+$row['harga_perolehan'];
		$grand3=$grand3+$row['nilai_bukua'];
		$grand4=$grand4+$row['nilai_residu'];
		$grand5=$grand5+$row['mutasi_debet'];
		$grand6=$grand6+$row['akumulasi_penyusutan'];
		$grand7=$grand7+$row['nilai_buku'];

		$total1=$total1+$row['penyusutan_bulan'];
		$total2=$total2+$row['harga_perolehan'];
		$total3=$total3+$row['nilai_bukua'];
		$total4=$total4+$row['nilai_residu'];
		$total5=$total5+$row['mutasi_debet'];
		$total6=$total6+$row['akumulasi_penyusutan'];
		$total7=$total7+$row['nilai_buku'];
		
		$vbayar=$row['kode_inventaris'];
		$kode_inventaris=$row['kode_inventaris'];
		$golongan=$row['golongan'];
		include '../help/ket_inventaris.php';
		$vnmbayar=$xkode_inventaris;
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center"><strong>JUMLAH</strong></td>
		<td align="right"><?php echo number_format($jumlah1); ?></td>
		<td align="right"><?php echo number_format($jumlah2); ?></td>
		<td align="right">&nbsp;</td>
		<td align="right">&nbsp;</td>
		<td align="right"><?php echo number_format($jumlah3);?></td>
		<td align="right"><?php echo number_format($jumlah4);?></td>
		<td align="right"><?php echo number_format($jumlah5);?></td>
		<td align="right"><?php echo number_format($jumlah6);?></td>
		<td align="right"><?php echo number_format($jumlah7);?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center"><strong>GRAND TOTAL</strong></td>
		<td align="right"><?php echo number_format($grand1); ?></td>
		<td align="right"><?php echo number_format($grand2); ?></td>
		<td align="right">&nbsp;</td>
		<td align="right">&nbsp;</td>
		<td align="right"><?php echo number_format($grand3);?></td>
		<td align="right"><?php echo number_format($grand4);?></td>
		<td align="right"><?php echo number_format($grand5);?></td>
		<td align="right"><?php echo number_format($grand6);?></td>
		<td align="right"><?php echo number_format($grand7);?></td>
	</tr>
	<tr>
		<td class="items" colspan="3" align="center">TOTAL</td>
		<td align="right"><?php echo number_format($total1); ?></td>
		<td align="right"><?php echo number_format($total2); ?></td>
		<td align="right">&nbsp;</td>
		<td align="right">&nbsp;</td>
		<td align="right"><?php echo number_format($total3);?></td>
		<td align="right"><?php echo number_format($total4);?></td>
		<td align="right"><?php echo number_format($total5);?></td>
		<td align="right"><?php echo number_format($total6);?></td>
		<td align="right"><?php echo number_format($total7);?></td>
	</tr>
</tbody>