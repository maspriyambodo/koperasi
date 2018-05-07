<?php
include 'auth.php';
include 'koneksi.php';
include 'function.php';

// pendefinisian folder font pada FPDF
define('FPDF_FONTPATH', 'fpdf/font/');
require('fpdf/fpdf.php');

// seperti sebelunya, kita membuat class anakan dari class FPDF
 class PDF extends FPDF{

  function Header(){
   include 'auth.php';
   $this->Image('images/logo1.jpg',1,1,2.25); // logo
   $this->SetTextColor(0,0,0); // warna tulisan
   $this->SetFont('Arial','B','12'); // font yang digunakan
   // membuat cell dg panjang 19 dan align center 'C'
   $this->Cell(19,1,'KOPERASI NABASA',0,0,'C');
   $this->Ln();
   $this->Cell(2,1,$ncabang,0,0,'L');
   $this->Cell(15,0,'Nominatif Deposito',0,0,'C');
   $this->Ln();
   $this->Cell(19,1,'Tanggal: '.$tanggal,0,0,'C');
   $this->Ln();
   $this->SetFont('Arial','B','9');
   $this->SetFillColor(192,192,192); // warna isi
   $this->SetTextColor(0,0,0); // warna teks untuk th
   $this->Cell(1);
   $this->Cell(1,1,'No','TB',0,'C',1); // cell dengan panjang 1
   $this->Cell(4,1,'Nama','TB',0,'L',1); // cell dengan panjang 4
   $this->Cell(3,1,'Nomor Nasabah','TB',0,'C',1); // cell dengan panjang 3
   $this->Cell(2,1,'Tgl. Buka','TB',0,'C',1); // cell dengan panjang 3
   $this->Cell(3,1,'Jangka Waktu','TB',0,'C',1); // cell dengan panjang 3
   $this->Cell(1,1,'Bunga','TB',0,'C',1); // cell dengan panjang 3
   $this->Cell(3,1,'Nominal','TB',0,'R',1); // cell dengan panjang 2
   // panjang cell bisa disesuaikan
   $this->Ln();
  }

  function Footer(){
   $this->SetY(-2,5);
   $this->Cell(0,1,$this->PageNo(),0,0,'C');
  } 
 }

 // $q = "SELECT a.id,a.nomor_nasabah,a.nomor_bilyet,a.bunga_bulanan,a.pajak_bulanan,a.bunga_bersih,b.nama_rekening,a.tanggal_jatuh_tempo,b.nominal,b.jangka_waktu FROM deposits_cadangan a JOIN deposits b WHERE a.nomor_bilyet=b.nomor_bilyet AND a.tanggal_jatuh_tempo='$tgl'";
 $tgl=date_sql($tanggal);
 $q = "SELECT a.id,b.nama,a.nomor_nasabah,a.tanggal_buka,a.bunga,a.jangka_waktu,a.nominal,a.flag_buka FROM deposits a JOIN nasabah b ON a.nomor_nasabah=b.nonas WHERE flag_cetak=1 ORDER BY a.tanggal_buka";
 $h = $mysql->query($q) or die($mysql->error);
 $i = 0;
 
 while($d=$h->fetch_array()){
  $cell[$i][0]=$d[1];
  $cell[$i][1]=$d[2];
  $cell[$i][2]=date_format(date_create($d[3]),'d-m-Y');
  $cell[$i][3]=$d[4]." BULAN";
  $cell[$i][4]=$d[5]." %";
  $cell[$i][5]=formatrp($d[6]);
  $i++;
 }
 // orientasi Portrait
 // ukuran cm
 // kertas A4
 $pdf = new PDF('P','cm','A4');
 $pdf->Open();
 $pdf->AliasNbPages();
 $pdf->AddPage();

 $pdf->SetFont('Arial','','8');
 //perulangan untuk membuat tabel
 for($j=0;$j<$i;$j++){
  $pdf->Cell(1);
  $pdf->Cell(1,1,$j+1,'B',0,'C');
  $pdf->Cell(4,1,$cell[$j][0],'B',0,'L');
  $pdf->Cell(3,1,$cell[$j][1],'B',0,'C');
  $pdf->Cell(2,1,$cell[$j][2],'B',0,'C');
  $pdf->Cell(3,1,$cell[$j][3],'B',0,'C');
  $pdf->Cell(1,1,$cell[$j][4],'B',0,'C');
  $pdf->Cell(3,1,$cell[$j][5],'B',0,'R');
  $pdf->Ln();
 }

 $pdf->Output(); // ditampilkan

?>