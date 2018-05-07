<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.paging.js"></script> 
<script type="text/javascript">
	$(document).ready(function() {
		$('#tableData').paging({limit:15});
	});
</script>
<?php 
$nonas = $result->c_d($_POST['nonas']);
if(strlen($nonas)<3) $result->msg_error('Kriteria Pencairan Minimal 2 Karakter');
$hasil=$result->query_lap("SELECT a.id,b.branch,a.nonas,a.sufix,a.norek,a.saldoawal,a.saldoakhir,a.saldoblokir,a.kdaktif,a.produk,b.nama,DATE_FORMAT(b.tgllahir,'%d-%m-%Y') AS tgllahir,b.noktp,b.nama FROM tabungan a JOIN nasabah b ON a.nonas=b.nonas WHERE a.nonas LIKE '%$nonas%' OR b.nama LIKE '%$nonas%' OR b.noktp LIKE '%$nonas%' ORDER BY a.norek,b.nama");
echo '<table id="tableData" class="table-line">
<thead >
<tr>
	<th>No</th>
	<th>Nonas</th>
	<th>Rekening</th>
	<th>Produk</th>
	<th>Nama</th>
	<th>No KTP</th>
	<th>Saldo Akhir</th>
	<th>Saldo Efektif</th>
	<th>Status</th>
</tr>
</thead>
<tbody>';
$no=1;$m=date_sql($tanggal);
while($row = $result->row($hasil)){ 
	$sawal=$row['saldoawal'];
	$norek=$row['norek'];
	$sakhir=$result->save_saldo($norek,$sawal,0,$m);
	echo '<tr>
	<td>'.$no.'</td>
	<td>'.$row['branch'].'-'.$row['nonas'].'-'.$row['sufix'].'</td>
	<td>'.$row['norek'].'</td>
	<td>'.$row['produk'].'</td>
	<td>'.$row['nama'].'</td>
	<td>'.$row['noktp'].'</td>
	<td align="right">';
	if($level<3){
		echo '<a href="" onclick="editsaldo('.$row['id'].');return false;">'.number_format($row['saldoakhir']).'</a>';
	}else{
		echo number_format($row['saldoakhir']);
	}
	echo '</td>
	<td align="right">'.number_format($row['saldoakhir']-$row['saldoblokir']).'</td><td>';
	if($row['kdaktif']==0){
		echo 'Account Disable';
	}elseif($row['kdaktif']==1){
		echo 'Account Enable';
	}else{
		echo 'Account Close';
	}
	echo '</td>';
	echo '</tr>';
	$no++;
}
echo '</tbody></table>';
?>