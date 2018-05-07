<?php include 'h_tetap.php';?>
<script type="text/javascript">
$(function(){
	$( "#tabs" ).tabs({
		event: "mouseover",
		collapsible: true
	});
});
</script>
<?php
echo "<div id='tabs'><ul><li style='width:auto'><a href='#tabs-1'>Data Nasabah</a></li><li style='width:auto'><a href='#tabs-2'>Data KTP Tidak Sama</a></li><li style='width:auto'><a href='#tabs-3'>Data Usaha Nasabah</a></li></ul>";
$id=$result->c_d($_GET['id']);
include 'Lib/opennasbah.php';
echo "<div id='tabs-1'><table width='100%'>";include 'infonasabaht.php';
echo "</table></div><div id='tabs-2'><table width='100%'>";include 'infonasabahb.php';
echo "</table></div><div id='tabs-3'><table width='100%'>";include 'infonasabahu.php';
echo "</table></div></div>";
