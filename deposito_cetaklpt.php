<?php
include 'h_tetap.php';
$id=$result->c_d($_GET['id']);
$hasil=$result->query_x1("SELECT a.branch,a.nomor_bilyet,a.seri_bilyet,a.nomor_nasabah,a.tanggal_buka,a.nama_rekening,a.nominal,a.net_bunga,a.counter_aro,a.jangka_waktu,a.tanggal_jatuh_tempo,a.transaksi_via,nama_bank,nama_rekening_bank,rekening_bank,a.flag_cetak,a.bunga_via,b.alamat,b.lurah,b.camat,c.nmproduk FROM deposito.deposits a JOIN $tabel_nasabah b ON b.nonas=a.nomor_nasabah JOIN deposito.prd_deposito c ON a.produk=c.kdproduk WHERE a.id='$id' LIMIT 1");
$row=$result->row($hasil);
$branch=$row['branch'];
$cabang=$result->namacabang($branch);
$flag_cetak=$row['flag_cetak'];
$huruf = array("Non-ARO", "ARO","ARO+");$i = 0;
while ($i<3){
	if ($row['counter_aro'] == $i){
	 	$counter_aro=$huruf[$i];
	}$i++;
}
$huruf = array("TUNAI", "PINDAH BUKU", "TRANSFER");$i = 0;
while ($i < 3) {
	if ($row['bunga_via'] == $i){
		$bunga_via=$huruf[$i];
	}$i++;
}
$tmpdir = sys_get_temp_dir();
$file =  tempnam($tmpdir, 'ctk');
// $file =  "d:\ctk"; #tempnam($tmpdir, 'ctk');  # nama file temporary yang akan dicetak
$handle = fopen($file, 'w');
$total=0;
$Data =CHR(27).CHR(64).CHR(27).CHR(120).CHR(0);
$Data .= CHR(18).CHR(27).CHR(77).CHR(27).CHR(69)."	                SK MENTERI KOPERASI".CHR(15).CHR(27).CHR(70)."\n";
$Data .= CHR(18).CHR(27).CHR(77).CHR(27).CHR(69)."	NOMOR: II/BH/XXIV/XI/2012 TANGGAL: 19 NOPEMBER 2012 ".CHR(15).CHR(27).CHR(70)."\n";
$Data .= CHR(18).CHR(27).CHR(77).CHR(27).CHR(69)."	                SIMPANAN BERJANGKA".CHR(15).CHR(27).CHR(70)."\n";
$Data .= "\n";
// $Data .= "       BILYET DEPOSITO".CHR(27).CHR(77).CHR(18).CHR(15)."\n";
// $Data .= "                              Alamat : ".$ncabang."\n";
// $Data .= "                               HP. 081 241 621 243".CHR(18)."\n";
$Data .= "											Nomor Seri     : ".$row['nomor_bilyet'].' '.$row['seri_bilyet']."\n";
$Data .= "											CIF            : ".$row['nomor_nasabah']."\n";
$Data .= "											Tanggal Valuta : ".$row['tanggal_buka']."\n";
$Data .= "\n";
$Data .= "UNTUK & ATAS NAMA : ".$row['nama_rekening']."\n";
$Data .= "ALAMAT            : ".$row['alamat'].", ".$row['lurah'].", ".$row['camat']."\n";
$Data .= "\n";
$Data .= "JUMLAH               : ".$row['nominal']."\n";
$Data .= "TERBILANG            : ".terbilang($row['nominal'])."\n";
$Data .= "Bunga Per Tahun      : ".$row['net_bunga']."                       Tipe Perpanjangan Bunga   : ".$counter_aro."\n";
$Data .= "Jangka Waktu         : ".$row['jangka_waktu']."                      Transfer Ke Rekening Bank : ".$row['net_bunga']."\n";
$Data .= "Jatuh Tempo          : ".$row['tanggal_jatuh_tempo']."\n";
$Data .= "		                                                            ".$cabang.", ".$tanggal."\n";
$Data .= "Tipe Pembayaran          : ".$bunga_via."		                                 Mengetahui,\n";
$Data .= "                           DITRANSFER KE BANK ".$row['nama_bank']."\n";
$Data .= "                           ATAS NAMA : ".$row['nama_rekening_bank']."\n";
$Data .= "                           NOMOR REKENING : ".$row['rekening_bank']."\n";
$Data .= "		                                                            (                        )\n";
$Data .= "		                                                                     PEMIMPIN\n";
$Data .= "\n";
$Data .= "\n";
$Data .= "\n";
$Data .= "\n";
fwrite($handle, $Data);
fclose($handle);
copy($file, "//localhost/epsonlpt");  # Lakukan cetak
	//$lipsum = file_get_contents($file);
	/* open a connection to the printer */
	//$printer = printer_open("EPSON LQ");
	/* write the text to the print job */
	//printer_write($printer, $lipsum);
	/* close the connection */
	//printer_close($printer);
unlink($file);
if($flag_cetak==0){
	$result->query_x1("UPDATE deposito.deposits SET flag_cetak=1,tgl_cetak=now(),user_cetak='$userid',counter_cetak=counter_cetak+1 WHERE id='$id' LIMIT 1");
}else{
	$result->query_x1("UPDATE deposito.deposits SET flag_cetak=2,tgl_cetak_ulang=now(),user_cetak_ulang='$userid',counter_cetak=counter_cetak+1 WHERE id='$id' LIMIT 1");	
}
?>

