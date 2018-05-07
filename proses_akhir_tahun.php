<?php
include 'h_tetap.php';
$tgl1=$result->c_d($_GET['tgl1']);
$tgl2=$result->c_d($_GET['tgl2']);
$hari=date('w',strtotime($tgl2));
if($hari==0)die('Tanggal Selanjutnya Hari Minggu...?');
$hasil=$result->query_y1("SELECT status AS saldo FROM $tabel_user WHERE status=1 LIMIT 2");
if($result->num($hasil)>1)die("Masih Ada User ID Yang On Line..?");

$bulan1=date('m',strtotime($tgl1)).date('Y',strtotime($tgl1));
$bulan2=date('m',strtotime($tgl2)).date('Y',strtotime($tgl2));
if($bulan1==$bulan2) die('Bulan Tidak Boleh Sama...?');

$tahun1=date('Y',strtotime($tgl1));
$tahun2=date('Y',strtotime($tgl2));
if($tahun1==$tahun2) die('Tahun Tidak Boleh Sama...?');

$bln=date('m',strtotime($tgl2));
$thn=date('Y',strtotime($tgl2));

$tabel = $tabel_tagihan.$bln.substr('00'.$thn,-2).'b';
$tabels = $tabel_tagihan.$bln.substr('00'.$thn,-2).'b';
$hasil=$result->res("SELECT norek FROM $tabel LIMIT 1");
if(!$hasil) die('Rencana Tagihan Bulanan Belum Di Proses');

$tabel = $tabel_tagihan.$bln.substr('00'.$thn,-2).'s';
$hasil=$result->res("SELECT norek FROM $tabel LIMIT 1");
if(!$hasil) die('Rencana Tagihan Bulanan Susulan Belum Di Proses');

$tabel = $tabel_tagihan.$bln.substr('00'.$thn,-2).'m';
$hasil=$result->res("SELECT norek FROM $tabel LIMIT 1");
if(!$hasil)	die('Rencana Tagihan Micro Belum Di Proses');

$hasil=$result->res("SELECT SUM(saldo_akhir) AS saldo FROM nabasa.tbl_bloter");
$row=$result->row($hasil);
if($row['saldo']!=0) die('Bloter Transaksi Masih Bersaldo');

$bln=date('m',strtotime($tgl1));
$thn=date('Y',strtotime($tgl1));

$tabel = $tabel_nominatif.$bln.$thn;
$hasil=$result->res("SELECT norek FROM $tabel LIMIT 1");
if(!$hasil) die('Nominatif Kredit Bulanan Belum Di Proses');

$tabel = $tabel_tabungan.$bln.$thn;
$hasil=$result->res("SELECT norek FROM $tabel LIMIT 1");
if(!$hasil) die('Nominatif Tabungan Bulanan Belum Di Proses');

$tabel=$tabel_inventaris.$bln.$thn;
$hasil=$result->res("SELECT id FROM $tabel LIMIT 1");
if(!$hasil) die('Nominatif Inventaris Bulanan Belum Di Proses '.$tabel);

$text ="UPDATE $tabel_kredit SET saldo=saldoa,mutdeb=0,mutkre=0,memdeb=0,memkre=0,saldoa=(saldo+mutdeb+memdeb)-(mutkre+memkre),bussdate=now();";
$text .="UPDATE $tabel_kredit a JOIN $tabels b ON a.norek=b.norek SET a.angsurke=b.angsurke;";

$text .="UPDATE $tabel_tabungan SET kode_akhir=0,saldoawal=saldoakhir,mutdebet=0,mutkredit=0,memdebet=0,memkredit=0,saldoakhir=(saldoawal+mutkredit+memkredit)-(mutdebet+memdebet),bussdate=now();";

$text .="UPDATE $tabel_asuransi SET saldo_awal=saldo_akhir,mutasi_debet=0,mutasi_kredit=0,saldo_akhir=(saldo_awal+mutasi_debet)-(mutasi_kredit),bussdate=now();";

$text .="UPDATE $tabel_inventaris a JOIN $tabel b ON a.id=b.id SET a.saldo_awal=b.saldo_awal,a.mutasi_debet=b.mutasi_debet,a.mutasi_kredit=b.mutasi_kredit,a.akumulasi_penyusutan=b.akumulasi_penyusutan,a.nilai_buku=b.nilai_buku,a.saldo_akhir=(b.saldo_awal+b.mutasi_debet)-(b.mutasi_kredit),a.user_posting='$userid',a.bussdate=now();";

$text .="UPDATE nabasa.tbl_bloter SET mutasi_debet=0,mutasi_kredit=0;";
$tabel =$tabel_sandi.$thn;
$text .="DROP TABLE IF EXISTS $tabel;";
$text .="CREATE TABLE $tabel SELECT * FROM $tabel_sandi;";
$tabel ='akuntansi.aruskas'.$thn;
$thn++;
$tabelx ='akuntansi.aruskas'.$thn;
$text .="DROP TABLE IF EXISTS $tabelx;";
$text .="CREATE TABLE $tabelx SELECT * FROM $tabel;";
$text .="INSERT INTO nabasa.tanggal(tanggal,keterangan,oper,bussdate) VALUES('$tgl2','CLOSING AKHIR TAHUN','$userid',now())";
$result->multi_y($text);
echo 'Sukses';$result->close();
$catat="Closing Akhir Tahun".$tgl1;include 'around.php';
?>