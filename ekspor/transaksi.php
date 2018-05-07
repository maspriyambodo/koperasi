<?php
include '../h_tetap.php';
$desc='DAFTAR TRANSAKSI BULAN : '.nmbulan(PAR_BLN).' '.PAR_THN;$no=1; 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment;filename=Transaksi.xls");
echo '<html>';
echo '<head>';
echo '<title>DAFTAR TRANSAKSI</title>';
echo '</head>';
echo '<body>';?>
<div id="users-contain" class="ui-widget">
<table class="ui-widget ui-widget-content" style="border-collapse: collapse;" width="100%" border="1" align="center" cellpadding="3px" >
<tr>
	<td colspan="13" align="center"><?php echo $desc;?></td>
</tr>
<thead>
	<tr>
		<th>NO</th>
		<th>NONAS</th>
		<th>NOREK</th>
		<th>NAMA</th>
		<th>NOREK GL</th>
		<th>NOREK KREDIT</th>
		<th>JUMLAH</th>
		<th>KDTRAN</th>
		<th>JENIS TRAN</th>
		<th>KETERANGAN</th>
		<th>PRODUK</th>
		<th>TANGGAL</th>
		<th>NO REFERENSI</th>
	</tr>
</thead>
<tbody>
<?php
$hasil=$result->query_x1("SELECT branch,nonas,sufix,nama,norek,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,noreferensi FROM $tabelTransaksi WHERE  kdbranch='$kcabang' ORDER BY produk,norek");$nomi=0;$tnomi=0;$vbayar='';
while ($row = $result->row($hasil)) {
	if ($vbayar<>$row['produk']){
		if ($no>1){ ?>
			<tr>
				<td colspan="6">JUMLAH</td>
				<td align="right"><?php echo $nomi; ?></td>
				<td colspan="6">&nbsp;</td>
			</tr> <?php
		} ?>
		<tr>
			<td colspan="13"><strong><?php echo 'PRODUK : '.$row['produk']; ?></strong></td>
		</tr> <?php
		$nomi=0;$no=1;
	}
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td align="right"><?php echo $row['branch']."-".$row['nonas'].'-'.$row['sufix']; ?></td>
		<td><?php echo $row['norek']; ?></td>
		<td><?php echo $row['nama']; ?></td>
		<td><?php echo $row['norekgl']; ?></td>
		<td><?php echo $row['nokredit']; ?></td>
		<td align="right"><?php echo $row['jumlah']; ?></td>
		<td align="right"><?php echo $row['kdtran']; ?></td>
		<td align="right"><?php echo $row['jtransaksi']; ?></td>
		<td><?php echo $row['keterangan']; ?></td>
		<td align="right"><?php echo $row['produk']; ?></td>
		<td align="right"><?php echo date_sql($row['tanggal']); ?></td>
		<td align="right"><?php echo $row['noreferensi']; ?></td>
	</tr> <?php
	$nomi=$nomi+$row['jumlah'];
	$tnomi=$tnomi+$row['jumlah'];
	$vbayar	=$row['produk'];
	$no++;
}?>
<tr>
	<td colspan="6">JUMLAH</td>
	<td align="right"><?php echo $nomi; ?></td>
	<td colspan="6">&nbsp;</td>
</tr>
<tr>
	<td colspan="6">TOTAL</td>
	<td align="right"><?php echo $tnomi; ?></td>
	<td colspan="6">&nbsp;</td>
</tr>
</tbody>
</table>
</div>
<?php
echo '</body>';
echo '</html>';
?>