<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script TYPE="text/javascript">
$(document).ready(function(){
	$('#tombol').click(function(){
		var nonas= $("#nonas").val();
		var kdskep= $("#kdskep").val();
		var kdkop= $("#kdkop").val();
		$.ajax({
			type: "GET",
			url	: "newkreditl.php?p=2",
			data:'nonas='+nonas+'&kdskep='+kdskep+'&kdkop='+kdkop,
			beforeSend: function(){
				$('#loading').show();
			},
			success: function(data){
				$('#divPageHasil').html(data);
				$('#loading').hide();
			}
		});
	});
});
function showEdit(id) {
	var dataString='id='+id;
	$.ajax({
		type: "GET",
		url : 'newkreditl.php?p=1',
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success: function(data){
			$('#divPageHasil').html(data);
			$('#loading').hide();
		}
	});
}
function showEditt(id) {
	var dataString='id='+id;
	$.ajax({
		type: "GET",
		url : 'newkreditl.php?p=4',
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success: function(data){
			$('#divPageHasil').html(data);
			$('#loading').hide();
		}
	});
}
</script>
<?php $nonas=$result->c_d($_POST['nonas']);$branch=$result->c_d($_POST['branch']);$result->data_nasabah($branch,$nonas);$hasil=$result->query_x1("SELECT a.id,a.branch,a.nonas,a.sufix,a.norek,a.produk,a.noktp,a.tgtran,a.tglahir,a.jangka,a.suku,a.kdkop,a.nomi,a.saldoa,a.kolek,a.produk,b.nama,b.status_cif FROM $tabel_kredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.nonas='$nonas' AND a.branch='$branch' ORDER BY a.sufix,a.saldoa");echo '<table class="table" width="100%">
<thead><tr class="td" bgcolor="#e5e5e5"><th>NO</th><th>NO NASABAH</th><th>NOREK</th><th>NAMA</th><th>PRODUK</th><th>NO KTP</th><th>TG LAHIR</th><th>TG PINJAM</th><th>NOMINAL</th><th>SALDO</th><th>JW / SB</th><th>AKSI</th></tr></thead><tbody>';
if($result->num($hasil)>0){
	$no=1;
	while($row = $result->row($hasil)){ 
		if($row['saldoa']<=0){
			$clsname="odd";
		}else{
			$clsname="even";
		}
		echo '<tr class='.$clsname.'>
		<td><?php echo $no; ?></td>
		<td>'.$row['branch'].'-'.$row['nonas'].'-'.$row['sufix'].'</td>
		<td>'.$row['norek'].'</td>
		<td>'.$row['nama'].'</td>
		<td>'.$row['produk'].'</td>
		<td>'.$row['noktp'].'</td>
		<td>'.date_sql($row['tglahir']).'</td>
		<td>'.$row['tgtran'].'</td>
		<td>'.number_format($row['nomi']).'</td>
		<td>'.number_format($row['saldoa']).'</td>
		<td>'.$row['jangka']. ' / '.$row['suku'].'</td>
		<td align="center">
		<a class="icon-redo" onClick="showEdit('.$row['id'].')" title="Pembaharuan Kredit">&nbsp;</a>
		<a class="icon-add" onClick="showEditt('.$row['id'].')" title="Tambahan Pinjaman Kredit">&nbsp;</a>
		</td>
		</tr>';
		$no++;
	}
}else{ 
	$kdskep=0;$kdkop=0;
	echo '<tr><td colspan="16" align="center">JENIS JAMINAN :
	<select name="kdskep" id="kdskep" class="combobox">';
	$huruf = array("SK PENSIUN","SK PEGAWAI","BPKP KENDARAAN","SERTIFIKAT TANAH","IJASAH","AKTE NIKAH","TAMPA AGUNAN");$i = 0;
	while($i<7) {
		if($kdskep==$i){
			echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
		}else{
			echo "<option value='".$i."'>".$huruf[$i]."</option>";
		}
		$i++;
	}
	echo '</select>SKIM TAGIHAN : 
	<select name="kdkop" id="kdkop" class="combobox">';
	$huruf = array("BULANAN","HARIAN","MINGGUAN");$i=0;$x=1;
	while ($i<3) {
		if ($kdkop==$x){
			echo "<option value='".$x."' selected>".$huruf[$i]."</option>";
		}else{
			echo "<option value='".$x."'>".$huruf[$i]."</option>";
		}
		$i++;$x++;
	}
	echo '</select>
	<input type="hidden" name="nonas" ID="nonas" value="'.$nonas.'"/>
	<input type="button" class="icon-add" id="tombol" value="KREDIT BARU" title="Pinjaman Baru"/>
	</td></tr>';
}
echo '</tbody>
</table>';
?>