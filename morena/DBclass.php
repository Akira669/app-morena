<?php
class Cl_DBclass
{
	/**
	 * @var $con llevará a cabo la conexión de base de datos
	 */
	public $con;
	
	/**
	 * Esto creará la conexión de base de datos
	 */
	public function __construct()
	{
		$this->con = mysqli_connect("db740238255.db.1and1.com", "dbo740238255", "Akira_123", "db740238255");
		if( mysqli_connect_error()) echo "1.0: " . mysqli_connect_error();
	}
}