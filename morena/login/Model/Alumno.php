<?php 
/**
* 
*/
class Alumno
{
	private $id;
	private $nombres;
	private $apellidopaterno;
	private $apellidomaterno;
	private $calle;
	private $numext;
	private $numint;
	private $colonia;
	private $codigopostal;
	private $seccion;
	private $claveelector;
	private $estado;

//	private $apellidos;
	

	
	function __construct($id, $nombres,$apellidopaterno, $apellidomaterno, $calle, $numext, $numint, $colonia, $codigopostal, $seccion, $claveelector, $estado)
	{
		$this->setId($id);
		$this->setNombres($nombres);
		$this->setApellidoPaterno($apellidopaterno);
		$this->setApellidoMaterno($apellidomaterno);
		$this->setCalle($calle);
		$this->setNumExt($numext);
		$this->setNumInt($numint);
		$this->setColonia($colonia);
		$this->setCodigoPostal($codigopostal);
		$this->setSeccion($seccion);
		$this->setClaveElector($claveelector);
		$this->setEstado($estado);
		//$this->setApellidos($apellidos);
				
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombres(){
		return $this->nombres;
	}

	public function setNombres($nombres){
		$this->nombres = $nombres;
	}

	public function getApellidoPaterno(){
		return $this->apellidopaterno;
	}

	public function setApellidoPaterno($apellidopaterno){
		$this->apellidopaterno = $apellidopaterno;
	}

	public function getApellidoMaterno(){
		return $this->apellidomaterno;
	}

	public function setApellidoMaterno($apellidomaterno){
		$this->apellidomaterno = $apellidomaterno;
	}

	public function getCalle(){
		return $this->calle;
	}

	public function setCalle($calle){
		$this->calle = $calle;
	}

	public function getNumExt(){
		return $this->numext;
	}

	public function setNumExt($numext){
		$this->numext = $numext;
	}

	public function getNumInt(){
		return $this->numint;
	}

	public function setNumInt($numint){
		$this->numint = $numint;
	}

	public function getColonia(){
		return $this->colonia;
	}

	public function setColonia($colonia){
		$this->colonia = $colonia;
	}

	public function getCodigoPostal(){
		return $this->codigopostal;
	}

	public function setCodigoPostal($codigopostal){
		$this->codigopostal = $codigopostal;
	}

	public function getSeccion(){
		return $this->seccion;
	}

	public function setSeccion($seccion){
		$this->seccion = $seccion;
	}

	public function getClaveElector(){
		return $this->claveelector;
	}

	public function setClaveElector($claveelector){
		$this->claveelector = $claveelector;
	}
	public function getEstado(){

		return $this->estado;
	}

	public function setEstado($estado){
		
		if (strcmp($estado, 'on')==0) {
			$this->estado=1;
		} elseif(strcmp($estado, '1')==0) {
			$this->estado='checked';
		}elseif (strcmp($estado, '0')==0) {
			$this->estado='of';
		}else {
			$this->estado=0;
		}

	}

	public static function save($alumno){
		$db=Db::getConnect();

		$insert=$db->prepare('INSERT INTO alumno VALUES (NULL, :nombres,:apellidopaterno,:apellidomaterno,:calle,:numext,:numint,:colonia,:codigopostal,:seccion,:claveelector,:estado)');
		$insert->bindValue('nombres',$alumno->getNombres());
		$insert->bindValue('apellidopaterno',$alumno->getApellidoPaterno());
		$insert->bindValue('apellidomaterno',$alumno->getApellidoMaterno());
		$insert->bindValue('calle',$alumno->getCalle());
		$insert->bindValue('numext',$alumno->getNumExt());
		$insert->bindValue('numint',$alumno->getNumInt());
		$insert->bindValue('colonia',$alumno->getColonia());
		$insert->bindValue('codigopostal',$alumno->getCodigoPostal());
		$insert->bindValue('seccion',$alumno->getSeccion());
		$insert->bindValue('claveelector',$alumno->getClaveElector());
		$insert->bindValue('estado',$alumno->getEstado());
		$insert->execute();
	}

	public static function all(){
		$db=Db::getConnect();
		$listaAlumnos=[];

		$select=$db->query('SELECT * FROM alumno order by id');

		foreach($select->fetchAll() as $alumno){
			$listaAlumnos[]=new Alumno($alumno['id'],$alumno['nombres'],$alumno['apellidopaterno'],$alumno['apellidomaterno'],$alumno['calle'],$alumno['numext'],$alumno['numint'],$alumno['colonia'],$alumno['codigopostal'],$alumno['seccion'],$alumno['claveelector'],$alumno['estado']);
		}
		return $listaAlumnos;
	}

	public static function searchById($id){
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM alumno WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$alumnoDb=$select->fetch();


		$alumno = new Alumno ($alumnoDb['id'],$alumnoDb['nombres'], $alumnoDb['apellidopaterno'], $alumnoDb['apellidomaterno'], $alumnoDb['calle'], $alumnoDb['numext'], $alumnoDb['numint'], $alumnoDb['colonia'], $alumnoDb['codigopostal'], $alumnoDb['seccion'], $alumnoDb['claveelector'], $alumnoDb['estado']);
		//var_dump($alumno);
		//die();
		return $alumno;

	}

	public static function update($alumno){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE alumno SET nombres=:nombres, apellidopaterno=:apellidopaterno, apellidomaterno=:apellidomaterno, calle=:calle, numext=:numext, numint=:numint, colonia=:colonia, codigopostal=:codigopostal, seccion=:seccion, claveelector=:claveelector, estado=:estado WHERE id=:id');
		$update->bindValue('nombres', $alumno->getNombres());
		$update->bindValue('apellidopaterno',$alumno->getApellidoPaterno());
		$update->bindValue('apellidomaterno', $alumno->getApellidoMaterno());
		$update->bindValue('calle', $alumno->getCalle());
		$update->bindValue('numext', $alumno->getNumExt());
		$update->bindValue('numint', $alumno->getNumInt());
		$update->bindValue('colonia', $alumno->getColonia());
		$update->bindValue('codigopostal', $alumno->getCodigoPostal());
		$update->bindValue('seccion', $alumno->getSeccion());
		$update->bindValue('claveelector', $alumno->getClaveElector());	
		$update->bindValue('estado',$alumno->getEstado());
		$update->bindValue('id',$alumno->getId());
		$update->execute();
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM alumno WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}

?>