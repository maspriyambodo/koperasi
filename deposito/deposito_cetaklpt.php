<?php
include 'auth.php';
include 'koneksi.php';
include 'function.php';
include 'qprintdepo.php';

$tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
$file =  tempnam($tmpdir, 'ctk');
// $file =  "d:\ctk"; #tempnam($tmpdir, 'ctk');  # nama file temporary yang akan dicetak
$handle = fopen($file, 'w');
$total=0;
$Data =CHR(27).CHR(64).CHR(27).CHR(120).CHR(0);
// while($row = $result->fetch_array(MYSQLI_BOTH)){
	// $total = intval($row['pokok']+$row['bunga']+$row['adm']);
	$Data .= CHR(18).CHR(27).CHR(77).CHR(27).CHR(69)."	                SK MENTERI KOPERASI".CHR(15).CHR(27).CHR(70)."\n";
	$Data .= CHR(18).CHR(27).CHR(77).CHR(27).CHR(69)."	NOMOR: II/BH/XXIV/XI/2012 TANGGAL: 19 NOPEMBER 2012 ".CHR(15).CHR(27).CHR(70)."\n";
	$Data .= CHR(18).CHR(27).CHR(77).CHR(27).CHR(69)."	                SIMPANAN BERJANGKA".CHR(15).CHR(27).CHR(70)."\n";
	// $Data .= "   ".$ncabang.CHR(18)."\n";
	$Data .= "\n";
	// $Data .= "       BILYET DEPOSITO".CHR(27).CHR(77).CHR(18).CHR(15)."\n";
	// $Data .= "                              Alamat : ".$ncabang."\n";
	// $Data .= "                               HP. 081 241 621 243".CHR(18)."\n";
	$Data .= "											Nomor Seri     : ".$_POST['nomor_bilyet']."\n";
	$Data .= "											CIF            : ".$_POST['nomor_nasabah']."\n";
	$Data .= "											Tanggal Valuta : ".$_POST['tanggal_buka']."\n"; //$alamat.' '.$lurah.' '.$camat;
	$Data .= "\n";
	$Data .= "UNTUK & ATAS NAMA : ".$_POST['nama']."\n";
	$Data .= "ALAMAT            : ".$_POST['alamat'].", ".$_POST['lurah'].", ".$_POST['camat']."\n";
	$Data .= "\n";
	$Data .= "JUMLAH               : ".$_POST['nominal']."\n";
	$Data .= "TERBILANG            : ".$_POST['nominal']."\n";
	$Data .= "Bunga Per Tahun      : ".$_POST['bunga']."                       Tipe Perpanjangan Bunga   : ".$_POST['counter_aro']."\n";
	$Data .= "Jangka Waktu         : ".$_POST['jangka_waktu']."                      Transfer Ke Rekening Bank : ".$_POST['bunga']."\n";
	$Data .= "Jatuh Tempo          : ".$_POST['tipe_tanggal_jatuh_tempo']."\n";
	$Data .= "		                                                            ".$ncabang.", ".$tanggal."\n";
	$Data .= "Tipe Pembayaran          : ".$_POST['transaksi_via']."		                                 Mengetahui,\n";
	$Data .= "                           DITRANSFER KE BANK ".$_POST['nama_bank']."\n";
	$Data .= "                           ATAS NAMA : ".$_POST['nama_rekening_bank']."\n";
	$Data .= "                           NOMOR REKENING : ".$_POST['rekening_bank']."\n";
	$Data .= "		                                                            (                        )\n";
	$Data .= "		                                                                     PEMIMPIN\n";
	// $Data .= "-------------------------------------------------\n";
	// $Data .= "Asli Untuk Nasabah dan disimpan dengan baik".CHR(18)."\n";
	$Data .= "\n";
	$Data .= "\n";
	$Data .= "\n";
	$Data .= "\n";
// }
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
?>

