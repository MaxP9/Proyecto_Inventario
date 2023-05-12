<?php

include('header.php');
ComprobarSesion();
NavEtiquetasAdmin("Agregar nuevos productos", $nombre_usuario);

?>
  <form name="formEvento" id="formEvento" action="operaciones.php" class="form-horizontal" method="POST" enctype="multipart/form-data">

    <div class="form-group">
      <label for="nombre_evento" class="col-sm-12 control-label">Nombre del producto</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nombre"  placeholder="Nombre del producto" required/>
      </div>
    </div>
    <div class="form-group">
      <label for="evento" class="col-sm-12 control-label">Cantidad</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="cantidad"  placeholder="Cantidad" required >
      </div>
    </div>

    <div class="form-group">
      <label for="fecha_inicio" class="col-sm-12 control-label">Costo</label>
      <div class="col-sm-10">
        <input type="number"  class="form-control" name="costo"   placeholder="Costo" required/>
      </div>
    </div>
    <div class="form-group">
      <label for="fecha_inicio" class="col-sm-12 control-label">Valor de venta</label>
      <div class="col-sm-10">
        <input type="number"  class="form-control" name="valor"  placeholder="Valor de venta" required/>
      </div>
    </div>
    <div class="form-group">
      <label for="nombre_evento" class="col-sm-12 control-label">ID del producto</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="id"  placeholder="ID del producto" required/>
      </div>
    </div>
    <div class="modal-footer">
      <input type="submit" class="btn-black"name="crud" value="create">
    </div>
  </form>
</div>
