<?php include "../gaji/par_atas01.php";?>
<script type="text/javascript" src="../jQuery/formatinput.js"></script>
<script type="text/javascript" src="../jQuery/combobox.js"></script>
<script type="text/javascript" src="../gaji/java/new_karyawan.js"></script>
<script>
	var url ="../gaji/new_karyawan.php";
	var urls ="../gaji/new_karyawans.php?p=1";
</script>
<?php
echo "<div class='ui-widget'>";
$nik=$result->clean_data($_POST['nonas']);
$hasil=$result->query_x("SELECT nik FROM $tabel_master WHERE nik='$nik' LIMIT 1",'');
if($result->num($hasil)>0){
	$result->msg_error('Nik Karyawan Sudah Terdaftar!');
}
$id='';
include '../gaji/new_karyawanf.php';
echo "</div>";
include '../gaji/par_bawah01.php';
?>