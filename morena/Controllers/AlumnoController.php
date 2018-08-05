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
		$vinculo = $data['vinculo']!=null ? $data['vinculo'] : 'S/R';

		$afilidado = new Alumno($data['clave_lector'],$data['userlogon'],$data['nombre'],$data['apaterno'],
								$data['amaterno'],
								$calle,$num_ext,$num_int,$colonia,$cp,
								$data['telefono'],
								$data['activo'],$data['seccion'],$vinculo);

		$save=Alumno::save($afilidado);
		if($save){
			return true;
		}
	}

	function show($userlogon){
		$listaAlumnos=Alumno::all($userlogon);
		require_once('Views/Alumno/show.php');
	}

	function updateshow(){
		$id=$_GET['idAlumno'];
		$alumno=Alumno::searchById($id);
		require_once('Views/Alumno/updateshow.php');
	}

	function update($data){
		$calle = $data['calle']!=null ? $data['calle'] : 'S/R';
		$num_ext = $data['num_ext']!=null ? $data['num_ext'] : 'S/R';
		$num_int = $data['num_int']!=null ? $data['num_int'] : 'S/R';
		$colonia = $data['colonia']!=null ? $data['colonia'] : 'S/R'; 
		$cp = $data['cp']!=null ? $data['cp'] : 00000;
		$vinculo = $data['vinculo']!=null ? $data['vinculo'] : 'S/R';

		$afilidado = new Alumno($data['clave_lector'],$data['userlogon'],$data['nombre'],$data['apaterno'],
								$data['amaterno'],
								$calle,$num_ext,$num_int,$colonia,$cp,
								$data['telefono'],
								$data['activo'],$data['seccion'],$vinculo);

		$update = Alumno::update($afilidado);
		return $update;
	}
	function delete($id){
		$delete = Alumno::delete($id);
		return $delete;
	}

	function search($datosValida){
			$afil=Alumno::searchByid($datosValida);
			return $afil;
	}

	function error(){
		require_once('Views/Alumno/error.php');
	}

}

?>