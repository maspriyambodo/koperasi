<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_formlaporan.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url1="micror/rtagihand.php?p=1";
	var url2="micror/rtagihand.php?p=2";
	var url3="micror/rtagihand.php?p=3";
	var url4="micror/rtagihanr.php?p=1";
	var url5="micror/rtagihanr.php?p=2";
	var url6="micror/rtagihanr.php?p=3";
	var url7="micror/cetakpdf.php";
	var url8="micror/cetaklpt.php";
</script>
<?php
$branch=$kcabang;
$t=date_sql($tanggal);
$bln=date('m',strtotime($t));
$thn=date('Y',strtotime($t));
$bln++;
if($bln>12){$bln=1; $thn++;}
$kwitansi=TRUE;
?>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	BULAN
	<select name="bln" id="bln" style="width: 130px" >
		<?php $bln_x1=$blnxxx;include 'form_bulan.php';?>
	</select>
	<select name="thn" id="thn" style="width: 80px" >
		<?php $thn_x1=$thnxxx;include 'form_tahun.php';?>
	</select>
	<select name="produk" id="produk">
		<?php $_produk='';include 'parameter/_produkk.php';?>
	</select>
	<select name="kdsales" id="kdsales" class="combobox">
		<?php $_idsales='';include 'parameter/_sales.php';?>
	</select>
	<table align="center">
	<tr>
		<td align="center"><button id="layar">Daftar Layar</button></td>
		<td align="center"><button id="rekap">Rekap Layar</button></td>
		<?php if(isset($kwitansi)){ ?>
			<td align="center"><button id="kwitansi1">Kwitansi PDF</button></td>
			<td align="center"><button id="kwitansi2">Kwitansi LPT</button></td>
		<?php
		};?>
	</tr>
	</table>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageLaporan"></div>