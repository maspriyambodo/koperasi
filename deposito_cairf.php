<?php 
include 'h_tetap.php';
$id=$result->c_d($_GET['id']);
$hasil=$result->query_lap("SELECT a.id,a.branch,a.sufix,a.nomor_nasabah,a.nama_rekening,a.rekening_internal,a.seri_bilyet,a.nomor_bilyet,a.status_rekening,a.tanggal_buka,a.tanggal_jatuh_tempo,a.net_bunga,a.total_tarik,a.produk,a.nominal,a.jangka_waktu,a.counter_aro,a.counter_rate,a.sales_id,sandi_deposito,b.nama,a.bunga_via,a.jenis_bunga,b.alamat,b.lurah,b.camat,b.noktp,b.npwp,c.sfinalty FROM deposito.deposits a JOIN $tabel_nasabah b ON b.nonas=a.nomor_nasabah JOIN deposito.prd_deposito c ON a.produk=c.kdproduk WHERE a.id='$id' ORDER BY a.nomor_nasabah LIMIT 1");
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
<input type="hidden" name="h" id="h" maxlength="1" value="3"/>
<input name="nonas" type="hidden" id="nonas" value="<?php echo $row['nomor_nasabah'];?>"/>
<input name="id" type="hidden" id="id" value="<?php echo $id;?>"/>
<input name="nomor_bilyet" type="hidden" id="nomor_bilyet" value="<?php echo $row['nomor_bilyet'];?>"/>
<input name="seri_bilyet" type="hidden" id="seri_bilyet" value="<?php echo $row['seri_bilyet'];?>"/>
<input name="branch" type="hidden" id="branch" value="<?php echo $row['branch']?>"/>
<input name="nama" type="hidden" id="nama" value="<?php echo $row['nama_rekening'];?>"/>
<input name="produk" type="hidden" id="produk" value="<?php echo $row['produk'];?>"/>
<input name="sdeposito" type="hidden" id="sdeposito" value="<?php echo $row['sandi_deposito'];?>"/>
<input name="sinternal" type="hidden" id="sinternal" value="<?php echo $row['rekening_internal'];?>"/>
<input name="sfinalty" type="hidden" id="sfinalty" value="<?php echo $row['sfinalty'];?>"/>
<table width="100%">
	<tr><th colspan="4" class="ui-widget-header">DATA NASABAH</th></tr>
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
		<td>Bunga Belum Di Bayar</td>
		<td>: <?php echo formatRupiah($row['net_bunga']-$row['total_tarik']);?>
		<input name="net_bunga" type="hidden" id="net_bunga" value="<?php echo $row['net_bunga']-$row['total_tarik'];?>"/></td>
		<td colspan="2">&nbsp;</td>
	</tr>	
	<th colspan="4" class="ui-widget-header">PENCAIRAN DEPOSITO</th>
	<tr>
		<td colspan="2" align="right">Nominal Deposito</td>
		<td colspan="2">: 
		<input style="text-align: right" name="nominal" type="text" id="nominal" value="<?php echo formatrp($row['nominal']);?>" size="35" maxlength="15" readonly/>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="right">Pencairan Normal</td>
		<td colspan="2">: 
			<select name="tran_normal" id="tran_normal">
			<?php $huruf = array("YA","TIDAK");$i=0;$tran_normal=0;
			while($i<2){
			  if ($tran_normal==$i){
			  	echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
			  }else{
			  	echo "<option value='".$i."'>".$huruf[$i]."</option>";
			  }$i++;
			}?>
			</select>
		</td>
	</tr>
	<tr id="tampil">
		<td colspan="2" align="right">Finalty Deposito</td>
		<td colspan="2">: 
		<input style="text-align: right" name="finalty_bunga" type="text" id="finalty_bunga" value="" size="35" maxlength="15"/>
		</td>
	</tr>
</table>
<div class="ui-widget-content" align="center">
	<input type="submit" value="Simpan" id="submit" class="icon-save" onclick="return validasi();"/>
	<input type="button" value="Batal" id="submit" onclick="goKembali();" class="icon-cancel"/>
</div>
</form>
<script type="text/javascript" src="java/java_umum.js"></script>
<script type="text/javascript">
var url_umum="createdepo.php?p=7"
var url4="deposito_cairp.php"
$(document).ready(function(){
	$("#tampil").hide();
	$("#tran_normal").change(function() {
		var kode_buka=$("#tran_normal").val();
		if(kode_buka==1){
			$("#tampil").show();
		}else{
			$("#tampil").hide();
			$("#finalty_bunga").val('');
		}
	});
});
function innerHtml(data){
	$('#divPageHasil').html(data);
}
$(function(){
	$('#finalty_bunga').priceFormat({
		prefix:'',centsSeparator:'.',thousandsSeparator:'.',centsLimit:2
	});
});
</script>