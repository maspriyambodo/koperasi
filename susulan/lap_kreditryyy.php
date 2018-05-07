<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>NOREK</th>
	<th>NAMA</th>
	<th>NOPEN</th>
	<th>REKENING LAIN</th>
	<th>TAGIHAN REGULER</th>
	<th>TAGIHAN SUSULAN</th>
	<th>JUMLAH TAGIHAN</th>
	<th>NAMA SALES</th>
</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";$vlunas='';
	$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;
	$gjumlah1=0;$gjumlah2=0;$gjumlah3=0;
	$tjumlah1=0;$tjumlah2=0;$tjumlah3=0;
	while ($row = $result->row($hasil)) {
		if ($vbayar!=$row['produk']){ 
			if($no>1){ ?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="5" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
					<td align="right"><?php echo formatrp($jjumlah1); ?></td>
					<td align="right"><?php echo formatrp($jjumlah2); ?></td>
					<td align="right"><?php echo formatrp($jjumlah3); ?></td>
					<td align="right" colspan="1">&nbsp;</td>
				</tr>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="5" align="center"><strong>GRAND TOTAL</strong></td>
					<td align="right"><?php echo formatrp($gjumlah1); ?></td>
					<td align="right"><?php echo formatrp($gjumlah2); ?></td>
					<td align="right"><?php echo formatrp($gjumlah3); ?></td>
					<td align="right" colspan="1">&nbsp;</td>
				</tr>
				<?php
				$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;
				$gjumlah1=0;$gjumlah2=0;$gjumlah3=0;
			}?>
			<tr><td colspan="9"><strong><?php echo 'JENIS PRODUK : '.$row['nmproduk']; ?></strong></td></tr><?php
		}
		if($no>1){
			if ($vlunas!=$row['kkbayar']){ 
				if ($vbayar==$row['produk']){ ?>
					<tr class="td" bgcolor="#e5e5e5">
						<td colspan="5" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
						<td align="right"><?php echo formatrp($jjumlah1); ?></td>
						<td align="right"><?php echo formatrp($jjumlah2); ?></td>
						<td align="right"><?php echo formatrp($jjumlah3); ?></td>
						<td align="right" colspan="1">&nbsp;</td>
					</tr>
					<?php
					$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;
				}
			}
		}
		if($row['kdtran']==222){
			$clsname="evet";
		}else{
			$clsname="";
		}
		?>
		<tr class="<?php if(isset($clsname)) echo $clsname;?>">
			<td><?php echo $no; ?></td>
			<td><?php echo $row['norek']; ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td>&nbsp;<?php echo $row['nopen']; ?></td>
			<td>&nbsp;<?php echo $row['nocitra']; ?></td>
			<td align="right"><?php echo formatrp($row['jumlah']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah1']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah2']); ?></td>
			<td align="left"><?php echo $row['namas']; ?></td>
		</tr><?php 
		$jjumlah1=$jjumlah1+$row['jumlah'];
		$jjumlah2=$jjumlah2+$row['jumlah1'];
		$jjumlah3=$jjumlah3+$row['jumlah2'];

		$gjumlah1=$gjumlah1+$row['jumlah'];
		$gjumlah2=$gjumlah2+$row['jumlah1'];
		$gjumlah3=$gjumlah3+$row['jumlah2'];

		$tjumlah1=$tjumlah1+$row['jumlah'];
		$tjumlah2=$tjumlah2+$row['jumlah1'];
		$tjumlah3=$tjumlah3+$row['jumlah2'];

		$vbayar=$row['produk'];
		$vlunas=$row['kkbayar'];
		$vnmbayar=$row['nmbayar'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="5" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
		<td align="right"><?php echo formatrp($jjumlah1); ?></td>
		<td align="right"><?php echo formatrp($jjumlah2); ?></td>
		<td align="right"><?php echo formatrp($jjumlah3); ?></td>
		<td align="right" colspan="1">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="5" align="center"><strong>GRAND TOTAL</strong></td>
		<td align="right"><?php echo formatrp($gjumlah1); ?></td>
		<td align="right"><?php echo formatrp($gjumlah2); ?></td>
		<td align="right"><?php echo formatrp($gjumlah3); ?></td>
		<td align="right" colspan="1">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="5" align="center"><strong>TOTAL</strong></td>
		<td align="right"><?php echo formatrp($tjumlah1); ?></td>
		<td align="right"><?php echo formatrp($tjumlah2); ?></td>
		<td align="right"><?php echo formatrp($tjumlah3); ?></td>
		<td align="right" colspan="1">&nbsp;</td>
	</tr>
</tbody>