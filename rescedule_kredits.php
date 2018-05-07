<?php 
include 'h_tetap.php';include 'Lib/ftanggal.php';
$nomi=$result->c_d(keangka($_POST['nomi']));
$pokok=$result->c_d(keangka($_POST['saldoa']));
$bunga=$result->c_d(keangka($_POST['blunas']));
$adm=$result->c_d(keangka($_POST['alunas']));
$jumlah=$result->c_d(keangka($_POST['jumlah']));
$angsuran_ke=$result->c_d($_POST['angsuran_ke']);
$jangka=$result->c_d($_POST['jangka']);
$id=$result->c_d($_POST['id']);
$norek=$result->c_d($_POST['norek']);
$sufix=$result->c_d($_POST['sufix']);
$nama=$result->c_d($_POST['nama']);
$nonas=$result->c_d($_POST['nonas']);
$suku=$result->c_d($_POST['suku']);
$produk=$result->c_d($_POST['produk']);
$kdkop=$result->c_d($_POST['kdkop']);
$branch=$kcabang;
$tabel ='nabasa.'.$branch;
$tabel .=$bln;$tabel .=substr($thn,2,2);
if($kdkop==1){$tabel .='b';}else{$tabel .='m';}
if($angsuran_ke>1){
	$hasil=$result->query_x("SELECT tanggal,angsurke,kdtran,pokok FROM $tabel_payment WHERE norek='$norek' ORDER BY angsurke",'');
	if($result->num($hasil)==0)die('Data Tagihan Tidak Ada..?');
	$no=1;
	$ada=FALSE;
	while($row=$result->row($hasil)){
		if($row['angsurke']<$angsuran_ke){
			if($row['kdtran']=='777'){
				$nomi=$nomi-$row['pokok'];
			}
			$tgl_pinjam=$row['tanggal'];$no++;
		}else{
			if($row['kdtran']=='777'){$ada=TRUE;}
		}
	}
	if($ada==TRUE)die('Rescedule Tidak Bisa, Mulai Angsuran Ke Tidak Sesuai...?');
	$periksa = cekTanggal($tgl_pinjam);
	if(!$periksa) die("Tanggal Akhir Pinjam Salah");
	$text ="INSERT INTO tem_kredit SELECT * FROM $tabel_kredit WHERE id='$id';";$text .="DELETE FROM $tabel_payment WHERE norek='$norek' AND angsurke>'$angsuran_ke';";$text .="UPDATE $tabel_kredit SET pokok='$pokok',bunga='$bunga',administrasi='$adm',jangka='$jangka',suku='$suku' WHERE id='$id';";$text .="UPDATE $tabel SET pokok='$pokok',bunga='$bunga',adm='$adm',jumlah='$jumlah' WHERE norek='$norek' AND kdtran=111;";$text .="INSERT INTO $tabel_payment(id,branch,norek,sufix,nonas,nama,produk,pokok,bunga,adm,jumlah,tgtagihan,kdtran,angsurke,bulan,oper,bussdate,kdkop,kdaktif,tanggal) VALUES";$x=1;$mtgtran=$tgl_pinjam;$ypokok=$pokok;include 'save_bunga.php';if($nomi>0)die('Rescedule Tidak Bisa, Mulai Angsuran Ke Tidak Sesuai...?');$text=substr_replace($text,'',-1);$result->multi_y($text);echo "Sukses Rescedule Angsuran Kredit No Rekening : ".$norek;$result->close();$catat="Rescedule Angsuran Kredit ".$norek.' User '.$userid;include 'around.php';}else{$tgl_pinjam=$result->c_d(date_sql($_POST['tgtran']));$hasil=$result->query_x("SELECT pokok FROM $tabel_payment WHERE norek='$norek' AND kdtran=777 ORDER BY kdtran LIMIT 1",'');if($result->num($hasil)>0)die('Maaf...Tidak Bisa Create Angsuran Baru..? Sudah Ada Realisasi');$text ="INSERT INTO tem_kredit SELECT * FROM $tabel_kredit WHERE id='$id';";$text .="DELETE FROM $tabel_payment WHERE norek='$norek';";$text .="UPDATE $tabel_kredit SET pokok='$pokok',bunga='$bunga',administrasi='$adm',jangka='$jangka',suku='$suku' WHERE id='$id';";$text .="UPDATE $tabel SET pokok='$pokok',bunga='$bunga',adm='$adm',jumlah='$jumlah' WHERE norek='$norek' AND kdtran=111;";$text .="INSERT INTO $tabel_payment(id,branch,norek,sufix,nonas,nama,produk,pokok,bunga,adm,jumlah,tgtagihan,kdtran,angsurke,bulan,oper,bussdate,kdkop,kdaktif,tanggal) VALUES";$no=0;$x=1;$mtgtran=$tgl_pinjam;$ypokok=$pokok;include 'save_bunga.php';if($nomi>0)die('Rescedule Tidak Bisa, Mulai Angsuran Ke Tidak Sesuai...?');$text=substr_replace($text,'',-1);$result->multi_y($text);echo "Sukses Rescedule Angsuran Kredit No Rekening : ".$norek;$result->close();$catat="Rescedule Angsuran Kredit ".$norek.' User '.$userid;include 'around.php';}
?>