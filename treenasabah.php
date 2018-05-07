<?php
$kode= trim($_SESSION['SESS_STATUS']);
$akses = trim($_SESSION['SESS_LEVEL_USER']);
$hmenu = trim($_SESSION['SESS_LEVEL_MENU']);
$pilih = "WHERE kode".$akses."='1' AND kodem".$hmenu."='1' AND aktif='1'" ;
$hasil=$hasil=$result->query_x1("SELECT * FROM tabel_menu $pilih AND parent_id=1000 ORDER BY menu_order ASC");
$row = $result->num($hasil);
if (!empty($row)){
	while ($row = $result->row($hasil)){
		$tre[]=$row;
		global $tree;
		foreach($tre as $v)
		$tree[$v['id']] = $v;
		$tx = "";
		$tx.= my_parent(1000);
	}
}
$hasil=$result->query_x1("SELECT * FROM tabel_menu $pilih AND parent_id=1100 ORDER BY menu_order ASC");
$row = $result->num($hasil);
if (!empty($row)){
	while ($row = $result->row($hasil)){
		$tre[]=$row;
		global $tree;
		foreach($tre as $v)
		$tree[$v['id']] = $v;
		$tx10 = "";
		$tx10 .= my_parent(1100);
	}
}
$hasil=$result->query_x1("SELECT * FROM tabel_menu $pilih AND parent_id=1400 ORDER BY menu_order ASC");
$row = $result->num($hasil);
if (!empty($row)){
	while ($row = $result->row($hasil)){
		$tre[]=$row;
		global $tree;
		foreach($tre as $v)
		$tree[$v['id']] = $v;
		$tx12 = "";
		$tx12.= my_parent(1400);
	}
}

$hasil=$result->query_x1("SELECT * FROM tabel_menu $pilih AND parent_id=1250 ORDER BY menu_order ASC");
$row = $result->num($hasil);
if (!empty($row)){
	while ($row = $result->row($hasil)){
		$tre[]=$row;
		global $tree;
		foreach($tre as $v)
		$tree[$v['id']] = $v;
		$tx4 = "";
		$tx4.= my_parent(1250);
	}
}
$hasil=$result->query_x1("SELECT * FROM tabel_menu $pilih AND parent_id=1300 ORDER BY menu_order ASC");
$row = $result->num($hasil);
if (!empty($row)){
	while ($row = $result->row($hasil)){
		$tre[]=$row;
		global $tree;
		foreach($tre as $v)
		$tree[$v['id']] = $v;
		$tx0 = "";
		$tx0.= my_parent(1300);
	}
}
$hasil=$result->query_x1("SELECT * FROM tabel_menu $pilih AND parent_id=1200 ORDER BY menu_order ASC");
$row = $result->num($hasil);
if (!empty($row)){
	while ($row = $result->row($hasil)){
		$tre[]=$row;
		global $tree;
		foreach($tre as $v)
		$tree[$v['id']] = $v;
		$tx1 = "";
		$tx1.= my_parent(1200);
	}
}
$hasil=$result->query_x1("SELECT * FROM tabel_menu $pilih AND parent_id=1350 ORDER BY menu_order ASC");
$row = $result->num($hasil);
if (!empty($row)){
	while ($row = $result->row($hasil)){
		$tre[]=$row;
		global $tree;
		foreach($tre as $v)
		$tree[$v['id']] = $v;
		$tx5 = "";
		$tx5.= my_parent(1350);
	}
}
$hasil=$result->query_x1("SELECT * FROM tabel_menu $pilih AND parent_id=1600 ORDER BY menu_order ASC");
$row = $result->num($hasil);
if (!empty($row)){
	while ($row = $result->row($hasil)){
		$tre[]=$row;
		global $tree;
		foreach($tre as $v)
		$tree[$v['id']] = $v;
		$tx6 = "";
		$tx6.= my_parent(1600);
	}
}
$hasil=$result->query_x1("SELECT * FROM tabel_menu $pilih AND parent_id=1500 ORDER BY menu_order ASC");
$row = $result->num($hasil);
if (!empty($row)){
	while ($row = $result->row($hasil)){
		$tre[]=$row;
		global $tree;
		foreach($tre as $v)
		$tree[$v['id']] = $v;
		$tx7 = "";
		$tx7.= my_parent(1500);
	}
}
$hasil=$result->query_x1("SELECT * FROM tabel_menu $pilih AND parent_id=1800 ORDER BY menu_order ASC");
$row = $result->num($hasil);
if (!empty($row)){
	while ($row = $result->row($hasil)){
		$tre[]=$row;
		global $tree;
		foreach($tre as $v)
		$tree[$v['id']] = $v;
		$tx8 = "";
		$tx8.= my_parent(1800);
	}
}
$hasil=$result->query_x1("SELECT * FROM tabel_menu $pilih AND parent_id=1900 ORDER BY menu_order ASC");
$row = $result->num($hasil);
if (!empty($row)){
	while ($row = $result->row($hasil)){
		$tre[]=$row;
		global $tree;
		foreach($tre as $v)
		$tree[$v['id']] = $v;
		$tx9 = "";
		$tx9.= my_parent(1900);
	}
}
$hasil=$result->query_x1("SELECT * FROM tabel_menu $pilih AND parent_id=1950 ORDER BY menu_order ASC");
$row = $result->num($hasil);
if (!empty($row)){
	while ($row = $result->row($hasil)){
		$tre[]=$row;
		global $tree;
		foreach($tre as $v)
		$tree[$v['id']] = $v;
		$tx14 = "";
		$tx14.= my_parent(1950);
	}
}
$hasil=$result->query_x1("SELECT * FROM tabel_menu $pilih AND parent_id=2000 ORDER BY menu_order ASC");
$row = $result->num($hasil);
if (!empty($row)){
	while ($row = $result->row($hasil)){
		$tre[]=$row;
		global $tree;
		foreach($tre as $v)
		$tree[$v['id']] = $v;
		$tx11 = "";
		$tx11 .= my_parent(2000);
	}
}
$hasil=$result->query_x1("SELECT * FROM tabel_menu $pilih AND parent_id=2100 ORDER BY menu_order ASC");
$row = $result->num($hasil);
if (!empty($row)){
	while ($row = $result->row($hasil)){
		$tre[]=$row;
		global $tree;
		foreach($tre as $v)
		$tree[$v['id']] = $v;
		$tx13 = "";
		$tx13.= my_parent(2100);
	}
}
$hasil=$result->query_x1("SELECT * FROM tabel_menu $pilih AND parent_id=2200 ORDER BY menu_order ASC");
$row = $result->num($hasil);
if (!empty($row)){
	while ($row = $result->row($hasil)){
		$tre[]=$row;
		global $tree;
		foreach($tre as $v)
		$tree[$v['id']] = $v;
		$tx2 = "";
		$tx2.= my_parent(2200);
	}
}
$hasil=$result->query_x1("SELECT * FROM tabel_menu $pilih AND parent_id=2300 ORDER BY menu_order ASC");
$row = $result->num($hasil);
if (!empty($row)){
	while ($row = $result->row($hasil)){
		$tre[]=$row;
		global $tree;
		foreach($tre as $v)
		$tree[$v['id']] = $v;
		$tx3 = "";
		$tx3.= my_parent(2300);
	}
}
function my_parent($id) {
	global $tree;
	$tx = "";
	foreach($tree as $v){
		if($v['parent_id'] == $id){
			$me = $v;
			unset($tree[$v['id']]);
			$child = my_parent($me['id']);
			$class = empty($child) ? "unchild" : "has_child";
			$tx.= "<li class='has_child'>";
			$tx.= "<span><a href='".$me['url']."' title='".$me['title']."'>".$me['title']."</a></span>";
			$tx.= $child;
			$tx.= "</li>";
		}
	}
	if(!empty($tx)){
		$cl = $id > 0 ? " class='child'" : "";
		return "<ul$cl>$tx</ul>";
	}
	return "";
}	
?>