<?php include "../gaji/par_atas01.php";
$nik=$result->clean_data($_GET['nik']);
$bulan_absensi=$blnxxx.$thnxxx;
$hasil=$result->query_x("SELECT id,jumlah_sakit,jumlah_izin,jumlah_alpha,jumlah_hadir,bulan_absensi,jam_lembur FROM $tabel_absensi WHERE nik='$nik' AND bulan_absensi='$bulan_absensi' ORDER BY bulan_absensi",'');
if($result->num($hasil)>0){ ?>
	<table class="table-line">
		<thead>
			<tr>
				<th>NO</th>
				<th>BULAN ABSENSI</th>
				<th>JUMLAH HADIR</th>
				<th>JUMLAH IZIN</th>
				<th>JUMLAH ALPHA</th>
				<th>JUMLAH SAKIT</th>
				<th>JUMLAH LEMBUR</th>
				<th align="center">MAINTANCE</th>
			</tr>
		</thead>
	<tbody>
	<?php
	$no=1;
	while($row = $result->row($hasil)){
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$row['bulan_absensi']."</td>";
		echo "<td>".$row['jumlah_hadir']."</td>";
		echo "<td>".$row['jumlah_izin']."</td>";
		echo "<td>".$row['jumlah_alpha']."</td>";
		echo "<td>".$row['jumlah_sakit']."</td>";
		echo "<td>".$row['jam_lembur']."</td>";
		echo "<td align='center'>"; ?>
		<a title='Edit Direktorat' class='standar' onClick='showEdit("<?php echo $row['id'];?>")'><img src='../css/images/edit.png'></a>
		<a title='Hapus Direktorat' class='standar' onClick='showDelete("<?php echo $row['id'];?>")'><img src='../css/images/delete.png'></a>
		<?php
		echo "</td>";
		echo "</tr>";
		$no++;
	}
	?>
	</tbody>
	</table>
	<?php
}
include '../gaji/par_bawah01.php';
?>