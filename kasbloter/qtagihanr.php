<?php 
include '../nmcabang.php';
include '../opentran.php';
$tgl1=clean($_GET['tgl1']);
$useridx=clean($_GET['useridx']);
$bln =date('m',strtotime($tgl1));
$thn =date('Y',strtotime($tgl1));
$cabang=nmcabang($kcabang);
$branch=$kcabang;
$rekening=$branch.'101101360';
$t=$tgl1;
include '../saldokasbesar.php';
$result = $mysql->query("SELECT branch,nonas,sufix,norek,norekgl,nokredit,kdtran,jtransaksi,notransaksi,keterangan,tanggal,produk,SUM(IF(substr(kdtran,1,1)='1',jumlah,0)) AS debetm,SUM(IF(substr(kdtran,1,1)='2',jumlah,0)) AS kreditm,nama,oper FROM $tabel WHERE tanggal='$tgl1' AND jtransaksi=88 AND kdbranch='$branch' GROUP BY norek,produk,oper ORDER BY norek,produk,oper");
include '../pesanerra.php';
if (mysqli_num_rows($result)== 0){
	$xp='Data Transaksi Tidak Ada...?';include '../pesan.php';}?>