<?php 
include 'h_tetap.php';
$harga_perolehan=$result->c_d(keangka($_POST['harga_perolehan']));$no_inventaris = $result->c_d($_POST['no_inventaris']);$branch=$result->c_d($_POST['branch']);$kode_inventaris= $result->c_d($_POST['kode_inventaris']);$golongan= $result->c_d($_POST['golongan']);$nilai_perolehan = $result->c_d(keangka($_POST['nilai_perolehan']));$nama_inventaris=$result->c_d($_POST['nama_inventaris']);$jumlah_unit=$result->c_d(keangka($_POST['jumlah_unit']));$masa_manfaat=$result->c_d(keangka($_POST['masa_manfaat']));$tgl_perolehan=$result->c_d($_POST['tgl_perolehan']);$kode_penyusutan=$result->c_d($_POST['kode_penyusutan']);$nilai_residu=$result->c_d(keangka($_POST['nilai_residu']));$penyusutan_tahun=$result->c_d(keangka($_POST['penyusutan_tahun']));$penyusutan_bulan=$result->c_d(keangka($_POST['penyusutan_bulan']));$jurnal_perolehan=$result->c_d($_POST['jurnal_perolehan']);$notran=$result->no_transaksi(0);$nilai_buku=$nilai_perolehan-$nilai_residu;$tgl_perolehan=date_sql($tgl_perolehan);$sandi_inventaris=$result->c_d($_POST['sandi_inventaris']);$sandi_penyusutan=$result->c_d($_POST['sandi_penyusutan']);$sandi_biaya=$result->c_d($_POST['sandi_biaya']);$sandi_perolehan=$result->c_d($_POST['sandi_perolehan']);$sperolehan=substr($sandi_perolehan,4,6);$sinventaris=substr($sandi_inventaris,4,6);$file='json/sandi.json';$json_file = file_get_contents($file);$jfo = json_decode($json_file,TRUE);$huruf = array($sinventaris,$sperolehan);$y=0;$xuser='';while ($y<2) {$deb1=$huruf[$y];for ($i=0; $i<count($jfo); $i++) {if($deb1==$jfo[$i]['nonas']){$namas[$y]=$jfo[$i]['nama'];}}$y++;}
$text1 = "INSERT INTO $tabel_inventaris(branch,no_inventaris,nama_inventaris,harga_perolehan,nilai_perolehan,jumlah_unit,tgl_perolehan,masa_manfaat,akumulasi_penyusutan,penyusutan_bulan,nilai_buku,sandi_perolehan,sandi_penyusutan,sandi_biaya,sandi_inventaris,kode_penyusutan,golongan,nilai_residu,kode_inventaris,tanggal,jurnal_perolehan,user_input,bussdate)VALUES('$branch','$no_inventaris','$nama_inventaris','$harga_perolehan','$nilai_perolehan','$jumlah_unit','$tgl_perolehan','$masa_manfaat',0,'$penyusutan_bulan','$nilai_buku','$sandi_perolehan','$sandi_penyusutan','$sandi_biaya','$sandi_inventaris','$kode_penyusutan','$golongan','$nilai_residu','$kode_inventaris',now(),'$jurnal_perolehan','$userid',now())";
if($jurnal_perolehan==0){
	$text ="INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit) VALUES";
	$desc="PEROLEHAN INVENTARIS ".$nama_inventaris.' - '.$no_inventaris;
	$text .="('".$branch."','".$sinventaris."',360,'".$sandi_inventaris."','".$namas[0]."','".$sandi_inventaris."',NULL,'".$nilai_perolehan."',353,40,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99),";
	$text .="('".$branch."','".$sperolehan."',360,'".$sandi_perolehan."','".$namas[1]."','".$sandi_perolehan."',NULL,'".$nilai_perolehan."',453,40,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99),";
	$text=substr_replace($text,';',-1);$text .=$text1;$result->multi_y($text);
}else{
	$text=$text1;$result->query_y1($text);
}
echo "Sukses Di Simpan, No Inventaris : ".$no_inventaris;$result->close();$catat = "Menambah Data Inventaris ".$no_inventaris;include "around.php";
?>