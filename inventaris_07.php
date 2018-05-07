<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_formlaporan.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url4="inventaris/inventaris_05a.php?p=1";
	var url5="inventaris/inventaris_05a.php?p=2";
	var url6="inventaris/inventaris_05a.php?p=3";
	var url1="inventaris/inventaris_06a.php?p=1";
	var url2="inventaris/inventaris_06a.php?p=2";
	var url3="inventaris/inventaris_06a.php?p=3";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	<select name="bln" id="bln" style="width: 130px" >
		<?php $bln_x1=$blnxxx;include 'form_bulan.php';?>
	</select>
	<select name="thn" id="thn" style="width: 80px" >
		<?php $thn_x1=$thnxxx;include 'form_tahun.php';?>
	</select>
	<select name="branch" id="branch">
		<?php include 'parameter/_kcabang.php';?>
	</select>	
	<select name="kdsales" id="kdsales"style=" width: 200px" >
		<?php $huruf = array("KESELURUHAN","PERALATAN KANTOR","PERALATAN MEUBEL","PERALATAN KOMPUTER","GEDUNG KANTOR","PERALTAN ELEKTRONIK","LAINNYA");$i = 0;
		while($i < 7){
			echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
			$i++;
		} ?>
	</select>
	<button id="layar">Daftar Layar</button>
	<button id="rekap">Rekap Layar</button>
</div>
<button id="btnpdf">PDF</button>
<button id="btnxls">XLS</button>
<div id="divPageLaporan"></div>