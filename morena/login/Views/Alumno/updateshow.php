<div class="container">
	<h2>Actualizar Registro</h2>
	<form action="?controller=alumno&&action=update" method="POST">
		<input type="hidden" name="id" value="<?php echo $alumno->getId() ?>" >
		<div class="form-group">
			<label for="text">Nombres</label>
			<input type="text" name="nombres" id="nombres" class="form-control" value="<?php echo $alumno->getNombres() ?>">
		</div>

		<div class="form-group">
			<label for="text">Apellido Paterno</label>
			<input type="text" 	name="apellidopaterno" id="apellidopaterno" class="form-control" value="<?php echo $alumno->getApellidoPaterno() ?>">
		</div>


		<div class="form-group">
			<label for="text">Apellido Materno</label>
			<input type="text" name="apellidomaterno" id="apellidomaterno" class="form-control" value="<?php echo $alumno->getApellidoMaterno(); ?>">
		</div>

		<div class="check-box">
			<label>Activo <input type="checkbox" name="estado" <?php echo $alumno->getEstado() ?>></label>
		</div>
		<button type="submit" class="btn btn-primary">Actualizar</button>

	</form>
</div>