<select name="predikat" id="predikat" class="combobox">
<?php
$huruf = array("ISTIMEWA","SANGAT BAIK","BAIK","PENGEMBANGAN","KURANG");
$i = 0;
while($i<5){
	if ($predikat == $i) {
		echo "<option selected='selected' value='".$i."'>".$huruf[$i]."</option>";
	}else{
		echo "<option value='".$i."'>".$huruf[$i]."</option>";
	}
	$i++;$x++;
}?>
</select>