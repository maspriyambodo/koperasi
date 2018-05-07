<?php 
include 'h_atas.php';
$bln=$result->c_d($_POST['bln']);
$thn = $result->c_d($_POST['thn']);$xuser='';$bulan=$bln.$thn;
$xbln=intval($bln)-1;$xthn=$thn;
If($xbln<1){
	$xbln='12';
	$xthn=$thn-1;
}
$xtgl=tglAkhirBulan($xthn,$xbln);
$xbln=substr('00'.$xbln,-2);
$xtgl=$xthn.'-'.$xbln.'-'.$xtgl;
$result->query_x1("DELETE FROM $tabelTransaksi WHERE jtransaksi=45");
$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT id,branch,no_inventaris,penyusutan_bulan,sandi_penyusutan,sandi_biaya FROM $tabel_inventaris WHERE kode_proses=0 AND tgl_perolehan<='$xtgl' AND penyusutan_bulan<=nilai_buku");

$hasil=$result->query_x1("SELECT id,branch,no_inventaris,penyusutan_bulan,sandi_penyusutan,sandi_biaya FROM $userid");
if($result->num($hasil)<1) $result->msg_error("Data Penyusutan Bulan ".$bln. "-".$thn." Tidak Ada");

$text="INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES";
$notran=$result->no_transaksi(0);$noreferensi=substr($notran,0,5);
while ($row = $result->row($hasil)) {
	$id = $row['id'];$branch = $row['branch'];$no_inventaris = $row['no_inventaris'];$penyusutan_bulan=$row['penyusutan_bulan'];$sandi_biaya=$row['sandi_biaya'];$sandi_b=substr($sandi_biaya,4,6);$sandi_penyusutan=$row['sandi_penyusutan'];$sandi_p=substr($sandi_penyusutan,4,6);
	$file='json/sandi.json';
	$json_file = file_get_contents($file);
	$jfo = json_decode($json_file,TRUE);
	$huruf = array($sandi_b,$sandi_p);
	$y=0;
	while ($y<2) {
		$deb1=$huruf[$y];
		for ($i=0; $i<count($jfo); $i++) {
			if($deb1==$jfo[$i]['nonas']){
				$namas[$y]=$jfo[$i]['nama'];
			}
		}
		$y++;
	} 
	if ($penyusutan_bulan>0) {
		$desc = "BIAYA PENYUSUTAN INVENTARIS NO - ".$no_inventaris;
		$text .= "('".$branch."','".$sandi_b."',360,'".$sandi_biaya."','".$namas[0]."','".$sandi_biaya."','".$id."','".$penyusutan_bulan."',355,45,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
		$desc = "PENYUSUTAN INVENTARIS NO - ".$no_inventaris;
		$text .= "('".$branch."','".$sandi_p."',360,'".$sandi_penyusutan."','".$namas[1]."','".$sandi_penyusutan."',NULL,'".$penyusutan_bulan."',455,45,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
	}
}
$text = substr_replace($text,'',-1);$result->multi_x($text);$result->msg_error('Proses Penyusutan Inventaris '.$bln.' - '.$thn.' Sekses');$result->close();$catat = "Proses Penyusutan Inventaris ".$bulan;include 'around.php';
?>