<?php include "../gaji/par_atas01.php";?>
<script type="text/javascript" src="../jQuery/formatinput.js"></script>
<script type="text/javascript" src="../jQuery/combobox.js"></script>
<script type="text/javascript" src="../gaji/java/new_karyawan.js"></script>
<script>
	var url ="../gaji/new_karyawanu.php";
	var urls ="../gaji/new_karyawans.php?p=2";
</script>
<?php
echo "<div class='ui-widget'>";
$nik=$result->clean_data($_POST['nonas']);
$hasil=$result->query_x("SELECT id,branch,nik,nama_karyawan,no_ktp,alamat,kelurahan,kecamatan,kabupaten,propinsi,tgl_lahir,tempat_lahir,jenis_kelamin,no_telepon_1,no_telepon_2,kode_ptkp,kode_grade,grade,kode_wilayah,kode_organisasi,kode_lokasi,kode_jabatan,no_npwp,no_jamsostek,no_rekening,no_rekening_lain,no_kredit,gaji_pokok FROM $tabel_master WHERE nik='$nik' LIMIT 1",'');
if($result->num($hasil)<1){
	$result->msg_error('Nik Karyawan Tidak Terdaftar!');
}$row=$result->row($hasil);
include '../gaji/new_karyawanuf.php';
echo "</div>";
include '../gaji/par_bawah01.php';
?>