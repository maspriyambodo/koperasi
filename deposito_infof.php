<?php 
include 'h_tetap.php';
$id=$result->c_d($_GET['id']);
$hasil=$result->query_lap("SELECT a.id,a.branch,a.sufix,a.nomor_nasabah,a.nama_rekening,a.rekening_internal,a.seri_bilyet,a.nomor_bilyet,a.status_rekening,a.tanggal_buka,a.tanggal_jatuh_tempo,a.net_bunga,a.total_tarik,a.produk,a.nominal,a.jangka_waktu,a.counter_aro,a.counter_rate,a.pajak,a.kena_pajak,a.min_pajak,a.status_rekening,a.sales_id,sandi_deposito,b.nama,a.bunga_via,a.jenis_bunga,b.alamat,b.lurah,b.camat,b.noktp,b.npwp,c.sfinalty FROM deposito.deposits a JOIN $tabel_nasabah b ON b.nonas=a.nomor_nasabah JOIN deposito.prd_deposito c ON a.produk=c.kdproduk WHERE a.id='$id' ORDER BY a.nomor_nasabah LIMIT 1");
$row = $result->row($hasil);
$result->status_deposito($row['status_rekening']);
$branch=$row['branch'];
$sufix=$row['sufix'];
$no_nasabah=$row['nomor_nasabah'];
$nama=$row['nama'];
$alamat=$row['alamat'];
$lurah=$row['lurah'];
$camat=$row['camat'];
$no_ktp=$row['noktp'];
$npwp=$row['npwp'];?>
<form id="masuk" name="masuk" method="POST" action="">
<input name="nonas" type="hidden" id="nonas" value="<?php echo $row['nomor_nasabah'];?>"/>
<input type="hidden" name="h" id="h" maxlength="1" value="3"/>
<table width="100%">
	<tr><th colspan="4" class="ui-state-highlight">DATA NASABAH</th></tr>
	<tr class="ui-state-error">
		<td width="15%">Nama</td>
		<td width="35%">: <?php echo $row['nama'];?></td>
		<td width="15%">No Nasabah</td>
		<td width="35%">: <?php echo $branch.'-'.$no_nasabah.'-'.$sufix;?></td>
	</tr>
	<tr class="ui-state-error">
		<td>Alamat</td>
		<td colspan="3">: <?php echo $row['alamat'].' KEL '.$row['lurah'].' KEC '.$row['camat'];?></td>
	</tr>
	<tr class="ui-state-error">
		<td>No NPWP</td>
		<td>: <?php echo $row['npwp'];?></td>
		<td>No KTP</td>
		<td>: <?php echo $row['noktp'];?></td>
	</tr>
	<tr class="ui-state-error">
		<td>Kode Produk</td>
		<td>: 
		<?php
		$hasil=$result->res("SELECT kdproduk,nmproduk FROM deposito.prd_deposito WHERE kdproduk=".$row['produk']." LIMIT 1");
		if($hasil){
			$data = $result->row($hasil);
			echo $data['kdproduk'].' - '.$data['nmproduk'];
		}?>
		</td>
		<td>Tipe Penarikan Bunga</td>
		<td>: 
		<?php $huruf = array("TUNAI", "PINDAH BUKU", "TRANSFER");$i = 0;
		while ($i < 3) {
			if ($row['bunga_via'] == $i){
				echo $huruf[$i];
			}
			$i++;
		}?>
		</td>		
	</tr>
	<tr class="ui-state-error">	
		<td>Tanggal Buka</td>
		<td>: <?php echo $row['tanggal_buka']; ?></td>
		<td>Tanggal Jatuh Tempo</td>
		<td>: <?php echo $row['tanggal_jatuh_tempo']; ?></td>		
	</tr>
	<tr class="ui-state-error">	
		<td>Tipe Jatuh Tempo</td>
		<td>: 
		<?php $huruf = array("Non-ARO", "ARO","ARO+");$i = 0;
		while ($i < 3){
			if ($row['counter_aro'] == $i){
			 	echo $huruf[$i];
			}
			$i++;
		}?>
		</td>
		<td>Tipe Bunga</td>
		<td>: 
			<?php 
			$huruf = array("HARIAN", "BULANAN");$i = 0;
			while ($i<2) {
				if ($row['jenis_bunga'] == $i){
				 	echo $huruf[$i];
				}
				$i++;
			}?>
		</td>
	</tr>	
	<tr class="ui-state-error">	
		<td>Tipe Bunga</td>
		<td>: 
			<?php 
			$huruf = array("HARIAN", "BULANAN");$i = 0;
			while ($i<2) {
				if ($row['jenis_bunga'] == $i){
				 	echo $huruf[$i];
				}
				$i++;
			}?>
		</td>
		<td>Account Officer</td>
		<td>: 
			<?php
			$hasil=$result->res("SELECT idsales,nama FROM nabasa.sales WHERE idsales=".$row['sales_id']." LIMIT 1");
			if($hasil){
				$data = $result->row($hasil);
				echo $data['idsales'].' - '.$data['nama'];
			}?>
		</td>	
	</tr>
	<tr class="ui-state-error">	
		<td>Jumlah Bunga</td>
		<td>: <?php echo formatRupiah($row['net_bunga']);?></td>
		<td>Bunga Dibayar</td>
		<td>: <?php echo formatRupiah($row['total_tarik']);?></td>
	</tr>
	<tr class="ui-state-error">	
		<td colspan="2">&nbsp;</td>
		<td>Bunga Belum Di Bayar</td>
		<td>: <?php echo formatRupiah($row['net_bunga']-$row['total_tarik']);?></td>
	</tr>
	<tr class="ui-state-error">	
		<td>Status Rekening</td>
		<td>: 
			<?php 
			$huruf=array("BELUM AKTIF","SUDAH AKTIF","DI BLOKIR","DI JAMINKAN","SUDAH DI TUTUP");$i=0;
			while ($i<5) {
				if ($row['status_rekening'] == $i){
					echo $huruf[$i];
				}$i++;
			}?>
		</td>
		<td>Kena Pajak</td>
		<td>: 
			<?php 
			$huruf=array("YA","TIDAK");$i=0;
			while ($i<2) {
				if ($row['kena_pajak'] == $i){
					echo $huruf[$i];
				}$i++;
			}?>
		</td>
	</tr>
	<tr class="ui-state-error">	
		<td>Minimal Kena Pajak</td>
		<td>: <?php echo $row['min_pajak'];?></td>
		<td>Pajak</td>
		<td>: <?php echo $row['pajak'];?></td>
	</tr>
	<tr class="ui-state-error">	
		<td>Nominal Deposito</td>
		<td>: <?php echo formatrp($row['nominal']);?>"</td>
		<td>Nomor Bilyet</td>
		<td>: <?php echo $row['nomor_bilyet'].'-'.$row['seri_bilyet'];?></td>
	</tr>
	<tr class="ui-state-error">
		<td>Jangka Waktu</td>
		<td>: <?php echo $row['jangka_waktu'];?></td>
		<td>Counter Rate</td>
		<td>: <?php echo $row['counter_rate'];?></td>
	</tr>
</table>
<div class="ui-widget-content ui-state-highlight" align="center">
	<input type="button" value="Kembali" id="submit" onclick="goKembali();" class="icon-cancel"/>
</div>
</form>
<script type="text/javascript" src="java/java_umum.js"></script>
<script type="text/javascript">
	var url4="deposito_infop.php"
	function innerHtml(data){
		$('#divPageData').html(data);
	}
</script>