<?php require_once 'templates/header.php'; ?>
<div class="content">
     <div class="container">
       <h2>Registro de Afiliado</h2>
      <div class="col-md-8 col-sm-8 col-xs-12">
        
  <form action="?controller=alumno&&action=save" method="POST">
    <div class="form-group">
      <label for="text">Nombres:</label>
      <input type="text" class="form-control" id="nombres" placeholder="Ingrese su Nombre" name="nombres">
    </div>

     <div class="form-group">
      <label for="text">Apellido Paterno:</label>
      <input type="text" class="form-control" id="apellidopaterno" placeholder="Apellido Paterno" name="apellidopaterno">
    </div>

     <div class="form-group">
      <label for="text">Apellido Materno:</label>
      <input type="text" class="form-control" id="apellidomaterno" placeholder="Apellido Materno" name="apellidomaterno">
    </div>

    <div class="form-group">
      <label for="text">Domicilio:</label>
      <input type="text" class="form-control" id="calle" placeholder="Calle" name="calle">
      <input type="text" class="form-control" id="numext" placeholder="Num. Ext" name="numext">
      <input type="text" class="form-control" id="numint" placeholder="Num. Int" name="numint">
      <input type="text" class="form-control" id="colonia" placeholder="Colonia" name="colonia">
      <input type="text" class="form-control" id="codigopostal" placeholder="C.P" name="codigopostal">
      <input type="text" class="form-control" id="seccion" placeholder="Seccion" name="seccion">
    </div>

    
    <div class="form-group">
      <label for="text">Clave de Elector:</label>
      <input type="text" class="form-control" id="claveelector" placeholder="Clave de Elector" name="claveelector">
    </div>

    <div class="check-box">
      <label>Activo <input type="checkbox" name="estado">  </label>      
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
      </div>
     </div>
</div>
<?php require_once 'templates/footer.php';?>
  