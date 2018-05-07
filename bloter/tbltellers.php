<?php
include '../auth.php';
include "../koneksi.php";
include '../function.php';
$bloterid=clean($_POST['bloterid']);
$bloteridx=clean($_POST['bloteridx']);
$jumlah=keangka(clean($_POST['jumlah']));
$desc=clean($_POST['keterangan']);
$branch=clean($_POST['branch']);
$t=date_sql($tanggal);
$qry ="INSERT INTO log_bloter(branch,date_add,cash_in,cash_out,amount,keterangan,bussdate) VALUES('$branch','$t','$bloteridx','$bloterid','$jumlah','$desc',now());";
$qry .="UPDATE tbl_bloter SET mutasi_kredit=mutasi_kredit+'$jumlah',saldo_akhir=saldo_awal+mutasi_debet-mutasi_kredit WHERE bloterid='$bloterid' AND branch='$branch' LIMIT 1;";
$qry .="UPDATE tbl_bloter SET mutasi_debet=mutasi_debet+'$jumlah',saldo_akhir=saldo_awal+mutasi_debet-mutasi_kredit WHERE bloterid='$bloteridx' AND branch='$branch' LIMIT 1;";
$result = $mysql->multi_query($qry);
include '../pesanerrc.php';
echo 'Sukses';
?>