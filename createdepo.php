<?php
include 'h_tetap.php';
switch ($result->c_d($_GET['p'] )) {
	default: echo "Halaman tidak ditemukan"; break;
case "1":
	$produk=$result->c_d($_POST['produk']);
	$hasil=$result->query_cari("SELECT sdeposito,kena_pajak,pajak,min_pajak,stitipan FROM deposito.prd_deposito WHERE kdproduk='$produk' ORDER BY kdproduk LIMIT 1");$row=$result->row($hasil);
	$min_pajak=$row['min_pajak'];$pajak=$row['pajak'];$kena_pajak=$row['kena_pajak'];
	$sandi_deposito=$kcabang.$row['sdeposito'].'360';
	$sandi_perantara=$kcabang.$row['stitipan'].'360';	
	$no_nasabah=$result->c_d($_POST['no_nasabah']);
	$tgl_buka=$result->c_d($_POST['thn_x1']).'-'.$result->c_d($_POST['bln_x1']).'-'.$result->c_d($_POST['tgl_x1']);
	$rekening_internal=$result->c_d($_POST['branch_']).$result->c_d($_POST['nonas_']).$result->c_d($_POST['sufix_']);
	$hasil=$result->query_cari("SELECT MAX(sufix) AS nomor FROM deposito.deposits WHERE nomor_nasabah='$no_nasabah'");
	if($result->num($hasil)>0){
		$datamax= $result->row($hasil);
		$sufix = $datamax['nomor'];
		if(empty($sufix) || $sufix=='' || $sufix==1){
			$sufix=600;
		}else{
			$sufix=$sufix+1;
		}
	}else{
		$sufix=600;
	}
	$data = array(
		'branch'=>$kcabang,
		'nomor_nasabah'=>$no_nasabah,
		'sufix'=>$sufix,
		'nama_rekening'=>$_POST['nama_rekening'],
		'transaksi_via'=>$_POST['transaksi_via'],
		'counter_aro'=>$_POST['counter_aro'],
		'produk'=>$_POST['produk'],
		'jenis_bunga'=>$_POST['jenis_bunga'],
		'bunga_via'=>$_POST['bunga_via'],
		'nama_bank'=>$_POST['nama_bank'],
		'rekening_bank'=>$_POST['rekening_bank'],
		'nama_rekening_bank'=>$_POST['nama_rekening_bank'],
		'nama_penarik_bunga'=>$_POST['nama_penarik_bunga'],
		'tanggal_buka'=>$tgl_buka,
		'rekening_internal'=>$rekening_internal,
		'alamat_mail'=>$_POST['alamat_mail'],
		'sales_id'=>$_POST['sales_id'],
		'nomor_bilyet'=>$_POST['nomor_bilyet'],
		'seri_bilyet'=>$_POST['seri_bilyet'],
		'nominal'=>keangka($_POST['nominal']),
		'jangka_waktu'=>$_POST['jangka_waktu'],
		'counter_rate'=>$_POST['bunga'],
		'min_pajak'=>$min_pajak,
		'pajak'=>$pajak,
		'kena_pajak'=>$kena_pajak,
		'sandi_deposito'=>$sandi_deposito,
		'sandi_perantara'=>$sandi_perantara,
		'operator_at' => date('Y-m-d H:i:s'),
		'operator_id' => $userid,
		'updated_at' => date('Y-m-d H:i:s'),
		'updated_id' => $userid,
	    'bussdate' => date('Y-m-d H:i:s')
	);
	$result->insert('deposito.deposits', $data);
	$result->res("UPDATE $tabel_nasabah SET tlphp1='".$_POST['tlphp1']."' WHERE nonas='".$_POST['no_nasabah']."'");
	echo "Sukses Ditambakan, Nomor Nasabah : ".$_POST['no_nasabah'];
	$catat="Menambah Data Deposito ".$_POST['no_nasabah']." Tanggal ".date('Y-m-d H:i:s');
	include 'around.php';
	break;
case "2":
	$produk=$result->c_d($_POST['produk']);
	$hasil=$result->query_cari("SELECT sdeposito,stitipan FROM deposito.prd_deposito WHERE kdproduk='$produk' ORDER BY kdproduk LIMIT 1");$row=$result->row($hasil);
	$sandi_deposito=$kcabang.$row['sdeposito'].'360';
	$sandi_perantara=$kcabang.$row['stitipan'].'360';
	$rekening_internal=$result->c_d($_POST['branch_']).$result->c_d($_POST['nonas_']).$result->c_d($_POST['sufix_']);
	$y=$result->c_d($_POST['status_rekening']);
	$user_blokir=NULL;
	$tanggal_blokir=NULL;
	$user_tutup=NULL;
	$tanggal_tutup=NULL;
	if($y==2){
		$user_blokir=$userid;
		$tanggal_blokir=$t;
	}elseif($y==4){
		$user_tutup=$userid;
		$tanggal_tutup=$t;
	}
	$x=$result->c_d($_POST['status_rekeningx']);
	$user_buka_blokir=NULL;
	$tanggal_buka_blokir=NULL;
	if($x==2){
		if($y!=2){
			$user_buka_blokir=$userid;
			$tanggal_buka_blokir=$t;
		}
	}
	$result->status_deposito($x);
	$id=$result->c_d($_POST['id']);
	$data = array(
		'nama_rekening'=>$_POST['nama_rekening'],
		'nomor_bilyet'=>$_POST['nomor_bilyet'],
		'seri_bilyet'=>$_POST['seri_bilyet'],
		'transaksi_via'=>$_POST['transaksi_via'],
		'counter_aro'=>$_POST['counter_aro'],
		'produk'=>$produk,
		'jenis_bunga'=>$_POST['jenis_bunga'],
		'bunga_via'=>$_POST['bunga_via'],
		'nama_bank'=>$_POST['nama_bank'],
		'rekening_bank'=>$_POST['rekening_bank'],
		'nama_rekening_bank'=>$_POST['nama_rekening_bank'],
		'nama_penarik_bunga'=>$_POST['nama_penarik_bunga'],
		'rekening_internal'=>$rekening_internal,
		'alamat_mail'=>$_POST['alamat_mail'],
		'sales_id'=>$_POST['sales_id'],
		'status_rekening'=>$_POST['status_rekening'],
		'tanggal_blokir'=>$tanggal_blokir,
		'user_blokir'=>$user_blokir,
		'alasan_blokir'=>$_POST['alasan_blokir'],		
		'tanggal_buka_blokir'=>$tanggal_buka_blokir,
		'user_buka_blokir'=>$user_buka_blokir,
		'tanggal_tutup'=>$tanggal_tutup,
		'user_tutup'=>$user_tutup,
		'min_pajak'=>keangka($_POST['min_pajak']),
		'pajak'=>$_POST['pajak'],
		'kena_pajak'=>$_POST['kena_pajak'],
		'sandi_deposito'=>$sandi_deposito,
		'sandi_perantara'=>$sandi_perantara,		
		'updated_at' => date('Y-m-d H:i:s'),
		'updated_id' => $userid,
	    'bussdate' => date('Y-m-d H:i:s')
	);
    $where = array('id' => $_POST['id']);
	$hasil=$result->update('deposito.deposits', $data, $where);
	$result->res("UPDATE $tabel_nasabah SET tlphp1='".$_POST['tlphp1']."' WHERE nonas='".$_POST['nonas']."'");
	if(!$hasil) echo 'Update Data Tidak Berhasil';
	echo "Sukses Update Data";
	$result->close();
	$catat="Merubah Data Deposito ".$id." Tanggal ".date('Y-m-d H:i:s');
	include 'around.php';
	break;
case "3":
	$bulan=$blnxxx.$thnxxx;
	$tabeln="deposito.cadangan_".$bulan;
	$hasil=$result->query_x1("SELECT id,branch,nomor_nasabah,sufix,nomor_bilyet,seri_bilyet,bunga_bersih,jumlah_hari,bunga_ke,id_deposito,nama_rekening,produk,stitipan,scadangan FROM $tabeln WHERE bulan_bunga='$bulan' AND flag_bayar=1 AND tanggal_jatuh_tempo<='$t' ORDER BY produk,nomor_nasabah,bunga_ke");
	$notran=$result->no_transaksi(0);$noreferensi=substr($notran,0,5);
	if($result->num($hasil)<1)die('Data Tidak Ada!!!');
	$text ="INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES";
	while($row=$result->row($hasil)){
		$scadanganx=$row['scadangan'];
		$scadangan=$row['branch'].$row['scadangan'].'360';
		$stitipanx=$row['stitipan'];
		$stitipan=$row['branch'].$row['stitipan'].'360';
		$file='json/sandi.json';
		$xuser=$userid;
		$json_file = file_get_contents($file);
		$jfo = json_decode($json_file,TRUE);
		$huruf=array($scadanganx,$stitipanx);
		$y=0;
		while($y<2){
			$deb1=$huruf[$y];
			for($i=0; $i<count($jfo); $i++){
				if($deb1==$jfo[$i]['nonas']){
					$namas[$y]=$jfo[$i]['nama'];
				}
			}
			$y++;
		}
		if($row['bunga_bersih']>0){
			$desc="NET BUNGA DEPOSITO HARIAN ".$row['nama_rekening'].' - '.$row['nomor_bilyet'].'-'.$row['seri_bilyet'].' KE '.$row['bunga_ke'];
			$text .="('".$row['branch']."','".$scadanganx."',360,'".$scadangan."','".$namas[0]."','".$scadangan."','".$row['id']."','".$row['bunga_bersih']."',349,65,'".$notran."','".$desc."','".$row['produk']."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',61,'".$noreferensi."'),";
			$text .="('".$row['branch']."','".$stitipanx."',360,'".$stitipan."','".$namas[1]."','".$stitipan."','".$row['id']."','".$row['bunga_bersih']."',449,65,'".$notran."','".$desc."','".$row['produk']."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',61,'".$noreferensi."'),";			
		}
	}
	$text =substr_replace($text,';',-1);
	$text .="UPDATE $tabeln a JOIN $tabelTransaksi b ON a.id=b.nokredit SET a.flag_bayar=2,a.tgl_posting=now(),a.user_posting='$userid' WHERE b.kdkredit=61 AND b.jtransaksi=65";
	//echo $text;
	$result->multi_x($text);echo 'Sukses Posting Cadangn Bunga Deposito Harian';
	$result->close();$catat="Posting Bunga Deposito Sukses Tanggal ".date('Y-m-d H:i:s');include 'around.php';
	break;
case "4":
	die('Under Construction');
	break;
case "5":
	include 'function/ftanggal.php';
	$bulan =$blnxxx.$thnxxx;
	$tabelr='deposito.deposits_cadangan';
	$tabeln='deposito.deposits';
	$tabels='deposito.tem_deposits'.$bulan;
	$result->res("UPDATE $tabeln a JOIN $tabelTransaksi b ON a.id=b.nokredit SET a.status_rekening=1 WHERE b.jtransaksi=68 AND b.kdkredit=60");
	$result->res("DELETE FROM $tabelr a JOIN $tabeln b ON a.id_deposito=b.id WHERE b.bulan_aro='$bulan'");
	$result->res("DELETE FROM $tabeln WHERE bulan_aro='$bulan'");
	//$result->res("DELETE FROM $tabeln a JOIN $tabels b ON a.id=b.id_deposito WHERE b.kode_aro=2");
	//$result->res("DELETE FROM $tabelr a JOIN $tabels b ON a.id_deposito=b.id_deposito WHERE b.kode_aro=2");
	$result->res("DELETE FROM $tabelTransaksi WHERE jtransaksi=68 AND kdkredit=60");
	$result->dropTable($tabels);
	$result->buatTabel($tabels,'deposito.tem_deposits');
	$hasil=$result->query_cari("SELECT a.id,a.branch,a.nomor_nasabah,a.sufix,a.nomor_bilyet,a.seri_bilyet,a.nama_rekening,a.rekening_internal,a.produk,a.tanggal_buka,a.jangka_waktu,a.nominal,a.tanggal_jatuh_tempo,a.counter_rate,a.counter_aro,a.bunga_harian,a.pajak_bulan,a.total_bunga,a.total_pajak,a.net_bunga,a.total_tarik,a.jumlah_hari,a.status_rekening,a.transaksi_via,a.bunga_via,a.rekening_bank,a.nama_bank,a.nama_rekening_bank,a.nama_penarik_bunga,a.jenis_bunga,a.kena_pajak,a.min_pajak,a.pajak,a.alamat_mail,a.sales_id,a.sandi_bi,a.sandi_deposito,a.sandi_perantara FROM $tabeln a JOIN $tabelr b ON a.id=b.id_deposito WHERE CONCAT(MONTH(a.tanggal_jatuh_tempo),YEAR(a.tanggal_jatuh_tempo))=CONCAT(MONTH('$t'),YEAR('$t')) AND a.counter_aro=1 AND a.status_rekening=1 AND b.flag_bayar=1 GROUP BY a.id HAVING (a.net_bunga-SUM(b.bunga_bersih))<1 ORDER BY a.id");	
	$text="INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES";
	
	$text1="INSERT INTO $tabeln(branch,nomor_nasabah,sufix,nomor_bilyet,seri_bilyet,nama_rekening,rekening_internal,produk,tanggal_buka,jangka_waktu,nominal,tanggal_jatuh_tempo,counter_rate,counter_aro,bunga_harian,pajak_bulan,total_bunga,total_pajak,net_bunga,total_tarik,jumlah_hari,status_rekening,transaksi_via,bunga_via,rekening_bank,nama_bank,nama_rekening_bank,nama_penarik_bunga,jenis_bunga,kena_pajak,min_pajak,pajak,alamat_mail,sales_id,sandi_bi,sandi_deposito,sandi_perantara,bulan_aro,tanggal_aro,user_aro) VALUES";
	
	$text2="INSERT INTO $tabels(tanggal_akhir,bunga_harian,pajak_bulan,total_bunga,total_pajak,net_bunga,total_tarik,jumlah_hari,kode_aro,id_deposito,status_rekening) VALUES";
	$notran=$result->no_transaksi(0);$noreferensi=substr($notran,0,5);
	while ($data=$result->row($hasil)){
		$branch=$data['branch'];
		$no_nasabah=$data['nomor_nasabah'];
		$sdeposito=$data['sandi_deposito'];
		$sdepositox=substr($data['sandi_deposito'],4,6);
		$stitipan=$data['rekening_internal'];
		$stitipanx=substr($data['rekening_internal'],4,6);
		$hasilx=$result->query_y1("SELECT MAX(sufix) AS nomor FROM $tabeln WHERE nomor_nasabah='$no_nasabah'",'');
		if($result->num($hasilx)>0){
			$datamax= $result->row($hasilx);
			$sufix = $datamax['nomor'];
			if(empty($sufix) || $sufix=='' || $sufix==1){
				$sufix=600;
			}else{
				$sufix=$sufix+1;
			}
		}else{
			$sufix=600;
		}
		$file='json/sandi.json';
		$xuser=$userid;
		$json_file = file_get_contents($file);
		$jfo = json_decode($json_file,TRUE);
		$huruf=array($sdepositox,$stitipanx);
		$y=0;
		while($y<2){
			$deb1=$huruf[$y];
			for($i=0; $i<count($jfo); $i++){
				if($deb1==$jfo[$i]['nonas']){
					$namas[$y]=$jfo[$i]['nama'];
				}
			}
			$y++;
		}
		$desc="DEPOSITO ARO NAMA ".$data['nama_rekening'].' - '.$data['nomor_bilyet'].'-'.$data['seri_bilyet'];
		$text .="('".$branch."','".$sdepositox."',360,'".$sdeposito."','".$namas[0]."','".$sdeposito."','".$data['id']."','".$data['nominal']."',356,68,'".$notran."','".$desc."','".$data['produk']."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',60,'".$noreferensi."'),";
		$text .="('".$branch."','".$stitipanx."',360,'".$stitipan."','".$namas[1]."','".$stitipan."','".$data['id']."','".$data['nominal']."',456,68,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',60,'".$noreferensi."'),";
			
		$text1 .="('".$data['branch']."','".$data['nomor_nasabah']."','".$sufix."','".$data['nomor_bilyet']."','".$data['seri_bilyet']."','".$data['nama_rekening']."','".$data['rekening_internal']."','".$data['produk']."','".$data['tanggal_jatuh_tempo']."','".$data['jangka_waktu']."','".$data['nominal']."',NULL,'".$data['counter_rate']."','".$data['counter_aro']."',0,0,0,0,0,0,0,1,'".$data['transaksi_via']."','".$data['bunga_via']."','".$data['rekening_bank']."','".$data['nama_bank']."','".$data['nama_rekening_bank']."','".$data['nama_penarik_bunga']."','".$data['jenis_bunga']."','".$data['kena_pajak']."','".$data['min_pajak']."','".$data['pajak']."','".$data['alamat_mail']."','".$data['sales_id']."',NULL,'".$data['sandi_deposito']."','".$data['sandi_perantara']."','".$bulan."',now(),'".$userid."'),";
		
		$text2 .="('".$data['tanggal_jatuh_tempo']."','".$data['bunga_harian']."','".$data['pajak_bulan']."','".$data['total_bunga']."','".$data['total_pajak']."','".$data['net_bunga']."','".$data['total_tarik']."','".$data['jumlah_hari']."',1,'".$data['id']."','".$data['status_rekening']."'),";	
	}
	$text1=substr_replace($text1,'',-1);
	$result->query_y1($text1,'');
	
	$hasil=$result->query_cari("SELECT id,branch,nomor_nasabah,sufix,nomor_bilyet,seri_bilyet,nama_rekening,rekening_internal,produk,tanggal_buka,jangka_waktu,nominal,counter_rate,jenis_bunga,kena_pajak,min_pajak,pajak,sandi_deposito,sandi_perantara,status_rekening FROM $tabeln WHERE bulan_aro='$bulan' ORDER BY nomor_nasabah");
	
	$text1="INSERT INTO $tabelr(branch,sufix,nomor_bilyet,seri_bilyet,nomor_nasabah,tanggal_jatuh_tempo,bunga_bulanan,pajak_bulanan,bunga_bersih,jumlah_hari,bunga_ke,bulan_bunga,id_deposito,tgl_otorisasi,user_otorisasi) VALUES";
	$tabelb='deposito.'.$userid;
	//$result->dropTable($userid);
	$result->tem_tabel($tabelb,'deposito.tem_cadn');
	//$result->dropTable($tabelb);
	//$result->buatTabel($tabelb,'deposito.tem_cadn');
	$notran=$result->no_transaksi(0);$noreferensi=substr($notran,0,5);
	while($data=$result->row($hasil)){
		$branch=$data['branch'];
		$no_bilyet=$data['nomor_bilyet'];
		$seri_bilyet=$data['seri_bilyet'];
		$sufix=$data['sufix'];
		$no_nasabah=$data['nomor_nasabah'];
		$sufix=$data['sufix'];
		$sdeposito=$data['sandi_deposito'];
		$sdepositox=substr($data['sandi_deposito'],4,6);
		$stitipan=$data['rekening_internal'];
		$stitipanx=substr($data['rekening_internal'],4,6);
		$tgl_buka=$data['tanggal_buka'];
		$nominal=$data['nominal'];
		$jangka_waktu=$data['jangka_waktu'];
		$suku_bunga=$data['counter_rate'];
		$file='json/sandi.json';
		$xuser=$userid;
		$json_file = file_get_contents($file);
		$jfo = json_decode($json_file,TRUE);
		$huruf=array($sdepositox,$stitipanx);
		$y=0;
		while($y<2){
			$deb1=$huruf[$y];
			for($i=0; $i<count($jfo); $i++){
				if($deb1==$jfo[$i]['nonas']){
					$namas[$y]=$jfo[$i]['nama'];
				}
			}
			$y++;
		}
		$metode_hitung=$data['jenis_bunga'];
		$kena_pajak=$data['kena_pajak'];
		$min_pajak=$data['min_pajak'];
		$pajak=$data['pajak'];
		$ide=$data['id'];
		include 'deposito_hitungx.php';
		$tes=$result->res("SELECT tanggal,bunga_bulanan,pajak_bulanan,bunga_bersih,jumlah_hari,bunga_ke,bulan_bunga,id_deposito FROM $tabelb WHERE id_deposito='$ide' ORDER BY bunga_ke");
		$jumlah1=0;$jumlah2=0;$jumlah3=0;$jumlah4=0;
		while($row=$result->row($tes)){
			$jumlah1=$jumlah1+$row['bunga_bulanan'];
			$jumlah2=$jumlah2+$row['pajak_bulanan'];
			$jumlah3=$jumlah3+$row['bunga_bersih'];
			$jumlah4=$jumlah4+$row['jumlah_hari'];
			$tgl_akhir=$row['tanggal'];
			$text1 .="('".$branch."','".$sufix."','".$no_bilyet."','".$seri_bilyet."','".$no_nasabah."','".$row['tanggal']."','".$row['bunga_bulanan']."','".$row['pajak_bulanan']."','".$row['bunga_bersih']."','".$row['jumlah_hari']."','".$row['bunga_ke']."','".$row['bulan_bunga']."','".$row['id_deposito']."',now(),'".$userid."'),";	
		}		
		$text2 .="('".$tgl_akhir."','".$bunga_hari."','".$pajak_bulan."','".$jumlah1."','".$jumlah2."','".$jumlah3."',0,'".$jumlah4."',2,'".$data['id']."','".$data['status_rekening']."'),";
		$desc="DEPOSITO ARO BARU NAMA ".$data['nama_rekening'].' - '.$data['nomor_bilyet'].'-'.$data['seri_bilyet'];
		$text .="('".$branch."','".$stitipanx."',360,'".$stitipan."','".$namas[1]."','".$stitipan."','".$data['id']."','".$data['nominal']."',356,68,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',60,'".$noreferensi."'),";
		$text .="('".$branch."','".$sdepositox."',360,'".$sdeposito."','".$namas[0]."','".$sdeposito."','".$data['id']."','".$data['nominal']."',456,68,'".$notran."','".$desc."','".$data['produk']."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',60,'".$noreferensi."'),";			
	}
	//$text1=substr_replace($text1,';',-1);
	//echo $text1;die();
	//$result->query_y1($text2,'');
	
	$text=substr_replace($text,';',-1);
	$text1=substr_replace($text1,';',-1);
	$text2=substr_replace($text2,';',-1);
	$text .=$text1;
	$text .=$text2;
	$text .="UPDATE $tabeln a JOIN $tabels b ON a.id=b.id_deposito SET a.status_rekening=4 WHERE b.kode_aro=1;";
	$text .="UPDATE $tabeln a JOIN $tabels b ON a.id=b.id_deposito SET a.tanggal_jatuh_tempo=b.tanggal_akhir,a.bunga_harian=b.bunga_harian,a.pajak_bulan=b.pajak_bulan,a.total_bunga=b.total_bunga,a.total_pajak=b.total_pajak,a.net_bunga=b.net_bunga,a.jumlah_hari=b.jumlah_hari,a.operator_id='$userid',a.operator_at=now(),otorisator_id='$userid',otorisasi_at=now(),updated_id='$userid',updated_at=now() WHERE b.kode_aro=2";
	$result->multi_x($text);
	echo 'Sukses Posting Deposito Aro';
	$result->close();
	$catat="Posting Deposito Aro Sukses Tanggal ".date('Y-m-d H:i:s');
	include 'around.php';	
	break;
case "6":
	die('Under Construction');
	break;
case "7":
	$id=$result->c_d($_POST['id']);
	$no_bilyet=$result->c_d($_POST['nomor_bilyet']);
	$seri_bilyet=$result->c_d($_POST['seri_bilyet']);
	$nama=$result->c_d($_POST['nama']);
	$produk=$result->c_d($_POST['produk']);
	$finalty_bunga=$result->c_d($_POST['finalty_bunga']);
	$nominal=$result->c_d(keangka($_POST['nominal']));
	$tran_normal=$result->c_d($_POST['tran_normal']);
	$branch=$result->c_d($_POST['branch']);
	$net_bunga=$result->c_d($_POST['net_bunga']);	
	$sdeposito=$result->c_d($_POST['sdeposito']);
	$stitipan=$result->c_d($_POST['sinternal']);
	$sfinalty=$branch.$result->c_d($_POST['sfinalty']).'360';
	$sdepositox=substr($sdeposito,4,6);
	$stitipanx=substr($stitipan,4,6);
	$sfinaltyx=$result->c_d($_POST['sfinalty']);
	$net_finalty=0;
	if($tran_normal==1){
		if($finalty_bunga!=0){
			$net_finalty=intval(($nominal*$finalty_bunga)/100);
		}
	}else{
		if($net_bunga>0){
			die("Pencairan Normal, Masih Ada Bunga Yang Belum Di Bayar!!!");
		}
	}
	$file='json/sandi.json';
	$xuser=$userid;
	$json_file = file_get_contents($file);
	$jfo = json_decode($json_file,TRUE);
	$huruf=array($sdepositox,$stitipanx,$sfinaltyx);
	$y=0;
	while($y<3){
		$deb1=$huruf[$y];
		for($i=0; $i<count($jfo); $i++){
			if($deb1==$jfo[$i]['nonas']){
				$namas[$y]=$jfo[$i]['nama'];
			}
		}
		$y++;
	}
	$notran=$result->no_transaksi(0);$noreferensi=substr($notran,0,5);
	$text = "INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES";		
	$desc="PECAIRAN DEPOSITO NAMA ".$nama.' - '.$no_bilyet.'-'.$seri_bilyet;
	$text .="('".$branch."','".$sdepositox."',360,'".$sdeposito."','".$namas[0]."','".$sdeposito."','".$id."','".$nominal."',356,67,'".$notran."','".$desc."','".$produk."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',60,'".$noreferensi."'),";
	$desc="PECAIRAN DEPOSITO NAMA ".$nama.' - '.$no_bilyet.'-'.$seri_bilyet;
	$text .="('".$branch."','".$stitipanx."',360,'".$stitipan."','".$namas[1]."','".$stitipan."','".$id."','".$net_bunga."',456,67,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',60,'".$noreferensi."'),";
	if($net_finalty>0){
		$desc="FINALTY DEPOSITO NAMA ".$nama.' - '.$no_bilyet.'-'.$seri_bilyet;
		$text .="('".$branch."','".$stitipanx."',360,'".$stitipan."','".$namas[1]."','".$stitipan."','".$id."','".$net_finalty."',357,67,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',64,'".$noreferensi."'),";		
		$desc="FINALTY DEPOSITO NAMA ".$nama.' - '.$no_bilyet.'-'.$seri_bilyet;
		$text .="('".$branch."','".$sfinaltyx."',360,'".$sfinalty."','".$namas[2]."','".$sfinalty."','".$id."','".$net_finalty."',457,67,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',64,'".$noreferensi."'),";
		
	}
	$text =substr_replace($text,';',-1);
	$text .="UPDATE deposito.deposits SET status_rekening=4,user_tutup='$userid',tanggal_tutup=now() WHERE id='$id';";
	if($tran_normal==1){
		$text .="DELETE FROM deposito.tem_cadangan WHERE id_deposito='$id';";
		$text .="INSERT INTO deposito.tem_cadangan SELECT * FROM deposito.deposits_cadangan WHERE id_deposito='$id';";
		$text .="DELETE FROM deposito.deposits_cadangan WHERE flag_bayar=0 AND id_deposito='$id'";
	}else{
		$text =substr_replace($text,'',-1);
	}
	$result->multi_x($text);
	echo 'Sukses Pencairan Deposito';
	$result->close();
	$catat="Pencairan Deposito Sukses Tanggal ".date('Y-m-d H:i:s');
	include 'around.php';		
	break;
}
?>