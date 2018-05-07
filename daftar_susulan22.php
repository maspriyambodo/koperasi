<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_laporan.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url1="susulan/rekap_tagihan01.php";
	var url2="susulan/daftar_tagihan01.php";
	var url3="susulan/rekap_tagihan31.php";
	var url4="susulan/daftar_tagihan31.php";
	var url5="susulan/rekap_tagihan21.php";
	var url6="susulan/daftar_tagihan21.php";
</script>
<div class="ui-widget-content" align="center">
	<table align="center">
		<input type="hidden" id="cetakpdf" name="cetakpdf"/>
		<input type="hidden" id="cetakxls" name="cetakxls"/>
		<tr><td>
		BULAN : 
		<select name="bln" id="bln" style="width: 130px" >
			<?php $bln_x1=$blnxxx;include 'form_bulan.php';?>
		</select>
		<select name="thn" id="thn" style="width: 80px" >
			<?php $thn_x1=$thnxxx;include 'form_tahun.php';?>
		</select>
		<select name="branch" id="branch">
			<?php include 'parameter/_kcabang.php';?>
		</select>
		<select name="kkbayar" id="kkbayar" class="combobox">
			<?php $_kkbayar='';include 'parameter/_kkbayar.php';?>
			echo "<option value=9 selected>KESELURUHAN</option>";
		</select>
		</td></tr>	
	</table>
	<div align="center">
		<button id="neraca1">Rekap Realisasi Tagihan</button>
		<button id="neraca2">Daftar Realisasi Tagihan</button>
		<button id="neraca3">Rekap Kwitansi Kembali</button>
		<button id="neraca4">Daftar Kwitansi Kembali</button>
		<button id="neraca5">Rekap Belum Realisasi</button>
		<button id="neraca6">Daftar Belum Realisasi</button>
	</div>		
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageLaporan"></div>