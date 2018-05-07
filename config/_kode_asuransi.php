<?php
$hasil=$result->query_y1("SELECT kode_asuransi,nama_asuransi FROM nabasa.tbl_asuransi WHERE status_asuransi=1 ORDER BY kode_asuransi");if($result->num($hasil)<1) echo 'Tabel Kode Premi Masih Kosong!!';
echo '<select name="kdpremi" id="kdpremi">
<option value=9>TIDAK DI ASURANSIKAN</option>';
while($data = $result->row($hasil)){
	if($row['kdpremi']==$data['kode_asuransi']){
		echo "<option value=\"".$data['kode_asuransi']."\" selected>".$data['kode_asuransi'].' '.$data['nama_asuransi']."</option>";
	}else{
		echo "<option value=\"".$data['kode_asuransi']."\">" .$data['kode_asuransi'].' '.$data['nama_asuransi'] . "</option>";
	}
}
echo '</select>';
?>