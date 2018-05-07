<?php
include "h_tetap.php";
$parent_id=$result->c_d($_GET['kode']);
echo '
<div class="ui-widget-content" align="center">
<form name="formm" id="formm" method="post" action="">
<table width="100%" class="table">
	<input type="hidden" name="parent_id" id="parent_id" value="'.$parent_id.'"/>
	<tr>
		<td colspan="5" align="right">Nama Program</td>
		<td colspan="6">: <input type="text" name="url" id="url" value="" maxlength="35" size="40"/></td>
	</tr>
	<tr>
		<td colspan="5" align="right">Description</td>
		<td colspan="6">: <input type="text" name="title" id="title" value="" size="40" maxlength="35"/></td>
	</tr>
	<tr>
		<td colspan="5" align="right">Urutan Program</td>
		<td colspan="6">: <input type="text" name="menu_order" id="menu_order" value="" size="6" maxlength="2" onkeypress="return hanyaAngka(event, false)"/></td>
	</tr>
	<tr>
		<td colspan="5" align="center" class="even">HAK AKSES</td>
		<td colspan="6" align="center" class="odd">HAK MENU</td>
	</tr>	
	<tr>
		<td class="even">Pemimpin</td>
		<td class="even">Manager</td>
		<td class="even">Supervisor</td>
		<td class="even">Operator</td>
		<td class="even">Admin</td>
		<td class="odd">Kredit</td>
		<td class="odd">Tabunga</td>
		<td class="odd">Teller</td>
		<td class="odd">Deposito</td>
		<td class="odd">Admin</td>
		<td class="odd">Pejabat</td>
	</tr>
	<tr>';
		$huruf = array("N","Y");$i=0;$k=0; echo '
		<td align="center" class="even">
			<select name="kode0" id="kode0">';
			$i=0;
			while($i < 2){
				if($k == $i){
					echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
				}else{
					echo "<option value='".$i."'>".$huruf[$i]."</option>";
				}
				$i++;
			} echo '
			</select>
		</td>
		<td align="center" class="even">
			<select name="kode1" id="kode1">';
			$i=0;
			while($i < 2){
				if($k == $i){
					echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
				}else{
					echo "<option value='".$i."'>".$huruf[$i]."</option>";
				}
				$i++;
			} echo '
			</select>
		</td>
		<td align="center" class="even">
			<select name="kode2" id="kode2">';
			$i=0;
			while($i < 2){
				if($k == $i){
					echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
				}else{
					echo "<option value='".$i."'>".$huruf[$i]."</option>";
				}
				$i++;
			} echo '
			</select>
		</td>
		<td align="center" class="even">
			<select name="kode3" id="kode3">';
			$i=0;
			while($i < 2){
				if($k == $i){
					echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
				}else{
					echo "<option value='".$i."'>".$huruf[$i]."</option>";
				}
				$i++;
			} echo '
			</select>
		</td>
		<td align="center" class="even">
			<select name="kode4" id="kode4">';
			$i=0;
			while($i < 2){
				if($k == $i){
					echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
				}else{
					echo "<option value='".$i."'>".$huruf[$i]."</option>";
				}
				$i++;
			} echo '
			</select>
		</td>
		<td align="center" class="odd">
			<select name="kodem0" id="kodem0">';
			$i=0;
			while($i < 2){
				if($k == $i){
					echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
				}else{
					echo "<option value='".$i."'>".$huruf[$i]."</option>";
				}
				$i++;
			} echo '
			</select>
		</td>
		<td align="center" class="odd">
			<select name="kodem1" id="kodem1">';
			$i=0;
			while($i < 2){
				if($k == $i){
					echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
				}else{
					echo "<option value='".$i."'>".$huruf[$i]."</option>";
				}
				$i++;
			} echo '
			</select>
		</td>
		<td align="center" class="odd">
			<select name="kodem2" id="kodem2">';
			$i=0;
			while($i < 2){
				if($k == $i){
					echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
				}else{
					echo "<option value='".$i."'>".$huruf[$i]."</option>";
				}
				$i++;
			} echo '
			</select>
		</td>
		<td align="center" class="odd">
			<select name="kodem3" id="kodem3">';
			$i=0;
			while($i < 2){
				if($k == $i){
					echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
				}else{
					echo "<option value='".$i."'>".$huruf[$i]."</option>";
				}
				$i++;
			} echo '
			</select>
		</td>
		<td align="center" class="odd">
			<select name="kodem4" id="kodem4">';
			$i=0;
			while($i < 2){
				if($k == $i){
					echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
				}else{
					echo "<option value='".$i."'>".$huruf[$i]."</option>";
				}
				$i++;
			} echo '
			</select>
		</td>
		<td align="center" class="odd">
			<select name="kodem5" id="kodem5">';
			$i=0;
			while($i < 2){
				if($k == $i){
					echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
				}else{
					echo "<option value='".$i."'>".$huruf[$i]."</option>";
				}
				$i++;
			} echo '
			</select>
		</td>
	</tr>
</table>
</form>
</div>';
?>
<script type="text/javascript" src="java/hanya_angka.js"></script>