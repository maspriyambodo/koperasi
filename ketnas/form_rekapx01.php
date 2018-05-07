<table style="border-collapse: collapse;" width="100%" border="1" align="center" cellpadding="3px" >
<thead>
<tr><td colspan="17" align="center"><?php echo $desc.'<br>'.$cabang;?></td></tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th rowspan="3">NO</th>
		<th rowspan="3">JENIS PEMINJAM</th>
		<th colspan="15">KOLEKTIBILITAS PER JENIS PEMINJAM</th>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th colspan="3">LANCAR</th>
		<th colspan="3">PERHATIAN KHUSUS</th>
		<th colspan="3">KURANG LANCAR</th>
		<th colspan="3">DIRAGUKAN</th>
		<th colspan="3">MACET</th>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th>OBD</th>
		<th>REK</th>
		<th>%</th>
		<th>OBD</th>
		<th>REK</th>
		<th>%</th>
		<th>OBD</th>
		<th>REK</th>
		<th>%</th>
		<th>OBD</th>
		<th>REK</th>
		<th>%</th>
		<th>OBD</th>
		<th>REK</th>
		<th>%</th>
	</tr>
</thead>
<tbody>
<?php
$vbayar='';$vlunas='';$no=1;
$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;$jml_saldoa4=0;$jml_saldoa5=0;
$org_saldoa1=0;$org_saldoa2=0;$org_saldoa3=0;$org_saldoa4=0;$org_saldoa5=0;
while ($row=$result->row($hasil)){ 
	$jumlah=$row['saldoa1']+$row['saldoa2']+$row['saldoa3']+$row['saldoa4']+$row['saldoa5'];?>
	<tr>
		<td><?php echo $no; ?></td>
		<td width="20%"><?php echo $row['nmproduk'];?></td>
		<td align="right"><?php echo number_format($row['saldoa1']);?></td>
		<td align="right"><?php echo $row['orang1'];?></td>
		<?php $jum=($row['saldoa1']/$jumlah)*100;?>
		<td align="right"><?php echo number_format($jum,2);?> %</td>
		<td align="right"><?php echo number_format($row['saldoa2']);?></td>
		<td align="right"><?php echo $row['orang2'];?></td>
		<?php $jum=($row['saldoa2']/$jumlah)*100;?>
		<td align="right"><?php echo number_format($jum,2);?> %</td>
		<td align="right"><?php echo number_format($row['saldoa3']);?></td>
		<td align="right"><?php echo $row['orang3'];?></td>
		<?php $jum=($row['saldoa3']/$jumlah)*100;?>
		<td align="right"><?php echo number_format($jum,2);?> %</td>
		<td align="right"><?php echo number_format($row['saldoa4']);?></td>
		<td align="right"><?php echo $row['orang4'];?></td>
		<?php $jum=($row['saldoa4']/$jumlah)*100;?>
		<td align="right"><?php echo number_format($jum,2);?> %</td>
		<td align="right"><?php echo number_format($row['saldoa5']);?></td>
		<td align="right"><?php echo $row['orang5'];?></td>
		<?php $jum=($row['saldoa5']/$jumlah)*100;?>
		<td align="right"><?php echo number_format($jum,2);?> %</td>
	</tr> <?php
	$jml_saldoa1=$jml_saldoa1+$row['saldoa1'];
	$jml_saldoa2=$jml_saldoa2+$row['saldoa2'];
	$jml_saldoa3=$jml_saldoa3+$row['saldoa3'];
	$jml_saldoa4=$jml_saldoa4+$row['saldoa4'];
	$jml_saldoa5=$jml_saldoa5+$row['saldoa5'];
	
	$org_saldoa1=$org_saldoa1+$row['orang1'];
	$org_saldoa2=$org_saldoa2+$row['orang2'];
	$org_saldoa3=$org_saldoa3+$row['orang3'];
	$org_saldoa4=$org_saldoa4+$row['orang4'];
	$org_saldoa5=$org_saldoa5+$row['orang5'];
	$no++;
}
$jumlah=$jml_saldoa1+$jml_saldoa2+$jml_saldoa3+$jml_saldoa4+$jml_saldoa5;
?>
<tr class="td" bgcolor="#e5e5e5">
	<td colspan="2"><strong>JUMLAH</strong></td>
	<td align="right"><?php echo number_format($jml_saldoa1);?></td>
	<td align="right"><?php echo $org_saldoa1;?></td>
	<?php $jum=($jml_saldoa1/$jumlah)*100;?>
	<td align="right"><?php echo number_format($jum,2);?> %</td>
	<td align="right"><?php echo number_format($jml_saldoa2);?></td>
	<td align="right"><?php echo $org_saldoa2;?></td>
	<?php $jum=($jml_saldoa2/$jumlah)*100;?>
	<td align="right"><?php echo number_format($jum,2);?> %</td>
	<td align="right"><?php echo number_format($jml_saldoa3);?></td>
	<td align="right"><?php echo $org_saldoa3;?></td>
	<?php $jum=($jml_saldoa3/$jumlah)*100;?>
	<td align="right"><?php echo number_format($jum,2);?> %</td>
	<td align="right"><?php echo number_format($jml_saldoa4);?></td>
	<td align="right"><?php echo $org_saldoa4;?></td>
	<?php $jum=($jml_saldoa4/$jumlah)*100;?>
	<td align="right"><?php echo number_format($jum,2);?> %</td>
	<td align="right"><?php echo number_format($jml_saldoa5);?></td>
	<td align="right"><?php echo $org_saldoa5;?></td>
	<?php $jum=($jml_saldoa5/$jumlah)*100;?>
	<td align="right"><?php echo number_format($jum,2);?> %</td>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<td colspan="2"><strong>&nbsp;</strong></td>
</tr>
</tbody>
</table>
