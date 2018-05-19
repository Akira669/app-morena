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
	
		$calle = $data['calle']!=null ? $data['calle'] : 'S/R';
		$num_ext = $data['num_ext']!=null ? $data['num_ext'] : 'S/R';
		$num_int = $data['num_int']!=null ? $data['num_int'] : 'S/R';
		$colonia = $data['colonia']!=null ? $data['colonia'] : 'S/R'; 
		$cp = $data['cp']!=null ? $data['cp'] : 00000;

		$afilidado = new Alumno($data['nombre'],$data['apaterno'],$data['amaterno'],
								$calle,$num_ext,$num_int,$colonia,$cp,
								$data['telefono'],$data['clave_lector'],
								$data['activo'],$data['seccion']);

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