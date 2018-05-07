<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_laporan.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url1="tagihan/rtagihanl.php";
	var url2="tagihan/rtagihanr.php";
	var url3="susulan/rsusulanl.php";
	var url4="susulan/rsusulanr.php";
</script>
<?php 
$t=date_sql($tanggal);
$tgl=date('d',strtotime($t));
$bln=date('m',strtotime($t));
$thn=date('Y',strtotime($t));
$bln++;
if($bln>12){$bln=1; $thn++;}$kwitansi=TRUE;
?>
<div class="ui-widget-content">
<table align="center">
<input type="hidden" id="cetakpdf" name="cetakpdf"/>
<input type="hidden" id="cetakxls" name="cetakxls"/>
<tr><td align="center">
	<select name="bln" id="bln">
	<?php $huruf = array("01","02","03","04","05","06","07","08","09","10","11","12");$i = 0;$x=1;while($i<12){if ($bln == $x){echo "<option selected='selected' value='".$huruf[$i]."'>".nmbulan($huruf[$i])."</option>";}else{echo "<option value='".$huruf[$i]."'>".nmbulan($huruf[$i])."</option>";}$i++;$x++;}?>
	</select>
	<select name="thn" id="thn" style="width: 70px" >
		<?php $i = 0;$x=$thn;while($i<11){if ($x == $thn){echo "<option  selected='selected' value='".$x."' selected>".$x."</option>";}else{echo "<option value='".$x."'>".$x."</option>";}$i++;$x--;}?>
	</select>
	<select name="kkbayar" id="kkbayar" class="combobox">
		<?php $hasil=$result->res("SELECT kd,nmkb FROM kkb WHERE branch='$kcabang' ORDER BY nmkb");while ($data = $result->row($hasil)){echo "<option value=\"".$data['kd']."\">".$data['nmkb']."</option>";}echo "<option selected='selected' value=9>KESELURUHAN</option>";?>
	</select>
</td>
</tr>
<tr><td align="center">
	<div id="toolbar" align="center">
		<button id="neraca1">Daftar Rencana Tagihan</button>
		<button id="neraca2">Rekap Rencana Tagihan</button>
		<button id="neraca3">Daftar Rencana Tagihan Susulan</button>
		<button id="neraca4">Rekap Rencana Tagihan Susulan</button>
	</div>
</td></tr>
</table>
</div>
<div><button id="btnpdf">PDF</button><button id="btnxls">XLS</button></div>
<div id="divPageLaporan"></div>