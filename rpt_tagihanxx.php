<?php
if($branch=='0111'){
	$result->query_x1("CREATE TEMPORARY TABLE $tabelm SELECT branch,norek,nama,kdtran,angsurke,SUM(pokok) as pokok,SUM(bunga) as bunga,SUM(adm) AS adm,SUM(jumlah) AS jumlah FROM $tabelr $where GROUP BY norek ORDER BY norek");
	$result->query_x1("INSERT INTO $tabelm SELECT branch,norek,nama,kdtran,angsurke,SUM(pokok) as pokok,SUM(bunga) as bunga,SUM(adm) AS adm,SUM(jumlah) AS jumlah FROM $tabelx $where GROUP BY norek ORDER BY norek");
	$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT norek,SUM(IF(kdkredit=10,jumlah,0)) AS pokok1,SUM(IF(kdkredit=20,jumlah,0)) AS bunga1,SUM(IF(kdkredit=30,jumlah,0)) AS adm1,SUM(IF(kdkredit=40,jumlah,0)) AS denda1,SUM(IF(kdkredit=50,jumlah,0)) AS finalti1,SUM(IF(kdkredit=10,jumlah,0))+SUM(IF(kdkredit=20,jumlah,0))+SUM(IF(kdkredit=30,jumlah,0))+SUM(IF(kdkredit=40,jumlah,0))+SUM(IF(kdkredit=50,jumlah,0)) AS jumlah1 FROM $tabeln WHERE substr(jtransaksi,1,1)=3 GROUP BY norek ORDER BY norek");
}else{
	$result->query_x1("CREATE TEMPORARY TABLE $tabelm SELECT branch,norek,nama,kdtran,angsurke,SUM(pokok) as pokok,SUM(bunga) as bunga,SUM(adm) AS adm,SUM(jumlah) AS jumlah FROM $tabelr $where1 GROUP BY norek ORDER BY norek");
	$result->query_x1("INSERT INTO $tabelm SELECT branch,norek,nama,kdtran,angsurke,SUM(pokok) as pokok,SUM(bunga) as bunga,SUM(adm) AS adm,SUM(jumlah) AS jumlah FROM $tabelx $where1 GROUP BY norek ORDER BY norek");
	$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT norek,SUM(IF(kdkredit=10,jumlah,0)) AS pokok1,SUM(IF(kdkredit=20,jumlah,0)) AS bunga1,SUM(IF(kdkredit=30,jumlah,0)) AS adm1,SUM(IF(kdkredit=40,jumlah,0)) AS denda1,SUM(IF(kdkredit=50,jumlah,0)) AS finalti1,SUM(IF(kdkredit=10,jumlah,0))+SUM(IF(kdkredit=20,jumlah,0))+SUM(IF(kdkredit=30,jumlah,0))+SUM(IF(kdkredit=40,jumlah,0))+SUM(IF(kdkredit=50,jumlah,0)) AS jumlah1 FROM $tabeln WHERE substr(jtransaksi,1,1)=3 AND branch='$branch' GROUP BY norek ORDER BY norek");
}
?>