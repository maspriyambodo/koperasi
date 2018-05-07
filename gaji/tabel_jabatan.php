<?php $par_atas='Tabel Jabatan';include "../gaji/par_atas.php";
$hasil=$result->query_x("SELECT id,kode_jabatan,nama_jabatan FROM $tabel_jabatan ORDER BY kode_jabatan",'');?>
<script>
	url1="../gaji/tabel_jabatan01.php";
	url2="../gaji/tabel_jabatan02.php?p=1";
	url3="../gaji/tabel_jabatan02.php?p=2";
	url4="../gaji/tabel_jabatan.php";
	uhead='DATA TABEL JABATAN';
</script>
</head>
<body>
<div style="float: right;">
	<button id="tambah">Tambah Jabatan</button>
</div>
<div class='filter-container'>
	<input autocomplete='off' class='filter' name='kode_jabatan' placeholder='Masukan Kode Jabatan' data-col='kode jabatan'/>
</div>
<div ID="divPageHasil">
<div class='container' style="padding-top: 5px">
	<table class="table-line">
		<thead>
			<tr>
				<th>NO</th>
				<th>KODE JABATAN</th>
				<th>NAMA JABATAN</th>
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
			echo "<td>".$row['kode_jabatan']."</td>";
			echo "<td>".$row['nama_jabatan']."</td>";
			echo "<td align='center'>"; ?>
			<a title='Edit Jabatan' class='standar' onClick='showEdit("<?php echo $row['id'];?>")'><img src='../css/images/edit.png'></a>
			<a title='Hapus Jabatan' class='standar' onClick='showDelete("<?php echo $row['id'];?>")'><img src='../css/images/delete.png'></a>
			<?php
			echo "</td>";
			echo "</tr>";
			$no++;
		}
	}else{
		echo "<tr><td align='center' colspan='5'>Data Jabatan Belum Ada</td></tr>";
	}?>
	</tbody>
	</table>
</div>
</div>
<?php include '../gaji/par_bawah.php';?>
