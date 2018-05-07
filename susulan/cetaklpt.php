<?php
include '../h_tetap.php';
include "../susulan/qtagihand.php"; 
$no=1;  
$tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
$file =  tempnam($tmpdir, 'ctk');
//$file =  "d:\ctk"; #tempnam($tmpdir, 'ctk');  # nama file temporary yang akan dicetak
$handle = fopen($file, 'w');
$total=0;
$Data =CHR(27).CHR(64).CHR(27).CHR(120).CHR(0);
while($row = $result->row($hasil)){
	$total = intval($row['pokok']+$row['bunga']+$row['adm']);
	$Data .= CHR(18).CHR(27).CHR(77).CHR(27).CHR(69)."KSP NABASA".CHR(15).CHR(27).CHR(70)."\n";
	$Data .= "   ".$ncabang.CHR(18)."\n";
	$Data .= "\n";
	$Data .= "       KWITANSI PENERIMAAN ANGSURAN PINJAMAN".CHR(27).CHR(77).CHR(18).CHR(15)."\n";
	$Data .= "                  SK Menteri Koperasi Nomor : II/BH/XXIV/XI/2012\n";
	$Data .= "                              Alamat : ".$ncabang."\n";
	$Data .= "                               HP. 081 241 621 243".CHR(18)."\n";
	$Data .= "------------------------------------------------\n";
	$Data .= "Sudah Di Terima Dari :\n";
	$Data .= "Nama                 : ".$row['nama']."\n";
	$Data .= "Alamat               : ".$row['alamat']."\n";
	$Data .= "Rekening             : ".$row['norek'].'-'.$row['nonas']."\n";
	$Data .= "Kantor Bayar         : ".$row["nmbayar"].'-'.$row["kkbayar"]."\n";
	$Data .= "Angsuran ke          : ".$row['angsurke']." Dari ".$row['jangka']."\n";
	$Data .= "Jumlah               : ".formatrupiah($total)."\n";
	$Data .= "TERBILANG            : ".terbilang($total)."\n";
	$Data .= "Rekomendasi Kolektor : ".$row['namas']."\n";
	$Data .= "No HP Kolektor       : ".$row['notlp']."\n";
	$Data .= "                            ".$ncabang.", ".$tanggal."\n";
	$Data .= "                               Petugas Penagih\n";
	$Data .= "\n";
	$Data .= "\n";
	$Data .= "\n";
	$Data .= "\n";
	$Data .= "                            ".$nameuser."\n";
	$Data .= "-------------------------------------------------\n";
	$Data .= "Asli Untuk Nasabah dan disimpan dengan baik".CHR(18)."\n";
	$Data .= "\n";
	$Data .= "\n";
	$Data .= "\n";
	$Data .= "\n";
	$no++;  
}
fwrite($handle, $Data);
fclose($handle);
copy($file, "//localhost/epslpt");  # Lakukan cetak
	//$lipsum = file_get_contents($file);
	/* open a connection to the printer */
	//$printer = printer_open("EPSON LQ");
	/* write the text to the print job */
	//printer_write($printer, $lipsum);
	/* close the connection */
	//printer_close($printer);
unlink($file);
?>

