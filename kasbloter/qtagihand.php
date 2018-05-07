<?php 
include '../nmcabang.php';
include '../opentran.php';
$tgl1=clean($_GET['tgl1']);
$bln =date('m',strtotime($tgl1));
$thn =date('Y',strtotime($tgl1));
$cabang=nmcabang($kcabang);
$branch=$kcabang;
$rekening=$branch.'101101360';
$t=$tgl1;
include '../saldokasbesar.php';
$result = $mysql->query("SELECT branch,nonas,sufix,norek,norekgl,nokredit,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,produk,jumlah,nama FROM $tabel WHERE tanggal='$tgl1' AND jtransaksi=88 AND kdbranch='$branch' ORDER BY produk,norek"); 
include '../pesanerra.php';
if (mysqli_num_rows($result)== 0){
	$xp='Data Transaksi Tidak Ada...?';include '../pesan.php';
}?>