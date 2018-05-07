<?php
include '../h_tetap.php';
$desc='DAFTAR DATA TABUNGAN';
$no=1;$tabel='nabasa.tabu';$tabel .=PAR_BLN;$tabel .=PAR_THN;$no=1; 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Tabungan.xls");
echo '<html>';
echo '<head>';
echo '<title>DAFTAR NOMINATIF TABUNGAN</title>';
echo '</head>';
echo '<body>';?>
<div id="users-contain" class="ui-widget">
<table class="ui-widget ui-widget-content" style="border-collapse: collapse;" width="100%" border="1" align="center" cellpadding="3px" >
<tr>
	<td colspan="17" align="center"><?php echo $desc;?></td>
</tr>
<thead>
	<tr>
		<th rowspan="2">NO</th>
		<th rowspan="2">NOREK</th>
		<th rowspan="2">NAMA</th>
		<th rowspan="2">TG BUKA</th>
		<th rowspan="2">SALDO BLOKIR</th>
		<th rowspan="2">SALDO AWAL</th>
		<th colspan="2">MUTASI KAS</th>
		<th colspan="2">MUTASI MEMORIAL</th>
		<th rowspan="2">SALDO AKHIR</th>
		<th rowspan="2">SALDO BUKU</th>
		<th rowspan="2">NO NASABAH</th>
		<th rowspan="2">PRODUK</th>
		<th rowspan="2">NO KTP</th>
		<th rowspan="2">TGL LAHIR</th>
		<th rowspan="2">STATUS</th>
	</tr>
	<tr>
		<th>DEBET</th>
		<th>KREDIT</th>
		<th>DEBET</th>
		<th>KREDIT</th>
	</tr>
</thead>
<tbody>
<?php
$hasil =$result->query_x1("SELECT a.norek,a.nonas,a.branch,a.sufix,a.tgbuka,a.produk,a.saldoawal,a.mutdebet,a.mutkredit,a.memdebet,a.memkredit,a.saldoakhir,a.kdaktif,a.saldoblokir,a.saldobuku,b.noktp,b.tgllahir,b.nama FROM $tabel_tabungan a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE  a.branch='$kcabang' ORDER BY a.produk,a.norek");
$nomi=0;$sawal=0;$kdebet=0;$kkredit=0;$mdebet=0;$mkredit=0;$sakhir=0;$org=0;$no=1;$vbayar='';
$tnomi=0;$tsawal=0;$tkdebet=0;$tkkredit=0;$tmdebet=0;$tmkredit=0;$tsakhir=0;$torg=0;
while ($row = $result->row($hasil)) {
	if ($vbayar<>$row['produk']){
		if ($no>1){ ?>
			<tr>
				<td colspan="4">JUMLAH</td>
				<td align="right"><?php echo $nomi; ?></td>
				<td align="right"><?php echo $sawal; ?></td>
				<td align="right"><?php echo $kdebet; ?></td>
				<td align="right"><?php echo $kkredit; ?></td>
				<td align="right"><?php echo $mdebet; ?></td>
				<td align="right"><?php echo $mkredit; ?></td>
				<td align="right"><?php echo $sakhir; ?></td>
				<td>&nbsp;</td>
			</tr> <?php
		} ?>
		<tr>
			<td colspan="17"><strong><?php echo 'PRODUK : '.$row['produk']; ?></strong></td>
		</tr> <?php
		$nomi=0;$sawal=0;$kdebet=0;$kkredit=0;$mdebet=0;$mkredit=0;$sakhir=0;$org=0;$no=1;
	}		
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['norek']; ?></td>
		<td><?php echo $row['nama']; ?></td>
		<td><?php echo date_sql($row['tgbuka']); ?></td>
		<td align="right"><?php echo $row['saldoblokir']; ?></td>
		<td align="right"><?php echo $row['saldoawal']; ?></td>
		<td align="right"><?php echo $row['mutdebet']; ?></td>
		<td align="right"><?php echo $row['mutkredit']; ?></td>			
		<td align="right"><?php echo $row['memdebet']; ?></td>
		<td align="right"><?php echo $row['memkredit']; ?></td>			
		<td align="right"><?php echo $row['saldoakhir']; ?></td>
		<td align="right"><?php echo $row['saldobuku']; ?></td>
		<td align="right"><?php echo $row['branch']."-".$row['nonas'].'-'.$row['sufix']; ?></td>	
		<td align="right"><?php echo $row['produk']; ?></td>
		<td align="right"><?php echo $row['noktp']; ?></td>
		<td align="right"><?php echo date_sql($row['tgllahir']); ?></td>
		<td align="right"><?php echo $row['kdaktif']; ?></td>
	</tr> <?php
	$nomi=$nomi+$row['saldoblokir'];
	$sawal=$sawal+$row['saldoawal'];
	$kdebet=$kdebet+$row['mutdebet'];
	$kkredit=$kkredit+$row['mutkredit'];
	$mdebet=$mdebet+$row['memdebet'];
	$mkredit=$mkredit+$row['memkredit'];
	$sakhir=$sakhir+$row['saldoakhir'];
	$tnomi=$tnomi+$row['saldoblokir'];
	$tsawal=$tsawal+$row['saldoawal'];
	$tkdebet=$tkdebet+$row['mutdebet'];
	$tkkredit=$tkkredit+$row['mutkredit'];
	$tmdebet=$tmdebet+$row['memdebet'];
	$tmkredit=$tmkredit+$row['memkredit'];
	$tsakhir=$tsakhir+$row['saldoakhir'];
	$vbayar	=$row['produk'];
	$no++;
}?>
<tr>
	<td colspan="4">JUMLAH</td>
	<td align="right"><?php echo $nomi; ?></td>
	<td align="right"><?php echo $sawal; ?></td>
	<td align="right"><?php echo $kdebet; ?></td>
	<td align="right"><?php echo $kkredit; ?></td>
	<td align="right"><?php echo $mdebet; ?></td>
	<td align="right"><?php echo $mkredit; ?></td>
	<td align="right"><?php echo $sakhir; ?></td>
	<td colspan="6">&nbsp;</td>
</tr>
<tr>
	<td colspan="4">TOTAL</td>
	<td align="right"><?php echo $tnomi; ?></td>
	<td align="right"><?php echo $tsawal; ?></td>
	<td align="right"><?php echo $tkdebet; ?></td>
	<td align="right"><?php echo $tkkredit; ?></td>
	<td align="right"><?php echo $tmdebet; ?></td>
	<td align="right"><?php echo $tmkredit; ?></td>
	<td align="right"><?php echo $tsakhir; ?></td>
	<td colspan="6">&nbsp;</td>
</tr>
</tbody>
</table>
</div>
<?php
echo '</body>';
echo '</html>';
?>