<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2" >NO</th>
	<th rowspan="2">TGL TRANSAKSI</th>
	<th rowspan="2">KETERANGAN</th>
	<th colspan="2">NO REKENING</th>
	<th rowspan="2">JUMLAH</th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<th>NASABAH</th>
	<th>AKUNTANSI</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$jbunga=0;$no=1;$vbayar="";$xtanggal="";
	$tpokok=0;$tbunga=0;$cek=FALSE?>
	<tr>
		<td colspan="5">SALDO KAS AWAL BULAN</td><td align="right"><strong><?php echo formatrp($saldo_awal);?></strong></td>
	</tr>
	<?php
	while($row=$result->row($hasil)) {
		if($no<=1){?>
			<tr>
				<td colspan="6"><strong><h4>KAS MASUK</h4></strong></td>
			</tr>
			<?php
		}
		if($row['nokredit']==2){
			if($cek==FALSE){?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="5"><?php echo 'JUMLAH TANGGAL : '.date_sql($xtanggal);?></td>
					<td align="right"><?php echo formatrp($jpokok);?></td>
					<?php $jpokok=0;$no=1;?>
				</tr>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="5" align="center">TOTAL KAS MASUK</td>
					<td align="right"><?php echo formatrp($tbunga);?></td>
				</tr>
				<tr>
					<td colspan="6"><strong><h4>KAS KELUAR</h4></strong></td>
				</tr>
				<?php
				$cek=TRUE;
			}
		}	
		if ($vbayar!=$row['tanggal']){ 
			if($no>1){?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="5"><?php echo 'JUMLAH TANGGAL : '.date_sql($xtanggal);?></td>
					<td align="right"><?php echo formatrp($jpokok);?></td>
					<?php $jpokok=0;$no=1;?>
				</tr>
				<?php
			}
		}?>
		<tr>
			<td width="5%"><?php echo $no; ?></td>
			<td><?php echo date_sql($row['tanggal']);?></td>
			<td width="40%"><?php echo $row['keterangan'];?></td>
			<td><?php echo $row['norek']; ?></td>
			<td><?php echo $row['norekgl']; ?></td>
			<?php
			 if ($row['nokredit']=='1'){ ?>
				<td align="right"><?php echo formatrp($row['jumlah']);?></td> 
				<?php
				$jpokok=$jpokok+$row['jumlah'];
				$tbunga=$tbunga+$row['jumlah'];
			 }else{
			 	?>
				<td align="right"><?php echo formatrp($row['jumlah']);?></td>
				<?php 
				$jpokok=$jpokok+$row['jumlah'];
				$tpokok=$tpokok+$row['jumlah'];
			}?>
		</tr>
		<?php 
		$vbayar=$row['tanggal'];
		$xtanggal=$row['tanggal'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="5"><?php echo 'JUMLAH TANGGAL : '.date_sql($xtanggal);?></td>
		<td align="right"><?php echo formatrp($jpokok);?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="5" align="center">TOTAL KAS KELUAR</td>
		<td align="right"><?php echo formatrp($tpokok);?></td>
	</tr>
	<tr>
		<td colspan="5">SALDO KAS AKHIR BULAN</td><td align="right"><strong><?php echo formatrp($saldo_awal+$tbunga-$tpokok);?></strong></td>
	</tr>
</tbody>