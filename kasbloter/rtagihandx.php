<?php 
include '../auth.php';
 include '../koneksi.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Transaksi-Kas.xls");
echo '<html>';
echo '<head>';
echo '<title>LAPORAN KAS</title>';
echo '</head>';
echo '<body>';
include "../kasbloter/qtagihand.php";
$desc="DAFTAR MUTASI KAS BESAR TANGGAL : ".$tgl1;
$no=1; ?>
<table style="border-collapse: collapse;" width="100%" border="1" align="center" cellpadding="3px" >
<thead>
<tr>
	<tr><td colspan="10" align="center"><?php echo $desc.'<br>'.$cabang;?></td></tr>
</tr>
<tr>
	<th>NO</th>
	<th>NOREK</th>
	<th>NONAS</th>
	<th>NAMA</th>
	<th>DEBET</th>
	<th>KREDIT</th>
	<th>NOTRAN</th>
	<th>KETERANGAN</th>
	<th>USER ID</th>
	<th>OTORISASI</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$jbunga=0;$no=1;$vbayar="";
	$tpokok=0;$tbunga=0;?>
	<tr>
		<td colspan="8">SALDO AWAL</td><td align="right" colspan="2"><?php echo$saldo_awal; ?></td>
	</tr><?php
	while ($row = $result->fetch_array(MYSQLI_BOTH)) {
		if ($vbayar!=$row['produk']){ ?>
			<tr>
				<td colspan="4" align="center">JUMLAH</td>
				<td align="right"><?php echo $jpokok; ?></td>
				<td align="right"><?php echo $jbunga; ?></td>
				<td align="right" colspan="4">&nbsp;</td>
				<?php $jpokok=0;$jbunga=0;?>
			</tr>
			<tr>
				<td colspan="10"><strong><?php echo ' PRODUK : '.$row['produk']; ?></strong></td>
			</tr><?php
			$no=1;
		}?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row['branch'].'-'.$row['nonas'].'-'.$row['sufix']; ?></td>
			<td><?php echo $row['norek']; ?></td>
			<td><?php echo $row['nama']; ?></td> <?php
			 if (substr($row['kdtran'],0,1)=='1') { ?>
				<td align="right">  <?php  echo $row['jumlah']; ?></td> 
				<td align="right">0</td>
				<?php
				$jpokok=$jpokok+$row['jumlah'];
				$tpokok=$tpokok+$row['jumlah'];
			 }else{ ?>
				<td align="right">0</td>
				<td align="right">  <?php  echo $row['jumlah']; ?></td>
				<?php 
				$jbunga=$jbunga+$row['jumlah'];
				$tbunga=$tbunga+$row['jumlah'];
			} ?>
			<td><?php echo $row['notransaksi']; ?></td>
			<td><?php echo $row['keterangan']; ?></td>
			<td><?php echo $row['oper']; ?></td>
			<td><?php echo $row['otor']; ?></td>
		</tr><?php 
		$vbayar=$row['produk'];
		$no++;
	}?>
	<tr>
		<td colspan="4" align="center">JUMLAH</td>
		<td align="right"><?php echo $jpokok; ?></td>
		<td align="right"><?php echo $jbunga; ?></td>
		<td align="right" colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="4" align="center">TOTAL</td>
		<td align="right"><?php echo $tpokok; ?></td>
		<td align="right"><?php echo $tbunga; ?></td>
		<td align="right" colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="8">SALDO AKHIR</td><td align="right" colspan="2"><?php echo number_format($saldo_awal+$tbunga-$tpokok); ?></td>
	</tr>
</tbody>
</table>
<?php
echo '</body>';
echo '</html>';
?>