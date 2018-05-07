<?php
include 'h_tetap.php';include 'function/ftanggal.php';
$produk=$result->c_d($_POST['produk']);
$hasil=$result->query_lap("SELECT sdeposito,stitipan FROM deposito.prd_deposito WHERE kdproduk='$produk' ORDER BY kdproduk LIMIT 1");$row=$result->row($hasil);
$sandi_deposito=$kcabang.$row['sdeposito'].'360';
$sandi_perantara=$kcabang.$row['stitipan'].'360';
$tgl_buka=$result->c_d($_POST['thn_x1']).'-'.$result->c_d($_POST['bln_x1']).'-'.$result->c_d($_POST['tgl_x1']);
$nominal=$result->c_d(keangka($_POST['nominal']));
$jangka_waktu=$result->c_d($_POST['jangka_waktu']);
$suku_bunga=$result->c_d($_POST['bunga']);
$metode_hitung=$result->c_d($_POST['jenis_bunga']);
$min_pajak=$result->c_d(keangka($_POST['min_pajak']));
$pajak=$result->c_d($_POST['pajak']);
$kena_pajak=$result->c_d($_POST['kena_pajak']);
$sufix=$result->c_d($_POST['sufix']);
$no_bilyet=$result->c_d($_POST['nomor_bilyet']);
$seri_bilyet=$result->c_d($_POST['seri_bilyet']);
$nonas=$result->c_d($_POST['nonas']);
$branch=$result->c_d($_POST['branch']);
$id=$result->c_d($_POST['id']);
$text = "INSERT INTO deposito.deposits_cadangan(branch,sufix,nomor_bilyet,seri_bilyet,nomor_nasabah,tanggal_jatuh_tempo,bunga_bulanan,pajak_bulanan,bunga_bersih,jumlah_hari,bunga_ke,bulan_bunga,id_deposito,tgl_otorisasi,user_otorisasi) VALUES";
$result->dropTable($userid);
$result->tem_tabel($userid,'deposito.tem_cadn');
include 'deposito_hitung.php';
$hasil=$result->query_x1("SELECT tanggal,bunga_bulanan,pajak_bulanan,bunga_bersih,jumlah_hari,bunga_ke,bulan_bunga FROM $userid ORDER BY bunga_ke");
$jumlah1=0;$jumlah2=0;$jumlah3=0;$jumlah4=0;
while($row=$result->row($hasil)){
	$jumlah1=$jumlah1+$row['bunga_bulanan'];
	$jumlah2=$jumlah2+$row['pajak_bulanan'];
	$jumlah3=$jumlah3+$row['bunga_bersih'];
	$jumlah4=$jumlah4+$row['jumlah_hari'];
	$tgl_akhir=$row['tanggal'];
	$text .="('".$branch."','".$sufix."','".$no_bilyet."','".$seri_bilyet."','".$nonas."','".$row['tanggal']."','".$row['bunga_bulanan']."','".$row['pajak_bulanan']."','".$row['bunga_bersih']."','".$row['jumlah_hari']."','".$row['bunga_ke']."','".$row['bulan_bunga']."','".$id."',now(),'".$userid."'),";
}
$text =substr_replace($text,';',-1);
$text .="UPDATE deposito.deposits SET tanggal_buka='$tgl_buka',transaksi_via='".$_POST['transaksi_via']."',counter_aro='".$_POST['counter_aro']."',produk='$produk',jenis_bunga='".$_POST['jenis_bunga']."',bunga_via='".$_POST['bunga_via']."',sales_id='".$_POST['sales_id']."',min_pajak='".keangka($_POST['min_pajak'])."',pajak='".$_POST['pajak']."',kena_pajak='".$_POST['kena_pajak']."',sandi_deposito='$sandi_deposito',sandi_perantara='$sandi_perantara',tanggal_jatuh_tempo='$tgl_akhir',bunga_harian='$bunga_hari',pajak_bulan='$pajak_bulan',total_bunga='$jumlah1',total_pajak='$jumlah2',total_tarik=0,net_bunga='$jumlah3',jumlah_hari='$jumlah4',updated_at=now(),updated_id='$userid',bussdate=now() WHERE id='$id' LIMIT 1";
$result->multi_y($text);
echo 'Sukses Create Bunga Deposit';
$result->close();$catat='Create Bunga Deposito Deposito '.$id.' Oleh '.$userid;
include 'around.php';
?>