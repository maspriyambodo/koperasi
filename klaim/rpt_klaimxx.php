<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2">NO</th>
	<th colspan="2">NO REKENING</th>
	<th rowspan="2">NAMA</th>
	<th rowspan="2">TGL PINJAM</th>
	<th rowspan="2">NOMINAL</th>
	<th rowspan="2">SALDO</th>
	<th rowspan="2">JUMLAH CAIR</th>
	<th rowspan="2">NAMA ASURANSI</th>
	<th rowspan="2">NO TRANSAKSI</th>
	<th colspan="2">TANGGAL</th>
	<th colspan="2">OPERATOR</th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<th>NASABAH</th>
	<th>AKUNTANSI</th>
	<th>PENGAJUAN</th>
	<th>PENCAIRAN</th>
	<th>INPUT</th>
	<th>OTORISASI</th>
</tr>

</thead>
<tbody><?php
	$no=1;$vbayar="";$xtanggal="";
	$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jjumlah4=0;
	$tjumlah1=0;$tjumlah2=0;$tjumlah3=0;$tjumlah4=0;
	while ($row=$result->row($hasil)){
		if ($vbayar!=$row['produk']){ 
			if($no>1){?>
				<tr class="td" bgcolor="#e5e5e5">
					<td align="center">&nbsp;</td>
					<td colspan="4" align="center">SUB JUMLAH :</td>
					<td align="right"><?php echo formatrp($jjumlah1);?></td>
					<td align="right"><?php echo formatrp($jjumlah2);?></td>
					<td align="right"><?php echo formatrp($jjumlah3);?></td>
					<td align="right" colspan="7">&nbsp;</td>
				</tr>
				<?php
				$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jjumlah4=0;
			}?>
			<tr>
				<td colspan="14"><strong><?php echo 'JENIS PRODUK : '.$row['nmproduk'];?></strong></td>
			</tr>
			<?php
			$no=1;
		}?>	
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row['norek']; ?></td>
			<td><?php echo $row['norekgl']; ?></td>
			<td width="20%"><?php echo $row['nama']; ?></td>
			<td><?php echo $row['tgtran']; ?></td>
			<td align="right"><?php echo formatrp($row['nomi']); ?></td>
			<td align="right"><?php echo formatrp($row['saldo']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah']); ?></td>
			<td><?php echo $row['nama_asuransi']; ?></td>
			<td><?php echo $row['notransaksi']; ?></td>
			<td><?php echo $row['tgklaim']; ?></td>
			<td><?php echo $row['tanggal']; ?></td>
			<td><?php echo $row['oper']; ?></td>
			<td><?php echo $row['otor']; ?></td>
		</tr><?php 
		$jjumlah1=$jjumlah1+$row['nomi'];
		$jjumlah2=$jjumlah2+$row['saldo'];
		$jjumlah3=$jjumlah3+$row['jumlah'];
		$tjumlah1=$tjumlah1+$row['nomi'];
		$tjumlah2=$tjumlah2+$row['saldo'];
		$tjumlah3=$tjumlah3+$row['jumlah'];
		$vbayar=$row['produk'];
		$xtanggal=$row['nmproduk'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td align="center">&nbsp;</td>
		<td colspan="4" align="center">SUB JUMLAH :</td>
		<td align="right"><?php echo formatrp($jjumlah1);?></td>
		<td align="right"><?php echo formatrp($jjumlah2);?></td>
		<td align="right"><?php echo formatrp($jjumlah3);?></td>
		<td align="right" colspan="7">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="5" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($jjumlah1);?></td>
		<td align="right"><?php echo formatrp($jjumlah2);?></td>
		<td align="right"><?php echo formatrp($jjumlah3);?></td>
		<td align="right" colspan="7">&nbsp;</td>
	</tr>
</tbody>