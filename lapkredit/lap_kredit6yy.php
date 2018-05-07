<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th rowspan="2">NO</th>
		<th rowspan="2">REKENING</th>
		<th rowspan="2">NAMA</th>
		<th rowspan="2">NOPEN</th>
		<th colspan="4">TIDAK TERTAGIH</th>
		<th colspan="5">SETORAN TAGIHAN</th>
		<th colspan="5">NET TIDAK TERTAGIH</th>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th>POKOK</th>
		<th>BUNGA</th>
		<th>ADM</th>
		<th>JUMLAH</th>
		<th>POKOK</th>
		<th>BUNGA</th>
		<th>ADM</th>
		<th>JUMLAH</th>
		<th>%</th>
		<th>POKOK</th>
		<th>BUNGA</th>
		<th>ADM</th>
		<th>JUMLAH</th>
		<th>%</th>
	</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";$vlunas='';
	$jpokok=0;$jbunga=0;$jadm=0;$jumlah=0;$jpokok1=0;$jbunga1=0;$jadm1=0;$jumlah1=0;$jpokok2=0;$jbunga2=0;$jadm2=0;$jumlah2=0;
	$gpokok=0;$gbunga=0;$gadm=0;$gjumlah=0;$gpokok1=0;$gbunga1=0;$gadm1=0;$gjumlah1=0;$gpokok2=0;$gbunga2=0;$gadm2=0;$gjumlah2=0;
	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah=0;$tpokok1=0;$tbunga1=0;$tadm1=0;$tjumlah1=0;$tpokok2=0;$tbunga2=0;$tadm2=0;$tjumlah2=0;
	//while ($row = $result->fetch_array(MYSQLI_BOTH)) {
	while ($row=$result->row($hasil)){
		if ($vbayar!=$row['produk']){ 
			if($no>1){ ?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="4" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<td align="right"><?php echo formatrp($jbunga); ?></td>
					<td align="right"><?php echo formatrp($jadm); ?></td>
					<td align="right"><?php echo formatrp($jumlah); ?></td>
					<td align="right"><?php echo formatrp($jpokok1); ?></td>
					<td align="right"><?php echo formatrp($jbunga1); ?></td>
					<td align="right"><?php echo formatrp($jadm1); ?></td>
					<td align="right"><?php echo formatrp($jumlah1); ?></td>
					<td align="right">
						<?php 
							$percent=($jumlah1/$jumlah)*100;
							echo number_format($percent,2);
						?>
					</td>
					<td align="right"><?php echo formatrp($jpokok2); ?></td>
					<td align="right"><?php echo formatrp($jbunga2); ?></td>
					<td align="right"><?php echo formatrp($jadm2); ?></td>
					<td align="right"><?php echo formatrp($jumlah2); ?></td>
					<td align="right">
						<?php 
							$percent=($jumlah2/$jumlah)*100;
							echo number_format($percent,2);
						?>
					</td>
				</tr>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="4" align="center"><strong>GRAND TOTAL</strong></td>
					<td align="right"><?php echo formatrp($gpokok); ?></td>
					<td align="right"><?php echo formatrp($gbunga); ?></td>
					<td align="right"><?php echo formatrp($gadm); ?></td>
					<td align="right"><?php echo formatrp($gjumlah); ?></td>
					<td align="right"><?php echo formatrp($gpokok1); ?></td>
					<td align="right"><?php echo formatrp($gbunga1); ?></td>
					<td align="right"><?php echo formatrp($gadm1); ?></td>
					<td align="right"><?php echo formatrp($gjumlah1); ?></td>
					<td align="right">
						<?php 
							$percent=($gjumlah1/$gjumlah)*100;
							echo number_format($percent,2);
						?>
					</td>
					<td align="right"><?php echo formatrp($gpokok2); ?></td>
					<td align="right"><?php echo formatrp($gbunga2); ?></td>
					<td align="right"><?php echo formatrp($gadm2); ?></td>
					<td align="right"><?php echo formatrp($gjumlah2); ?></td>
					<td align="right">
						<?php 
							$percent=($gjumlah2/$gjumlah)*100;
							echo number_format($percent,2);
						?>
					</td>
				</tr>
				<?php
				$jpokok=0;$jbunga=0;$jadm=0;$jumlah=0;$jpokok1=0;$jbunga1=0;$jadm1=0;$jumlah1=0;$jpokok2=0;$jbunga2=0;$jadm2=0;$jumlah2=0;
				$gpokok=0;$gbunga=0;$gadm=0;$gjumlah=0;$gpokok1=0;$gbunga1=0;$gadm1=0;$gjumlah1=0;$gpokok2=0;$gbunga2=0;$gadm2=0;$gjumlah2=0;
			}?>
			<tr><td colspan="18"><strong><?php echo 'JENIS PRODUK : '.$row['nmproduk']; ?></strong></td></tr><?php
			$no=1;
		}
		if($no>1){
			if ($vlunas!=$row['kkbayar']){ 
				if ($vbayar==$row['produk']){ ?>
					<tr class="td" bgcolor="#e5e5e5">
						<td colspan="4" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
						<td align="right"><?php echo formatrp($jpokok); ?></td>
						<td align="right"><?php echo formatrp($jbunga); ?></td>
						<td align="right"><?php echo formatrp($jadm); ?></td>
						<td align="right"><?php echo formatrp($jumlah); ?></td>
						<td align="right"><?php echo formatrp($jpokok1); ?></td>
						<td align="right"><?php echo formatrp($jbunga1); ?></td>
						<td align="right"><?php echo formatrp($jadm1); ?></td>
						<td align="right"><?php echo formatrp($jumlah1); ?></td>
						<td align="right">
							<?php 
								$percent=($jumlah1/$jumlah)*100;
								echo number_format($percent,2);
							?>
						</td>
						<td align="right"><?php echo formatrp($jpokok2); ?></td>
						<td align="right"><?php echo formatrp($jbunga2); ?></td>
						<td align="right"><?php echo formatrp($jadm2); ?></td>
						<td align="right"><?php echo formatrp($jumlah2); ?></td>
						<td align="right">
							<?php 
								$percent=($jumlah2/$jumlah)*100;
								echo number_format($percent,2);
							?>
						</td>
					</tr>
					<?php
					$jpokok=0;$jbunga=0;$jadm=0;$jumlah=0;$jpokok1=0;$jbunga1=0;$jadm1=0;$jumlah1=0;$jpokok2=0;$jbunga2=0;$jadm2=0;$jumlah2=0;
				}
			}
		}
		if($row['kdtran']==888){
			$clsname="evet";
		}else{
			$clsname="";
		}
		?>
		<tr class="<?php if(isset($clsname)) echo $clsname;?>">
			<td ><?php echo $no; ?></td>
			<td ><?php echo $row['norek']; ?></td>
			<td ><?php echo $row['nama']; ?></td>
			<td ><?php echo $row['nopen']; ?></td>
			<td align="right"><?php echo formatrp($row['pokok']); ?></td>
			<td align="right"><?php echo formatrp($row['bunga']); ?></td>
			<td align="right"><?php echo formatrp($row['adm']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah']); ?></td>
			<td align="right"><?php echo formatrp($row['pokok1']); ?></td>
			<td align="right"><?php echo formatrp($row['bunga1']); ?></td>
			<td align="right"><?php echo formatrp($row['adm1']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah1']); ?></td>
			<td align="right">
				<?php 
					$percent=($row['jumlah1']/$row['jumlah'])*100;
					echo number_format($percent,2);
				?>
			</td>
			<td align="right"><?php echo formatrp($row['pokok2']); ?></td>
			<td align="right"><?php echo formatrp($row['bunga2']); ?></td>
			<td align="right"><?php echo formatrp($row['adm2']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah2']); ?></td>
			<td align="right">
				<?php 
					$percent=($row['jumlah2']/$row['jumlah'])*100;
					echo number_format($percent,2);
				?>
			</td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jumlah=$jumlah+$row['jumlah'];
		$jpokok1=$jpokok1+$row['pokok1'];
		$jbunga1=$jbunga1+$row['bunga1'];
		$jadm1=$jadm1+$row['adm1'];
		$jumlah1=$jumlah1+$row['jumlah1'];
		$jpokok2=$jpokok2+$row['pokok2'];
		$jbunga2=$jbunga2+$row['bunga2'];
		$jadm2=$jadm2+$row['adm2'];
		$jumlah2=$jumlah2+$row['jumlah2'];
		//$jumlah2=$jumlah2+$row['rekening'];
		
		$gpokok=$gpokok+$row['pokok'];
		$gbunga=$gbunga+$row['bunga'];
		$gadm=$gadm+$row['adm'];
		$gjumlah=$gjumlah+$row['jumlah'];
		$gpokok1=$gpokok1+$row['pokok1'];
		$gbunga1=$gbunga1+$row['bunga1'];
		$gadm1=$gadm1+$row['adm1'];
		$gjumlah1=$gjumlah1+$row['jumlah1'];
		$gpokok2=$gpokok2+$row['pokok2'];
		$gbunga2=$gbunga2+$row['bunga2'];
		$gadm2=$gadm2+$row['adm2'];
		$gjumlah2=$gjumlah2+$row['jumlah2'];
		//$jumlah2=$jumlah2+$row['rekening'];

		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah=$tjumlah+$row['jumlah'];
		$tpokok1=$tpokok1+$row['pokok1'];
		$tbunga1=$tbunga1+$row['bunga1'];
		$tadm1=$tadm1+$row['adm1'];
		$tjumlah1=$tjumlah1+$row['jumlah1'];
		$tpokok2=$tpokok2+$row['pokok2'];
		$tbunga2=$tbunga2+$row['bunga2'];
		$tadm2=$tadm2+$row['adm2'];
		$tjumlah2=$tjumlah2+$row['jumlah2'];
		//$tjumlah2=$tjumlah2+$row['rekening'];
		$vbayar=$row['produk'];
		$vlunas=$row['kkbayar'];
		$vnmbayar=$row['nmbayar'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm); ?></td>
		<td align="right"><?php echo formatrp($jumlah); ?></td>
		<td align="right"><?php echo formatrp($jpokok1); ?></td>
		<td align="right"><?php echo formatrp($jbunga1); ?></td>
		<td align="right"><?php echo formatrp($jadm1); ?></td>
		<td align="right"><?php echo formatrp($jumlah1); ?></td>
		<td align="right">
			<?php 
				$percent=($jumlah1/$jumlah)*100;
				echo number_format($percent,2);
			?>
		</td>
		<td align="right"><?php echo formatrp($jpokok2); ?></td>
		<td align="right"><?php echo formatrp($jbunga2); ?></td>
		<td align="right"><?php echo formatrp($jadm2); ?></td>
		<td align="right"><?php echo formatrp($jumlah2); ?></td>
		<td align="right">
			<?php 
				$percent=($jumlah2/$jumlah)*100;
				echo number_format($percent,2);
			?>
		</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center"><strong>GRAND TOTAL</strong></td>
		<td align="right"><?php echo formatrp($gpokok); ?></td>
		<td align="right"><?php echo formatrp($gbunga); ?></td>
		<td align="right"><?php echo formatrp($gadm); ?></td>
		<td align="right"><?php echo formatrp($gjumlah); ?></td>
		<td align="right"><?php echo formatrp($gpokok1); ?></td>
		<td align="right"><?php echo formatrp($gbunga1); ?></td>
		<td align="right"><?php echo formatrp($gadm1); ?></td>
		<td align="right"><?php echo formatrp($gjumlah1); ?></td>
		<td align="right">
			<?php 
				$percent=($gjumlah1/$gjumlah)*100;
				echo number_format($percent,2);
			?>
		</td>
		<td align="right"><?php echo formatrp($gpokok2); ?></td>
		<td align="right"><?php echo formatrp($gbunga2); ?></td>
		<td align="right"><?php echo formatrp($gadm2); ?></td>
		<td align="right"><?php echo formatrp($gjumlah2); ?></td>
		<td align="right">
			<?php 
				$percent=($gjumlah2/$gjumlah)*100;
				echo number_format($percent,2);
			?>
		</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center"><strong>TOTAL</strong></td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tadm); ?></td>
		<td align="right"><?php echo formatrp($tjumlah); ?></td>
		<td align="right"><?php echo formatrp($tpokok1); ?></td>
		<td align="right"><?php echo formatrp($tbunga1); ?></td>
		<td align="right"><?php echo formatrp($tadm1); ?></td>
		<td align="right"><?php echo formatrp($tjumlah1); ?></td>
		<td align="right">
			<?php 
				$percent=($tjumlah1/$tjumlah)*100;
				echo number_format($percent,2);
			?>
		</td>
		<td align="right"><?php echo formatrp($tpokok2); ?></td>
		<td align="right"><?php echo formatrp($tbunga2); ?></td>
		<td align="right"><?php echo formatrp($tadm2); ?></td>
		<td align="right"><?php echo formatrp($tjumlah2); ?></td>
		<td align="right">
			<?php 
				$percent=($tjumlah2/$tjumlah)*100;
				echo number_format($percent,2);
			?>
		</td>
	</tr>
</tbody>
