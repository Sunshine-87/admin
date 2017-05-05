<?php
require_once 'DBLink.php';
class TBLink {
	public $table_name;

	function __construct($table_name) {
		if (empty(DBLink::$connect)) {
			new DBLink();
		}
	}
}
?>