<div class="ui-widget-content">
<table align="center">
<input type="hidden" id="cetakpdf" name="cetakpdf"/>
<input type="hidden" id="cetakxls" name="cetakxls"/>
<tr><td>
	<select name="bln" id="bln">
	<?php $huruf = array("01","02","03","04","05","06","07","08","09","10","11","12");$i = 0;$x=1;while($i<12){if ($bln == $x){echo "<option selected='selected' value='".$huruf[$i]."'>".nmbulan($huruf[$i])."</option>";}else{echo "<option value='".$huruf[$i]."'>".nmbulan($huruf[$i])."</option>";}$i++;$x++;}?>
	</select>
	<select name="thn" id="thn" style="width: 70px" >
		<?php $i = 0;$x=$thn;while($i<11){if ($x == $thn){echo "<option  selected='selected' value='".$x."' selected>".$x."</option>";}else{echo "<option value='".$x."'>".$x."</option>";}$i++;$x--;}?>
	</select>
	<select name="kkbayar" id="kkbayar" class="combobox">
		<?php $hasil=$result->res("SELECT kd,nmkb FROM kkb WHERE branch='$kcabang' ORDER BY nmkb");while ($data = $result->row($hasil)){echo "<option value=\"".$data['kd']."\">".$data['nmkb']."</option>";}echo "<option selected='selected' value=9>KESELURUHAN</option>";?>
	</select>
	<button id="layar">Daftar Layar</button>
	<button id="rekap">Rekap Layar</button>
</td></tr>
</table>
</div><div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
</div>
<div id="divPageLaporan"></div>