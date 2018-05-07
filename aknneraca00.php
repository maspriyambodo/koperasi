<?php include 'h.php';?>
<script type="text/javascript" src="jQuery/rpt_akuntansi.js"></script>
<script type="text/javascript">
	var url1="akuntansi/neracarra01.php?p=1";
	var url2="akuntansi/neracarra01";
	var url3="akuntansi/neracarrp01.php?p=1";
	var url4="akuntansi/neracarrp01";
	var url5="akuntansi/neracakwj01.php?p=1";
	var url6="akuntansi/neracakwj01";
	var url7="akuntansi/neracakas01.php?p=1";
	var url8="akuntansi/neracakas01";
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
		echo '<input type="text" name="branch" id="branch" value="'.$kcabang.'" size="6" maxlength="4" readonly/>';
	}
	?>
	<button id="neraca1">Rincian RRA</button>
	<button id="neraca2">Rincian RRP</button>
	<button id="neraca3">Rincian Kewajiban</button>
	<button id="neraca4">Arus Kas Per Kwartal</button>
</div>
<button id="btnpdf">PDF</button>
<div id="divPageLaporan"></div>