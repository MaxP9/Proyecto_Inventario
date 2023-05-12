<?php

include('header.php');
ComprobarSesion();
NavEtiquetasAdmin("Agregar nuevos usuarios", $nombre_usuario);

?>
  <form name="formEvento" id="formEvento" action="operaciones.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
  
  <div class="form-group">
      <label for="nombre_evento" class="col-sm-12 control-label">Numero de documento</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="usu"  placeholder="Usuario" required/>
      </div>
    </div>
    <div class="form-group">
      <label for="nombre_evento" class="col-sm-12 control-label">Nombre </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="Nombre"  placeholder="ingrese Nombre " required/>
      </div>
    </div>
    <div class="form-group">
      <label for="evento" class="col-sm-12 control-label">Correo electronico</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="correo"  placeholder="ingrese correo " required >
      </div>
    </div>

    <div class="form-group">
      <label for="fecha_inicio" class="col-sm-12 control-label">Contraseña</label>
      <div class="col-sm-10">
        <input type="password"  class="form-control" name="password"   placeholder="ingrese Contraseña" required/>
      </div>
    </div>
   
        <input type="hidden"  class="form-control" name="tipo" value="vendedor"/>
    
    <div class="modal-footer">
      <input type="submit" class="btn-white"name="crud" value="crear">
    </div>
  </form>
</div>
