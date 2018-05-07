<?php include 'auth.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
		<title>Pembukaan Deposito</title>
		<script type="text/javascript" src="jQuery/formatinput.js"></script>
		<script type="text/javascript" src="jQuery/combobox.js"></script>
		<script type="text/javascript" src="js/caridata.js"></script>
		<script type="text/javascript" src="js/global.js"></script>
		<script TYPE="text/javascript">
			$(document).ready(function(){
				$('#cetakBilyet').submit(function(){
					$('#innertub').load('deposito_print.php');
					/*$.ajax({
						type : "POST",
						// url : "deposito_cetaklpt.php",
						data	: $(this).serialize(),
						beforeSend: function(){
							$('#loading').show();
						},
						success: function(data){
							alert('huhuyy');
							alert(data);
							$('#loading').hide();
						}
					});*/
					jQuery(function ($) {$("#tanggal_buka").mask("99-99-9999");});
					return false;
				})
			});

/*				$("#cetak").button().on("click",function(){
					dataString='nominal='+nominal+'&jangka_waktu='+jangka_waktu+'&bunga='+bunga+'&tanggal_buka='+tanggal_buka;
					$.ajax({
						type: 'GET',
						url: 'countdepo.php',
						data: dataString,
						beforeSend: function () {
							$('#loading').show();
						},
						success: function (data) {
							$("#divPageHasil").html(data);
							$('#loading').hide();
						}
					});
					return false;
				});
				$(document).ready(function () {
				});
				$(function(){
					$('#nominal').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
					// for lookup rekening_internal
					$("#findgl").lookupbox({
						title: 'Daftar Rekening',
						url: 'lookupgl.php?chars=',
						imgLoader: '<img src="images/load.gif">',
						onItemSelected: function(data)	{
							$('input[name=rekening_internal]').val(data.norekgssl);
						},
						tableHeader: ['Rekening','GSSL','Keterangan']
					});
				});*/
		</script>
	</head>
	<body>
		<?php
		include 'function.php';
		include "koneksi.php";
		$nomor_nasabah=clean($_POST['nonas']);
		$branch=$kcabang;
		$result = $mysql->query("SELECT a.id,b.nama,b.nonas,b.alamat,b.lurah,b.camat,b.noktp,b.status_cif,a.tanggal_buka,a.produk,a.rekening_internal,a.nama_bank,a.rekening_bank,a.nama_rekening_bank,a.bunga_via,a.transaksi_via,a.jenis_bunga,a.tanggal_jatuh_tempo,a.tipe_tanggal_jatuh_tempo,a.mail,a.sales_id,a.nomor_bilyet,a.seri_bilyet,a.transaksi_via,a.nominal,a.jangka_waktu,a.bunga,a.counter_aro FROM deposits a JOIN nasabah b ON (branch='$branch' AND a.nomor_nasabah=b.nonas) WHERE a.nomor_nasabah LIKE '%$nomor_nasabah%' ORDER BY a.nomor_nasabah LIMIT 1");
		include 'pesanerr.php';
		if(mysqli_num_rows($result)!=0){ 
			$row = $result->fetch_array(MYSQLI_BOTH);
			$id=$row['id'];
			$nama=$row['nama'];
			$no_ktp=$row['noktp'];
			$alamat=$row['alamat'];
			$lurah=$row['lurah'];
			$camat=$row['camat'];
			$tanggal_buka=$row['tanggal_buka'];
			$produk=$row['produk'];
			$rekening_internal=$row['rekening_internal'];
			$nama_bank=$row['nama_bank'];
			$rekening_bank=$row['rekening_bank'];
			$nama_rekening_bank=$row['nama_rekening_bank'];
			$seri_bilyet=$row['seri_bilyet'];
			$nomor_bilyet=$row['nomor_bilyet'];
			if($row['transaksi_via']==0){
				$transaksi_via="TUNAI";
			}elseif ($row['transaksi_via']==1) {
				$transaksi_via="PINDAH BUKU";
			}elseif ($row['transaksi_via']==3) {
				$transaksi_via="TRANSFER";
			}
			$jenis_bunga=$row['jenis_bunga'];
			if($row['jenis_bunga']=0){
				$jenis_bunga="HARIAN";
			}elseif ($row['jenis_bunga']==1) {
				$jenis_bunga="BULANAN";
			}
			if($row['tipe_tanggal_jatuh_tempo']==0){
				$tipe_tanggal_jatuh_tempo="OTOMATIS";
			}elseif ($row['tipe_tanggal_jatuh_tempo']==1) {
				$tipe_tanggal_jatuh_tempo="INPUT MANUAL";
			}
			$nominal=$row['nominal'];			
			$jangka_waktu=$row['jangka_waktu'];
			$bunga=$row['bunga'];
			if($row['counter_aro']==0){
				$counter_aro="NON-ARO";
			}elseif ($row['counter_aro']==1) {
				$counter_aro="ARO";
			}
			if($row['status_cif']!=1){
				$xp='Nomor nasabah belum di otorisasi';include 'pesan.php';
			}
		}else{
			$xp='Nomor nasabah tidak ditemukan';include 'pesan.php';
		}

		?>
		<form id="qcetakbilyet" name="qcetakbilyet" method="POST" action="deposito_cetaklpt.php" target="_blank">
			<table width="100%">
				<tr>
					<th colspan="6" class="ui-state-highlight">DATA NASABAH</th>
				</tr>
				<tr>
					<input name="id" type="hidden" id="id" value="<?php echo $id;?>" size="35" readonly/>
					<td align="right">Nama :</td>
					<td><input name="nama" type="text" id="nama" value="<?php echo $nama;?>" size="35" readonly/></td>
					<td align="right">Nomor Nasabah :</td>
					<td>	<input  name="nomor_nasabah" type="text" id="nomor_nasabah" value="<?php echo $nomor_nasabah; ?>" size="35" readonly/></td>
				</tr>
				<tr>
					<td align="right">Alamat :</td>
					<td><input  name="alamat" type="text" id="alamat" value="<?php echo $alamat.' '.$lurah.' '.$camat; ?>" size="35" readonly /></td>
					<td align="right">No KTP :</td>
					<td><input name="no_ktp" type="text" id="no_ktp" size="35" value="<?php echo $no_ktp; ?>" readonly /></td>
				</tr>
				<tr>
					<td align="right">Kelurahan :</td>
					<td><input  name="lurah" type="text" id="lurah" value="<?php echo $lurah; ?>" size="35" readonly /></td>
					<td align="right">Kecamatan :</td>
					<td><input name="camat" type="text" id="camat" size="35" value="<?php echo $camat; ?>" readonly /></td>
				</tr>
				<th colspan="6" class="ui-state-highlight">DATA DEPOSITO</th>
				<tr>
					<td align="right">Seri & Nomor Bilyet :</td>
					<td>	<input name="nomor_bilyet" type="text" id="nomor_bilyet" value="<?php echo $seri_bilyet .  $nomor_bilyet;?>" size="35" readonly/></td>
					<td align="right">Tanggal Buka :</td>
					<td><input name="tanggal_buka" type="text" id="tanggal_buka" size="35" value="<?php echo $tanggal_buka; ?>" readonly /></td>
				</tr>
				<tr>
					<td align="right">Kode Produk :</td>
					<td><input name="produk" type="text" id="produk" value="<?php echo $produk; ?>" size="35" maxlength="8" readonly/></td>
					<td align="right">Rekening Pencairan :</td>
					<td><input name="rekening_internal" type="text" class="form-control" id="rekening_internal" value="<?php echo $rekening_internal; ?>" size="35" maxlength="8" /></td>
				</tr>
				<tr>
					<td align="right">Rekening Bank Transfer :</td>
					<td><input name="rekening_bank" type="text" class="form-control" id="rekening_bank" value="<?php echo $rekening_bank; ?>" size="35" maxlength="16" /></td>
					<td align="right">Nama Rekening Bank Transfer :</td>
					<td><input name="nama_rekening_bank" type="text" class="form-control" id="nama_rekening_bank" value="<?php echo $nama_rekening_bank; ?>" size="35" maxlength="30"  /></td>
				</tr>
				<tr>
					<td align="right">Jenis Transaksi :</td>
					<td><input name="transaksi_via" type="text" class="form-control" id="transaksi_via" value="<?php echo $transaksi_via; ?>" size="35" maxlength="30"  /></td>
					<td align="right">Jenis Bunga :</td>
					<td><input name="jenis_bunga" type="text" class="form-control" id="jenis_bunga" value="<?php echo $jenis_bunga; ?>" size="35" maxlength="30"  /></td>
				</tr>
				<tr>
					<td align="right">Jenis Tanggal Jatuh Tempo :</td>
					<td><input name="tipe_tanggal_jatuh_tempo" type="text" class="form-control" id="tipe_tanggal_jatuh_tempo" value="<?php echo $tipe_tanggal_jatuh_tempo; ?>" size="35" maxlength="30"  /></td>
					<td align="right">Tipe Perpanjangan Bunga:</td>
					<td><input name="counter_aro" type="text" class="form-control" id="counter_aro" value="<?php echo $counter_aro; ?>" size="35" maxlength="6" /></td>
				</tr>
				<tr>
					<td align="right">Nominal :</td>
					<td>	<input name="nominal" type="text" id="nominal" size="35" maxlength="15" value="<?php echo formatrp($nominal); ?>"/></td>
					<td align="right">Jangka Waktu :</td>
					<td>	<input name="jangka_waktu" type="text" id="jangka_waktu" size="35" maxlength="2" value="<?php echo $jangka_waktu . " BULAN"; ?>"/></td>
				</tr>
				<tr>
					<td align="right">Bunga :</td>
					<td><input name="bunga" type="text" class="form-control" id="bunga" value="<?php echo $bunga . " %"; ?>" size="35" maxlength="6" /></td>
					<td align="right">Jenis Pembayaran :</td>
					<td><input name="transaksi_via" type="text" class="form-control" id="transaksi_via" value="<?php echo $transaksi_via; ?>" size="35" maxlength="6" /></td>
				</tr>
				<tr>
					<td align="right">Nama Rekening Bank Transfer :</td>
					<td><input name="nama_rekening_bank" type="text" class="form-control" id="nama_rekening_bank" value="<?php echo $nama_rekening_bank; ?>" size="35" maxlength="30"  /></td>
					<td align="right">Rekening Bank Transfer :</td>
					<td><input name="rekening_bank" type="text" class="form-control" id="rekening_bank" value="<?php echo $rekening_bank; ?>" size="35" maxlength="30"  /></td>
				</tr>
				<tr>
					<td align="right">Bank Tujuan Transfer :</td>
					<td><input name="nama_bank" type="text" class="form-control" id="nama_bank" value="<?php echo $nama_bank; ?>" size="35" maxlength="30"  /></td>
				</tr>
			</table>
			<!-- Hidden Values -->
			<input name="status_rekening" type="hidden" class="form-control" id="status_rekening" value="<?php echo $status_rekening; ?>"/>
			
			<div id="divPageHasil"></div>
			<div class="ui-widget-content" align="center">
				<input type="submit" value="CETAK BILYET" id="cetakBilyet" class="icon-print" target="_blank"/>
			</div>
		</form>
	</body>
</html>