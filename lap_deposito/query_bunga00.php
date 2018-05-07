<?php 
$id=$result->c_d($_GET['id']);
$tabel="deposito.deposits_cadangan";
$hasil=$result->query_lap("SELECT a.branch,a.nomor_nasabah,a.sufix,a.nomor_bilyet,a.seri_bilyet,a.tanggal_buka,a.tanggal_jatuh_tempo,a.nama_rekening,a.jangka_waktu,a.nominal,a.counter_rate,a.status_rekening,a.net_bunga,b.nmproduk,c.nama AS namas FROM deposito.deposits a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk JOIN nabasa.sales c ON a.sales_id=c.idsales WHERE a.id='$id' LIMIT 1");
$row=$result->row($hasil);
$branch=$row['branch'];
$nonas=$row['nomor_nasabah'];
$sufix=$row['sufix'];
$nomor_bilyet=$row['nomor_bilyet'];
$seri_bilyet=$row['seri_bilyet'];
$tgl_buka=$row['tanggal_buka'];
$tgl_akhir=$row['tanggal_jatuh_tempo'];
$nama=$row['nama_rekening'];
$jangka_waktu=$row['jangka_waktu'];
$nominal=$row['nominal'];
$net_bunga=$row['net_bunga'];
$suku_bunga=$row['counter_rate'];
$nmproduk=$row['nmproduk'];
$namas=$row['namas'];
$hasil=$result->query_lap("SELECT a.id,a.tanggal_jatuh_tempo,a.bunga_bulanan,a.pajak_bulanan,a.bunga_bersih,a.jumlah_hari,a.bunga_ke,flag_bayar,b.produk,c.nmproduk FROM $tabel a JOIN deposito.deposits b ON a.id_deposito=b.id JOIN deposito.prd_deposito c ON b.produk=c.kdproduk WHERE a.id_deposito='$id' ORDER BY a.bunga_ke");
?>