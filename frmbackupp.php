<?php
include 'auth.php';
$file='backup'.date("dmY").time().'.sql';
$t=date_sql($tanggal);
backup_tables("nabasa",$file,$t);?>
<p align="center">&nbsp;</p>
<p align="center"><a style="cursor:pointer" onclick="location.href='frmbackupd.php?nama_file=<?php echo $file;?>'" title="Download">Backup database telah selesai. <font color="#0066FF">Download file database</font></a></p>
<?php
function backup_tables($name,$nama_file,$t){
	$bln=date('m',strtotime($t));
	$thn=date('Y',strtotime($t));
	$tabelx ='tran';
	$tabelx .=$bln;
	$tabelx .=substr($thn,2,2);
	$tabeln ='tran';
	$tabeln .=$bln;
	$tabeln .=substr($thn,2,2);
	$tabelr ='tran';
	$tabelr .=$bln;
	$tabelr .=substr($thn,2,2);
	$tables = 'nabasa.wkb,akuntansi.neraca';
	include 'frmbackupx.php';
	if($tables == '*'){
		$tables = array();
		$result =$mysql->query('SHOW TABLES');
		while($row = mysqli_fetch_row($result)){
			$tables[] = $row[0];
		}
	}else{
		$tables = array("kredit","tabungan","payment","asuransi",$tabelx,"inventaris","nasabah",$tabelr,$tabeln); 
	}
	$return='';$retur='';
	foreach($tables as $table){
		$result = $mysql->query('SELECT * FROM '.$table);
		$num_fields = mysqli_num_fields($result);
		$return = 'DROP TABLE IF EXISTS '.$table.';';
		$row2 = mysqli_fetch_row($mysql->query('SHOW CREATE TABLE '.$table));
		$return .= "\n\n".$row2[1].";\n\n";
		$return .= 'INSERT INTO '.$table.' VALUES(';
		while($row = mysqli_fetch_row($result)){
			for($j=0; $j<$num_fields; $j++) {
				$row[$j] = addslashes($row[$j]);
				$row[$j] = preg_replace("/\n/","/\n/",$row[$j]);
				if (isset($row[$j])) { 
					$return .= '"'.$row[$j].'"' ; 
				} else { 
					$return .= '""'; 
				}
				if ($j<($num_fields-1)){
					$return .= ',';
				}
			}
			$return .= "),(";
		}
		$retur .=substr_replace($return,';',-2);
	}
	$retur = substr_replace($retur,'',-1);
	$handle = fopen('backup/'.$nama_file,'w+');
	fwrite($handle,$retur);
	fclose($handle);
	$mysql->close();
}
?>