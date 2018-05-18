<?php 
/**
* 
*/
class UsuarioController
{
	
	function __construct()
	{
		
	}

	function index(){
		require_once('Views/Alumno/bienvenido.php');
	}

	function register(){
		require_once('Views/Alumno/register.php');
	}

	function save($data){
		$afilidado = new Alumno($data['nombre'],$data['apaterno'],$data['amaterno'],$data['calle'],$data['num_ext'],
			$data['num_int'],$data['colonia'],$data['cp'],$data['telefono'],$data['clave_lector'],$data['activo']);

		$save=Alumno::save($afilidado);
		if($save){
			return true;
		}
	}

	function show(){
		$listaAlumnos=Alumno::all();
		require_once('Views/Alumno/show.php');
	}

	function updateshow(){
		$id=$_GET['idAlumno'];
		$alumno=Alumno::searchById($id);
		require_once('Views/Alumno/updateshow.php');
	}

	function update(){
		$alumno = new Alumno($_POST['id'],$_POST['nombres'],['nombres'],$_POST['apellidopaterno'],$_POST['apellidomaterno'],$_POST['calle'],$_POST['numext'],$_POST['numint'],$_POST['colonia'],$_POST['codigopostal'],$_POST['seccion'],$_POST['claveelector'],$_POST['estado']);
		Alumno::update($alumno);
		$this->show();
	}
	function delete(){
		$id=$_GET['id'];
		Alumno::delete($id);
		$this->show();
	}

	function search($claveElector){
			$afil=Alumno::searchByid($claveElector);
			return $afil;
	}

	function error(){
		require_once('Views/Alumno/error.php');
	}

}

?>