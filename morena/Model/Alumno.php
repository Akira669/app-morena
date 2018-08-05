<?php 
/**
* 
*/
class Alumno{

	private $claveelector;
	private $userLogon;
	private $nombres;
	private $apellidopaterno;
	private $apellidomaterno;
	private $calle;
	private $numext;
	private $numint;
	private $colonia;
	private $codigopostal;
	private $telefono;
	private $estado;
	private $seccion;
	private $vinculo;
	

	
	function __construct($claveelector,$userLogon,$nombres,$apellidopaterno, $apellidomaterno, $calle, 
		$numext, $numint, $colonia, $codigopostal,$telefono, $estado,$seccion,$vinculo){
		
		$this->setClaveElector($claveelector);
		$this->setuserLogon($userLogon);
		$this->setNombres($nombres);
		$this->setApellidoPaterno($apellidopaterno);
		$this->setApellidoMaterno($apellidomaterno);
		$this->setCalle($calle);
		$this->setNumExt($numext);
		$this->setNumInt($numint);
		$this->setColonia($colonia);
		$this->setCodigoPostal($codigopostal);
		$this->setTelefono($telefono);
		$this->setEstado($estado);	
		$this->setSeccion($seccion);
		$this->setVinculo($vinculo);			
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

	public function getuserLogon(){
		return $this->userLogon;
	}

	public function setuserLogon($userLogon){
		$this->userLogon = $userLogon;
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

	public function getVinculo(){
		return $this->vinculo;
	}

	public function setVinculo($vinculo){
		return $this->vinculo = $vinculo;
	}

	public static function save($afil){
		$db=Db::getConnect();

		$insert=$db->prepare('INSERT INTO afiliados VALUES (:claveelector,:clavelogon,:nombres,:apellidopaterno,:apellidomaterno,
			:calle,:numext,:numint,:colonia,:codigopostal,:telefono,:estado,:seccion,:vinculo)');
		$insert->bindValue('claveelector',$afil->getClaveElector());
		$insert->bindValue('clavelogon',$afil->getuserLogon());
		$insert->bindValue('nombres',$afil->getNombres());
		$insert->bindValue('apellidopaterno',$afil->getApellidoPaterno());
		$insert->bindValue('apellidomaterno',$afil->getApellidoMaterno());
		$insert->bindValue('calle',$afil->getCalle());
		$insert->bindValue('numext',$afil->getNumExt());
		$insert->bindValue('numint',$afil->getNumInt());
		$insert->bindValue('colonia',$afil->getColonia());
		$insert->bindValue('codigopostal',$afil->getCodigoPostal());
		$insert->bindValue('telefono',$afil->getTelefono());
		$insert->bindValue('estado',$afil->getEstado());
		$insert->bindValue('seccion',$afil->getSeccion());
		$insert->bindValue('vinculo',$afil->getVinculo());
		if($insert->execute()==true){
			return true;
		}
		return false;
	}

	public static function all($userlogon){
		$db=Db::getConnect();

		$select=$db->prepare('SELECT 
							claveelector,
							claveElectorUser,
							nombres,
							apellidopaterno,
							apellidomaterno,
							calle,
							numext,
							numint,
							colonia,
							codigopostal,
							telefono,
							estado,
							seccion,
							vinculo 
							FROM afiliados 
							where claveElectorUser=:userlogon
							order by estado, claveelector');
		$select->bindValue('userlogon',$userlogon);
		$select->execute();
		foreach($select->fetchAll() as $afil){
			$listaAfiliados[] = new Alumno(
										$afil['claveelector'],$afil['claveElectorUser'],$afil['nombres'],$afil['apellidopaterno'],
										$afil['apellidomaterno'],
										$afil['calle'],$afil['numext'],$afil['numint'],
										$afil['colonia'],$afil['codigopostal'],$afil['telefono'],
										$afil['estado'],$afil['seccion'],$afil['vinculo']
									);
		}

		return $listaAfiliados;
	}

	public function searchById($datosValida){
		$db=Db::getConnect();
		$afil=array();
		$indices = array('nombre','apaterno','amaterno');
		$select=$db->prepare('SELECT nombres as nombre, apellidopaterno as paterno, apellidomaterno as materno
								from afiliados 
								where nombres=:nombre
								and  apellidopaterno=:apaterno
								and apellidomaterno=:amaterno');
		$select->bindValue('nombre',$datosValida['nombre']);
		$select->bindValue('apaterno',$datosValida['apaterno']);
		$select->bindValue('amaterno',$datosValida['amaterno']);
		$select->execute();
		$afilDb=$select->fetch();

		if($afilDb['nombre'] == $datosValida['nombre']){
			array_push($afil, $afilDb['nombre']);
		}else{array_push($afil, '');}

		if($afilDb['paterno'] == $datosValida['apaterno']){
			array_push($afil, $afilDb['paterno']);
		}else{array_push($afil, '');}

		if($afilDb['materno'] == $datosValida['amaterno']){
			array_push($afil, $afilDb['materno']);
		}else{array_push($afil, '');}

		$combine = array_combine($indices, $afil);	

		return $combine;
	}

	public static function update($afil){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE afiliados SET 
												nombres=:nombres, 
												apellidopaterno=:apellidopaterno, 
												apellidomaterno=:apellidomaterno, 
												calle=:calle, 
												numext=:numext, 
												numint=:numint, 
												colonia=:colonia, 
												codigopostal=:codigopostal, 
												telefono=:telefono,
												seccion=:seccion,  
												estado=:estado, 
												vinculo=:vinculo
												WHERE claveelector=:claveelector');
		$update->bindValue('nombres',$afil->getNombres());
		$update->bindValue('apellidopaterno',$afil->getApellidoPaterno());
		$update->bindValue('apellidomaterno',$afil->getApellidoMaterno());
		$update->bindValue('calle',$afil->getCalle());
		$update->bindValue('numext',$afil->getNumExt());
		$update->bindValue('numint',$afil->getNumInt());
		$update->bindValue('colonia',$afil->getColonia());
		$update->bindValue('codigopostal',$afil->getCodigoPostal());
		$update->bindValue('telefono',$afil->getTelefono());
		$update->bindValue('estado',$afil->getEstado());
		$update->bindValue('seccion',$afil->getSeccion());
		$update->bindValue('vinculo',$afil->getVinculo());
		$update->bindValue('claveelector',$afil->getClaveElector());
		if($update->execute()==true){
			return true;
		}
		return false;
	}

	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE  FROM afiliados WHERE claveelector=:id');
		$delete->bindValue('id',$id);
		$sidelete = $delete->execute();
		return $sidelete;		
	}
}

?>