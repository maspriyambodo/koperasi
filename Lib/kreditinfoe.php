<?php
echo '<table width="100%">
<tr>
	<td>Kode Produk</td>
	<td>: '.$row['produk'].' [ '.$nmproduk.' ]</td>
	<td>Nomor Rekening</td>
	<td>: '.$row['norek'].'</td>
</tr>
<tr>
	<td>Skim Tagihan</td>
	<td>: '.$xkdkop.'</td>
	<td >Nama Sales</td>
	<td>: '.$row['kdsales'].' [ '.$nmsales.' ]</td>
</tr>
<tr>
	<td>Kantor Bayar</td>
	<td>: '.$row['kkbayar'].' [ '.$row['nmbayar'].' ]'.'</td>
	<td>Wilayah Kantor</td>
	<td>: '.$row['kdbyr'].' [ ';
	$file='json/wilayah.json';
	$json_file = file_get_contents($file);
	$jfo = json_decode($json_file,TRUE);
	for ($i=0; $i<count($jfo); $i++) {
		if($jfo[$i]['branch']==$row['branch']){
			if ($row['kdbyr']==$jfo[$i]['kd']) {
				echo $jfo[$i]['nmkb'];
			}
		}
	}
	echo ' ]</td>
</tr>
<tr>
	<td><strong>Pencairan Pinjaman</strong></td>
	<td>: <strong>';
	if($row['kode_cair']==0){
		echo"GIRO BTPN";
	}elseif($row['kode_cair']==1){
		echo"TUNAI";
	}else{
		echo"UANG MUKA";
	}
	echo '</strong></td>
	<td>Rekening Tagihan</td>
	<td>: '.$row['noreks'].'</td>
</tr>
</table></br>
<table class="table-no" width="100%">
<tr>
	<td>Saldo Pelunasan</td>
	<td>: '.formatRupiah($row['plunas']).'</td>
	<td colspan="2" align="right">Nominal Pinjaman</td>
	<td colspan="2">: '.formatRupiah($row['nomi']).'</td>
</tr><tr>
	<td>Bunga Pelunasan</td>
	<td>: '.formatRupiah($row['blunas']).'</td>
	<td colspan="2" align="right">Suku Bunga</td>
	<td colspan="2">: '.$row['suku'].' %'.'</td>
</tr><tr>
	<td>Adm Pelunasan</td>
	<td>: '.formatRupiah($row['alunas']).'</td>
	<td colspan="2" align="right">Jangka Waktu</td>
	<td colspan="2">: '.$row['jangka'].' '.$xkdkop.'</td>
</tr><tr>
	<td>Denda Angsuran</td>
	<td>: '.formatRupiah($row['dbunga']).'</td>
	<td colspan="2" align="right">Tanggal Transaksi</td>
	<td colspan="2">: '.$row['tgtran'].'</td>
</tr><tr>
	<td><strong>JUMLAH PELUNASAN</strong></td>
	<td>: '.formatRupiah($jumlunas).'</td>
</tr><tr>
<td colspan="6">&nbsp;</td>
</tr><tr>
	<td>Pokok Angsuran</td>
	<td>: '.formatRupiah($row['pokok']).'</td>
	<td>Simpanan Pokok</td>
	<td>: '.formatRupiah($row['simpokok']).'</td>
	<td>Biaya Asuransi</td>
	<td>: '.formatRupiah($row['jumpremi']).'</td>	
</tr><tr>
	<td>Bunga Angsuran</td>
	<td>: '.formatRupiah($row['bunga']).'</td>
	<td>Simpanan Wajib</td>
	<td>: '.formatRupiah($row['simwajib']).'</td>
	<td>Biaya Meterai</td>
	<td>: '.formatRupiah($row['meterai']).'</td>
</tr><tr>
	<td>Adm Angsuran</td>
	<td>: '.formatRupiah($row['administrasi']).'</td>
	<td><strong>JUMLAH SIMPANAN</strong></td>
	<td>: '.formatRupiah($jumsimpan).'</td>
	<td>Potongan Grace Period</td>
	<td>: '.formatRupiah($row['jum_period']).'</td>
</tr>
<tr>
	<td><strong>JUMLAH ANGSURAN</strong></td>
	<td>: '.formatRupiah($jumangsuran).'</td>
	<td>Biaya Provisi</td>
	<td>: '.formatRupiah($row['jumprovisi']).'</td>
	<td>Potongan Lainnya</td>
	<td>: '.formatRupiah($row['jumbtl']).'</td>
</tr>
<tr>
	<td>Jumlah Angsuran Pertama</td>
	<td>: '.formatRupiah($row['pot_angsuran']).'</td>
	<td>Biaya Administrasi</td>
	<td>: '.formatRupiah($row['jumadm']).'</td>	
	<td><strong>JUMLAH POTONGAN</strong></td>
	<td>: '.formatRupiah($jumpotong).'</td>	
</tr>
<tr>
	<td colspan="4">&nbsp;</td>
	<td class="ui-widget-header"><strong>JUMLAH DITERIMA</strong></td>
	<td class="ui-widget-header">: '.formatRupiah($jumbersih).'</td>
</tr>
</table>';
?>