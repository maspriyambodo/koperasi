<?php include 'h.php';?>
<script type="text/javascript" src="jQuery/rpt_akuntansi.js"></script>
<script type="text/javascript">
var url1="akuntansi/neracabulan11.php?p=1";
var url2="akuntansi/neracabulan11";
var url3="akuntansi/lababulan11.php?p=1";
var url4="akuntansi/lababulan11";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	BULAN
	<select name="bln" id="bln" style="width: 130px" >
		<?php $bln_x1=$blnxxx;include 'form_bulan.php';?>
	</select>
	<select name="thn" id="thn"  style="width: 80px" >
		<?php $thn_x1=$thnxxx;include 'form_tahun.php';?>
	</select>
	<?php
	if($level<3 OR $level==6){
		echo '<select name="branch" id="branch">';
		$hasil = $result->res("select kode,nama from tblkantor order by kode");
		while ($data = $result->row($hasil)) {
			$pilih=$data['kode'].' '.$data['nama'];
			if ($kcabang==$data['kode']){
				echo "<option value=\"".$data['kode']."\" selected>".$pilih."</option>";
			}else{
				echo "<option value=\"".$data['kode']."\">".$pilih."</option>";
			}
		}
		echo '</select>';
	 }else{
		echo '<input type="text" name="branch" id="branch" value="<?php echo $kcabang;?>" size="6" maxlength="4" readonly/>';
	}
	?>
	<button id="neraca1">Neraca Bulanan</button>
	<button id="neraca2">SHU Bulanan</button>
</div>
<button id="btnpdf">PDF</button>
<div id="divPageLaporan"></div>