<?php
session_start();
require_once 'templates/message.php';
require_once 'messages.php';
require_once 'connection.php';
require_once 'Controllers/AlumnoController.php';
require_once 'Model/Alumno.php';

//require_once 'Spreadsheet/Excel/Writer/Workbook.php';
//require_once 'Spreadsheet/Excel/Writer/BIFFwriter.php';
//require_once 'Spreadsheet/Excel/Writer.php';



define( 'BASE_PATH', 'http://localhost/morena/login/');//Ruta base donde se encuentra
define( 'DB_HOST', 'localhost' );//Servidor de la base de datos
define( 'DB_USERNAME', 'root');//Usuario de la base de datos
define( 'DB_PASSWORD', '');//Contraseña de la base de datos
define( 'DB_NAME', 'morena');//Nombre de la base de datos

function __autoload($class){
	$parts = explode('_', $class);
	$path = implode(DIRECTORY_SEPARATOR,$parts);
	require_once $path . '.php';
}

function validarSession($sesion){
	if(isset($sesion)){
		header('Location: index.php');
	}
}