<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.tablesorter.widgets.js"></script>
<!--<script type="text/javascript" src="parameter/tabel_sort.js"></script>-->
<script type="text/javascript">
	$(document).ready(function() {
		$("#masuk").submit(function() {
			var r = confirm("Anda Yakin Data Di Simpan..?");
			if (r == false) {
				return false;
			}
			$.ajax({
				type: "POST",
				url : "programaplikasiY.php",
				data: $(this).serialize(),
				beforeSend: function () {
					$("#loading").show();
				},
				success: function(data){
					if(data=="Sukses"){
						showEditt();
					}
					$("#loading").hide();
					alert(data);
				}
			});
			return false;
		});
	})
  	$(function(){
	  	$("table").tablesorter({
			theme: 'blue',
			widthFixed: true,
			widgets: ['zebra', 'filter'],
			headers: {
				'.pemimpin,.manager,.supervisor,.operator,.global1,.kredit,.tabungan,.teller,.deposito,.admin,.global2' : {sorter: false }
			}
		})
  	});
</script>
<?php
$no=1;
$kode=$result->c_d($_GET['kode']);
$hasil=$result->query_lap("SELECT * FROM tabel_menu WHERE parent_id='$kode' ORDER BY parent_id,menu_order");
echo '
<input name="kode" type="hidden" id="kode" value="'.$kode.'"/>
<div class="ui-widget-content">
<form id="masuk" name="masuk" method="POST" action="">
	<table class="tablesorter" style="white-space: nowrap;">
	<thead>
		<tr>
			<th>Kode</th>
			<th>Nama</th>
			<th>Urut</th>
			<th class="pemimpin">Pemimpin</th>
			<th class="manager">Manager</th>
			<th class="supervisor">Supervisor</th>
			<th class="operator">Operator</th>
			<th class="global1">Admin</th>
			<th class="kredit">Kredit</th>
			<th class="tabungan">Tabungan</th>
			<th class="teller">Teller</th>
			<th class="deposito">Deposito</th>
			<th class="admin">Admin</th>
			<th class="global2">Pejabat</th>
			<th class="aksi">Status</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>Kode</th>
			<th>Nama</th>
			<th>Urut</th>
			<th>Pemimpin</th>
			<th>Manager</th>
			<th>Supervisor</th>
			<th>Operator</th>
			<th>Admin</th>
			<th>Kredit</th>
			<th>Tabungan</th>
			<th>Teller</th>
			<th>Deposito</th>
			<th>Admin</th>
			<th>Pejabat</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
	<tbody>';
		$vbayar='';$xbayar='';$clsname="even";
		while($row = $result->row($hasil)){
			$xbayar=$row['parent_id'];
			$kode0='';$kode1='';$kode2='';$kode3='';$kode4='';$kodem0='';
			$kodem1='';$kodem2='';$kodem3='';$kodem4='';$kodem5='';
			if($row["kode0"]==1)$kode0='checked';
			if($row["kode1"]==1)$kode1='checked';
			if($row["kode2"]==1)$kode2='checked';
			if($row["kode3"]==1)$kode3='checked';
			if($row["kode4"]==1)$kode4='checked';
			if($row["kodem0"]==1)$kodem0='checked';
			if($row["kodem1"]==1)$kodem1='checked';
			if($row["kodem2"]==1)$kodem2='checked';
			if($row["kodem3"]==1)$kodem3='checked';
			if($row["kodem4"]==1)$kodem4='checked';
			if($row["kodem5"]==1)$kodem5='checked';
			echo '
			<input name="id[]" type="hidden" id="id[]" value="'.$row["id"].'"/>
			<input name="title[]" type="hidden" id="title[]" value="'.$row["title"].'"/>
			<tr class="'.$clsname.'">
			<td>'.$row['parent_id'].'</td>
			<td>'.$row['title'].'</td>
			<td>'.$row['menu_order'].'</td>
			<td align="center">
				<select name="kode0[]" id="kode0[]">';
				$huruf = array("N","Y");$i=0;
				while($i < 2){
					if($row["kode0"] == $i){
						echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
					}else{
						echo "<option value='".$i."'>".$huruf[$i]."</option>";
					}
					$i++;
				} echo '
				</select>
			</td>
			<td align="center">
				<select name="kode1[]" id="kode1[]">';
				$huruf = array("N","Y");$i=0;
				while($i < 2){
					if($row["kode1"] == $i){
						echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
					}else{
						echo "<option value='".$i."'>".$huruf[$i]."</option>";
					}
					$i++;
				} echo '
				</select>
			</td>
			<td align="center">
				<select name="kode2[]" id="kode2[]">';
				$huruf = array("N","Y");$i=0;
				while($i < 2){
					if($row["kode2"] == $i){
						echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
					}else{
						echo "<option value='".$i."'>".$huruf[$i]."</option>";
					}
					$i++;
				} echo '
				</select>
			</td>
			<td align="center">
				<select name="kode3[]" id="kode3[]">';
				$huruf = array("N","Y");$i=0;
				while($i < 2){
					if($row["kode3"] == $i){
						echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
					}else{
						echo "<option value='".$i."'>".$huruf[$i]."</option>";
					}
					$i++;
				} echo '
				</select>
			</td>
			<td align="center">
				<select name="kode4[]" id="kode4[]">';
				$huruf = array("N","Y");$i=0;
				while($i < 2){
					if($row["kode4"] == $i){
						echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
					}else{
						echo "<option value='".$i."'>".$huruf[$i]."</option>";
					}
					$i++;
				} echo '
				</select>
			</td>
			<td align="center">
				<select name="kodem0[]" id="kodem0[]">';
				$huruf = array("N","Y");$i=0;
				while($i < 2){
					if($row["kodem0"] == $i){
						echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
					}else{
						echo "<option value='".$i."'>".$huruf[$i]."</option>";
					}
					$i++;
				} echo '
				</select>
			</td>
			<td align="center">
				<select name="kodem1[]" id="kodem1[]">';
				$huruf = array("N","Y");$i=0;
				while($i < 2){
					if($row["kodem1"] == $i){
						echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
					}else{
						echo "<option value='".$i."'>".$huruf[$i]."</option>";
					}
					$i++;
				} echo '
				</select>
			</td>
			<td align="center">
				<select name="kodem2[]" id="kodem2[]">';
				$huruf = array("N","Y");$i=0;
				while($i < 2){
					if($row["kodem2"] == $i){
						echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
					}else{
						echo "<option value='".$i."'>".$huruf[$i]."</option>";
					}
					$i++;
				} echo '
				</select>
			</td>
			<td align="center">
				<select name="kodem3[]" id="kodem3[]">';
				$huruf = array("N","Y");$i=0;
				while($i < 2){
					if($row["kodem3"] == $i){
						echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
					}else{
						echo "<option value='".$i."'>".$huruf[$i]."</option>";
					}
					$i++;
				} echo '
				</select>
			</td>
			<td align="center">
				<select name="kodem4[]" id="kodem4[]">';
				$huruf = array("N","Y");$i=0;
				while($i < 2){
					if($row["kodem4"] == $i){
						echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
					}else{
						echo "<option value='".$i."'>".$huruf[$i]."</option>";
					}
					$i++;
				} echo '
				</select>
			</td>
			<td align="center">
				<select name="kodem5[]" id="kodem5[]">';
				$huruf = array("N","Y");$i=0;
				while($i < 2){
					if($row["kodem5"] == $i){
						echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
					}else{
						echo "<option value='".$i."'>".$huruf[$i]."</option>";
					}
					$i++;
				} echo '
				</select>
			</td>
			<td align="center">';
				if($row["aktif"]==0){ echo '
				<a title="Enable" class="icon-disable" onClick="showEnable('.$row["id"].')">&nbsp</a>';
				}else{ echo '
				<a title="Disable" class="icon-enable" onClick="showDisable('.$row["id"].')">&nbsp</a>';
				} echo '
			</td>';
			if($no==1){
				$clsname="even";
				$vbayar=$row['parent_id'];
			}else{
				if($vbayar==$xbayar){$clsname="even";}else{$clsname="odd";}
				$vbayar=$row['parent_id'];
			}
			$no++;
		}
		echo '
	</tbody>
	</table>
	<input type="submit" value="Update" id="submit" class="icon-save"/>
</form>
</div>';
?>