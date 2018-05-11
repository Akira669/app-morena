<?php 

/**
* 
*/
class Db
{
	private static $instance=NULL;
	
	function __construct(){}

	public static function  getConnect(){
		if (!isset(self::$instance)) {
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			self::$instance= new PDO('mysql:host=localhost;dbname=morena','root','',$pdo_options);
		} 
		return self::$instance;
	}
}

 ?>

 <?php
$servername = "localhost";
$username = "root";
$password = "";

$link = mysql_connect($servername,$username,$password);
mysql_select_db("morena", $link);
?>