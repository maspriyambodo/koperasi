<?php 
if($thn>$thn_akhir)$result->msg_error('Tahun Awal Lebih Besar Tahun Akhir!!');
$thny=$thn_akhir;$ada=FALSE;
if(intval($bln)==1){
	$blnx=12;$blnx=substr('00'.$blnx,-2);$thnx=$thn-1;$ada=TRUE;
	$tabelx=$tabel_sandi.$thnx;
}else{
	$blnx=$bln-1;$blnx=substr('00'.$blnx,-2);$thnx=$thn;
	$tabelx=$tabel_sandi;
}
$fieldhari1='bulan'.substr('00'.$blnx,-2);
$norek=$branch.$nonas.$sufix;
if($ada==TRUE){
	$fieldhari1='tahun12a';
	$hasil=$result->query_x1("SELECT kode,$fieldhari1 FROM $tabelx WHERE norekgssl='$norek' LIMIT 1");
}else{
	$hasil=$result->query_x1("SELECT kode,$fieldhari1 FROM $tabelx WHERE norekgssl='$norek' LIMIT 1");
}
if($result->num($hasil)<1){
	$result->msg_error('No Rekening Tidak Ditemukan...!');
}
$row=$result->row($hasil);
$saldo=$row[$fieldhari1];
$kode=$row['kode'];
$tabel =$tabelTransaksi_.substr('00'.$bln,-2).substr($thn,2,2);
$result->tem_tabel($userid,$tabel_tetap02.'tem_posisi');
$b=$thn;
$y=intval($bln);
$z=intval($bln);
for($a=$b;$a<=$thn_akhir;$a++){
	$x=$a;
	if($x==$thn_akhir){
		$c=$bln_akhir;
	}else{
		$c=12;
	}
	for($i=$y;$i<=$c;$i++){
		$blny= substr("00"."".$i,-2);
		$tabel =$tabelTransaksi_.$blny.substr($x,-2);
		$result->res("INSERT INTO $userid SELECT branch,norekgl,tanggal,keterangan,notransaksi,IF(substr(kdtran,1,1)='1',jumlah,0) AS debetkas,IF(substr(kdtran,1,1)='2',jumlah,0) AS kreditkas,IF(substr(kdtran,1,1)='3',jumlah,0) AS debetmemo,IF(substr(kdtran,1,1)='4',jumlah,0) AS kreditmemo FROM $tabel WHERE branch='$branch' AND norekgl='$norek' ORDER BY notransaksi,tanggal");
	}
	if($c==12){
		$y=1;
	}
}
$hasil=$result->query_x1("SELECT a.norekgl,b.nama FROM $userid a JOIN $tabel_sandi b on a.norekgl=b.norekgssl LIMIT 1");
if($result->num($hasil)<1){
	$result->msg_error('No Rekening Tidak Ditemukan !');
}
$roww=$result->row($hasil);
$nama_rekening=$roww['nama'];
$hasil=$result->query_x1("SELECT branch,norekgl,Date_format(tanggal, '%d-%m-%Y') as tanggal,keterangan,notransaksi,debetkas,kreditkas,debetmemo,kreditmemo FROM $userid");
if($result->num($hasil)<1){
	$result->msg_error('Data Transaksi Tidak Ditemukan !!!');
}
$desc="RINCIAN MUTASI REKENING GSSL : ".$nama_rekening.' POSISI BULAN '.strtoupper(nmbulan($bln_akhir)).' '.$thn_akhir.' SANDI : '.$nonas;
?>