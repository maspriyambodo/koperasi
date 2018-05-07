<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th colspan="12">DIISI OLEH KOPERASI</th>
	<th colspan="4">DIISI OLEH PETUGAS CABANG BANK BTPN</th>
	<th rowspan="3">JUMLAH TUNGGAKAN</th>
	<th colspan="2">REKENING BANK</th>
	<th rowspan="3">KETERANGAN /TGL TRANSAKSI/JW</th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2">NO</th>
	<th rowspan="2">NOPEN</th>
	<th rowspan="2">KODE CABANG</th>
	<th rowspan="2">BTPN CABANG</th>
	<th rowspan="2">NAMA DEBITUR</th>
	<th colspan="2">NO REKENING</th>
	<th rowspan="2">TANGGAL AWAL TAGIHAN</th>
	<th rowspan="2">TANGGAL LUNAS TAGIHAN</th>
	<th rowspan="2">TAGIHAN PER BULAN</th>
	<th rowspan="2">TAGIHAN SUSULAN</th>
	<th rowspan="2">JUMLAH TAGIHAN</th>
	<th rowspan="2">USIA >74</th>
	<th rowspan="2">LOAN DI BTPN</th>
	<th rowspan="2">SURAT KUASA & SPECIMENT</th>
	<th rowspan="2">HASIL SCREENING</th>
	<th rowspan="2">CIF BANK</th>
	<th rowspan="2">NO ASO BANK</th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<th>KOPERASI</th>
	<th>BANK BTPN</th>
</tr>
</thead>
<tbody><?php
	$jumlah1=0;$jumlah2=0;$no=1;$vbayar="";
	$tjumlah1=0;$tjumlah2=0;$x=1;$tagihan=0;
	while ($row = $result->row($hasil)) {
		$dy=date('d',strtotime($row['tgtran']));
		$bl=date('m',strtotime($row['tgtran']));
		$th=date('Y',strtotime($row['tgtran']));
		$date=new DateTime();
		$date->setDate($th,$bl,$dy);
		addMonths($date,$x);
		$mtgtran=$date->format('Y-m-d');
		$bln=date('m',strtotime($row['tgtran']));
		$thn=date('Y',strtotime($row['tgtran']));
		$bulanyy=$thn.$bln;$ketkolek=$row['ketkolek'];
		$tagihan=$row['tagihan'];
		if($tagihan>=$row['jumlah']){
			$tagihan=$row['jumlah'];
		}
		if ($vbayar!=$row['kkbayar']){ 
			if($no>1){ ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td colspan="9" align="center">JUMLAH</td>
				<td align="right"><?php echo formatrp($jumlah2); ?></td>
				<td align="right"><?php echo formatrp(0); ?></td>
				<td align="right"><?php echo formatrp($jumlah2); ?></td>
				<td align="right" colspan="4">&nbsp;</td>
				<td align="right"><?php echo formatrp($jumlah1); ?></td>
				<td align="right" colspan="3">&nbsp;</td>
			</tr><?php
			}$jumlah1=0;$jumlah2=0;
		}?>		
		<tr>
			<td><?php echo $no; ?></td>
			<td>&nbsp;<?php echo $row['nopen']; ?></td>
			<td>&nbsp;<?php echo substr($row['nocitra'],0,4); ?></td>
			<td><?php echo $row['nmbayar']; ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td>&nbsp;<?php echo $row['norek'];?></td>
			<td>&nbsp;<?php echo $row['nocitra'];?></td>
			<td align="center"><?php $bl1=date('m',strtotime($mtgtran));$th1=date('Y',strtotime($mtgtran));echo $bl1.'-01-'.$th1; ?></td>
			<td align="center"><?php $bl1=date('m',strtotime($row['tgl_jatuh_tempo']));$th1=date('Y',strtotime($row['tgl_jatuh_tempo']));echo $bl1.'-01-'.$th1; ?></td>		
			<td align="right"><?php echo formatrp($tagihan);?></td>
			<td align="right"><?php echo formatrp(0);?></td>
			<td align="right"><?php echo formatrp($tagihan);?></td>
			<td align="center"><?php echo $row['umur'];?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td align="right"><?php echo formatrp($row['jumlah']);?></td>
			<td align="center"><?php echo $row['no_cif_bank'];?></td>
			<td align="center"><?php echo $row['no_aso_bank'];?></td>
						<td><?php include "../parameter/alasan_kolek.php"; echo $xkkolek.' / '.date_sql($row['tgtran']).' / '.$row['jangka'];?></td>
		</tr><?php 
		$jumlah1 +=$row['jumlah'];
		$tjumlah1 +=$row['jumlah'];		
		$jumlah2 +=$tagihan;
		$tjumlah2 +=$tagihan;
		$vbayar=$row['kkbayar'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="9" align="center">JUMLAH</td>
		<td align="right"><?php echo formatrp($jumlah2); ?></td>
		<td align="right"><?php echo formatrp(0); ?></td>
		<td align="right"><?php echo formatrp($jumlah2); ?></td>
		<td align="right" colspan="4">&nbsp;</td>
		<td align="right"><?php echo formatrp($jumlah1); ?></td>
		<td align="right" colspan="3">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="9" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($tjumlah2); ?></td>
		<td align="right"><?php echo formatrp(0); ?></td>
		<td align="right"><?php echo formatrp($tjumlah2); ?></td>
		<td align="right" colspan="4">&nbsp;</td>
		<td align="right"><?php echo formatrp($tjumlah1); ?></td>
		<td align="right" colspan="3">&nbsp;</td>
	</tr>
</tbody>