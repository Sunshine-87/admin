<?php
require_once 'DBLink.php';
class TBLink {
	public $table_name;

	public $sql = '';

	public $where = array();

	function __construct($table_name) {
		if (empty(DBLink::$connect)) {
			new DBLink(DBNAME,DBHOST,DBUSERNAME,DBPASSWORD);
			$this->connect = &DBLink::$connect;
		}
		$this->table_name = $table_name;
		$this->sql = 'SELECT * FROM '.$this->table_name;
	}

	function select($select = array()) {
		if (!empty($select)) {
			$select = implode(',', $select);
			$this->sql = 'SELECT '.$select.' FROM '.$this->table_name;
		}
		return $this;
	}

	function where($where = array()) {
		if (!empty($where)) {
			$whereStr = $this->whereStr($where);
		}
		array_push($this->where, array($whereStr , 'and'));
		return $this;
	}

	function orWhere($where = array()) {
		if (!empty($where)) {
			$whereStr = whereStr($where);
		}
		array_push($this->where, array($whereStr , 'or'));
		return $this;
	}

	function get() {
		$where = '';
		$thisW = $this->where;
		for ($i=0; $i < count($thisW); $i++) { 
			if ($i == 0) {
				$where .= ' WHERE '.$thisW[$i][0];
			} else {
				$where .= $thisW[$i][1].' '.$thisW[$i][0];
			}
		}
		$sql = $this->sql.$where;
		return mysqli_query($this->connect, $sql);
	}

	function update() {
		
	}

	function insert() {

	}

	function whereStr($where) {
		$whereArr = array();
		foreach ($where as $w) {
			if (count($w) == 2) {
				array_push($whereArr, ' '.$w[0].'=\''.$w[1].'\' ');
			} else if (count($w) == 3) {
				array_push($whereArr, ' '.$w[0].$w[1].'\''.$w[2].'\' ');
			} else {
				throw new Exception("Wrong arguments for the where string");
			}
		}
		$whereStr = implode('AND', $whereArr);
		$whereStr = '('.$whereStr.')';
		return $whereStr;
	}
}
?>