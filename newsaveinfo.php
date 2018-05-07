<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/_tambah_icon.js"></script>
<script type="text/javascript" src="java/_history.js"></script>
<script type="text/javascript">
	var url1='newsaveinfod.php';
	var url2='newsaveinfox.php';
	var url3='newsaveinfoy.php';
	$("input#nonas").focus();
</script>
<div align="center" class="ui-widget-content" align="center">
	<form id="formsearch" name="formsearch" method="post" action="">
		Norek : 
		<input type="text" name="nonas" id="nonas" size="20" maxlength="13" placeholder="no rekening"/> 
		<select name="bln" id="bln" title="Mulai Bulan">
			<?php
			$huruf = array("01","02","03","04","05","06","07","08","09","10","11","12");
			$i = 0;
			while($i<12){
				if ($bln == $huruf[$i]){
					echo "<option selected='selected' value='".$huruf[$i]."'>".$huruf[$i]."</option>";
				 }else{
				   	echo "<option value='".$huruf[$i]."'>".$huruf[$i]."</option>";
				 }
				$i++;
			}
			?>
		</select>
		<select name="thn" id="thn" title="Mulai Tahun">
			<?php
			$i = 0;$x=$thn;
			while($i<11){
				if ($x == $thn) {
					echo "<option  selected='selected' value='".$x."' selected>".$x."</option>";
				}else{
					echo "<option value='".$x."'>".$x."</option>";
				}
				$i++;$x--;
			}
			?>
		</select>
		<button type="button" id="lookups">&nbsp;</button>
		<button type="button" id="lacak_data">Cari Data</button>
	</form>
</div>
<button id="btn1">Print PDF</button>
<button id="btn2">Print Excel</button>
<div ID="divPageHasil"></div>