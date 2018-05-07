<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_laporan_a.js"></script>
<script type="text/javascript">
	var url1="micror/rekap_tagihan01.php";
	var url2="micror/daftar_tagihan01.php";
	var url3="micror/rekap_tagihan31.php";
	var url4="micror/daftar_tagihan21.php";
</script>
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
	<select name="branch" id="branch">
		<?php include 'parameter/_kcabang.php';?>
	</select>
	<select name="kdsales" id="kdsales" class="combobox">
		<?php $_idsales='';include 'parameter/_sales.php';?>
	</select>	
	<table align="center">
	<tr>
		<td align="center"><button id="neraca1">Rekap Realisasi Tagihan</button></td>
		<td align="center"><button id="neraca2">Daftar Realisasi Tagihan</button></td>
		<td align="center"><button id="neraca3">Rekap Kwitansi Kembali</button></td>
		<td align="center"><button id="neraca4">Daftar Kwitansi Kembali</button></td>
	</tr>
	</table>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageAkun"></div>
