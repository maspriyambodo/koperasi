<?php 
include '../h_tetap.php';
$desc="DAFTAR TAGIHAN BULAN : ".nmbulan(PAR_BLN).' '.PAR_THN;
$no=1;$tabel =$tabel_payment;
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Angsuran.xls");
echo '<html>';
echo '<head>';
echo '<title>DAFTAR ANGSURAN</title>';
echo '</head>';
echo '<body>';?>
<div id="users-contain" class="ui-widget">
<table class="ui-widget ui-widget-content" style="border-collapse: collapse;" width="100%" border="1" align="center" cellpadding="3px" >
<thead>
<tr>
	<td colspan="18" align="center"><?php echo $desc;?></td>
</tr>
<tr>
	<th>NO</th>
	<th>NOREK</th>
	<th>NAMA</th>
	<th>NOPEN</th>
	<th>NODAPEM</th>
	<th>POKOK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>JUMLAH</th>
	<th>REK TAGIHAN</th>
	<th>KTR BAYAR</th>	
	<th>J WAKTU</th>
	<th>TGL PINJAM</th>
	<th>TGL TAGIHAN</th>
	<th>KD TRAN</th>
	<th>NOMINAL</th>
	<th>KE</th>	
	<th>TAGIHAN</th>
</tr>
</thead>
<tbody><?php
	$xbln=PAR_BLN;$xbln .=PAR_THN
	$hasil=$result->query_x1("SELECT a.branch,a.nonas,a.norek,a.nama,b.nodapem,b.nopen,a.kdkop,a.pokok,a.bunga,a.adm,a.angsurke,a.tgtagihan,a.jumlah,a.kdtran,a.bulan,a.produk,b.jangka,b.nomi,b.noreks,b.kkbayar,b.nmbayar,b.tgtran FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.bulan='$xbln' ORDER BY b.produk,a.norek");
	$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;$no=1;$vbayar="";
	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah1=0;$tjumlah2=0;
	while ($row = $result->row($hasil)) {
		if ($vbayar!=$row['produk']){ 
			if($no>1){  ?>
			<tr>
				<td colspan="5" align="center">JUMLAH</td>
				<td align="right"><?php echo $jpokok; ?></td>
				<td align="right"><?php echo $jbunga; ?></td>
				<td align="right"><?php echo $jadm; ?></td>
				<td align="right"><?php echo $jumlah1; ?></td>
				<td align="right">&nbsp;</td>
				<?php $jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;?>
			</tr> <?php
			}?>
			<tr>
				<td colspan="18"><strong><?php echo ' PRODUK : '.$row['produk']; ?></strong></td>
			</tr><?php
			$no=1;
		}?>
		<tr>
			<td align="left"><?php echo $no; ?></td>
			<td align="left"><?php echo $row['norek']; ?></td>
			<td align="left"><?php echo $row['nama']; ?></td>
			<td align="left"><?php echo $row['nopen']; ?></td>
			<td align="left"><?php echo $row['nodapem']; ?></td>
			<td align="right"><?php echo $row['pokok']; ?></td>
			<td align="right"><?php echo $row['bunga']; ?></td>
			<td align="right"><?php echo $row['adm']; ?></td>
			<td align="right"><?php echo $row['jumlah']; ?></td>
			<td align="right"><?php echo $row['noreks']; ?></td>
			<td align="right"><?php echo $row['kkbayar'].' '.$row['nmbayar']; ?></td>
			<td align="right"><?php echo $row['jangka']; ?></td>
			<td align="right"><?php echo date_sql($row['tgtran']); ?></td>
			<td align="right"><?php echo date_sql($row['tgtagihan']); ?></td>
			<td align="right"><?php echo date_sql($row['kdtran']); ?></td>
			<td align="right"><?php echo $row['nomi']; ?></td>
			<td align="right"><?php echo $row['angsurke'].' - '.$row['bulan']; ?></td>
			<td align="right"><?php echo date_sql($row['kdkop']); ?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jumlah1=$jumlah1+$row['jumlah'];
		
		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah1=$tjumlah1+$row['jumlah'];
		
		$vbayar=$row['produk'];
		$no++; 
	}?>
	<tr>
		<td colspan="5" align="center">JUMLAH</td>
		<td align="right"><?php echo $jpokok; ?></td>
		<td align="right"><?php echo $jbunga; ?></td>
		<td align="right"><?php echo $jadm; ?></td>
		<td align="right"><?php echo $jumlah1; ?></td>
		<td align="right" colspan="9">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5" align="center">TOTAL</td>
		<td align="right"><?php echo $tpokok; ?></td>
		<td align="right"><?php echo $tbunga; ?></td>
		<td align="right"><?php echo $tadm; ?></td>
		<td align="right"><?php echo $tjumlah1; ?></td>
		<td align="right" colspan="9">&nbsp;</td>
	</tr>
</tbody>
</table>
</div>
<?php
echo '</body>';
echo '</html>';
?>