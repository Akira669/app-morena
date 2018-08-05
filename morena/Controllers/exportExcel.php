<?php 
require_once '../connection.php';

$user = $_GET['clave'];
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
		$select->bindValue('userlogon',$user);
		$select->execute();

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte_Personal_usuarios.xls");
header('Program: no-cache');
header('Expires: 0');
?>
<table>
		<tr>
			<td>Clave Elector</td>
			<td>Nombre</td>
			<td>Apellido Paterno</td>
			<td>Apellido Materno</td>
			<td>calle</td>
			<td>Codigo Posatal</td>
			<td>Colonia</td>
			<td>seccion</td>
			<td>vinculo</td>
			<td>Estado</td>
		</tr>
	<?php  foreach($select->fetchAll() as $afil){ ?>
		<tr>
			<td><?php echo $afil['claveelector']; ?></td>
			<td><?php echo $afil['nombres']; ?></td>
			<td><?php echo $afil['apellidopaterno']; ?></td>
			<td><?php echo $afil['apellidomaterno']; ?></td>
			<td><?php echo $afil['calle']; ?></td>
			<td><?php echo $afil['codigopostal']; ?></td>
			<td><?php echo $afil['colonia']; ?></td>
			<td><?php echo $afil['seccion']; ?></td>
			<td><?php echo $afil['vinculo']; ?></td>
			<td><?php echo $afil['estado']; ?></td>

		</tr>
	<?php } ?>
</table>