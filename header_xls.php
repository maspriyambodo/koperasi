<?php
$cabang=$result->namacabang($branch);
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=".$tanggal.".xls");
echo '<html>';
echo '<head>';
echo '<title>PRINT XLS</title>';
echo '</head>';
echo '<body>';
?>