<?php 
$par_atas='Tabel Area';
include "../gaji/par_atas.php";
$hasil=$result->query_x("SELECT id,kode_lokasi,nama_lokasi,kode_organisasi,kode_wilayah FROM $tabel_lokasi ORDER BY kode_lokasi",'');
?>
<script>
	url1="../gaji/tabel_lokasi01.php";
	url2="../gaji/tabel_lokasi02.php?p=1";
	url3="../gaji/tabel_lokasi02.php?p=2";
	url4="../gaji/tabel_lokasi.php";
	uhead='DATA TABEL AREA';
</script>
</head>
<body>
<div style="float: right;">
	<button id="tambah">Tambah Area</button>
</div>
<div class='filter-container'>
	<input autocomplete='off' class='filter' name='kode_lokasi' placeholder='Masukan Kode Area' data-col='kode area'/>
</div>
<div ID="divPageHasil">
<div class='container' style="padding-top: 5px">
	<table class="table-line">
		<thead>
			<tr>
				<th>NO</th>
				<th>KODE AREA</th>
				<th>NAMA AREA</th>
				<th>KODE WILAYAH</th>
				<th>KODE DIREKTORAT</th>
				<th align="center">MAINTANCE</th>
			</tr>
		</thead>
	<tbody>
	<?php
	$no=1;
	if($result->num($hasil)!=0){
		while($row = $result->row($hasil)){
			echo "<tr>";
			echo "<td>".$no."</td>";
			echo "<td>".$row['kode_lokasi']."</td>";
			echo "<td>".$row['nama_lokasi']."</td>";
			echo "<td>".$row['kode_wilayah']."</td>";
			echo "<td>".$row['kode_organisasi']."</td>";
			echo "<td align='center'>"; ?>
			<a title='Edit Area' class='standar' onClick='showEdit("<?php echo $row['id'];?>")'><img src='../css/images/edit.png'></a>
			<a title='Hapus Area' class='standar' onClick='showDelete("<?php echo $row['id'];?>")'><img src='../css/images/delete.png'></a>
			<?php
			echo "</td>";
			echo "</tr>";
			$no++;
		}
	}else{
		echo "<tr><td align='center' colspan='6'>Data Area Belum Ada</td></tr>";
	}?>
	</tbody>
	</table>
</div>
</div>
<?php include '../gaji/par_bawah.php';?>
