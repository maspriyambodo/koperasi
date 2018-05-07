<?php

/**
 * A wrapper for either mysql_*
 * or mysqli_* procedural functions
 *
 * methods for
 * -connecting
 * -disconnecting
 * -running queries
 *
 * @author Matthew Boyle
 * @copyright 2017
 * @version 1.0.5
 * @lisence MIT
 */

class Dbase {

	public $values = array();
	protected $conn_id = false;
	private $_res;
	private $_host = 'localhost';
	private $_user = 'root';
	private $_pword = '';
	private $_database = '';
	private $_new;
	private $_mysqli;
	private $_viewable = array('SELECT','SHOW','DESCRIBE','DESC','EXPLAIN','CHECKSUM');

	/**
	 * Constructor
	 *
	 * @param	string	$host		MySQL host address
	 * @param	string	$user		MySQL username
	 * @param	string	$pword		MySQL password
	 * @param	string	$database	MySQL name of database
	 * @param 	mixed	$mysql		bool-like flag to use mysql, not mysqli
	 * @param 	mixed	$new		bool-like flag to use with mysql_connect
	 *
	 * @return	void
	 */
	public function __construct($host = 'localhost', $user = 'root', $pword = 'password', $database='demo', $mysql=0, $new = 0){
		$this->_host = $host;
		$this->_user = $user;
		$this->_pword = $pword;
		$this->_database = $database;
		$this->_new = (bool) $new;
		$this->_mysqli = extension_loaded("mysqli") && !$mysql;

		$this->connect();
	}

	public function __destruct(){
		if( $this->conn_id !== false ){
			$this->_close();
		}
		$this->_clean();
	}

	/**
	 * Establish a connection to the database
	 *
	 * @param	array	$params    connection criteria host, user, pword, database, new
	 *
	 * @return	void
	 */

	protected function connect( $params=array() ){
		if( $this->conn_id !== false ){
			$this->_close();
		}

		$this->_host = isset($params['host']) ? $params['host'] : $this->_host;
		$this->_user = isset($params['user']) ? $params['user'] : $this->_user;
		$this->_pword = isset($params['pword']) ? $params['pword'] : $this->_pword;
		$this->_new = isset($params['new']) ? $params['new'] : $this->_new;
		$this->_database = isset($params['database']) ? $params['database'] : $this->_database;
		if( $this->_mysqli ){
			$this->conn_id = @mysqli_connect($this->_host, $this->_user, $this->_pword, $this->_database);
		} else {
			$this->conn_id = @mysql_connect($this->_host, $this->_user, $this->_pword, $this->_new);
			@mysql_select_db( $this->_database, $this->conn_id );
		}

	}

	/**
	 * Function for processing MySQL queries
	 *
	 * @param	string	$sql_query Query	to be executed
	 * @param	mixed	$suppress_errors	bool-like trigger
	 *
	 * @return	mixed	can be string or int based on type of query
	 */

	public function execute($sql_query, $suppress_errors = 0){
		$this->sql_query = $sql_query;
		if(!$this->conn_id){
			$this->connect();
		}

		$this->sql_result = $this->_query($sql_query);

		if(!$suppress_errors && !$this->sql_result && !preg_match("/^LOCK TABLES/i",$sql_query) && $sql_query!="UNLOCK TABLES"){
			if( $this->_lost_connection() ) {
				$this->connect();
				$this->execute( $sql_query );
			}else
				die($sql_query." : ".$this->_error());
		}

		$type = strtoupper(substr($sql_query,0,7));
		switch ($type){
			case 'SELECT ':
				return $this->sql_result;
			case 'UPDATE ':
			case 'DELETE ':
				return $this->_affected_rows();
			case 'INSERT ':
			case 'REPLACE':
				return $this->_insert_id();
			default:
				return $this->sql_result;
		}
	}

	/**
	 * Get a single scalar value from a viewable query (ie. SELECT, SHOW, etc)
	 *
	 * @param	string	$sql_query
	 *
	 * @return	mixed	single cell value on success, FALSE on failure
	 */

	public function single($sql_query){
		if( in_array( strtoupper(substr( $sql_query,0, strpos($sql_query,' ') )), $this->_viewable ) ){
			$_res = $this->execute($sql_query);
			return $this->_result();
		} else {
			return false;
		}
	}

	/**
	 * Get a single scalar value from given criteria
	 * Build a query and pass it to the single method
	 *
	 * @param	string	$table
	 * @param	string	$field	column name to query
	 * @param	array	$where	an associative array of field=>value
	 *
	 * @return	mixed	array on success or FALSE on failure
	 */

	public function value($table, $field, $where=array()){
		$sql_query = "SELECT {$field} FROM {$table}";
		if( !empty($where) ){
			foreach ($where as $key => $value) {
				$_where[] = $key.'='.$this->prep($value);
			}
			$sql_query .= ' WHERE '.implode(' AND ',$_where);
		}
		return $this->single( $sql_query );
	}

	/**
	 * Get a single row of a viewable query (ie. SELECT, SHOW, etc)
	 * This can be used to iterate a result similar to *_fetch_assoc functions
	 *
	 * @param	string	$sql_query
	 * @param	mixed	$loop		bool-like trigger
	 *
	 * @return	mixed	array on success or FALSE on failure
	 */

	public function row($sql_query, $loop = 0){
		if( in_array( strtoupper(substr( $sql_query,0, strpos($sql_query,' ') )), $this->_viewable ) ){
			if( !$this->sql_result || $sql_query != $this->sql_query ){
				$this->execute($sql_query);
			}

			$result = $this->_fetch_assoc($this->sql_result);

			if(!$result || !$loop)
				$this->_clean();

			return $result;
		} else {
			return false;
		}
	}

	/**
	 * Get results of a viewable query (ie. SELECT, SHOW, etc) in multidimensional array
	 *
	 * @param	string	$sql_query
	 * @param	mixed	$cols		bool-like flag whether to arrange data by columns
	 * @param	mixed	$keep		bool-like flag whether to retain result object
	 *
	 * @return	mixed	array on success or FALSE on failure
	 */

	public function result($sql_query, $cols=0, $keep=0){
		if( in_array( strtoupper(substr( $sql_query,0, strpos($sql_query,' ') )), $this->_viewable ) ){
			$ret_array = array();

			if ( $cols ) {
				// indexed array per column
				while($_res = $this->row($sql_query, 1) ){
					foreach ($_res as $key => $value) {
						$ret_array[$key][] = $value;
					}
				}
			} else {
				// associative array per row
				while($_res = $this->row($sql_query, 1) ){
					$ret_array[] = $_res;
				}
			}

			if ( $keep ) {
				$this->_data_seek(0);
			} else {
				$this->_free_result($this->sql_result);
			}

			$this->_clean();
			return $ret_array;
		} else {
			return false;
		}
	}

	/**
	 * Get results of a SELECT query built from given criteria
	 * Build a query and pass it to the result method
	 *
	 * @param	string	$table
	 * @param	mixed	$fields	column name to query or array of columns
	 * @param	array	$where	an associative array of field=>value
	 * @param	mixed	$cols	bool-like flag whether to arrange data by columns
	 *
	 * @return	mixed	array on success or FALSE on failure
	 */

	public function select($table, $fields, $where=array(), $cols=0){
		$field = is_array($fields) ? implode(',', $fields) : $fields;
		$sql_query = "SELECT {$field} FROM {$table}";
		if( !empty($where) ){
			foreach ($where as $key => $value) {
				$_where[] = $key.'='.$this->prep($value);
			}
			$sql_query .= ' WHERE '.implode(' AND ',$_where);
		}
		return $this->result( $sql_query, $cols );
	}

	/**
	 * Get results of a SELECT query on a single field in an array
	 *
	 * @param	string	$table
	 * @param	string	$field	column name to query
	 * @param	array	$where	an associative array of field=>value
	 *
	 * @return	mixed	array on success or FALSE on failure
	 */

	public function existing($table, $field, $where=array()){
		$sql_query = "SELECT {$field} FROM {$table}";
		if( !empty($where) ){
			foreach ($where as $key => $value) {
				$_where[] = $key.'='.$this->prep($value);
			}
			$sql_query .= ' WHERE '.implode(' AND ',$_where);
		}
		$_res = $this->execute( $sql_query );
		if( $_res !== false ){
			$out = array();
			while( $row = $this->_fetch_row($_res)){
				$out[] = $row[0];
			}
			return $out;
		} else {
			return false;
		}
	}

	/**
	 * Get an array listing the columns of a table
	 *
	 * @param	string	$table_name
	 * @param	mixed	$detail		bool-like flag, if FALSE return only names
	 *
	 * @return	mixed	array on success, FALSE on failure
	 */

	public function columns($table_name, $detail=0){
		$ret_array = array();
		while($this->_res = $this->row("DESC {$table_name}", 1) ){
			$ret_array[] = $detail ? $this->_res : $this->_res['Field'];
		}
		return empty($ret_array) ? false : $ret_array;
	}

	/**
	 * Alias of columns method
	 *
	 * @param	string	$table_name
	 * @param	mixed	$detail		bool-like flag
	 *
	 * @return	mixed	array on success, FALSE on failure
	 */

	public function fields($table_name, $detail=0){
		return $this->columns($table_name, $detail);
	}

	/**
	 * Quickly check for changes in an existing table
	 * output will change if the table contents change
	 *
	 * @param	string	$table_name
	 *
	 * @return	mixed	string|int on success, FALSE on failure
	 */

	public function checksum($table_name){
		$this->_res = $this->row("CHECKSUM TABLE {$table_name}");

		return empty($this->_res) ? false : $this->_res['Checksum'];
	}

	/**
	 * method for simple single row insert
	 *
	 * @param	string	$table	name of table receiving the data
	 * @param	array	$values	an associative array of field=>value
	 * @param	int		$dup	1: IGNORE, 2: REPLACE, 3: UPDATE
	 *
	 * @return	mixed   int (insert ID) on success or FALSE on failure;
	 */

	public function insert($table, $values=array(), $dup = null){
		if(empty($values) && !empty($this->values)){
			$values = $this->values;
		}elseif(empty($values) && empty($this->values)){
			return false;
		}

		$sql_query = $dup === 2 ? 'REPLACE' : 'INSERT';
		$sql_query .= ($dup === 1 ? ' IGNORE ':' ') .'INTO '.$table.' ('.implode(',', array_keys($values)).') '.'VALUES ('
			.implode( ',', array_map(array($this,'prep'), array_values($values)) ).')';
		if( $dup === 3 ){
			$sql_query .= ' ON DUPLICATE KEY UPDATE ';
			$update = array();
			foreach ($values as $key => $value){
				$update[] = $key.'='.$this->prep($value);
			}
			$sql_query .= implode(', ', $update);
		}
		return $this->execute($sql_query);
	}

	/**
	 * method for multi row insert
	 *
	 * @param	string	$table   name of table receiving the data
	 * @param	array	$values  an array of associative arrays of field=>value
	 *
	 * @return	mixed   int (insert ID) on success or FALSE on failure;
	 */

	public function insertMulti($table, $values=array()){
		if(empty($values) && !empty($this->values)){
			$values = $this->values;
		}elseif(empty($values) && empty($this->values)){
			return false;
		}
		$ins_value = array();
		foreach ($values as $key => $value) {
			if( is_int($key) )
				$ins_value[] = '('.implode( ',', array_map(array($this,'prep'), array_values($value)) ).')';
		}

		$sql_query = 'INSERT INTO '.$table.' ('.implode(',', array_keys($values[0])).') '.'VALUES '
			.implode( ',', $ins_value );
		return $this->execute($sql_query);
	}

	/**
	 * method for insert ignore query
	 *
	 * @param	string	$table	name of table receiving the data
	 * @param	array	$values	an associative array of field=>value
	 *
	 * @return	mixed   int (insert ID) on success or FALSE on failure;
	 */

	public function insertIgnore($table, $values=array()){
		return $this->insert($table, $values, 1);
	}

	/**
	 * method for replace into query
	 *
	 * @param	string	$table	name of table receiving the data
	 * @param	array	$values	an associative array of field=>value
	 *
	 * @return	mixed   int (insert ID) on success or FALSE on failure;
	 */

	public function replaceInto($table, $values=array()){
		return $this->insert($table, $values, 2);
	}

	/**
	 * method for insert update on duplicate query
	 *
	 * @param	string	$table	name of table receiving the data
	 * @param	array	$values	an associative array of field=>value
	 *
	 * @return	mixed   int (insert ID) on success or FALSE on failure;
	 */

	public function insertUpdate($table, $values=array()){
		return $this->insert($table, $values, 3);
	}

	/**
	 * method for simple update
	 *
	 * @param	string	$table   name of table receiving the data
	 * @param	array	$values  an associative array of field=>value
	 * @param	array   $where   an associative array of field=>value
	 *
	 * @return	mixed   int (rows affected) on success or FALSE on failure;
	 */

	public function update($table, $values=array(), $where=array()){
		if(empty($values) && !empty($this->values)){
			$values = $this->values;
		}elseif(empty($values) && empty($this->values)){
			return false;
		}
		$_values = array();
		$_where = array();

		foreach ($values as $key => $value) {
			$_values[] = $key.'='.$this->prep($value);
		}

		foreach ($where as $key => $value) {
			$_where[] = $key.'='.$this->prep($value);
		}

		$sql_query = 'UPDATE '.$table.' SET '.implode(',', $_values )
			.(!empty( $_where) ? ' WHERE '.implode(' AND ', $_where ) : '');
		return $this->execute($sql_query);
	}

	/**
	 * method for deleting rows
	 *
	 * @param	string	$table   name of table receiving the data
	 * @param	mixed	$opt     an associative array of field=>value, or a special command
	 *
	 * @return	mixed   int (rows affected) on success or FALSE on failure;
	 */

	public function delete($table, $opt=null){
		$_where = array();

		if(is_array($opt)){
			foreach ($opt as $key => $value) {
				$_where[] = $key.'='.$this->prep($value);
			}
		}elseif($opt === true || strtolower($opt) == 'truncate'){
			return $this->execute('TRUNCATE '.$table);
		}elseif(strtolower($opt) == 'drop'){
			return $this->execute('DROP '.$table);
		}

		$sql_query = 'DELETE FROM '. $table .(!empty( $_where) ? ' WHERE '.implode(' AND ', $_where ) : '');
		return $this->execute($sql_query);
	}

	/**
	 * method for truncating table
	 *
	 * @param	string	$table	name of table to be cleared
	 *
	 * @return	bool	FALSE on failure;
	 */

	public function truncate($table){
		// same as $this->delete($table, true);
		return $this->execute('TRUNCATE '.$table);
	}

	/**
	 * method for removing a table
	 *
	 * @param	string	$table	name of table to be dropped
	 *
	 * @return	bool	FALSE on failure;
	 */

	public function drop($table){
		// same as $this->delet($table,'drop');
		return $this->execute('DROP '.$table);
	}

	public function connectionId(){
		return $this->conn_id;
	}

	public function query_info(){
		return $this->_info();
	}

	public function lock($table){
		$this->execute("LOCK TABLES `{$table}` WRITE");
	}

	public function unlock(){
		$this->execute("UNLOCK TABLES");
	}

	/**
	 * Find whether a record exists based on a single column or more
	 *
	 * @param	mixed	$key		field value to look for required
	 * @param	string	$table		table name required
	 * @param	string	$field		optional field name
	 * @param	array	$additional	optional associative array of field=>value pairs
	 *
	 * @return bool
	 */

	public function exists($key, $table, $field="id", $additional=array()){
		$_where = array("{$field} = ".$this->prep($key));
		if( count($additional) != 0 ){
			foreach( $additional as $k => $v ){
				$_where[] = "{$k} = ".$this->prep($v);
			}
		}
		$this->sql_query = "SELECT COUNT(*) FROM {$table} WHERE ".implode(" AND ", $_where);
		return (bool) $this->single($this->sql_query);
	}

	/**
	 * prepare values for safe query entry
	 *
	 * @param	string	$text
	 * @param	bool	$trim		apply trim to given text
	 * @param	bool	$noe		null on empty flag
	 *
	 * @return	string
	 */

	protected function prep($text, $trim = true, $noe = false){
		if( $text === null ){
			return 'NULL';
		}
		if( !$noe ){
			if( !$trim ){
				return "'".str_replace('\\\\\\', '\\', $this->_escape_string($text))."'";
			} else {
				return "'".str_replace('\\\\\\', '\\', $this->_escape_string(trim($text)))."'";
			}
		} else {
			if( $trim ){
				return trim($text) == '' ? "NULL" : "'".str_replace('\\\\\\', '\\', $this->_escape_string(trim($text)))."'";
			} else {
				return $text == '' ? "NULL" : "'".str_replace('\\\\\\', '\\', $this->_escape_string($text))."'";
			}
		}
	}

	private function _lost_connection(){
		return $this->_errno() == 2006;
	}

	private function _clean(){
		$this->sql_query = "";
		$this->values = array();
		$this->_free_result($this->sql_result);
	}

	// container functions for common mysql(i)_* functions

	private function _affected_rows(){
		return $this->_mysqli ? @mysqli_affected_rows($this->conn_id) : @mysql_affected_rows($this->conn_id);
	}

	private function _close(){
		return $this->_mysqli ? @mysqli_close($this->conn_id) : @mysql_close($this->conn_id);
	}

	private function _data_seek( $row ){
		return $this->_mysqli ? @mysqli_data_seek($this->sql_result, $row) : @mysql_data_seek($this->sql_result, $row);
	}

	private function _errno(){
		return $this->_mysqli ? mysqli_errno($this->conn_id) : mysql_errno($this->conn_id);
	}

	private function _error(){
		return $this->_mysqli ? mysqli_error($this->conn_id) : mysql_error($this->conn_id);
	}

	private function _escape_string( $text ){
		return $this->_mysqli ? mysqli_real_escape_string($this->conn_id, $text) : mysql_escape_string($text);
	}

	private function _fetch_assoc( &$res ){
		return $this->_mysqli ? @mysqli_fetch_assoc($res) : @mysql_fetch_assoc($res);
	}

	private function _fetch_row( &$res ){
		return $this->_mysqli ? @mysqli_fetch_row($res) : @mysql_fetch_row($res);
	}

	private function _free_result( &$res ){
		return $this->_mysqli ? @mysqli_free_result($res) : @mysql_free_result($res);
	}

	private function _insert_id(){
		return $this->_mysqli ? @mysqli_insert_id($this->conn_id) : @mysql_insert_id($this->conn_id);
	}

	private function _query( $query_str ){
		return $this->_mysqli ? mysqli_query($this->conn_id, $query_str) : mysql_query($query_str, $this->conn_id);
	}

	private function _info(){
		return $this->_mysqli ? mysqli_info($this->conn_id) : mysql_info($this->conn_id);
	}

	private function _result( $res=null ){
		if( $res === null)
			$res = &$this->sql_result;
		if( !$this->_mysqli ){
			return @mysql_result($res,0);
		} else {
			$row = @mysqli_fetch_array($res, MYSQLI_NUM);
			return $row[0];
		}
	}

}

?>