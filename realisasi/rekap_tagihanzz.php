<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th>NO</th>
		<th>NAMA</th>
		<th>POKOK</th>
		<th>BUNGA</th>
		<th>ADM</th>
		<th>JUMLAH</th>
		<th>REK</th>
	</tr>
</thead>
<tbody>
	<tr><td colspan="7" align="center"><strong><?php echo "RENCANA TAGIHAN BULAN : ".nmbulan($bln).' '.$thn;?></strong></td></tr>
	<?php
	$no=1;$vbayar='';$vlunas='';
	$jpokok=0;$jbunga=0;$jadm=0;$jjumlah=0;$jorg=0;
	$jpokok1=0;$jbunga1=0;$jadm1=0;$jjumlah1=0;$jorg1=0;
	$jpokok2=0;$jbunga2=0;$jadm2=0;$jjumlah2=0;$jorg2=0;
	$jpokok3=0;$jbunga3=0;$jadm3=0;$jjumlah3=0;$jorg3=0;
	$gpokok=0;$gbunga=0;$gadm=0;$gjumlah=0;$gorg=0;
	$gpokok1=0;$gbunga1=0;$gadm1=0;$gjumlah1=0;$gorg1=0;
	$gpokok2=0;$gbunga2=0;$gadm2=0;$gjumlah2=0;$gorg2=0;
	$gpokok3=0;$gbunga3=0;$gadm3=0;$gjumlah3=0;$gorg3=0;
	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah=0;$torg=0;
	$tpokok1=0;$tbunga1=0;$tadm1=0;$tjumlah1=0;$torg1=0;
	$tpokok2=0;$tbunga2=0;$tadm2=0;$tjumlah2=0;$torg2=0;
	$tpokok3=0;$tbunga3=0;$tadm3=0;$tjumlah3=0;$torg3=0;
	while ($row = $result->fetch_array(MYSQLI_BOTH)) {
		if($row['jumlah']>0){
		if($no==1){ ?>
			<tr><td colspan="7"><strong><?php echo $row['nmproduk']; ?></strong></td></tr><?php
		}
		if ($vbayar!=$row['produk']){ 
			if($no>1){?>
				<tr class="td" bgcolor="#e5e5e5">
					<td>&nbsp;</td>
					<td ><strong>JUMLAH : <?php echo $vnmbayar;?> </strong></td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<td align="right"><?php echo formatrp($jbunga); ?></td>
					<td align="right"><?php echo formatrp($jadm);?></td>
					<td align="right"><?php echo formatrp($jjumlah);?></td>
					<td align="right"><?php echo formatrp($jorg);?></td>
				</tr><?php
			}
			$jpokok=0;$jbunga=0;$jadm=0;$jjumlah=0;$jorg=0;
			if ($vlunas==$row['urut']){ ?>
				<tr><td colspan="7"><strong><?php echo $row['nmproduk']; ?></strong></td></tr><?php
			}
		}
		if ($vlunas!=$row['urut']){ 
			if($no>1){ ?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="2"><strong>JUMLAH</strong></td>
					<td align="right"><?php echo formatrp($jpokok1); ?></td>
					<td align="right"><?php echo formatrp($jbunga1); ?></td>
					<td align="right"><?php echo formatrp($jadm1);?></td>
					<td align="right"><?php echo formatrp($jjumlah1);?></td>
					<td align="right"><?php echo formatrp($jorg1);?></td>
				</tr>
				<tr><td colspan="7" align="center">&nbsp;</td></tr><?php
				if($row['urut']==2){ ?>
					<tr><td colspan="7" align="center"><strong><?php echo "REALISASI TAGIHAN BULAN : ".nmbulan($bln).' '.$thn;?></strong></td></tr><?php
				}elseif($row['urut']==3){ ?>
					<tr><td colspan="7" align="center"><strong><?php echo "SETORAN TAGIHAN BULAN : ".nmbulan($bln).' '.$thn;?></strong></td></tr><?php
				}elseif($row['urut']==4){ ?>
					<tr><td colspan="7" align="center"><strong><?php echo "TIDAK TERTAGIH BULAN : ".nmbulan($bln).' '.$thn;?></strong></td></tr><?php
				}
				if ($vlunas!=$row['urut']){ ?>
					<tr><td colspan="7"><strong><?php echo $row['nmproduk']; ?></strong></td></tr><?php
				}
			}
			$jpokok1=0;$jbunga1=0;$jadm1=0;$jjumlah1=0;$jorg1=0;
		}?>
		<tr>
			<td ><?php echo $no; ?></td>
			<td align="left"><?php echo $row['nama']; ?></td>
			<td align="right"><?php echo formatrp($row['pokok']);?></td>
			<td align="right"><?php echo formatrp($row['bunga']);?></td>
			<td align="right"><?php echo formatrp($row['adm']);?></td>
			<td align="right"><?php echo formatrp($row['jumlah']);?></td>
			<td align="right"><?php echo formatrp($row['rek']);?></td>
		</tr>
		<?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jjumlah=$jjumlah+$row['jumlah'];
		$jorg=$jorg+$row['rek'];
		
		$jpokok1=$jpokok1+$row['pokok'];
		$jbunga1=$jbunga1+$row['bunga'];
		$jadm1=$jadm1+$row['adm'];
		$jjumlah1=$jjumlah1+$row['jumlah'];
		$jorg1=$jorg1+$row['rek'];
		
		$vbayar=$row['produk'];
		$vlunas=$row['urut'];
		$vnmbayar=$row['nmproduk'];
		$no++;
		}
	}
	?>
	<tr class="td" bgcolor="#e5e5e5">
		<td>&nbsp;</td>
		<td ><strong>JUMLAH : <?php echo $vnmbayar;?> </strong></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm);?></td>
		<td align="right"><?php echo formatrp($jjumlah);?></td>
		<td align="right"><?php echo formatrp($jorg);?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2"><strong>JUMLAH</strong></td>
		<td align="right"><?php echo formatrp($jpokok1); ?></td>
		<td align="right"><?php echo formatrp($jbunga1); ?></td>
		<td align="right"><?php echo formatrp($jadm1);?></td>
		<td align="right"><?php echo formatrp($jjumlah1);?></td>
		<td align="right"><?php echo formatrp($jorg1);?></td>
	</tr>
</tbody>