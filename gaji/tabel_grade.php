<?php 
$par_atas='Tabel Grade';
include "../gaji/par_atas.php";
$hasil=$result->query_x("SELECT id,kode_grade,grade,keterangan,gaji_pokok,tunjangan_tkd,tunjangan_jabatan,tunjangan_perumahan,tunjangan_telepon,tunjangan_kesehatan,tunjangan_lain,uang_makan,uang_hadir,uang_transport FROM $tabel_grade ORDER BY kode_grade",'');
?>
<script>
	url1="../gaji/tabel_grade01.php";
	url2="../gaji/tabel_grade02.php?p=1";
	url3="../gaji/tabel_grade02.php?p=2";
	url4="../gaji/tabel_grade.php";
	uhead='DATA TABEL GRADE';
</script>
</head>
<body>
<div style="float: right;">
	<button id="tambah">Tambah Grade</button>
</div>
<div class='filter-container'>
	<input autocomplete='off' class='filter' name='keterangan' placeholder='Masukan Nama Grade' data-col='keterangan'/>
</div>
<div ID="divPageHasil">
<div class='container' style="padding-top: 5px">
	<table class="table-line">
		<thead>
			<tr>
				<th align="center">MAINTANCE</th>
				<th>NO</th>
				<th>KODE GRADE</th>
				<th>KETERANGAN</th>
				<th>GRADE</th>
				<th>GAJI POKOK</th>
				<th>TUNJ. TKD</th>
				<th>TUNJ. JABATAN</th>
				<th>TUNJ. PERUMAHAN</th>
				<th>TUNJ. TELEPON</th>
				<th>TUNJ. KESEHATAN</th>
				<th>TUNJ. LAIN</th>
				<th>UANG MAKAN</th>
				<th>UANG HADIR</th>
				<th>UANG TRANS.</th>
			</tr>
		</thead>
	<tbody>
	<?php
	$no=1;
	if($result->num($hasil)!=0){
		while($row = $result->row($hasil)){
			echo "<tr>";
			echo "<td align='center'>"; ?>
			<a title='Edit Grade' class='standar' onClick='showEdit("<?php echo $row['id'];?>")'><img src='../css/images/edit.png'></a>
			<a title='Hapus Grade' class='standar' onClick='showDelete("<?php echo $row['id'];?>")'><img src='../css/images/delete.png'></a>
			<?php
			echo "</td>";
			echo "<td>".$no."</td>";
			echo "<td>".$row['kode_grade']."</td>";
			echo "<td>".$row['keterangan']."</td>";
			echo "<td>".$row['grade']."</td>";
			echo "<td>".number_format($row['gaji_pokok'])."</td>";
			echo "<td>".number_format($row['tunjangan_tkd'])."</td>";
			echo "<td>".number_format($row['tunjangan_jabatan'])."</td>";
			echo "<td>".number_format($row['tunjangan_perumahan'])."</td>";
			echo "<td>".number_format($row['tunjangan_telepon'])."</td>";
			echo "<td>".number_format($row['tunjangan_kesehatan'])."</td>";
			echo "<td>".number_format($row['tunjangan_lain'])."</td>";
			echo "<td>".number_format($row['uang_makan'])."</td>";
			echo "<td>".number_format($row['uang_hadir'])."</td>";
			echo "<td>".number_format($row['uang_transport'])."</td>";
			echo "</tr>";
			$no++;
		}
	}else{
		echo "<tr><td align='center' colspan='15'>Data Grade Belum Ada</td></tr>";
	}?>
	</tbody>
	</table>
</div>
</div>
<?php include '../gaji/par_bawah.php';?>

