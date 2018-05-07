<?php include 'h_tetap.php';?>
<script type="text/javascript" src="js/_laporan_75.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url1="tagihan/rtagihanl.php";
	var url2="tagihan/rtagihanr.php";
	var url3="tagihan/daftar_exteren12.php";
	var url4="tagihan/daftar_exteren01.php";
	var url17="tagihan/cetakpdf.php";
	var url18="tagihan/cetaklpt.php";
</script>
<?php $t=date_sql($tanggal);$tgl=date('d',strtotime($t));$bln=date('m',strtotime($t));$thn=date('Y',strtotime($t));$bln++;if($bln>12){$bln=1; $thn++;}$kwitansi=TRUE; ?>
<div class="ui-widget-content" align="center">
<input type="hidden" id="cetakpdf" name="cetakpdf"/>
<input type="hidden" id="cetakxls" name="cetakxls"/>
<table align="center"><tr><td align="center">
	BRANCH : 
	<input type="text" name="branch" id="branch" size="4" maxlength="4" value="<?php echo $kcabang; ?>" title="Kode Cabang"/>
	BULAN : 
	<select name="bln" id="bln" style="width: 140px" title="Bulan Laporan">
	<?php $huruf=array("01","02","03","04","05","06","07","08","09","10","11","12");$i=0;$x=1;while($i<12){if($bln==$x){echo "<option selected='selected' value='".$huruf[$i]."'>".nmbulan($huruf[$i])."</option>";}else{echo "<option value='".$huruf[$i]."'>".nmbulan($huruf[$i])."</option>";}$i++;$x++;}?>
	</select>
	<select name="thn" id="thn" style="width: 70px" title="Tahun Laporan">
	<?php $i=0;$x=$thn;while($i<11){if($x==$thn){echo "<option  selected='selected' value='".$x."' selected>".$x."</option>";}else{echo "<option value='".$x."'>".$x."</option>";}$i++;$x--;}?>
	</select>
	KANTOR BAYAR
	<select name="kkbayar" id="kkbayar" class="combobox">
	<?php $hasil=$result->res("SELECT kd,nmkb FROM kkb WHERE branch='$kcabang' ORDER BY nmkb");while ($data = $result->row($hasil)){echo "<option value=\"".$data['kd']."\">".$data['nmkb']."</option>";}echo "<option selected='selected' value=9>KESELURUHAN</option>";?>
	</select>
</td></tr><tr><td align="center">
	<button id="neraca1">Daftar Tagi. Interen</button>
	<button id="neraca2">Rekap Tagi. Interen</button>
	<?php if(isset($kwitansi)){ ?>
		<button id="kwitansi1">Kwitansi PDF</button>
		<button id="kwitansi2">Kwitansi LPT</button> <?php
	};?>
	<button id="neraca3">Daftar Tagi. Tunggakan</button>
	<button id="neraca4">Daftar Tagi. Exteren</button>
</td></tr></table>
</div>
<div><button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button></div>
<div id="divPageAkun75"></div>