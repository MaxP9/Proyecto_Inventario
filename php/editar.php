<?php


include('header.php');
ComprobarSesion();
NavEtiquetasAdmin("Editar informacion", $nombre_usuario);


    include('../includes/conexion.php');
    $code = $_REQUEST["code"];
    $query=mysqli_query($ok,"SELECT * FROM productos where id_Producto=$code");
    $row=mysqli_fetch_array($query)


?>
  <form name="formEvento" id="formEvento" action="operaciones.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="nombre_evento" class="col-sm-12 control-label">Nombre del producto</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nombre" value="<?php echo $row[1]?>"  placeholder="Nombre del producto" required/>
      </div>
    </div>
    <div class="form-group">
      <label for="fecha_inicio" class="col-sm-12 control-label">Cantidad</label>
      <div class="col-sm-10">
        <input type="number"  class="form-control" name="cantidad"  value="<?php echo $row[2]?>"  placeholder="Cantidad" required/>
      </div>
    </div>
    <div class="form-group">
      <label for="fecha_inicio" class="col-sm-12 control-label">Costo</label>
      <div class="col-sm-10">
        <input type="number"  class="form-control" name="costo"  value="<?php echo $row[3]?>"  placeholder="Costo" required/>
      </div>
    </div>
    
    <div class="form-group">
      <label for="fecha_inicio" class="col-sm-12 control-label">Valor de venta</label>
      <div class="col-sm-10">
        <input type="number"  class="form-control" name="valor"  value="<?php echo $row[4]?>"  placeholder="Valor de venta" required/>
      </div>
    </div>
 
    <div class="modal-footer">
      <button type="submit" class="btn-white" name="crud" value="update">Guardar</button>
    </div>
    <input type="hidden" name="crud" value="update">
        <input type="hidden" name="code" value="<?php echo $code; ?>">

  </form>
</div>