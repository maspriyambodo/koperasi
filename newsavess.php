<?php include 'h_tetap.php';
switch ($_GET['p'] ) {
default: echo "Halaman tidak ditemukan"; break;
case "1":
	$branch=$result->c_d($_POST['branch']);
	$nonas=$result->c_d($_POST['nonas']);
	$norek=$result->c_d($_POST['norek']);
	$sufix=$result->c_d($_POST['sufix']);
	$produk=$result->c_d($_POST['produk']);
	$desc=$result->c_d($_POST['kete']);
	$tgl1=$result->c_d(date_sql($_POST['tgl1']));
	$tgl2=$result->c_d(date_sql($_POST['tgl2']));
	$jumlah=$result->c_d(keangka($_POST['jumlah']));
	if($jumlah>0){
		$text = "INSERT INTO blokir(branch,nonas,sufix,norek,jumlah,kdtran,produk,tgawal,tgakhir,keterangan,oper,bussdate) VALUES ('$branch','$nonas','$sufix','$norek','$jumlah','8','$produk','$tgl1','$tgl2','$desc','$userid',now());";
		$text .="UPDATE $tabel_tabungan SET saldoblokir=saldoblokir+'$jumlah' WHERE norek='$norek' LIMIT 1";
		$result->multi_y($text);
		$result->close();echo 'Sukses';
		$catat="Blokir Rekening ".$norek.' Jumlah '.$jumlah;include 'around.php';
	}else{
		echo 'Jumlah Transaksi 0 Rupiah';
	}
	break;
case "2":
	$id=$result->c_d($_GET['id']);
	$result->query_y1("UPDATE $tabel_tabungan a JOIN blokir b ON a.norek=b.norek SET a.saldoblokir=a.saldoblokir-b.jumlah,b.kdtran=0 WHERE b.id='$id'",'');
	$result->close();echo 'Sukses';
	$catat="Buka Blokir ".$id;include 'around.php';
	break;
case "3":
	$branch=$result->c_d($_POST['branch']);
	$nonas=$result->c_d($_POST['nonas']);
	$norek=$result->c_d($_POST['norek']);
	$sufix=$result->c_d($_POST['sufix']);
	$nama=$result->c_d($_POST['nama']);
	$produk=$result->c_d($_POST['produk']);
	$desc=$result->c_d($_POST['kete']);
	$jumlah=$result->c_d(keangka($_POST['jumlah']));
	$xuser=$result->c_d($_POST['xuser']);
	if($jumlah>0){
		$notran=$result->no_transaksi(0);$noreferensi=substr($notran,0,5);
		if($sufix!=360){
			$hasil=$result->query_y1("SELECT gssl FROM $tabel_produkt WHERE kdproduk='$produk' LIMIT 1");
			if($result->num($hasil)<1) die('Jenis Produk Tidak Di Temukan!');
			$row=$result->row($hasil);
			$gssl=$branch.$row['gssl'].'360';
		}else{
			$gssl=$norek;
		}
		$gssl_kas=$branch.'101101360';
		$ket_teller='- KAS TELLER';
		$text = "INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES('$branch','$nonas','$sufix','$norek','$nama','$gssl',NULL,'$jumlah',200,99,'$notran','$desc','$produk','$t','$userid',now(),'$xuser','$kcabang',97,'".$noreferensi."');";
		
		$text .="INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES('$branch',101101,360,'$gssl_kas','$ket_teller','$gssl_kas',NULL,'$jumlah',100,88,'$notran','$desc',360,'$t','$userid',now(),'$xuser','$kcabang',97,'".$noreferensi."');";
		if($sufix!=360){
			$text .="UPDATE $tabel_tabungan SET mutkredit=mutkredit+'$jumlah',saldoakhir=(saldoawal+mutkredit+memkredit)-(mutdebet+memdebet),bussdate=now() WHERE norek='$norek' LIMIT 1;";
		}else{
			$text=substr_replace($text,'',-1);
		}
		$result->multi_y($text);echo 'Sukses';
		$result->close();$catat="Setoran Tunai ".$norek.' Jumlah '.$jumlah;include 'around.php';
	}else{
		echo 'Jumlah Belum Di Input...!';
	}
	break;
case "4":
	$branch=$result->c_d($_POST['branch']);
	$nonas=$result->c_d($_POST['nonas']);
	$norek=$result->c_d($_POST['norek']);
	$sufix=$result->c_d($_POST['sufix']);
	$nama=$result->c_d($_POST['nama']);
	$produk=$result->c_d($_POST['produk']);
	$desc=$result->c_d($_POST['kete']);
	$jumlah=$result->c_d(keangka($_POST['jumlah']));
	$xuser=$result->c_d($_POST['xuser']);
	if($jumlah>0){
		$notran=$result->no_transaksi(0);$noreferensi=substr($notran,0,5);
		if($sufix!=360){
			$hasil=$result->query_y1("SELECT gssl FROM $tabel_produkt WHERE kdproduk='$produk' LIMIT 1");
			if($result->num($hasil)<1) die('Jenis Produk Tabungan Tidak Di Temukan!');
			$row=$result->row($hasil);	
			$gssl=$branch.$row['gssl'].'360';
		}else{
			$gssl=$norek;
		}
		$gssl_kas=$branch.'101101360';
		$ket_teller='- KAS TELLER';
		$text ="INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES('$branch','$nonas','$sufix','$norek','$nama','$gssl',NULL,'$jumlah',100,99,'$notran','$desc','$produk','$t','$userid',now(),'$xuser','$kcabang',97,'".$noreferensi."');";
		
		$text .="INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES('$branch',101101,360,'$gssl_kas','$ket_teller','$gssl_kas',NULL,'$jumlah',200,88,'$notran','$desc',360,'$t','$userid',now(),'$xuser','$kcabang',97,'".$noreferensi."');";
		if($sufix!=360){
			$text .="UPDATE $tabel_tabungan SET mutdebet=mutdebet+'$jumlah',saldoakhir=(saldoawal+mutkredit+memkredit)-(mutdebet+memdebet),bussdate=now() WHERE norek='$norek' LIMIT 1;";
		}else{
			$text=substr_replace($text,'',-1);
		}
		$result->multi_y($text);echo 'Sukses';
		$result->close();$catat="Tarik Tunai ".$norek.' Jumlah '.$jumlah;include 'around.php';}else{echo 'Jumlah Belum Di Input...!';
	}
	break;
case "5":
	$m=date_sql($tanggal);$jumlah=$result->c_d(keangka($_POST['jumlah']));$nonas_=$result->c_d($_POST['nonas_']);$branch_=$result->c_d($_POST['branch_']);$sufix_=$result->c_d($_POST['sufix_']);$norefer=$result->c_d($_POST['norefer']);$kete=strtoupper($result->c_d($_POST['kete']));$kdtran=$result->c_d($_POST['kdtran']);$xuser=$result->c_d($_POST['xuser']);$norek=$branch_.$nonas_.$sufix_;$id=$result->c_d($_POST['id']);
	if( $sufix_ == 360 ){
		$hasil=$result->query_cari("SELECT branch,nonas,sufix,norekgssl,produk,nama,tarik FROM $tabel_sandi WHERE norekgssl='$norek' LIMIT 1");$row=$result->row($hasil);
		if($row['tarik']!=0) die('No Rekening Tidak Bisa Transaksi...!');
		$branch=$row['branch'];$nonas=$row['nonas'];$sufix=$row['sufix'];$namat=$row['nama'];
		$produk=$row['produk'];$gssl=$norek;
		$sakhir=$result->saldo_akhir($norek);
		if(substr($nonas_,0,1)=='1' || substr($nonas_,0,1)=='4'){
			if(substr($kdtran,0,1)==4){
				//if(($sakhir-$jumlah)<0) die('Saldo Rekening Tidak Cukup ! '.formatRupiah($sakhir-$jumlah));
			}
		}else{
			if(substr($kdtran,0,1)==3){
				//if(($sakhir-$jumlah)<0) die('Saldo Rekening Tidak Cukup ! '.formatRupiah($sakhir-$jumlah));
			}
		}
	}else{
		$hasil=$result->query_cari("SELECT a.branch,a.nonas,a.sufix,a.norek,a.kdaktif,a.saldoawal,a.saldoakhir,a.produk,a.saldoblokir,b.nama,b.noktp,c.gssl FROM $tabel_tabungan a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN $tabel_produkt c ON a.produk=c.kdproduk WHERE a.branch='$branch_' AND a.nonas='$nonas_' AND a.sufix='$sufix_' ORDER BY a.norek LIMIT 1");$row=$result->row($hasil);
		if($row['kdaktif']!=1) die('Rekening Tabungan Belum Di Otorisasi Atau Sudah Di Tutup...!');
		$branch=$row['branch'];$nonas=$row['nonas'];$sufix=$row['sufix'];$namat=$row['nama'];
		$produk=$row['produk'];$gssl=$branch.$row['gssl'].'360';
		$sakhir=$result->save_saldo($norek,$row['saldoawal']);
		$saldo_blokir=$result->save_blokir($norek);
		if(substr($kdtran,0,1)==3){
			if(($sakhir-$jumlah-$saldo_blokir)<1) die('Saldo Rekening Tidak Cukup ! '.formatRupiah($sakhir-$jumlah-$saldo_blokir));
		}
	}
	if($id==0) {
		$notran=$result->no_transaksi(0);
		$text="INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,noreferensi,otor,kdbranch,kdkredit) VALUES('$branch','$nonas',360,'$norek','$namat','$gssl',NULL,'$jumlah','$kdtran',11,'$notran','$kete','$produk','$t','$userid',now(),'$norefer','$xuser','$kcabang',98);";
	}else{		
		$text="UPDATE $tabelTransaksi SET branch='$branch',nonas='$nonas',sufix=360,norek='$norek',nama='$namat',norekgl='$gssl',jumlah='$jumlah',kdtran='$kdtran',keterangan='$kete',produk='$produk',bussdate=now(),noreferensi='$norefer',otor='$xuser',kdbranch='$kcabang',kdkredit=98 WHERE id='$id' LIMIT 1;";
	}
	if($sufix_ !=360){
		if(substr($kdtran,0,1)==3){
			$text .="UPDATE $tabel_tabungan SET memdebet=memdebet-'$jumlah' WHERE norek='$norek' LIMIT 1;";
		}else{
			$text .="UPDATE $tabel_tabungan SET memkredit=memkredit-'$jumlah' WHERE norek='$norek' LIMIT 1;";
		}
		$text .="UPDATE $tabel_tabungan SET saldoakhir=(saldoawal+mutkredit+memkredit)-(mutdebet+memdebet) WHERE norek='$norek'  LIMIT 1";
	}else{
		$text=substr_replace($text,'',-1);
	}
	$result->multi_y($text);
	echo 'Sukses Di Simpan';$result->close();$catat="Transaksi Memorial ".$norek.' Jumlah '.$jumlah;
	include 'around.php';
	break;
case "6":
	$id=$result->c_d($_POST['id']);
	$hasil=$result->query_cari("SELECT norek,jumlah,kdtran FROM $tabelTransaksi WHERE id='$id' LIMIT 1");
	$row=$result->row($hasil);
	$jumlah=$row['jumlah'];
	$norek=$row['norek'];
	$kdtran=substr($row['kdtran'],0,1);
	$text = "DELETE FROM $tabelTransaksi WHERE Id='$id';";
	if(substr($norek,-3)!=360){
		if($kdtran==3){
			$text .="UPDATE $tabel_tabungan SET memdebet=memdebet-'$jumlah' WHERE norek='$norek' LIMIT 1;";
		}else{
			$text .="UPDATE $tabel_tabungan SET memkredit=memkredit-'$jumlah' WHERE norek='$norek' LIMIT 1;";
		}
		$text .="UPDATE $tabel_tabungan SET saldoakhir=(saldoawal+mutkredit+memkredit)-(mutdebet+memdebet) WHERE norek='$norek'  LIMIT 1";
	}else{
		$text=substr_replace($text,'',-1);
	}
	$result->multi_y($text);
	echo 'Sukses Di Hapus';$result->close();$catat="Hapus Transaksi Memorial ".$norek.' Jumlah '.$jumlah;
	include 'around.php';
	break;
}
?>