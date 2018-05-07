<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th rowspan="2">NO</th>
		<th rowspan="2">NAMA SALES</th>
		<th rowspan="2">SALDO AWAL</th>
		<th colspan="2">MUTASI KAS</th>
		<th colspan="2">MUTASI MEMORIAL</th>
		<th rowspan="2">SALDO AKHIR</th>
		<th rowspan="2">JML REK</th>
		<th rowspan="2">%</th>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th>DEBET</th>
		<th>KREDIT</th>
		<th>DEBET</th>
		<th>KREDIT</th>
	</tr>
</thead>
<tbody>
	<?php
	$no=1;$vbayar='';$salesx='';
	$jsaldo_awal=0;$jkas_debet=0;$jkas_kredit=0;$jmemo_debet=0;$jmemo_kredit=0;$jsaldo_akhir=0;$jorg=0;
	$gsaldo_awal=0;$gkas_debet=0;$gkas_kredit=0;$gmemo_debet=0;$gmemo_kredit=0;$gsaldo_akhir=0;$gorg=0;
	$tsaldo_awal=0;$tkas_debet=0;$tkas_kredit=0;$tmemo_debet=0;$tmemo_kredit=0;$tsaldo_akhir=0;$torg=0;
	while ($row = $result->row($hasil)) {
		$kolek=$row['kolek'];
		include '../parameter/ketkolek.php';
		if ($vbayar<>$row['produk']){
			if ($no>1){
				if($jsaldo_awal==0){
					$jml_saldoa1=100;
					$jml_saldoa2=100;
				}else{
					$jml_saldoa1=($jsaldo_akhir/$jsaldo_awal)*100;
					$jml_saldoa2=($gsaldo_akhir/$gsaldo_awal)*100;	
				}
				?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="2" align="center"><strong>JUMLAH</strong></td>
					<td align="right"><?php echo number_format($jsaldo_awal); ?></td>
					<td align="right"><?php echo number_format($jkas_debet); ?></td>
					<td align="right"><?php echo number_format($jkas_kredit); ?></td>
					<td align="right"><?php echo number_format($jmemo_debet); ?></td>
					<td align="right"><?php echo number_format($jmemo_kredit); ?></td>
					<td align="right"><?php echo number_format($jsaldo_akhir); ?></td>
					<td align="right"><?php echo number_format($jorg);?></td>
					<td align="right"><?php echo number_format($jml_saldoa1,2);?></td>
				</tr>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="2" align="center"><strong>GRAND TOTAL</strong></td>
					<td align="right"><?php echo number_format($gsaldo_awal); ?></td>
					<td align="right"><?php echo number_format($gkas_debet); ?></td>
					<td align="right"><?php echo number_format($gkas_kredit); ?></td>
					<td align="right"><?php echo number_format($gmemo_debet); ?></td>
					<td align="right"><?php echo number_format($gmemo_kredit); ?></td>
					<td align="right"><?php echo number_format($gsaldo_akhir); ?></td>
					<td align="right"><?php echo number_format($gorg);?></td>
					<td align="right"><?php echo number_format($jml_saldoa2,2);?></td>
				</tr> <?php
			}?>
			<tr><td colspan="10"><strong><?php echo $row['nmproduk']; ?></strong></td></tr>
			<tr>
			<td>&nbsp;</td>
			<td colspan="9"><strong>NAMA SALES : <?php echo $row['namas'];?></strong></td>
			</tr><?php
			$jsaldo_awal=0;$jkas_debet=0;$jkas_kredit=0;$jmemo_debet=0;$jmemo_kredit=0;$jsaldo_akhir=0;$jorg=0;
			$gsaldo_awal=0;$gkas_debet=0;$gkas_kredit=0;$gmemo_debet=0;$gmemo_kredit=0;$gsaldo_akhir=0;$gorg=0;
		}else{
			if($salesx<>$row['kdsales']){ 
				if($jsaldo_awal==0){
					$jml_saldoa1=100;
					$jml_saldoa2=100;
				}else{
					$jml_saldoa1=($jsaldo_akhir/$jsaldo_awal)*100;
					$jml_saldoa2=($gsaldo_akhir/$gsaldo_awal)*100;	
				}?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="2" align="center"><strong>JUMLAH</strong></td>
					<td align="right"><?php echo number_format($jsaldo_awal); ?></td>
					<td align="right"><?php echo number_format($jkas_debet); ?></td>
					<td align="right"><?php echo number_format($jkas_kredit); ?></td>
					<td align="right"><?php echo number_format($jmemo_debet); ?></td>
					<td align="right"><?php echo number_format($jmemo_kredit); ?></td>
					<td align="right"><?php echo number_format($jsaldo_akhir); ?></td>
					<td align="right"><?php echo number_format($jorg);?></td>
					<td align="right"><?php echo number_format($jml_saldoa1,2);?></td>
				</tr>
				<tr>
				<td>&nbsp;</td>
				<td colspan="9"><strong>NAMA SALES : <?php echo $row['namas'];?></strong></td>
				</tr>
				<?php
				$jsaldo_awal=0;$jkas_debet=0;$jkas_kredit=0;$jmemo_debet=0;$jmemo_kredit=0;$jsaldo_akhir=0;$jorg=0;
			}
		}
		$jml_saldoa1=0;
		if($row['saldo']>0){
			$jml_saldoa1=($row['saldoa']/$row['saldo'])*100;
		}
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $xkolek;?></td>
			<td align="right" width="10%"><?php echo number_format($row['saldo']); ?></td>
			<td align="right"><?php echo number_format($row['mutdeb']); ?></td>
			<td align="right"><?php echo number_format($row['mutkre']); ?></td>
			<td align="right"><?php echo number_format($row['memdeb']); ?></td>
			<td align="right"><?php echo number_format($row['memkre']); ?></td>
			<td align="right" width="10%"><?php echo number_format($row['saldoa']); ?></td>
			<td align="right" width="5%"><?php echo $row['org']; ?></td>
			<td align="right" width="5%"><?php echo number_format($jml_saldoa1,2);?></td>
		</tr>
		<?php
		$jsaldo_awal=$jsaldo_awal+$row['saldo'];
		$jkas_debet=$jkas_debet+$row['mutdeb'];
		$jkas_kredit=$jkas_kredit+$row['mutkre'];
		$jmemo_debet=$jmemo_debet+$row['memdeb'];
		$jmemo_kredit=$jmemo_kredit+$row['memkre'];
		$jsaldo_akhir=$jsaldo_akhir+$row['saldoa'];
		$jorg=$jorg+$row['org'];
		
		$gsaldo_awal=$gsaldo_awal+$row['saldo'];
		$gkas_debet=$gkas_debet+$row['mutdeb'];
		$gkas_kredit=$gkas_kredit+$row['mutkre'];
		$gmemo_debet=$gmemo_debet+$row['memdeb'];
		$gmemo_kredit=$gmemo_kredit+$row['memkre'];
		$gsaldo_akhir=$gsaldo_akhir+$row['saldoa'];
		$gorg=$gorg+$row['org'];
		
		$tsaldo_awal=$tsaldo_awal+$row['saldo'];
		$tkas_debet=$tkas_debet+$row['mutdeb'];
		$tkas_kredit=$tkas_kredit+$row['mutkre'];
		$tmemo_debet=$tmemo_debet+$row['memdeb'];
		$tmemo_kredit=$tmemo_kredit+$row['memkre'];
		$tsaldo_akhir=$tsaldo_akhir+$row['saldoa'];
		$torg=$torg+$row['org'];

		$vbayar=$row['produk'];
		$salesx=$row['kdsales'];
		$no++;
	}
	if($jsaldo_awal>0){
		$jml_saldoa1=($jsaldo_akhir/$jsaldo_awal)*100;
	}else{
		$jml_saldoa1=100;
	}
	if($gsaldo_awal>0){
		$jml_saldoa2=($gsaldo_akhir/$gsaldo_awal)*100;
	}else{
		$jml_saldoa2=100;
	}
	if($tsaldo_awal>0){
		$jml_saldoa3=($tsaldo_akhir/$tsaldo_awal)*100;
	}else{
		$jml_saldoa3=100;
	}
	?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center"><strong>JUMLAH</strong></td>
		<td align="right"><?php echo number_format($jsaldo_awal); ?></td>
		<td align="right"><?php echo number_format($jkas_debet); ?></td>
		<td align="right"><?php echo number_format($jkas_kredit); ?></td>
		<td align="right"><?php echo number_format($jmemo_debet); ?></td>
		<td align="right"><?php echo number_format($jmemo_kredit); ?></td>
		<td align="right"><?php echo number_format($jsaldo_akhir); ?></td>
		<td align="right"><?php echo number_format($jorg); ?></td>
		<td align="right"><?php echo number_format($jml_saldoa1,2);?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center"><strong>GRAND TOTAL</strong></td>
		<td align="right"><?php echo number_format($gsaldo_awal); ?></td>
		<td align="right"><?php echo number_format($gkas_debet); ?></td>
		<td align="right"><?php echo number_format($gkas_kredit); ?></td>
		<td align="right"><?php echo number_format($gmemo_debet); ?></td>
		<td align="right"><?php echo number_format($gmemo_kredit); ?></td>
		<td align="right"><?php echo number_format($gsaldo_akhir); ?></td>
		<td align="right"><?php echo number_format($gorg); ?></td>
		<td align="right"><?php echo number_format($jml_saldoa2,2);?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center"><strong>TOTAL</strong></td>
		<td align="right"><?php echo number_format($tsaldo_awal); ?></td>
		<td align="right"><?php echo number_format($tkas_debet); ?></td>
		<td align="right"><?php echo number_format($tkas_kredit); ?></td>
		<td align="right"><?php echo number_format($tmemo_debet); ?></td>
		<td align="right"><?php echo number_format($tmemo_kredit); ?></td>
		<td align="right"><?php echo number_format($tsaldo_akhir); ?></td>
		<td align="right"><?php echo number_format($torg); ?></td>
		<td align="right"><?php echo number_format($jml_saldoa3,2);?></td>
	</tr>
</tbody>
