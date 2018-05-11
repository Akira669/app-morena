<div class="container">
	<h2>Lista de Afiliados</h2>
	<form class="form-inline" action="?controller=alumno&action=search" method="post">
		<div class="form-group row">
			<div class="col-xs-4">
				<input class="form-control" id="id" name="id" type="text" placeholder="Buscar"> 
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-search"> </span> Buscar</button>       <input type="submit" src="/login/home.php" value="Volver al Incio" /> 

			</div>
		</div>
	</form>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Colonia</th>
					<th>Clave de Elector</th>
					<th>Estado</th>
					<th>Accion</th>
				</tr>
				<tbody>
					<?php foreach ($listaAlumnos as$alumno) {?>

					
					<tr>
						<td> <a href="?controller=alumno&&action=updateshow&&idAlumno=<?php  echo $alumno->getId()?>"> <?php echo $alumno->getId(); ?></a> </td>
						<td><?php echo $alumno->getNombres(); ?></td>
						<td><?php echo $alumno->getApellidoPaterno(); ?></td>
						<td><?php echo $alumno->getApellidoMaterno(); ?></td>
						<td><?php echo $alumno->getColonia(); ?></td>
						<td><?php echo $alumno->getClaveElector(); ?></td>
						<td><?php if ( $alumno->getEstado()=='checked'):?>
							Activo
						<?php  else:?>
							Inactivo
						<?php endif; ?></td>
						<td><a href="?controller=alumno&&action=delete&&id=<?php echo $alumno->getId() ?>">Eliminar</a> </td>
					</tr>
					<?php } ?>
				</tbody>

			</thead>
		</table>

	</div>	

</div>