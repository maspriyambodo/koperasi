<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>TANGGAL</th>
	<th>NOREK</th>
	<th>NAMA</th>
	<th>JUMLAH</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$jbunga=0;$no=1;$vbayar="";$xtanggal="";
	$tpokok=0;$tbunga=0;$cek=FALSE?>
	<tr>
		<td colspan="4">SALDO KAS AWAL BULAN</td><td align="right"><strong><?php echo formatrp($saldo_awal);?></strong></td>
	</tr>
	<?php
	while($row=$result->row($hasil)){
		if($no<=1){?>
			<tr>
				<td colspan="5"><strong><h4>KAS MASUK</h4></strong></td>
			</tr>
			<?php
		}
		if($row['nokredit']==2){
			if($cek==FALSE){?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="4"><?php echo 'JUMLAH TANGGAL : '.date_sql($xtanggal);?></td>
					<td align="right"><?php echo formatrp($jpokok);?></td>
					<?php $jpokok=0;$no=1;?>
				</tr>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="4" align="center">TOTAL KAS MASUK</td>
					<td align="right"><?php echo formatrp($tbunga);?></td>
				</tr>
				<tr>
					<td colspan="5"><strong><h4>KAS KELUAR</h4></strong></td>
				</tr>
				<?php
				$cek=TRUE;
			}
		}	
		if ($vbayar!=$row['tanggal']){
			if($no>1){?>
			<tr class="td" bgcolor="#e5e5e5">
				<td colspan="4" align="center"><?php echo 'JUMLAH TANGGAL : '.date_sql($xtanggal);?></td>
				<td align="right"><?php echo formatrp($jpokok);?></td>
				<?php $jpokok=0;$no=1;?>
			</tr><?php
			}
		}?>
		<tr>
			<td width="5%"><?php echo $no; ?></td>
			<td><?php echo date_sql($row['tanggal']);?></td>
			<td><?php echo substr($row['norekgl'],0,4).'-'.substr($row['norekgl'],4,6).'-'.substr($row['norekgl'],-3); ?></td>
			<td width="30%"><?php echo $row['nama']; ?></td>
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
		<td colspan="4"><?php echo 'JUMLAH TANGGAL : '.date_sql($xtanggal);?></td>
		<td align="right"><?php echo formatrp($jpokok);?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center">TOTAL KAS KELUAR</td>
		<td align="right"><?php echo formatrp($tpokok);?></td>
	</tr>
	<tr>
		<td colspan="4">SALDO KAS AKHIR BULAN</td><td align="right"><strong><?php echo formatrp($saldo_awal+$tbunga-$tpokok);?></strong></td>
	</tr>
</tbody>