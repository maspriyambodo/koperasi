<?php
include '../h_tetap.php';
$desc='DAFTAR DATA KREDIT';
$no=1;$tabel='nabasa.nomi';$tabel .=PAR_BLN;$tabel .=PAR_THN;
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Kredit.xls");
echo '<html>';
echo '<head>';
echo '<title>DAFTAR NOMINATIF</title>';
echo '</head>';
echo '<body>';?>
<div id="users-contain" class="ui-widget">
<table class="ui-widget ui-widget-content" style="border-collapse: collapse;" width="100%" border="1" align="center" cellpadding="3px" >
<tr>
	<td colspan="31" align="center"><?php echo $desc;?></td>
</tr>
<thead>
	<tr>
		<th rowspan="2">NO</th>
		<th rowspan="2">NOREK</th>
		<th rowspan="2">NAMA</th>
		<th rowspan="2">TG TRAN</th>
		<th rowspan="2">NOMINAL</th>
		<th rowspan="2">SALDO AWAL</th>
		<th colspan="2">MUTASI KAS</th>
		<th colspan="2">MUTASI MEMORIAL</th>
		<th rowspan="2">SALDO AKHIR</th>
		<th rowspan="2">NO NASABAH</th>
		<th rowspan="2">JW SB KOLEK</th>
		<th rowspan="2">KTR BAYAR</th>
		<th rowspan="2">PRODUK</th>
		<th rowspan="2">GAJI</th>
		<th rowspan="2">POKOK</th>
		<th rowspan="2">BUNGA</th>
		<th rowspan="2">ADM</th>
		<th rowspan="2">KD SALES</th>
		<th rowspan="2">REK BANK</th>
		<th rowspan="2">REK TAGIHAN</th>
		<th rowspan="2">REK S POKOK</th>
		<th rowspan="2">REK S WAJIB</th>
		<th rowspan="2">NO SK</th>
		<th rowspan="2">PENERBIT</th>		
		<th rowspan="2">TGL SK</th>		
		<th rowspan="2">NO KTP</th>
		<th rowspan="2">TGL LAHIR</th>
		<th rowspan="2">TAGIHAN</th>
		<th rowspan="2">NOPEN</th>
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
$hasil =$result->query_x1("SELECT a.norek,a.nonas,a.branch,a.sufix,a.nopen,a.kkbayar,a.nmbayar,a.nomi,a.jangka,a.suku,a.tgtran,a.produk,a.saldo,a.mutdeb,a.mutkre,a.memdeb,a.memkre,a.saldoa,a.kdkop,a.kolek,a.kdsales,a.pokok,a.bunga,a.administrasi,a.nocitra,a.norekp,a.norekw,a.noreks,a.nosk,a.pensk,a.tgsk,a.gaji,a.noktp,a.tglahir,a.notran,b.nama FROM $tabel_kredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE  a.branch='$kcabang' ORDER BY a.kkbayar,a.norek");
$nomi=0;$sawal=0;$kdebet=0;$kkredit=0;$mdebet=0;$mkredit=0;$sakhir=0;$org=0;$no=1;$vbayar='';
$tnomi=0;$tsawal=0;$tkdebet=0;$tkkredit=0;$tmdebet=0;$tmkredit=0;$tsakhir=0;$torg=0;
while ($row = $result->row($hasil)) {
	if ($vbayar<>$row['kkbayar']){
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
			<td colspan="31"><strong><?php echo ' KANTOR BAYAR : '.$row['kkbayar']; ?></strong></td>
		</tr> <?php
		$nomi=0;$sawal=0;$kdebet=0;$kkredit=0;$mdebet=0;$mkredit=0;$sakhir=0;$org=0;$no=1;
	}		
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['norek']; ?></td>
		<td><?php echo $row['nama']; ?></td>
		<td><?php echo date_sql($row['tgtran']).' - '.$row['notran']; ?></td>
		<td align="right"><?php echo $row['nomi']; ?></td>
		<td align="right"><?php echo $row['saldo']; ?></td>
		<td align="right"><?php echo $row['mutdeb']; ?></td>
		<td align="right"><?php echo $row['mutkre']; ?></td>			
		<td align="right"><?php echo $row['memdeb']; ?></td>
		<td align="right"><?php echo $row['memkre']; ?></td>			
		<td align="right"><?php echo $row['saldoa']; ?></td>
		<td align="right"><?php echo $row['branch']."-".$row['nonas'].'-'.$row['sufix']; ?></td>	
		<td align="right"><?php echo $row['jangka']." - ".$row['suku'].' - '.$row['kolek']; ?></td>
		<td><?php echo date_sql($row['kkbayar']).' - '.$row['nmbayar']; ?></td>
		<td align="right"><?php echo $row['produk']; ?></td>
		<td align="right"><?php echo $row['gaji']; ?></td>
		<td align="right"><?php echo $row['pokok']; ?></td>
		<td align="right"><?php echo $row['bunga']; ?></td>
		<td align="right"><?php echo $row['administrasi']; ?></td>
		<td align="right"><?php echo $row['kdsales']; ?></td>
		<td align="right"><?php echo $row['nocitra']; ?></td>
		<td align="right"><?php echo $row['noreks']; ?></td>
		<td align="right"><?php echo $row['norekp']; ?></td>
		<td align="right"><?php echo $row['norekw']; ?></td>
		<td align="right"><?php echo $row['nosk']; ?></td>
		<td align="right"><?php echo $row['pensk']; ?></td>
		<td align="right"><?php echo date_sql($row['tgsk']); ?></td>
		<td align="right"><?php echo $row['noktp']; ?></td>
		<td align="right"><?php echo date_sql($row['tglahir']); ?></td>
		<td align="right"><?php echo $row['kdkop']; ?></td>
		<td align="right"><?php echo $row['nopen']; ?></td>
	</tr> <?php
	$nomi=$nomi+$row['nomi'];
	$sawal=$sawal+$row['saldo'];
	$kdebet=$kdebet+$row['mutdeb'];
	$kkredit=$kkredit+$row['mutkre'];
	$mdebet=$mdebet+$row['memdeb'];
	$mkredit=$mkredit+$row['memkre'];
	$sakhir=$sakhir+$row['saldoa'];
	$tnomi=$tnomi+$row['nomi'];
	$tsawal=$tsawal+$row['saldo'];
	$tkdebet=$tkdebet+$row['mutdeb'];
	$tkkredit=$tkkredit+$row['mutkre'];
	$tmdebet=$tmdebet+$row['memdeb'];
	$tmkredit=$tmkredit+$row['memkre'];
	$tsakhir=$tsakhir+$row['saldoa'];
	$vbayar	=$row['kkbayar'];
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
	<td colspan="19">&nbsp;</td>
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
	<td colspan="19">&nbsp;</td>
</tr>
</tbody>
</table>
</div>
<?php
echo '</body>';
echo '</html>';
?>