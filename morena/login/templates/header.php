<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

ob_start();
session_start();
require_once 'config.php'; 
if(!isset($_SESSION['logged_in'])){
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="app-morena">
    <meta name="morena" content="morena">
    <title>Morena</title>
	<!--<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <script src="js/bootbox.min.js" type="text/javascript" ></script>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 	</head>
 	<body>
	<div role="navigation" class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse"
					data-target=".navbar-collapse" class="navbar-toggle collapsed">
					<span class="sr-only"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span>
				</button>
			</div>
			<?php $uri = end( explode("/",$_SERVER['REQUEST_URI']));?>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li <?php if($uri == 'home.php') echo "class='active'"; ?>><a href="home.php">Inicio</a></li>
					<li <?php if($uri == 'info.php') echo "class='active'"; ?>><a href="info.php">info</a></li>
					
					<li <?php if($uri == 'padron.php') echo "class='active'"; ?>  class="dropdown">
						<a href="#" data-toggle="dropdown">Padron <span class="caret"></span> </a>
						<ul role="menu" class="dropdown-menu">
							<li> <a href="padron.php">Ver padron</a> </li>
							<li class="divider"></li>
							<li> <a href="registerAfil.php">Registro</a> </li>
						</ul>
					</li>
					
					<!-- <li <?php if($uri == 'reportes.php') echo "class='active'"; ?>><a href="reportes.php">Reportes</a></li> -->
					</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">
							Hola,  
						<?php if($_SESSION['logged_in']) { ?>
							<?php echo $_SESSION['name']; ?>
							<span class="caret"></span>
						</a>
						<ul role="menu" class="dropdown-menu">
							<li> <a href="account.php">Mi cuenta</a> </li>
							<li class="divider"></li>
							<li> <a href="logout.php">Salir</a> </li>
						</ul>
						<?php } ?>
					</li>
				</ul>
			</div>
		</div>
	</div>

	