<?php include 'h_tetap.php';?>
<script type="text/javascript">
$(function(){
	$( "#tabs" ).tabs({
		event: "mouseover",
		collapsible: true
	});
});
</script>
<div id="tabs">
<ul >
<li style="width:auto" ><a href="#tabs-1">Data Nasabah</a></li>
<li style="width:auto" ><a href="#tabs-2">Data KTP Tidak Sama</a></li>
<li style="width:auto" ><a href="#tabs-3">Data Usaha Nasabah</a></li>
</ul>
<?php 
$id=$result->c_d($_GET['id']);
include 'Lib/opennasbah.php';
?>
<div id="tabs-1">
	<table width="100%">
		<?php include 'infonasabaht.php';?>
	</table>
</div>
<div id="tabs-2">
	<table width="100%">
		<?php include 'infonasabahb.php';?>
	</table>
</div>
<div id="tabs-3">
	<table width="100%">
		<?php include 'infonasabahu.php';?>
	</table>
</div>
</div>
