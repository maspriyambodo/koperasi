<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_formlaporan.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url1="lainnya/rpenyusutand.php?p=1";
	var url2="lainnya/rpenyusutand.php?p=2";
	var url3="lainnya/rpenyusutand.php?p=3";
	var url4="lainnya/rpenyusutanr.php?p=1";
	var url5="lainnya/rpenyusutanr.php?p=2";
	var url6="lainnya/rpenyusutanr.php?p=3";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	<input type="hidden" id="cetakxls" name="cetakxls"/>
	BRANCH
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