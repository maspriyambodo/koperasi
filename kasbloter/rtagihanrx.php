<?php
include '../auth.php';
include '../koneksi.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekp-Kas.xls");
echo '<html>';
echo '<head>';
echo '<title>REKAP KAS</title>';
echo '</head>';
echo '<body>';
include "../kasbloter/qtagihanr.php";
$desc="REKAP MUTASI KAS BESAR TANGGAL  : ".$tgl1;
$no=1;
?>
<table style="border-collapse: collapse;" width="100%" border="1" align="center" cellpadding="3px" >
<thead>
<tr><td colspan="6" align="center"><?php echo $desc.'<br>'.$cabang;?></td></tr>
<tr>
	<th>NO</th>
	<th>NONAS</th>
	<th>NOREK</th>
	<th>NOREK GSSL</th>
	<th>NAMA</th>
	<th>DEBET</th>
	<th>KREDIT</th>
	<th>OPERATOR</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$jbunga=0;$no=1;$vbayar="";
	$tpokok=0;$tbunga=0;?>
	<tr>
		<td colspan="7">SALDO AWAL</td><td align="right"><?php echo number_format($saldo_awal); ?></td>
	</tr><?php
	while ($row = $result->fetch_array(MYSQLI_BOTH)) {
		if ($vbayar!=$row['produk']){ ?>
			<tr>
				<td colspan="5" align="center">JUMLAH</td>
				<td align="right"><?php echo $jpokok; ?></td>
				<td align="right"><?php echo $jbunga; ?></td>
				<td align="right">&nbsp;</td>
				<?php $jpokok=0;$jbunga=0;?>
			</tr>
			<tr>
				<td colspan="8"><strong><?php echo 'TYPE REKENING : '.$row['produk']; ?></strong></td>
			</tr><?php
			$no=1;
		}?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row['branch'].'-'.$row['nonas'].'-'.$row['sufix']; ?></td>
			<td><?php echo $row['norek']; ?></td>
			<td><?php echo substr($row['norekgl'],0,4).'-'.substr($row['norekgl'],4,6).'-'.substr($row['norekgl'],-3); ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td align="right"><?php echo $row['debetm']; ?></td>
			<td align="right"><?php echo $row['kreditm']; ?></td>
			<td align="center"><?php echo $row['oper']; ?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['debetm'];
		$jbunga=$jbunga+$row['kreditm'];
		$tpokok=$tpokok+$row['debetm'];
		$tbunga=$tbunga+$row['kreditm'];
		$vbayar=$row['produk'];
		$no++;
	}?>
	<tr>
		<td colspan="5" align="center">JUMLAH</td>
		<td align="right"><?php echo $jpokok; ?></td>
		<td align="right"><?php echo $jbunga; ?></td>
		<td align="right">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5" align="center">TOTAL</td>
		<td align="right"><?php echo $tpokok; ?></td>
		<td align="right"><?php echo $tbunga; ?></td>
		<td align="right">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="7">SALDO AKHIR</td><td align="right"><?php echo number_format($saldo_awal+$tpokok-$tbunga); ?></td>
	</tr>
</tbody>
</table>
<?php
echo '</body>';
echo '</html>';
?>