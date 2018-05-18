<?php require_once 'templates/header.php'; ?>
<div class="content">
     <div class="container">
       <h2>Registro de Afiliado</h2>
      <div class="col-md-8 col-sm-8 col-xs-12">
        
          <div class="alert alert-error nover" id="mesaje_electro">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Tip!</strong> Por favor ingrese clave de elector...
          </div>

           <div class="alert nover" id="mesaje_duplicado">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Alert!</strong> La clave de elector ya se encuentra registrada...
          </div>

  <form action="" method="POST" >
    <div class="comadar">
    <legend>Datos personales</legend>

    <div class="form-group">
      <label for="text">Clave de Elector:</label>
      <input type="text" class="form-control" id="claveelector" placeholder="Clave de Elector" name="claveelector">
    </div>

    <div class="form-group">
      <label for="text">Nombre:</label>
      <input type="text" class="form-control" id="nombre" placeholder="Ingrese su Nombre" name="nombres">
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
      <input type="text" class="form-control" id="telefono" placeholder="Telefono" name="telefono">
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
    <br>
    <div class="form-group">
      <label for="text">Colonia:</label>  
      <input type="text" class="form-control" id="colonia" placeholder="Colonia" name="colonia">
    </div>
   
    <label class="checkbox">
      <input type="checkbox" name="estado" id="estado"> Activo
    </label>
    <button type="button" id="registerAfil" class="btn btn-primary">Guardar</button>

  </div>
  </form>
      </div>
     </div>
</div>
<script src="js/registerAfil.js" type="text/javascript"></script>
 <script src="js/bootbox.min.js" type="text/javascript" ></script>
<style type="text/css">
.faltaDato{
    border: 3px red solid;
}
.nover{
  display: none;
}
#mesaje_electro{
  background-color: red;
}
#mesaje_duplicado{
  background-color: yellow;
}
.comadar{
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.form-inline{
  display: flex;
}
.input_one{
  margin-right: 120px;
  width: 135px;
} 
.input_two{
   margin-right: 120px;
  width: 135px;
} 
.input_thirt{
width: 150px;
} 
</style>
<?php require_once 'templates/footer.php';?>
  