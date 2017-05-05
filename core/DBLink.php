<?php
class DBLink
{
	static public $connect;

	function __construct($dbname,$host,$username,$password) {
		self::$connect = mysqli_connect($host,$username,$password,$dbname) or throw new Exception('failed to connect');
		mysqli_query(self::$connect,'set names utf8');
	}
}

?>