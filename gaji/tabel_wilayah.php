<?php 
$par_atas='Tabel Wilayah';
include "../gaji/par_atas.php";
$hasil=$result->query_x("SELECT id,kode_organisasi,kode_wilayah,nama_wilayah FROM $tabel_wilayah ORDER BY kode_wilayah",'');
?>
<script>
	url1="../gaji/tabel_wilayah01.php";
	url2="../gaji/tabel_wilayah02.php?p=1";
	url3="../gaji/tabel_wilayah02.php?p=2";
	url4="../gaji/tabel_wilayah.php";
	uhead='DATA TABEL WILAYAH';
</script>
</head>
<body>
<div style="float: right;">
	<button id="tambah">Tambah Wilayah</button>
</div>
<div class='filter-container'>
	<input autocomplete='off' class='filter' name='kode_wilayah' placeholder='Masukan Kode Wilayah' data-col='kode wilayah'/>
</div>
<div ID="divPageHasil">
<div class='container' style="padding-top: 5px">
	<table class="table-line">
		<thead>
			<tr>
				<th>NO</th>
				<th>KODE WILAYAH</th>
				<th>NAMA WILAYAH</th>
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
			echo "<td>".$row['kode_wilayah']."</td>";
			echo "<td>".$row['nama_wilayah']."</td>";
			echo "<td>".$row['kode_organisasi']."</td>";
			echo "<td align='center'>"; ?>
			<a title='Edit Wilayah' class='standar' onClick='showEdit("<?php echo $row['id'];?>")'><img src='../css/images/edit.png'></a>
			<a title='Hapus Wilayah' class='standar' onClick='showDelete("<?php echo $row['id'];?>")'><img src='../css/images/delete.png'></a>
			<?php
			echo "</td>";
			echo "</tr>";
			$no++;
		}
	}else{
		echo "<tr><td align='center' colspan='5'>Data Wilayah Belum Ada</td></tr>";
	}?>
	</tbody>
	</table>
</div>
</div>
<?php include '../gaji/par_bawah.php';?>
