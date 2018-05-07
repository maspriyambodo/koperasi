<?php 
include 'h_atas.php';
if(isset($_GET['term'])){
	$return_arr=array();
	$term=$_GET['term'];
	$stmt=$result->res("SELECT a.norek,b.nama FROM nabasa.tabungan a JOIN nabasa.nasabah b ON a.nonas=b.nonas WHERE a.branch='$kcabang' AND a.norek LIKE '%$term%' UNION ALL SELECT norekgssl AS norek,nama FROM akuntansi.sandi WHERE substr(nonas,-2)!=00 AND branch='$kcabang' AND norekgssl LIKE '%$term%' ORDER BY norek LIMIT 20",'');
	while($row = $result->row($stmt)) {
		$json[] = array(
			'label' => $row['norek'].' '.$row['nama'],
			'value' => substr($row['norek'],4,6),
			'branch'=> substr($row['norek'],0,4),
			'sufix' => substr($row['norek'],-3),
			'nama'  => $row['nama']
		);
	}
	echo json_encode($json);
}
?>