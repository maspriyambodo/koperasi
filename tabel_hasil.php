<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>TANGGAL</th>
	<th>POKOK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>DENDA</th>
	<th>FINALTI</th>
	<th>JUMLAH</th>
	<th>NO TRANSAKSI</th>
	<th>OPER / MUTASI</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$jbunga=0;$jadm=0;$jdenda=0;$jfinalti=0;$jjumlah=0;$no=1;
	while ($row=$result->row($hasil)){ ?>
		<tr>
			<td ><?php echo $no; ?></td>
			<td align="center"><?php echo date_sql($row['tanggal']);?></td>
			<td align="right"><?php echo formatrp($row['pokok']);?></td>
			<td align="right"><?php echo formatrp($row['bunga']);?></td>
			<td align="right"><?php echo formatrp($row['adm']);?></td>
			<td align="right"><?php echo formatrp($row['denda']); ?></td>
			<td align="right"><?php echo formatrp($row['finalti']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah']);?></td>
			<td align="center"><?php echo $row['notransaksi']; ?></td>
			<td>
			<?php 
				if($row['mutasi']=='K'){
					$kete='Mutasi Kas';
				}else{
					$kete='Mutasi Memorial';
				}
				if(substr($row['jtransaksi'],0,1)=='1'){
					$ketee='Realisasi Tagihan';
				}elseif(substr($row['jtransaksi'],0,1)=='3'){
					$ketee='Setoran Kredit';
				}elseif(substr($row['jtransaksi'],0,1)=='5'){
					$ketee='Pelunasan Kredit';
				}elseif(substr($row['jtransaksi'],0,1)=='8'){
					$ketee='Retur/PKP Kredit';
				}elseif(substr($row['jtransaksi'],0,1)=='9'){
					$ketee='Pinjaman Kredit';
				}else{
					$ketee='Non Kategori';
				}
				echo $row['oper'].' - '.$kete.' - '.$ketee;?>
			</td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jdenda=$jdenda+$row['denda'];
		$jfinalti=$jfinalti+$row['finalti'];
		$jjumlah=$jjumlah+$row['jumlah'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center">JUMLAH</td>
		<td align="right"><?php echo formatrp($jpokok);?></td>
		<td align="right"><?php echo formatrp($jbunga);?></td>
		<td align="right"><?php echo formatrp($jadm);?></td>
		<td align="right"><?php echo formatrp($jdenda); ?></td>
		<td align="right"><?php echo formatrp($jfinalti); ?></td>
		<td align="right"><?php echo formatrp($jjumlah);?></td>
		<td align="right" colspan="2">&nbsp;</td>
	</tr>
</tbody>