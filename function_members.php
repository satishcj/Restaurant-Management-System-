<?php
session_start();
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'restaurant');
class DB_con
{
	function __construct()
	{
		$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS) or die('localhost connection problem'.mysql_error());
		mysqli_select_db(DB_NAME, $conn);
	}
	public function fetchdata()
	{
	$result=mysql_query("select * from users");
	return $result;
	}
}
?>