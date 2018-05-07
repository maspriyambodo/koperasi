<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>NOREK</th>
	<th>NAMA</th>
	<th>TANGGAL</th>
	<th>POKOK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>DENDA</th>
	<th>JUMLAH</th>
	<th>JW</th>
	<th>KANTOR BAYAR</th>
	<th>KETERANGAN</th>
	<th>OPER</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$jbunga=0;$jadm=0;$jdenda=0; $jumlah1=0;$jumlah2=0;$no=1;$vbayar="";
	$tpokok=0;$tbunga=0;$tadm=0;$tdenda=0;$tjumlah1=0;$tjumlah2=0;
	while ($row=$result->row($hasil)){
		if ($vbayar!=$row['produk']){ 
			if($no>1){?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="4" align="center">JUMLAH</td>
					<td align="right"><?php echo formatrp($jpokok);?></td>
					<td align="right"><?php echo formatrp($jbunga);?></td>
					<td align="right"><?php echo formatrp($jadm);?></td>
					<td align="right"><?php echo formatrp($jdenda); ?></td>
					<td align="right"><?php echo formatrp($jumlah1);?></td>
					<td align="right" colspan="4">&nbsp;</td>
				</tr><?php 
				$jpokok=0;$jbunga=0;$jadm=0;$jdenda=0;$jumlah1=0;$jumlah2=0;$no=1;
			}?>
			<tr><td colspan="13"><strong><?php echo $row['nmproduk']; ?></strong></td></tr><?php
		}?>
		<tr>
			<td ><?php echo $no; ?></td>
			<td align="left"><?php echo$row['norek'];?></td>
			<td align="left" width="20%"><?php echo $row['nama'];?></td>
			<td align="center"><?php echo date_sql($row['tanggal']);?></td>
			<td align="right"><?php echo formatrp($row['pokok']);?></td>
			<td align="right"><?php echo formatrp($row['bunga']);?></td>
			<td align="right"><?php echo formatrp($row['adm']);?></td>
			<td align="right"><?php echo formatrp($row['denda']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah']);?></td>
			<td align="center"><?php echo $row['jangka']; ?></td>
			<td align="left" width="20%"><?php echo $row['nmbayar']; ?></td>
			<td>
			<?php 
				if($row['mutasi']=='K'){
					$kete='Mutasi Kas';
				}else{
					$kete='Mutasi Memorial';
				}
				echo $kete;
			?>
			</td>
			<td><?php echo $row['oper']; ?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jumlah1=$jumlah1+$row['jumlah'];
		
		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah1=$tjumlah1+$row['jumlah'];
		
		$vbayar=$row['produk'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center">JUMLAH</td>
		<td align="right"><?php echo formatrp($jpokok);?></td>
		<td align="right"><?php echo formatrp($jbunga);?></td>
		<td align="right"><?php echo formatrp($jadm);?></td>
		<td align="right"><?php echo formatrp($jdenda); ?></td>
		<td align="right"><?php echo formatrp($jumlah1);?></td>
		<td align="right" colspan="4">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($tpokok);?></td>
		<td align="right"><?php echo formatrp($tbunga);?></td>
		<td align="right"><?php echo formatrp($tadm);?></td>
		<td align="right"><?php echo formatrp($tdenda); ?></td>
		<td align="right"><?php echo formatrp($tjumlah1);?></td>
		<td align="right" colspan="4">&nbsp;</td>
	</tr>
</tbody>