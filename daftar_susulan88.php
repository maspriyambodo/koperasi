<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_formlaporan.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url1="susulan/rencana_seluruh_d.php?p=1";
	var url2="susulan/rencana_seluruh_d.php?p=2";
	var url3="susulan/rencana_seluruh_d.php?p=3";
	var url4="susulan/rencana_seluruh_r.php?p=1";
	var url5="susulan/rencana_seluruh_r.php?p=2";
	var url6="susulan/rencana_seluruh_r.php?p=3";
	var url9="susulan/rencana_seluruh_dd.php?p=1";
	var url10="susulan/rencana_seluruh_dd.php?p=2";
	var url11="susulan/rencana_seluruh_dd.php?p=3";
	var url12="susulan/rencana_seluruh_rr.php?p=1";
	var url13="susulan/rencana_seluruh_rr.php?p=2";
	var url14="susulan/rencana_seluruh_rr.php?p=3";
</script>
<?php
$t=date_sql($tanggal);
$tgl=date('d',strtotime($t));
$bln=date('m',strtotime($t));
$thn=date('Y',strtotime($t));
$bln++;
if($bln>12){$bln=1; $thn++;}
$kwitansi=TRUE;
?>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	BULAN :
	<select name="bln" id="bln">
	<?php $huruf = array("01","02","03","04","05","06","07","08","09","10","11","12");$i = 0;$x=1;while($i<12){if ($bln == $x){echo "<option selected='selected' value='".$huruf[$i]."'>".nmbulan($huruf[$i])."</option>";}else{echo "<option value='".$huruf[$i]."'>".nmbulan($huruf[$i])."</option>";}$i++;$x++;}?>
	</select>
	<select name="thn" id="thn" style="width: 70px" >
		<?php $i = 0;$x=$thn;while($i<11){if ($x == $thn){echo "<option  selected='selected' value='".$x."' selected>".$x."</option>";}else{echo "<option value='".$x."'>".$x."</option>";}$i++;$x--;}?>
	</select>
	<select name="kkbayar" id="kkbayar" class="combobox">
		<?php $hasil=$result->res("SELECT kd,nmkb FROM kkb WHERE branch='$kcabang' ORDER BY nmkb");while ($data = $result->row($hasil)){echo "<option value=\"".$data['kd']."\">".$data['nmkb']."</option>";}echo "<option selected='selected' value=9>KESELURUHAN</option>";?>
	</select>
	<button id="layar">Daftar Layar I</button>
	<button id="rekap">Rekap Layar I</button>
	<button id="rincian">Daftar Layar II</button>
	<button id="rekapp">Rekap Layar II</button>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageLaporan"></div>