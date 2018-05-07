<?php include 'h_atas.php';?>
<script type="text/javascript" src="jQuery/jquery.paging.js"></script> 
<script type="text/javascript">
	$(document).ready(function() {
		$('#tableData').paging({limit:20});
	});
</script>
<?php
$nonas=$result->c_d($_POST['nonas']);if(strlen($nonas)<3) $result->msg_error('Kriteria Pencairan Minimal 2 Karakter');$hasil=$result->query_lap("SELECT id,kode,desc1,desc2,desc3,desc4 FROM kode_pos WHERE kode LIKE '%$nonas%' OR desc1 LIKE '%$nonas' OR desc2 LIKE '%$nonas' OR desc3 LIKE '%$nonas' OR desc4 LIKE '%$nonas' ORDER BY desc1");$no=1;echo '<div class="table"><table id="tableData" width="100%"><thead><tr class="td" bgcolor="#e5e5e5"><th>No</th><th>KODE POS</th><th>KELURAHAN</th><th>KECAMATAN</th><th>KABUPATEN</th><th>PROPINSI</th></tr></thead><tbody>';$no=1;while($row=$result->row($hasil)){echo '<tr><td>'.$no.'</td><td>'.$row['kode'].'</td><td>'.$row['desc1'].'</td><td>'.$row['desc2'].'</td><td>'.$row['desc3'].'</td><td>'.$row['desc4'].'</td></tr>';$no++;}echo '</tbody></table></div>';
?>