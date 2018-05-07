<?php
$result = $mysql->query("SELECT branch,userid,bloterid,saldo_awal,mutasi_debet,mutasi_kredit,saldo_akhir FROM tbl_bloter WHERE userid='$useridx' AND branch='$kcabang' ORDER BY userid LIMIT 1");
include 'pesanerra.php';
if( mysqli_num_rows($result)==0) { ?>
	<p><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
	<span class="ui-icon ui-icon-alert" 
		style="float: left; margin-right: .3em;"></span>
		<strong>Pesan : </strong>
		<?php echo 'User ID Belum Memiliki ID Bloter Transaksi...!';exit();?>
	</div></p> <?php
}
?>
