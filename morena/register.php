<?php 
	require_once 'config.php'; 
	require_once 'templates/header.php';
?>
<style type="text/css" media="screen">
.form_register{
	padding-top: 50px;
}	
.faltaDato{
    border: 3px red solid;
}
.nover{
  display: none;
}
</style>
<div class="container form_register">
	<div class="row">
		<div class="col-md-5">
			<h3> Registro nuevo usuario</h3>
		</div>
	</div>

	<div class="alert alert-warning alert-dismissible " id="obligatoprio" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Tip!</strong> Los campos con astericos son obligatorios...
</div>

	<div class="row">
		<form class="form-horizontal" id="register-form">
  <div class="form-group">
    <label for="elector" class="col-sm-2 control-label">Clave de elector * : </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="elector" maxlength="20" placeholder="Clave de elector" required>
    </div>
  </div>
  <div class="form-group">
    <label for="Nombre" class="col-sm-2 control-label">Nombre * : </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="nombre" maxlength="25" placeholder="Nombre de Usuario" required>
    </div>
  </div>
  <div class="form-group">
    <label for="apaterno" class="col-sm-2 control-label">Apellido paterno : </label>
    <div class="col-sm-5">
      <input type="text" class="form-control"  maxlength="25" id="apaterno" placeholder="Apellido parterno">
    </div>
  </div>
  <div class="form-group">
    <label for="amaterno" class="col-sm-2 control-label">Apellido materno :</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" maxlength="25" id="amaterno" placeholder="Apellido materno">
    </div>
  </div>
  <div class="form-group">
    <label for="rol" class="col-sm-2 control-label">Rol * :</label>
    <div class="col-sm-5">
    	<select class="form-control" id="rol">
  		<option value="">Seleccione una opcion...</option>
	 	<option value="admin">Administrador</option>
	 	<option value="user">Usuario</option>
	</select>
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">E-mail * :</label>
    <div class="col-sm-5">
      <input type="email" class="form-control" maxlength="30" id="email" placeholder="Correo electronico" required>
    </div>
  </div>
  <div class="form-group">
    <label for="passwd" class="col-sm-2 control-label">Contraseña * :</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" maxlength="10" id="passwd" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-info" id="submit_btn"  data-loading-text="Registrando...."><span class="glyphicon glyphicon-floppy-disk"></span> Registrar Usuario</button>
    </div>
  </div>
</form>
	</div>
</div>
<script src="js/bootbox.min.js" type="text/javascript" ></script>
 <script src="js/jquery.min.js"></script>
<script src="js/register.js"></script>
<?php
require_once 'templates/footer.php';
?>
