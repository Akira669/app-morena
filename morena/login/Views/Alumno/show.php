<script src="js/vendor/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.dynatable.css">
<script src="js/jquery.dynatable.js"></script>

<div class="container">
	<h2>Lista de Afiliados</h2>
	<div class="table-responsive">
		<table class="table table-hover" id="table-padron">
			<thead>
				<tr>
					<th>Clave de Elector</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Colonia</th>
					<th>Estado</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($listaAlumnos as$alumno) {?>	
				<tr>
					<td><?php echo $alumno->getClaveElector(); ?></td>
					<td><?php echo $alumno->getNombres(); ?></td>
					<td><?php echo $alumno->getApellidoPaterno(); ?></td>
					<td><?php echo $alumno->getApellidoMaterno(); ?></td>
					<td><?php echo $alumno->getColonia(); ?></td>
					<td><?php if ( $alumno->getEstado()==1):?>
						Activo
					<?php else:?>
						Inactivo
					<?php endif; ?></td>
					<td >
						<button type="button" class="btn btn-info" id="edit"><i class="icon-wrench">Editar</i></button>
						<button type="button" class="btn btn-danger" id="delete"><i class="icon-remove"></i>Eliminar</button> 
					</td>
				</tr>
					<?php } ?>
			</tbody>
		</table>
			<button type="button" id="button_excel" class="btn btn-link	"> 
				<picture class="icon_reportes">
					<img src="./imagenes/excel.png">
				</picture>
			</button>
	</div>	

</div>
<script type="text/javascript">
	$(document).ready(function(){

		$("#table-padron").dynatable();
		
		$("#button_excel").on('click',function(){
			alert('Descargardo...');
		});

		$("#edit").on('click',function(){
			alert("editar datos");
		});

		$("#delete").on('click',function(){
			alert("eliminar");
		});
	});
</script>