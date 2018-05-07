<?php
include '../auth.php';
include '../koneksi.php';
include '../function.php';
include '../opentran.php';
$bloterid=clean($_POST['bloterid']);
$jumlah=keangka(clean($_POST['jumlah']));
$desc=clean($_POST['keterangan']);
$glkas=clean($_POST['rekening']);
$branch=clean($_POST['branch']);
$t=date_sql($tanggal);
$xuser='';
$nama='-KAS TELLER';
$notran=0;
$notran=no_tran($tabel,$notran,$branch,$tanggal);
$qry ="INSERT INTO log_bloter(branch,date_add,cash_in,cash_out,amount,keterangan,bussdate) VALUES('$branch','$t','$userid','$bloterid','$jumlah','$desc',now());";
$qry .="INSERT INTO $tabel(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch) VALUES('$branch',101101,360,'$glkas','$nama','$glkas',NULL,'$jumlah',100,88,'$notran','$desc',360,'$t','$userid',now(),'$xuser','$branch');";
$qry .="UPDATE tbl_bloter SET mutasi_kredit=mutasi_kredit+'$jumlah',saldo_akhir=saldo_awal+mutasi_debet-mutasi_kredit WHERE bloterid='$bloterid' AND branch='$branch' LIMIT 1;";
$result = $mysql->multi_query($qry);
include '../pesanerrc.php';
echo 'Sukses';
?>