<?php 
include '../h_tetap.php';
$blnx=intval(PAR_BLN);
$thnx=PAR_THN;
$blnx++;
if($blnx>12){
	$blnx=1; $thnx++;
	$blnx=substr("00"."".$blnx,-2);
}else{
	$blnx=substr("00"."".$blnx,-2);
}
$desc="DAFTAR TAGIHAN KSP NABASA BULAN : ".nmbulan($blnx).' '.$thnx;$no=1; 
$tabel =$kcabang;
$tabel .=$blnx;
$tabel .=substr($thnx,2,2);
$tabel .='b';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Tagihan.xls");
echo '<html>';
echo '<head>';
echo '<title>RENCANA TAGIHAN</title>';
echo '</head>';
echo '<body>';?>
<table class="ui-widget ui-widget-content" style="border-collapse: collapse;" width="100%" border="1" align="center">
<thead>
<tr>
	<td colspan="12" align="center"><strong><?php echo $desc;?></strong></td>
</tr>
<tr>
	<td colspan="12" align="center"><strong>&nbsp;</strong></td>
</tr>
<tr style="height: 50px">
	<th >NO</th>
	<th >NAMA</th>
	<th>NOPEN</th>
	<th>REKENING BTPN</th>
	<th>NODAPEM</th>
	<th>TGL AWAL TAGIHAN</th>
	<th>TGL AKHIR TAGIHAN</th>
	<th>JUMLAH TAGIHAN </th>
	<th>TAGIHAN SUSULAN</th>
	<th>JUMLAH TAGIHAN YANG HARUS DITAGIH</th>
	<th>JANGKA WAKTU</th>
	<th>NOMINAL</th>
	<th>ANGSURAN KE</th>
</tr>
</thead>
<tbody><?php
	$hasil =$result->query_x1("SELECT a.branch,a.nonas,a.norek,a.nama,b.nodapem,b.nopen,a.pokok,a.bunga,a.adm,a.angsurke,a.jumlah,a.kdtran,b.jangka,b.nomi,b.nocitra,b.kkbayar,b.nmbayar,b.jangka,b.nomi,b.tgtran,b.kdkop FROM $tabel a JOIN kredit b ON a.norek=b.norek WHERE b.produk='KPB' ORDER BY b.kkbayar,a.norek");
	$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;$no=1;$vbayar="";
	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah1=0;$tjumlah2=0;
	while ($row = $result->row($hasil)) {
		$kdkop=$row['kdkop'];
		$jangka=$row['jangka'];
		$tgtran=$row['tgtran'];
		$norek=$row['norek'];
		$x=1;$mtgtran=$tgtran;
		$dy=date('d',strtotime($mtgtran));
		$bl=date('m',strtotime($mtgtran));
		$th=date('Y',strtotime($mtgtran));
		$date=new DateTime();
		$date->setDate($th,$bl,$dy);
		addMonths($date,$x);
		$mtgtran=$date->format('Y-m-d');
		include "../Lib/tgljtt.php";
		if ($vbayar!=$row['kkbayar']){ 
			if($no>1){  ?>
			<tr>
				<td colspan="7" align="center">JUMLAH</td>
				<td align="right"><?php echo $tjumlah1; ?></td>
				<td align="right"><?php echo 0; ?></td>
				<td align="right"><?php echo $jumlah1; ?></td>
				<td align="right">&nbsp;</td>
				<?php $jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;?>
			</tr> <?php
			}?>
			<tr>
				<td colspan="12"><strong><?php echo ' KANTOR BAYAR : '.$row['nmbayar']; ?></strong></td>
			</tr><?php
			$no=1;
		}?>
		<tr>
			<td><?php echo $no; ?></td>
			<td align="left"><?php echo $row['nama']; ?></td>
			<td  align="left" ><?php echo $row['nopen']; ?></td>
			<td align="right"><?php echo $row['nocitra']; ?></td>
			<td align="left"><?php echo $row['nodapem']; ?></td>
			<td align="right"><?php echo $mtgtran; ?></td>
			<td align="right"><?php echo $xtgtran; ?></td>
			<td align="right"><?php echo $row['jumlah']; ?></td>
			<td align="right"><?php echo 0; ?></td>
			<td align="right"><?php echo $row['jumlah']; ?></td>
			<td align="right"><?php echo $row['jangka']; ?></td>
			<td align="right"><?php echo $row['nomi']; ?></td>
			<td align="right"><?php echo $row['angsurke']; ?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jumlah1=$jumlah1+$row['jumlah'];
		
		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah1=$tjumlah1+$row['jumlah'];
		
		$vbayar=$row['kkbayar'];
		$no++; 
	}?>
	<tr>
		<td colspan="7" align="center">JUMLAH</td>
		<td align="right"><?php echo $jumlah1; ?></td>
		<td align="right"><?php echo 0; ?></td>
		<td align="right"><?php echo $jumlah1; ?></td>
		<td align="right" colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="7" align="center">TOTAL</td>
		<td align="right"><?php echo $tjumlah1; ?></td>
		<td align="right"><?php echo 0; ?></td>
		<td align="right"><?php echo $tjumlah1; ?></td>
		<td align="right" colspan="3">&nbsp;</td>
	</tr>
</tbody>
</table>
<?php
echo '</body>';
echo '</html>';
?>