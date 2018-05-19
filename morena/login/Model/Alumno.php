<?php 
/**
* 
*/
class Alumno{

	private $nombres;
	private $apellidopaterno;
	private $apellidomaterno;
	private $calle;
	private $numext;
	private $numint;
	private $colonia;
	private $codigopostal;
	private $telefono;
	private $claveelector;
	private $estado;
	private $seccion;
	

	
	function __construct($nombres,$apellidopaterno, $apellidomaterno, $calle, $numext, $numint, $colonia, $codigopostal,
						$telefono, $claveelector, $estado,$seccion){
		$this->setNombres($nombres);
		$this->setApellidoPaterno($apellidopaterno);
		$this->setApellidoMaterno($apellidomaterno);
		$this->setCalle($calle);
		$this->setNumExt($numext);
		$this->setNumInt($numint);
		$this->setColonia($colonia);
		$this->setCodigoPostal($codigopostal);
		$this->setTelefono($telefono);
		$this->setClaveElector($claveelector);
		$this->setEstado($estado);	
		$this->setSeccion($seccion);			
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

	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
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
		return $this->estado = $estado;
	}

	public function getSeccion(){
		return $this->seccion;
	}

	public function setSeccion($seccion){
		return $this->seccion = $seccion;
	}

	public static function save($afil){
		$db=Db::getConnect();

		$insert=$db->prepare('INSERT INTO afiliados VALUES (:nombres,:apellidopaterno,:apellidomaterno,
			:calle,:numext,:numint,:colonia,:codigopostal,:telefono,:claveelector,:estado,:seccion)');
		$insert->bindValue('nombres',$afil->getNombres());
		$insert->bindValue('apellidopaterno',$afil->getApellidoPaterno());
		$insert->bindValue('apellidomaterno',$afil->getApellidoMaterno());
		$insert->bindValue('calle',$afil->getCalle());
		$insert->bindValue('numext',$afil->getNumExt());
		$insert->bindValue('numint',$afil->getNumInt());
		$insert->bindValue('colonia',$afil->getColonia());
		$insert->bindValue('codigopostal',$afil->getCodigoPostal());
		$insert->bindValue('telefono',$afil->getTelefono());
		$insert->bindValue('claveelector',$afil->getClaveElector());
		$insert->bindValue('estado',$afil->getEstado());
		$insert->bindValue('seccion',$afil->getSeccion());
		if($insert->execute()==true){
			return true;
		}
		return false;
	}

	public static function all(){
		$db=Db::getConnect();

		$select=$db->query('SELECT 
							nombres,apellidopaterno,apellidomaterno,calle,
							numext,numint,colonia,codigopostal,telefono,
							claveelector,estado,seccion 
							FROM afiliados 
							order by estado, claveelector');
		
		foreach($select->fetchAll() as $afil){
			$listaAfiliados[] = new Alumno(
										$afil['nombres'],$afil['apellidopaterno'],$afil['apellidomaterno'],
										$afil['calle'],$afil['numext'],$afil['numint'],
										$afil['colonia'],$afil['codigopostal'],$afil['telefono'],
										$afil['claveelector'],$afil['estado'],$afil['seccion']
									);
		}

		return $listaAfiliados;
	}

	public static function searchById($claveelector){
		$db=Db::getConnect();
		
		$select=$db->prepare('SELECT claveelector FROM afiliados WHERE claveelector=:claveelector');
		$select->bindValue('claveelector',$claveelector);
		$select->execute();
		$afilDb=$select->fetch();
		if($afilDb['claveelector']){
			return $afilDb['claveelector'];
		}
		return false;
		
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