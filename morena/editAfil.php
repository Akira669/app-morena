<?php 
  require_once 'templates/header.php';
  
  $datos = $_GET['clave'];
  $elector = explode("?", $datos);

    $db=Db::getConnect();
    
    $select=$db->prepare('SELECT * FROM afiliados WHERE claveelector=:claveelector');
    $select->bindValue('claveelector',$elector[0]);
    $select->execute();
    $afilDb=$select->fetch();

      if($afilDb['estado']==1){
        $selected = "checked";
      }
      
?>
<div class="content">
     <div class="container">
       <h2>Editar Afiliado <span class="label label-info"><?php echo $afilDb['nombres'];?></span></h2>
      <div class="col-md-8 col-sm-8 col-xs-12">

          <div class="alert nover" id="mesaje_sinData">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Tip!</strong> Todos los campos son requeridos...
          </div>

  <form action="" method="POST" >
    <div class="comadar">
    <legend>Datos personales</legend>

    <div class="form-group" style="display:none;">
      <input type="text" class="form-control" id="userLogon"  value="<?php echo $claveElectorLogin; ?>">
    </div>

    <div class="form-group" style="display: flex; flex-direction:row;">
      <label for="text">Clave de Elector:</label>
      <h3 style="padding-left: 10px;"><span class="label label-info"><?php echo $afilDb['claveelector']; ?></span></h3> 
    </div>

        <div class="form-group" style="display:none;">
      <label for="text">Clave de Elector:</label>
      <input type="text" class="form-control" id="claveelector" value="<?php echo $afilDb['claveelector']; ?>" maxlength="20" placeholder="Clave de Elector" name="claveelector">
    </div>

    <div class="form-group">
      <label for="text">Nombre:</label>
      <input type="text" class="form-control" class="mayusculas" value="<?php echo $afilDb['nombres']; ?>" id="nombre" maxlength="30" placeholder="Ingrese su Nombre" name="nombres">
    </div>

     <div class="form-group">
      <label for="text">Apellido Paterno:</label>
      <input type="text" class="form-control" id="apellidopaterno" class="mayusculas" value="<?php echo $afilDb['apellidopaterno']; ?>" maxlength="20" placeholder="Apellido Paterno" name="apellidopaterno">
    </div>

     <div class="form-group">
      <label for="text">Apellido Materno:</label>
      <input type="text" class="form-control" id="apellidomaterno" class="mayusculas" value="<?php echo $afilDb['apellidomaterno']; ?>" maxlength="20" placeholder="Apellido Materno" name="apellidomaterno">
    </div>

     <div class="form-group">
      <label for="text">Telefono:</label>
      <input type="text" class="form-control" id="telefono" value="<?php echo $afilDb['telefono']; ?>" placeholder="Telefono" maxlength="10" name="telefono">
    </div>

    <div class="form-group">
      <label for="text">Seccion:</label>
      <input type="text" class="form-control" id="seccion" value="<?php echo $afilDb['seccion']; ?>" maxlength="20" placeholder="Seccion" name="seccion">
    </div>
  
  <div class="form-group">
      <label for="text">Vinculo:</label>
      <input type="text" class="form-control" id="vinculo" value="<?php echo $afilDb['vinculo']; ?>"  maxlength="20" placeholder="Vinculo" name="vinculo">
    </div>

    <legend>Direccion</legend>
    <div class="form-group">
      <label for="text">Calle:</label>
      <input type="text" class="form-control" value="<?php echo $afilDb['calle']; ?>" id="calle" maxlength="20" placeholder="Calle" name="calle">
    </div>
    <div class="form-inline">
      <div class="input_one">
        <label for="text">Num. Ext:</label>
      <input type="text" class="input-mini" id="numext" value="<?php echo $afilDb['numext']; ?>" maxlength="20" placeholder="Num. Ext" name="numext">
      </div>
      <div class="input_two">
        <label for="text">Num Int:</label>
      <input type="text" class="input-mini" id="numint" value="<?php echo $afilDb['numint']; ?>" maxlength="20" placeholder="Num. Int" name="numint">
      </div>
      <div class="input_thirt">
        <label for="text">CP:</label>
      <input type="text" class="input-mini " id="codigopostal" value="<?php echo $afilDb['codigopostal']; ?>" maxlength="5" placeholder="C.P" name="codigopostal">
      </div>
    </div>
    <br>
    <div class="form-group">
      <label for="text">Colonia:</label>  
      <input type="text" class="form-control" id="colonia" value="<?php echo $afilDb['colonia']; ?>" maxlength="20" placeholder="Colonia" name="colonia">
    </div>
     <div class="activabut">
      <label class="checkbox" >Activo: &nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input type="checkbox"  name="estado" id="estado" <?php echo $selected?>> 
  
      </div>
    <div class="buttones">
      <div class="editA">
        <button type="button"  id="editAfil" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-open"></span> 
    Actulizar afilizado
  </button>
      </div>
       
    <div class="cancelA">
      <button type="button" id="cancelAfil" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> 
    Cancelar
  </button>
    </div>
   
    </div>
   

  </div>
  </form>
      </div>
     </div>
</div>
<script src="js/editAfil.js" type="text/javascript"></script>
 <script src="js/bootbox.min.js" type="text/javascript" ></script>
<style type="text/css">
input.mayusculas{text-transform:uppercase;} 
.activabut{
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: flex-start;
}
.buttones{
 display: flex;
 flex-direction: row;

}
.buttones button{
  width: 200px;
}
.cancelA{
  padding-left: 20px;
}
.editA{
  padding-left: 150px;
}
.faltaDato{
    border: 3px red solid;
}
.nover{
  display: none;
}
#mesaje_electro{
  background-color: red;
}
#mesaje_duplicado,
#mesaje_sinData{
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
  