<?php 
	require_once '../../config.php';
	
	$Controller = new UsuarioController();
	$element = $_POST['data'];
	$clave_elector = $_POST['clave'];
	$afilRegistrado = true;
	
	/**
	 * validcion de personas
	 * @var name,apellidos
	 */
	$datosValida = [
					'nombre' => $_POST['nombre'],
					'apaterno' => $_POST['apaterno'],
					'amaterno' => $_POST['amaterno']
				];

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
		$existe=duplicidad($Controller,$datosValida,$afilRegistrado);
		print $existe['nombre']."-".$existe['apaterno']."-".$existe['amaterno'];
	}
	
	/*
	* Registro Afiliado
	*/
	if($bandera_action==2){
		$register=registro($Controller,$element,$afilRegistrado);
		echo (int) $register;
	}

	/*
	*Editor Afiliado
	*/
	if($bandera_action==3){
		$existe=editor($Controller,$element,$afilRegistrado);
		echo (int) $existe;
	}

	/*
	*Editor Afiliado
	*/
	if($bandera_action==4){
		$existe=delete($Controller,$clave_elector,$afilRegistrado);
		echo (int) $existe;
	}

	/*
	* Functiones Accion
	*/
	function duplicidad($Controller,$datosValida,$afilRegistrado){
		$busca_Afil=$Controller->search($datosValida);
		if($busca_Afil){
			return $busca_Afil;
		}	return $afilRegistrado;	
	}
	function registro($Controller,$element,$afilRegistrado){
		$registerAfiliado = $Controller->save($element);	
		if($registerAfiliado){
			return $afilRegistrado;
		}
	}

	function editor($Controller,$element,$afilRegistrado){
		$registerAfiliado = $Controller->update($element);	
		if($registerAfiliado){
			return $afilRegistrado;
		}
	}

	function delete($Controller,$clave_elector,$afilRegistrado){
		$delete = $Controller->delete($clave_elector);
		if($delete){
			echo $afilRegistrado;
		}
		
	}
?>
  