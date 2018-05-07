<?php include 'h_tetap.php';
$kode_branch=$result->c_d($_POST['kode_branch']);
$no_transaksi=$result->c_d($_POST['no_transaksi']);
$no_rekening=$result->c_d($_POST['no_rekening']);
$hasil=$result->query_cari("SELECT norekl,plunas,nomi,norekp,norekw,simpokok,simwajib FROM $tabel_kredit WHERE norek='$no_rekening' LIMIT 1");$row=$result->row($hasil);
If($limitk<$row['nomi'])die("Limit Otorisasi Anda Tidak Cukup...? ");
$no_rekening_lama=$row['norekl'];
$pokok_pelunasan=$row['plunas'];
$simpanan_pokok=$row['simpokok'];
$simpanan_wajib=$row['simwajib'];
$norekp=$row['norekp'];
$norekw=$row['norekw'];
$text ="UPDATE $tabel_kredit SET memkre=0,memdeb=0,saldoa=0,nomi=0,meterai=0,premi=0,jumpremi=0,jumrefund=0,jumprovisi=0,jumadm=0,jumbtl=0,plunas=0,blunas=0,alunas=0,dbunga=0,kdaktif=2,ketnas=4,tgl_batal=now(),user_batal='$userid' WHERE norek='$no_rekening' LIMIT 1;";
if($pokok_pelunasan>0){
	$text .="UPDATE $tabel_kredit SET memkre=memkre-'$pokok_pelunasan',saldoa=(saldo+mutdeb+memdeb)-(mutkre+memkre),bussdate=now() WHERE norek='$no_rekening_lama' LIMIT 1;";
	$text .="INSERT INTO $tabel_payment SELECT '',branch,norek,sufix,nonas,nama,produk,pokok,bunga,adm,jumlah,tgtagihan,kdtran,angsurke,kdaktif,oper,bussdate,bulan,kdkop,tanggal,alasan_tt,solusi_tt,kd_tagih FROM $temPayment WHERE norek='$no_rekening_lama';";
	$text .="DELETE FROM $tabel_payment WHERE norek='$no_rekening_lama' AND kdtran=777 AND kdaktif=50 LIMIT 1;";
	$text .="DELETE FROM $temPayment WHERE norek='$no_rekening_lama';";
}
if($simpanan_pokok>0){
	$text .="UPDATE $tabel_tabungan SET memkredit=memkredit-'$simpanan_pokok',saldoakhir=saldoakhir-'$simpanan_pokok' WHERE norek='$norekp' LIMIT 1;";
}
If($simpanan_wajib>0){
	$text .="UPDATE $tabel_tabungan SET memkredit=memkredit-'$simpanan_wajib',saldoakhir=saldoakhir-'$simpanan_wajib' WHERE norek='$norekw' LIMIT 1;";
}
$text .="UPDATE $tabelKredit SET kdaktif=2 WHERE norek='$no_rekening' LIMIT 1;";
$text .="DELETE FROM $tabel_payment WHERE norek='$no_rekening';";
$text .="DELETE FROM $tabel_asuransi WHERE norek='$no_rekening';";
$text .="DELETE FROM $tabelTransaksi WHERE notransaksi='$no_transaksi';";
$text .="DELETE FROM $temPayment WHERE norek='$no_rekening'";
$result->multi_y($text);
$catat="Sukses Pembatalan Pinjaman Kredit Rekening : ".$no_rekening;
echo $catat;$result->close();
include 'around.php'; ?>