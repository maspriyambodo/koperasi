<?php 
include "../auth.php";
include "../koneksi.php";
include "../function.php"; ?>
<script>
$(document).ready(function () {
	$('input#jumlah').focus();
	$('#masuk').submit(function () {
		var jumlah=new Number($("#jumlah").val().replace(/\./g, ''));
		if(jumlah<1){
			alert('Jumlah Belum Di Isi...?');
			return false;
		}
		var saldo_kas=new Number($("#saldo_kas").val().replace(/\./g, ''));
		if(jumlah>saldo_kas){
			alert('Jumlah Lebih Besar Dari Saldo Kas !');
			return false;
		}
		$.ajax({
			type: 'POST',
			url: './bloter/tbltellerouts.php',
			data: $(this).serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				var n = data.search("Sukses");
				if(n==0){
					goKembali();
				}
				$('#loading').hide();
				alert(data);
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert('Error: ' + xhr.status || ' - ' || thrownError);
				$('#loading').hide();
			}
		});
		return false;
	});
});
$(function(){
	$('#jumlah').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#saldo_kas').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
	$('#saldo_akhir').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
});
function goKembali() {
	$('#innertub').load('tbltellerout.php');
}
</script> 
<?php
$branch=$kcabang;
$bloterid=clean($_POST['bloterid']); 
$result = $mysql->query("SELECT id,branch,userid,bloterid,saldo_awal,mutasi_debet,mutasi_kredit,saldo_akhir,valid,date_open,date_expire FROM tbl_bloter WHERE branch='$branch' AND bloterid='$bloterid' LIMIT 1");include '../pesanerr.php';
if (mysqli_num_rows($result)<1){ 
	$xp='ID Bloter Penerima Tidak Ditemukan...?';include '../pesan.php';
}
$row=$result->fetch_array(MYSQLI_ASSOC);
if($row['valid']==1){
	$xp='Bloter ID Penerima Sudah Disable... ?';include '../pesan.php';
}
$useridx=$row['userid'];
$saldo_akhir=$row['saldo_akhir'];
$jumlah=0;
$saldo_kas=0;
$rekening=$branch.'101101360';
include '../saldokas.php';
$keterangan='Transfer Uang Pada Bloter '.$bloterid.' User '.$useridx;?>
<form id="masuk" name="masuk" method="POST" action="" >
	<table align="center">
		<tr>	<td>Rekening</td>
			<input name="branch" type="hidden" id="branch" size="25"  value="<?php echo $branch;?>"/>
			<td>: <input name="rekening" type="text" id="rekening" size="25"  value="<?php echo $rekening;?>" readonly/></td>
		</tr>
		<tr>	<td>Saldo Kas</td>
			<td>: 
			<input style="text-align:right;" name="saldo_kas" type="text" id="saldo_kas" size="25" value="<?php echo number_format($saldo_kas);?>" readonly/>
			</td>
		</tr>
		<tr><td>ID Bloter Cash In</td>
			<td>: <input name="bloterid" type="text" id="bloterid" size="25"  value="<?php echo $bloterid;?>" readonly/></td>
		</tr>
		<tr><td>User ID Cash In</td>
			<td>: <input name="useridx" type="text" id="useridx" size="25"  value="<?php echo $useridx;?>" readonly/></td>
		</tr>
		<tr><td>Saldo Bloter Cash In</td>
			<td>: 
			<input style="text-align:right;" name="saldo_akhir" type="text" id="saldo_akhir" size="25" value="<?php echo number_format($saldo_akhir);?>" readonly/>
			</td>
		</tr>
		<tr><td>Tanggal</td>
			<td>: <?php echo $tanggal;?></td>
		</tr>
		<tr><td>Jumlah</td>
			<td>: <input style="text-align:right;" name="jumlah" type="text" id="jumlah" size="25" maxlength="15" value="<?php echo $jumlah;?>"/></td>
		</tr>
		<tr><td>Keterangan</td>
			<td>: <input name="keterangan" type="text" id="keterangan" size="70" maxlength="60" value="<?php echo $keterangan;?>" readonly/></td>
		</tr>
	</table>
	<div class="ui-widget-content" align="center">
		<input type="submit" value="Simpan" id="submit" class="icon-save"/>
		<input type="button" value="Batal" id="submit" onclick="goKembali();" class="icon-cancel"/>
	</div>
</form>