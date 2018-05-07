<?php 
$par_atas='Tabel PTKP';
include "../gaji/par_atas.php";
$hasil=$result->query_x("SELECT id,kode_ptkp,keterangan,jumlah_ptkp FROM $tabel_ptkp ORDER BY kode_ptkp",'');
?>
<script>
	url1="../gaji/tabel_ptkp01.php";
	url2="../gaji/tabel_ptkp02.php?p=1";
	url3="../gaji/tabel_ptkp02.php?p=2";
	url4="../gaji/tabel_ptkp.php";
	uhead='DATA TABEL PTKP';
</script>
</head>
<body>
<div style="float: right;">
	<button id="tambah">Tambah PTKP</button>
</div>
<div class='filter-container'>
	<input autocomplete='off' class='filter' name='kode_ptkp' placeholder='Masukan Kode PTKP' data-col='kode ptkp'/>
</div>
<div ID="divPageHasil">
<div class='container' style="padding-top: 5px">
	<table class="table-line">
		<thead>
			<tr>
				<th>NO</th>
				<th>KODE PTKP</th>
				<th>KETERANGAN</th>
				<th>JUMLAH PTKP</th>
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
			echo "<td>".$row['kode_ptkp']."</td>";
			echo "<td>".$row['keterangan']."</td>";
			echo "<td>".number_format($row['jumlah_ptkp'])."</td>";
			echo "<td align='center'>"; ?>
			<a title='Edit PTKP' class='standar' onClick='showEdit("<?php echo $row['id'];?>")'><img src='../css/images/edit.png'></a>
			<a title='Hapus PTKP' class='standar' onClick='showDelete("<?php echo $row['id'];?>")'><img src='../css/images/delete.png'></a>
			<?php
			echo "</td>";
			echo "</tr>";
			$no++;
		}
	}else{
		echo "<tr><td align='center' colspan='5'>Data PTKP Belum Ada</td></tr>";
	}?>
	</tbody>
	</table>
</div>
</div>
<?php include '../gaji/par_bawah.php';?>