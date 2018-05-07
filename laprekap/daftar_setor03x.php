<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>NOREK</th>
	<th>NAMA</th>
	<th>TANGGAL</th>
	<th>OBD</th>
	<th>POKOK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>DENDA</th>
	<th>JUMLAH</th>
	<th>JW</th>
	<th>NOREK BTPN</th>
	<th>KETERANGAN</th>
</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";$vlunas='';
	$jsaldo=0;$jpokok=0;$jbunga=0;$jadm=0;$jdenda=0;$jjumlah1=0;
	$gsaldo=0;$gpokok=0;$gbunga=0;$gadm=0;$gdenda=0;$gjumlah1=0;
	$tsaldo=0;$tpokok=0;$tbunga=0;$tadm=0;$tdenda=0;$tjumlah1=0;
	while ($row=$result->row($hasil)){
		if ($vbayar!=$row['produk']){ 
			if($no>1){?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="4" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
					<td align="right"><?php echo formatrp($jsaldo);?></td>
					<td align="right"><?php echo formatrp($jpokok);?></td>
					<td align="right"><?php echo formatrp($jbunga);?></td>
					<td align="right"><?php echo formatrp($jadm);?></td>
					<td align="right"><?php echo formatrp($jdenda); ?></td>
					<td align="right"><?php echo formatrp($jjumlah1);?></td>
					<td align="right" colspan="3">&nbsp;</td>
				</tr>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="4" align="center"><strong>GRAND TOTAL</strong></td>
					<td align="right"><?php echo formatrp($gsaldo);?></td>
					<td align="right"><?php echo formatrp($gpokok);?></td>
					<td align="right"><?php echo formatrp($gbunga);?></td>
					<td align="right"><?php echo formatrp($gadm);?></td>
					<td align="right"><?php echo formatrp($gdenda); ?></td>
					<td align="right"><?php echo formatrp($gjumlah1);?></td>
					<td align="right" colspan="3">&nbsp;</td>
				</tr>
				<?php 
				$jsaldo=0;$jpokok=0;$jbunga=0;$jadm=0;$jdenda=0;$jjumlah1=0;
				$gsaldo=0;$gpokok=0;$gbunga=0;$gadm=0;$gdenda=0;$gjumlah1=0;$no=1;
			}?>
			<tr><td colspan="13"><strong><?php echo $row['nmproduk']; ?></strong></td></tr><?php $no=1;
		}
		if($no>1){
			if ($vlunas!=$row['kkbayar']){ 
				if ($vbayar==$row['produk']){ ?>
					<tr class="td" bgcolor="#e5e5e5">
						<td colspan="4" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
						<td align="right"><?php echo formatrp($jsaldo);?></td>
						<td align="right"><?php echo formatrp($jpokok);?></td>
						<td align="right"><?php echo formatrp($jbunga);?></td>
						<td align="right"><?php echo formatrp($jadm);?></td>
						<td align="right"><?php echo formatrp($jdenda); ?></td>
						<td align="right"><?php echo formatrp($jjumlah1);?></td>
						<td align="right" colspan="3">&nbsp;</td>
					</tr>
					<?php
					$jnomi1=0;$jobd1=0;$jpokok1=0;$jbunga1=0;$jadm1=0;$jjumlah1=0;$jpokok2=0;$jbunga2=0;$jadm2=0;$jjumlah2=0;
				}
			}
		}?>
		<tr>
			<td ><?php echo $no; ?></td>
			<td align="left">&nbsp;<?php echo$row['norek'];?></td>
			<td align="left" width="20%"><?php echo $row['nama'];?></td>
			<td align="center"><?php echo date_sql($row['tanggal']);?></td>
			<td align="right"><?php echo formatrp($row['saldoa']);?></td>
			<td align="right"><?php echo formatrp($row['pokok']);?></td>
			<td align="right"><?php echo formatrp($row['bunga']);?></td>
			<td align="right"><?php echo formatrp($row['adm']);?></td>
			<td align="right"><?php echo formatrp($row['denda']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah']);?></td>
			<td align="center"><?php echo $row['jangka']; ?></td>
			<td align="left" width="20%"><?php echo $row['nocitra']; ?></td>
			<td align="left" width="20%"><?php echo $row['no_aso_bank']; ?></td>
		</tr><?php 
		$jsaldo +=$row['saldoa'];
		$jpokok +=$row['pokok'];
		$jbunga +=$row['bunga'];
		$jadm   +=$row['adm'];
		$jjumlah1+=$row['jumlah'];

		$gsaldo +=$row['saldoa'];
		$gpokok +=$row['pokok'];
		$gbunga +=$row['bunga'];
		$gadm   +=$row['adm'];
		$gjumlah1+=$row['jumlah'];
		
		$tsaldo +=$row['saldoa'];
		$tpokok +=$row['pokok'];
		$tbunga +=$row['bunga'];
		$tadm   +=$row['adm'];
		$tjumlah1+=$row['jumlah'];
		
		$vbayar=$row['produk'];
		$vlunas=$row['kkbayar'];
		$vnmbayar=$row['nmbayar'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
		<td align="right"><?php echo formatrp($jsaldo);?></td>
		<td align="right"><?php echo formatrp($jpokok);?></td>
		<td align="right"><?php echo formatrp($jbunga);?></td>
		<td align="right"><?php echo formatrp($jadm);?></td>
		<td align="right"><?php echo formatrp($jdenda); ?></td>
		<td align="right"><?php echo formatrp($jjumlah1);?></td>
		<td align="right" colspan="3">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center"><strong>GRAND TOTAL</strong></td>
		<td align="right"><?php echo formatrp($gsaldo);?></td>
		<td align="right"><?php echo formatrp($gpokok);?></td>
		<td align="right"><?php echo formatrp($gbunga);?></td>
		<td align="right"><?php echo formatrp($gadm);?></td>
		<td align="right"><?php echo formatrp($gdenda); ?></td>
		<td align="right"><?php echo formatrp($gjumlah1);?></td>
		<td align="right" colspan="3">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($tsaldo);?></td>
		<td align="right"><?php echo formatrp($tpokok);?></td>
		<td align="right"><?php echo formatrp($tbunga);?></td>
		<td align="right"><?php echo formatrp($tadm);?></td>
		<td align="right"><?php echo formatrp($tdenda); ?></td>
		<td align="right"><?php echo formatrp($tjumlah1);?></td>
		<td align="right" colspan="3">&nbsp;</td>
	</tr>
</tbody>