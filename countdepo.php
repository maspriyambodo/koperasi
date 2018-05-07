<?php
include 'auth.php';
include 'class/MySQL.php';
include 'function/ftanggal.php';
$tgl_buka=$result->c_d($_GET['thn_x1']).'-'.$result->c_d($_GET['bln_x1']).'-'.$result->c_d($_GET['tgl_x1']);
$nominal=$result->c_d(keangka($_GET['nominal']));
$jangka_waktu=$result->c_d($_GET['jangka_waktu']);
$suku_bunga=$result->c_d($_GET['bunga']);
$metode_hitung=$result->c_d($_GET['jenis_bunga']);
$produk=$result->c_d($_GET['produk']);
$hasil=$result->query_cari("SELECT kena_pajak,pajak,min_pajak FROM deposito.prd_deposito WHERE kdproduk='$produk' LIMIT 1");
$row=$result->row($hasil);
$min_pajak=$row['min_pajak'];
$pajak=$row['pajak'];
$kena_pajak=$row['kena_pajak'];
$result->tem_tabel($userid,'deposito.tem_cadn');
include 'deposito_hitung.php';
echo "<table width='100%' class='table'><thead>
<tr class='td' bgcolor='#e5e5e5'>
<th>NO</th>
<th>TANGGAL</th>
<th>BUNGA</th>
<th>PAJAK</th>
<th>NET BUNGA</th>";
if($metode_hitung==0){
	echo "<th>HARI</th>";
	$kolom=6;
}
echo "</tr>
</thead>
<tbody>";
$hasil=$result->query_x1("SELECT tanggal,bunga_bulanan,pajak_bulanan,bunga_bersih,jumlah_hari,bunga_ke,bulan_bunga FROM $userid ORDER BY bunga_ke");
$jumlah1=0;$jumlah2=0;$jumlah3=0;$jumlah4=0;
while($row=$result->row($hasil)){
	echo "<tr><td>".$row['bunga_ke']."</td>
	<td>".date_sql($row['tanggal'])."</td>
	<td>".formatRupiah($row['bunga_bulanan'])."</td>
	<td>".formatRupiah($row['pajak_bulanan'])."</td>
	<td>".formatRupiah($row['bunga_bersih'])."</td>
	<td>".$row['jumlah_hari']."</td></tr>";
	$jumlah1=$jumlah1+$row['bunga_bulanan'];
	$jumlah2=$jumlah2+$row['pajak_bulanan'];
	$jumlah3=$jumlah3+$row['bunga_bersih'];
	$jumlah4=$jumlah4+$row['jumlah_hari'];	
}
echo "<tr class='td' bgcolor='#e5e5e5'><td colspan='2'>JUMLAH</td>
<td>".formatRupiah($jumlah1)."</td>
<td>".formatRupiah($jumlah2)."</td>
<td>".formatRupiah($jumlah3)."</td>
<td>".$jumlah4."</td></tr>";	
echo "</tbody>";
?>