<?php
include '../auth.php';
include "../koneksi.php";
include "../function.php";
$id=clean($_GET['id']);
$result = $mysql->query("SELECT id,branch,userid,bloterid,saldo_awal,mutasi_debet,mutasi_kredit,saldo_akhir,valid,date_open,date_expire FROM tbl_bloter WHERE id='$id' ORDER BY userid");include '../pesanerr.php';
$r=$result->fetch_array(MYSQL_ASSOC);?>
<table width="100%" class="table">
<tr>
	<td width="15%">Date Open</td><td width="35%">: <?php echo $r['date_open'];?></td>
	<td width="15%">Date Expire</td><td width="35%">: <?php echo $r['date_expire'];?></td>
</tr>
<tr>
	<td>Saldo Awal</td><td>: <?php echo number_format($r['saldo_awal']);?></td>
	<td>Mutasi Debet</td><td>: <?php echo number_format($r['mutasi_debet']);?></td>
</tr>
<tr>
	<td>Saldo Akhir</td><td>:<?php echo number_format($r['saldo_akhir']);?></td>
	<td>Mutasi Kredit</td><td>: <?php echo number_format($r['mutasi_kredit']);?></td>
</tr>
</table>
