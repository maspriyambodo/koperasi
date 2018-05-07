<?php 
include 'h_tetap.php';
$norek = $result->c_d($_POST['nonas']);
$bln = $result->c_d($_POST['bln']);
$thn = $result->c_d($_POST['thn']);
$m=date_sql($tanggal);$branch = $kcabang;$saldo=0;$tx=$thn.'-'.$bln.'-01';
$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.norek,a.saldoawal,a.saldoakhir,DATE_FORMAT(a.tgbuka,'%d-%m-%Y') AS tgbuka,b.nama FROM $tabel_tabungan a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.norek='$norek' LIMIT 1");$row=$result->row($hasil);
$nama=$row['nama'];$tgtran = $row['tgbuka'];$saldoawal = $row['saldoawal'];$saldoakhir=$result->save_saldo($norek,$saldoawal);
$sblokir = $result->save_blokir($norek);
$temtran = $userid;$result->tem_tabel($temtran,'tem_transaksi');
if($bln.$thn==$blnxxx.$thnxxx){
	$text= "INSERT INTO $temtran(branch,norek,nonas,kdtran,produk,jumlah,keterangan,tanggal,notransaksi,jtransaksi) SELECT branch,norek,nonas,kdtran,produk,jumlah,keterangan,tanggal,notransaksi,jtransaksi FROM $tabelTransaksi WHERE tanggal>='$tx' AND norek='$norek'";$result->res($text);
}else{
	$saldoawal=0;$bln=date('m',strtotime($tgtran));$thn=date('Y',strtotime($tgtran));$tx=$tgtran;$tabel ='tabu';$tabel .=$bln;$tabel .=$thn;
	$hasil=$result->res("SELECT saldoawal FROM $tabel WHERE norek='$norek' LIMIT 1");
	if($hasil){
		if($result->num($hasil)>0){
			$row = $result->row($hasil);$saldoawal=$row['saldoawal'];
		}
	}
	$x = $thn;$y=intval($bln);
	do{
		for ($i = $y; $i <= 12; $i++){
			$blny=substr("00"."".$i,-2);
			$tabel="tran";
			$tabel .=$blny;$tabel .=substr($x,-2);
			$result->res("INSERT INTO $temtran(branch,norek,nonas,kdtran,produk,jumlah,keterangan,tanggal,notransaksi,jtransaksi) SELECT branch,norek,nonas,kdtran,produk,jumlah,keterangan,tanggal,notransaksi,jtransaksi FROM $tabel WHERE tanggal>='$tx' AND norek='$norek'");
			if($i==12) $y=1;
		}
		$x++;
	}while ($x<=$thnxxx);
}
$hasil=$result->query_lap("SELECT branch,norek,nonas,kdtran,produk,jumlah,keterangan,Date_format(tanggal, '%d-%m-%Y') as tanggal,notransaksi,jtransaksi FROM $temtran");
?>
<div id="divPageData">
	<table>	
		<tr><td colspan="6">NAMA&nbsp;&nbsp;&nbsp;: <?php echo $nama;?></td></tr>
		<tr><td colspan="6">NOREK&nbsp;: <?php echo $norek;?></td></tr>
	</table>
	<table width="100%" class="table-line">	
	    <thead><tr><th >NO</th><th >KETERANGAN</th><th >TANGGAL</th><th >MUTASI DEBET</th><th >MUTASI KREDIT</th><th >SALDO</th></tr></thead>
		<tbody>
		<tr><td colspan="5">SALDO AWAL</td><td><?php echo formatrp($saldoawal);?></td></tr>
		<?php
		$counter = 1;
		while($data = $result->row($hasil)){ ?>
			<tr>
				<td><?php echo $counter;?></td>
				<td><?php echo $data['keterangan'];?></td>
				<td><?php echo $data['tanggal'];?></td>
				<?php 
				if (substr($data['kdtran'],0,1)==1 OR substr($data['kdtran'],0,1)==3){ ?>
					<td><?php echo formatrp($data['jumlah']);?></td>
					<td><?php echo formatrp(0);?></td>
					<td><?php $saldoawal=$saldoawal-$data['jumlah']; echo formatrp($saldoawal);?></td>
					<?php
				}else{
					?>
					<td><?php echo formatrp(0);?></td>
					<td><?php echo formatrp($data['jumlah']);?></td>
					<td><?php $saldoawal=$saldoawal+$data['jumlah']; echo formatrp($saldoawal);?></td>
					<?php
				}?>
			</tr>
			<?php
			$counter++;
		}?>
		</tbody>
	</table>
<div style="width: 400px;">
	<table width="50%" class="table-line">
		<tr class="ui-state-highlight">
			<td>SALDO NOMINATIF</td>
			<td>: <?php echo formatRupiah($saldoakhir);?></td>
		</tr>
		<tr class="ui-state-highlight">
			<td>SALDO BLOKIR </td>
			<td>: <?php echo formatRupiah($sblokir);?></td>
		</tr>
		<tr class="ui-state-highlight">
			<td>SALDO EFEKTIF</td>
			<td>: <?php echo formatRupiah($saldoakhir-$sblokir);?></td>
		</tr>		
	</table>
</div>	
</div>