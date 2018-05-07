<?php 
include "../auth.php";
include "../koneksi.php";
include "../function.php"; ?>
<script>
$(document).ready(function () {
	$('input#jumlah').focus();
	$('#masuk').submit(function () {
		var jumlah=$('#jumlah').val();
		if(jumlah<1){
			alert('Jumlah Belum Di Isi...?');
			return false;
		}
		var saldo_kas=$('#saldo_kas').val();
		if(jumlah>saldo_kas){
			alert('Jumlah Lebih Besar Dari Saldo');
			return false;
		}
		$.ajax({
			type: 'POST',
			url: 'tbltellers.php',
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
	$('#innertub').load('tblteller.php');
}
</script> <?php
$branch=clean($_POST['branch']);
$bloterid=clean($_POST['bloterid']);
$useridx=$userid;
include '../cekidbloter.php';
$row=$result->fetch_array(MYSQLI_ASSOC);
$bloteridx=$row['bloterid'];
$saldo_kas=$row['saldo_akhir'];
$result = $mysql->query("SELECT branch,userid,bloterid,saldo_akhir,valid  FROM tbl_bloter WHERE branch='$branch' AND bloterid='$bloterid' LIMIT 1");
include '../pesanerra.php';
if (mysqli_num_rows($result)<1){ 
	$xp='ID Bloter Penerima Tidak Ditemukan...?';include '../pesan.php';
}
$row=$result->fetch_array(MYSQLI_ASSOC);
$saldo_akhir=$row['saldo_akhir'];
if($row['userid']==$useridx){
	$xp='ID Bloter Penerima Tidak Boleh Sama Deangan ID Bloter Pemberi...?';include '../pesan.php';
}
if($row['valid']==1){
	$xp='Bloter ID Penerima Sudah Disable... ?';include '../pesan.php';
}
$jumlah=0;
?>
<form id="masuk" name="masuk" method="POST" action="" >
	<table align="center">
		<tr>	<td>ID Bloter Pemberi</td>
			<input name="branch" type="hidden" id="branch" size="25"  value="<?php echo $branch;?>"/>
			<td>: <input name="bloterid" type="text" id="bloterid" size="25" value="<?php echo $bloteridx;?>" readonly=""/></td>
		</tr>
		<tr>	<td>Saldo Bloter Pemberi</td>
			<td>: <input name="saldo_kas" type="text" id="saldo_kas" size="25" value="<?php echo $saldo_kas;?>" readonly=""/></td>
		</tr>
		<tr><td>ID Bloter Penerima</td>
			<td>: <input name="bloteridx" type="text" id="bloteridx" size="25" maxlength="15" value="<?php echo $row['bloterid'];?>" readonly=""/></td>
		</tr>
		<tr>	<td>Saldo Bloter Pemerima</td>
			<td>: <input name="saldo_akhir" type="text" id="saldo_akhir" size="25" value="<?php echo $saldo_akhir;?>" readonly=""/></td>
		</tr>
		<tr><td>Tanggal</td>
			<td>: <?php echo $tanggal;?></td>
		</tr>
		<tr><td>Jumlah</td>
			<td>: <input style="text-align:right;" name="jumlah" type="text" id="jumlah" size="25" maxlength="15" value="<?php echo $jumlah;?>"/></td>
		</tr>
		<tr><td>Keterangan</td>
			<td>: <input name="keterangan" type="text" id="keterangan" size="70" maxlength="60"/></td>
		</tr>
	</table>
	<div class="ui-widget-content" align="center">
		<input type="submit" value="Simpan" id="submit" class="icon-save"/>
		<input type="button" value="Batal" id="submit" onclick="goKembali();" class="icon-cancel"/>
	</div>
</form>