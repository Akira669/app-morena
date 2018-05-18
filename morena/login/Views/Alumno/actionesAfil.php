<?php 
	require_once '../../config.php';
	
	$Controller = new UsuarioController();
	$element = $_POST['data'];
	$clave_elector = $_POST['clave'];
	$afilRegistrado = true;
	
	/*
	*@params bandera
	*1 checa ducplicidad elector
	*2 registro de afiliado
	*3 editor de datos
	*4 eliminacion de afiliado
	*/
	$bandera_action=$_POST['action'];
	
	/*
	*Search Afiliado 
	*/
	if($bandera_action==1){
		$existe=duplicidad($Controller,$clave_elector,$afilRegistrado);
		echo (int) $existe;
	}
	
	/*
	* Registro Afiliado
	*/
	if($bandera_action==2){
		$register=registro($Controller,$element,$afilRegistrado);
		echo (int) $register;
	}

	/*
	* Functiones Accion
	*/
	function duplicidad($Controller,$clave_elector,$afilRegistrado){
		$busca_Afil=$Controller->search($clave_elector);
		if($busca_Afil){
		return $afilRegistrado;	
		}
	}
	function registro($Controller,$element,$afilRegistrado){
		$registerAfiliado = $Controller->save($element);	
		if($registerAfiliado){
			return $afilRegistrado;
		}
	}
?>
  