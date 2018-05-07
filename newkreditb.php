<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script TYPE="text/javascript">
$(document).ready(function(){
$('#tombol').click(function(){
	var id=$("#id").val();
	var kdskep=$("#kdskep").val();
	var kdkop=$("#kdkop").val();
	$.ajax({
		type: "GET",
		url	: "newkreditl.php?p=3",
		data:'id='+id+'&kdskep='+kdskep+'&kdkop='+kdkop,
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
</script>
<?php
$kdskep=0;$kdkop=0;
echo '<table class="table" width="100%">
<tr><td colspan="16" align="center">JENIS JAMINAN :
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
<input type="hidden" name="id" ID="id" value="'.$id.'"/>
<input type="button" class="icon-add" id="tombol" value="KREDIT BARU" title="Pinjaman Baru"/>
</td></tr></table>';
?>