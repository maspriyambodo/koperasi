<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>NOREK</th>
	<th>NAMA</th>
	<th>PLAFOND</th>
	<th>OUTSTANDING</th>
	<th>POKOK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>JUMLAH</th>
	<th>TUNGGAKAN</th>
	<th>TGL TRANSAKSI</th>
	<th>JW/KOLEK</th>
	<th>KETERANGAN</th>
</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";$vlunas='';
	$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;$jnomi=0;$jsaldoa=0;
	$gpokok=0;$gbunga=0;$gadm=0;$gjumlah1=0;$gjumlah2=0;$gnomi=0;$gsaldoa=0;
	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah1=0;$tjumlah2=0;$tnomi=0;$tsaldoa=0;
	while ($row=$result->row($hasil)){
		if ($vbayar!=$row['produk']){ 
			if($no>1){  ?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="3" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
					<td align="right"><?php echo formatrp($jnomi); ?></td>
					<td align="right"><?php echo formatrp($jsaldoa); ?></td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<td align="right"><?php echo formatrp($jbunga); ?></td>
					<td align="right"><?php echo formatrp($jadm); ?></td>
					<td align="right"><?php echo formatrp($jumlah1); ?></td>
					<td align="right"><?php echo formatrp($jumlah2); ?></td>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="3" align="center"><strong>GRAND TOTAL</strong></td>
					<td align="right"><?php echo formatrp($gnomi); ?></td>
					<td align="right"><?php echo formatrp($gsaldoa); ?></td>
					<td align="right"><?php echo formatrp($gpokok); ?></td>
					<td align="right"><?php echo formatrp($gbunga); ?></td>
					<td align="right"><?php echo formatrp($gadm); ?></td>
					<td align="right"><?php echo formatrp($gjumlah1); ?></td>
					<td align="right"><?php echo formatrp($gjumlah2); ?></td>
					<td colspan="3">&nbsp;</td>
				</tr>
				<?php
				$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;$jnomi=0;$jsaldoa=0;
				$gpokok=0;$gbunga=0;$gadm=0;$gjumlah1=0;$gjumlah2=0;$gnomi=0;$gsaldoa=0;
			}?>
			<tr><td colspan="13"><strong><?php echo ' JENIS PRODUK : '.$row['produk']; ?></strong></td></tr><?php
			$no=1;
		}
		if($no>1){
			if ($vlunas!=$row['kkbayar']){ 
				if ($vbayar==$row['produk']){ ?>
					<tr class="td" bgcolor="#e5e5e5">
						<td colspan="3" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
						<td align="right"><?php echo formatrp($jnomi); ?></td>
						<td align="right"><?php echo formatrp($jsaldoa); ?></td>
						<td align="right"><?php echo formatrp($jpokok); ?></td>
						<td align="right"><?php echo formatrp($jbunga); ?></td>
						<td align="right"><?php echo formatrp($jadm); ?></td>
						<td align="right"><?php echo formatrp($jumlah1); ?></td>
						<td align="right"><?php echo formatrp($jumlah2); ?></td>
						<td colspan="3">&nbsp;</td>
					</tr>
					<?php
					$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;$jnomi=0;$jsaldoa=0;
				}
			}
		}?>
		<tr>
			<td><?php echo $no; ?></td>
			<td>&nbsp;<?php echo $row['norek']; ?></td>
			<td ><?php echo $row['nama']; ?></td>
			<td align="right"><?php echo formatrp($row['nomi']);?></td>
			<td align="right"><?php echo formatrp($row['saldoa']);?></td>
			<td align="right"><?php echo formatrp($row['pokok']);?></td>
			<td align="right"><?php echo formatrp($row['bunga']);?></td>
			<td align="right"><?php echo formatrp($row['adm']);?></td>
			<td align="right"><?php echo formatrp($row['jumlah']);?></td>
			<td align="right"><?php echo formatrp($row['rekening']);?></td>
			<td align="right"><?php echo date_sql($row['tgtran']);?></td>
			<td align="right"><?php echo $row['jangka'].' - '.$row['kolek'];?></td>
			<td align="right">
				<?php echo  $xkkolek='';$ketkolek=$row['ketkolek'];include '../parameter/alasan_kolek.php';
					echo $xkkolek; 
				?>
			</td>
		</tr><?php 
		$jnomi=$jnomi+$row['nomi'];
		$jsaldoa=$jsaldoa+$row['saldoa'];
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jumlah1=$jumlah1+$row['jumlah'];
		$jumlah2=$jumlah2+$row['rekening'];
		
		$gnomi=$gnomi+$row['nomi'];
		$gsaldoa=$gsaldoa+$row['saldoa'];
		$gpokok=$gpokok+$row['pokok'];
		$gbunga=$gbunga+$row['bunga'];
		$gadm=$gadm+$row['adm'];
		$gjumlah1=$gjumlah1+$row['jumlah'];
		$gjumlah2=$gjumlah2+$row['rekening'];

		$tnomi=$tnomi+$row['nomi'];
		$tsaldoa=$tsaldoa+$row['saldoa'];
		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah1=$tjumlah1+$row['jumlah'];
		$tjumlah2=$tjumlah2+$row['rekening'];
		
		$vbayar=$row['produk'];
		$vlunas=$row['kkbayar'];
		$vnmbayar=$row['nmbayar'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
		<td align="right"><?php echo formatrp($jnomi); ?></td>
		<td align="right"><?php echo formatrp($jsaldoa); ?></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm); ?></td>
		<td align="right"><?php echo formatrp($jumlah1); ?></td>
		<td align="right"><?php echo formatrp($jumlah2); ?></td>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center"><strong>GRAND TOTAL</strong></td>
		<td align="right"><?php echo formatrp($jnomi); ?></td>
		<td align="right"><?php echo formatrp($jsaldoa); ?></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm); ?></td>
		<td align="right"><?php echo formatrp($jumlah1); ?></td>
		<td align="right"><?php echo formatrp($jumlah2); ?></td>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center"><strong>TOTAL</strong></td>
		<td align="right"><?php echo formatrp($tnomi); ?></td>
		<td align="right"><?php echo formatrp($tsaldoa); ?></td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tadm); ?></td>
		<td align="right"><?php echo formatrp($tjumlah1); ?></td>
		<td align="right"><?php echo formatrp($tjumlah2); ?></td>
		<td colspan="3">&nbsp;</td>
	</tr>
</tbody>