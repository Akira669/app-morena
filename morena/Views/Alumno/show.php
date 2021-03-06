<div class="container">
	<h2>Lista de Afiliados</h2>
	<?php
	$user = $_SESSION['claveElector'];
		if(count($listaAlumnos)>0){
	 ?>
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

				<?php 
				foreach ($listaAlumnos as $afiliado) {?>	
				<tr>
					<td><?php echo $afiliado->getClaveElector(); ?></td>
					<td><?php echo $afiliado->getNombres(); ?></td>
					<td><?php echo $afiliado->getApellidoPaterno(); ?></td>
					<td><?php echo $afiliado->getApellidoMaterno(); ?></td>
					<td><?php echo $afiliado->getColonia(); ?></td>
					<td><?php if ( $afiliado->getEstado()==1):?>
						Activo
					<?php else:?>
						Inactivo
					<?php endif; ?></td>
					<td >
						<button type="button" class="btn btn-info" 
							onclick="editar(<?php echo "'".$afiliado->getClaveElector()."'"; ?>,
											<?php echo "'".$afiliado->getNombres()."'"; ?>);">
							<i class="icon-wrench">Editar</i>
						</button>
						<button type="button" class="btn btn-danger" id="delete"
							onclick="eliminar(<?php echo "'".$afiliado->getClaveElector()."'"; ?>,
											  <?php echo "'".$afiliado->getNombres()."'"; ?>);">
							<i class="icon-remove"></i>Eliminar
						</button> 
					</td>
				</tr>
					<?php } 
					?>
			</tbody>
		</table>
			<a href="Controllers/exportExcel.php?clave=<?php echo $user;?>">
			<button type="button" id="button_excel"  class="btn btn-link	"> 
				<picture class="icon_reportes">
					<img src="./imagenes/excel.png">
				</picture>
			</button></a>
	</div>	
	<?php 
}else{
	?>
	<div class="col-xs-6 col-md-6 col-md-offset-3" id="sin">
		<div class="alert alert-warning alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Warning!</strong> No tienes ningun afiliado refgistrado.<br> Puedes registrar uno en: <a href="registerAfil.php">Registrar afiliado</a>
		</div>
		<picture>
			<img src="./imagenes/nodatos.jpg">
		</picture>
	</div>
<?php } ?>
</div>
<style type="text/css" media="screen">
	#sin{
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;

	}	
</style>
<script src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.dynatable.css">
<script src="js/jquery.dynatable.js"></script>
<script src="js/bootbox.min.js" type="text/javascript" ></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#table-padron").dynatable();
	});

	function editar(claveElector,nombre){
		bootbox.confirm({
			    		message: "¿Editar al Afiliado, "+nombre+"?",
			    		buttons: {
			        		cancel: {
			            		label: '<i class="fa fa-times"></i> Cancelar'
			        		},
			        		confirm: {
			            		label: '<i class="fa fa-check"></i> Editar'
			        		}
		    			},
		    			callback: function (result) {
		    				if(result == true){
		    					window.location.href="editAfil.php?clave="+claveElector+"?"+nombre;
		    				}
		    			}
				});
	}

	function eliminar(claveElector,nombre){
		bootbox.confirm({
			    		message: "¿Eliminar al Afiliado, "+ nombre+"?",
			    		buttons: {
			        		cancel: {
			            		label: '<i class="fa fa-times"></i> Cancelar'
			        		},
			        		confirm: {
			            		label: '<i class="fa fa-check"></i> Eliminar'
			        		}
		    			},
		    			callback: function (result) {
		    				if(result == true){
		    					$.post("Views/Alumno/actionesAfil.php",{'action':4,'clave':claveElector},function(response){
									if(response){
										bootbox.alert("Afilidado registrado...");
										window.location.href="padron.php";
									}else{
										alert("ha ocurrido un error consulte a su administrador");
										window.location.href="padron.php";
									}
								});
		    				}
		    			}
				});
	}

	function excel(user){
		bootbox.alert("Descargando excel...");
		$.post('Controllers/exportExcel.php',{'user':user},function(response){});
	}

</script>