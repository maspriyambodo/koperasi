<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_laporan.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url1="realisasi/rekap_tagihan01.php";
	var url2="realisasi/daftar_tagihan01.php";
	var url3="realisasi/rekap_tagihan31.php";
	var url4="realisasi/daftar_tagihan31.php";
	var url5="realisasi/rekap_tagihan21.php";
	var url6="realisasi/daftar_tagihan21.php";
</script>
<div class="ui-widget-content" align="center">
	<table align="center">
		<tr><td>
		<input type="hidden" id="cetakpdf" name="cetakpdf"/>
		<input type="hidden" id="cetakxls" name="cetakxls"/>
		BULAN : 
		<select name="bln" id="bln" style="width: 130px" >
		<?php $huruf=array("01","02","03","04","05","06","07","08","09","10","11","12");$i=0;$x=1;while($i<12){if($bln==$x){echo "<option selected='selected' value='".$huruf[$i]."'>".nmbulan($huruf[$i])."</option>";}else{echo "<option value='".$huruf[$i]."'>".nmbulan($huruf[$i])."</option>";}$i++;$x++;}?>
		</select>
		<select name="thn" id="thn" style="width: 80px" >
		<?php $i=0;$x=$thn;while($i<11){if($x==$thn){echo "<option  selected='selected' value='".$x."' selected>".$x."</option>";}else{echo "<option value='".$x."'>".$x."</option>";}$i++;$x--;}?>
		</select>
		<select name="branch" id="branch">
			<?php include 'parameter/_kcabang.php';?>
		</select>
		<select name="kkbayar" id="kkbayar" class="combobox">
		<?php $hasil=$result->res("SELECT kd,nmkb FROM kkb WHERE branch='$kcabang' ORDER BY nmkb");while ($data = $result->row($hasil)){echo "<option value=\"".$data['kd']."\">".$data['nmkb']."</option>";}echo "<option selected='selected' value=9>KESELURUHAN</option>";?>
		</select>
		</td></tr>
	</table>
	<div align="center">
		<button id="neraca1">Rekap Real Tagihan</button>
		<button id="neraca2">Daftar Real Tagihan</button>
		<button id="neraca3">Rekap Kwitansi Kembali</button>
		<button id="neraca4">Daftar Kwitansi Kembali</button>
		<button id="neraca5">Rekap Blm Realisasi</button>
		<button id="neraca6">Daftar Blm Realisasi</button>
	</div>		
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageLaporan"></div>