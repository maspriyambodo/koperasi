<?php
include 'h_tetap.php';
$bln=$result->c_d($_POST['bln']);$thn=$result->c_d($_POST['thn']);
$tabelm =$tabel_inventaris.$bln.$thn;$text ="DROP TABLE IF EXISTS $tabelm;";
$text .="CREATE TABLE $tabelm SELECT id,no_inventaris,akumulasi_penyusutan AS saldo_awal,0 AS mutasi_debet,0 AS mutasi_kredit,0 AS saldo_akhir,penyusutan_bulan,akumulasi_penyusutan,nilai_buku,user_posting,bussdate FROM $tabel_inventaris;";
$text .="UPDATE $tabelm a JOIN $tabelTransaksi b ON a.id=b.nokredit SET a.mutasi_debet=b.jumlah,a.akumulasi_penyusutan=a.akumulasi_penyusutan+b.jumlah,a.nilai_buku=a.nilai_buku-b.jumlah,a.user_posting='$userid',a.bussdate=now() WHERE b.jtransaksi=45;";
$text .="UPDATE $tabelm SET saldo_akhir=(saldo_awal+mutasi_debet)-mutasi_kredit";
$result->multi_x($text);
$result->msg_error("Proses Nominatif Inventaris Bulan ".nmbulan($bln)."-".$thn." Sukses");
$result->close();
$catat="Proses Nominatif Inventaris Bulan ".nmbulan($bln)."-".$thn." Sukses";
include 'around.php';
?>