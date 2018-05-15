<?php require_once 'templates/header.php'; ?>
<div class="content">
     <div class="container">
       <h2>Registro de Afiliado</h2>
      <div class="col-md-8 col-sm-8 col-xs-12">
        
  <form action="" method="POST" >
    <div class="comadar">
    <legend>Datos personales</legend>
    <div class="form-group">
      <label for="text">Nombre:</label>
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
      <label for="text">Telefono:</label>
      <input type="text" class="form-control" id="seccion" placeholder="Telefono" name="seccion">
    </div>

    <div class="form-group">
      <label for="text">Clave de Elector:</label>
      <input type="text" class="form-control" id="claveelector" placeholder="Clave de Elector" name="claveelector">
    </div>

    <legend>Direccion</legend>
    <div class="form-group">
      <label for="text">Calle:</label>
      <input type="text" class="form-control" id="calle" placeholder="Calle" name="calle">
    </div>
    <div class="form-inline">
      <div class="input_one">
        <label for="text">Num. Ext:</label>
      <input type="text" class="input-mini" id="numext" placeholder="Num. Ext" name="numext">
      </div>
      <div class="input_two">
        <label for="text">Num Int:</label>
      <input type="text" class="input-mini" id="numint" placeholder="Num. Int" name="numint">
      </div>
      <div class="input_thirt">
        <label for="text">CP:</label>
      <input type="text" class="input-mini " id="codigopostal" placeholder="C.P" name="codigopostal">
      </div>
    </div>
    <div class="form-group">
      <label for="text">Colonia:</label>  
      <input type="text" class="form-control" id="colonia" placeholder="Colonia" name="colonia">
    </div>
   
    <label class="checkbox">
      <input type="checkbox" name="estado"> Activo
    </label>
    <button type="submit" class="btn btn-primary">Guardar</button>

  </div>
  </form>
      </div>
     </div>
</div>
<style type="text/css">
.comadar{
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.form-inline{
  display: flex;
  justify-content: center;
  align-items: center;
  justify-content: space-between;
}
.input_one{
  width: 150px;
} 
.input_one input{
  width: 50px;
} 
.input_two{
width: 150px;
} 
.input_thirt{
width: 150px;
} 
</style>
<?php require_once 'templates/footer.php';?>
  