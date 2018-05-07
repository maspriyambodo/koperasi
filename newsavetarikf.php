<?php include 'h_tetap.php';?>
<script type="text/javascript">
	var dialog,nmuser=$("#nmuser"),nmpass=$("#password" );
	$(document).ready(function(){
		$("input#jumlah").focus();
		$('#masuk').submit(function () {
			var jumlah= new Number($("#jumlah").val().replace(/\./g, ''));
			var efektif= new Number($("#saldo_efektif").val().replace(/\./g, ''));
			var sufix=$("#sufix").val();
			if(sufix!=360){
				xjum11=new Number(efektif-jumlah);
				if (xjum11<0){
					alert('Saldo Tabungan Tidak Cukup, Transaksi Batal');
					$("input#jumlah").focus();
					return false;
				}
			}
			if(jumlah<=0){
				alert('Jumlah Penarikan Tidak Boleh Nol');
				return false;
			}
			var r = confirm("Anda yakin data di simpan?");
			if (r == false) {
				return false;
			}
			var limitk="<?php echo $limitk?>";
			var limitd="<?php echo $limitd?>";
			if(jumlah>=limitk){
				dialog.dialog("open");
			}else{
				simpan('');
			}
			return false;
		});
	});
	$(function(){
		$('#jumlah').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit: 0});
		var cancel = function() {
			dialog.dialog( "close" );
			$('input[name=nmuser]').val('');
			$('input[name=password]').val('');
		}
		function addUser() {
			var dataString='nmuser='+nmuser.val()+'&password='+nmpass.val();
			$.ajax({
				type: "GET",
				url	: "validasik.php",
				data: dataString,
				beforeSend: function () {
					$('#loading').show();
				},
				success: function(data){
					$('#loading').hide();
					if(data=='Sukses'){
						dialog.dialog( "close" );
						simpan(nmuser.val());
						$('input[name=nmuser]').val('');
						$('input[name=password]').val('');
					}else{
						alert(data);
					}
				}
			});
		} 
		dialog = $( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 300,
			width: 350,
			modal: true,
			buttons: {
				"OK" : addUser,
				Cancel: cancel
			}
		});
	});
	function simpan(xuser){
		$.ajax({
			type: 'POST',
			url: 'newsavess.php?p=4',
			data: $('#masuk').serialize()+'&xuser='+xuser,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				if(data=='Sukses'){
					goKembali();
				}
				$('#loading').hide();
				alert(data);
			}
		});
		return false;
	}
	function goKembali() {
		var url ="newsavetarik.php";
		$('#innertub').load(url);
	}
</script>
<?php
$norek=$result->c_d($_POST['nonas']);
$useridx=$userid;
if(substr($norek,-3)==360){
	$hasil=$result->query_lap("SELECT branch,nonas,sufix,norekgssl,produk,nama,tarik FROM $tabel_sandi WHERE norekgssl='$norek' LIMIT 1");$row=$result->row($hasil);
	if($row['tarik']==1)$result->msg_error('Rekening Tidak Bisa Per Kas...!');
	$saldo_blokir=0;$produk=$row['produk'];$nama=$row['nama'];$sufix=$row['sufix'];
	$nonas=$row['nonas'];$branch=$row['branch'];$noktp='';
	$saldo_efektif=$result->saldo_akhir($norek);
}else{
	$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.sufix,a.norek,a.kdaktif,a.saldoawal,a.produk,b.nama,b.noktp FROM $tabel_tabungan a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE norek='$norek' LIMIT 1");$row=$result->row($hasil);
	if($row['kdaktif']==0) $result->msg_error('Rekening Tabungan Sudah Non Aktif...!');
	if($row['kdaktif']>1) $result->msg_error('Rekening Sudah Di Tutup...!');
	$saldo_akhir=$result->save_saldo($norek,$row['saldoawal']);
	$saldo_blokir=$result->save_blokir($norek);
	$saldo_efektif=$saldo_akhir-$saldo_blokir;
	$produk=$row['produk'];$nama=$row['nama'];$noktp=$row['noktp'];
	$sufix=$row['sufix'];$nonas= $row['nonas'];$branch=$row['branch'];
}
$kete='PENARIKAN TUNAI';
?>
<form id="masuk" name="masuk" method="POST" action="" >
	<table align="center">
		<tr><td>No REKENING</td><td>: <?php echo $branch.'-'.$nonas.'-'.$sufix;?></td></tr>
		<tr><td>NAMA</td><td>: <?php echo $nama;?></td></tr>
		<tr><td>NO KTP</td><td>: <?php echo $noktp;?></td></tr>
		<tr><td>TANGGAL</td><td>: <?php echo $tanggal;?></td></tr>
		<tr><td>SALDO REKENING</td><td>: <?php echo formatRupiah($saldo_efektif);?></td></tr>
		<tr>
			<td>JUMLAH</td>
			<td>: <input style="text-align:right;" name="jumlah" type="text" id="jumlah" size="25" maxlength="15"/></td>
		</tr>
		<tr>
			<td>KETERANGAN</td>
			<td>: <input name="kete" type="text" id="kete" size="70" maxlength="60" value="<?php echo $kete;?>" onKeyUp="caps(this)"/></td>
		</tr>
	</table>
	<input type="hidden" name="saldo_efektif" id="saldo_efektif" value="<?php echo $saldo_efektif;?>"/>
	<input type="hidden" name="branch" id="branch" value="<?php echo $branch;?>"/>
	<input type="hidden" name="nonas" id="nonas" value="<?php echo $nonas;?>"/>
	<input type="hidden" name="sufix" id="sufix" value="<?php echo $sufix;?>"/>
	<input type="hidden" name="nama" id="nama" value="<?php echo $nama;?>"/>
	<input type="hidden" name="norek" id="norek" value="<?php echo $norek;?>"/>
	<input type="hidden" name="produk" id="produk" value="<?php echo $produk;?>"/>
	<div class="ui-widget-content" align="center">
		<input type="submit" value="Simpan" id="submit" class="icon-save"/> 
		<input type="button" value="Batal" id="submit" onclick="goKembali();" class="icon-cancel"/>
	</div>
</form>
<div id="dialog-form" title="Otorisasi">
<table>
	<tr>
		<td>User Name</td>
		<td>: <input type="text" name="nmuser" id="nmuser" onKeyUp="caps(this)" class="text ui-widget-content ui-corner-all"/></td>
	</tr>
	<tr>
		<td>Password</td>
		<td>: <input type="password" name="password" id="password" class="text ui-widget-content ui-corner-all"/></td>
	</tr>
</table>
</div>