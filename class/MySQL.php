<?php
/**
 * PHP-MySQL-Class provides basic PHP methods in order to manipulate MySQL database
 * @license     GPL v2
 * @author      Walid Awad <walid@php-programmierer.at>
 * @copyright   Copyright (c) 2014
 * @version     0.1
 * @tutorial    http://www.php-programmierer.at/en/php-and-mysql/php-mysql-class-tutorial
 */
class MySQL {
	private $conn = null;
	private $DBHOST = 'localhost';
	private $DBUSR = 'root';
	private $DBPWD = '';
	/*private $DBPWD = 'galaxy16102017';*/
	private $DBName = 'nabasa';
	protected $error_msg = array();
	public  function __construct() {
		if ($this->conn = mysqli_connect($this->DBHOST, $this->DBUSR, $this->DBPWD)) {
		    if (!mysqli_select_db($this->conn,$this->DBName)) {
		        echo 'No database was found';
		    }
		} else {
			echo 'Can\'t connect to MySQL server';
		}
	}
	public  function createTable($tableName, $fields, $primaryKey = false){
		if(($tableName) && (count($fields)) > 0){
			$query = 'CREATE TABLE IF NOT EXISTS `'.$tableName.'`(';
			foreach ($fields as $key => $value) {
				$query .= '`'.$key.'` '.$value.', ';
			}		    
			if($primaryKey) $query .='PRIMARY KEY (`'.$primaryKey.'`)';
			else $query = substr ($query, 0, -2);
			$query .= ');';    
			$this->res($query);
		}
	}
	public  function xpdata($xp){
		$xp="Terjadi Kesalahan Number ".mysqli_error($this->conn);
		return $xp;
	}
	public  function alterTable($tableName, $fields){
		$query = ' alter table '.$tableName;
		foreach ($fields as $key => $value) {
			$query .= ' add `'.$key.'` '.$value.', ';
		}
		$query = substr ($query, 0, -2);
		$this->res($query);
	}
	public  function truncateTable($tableName){
		$query = 'truncate table '.$tableName;
		$this->res($query);
	}    
	public  function dropTable($tableName){
		$query = 'drop table if exists '.$tableName;
		$this->res($query);
	}
	public  function res($query) {
		return mysqli_query($this->conn,$query);
	}
	public  function res_multi($query) {
		return mysqli_multi_query($this->conn,$query);
	}
	public  function num($res) {
		return mysqli_num_rows($res);
	}
	public  function row($res) {
		return mysqli_fetch_assoc($res);
	}
	public  function LastInsertID() {
		return mysqli_insert_id();
	}
	public  function realScapeString($fields) {
		if (is_array($fields)) {
		    foreach ($fields as $key => $val) {
		        if (!is_array($fields[$key])) {
		            $fields[$key] = mysqli_real_escape_string($this->conn,$fields[$key]);
		        }
		    }
		} else {
		    $fields = mysqli_real_escape_string($this->conn,$fields);
		}
		return $fields;
	}
	public  function setWhere($where) {
		if (is_array($where)) {
		    if (count($where) > 0) {
		        $ret = ' where ';
		        foreach ($where as $key => $val) {
		           $ret .= $key . '= \'' . $val . '\' and ';
		        }
		        return substr($ret, 0, -5);
		    } else {
		        return false;
		    }
		} else {   
		    return ' where '.$where;
		}
	}
	public  function jumlah_data($tableName,$data,$where) {
		$query = 'select '.$data.' from '.$tableName.' ';
		$query .= $this->setWhere($where);
		$hasil=$this->res($query);
		if(!$hasil){
			die($this->xpdata(''));
		}else{
			if($this->num($hasil)<1){
				return FALSE;
			}else{
				return TRUE;
			}
		}
	}	
	public  function insert($tableName, $data) {
		$sql = 'insert into '.$tableName;
		$columns = '(';
		$values = ' values(';
		$fields = $this->realScapeString($data);
		foreach ($fields as $field => $value) {
			$columns .='`' . $field . '`,';
			$values .='\'' . $this->realScapeString($value) . '\',';
		}
		$columns = substr($columns, 0, -1);
		$values = substr($values, 0, -1);
		$columns .= ')';
		$values .=')';
		$sql .= $columns . $values;
		$hasil=$this->res($sql);
		if(!$hasil){
			die($this->xpdata(''));
		}
		return true;
	//return $this->LastInsertID();
	}
	public  function update($tableName, $data, $where) {
		$query = 'update '.$tableName . ' ';
		$set = 'set ';
		$fields = $this->realScapeString($data);
		foreach ($fields as $key => $value) {
			$set .= '`' . $key . '`=\'' . $value . '\',';
		}
		$query .= substr($set, 0, -1);
		$query .= $this->setWhere($where);
		$hasil=$this->res($query);
		if(!$hasil){
			die($this->xpdata(''));
		}
		return true;
	}
	public  function delete($tableName, $where, $limit) {
		$query  = 'delete from '.$tableName;
		$query .= $this->setWhere($where);
		if($limit){
			$query .=' LIMIT '.$limit;
		}
		$hasil=$this->res($query);
		if(!$hasil){
			die($this->xpdata(''));
		}
		return true;
	}
	public  function close() {
		mysqli_close($this->conn);
	}  
	public  function tem_tabel($tableName,$temTable){
		if(($tableName) && ($temTable)){
			$query = 'CREATE TEMPORARY TABLE '.$tableName.' LIKE '.$temTable;
			$ship=$this->res($query);
			if(!$ship){
				die($this->xpdata(''));
			}
		}else{
			die("Tabel Tujuan ".$tableName.", Tabel Asal ".$temTable." Kosong");
		}
		return true;
	}
	public  function buatTabel($tableName,$temTable){
		if(($tableName) && ($temTable)){
			$query = 'CREATE TABLE IF NOT EXISTS '.$tableName.' LIKE '.$temTable;
			$ship=$this->res($query);
			if(!$ship){
				$this->msg_error($this->xpdata(''));
			}
		}else{
			$this->msg_error("Tabel Tujuan ".$tableName." Atau Tabel Asal ".$temTable." Kosong");
		}
		return true;
	} 
	public function multi_x($query) {
		$hasil=$this->res_multi($query);
		if(!$hasil){
			$this->msg_error($this->xpdata(''));
		}
		return true;
	}
	public function multi_y($query) {
		$hasil=$this->res_multi($query);
		if(!$hasil){
			$this->set_error($this->xpdata(''));
			$xp=$this->display_errors('');
			die($xp);
		}
		return true;
	}		
	public  function query_hasil($fields,$tabel,$where,$group,$sort,$limit,$pesan) {
		$query = 'SELECT '.$fields;
		if($tabel) $query .=' FROM '.$tabel;
		if($where) $query .=' WHERE '.$where;
		if($group) $query .=' GROUP BY '.$group;
		if($sort) $query .=' ORDER BY '.$sort;
		if($limit) $query .=' LIMIT '.$limit;
		$pesan=$this->res($query);
		if(!$pesan){
			$this->msg_error("Terjadi Kesalahan Number ".mysqli_errno($this->conn));
		}
		return $pesan;
	}
	public function query_x1($query) {
		$query=$this->res($query);
		if(!$query){
			$this->msg_error($this->xpdata(''));
		}
		return $query;
	}
	public function query_y1($query) {
		$query=$this->res($query);
		if(!$query){
			die($this->xpdata(''));
		}
		return $query;
	}	
	public function query_cari($hasil) {
		$hasil=$this->res($hasil);
		if(!$hasil){
			die($this->xpdata(''));
		}else{
			if($this->num($hasil)<1){
				die('Data Tidak Ditemukan!!');
			}
		}
		return $hasil;
	}
	public function query_lap($hasil) {
		$hasil=$this->res($hasil);
		if(!$hasil){
			$this->msg_error($this->xpdata(''));
		}else{
			if($this->num($hasil)<1){
				$this->msg_error('Data Tidak Ditemukan!!');
			}
		}
		return $hasil;
	}
	protected function set_error($msg){
		if (is_array($msg)) {
			 foreach ($msg as $val){
				$this->error_msg[] = $msg;
			 }
		} else {
			$this->error_msg[] = $msg;
		}
	}
	public  function c_d($fields) {
		$fields = mysqli_real_escape_string($this->conn,$fields);
		return $fields;
	}
	/* lainnya */
	function display_errors($str) {
		if(count($this->error_msg) == 0) return false;
		$str = '';
		foreach ($this->error_msg as $val) {
			$str .= $val;
		}
		return $str;
	}
	function produk_kredit($s){
		$tabel_produk=TBL_DEBITUR;
		$hasil=$this->res("SELECT nmproduk FROM $tabel_produk WHERE kdproduk='$s'");
		$row = $this->row($hasil);$s=$row['nmproduk'];
		return $s;
	}
	function nama_sales($s){
		$tabel_sales=TBL_SALES;
		$hasil=$this->res("SELECT nama FROM $tabel_sales WHERE idsales='$s'");
		$row = $this->row($hasil);$s=$row['nama'];
		return $s;
	}
	function status_deposito($s){
		if($s==0){
			die("Maaf Status Rekening Harus Melalui Otorisasi");
		}elseif($s==4){
			die("Maaf Status Rekening Sudah Di Tutup");
		}elseif($s==3){
			die("Maaf Status Rekening Dijaminkan");
		}elseif($s==2){
			die("Maaf Status Rekening Masih Diblokir");
		}
	}
	function angsuran_ke($norek){
		$tabel=TBL_PAYMENT;$bulan=PAR_THN;$bulan .=PAR_BLN;
		$hasil=$this->res("SELECT angsurke FROM $tabel WHERE norek='$norek' AND bulan='$bulan'");
		$row = $this->row($hasil);$norek=$row['angsurke'];
		return $norek;
	}	
	function jatuh_tempo($norek){
		$tabel=TBL_PAYMENT;
		$hasil=$this->res("SELECT tanggal FROM $tabel WHERE norek='$norek' ORDER BY angsurke DESC LIMIT 1");
		$row = $this->row($hasil);$norek=$row['tanggal'];
		return $norek;
	}
	function kd_gsl($norek){
		$tabel=TBL_SANDI;
		$hasil=$this->res("SELECT kode FROM $tabel WHERE norekgssl='$norek'");$row = $this->row($hasil);$norek=$row['kode'];
		return $norek;
	}
	function no_transaksi($xnotran){
		$bln = PAR_BLN;$thn = PAR_THN;$tabel = TBL_TRAN;
		$tabel .=substr('00'.$bln,-2);$tabel .=substr($thn,2,2);
		$hasil=$this->res("SELECT SUBSTR(MAX(notransaksi),1,5) AS nomor FROM $tabel");
		$datamax= $this->row($hasil);$jumlah = $datamax['nomor'];
		$jumlah++;$xnotran = substr("00000"."".$jumlah,-5)."-".$bln."-".substr($thn,2,2);return $xnotran;
	}
	function save_saldo($n,$s){
		$bln = PAR_BLN;	$thn = PAR_THN;
		$tabel = TBL_TRAN;
		$tabel .=substr('00'.$bln,-2);
		$tabel .=substr($thn,2,2);
		$hasil=$this->res("SELECT SUM(IF(substr(kdtran,1,1)='1',jumlah,0)) AS debetk,SUM(IF(substr(kdtran,1,1)='2',jumlah,0)) AS kreditk,SUM(IF(substr(kdtran,1,1)='3',jumlah,0)) AS debetm,SUM(IF(substr(kdtran,1,1)='4',jumlah,0)) AS kreditm FROM $tabel WHERE norek='$n'");
		$row = $this->row($hasil);
		$debetk=$row['debetk'];
		$kreditk=$row['kreditk'];
		$debetm=$row['debetm'];
		$kreditm=$row['kreditm'];
		$s=($s+$kreditk+$kreditm)-($debetk+$debetm);
		return $s;
	}
	function save_blokir($n){
		$hasil=$this->res("SELECT SUM(jumlah) AS jumlah FROM blokir WHERE norek='$n' AND kdtran!=0 GROUP BY norek ORDER BY norek");$n=0;
		if($this->num($hasil)>0){
			$row = $this->row($hasil);
			$n=$row['jumlah'];
		}
		return $n;
	}
	function kolek($n,$m){
		$norek=$n;$payment=TBL_PAYMENT;$kredit=TBL_KREDIT;
		$hasil=$this->res("SELECT SUM(mysum) AS mysum FROM (SELECT IF(SUM(IF(kdtran=111,pokok,0))-SUM(IF(kdtran=777,pokok,0))>0,1,0) AS mysum FROM $payment WHERE norek='$norek' AND tanggal<='$m' GROUP BY angsurke) AS bb");
		$data=$this->row($hasil);
		$kk=$data['mysum'];
		$n=1;
		if($kk<1){
			$n=1;
		}elseif($kk<3){
			$n=2;
		}elseif($kk<5){
			$n=3;
		}elseif($kk<7){
			$n=4;
		}else{
			$n=5;
		}
		$this->res("UPDATE $kredit SET kolek='$n' WHERE norek='$norek' LIMIT 1");
		return $n;
	}
	function data_nasabah($branch,$nonas){
		$nasabah=TBL_NASABAH;
		$hasil=$this->res("SELECT status_cif FROM $nasabah WHERE branch='$branch' AND nonas='$nonas' ORDER BY nonas LIMIT 1");
		if($this->num($hasil)==1){
			$row = $this->row($hasil);
			if($row['status_cif']!=1){
				$this->msg_error('Nomor nasabah belum di otorisasi!!');
			}
		}else{
			$this->msg_error('Data Tidak Ditemukan!!');
		}return true;
	}
	function convert_tgl($date){
		$exp = explode('-',$date);
		if(count($exp) == 3){
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}return $date;
	}
	function saldo_bulan($rekening){
		$bln=PAR_BLN;$thn=PAR_THN;
		$blnl=$bln-1;
		if($blnl<1){
			$bln=12;
			$thn=$thn-1;
			$fieldhari1='tahun12a';
			$tabeln='akuntansi.sandi'.$thn;
		}else{
			$fieldhari1='bulan'.substr('00'.$blnl,-2);
			$tabeln=TBL_SANDI;			
		}
		$hasil=$this->res("SELECT norekgssl,$fieldhari1 FROM $tabeln WHERE norekgssl='$rekening' LIMIT 1");
		$rekening=0;
		if($hasil){
			$row=$this->row($hasil);
			$rekening=$row[$fieldhari1];
		}
		return $rekening;
	}	
	function saldo_akhir($rekening){
		$bln=PAR_BLN;$thn=PAR_THN;
		$tabel =TBL_TRAN;
		$tabel .=substr('00'.$bln,-2);
		$tabel .=substr($thn,2,2);
		$hasil=$this->res("SELECT SUM(IF(substr(kdtran,1,1)='1',jumlah,0)) AS debetk,SUM(IF(substr(kdtran,1,1)='2',jumlah,0)) AS kreditk,SUM(IF(substr(kdtran,1,1)='3',jumlah,0)) AS debetm,SUM(IF(substr(kdtran,1,1)='4',jumlah,0)) AS kreditm FROM $tabel WHERE norekgl='$rekening' GROUP BY norekgl");$row=$this->row($hasil);
		$debetk=$row['debetk'];
		$kreditk=$row['kreditk'];
		$debetm=$row['debetm'];
		$kreditm=$row['kreditm'];
		$saldo_awal=$this->saldo_bulan($rekening);
		$kdgsl=$this->kd_gsl($rekening);
		if($kdgsl=='D'){
			$rekening=($saldo_awal+$debetk+$debetm)-($kreditk+$kreditm);
		}else{
			$rekening=($saldo_awal+$kreditk+$kreditm)-($debetk+$debetm);
		}
		return $rekening;
	}
	function msg_error($pesan){
		echo '<p><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span><strong>Alert : '.$pesan; die(); echo '</strong></div></p>';return true;
	}
	function jumsaldo($n,$m){
		$j=$m;$payment=TBL_PAYMENT;
		$hasil=$this->res("SELECT SUM(pokok) AS pokok FROM $payment WHERE kdtran=777 AND norek='$n' GROUP BY norek");
		if($this->num($hasil)!=0){
			$row=$this->row($hasil);
			$pokok=$row['pokok'];
			$m=$j-$pokok;
			if($pokok==0){
				$m=$j;
			}
		}
		return $m;
	}
	function namacabang($n){
		$tabel=TBL_KANTOR;
		$hasil=$this->res("SELECT nama FROM $tabel WHERE kode='$n' LIMIT 1");
		if($hasil){
			if($this->num($hasil)!=0){
				$row=$this->row($hasil);
				$n=$row['nama'];
			}
		}
		return $n;
	}
}
$result=new MySQL;
/*
<?php
require 'MySQL.php';
    $db = new MySQL();
    $tableName = 'Blog';
    $data = array(
        'Title' => 'Updated blog Title',
        'shortDescription' => 'Updated blog short description ',
        'Content' => 'Updated blog content');
    $where = array('ID' => 2);
    $db->update($tableName, $data, $where);
?>
<?php
require 'MySQL.php';
    $db = new MySQL();
    $where = array('ID' => 2);
    $tableName = 'Blog';
    $db->delete($tableName, $where);
?>
<?php
require 'MySQL.php';
    $db = new MySQL();
    $query = 'select*from Blog order by Created ASC';
    $res = $db->res($query);
    $num = $db->num($res);

    if ($num >= 1) {
        echo '<h1>' . $num . ' Einträge</h1>';
        echo '<ul>';
        while ($row = $db->row($res)) {
            echo '<li>' . $row['Title'] . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<h1>No items were found</h1>';
    }
?>
<?php
require 'MySQL.php';
    $db = new MySQL();
    $data = array(
        'Title' => 'Hello World',
        'shortDescription' => 'This is a short description of my first Blog',
        'Content' => 'This is content of my first Blog',
        'Created' => date('Y-m-d H:i:s')
    );
    $lastID = $db->insert('Blog', $data);
?>
<?php
require 'MySQL.php';
    $db = new MySQL();
    $fields = array(
    'newField1' => 'varchar(100)',
    'newField2' => 'varchar(100)');
$tableName = 'Blog';
$db->alterTable($tableName, $fields);
?>
<?php
require 'MySQL.php';
    $db = new MySQL();
    $fields = array(
        'ID' => 'int(11) NOT NULL AUTO_INCREMENT',
        'Title' => 'varchar(100) NOT NULL',
        'shortDescription' => 'mediumtext NOT NULL',
        'Content' => 'text NOT NULL',
        'Created' => 'datetime NOT NULL');
    $db->createTable('Blog', $fields, 'ID');
?>
*/
?>