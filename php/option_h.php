<?php

include('header.php');
ComprobarSesion();
NavEtiquetasAdmin("Historial", $nombre_usuario);
?>
<div class=" d-flex  flex-column-group justify-content-center p-5">
<div class="m-5">
<a  href="venta.php"><img src="../static/img/incrementar.png" title="Historial Ventas"  alt="Historial Ventas" width="150px"></a>

</div>
<div  class="m-5">
<a href="h_pro.php"><img src="../static/img/entradaa.png" title="Historial entrada"  alt="Historial entrada" width="150px"></a>

</div>
</div>