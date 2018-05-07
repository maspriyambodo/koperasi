<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_batal_kredit.js"></script>
<script type="text/javascript" src="java/_tambah_iconx.js"></script>
<?php 
$no_transaksi=$result->c_d($_POST['norek']);$kode_branch=$kcabang;$no_rekening='';
$hasil=$result->query_lap("SELECT branch,nonas,norek,sufix,norekgl,nokredit,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,produk,jumlah,nama FROM $tabelTransaksi WHERE notransaksi='$no_transaksi' AND kdbranch='$kode_branch' ORDER BY produk");
?>
<table class="table" width="100%">
	<thead>
	<tr>
		<th>NO</th>
		<th>NONAS</th>
		<th>NOREK</th>
		<th>NAMA</th>
		<th>DEBET</th>
		<th>KREDIT</th>
		<th>NOTRAN</th>
		<th>KETERANGAN</th>
		<th>OPERATOR</th>
		<th>OTORISASI</th>
	</tr>
	</thead>
	<tbody><?php
		$jpokok=0;$jbunga=0;$no=1;$vbayar="";$tpokok=0;$tbunga=0;
		while ($row = $result->row($hasil)) {
			if ($vbayar!=$row['produk']){ 
				if($no>1){?>
				<tr>
					<td colspan="4" align="center">JUMLAH</td>
					<td align="right"><?php echo number_format($jpokok); ?></td>
					<td align="right"><?php echo number_format($jbunga); ?></td>
					<td align="right" colspan="4">&nbsp;</td>
					<?php $jpokok=0;$jbunga=0;?>
				</tr><?php
				}?>
				<tr>
					<td colspan="10"><strong><?php echo ' TYPE REKENING : '.$row['produk']; ?></strong></td>
				</tr><?php
				$no=1;
			}?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $row['branch'].'-'.$row['nonas'].'-'.$row['sufix']; ?></td>
				<td>
					<?php 
					echo $row['nokredit']; 
					if(substr($row['produk'],0,1)=='K'){
						$no_rekening=$row['nokredit']; 
					}
					?>
				</td>
				<td><?php echo $row['nama']; ?></td> <?php
				 if (substr($row['kdtran'],0,1)=='3') { ?>
					<td align="right">  <?php  echo number_format($row['jumlah']); ?></td> 
					<td align="right">0</td>
					<?php
					$jpokok=$jpokok+$row['jumlah'];
					$tpokok=$tpokok+$row['jumlah'];
				 }else{ ?>
					<td align="right">0</td>
					<td align="right">  <?php  echo number_format($row['jumlah']); ?></td>
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
			<td align="right"><?php echo number_format($jpokok); ?></td>
			<td align="right"><?php echo number_format($jbunga); ?></td>
			<td align="right" colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="center">TOTAL</td>
			<td align="right"><?php echo number_format($tpokok); ?></td>
			<td align="right"><?php echo number_format($tbunga); ?></td>
			<td align="right" colspan="4">&nbsp;</td>
		</tr>
	</tbody>
</table>
<div align="center">
	<form id="masuk" name="masuk" method="POST" action="" >
	<input type="hidden" name="kode_branch" id="kode_branch" value="<?php echo $kode_branch; ?>"/>
	<input type="hidden" name="no_transaksi" id="no_transaksi" value="<?php echo $no_transaksi;?>"/>
	<table width="100%">
		<tr>
			<td align="center">No Rekening : 
			<input type="text" name="no_rekening" id="no_rekening" value="<?php echo $no_rekening; ?>"/>
			</td>
		</tr>
	</table>
	<div class="ui-widget-content" align="center">
		<button type="button" id="simpan">Pinjaman Di Batalkan</button>
		<button type="button" id="kembali">Kembali</button>
	</div>
	</form>
</div>