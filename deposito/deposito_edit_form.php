<?php include 'auth.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
		<title>Maintenance Deposito</title>
		<script type="text/javascript" src="jQuery/formatinput.js"></script>
		<script type="text/javascript" src="jQuery/combobox.js"></script>
		<script type="text/javascript" src="js/caridata.js"></script>
		<script type="text/javascript" src="js/global.js"></script>
		<script TYPE="text/javascript">
			$(document).ready(function(){
				$('#ubah').submit(function(){
					$.ajax({
						type : "POST",
						url : "editdepo.php",
						data	: $(this).serialize(),
						beforeSend: function(){
							$('#loading').show();
						},
						success: function(data){
							alert(data);
							$('#innertub').load('deposito_edit.php');
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
				});
			});
		</script>
	</head>
	
	<body>
		<?php
		include 'function.php';
		include "koneksi.php";
		$no_bilyet=clean($_POST['nomor_bilyet']);
		$branch=$kcabang;
		$result = $mysql->query("SELECT a.id,a.nomor_nasabah,a.seri_bilyet,a.nomor_bilyet,a.flag_buka,a.tanggal_buka,a.produk,a.nominal,a.jangka_waktu,a.bunga,a.counter_aro,b.nonas,b.nama,b.alamat,b.lurah,b.camat,b.noktp FROM deposits a JOIN nasabah b ON b.nonas=a.nomor_nasabah WHERE a.nomor_bilyet LIKE '%$no_bilyet%' ORDER BY a.nomor_nasabah LIMIT 1");
		include 'pesanerr.php';
		if(mysqli_num_rows($result)!=0){ 
			$row = $result->fetch_array(MYSQLI_BOTH);
			$id=$row['id'];
			$nomor_nasabah=$row['nomor_nasabah'];
			$seri_bilyet=$row['seri_bilyet'];
			$nomor_bilyet=$row['nomor_bilyet'];
			$nonas=$row['nonas'];
			$tanggal_buka=$row['tanggal_buka'];
			$produk=$row['produk'];
			$nominal=$row['nominal'];
			$jangka_waktu=$row['jangka_waktu'];
			$bunga_existing=$row['bunga'];
			$nama=$row['nama'];
			$alamat=$row['alamat'];
			$lurah=$row['lurah'];
			$camat=$row['camat'];
			$no_ktp=$row['noktp'];
			if($row['flag_buka']!=1){
				$xp='Deposito belum di otorisasi';include 'pesan.php';
			}
			if($row['counter_aro']=0){
				$counter_aro_existing="Non-ARO";
			}elseif ($row['counter_aro']=1) {
				$counter_aro_existing="ARO";
			}
		}else{
			$xp='Data Deposito tidak ditemukan';include 'pesan.php';
		}

		$bunga="";$counter_aro="";
		?>
		<form id="ubah" name="ubah" method="POST" action="">
			<table width="100%">
				<tr>
					<th colspan="6" class="ui-state-highlight">DATA NASABAH</th>
				</tr>
				<tr>
					<td align="right">Nama :</td>
					<td>	<input name="nama" type="text" id="nama" value="<?php echo $nama;?>" size="35" readonly/></td>
					<td align="right">No Nasabah :</td>
					<td>	<input  name="nomor_nasabah" type="text" id="nomor_nasabah" value="<?php echo $nomor_nasabah; ?>" size="35" readedit/></td>
				</tr>
				<tr>
					<td align="right">Alamat :</td>
					<td><input  name="alamat" type="text" id="alamat" value="<?php echo $alamat.' '.$lurah.' '.$camat; ?>" size="35" readonly /></td>
					<td align="right">No KTP :</td>
					<td>	<input name="no_ktp" type="text" id="no_ktp" size="35" value="<?php echo $no_ktp; ?>" readonly /></td>
				</tr>
				<th colspan="6" class="ui-state-highlight">DATA DEPOSITO</th>
				
				<tr>
					<td align="right">Tanggal Buka :</td>
					<td><input  name="tanggal_buka" type="text" id="tanggal_buka" value="<?php echo $tanggal_buka; ?>" size="35" readonly /></td>
				</tr>
				<tr>
					<td align="right">Kode Produk :</td>
					<td><input  name="produk" type="text" id="produk" value="<?php echo $produk; ?>" size="35" readonly /></td>
					<td align="right">Refference :</td>
					<td><input  name="refference" type="text" id="refference" value="<?php echo $seri_bilyet.$nomor_bilyet; ?>" size="35" readonly /></td>
				</tr>
				<tr>
					<td align="right">Nominal :</td>
					<td><input  name="nominal" type="text" id="nominal" value="<?php echo $nominal; ?>" size="35" readonly /></td>
					<td align="right">Jangka Waktu :</td>
					<td><input  name="jangka_waktu" type="text" id="jangka_waktu" value="<?php echo $jangka_waktu.' BULAN'; ?>" size="35" readonly /></td>
				</tr>
				<th colspan="6" class="ui-state-highlight">** EDIT DATA DEPOSITO **</th>
				<tr>
					<td align="right">Suku Bunga Existing :</td>
					<td><input  name="bunga_existing" type="text" id="bunga_existing" value="<?php echo $bunga_existing.' %'; ?>" size="35" readonly /></td>
					<td align="right">Tipe Bunga Existing :</td>
					<td><input  name="counter_aro_existing" type="text" id="counter_aro_existing" value="<?php echo $counter_aro_existing; ?>" size="35" readonly /></td>
				<tr>
					<td align="right">Input Suku Bunga Baru :</td>
					<td><input name="bunga" type="text" class="form-control" id="bunga" value="<?php echo $bunga; ?>" size="35" maxlength="6" /></td>
					<td align="right">Input Tipe Bunga Baru:</td>
					<td>
						<select name="counter_aro" id="counter_aro" class="combobox" placeholder="Pilih Jenis Bunga">
							<?php $huruf = array("Non-ARO", "ARO");
							$i = 0;
							while ($i < 2) {
								if ($counter_aro == $i){
									echo "<option value='" . $i . "' selected>" . $huruf[$i] . "</option>";
								}else{
									echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
								}
								$i++;
							} ?>
						</select>
					</td>
				</tr>
			</table>

<!-- Hidden Values -->
			<input name="id" type="hidden" class="form-control" id="id" value="<?php echo $id; ?>"/>

			<div id="divPageHasil"></div>
			<div class="ui-widget-content" align="center">
				<input type="submit" value="Simpan Perubahan Data" id="submit" class="icon-save"/>
			</div>
		</form>
	</body>
</html>