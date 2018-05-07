<?php include 'h_atas.php';?>
<script type="text/javascript" src="jQuery/jquery.paging.js"></script> 
<script type="text/javascript">
	$(document).ready(function() {
		$('#tableData').paging({limit:20});
	});
</script>
<?php
$nonas = $result->c_d($_POST['nonas']);if(strlen($nonas)<3) $result->msg_error('Kriteria Pencairan Minimal 2 Karakter');$hasil = $result->query_lap("SELECT a.id,a.kode,a.desc1,a.kode_provinsi,b.desc1 AS desc2 FROM kode_kabupaten a JOIN kode_provinsi b ON a.kode_provinsi=b.kode WHERE a.kode LIKE '%$nonas%' OR a.desc1 LIKE '%$nonas%' OR b.desc1 LIKE '%$nonas%' ORDER BY a.desc1");$no=1;echo '<div class="table"><table id="tableData"><thead><tr class="td" bgcolor="#e5e5e5"><th>No</th><th>KODE</th><th>KABUPATEN</th><th>PROVINSI</th></tr></thead><tbody>';while($row=$result->row($hasil)){	echo '<tr><td>'.$no.'</td><td>'.$row['kode'].'</td><td>'.$row['desc1'].'</td><td>'.$row['kode_provinsi'].' '.$row['desc2'].'</td></tr>';$no++;}echo '</tbody></table></div>';
?>