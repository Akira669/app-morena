<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=morena;', 'root', '');
}
catch(Exception $e)
{
        die('Errorccc : '.$e->getMessage());
}
