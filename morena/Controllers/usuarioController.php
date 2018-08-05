<?php 

require_once '../config.php';

	$db=Db::getConnect();
	

	$datosuaser = $_POST['data'];
	$inserto = false;
	$accion = $_POST['accion'];

	if($accion == 1){
		$inse = insert($db,$datosuaser);
		echo $inse;
	}

	if($accion == 2 ){
		$search = buscar($db,$datosuaser);
		if($search['claveElector']){
			echo $search['claveElector'];
		}else{
			echo $inserto;
		}
		
	}

	function insert($db,$datosuaser){
		//$passwod = md5($datosuaser['passwd']);
		$picture="";
		$date = date('Y-m-d h:i:s');
		$insert=$db->prepare('INSERT INTO users VALUES (:claveElector,:nombreUsuario,:apaterno,
		:amaterno,:email,:passwd,:rol,:picture,:create_up,:update_up)');

		$insert->bindValue('claveElector',$datosuaser['elector']);
		$insert->bindValue('nombreUsuario',$datosuaser['nombre']);
		$insert->bindValue('apaterno',$datosuaser['apaterno']);
		$insert->bindValue('amaterno',$datosuaser['amaterno']);
		$insert->bindValue('email',$datosuaser['email']);
		$insert->bindValue('passwd',md5($datosuaser['passwd']));
		$insert->bindValue('rol',$datosuaser['rol']);
		$insert->bindValue('picture',$picture);
		$insert->bindValue('create_up',$date);
		$insert->bindValue('update_up',$date);
		$ins = $insert->execute();
		return  $ins;
	}

	function buscar($db,$datosuaser){
		$select=$db->prepare('SELECT claveElector FROM users WHERE claveElector=:claveelector');
		$select->bindValue('claveelector',$datosuaser['elector']);
		$select->execute();
		$afilDb=$select->fetch();
		return $afilDb;
	}
	

?>