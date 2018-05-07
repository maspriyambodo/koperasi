<?php include "../gaji/par_atas01.php";
$nik=$result->clean_data($_GET['nik']);
$hasil=$result->query_x("SELECT id,tgl_masuk,tgl_keluar,kode_jabatan,predikat,keterangan,kode_lokasi,kode_aktif FROM $tabel_riwayat_ja WHERE nik='$nik' ORDER BY no_index",'');
if($result->num($hasil)>0){ ?>
	<table class="table-line">
		<thead>
			<tr>
				<th>NO</th>
				<th>AREA</th>
				<th>JABATAN</th>
				<th>PREDIKAT</th>
				<th>TANGGAL MASUK</th>
				<th>TANGGAL KELUAR</th>
				<th>KETERANGAN</th>
				<th>OTORISASI</th>
				<th align="center">MAINTANCE</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no=1;
		while($row = $result->row($hasil)){
			echo "<tr>";
			echo "<td>".$no."</td>";
			echo "<td>";$kode_lokasi=$row['kode_lokasi'];include '../gaji/par_areax.php'; 
			echo $nama_lokasix;
			echo "</td>";
			echo "<td>";$kode_jabatan=$row['kode_jabatan'];include '../gaji/par_jabatanx.php'; 
			echo $nama_jabatanx;
			echo "</td>";
			echo "<td>";$predikat=$row['predikat'];include '../gaji/form_predikatx.php';
			echo $predikatx;
			echo "</td>";
			echo "<td>".$row['tgl_masuk']."</td>";
			echo "<td>".$row['tgl_keluar']."</td>";
			echo "<td>".$row['keterangan']."</td>";
			echo "<td>";$kode_aktif=$row['kode_aktif'];include '../gaji/form_otorisasi.php';
			echo $kode_aktifx;
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