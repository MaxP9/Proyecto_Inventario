<?php

include('header.php');
ComprobarSesion();
NavEtiquetasAdmin("Historial", $nombre_usuario);

?>
<script>
                   function deleteventa(cod){ /* cambiamos delete a deletedata porque delete es una palabra reservada */
                        //alert(cod);
                        //funcion para eliminar evento
                    }
                
    </script>
    <?php
    
    include('../includes/conexion.php');
     
    $query=mysqli_query($ok,"SELECT p.Nombre, v.cantidad_l, v.resultado, v.reutilizable, v.ganancia, v.fecha,id_elegido,v.tipo_pago, v.nom_usuario
    FROM elegido AS v 
    LEFT JOIN productos AS p 
    ON v.id_Producto = p.id_Producto 
    ORDER BY v.fecha DESC
");






?>
<div class="container-fluid" onmousemove="total()">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead >

        
            <th >Producto</th>
            <th>cantidad</th>
            <th>venta</th>
            <th>Reutilizable</th>
            <th>Ganancia</th>
            <th>Fecha </th>
            <th>Pago</th>
            <th>ELIMINAR</th>

        </tr>
    </thead>

    <tbody>
        <?php 
         
while($row=mysqli_fetch_array($query)){
               
        ?>

        <tr>

            <td >  <?php echo $row[0]; ?> </td>
            
            <td> <?php echo $row[1]; ?> </td>
            
            <td><input  class="total-resultado" value="<?php echo $row[2]; ?>" type="hidden"> <?php echo $row[2]; ?> </td>
            <td  ><input  class="total-reutilizable" value="<?php echo $row[3]; ?>" type="hidden"><?php echo $row[3]; ?> </td>
            
            <td> <input  class="total-ganancia" value="<?php echo $row[4]; ?>" type="hidden"><?php echo $row[4]; ?></td>
            
            <td> <?php echo $row[5]; echo '('. $row[8].')' ;?> </td>
            <td> <?php echo $row[7]; ?> </td>

            <td> 
                <a href="#" onclick="ingresar(<?php echo $row[6]?>);"><img src="../static/img/basura.png"  alt="delete icon" width="50px"></a>
            </td>


       </tr>
     
        <?php
                }
         
            

        ?>
        
    </tbody>
    <script >

function ingresar(cod){
var tipo_admin="administrador";

if(tipo_admin=="<?php echo $rol ?>"){


 //funcion para eliminar evento
 //alert(cod); /* para probar que capturamos el codigo del cliente */
 window.location = "operaciones.php?code="+cod+"&crud=deleteventa";

}else{
alert('solo  administracion puede hacer esa funcion')
}
}
</script>
<tbody>
        <tr>
            <th></th>
            <th></th>
            <th><div id="como"></div>
<div>
    TOTAL
    <input type="text" id="totgen" readonly="true">
   
</div></th>
            <th><div id="comono"></div>
<div>
    TOTAL reutilizable
    <input type="text" id="totreu" readonly="true">
   
</div></th>
            <th>
<div id="comosi"></div>
<div>
    TOTAL ganancia
    <input type="text" id="totgan" readonly="true">
   
</div></th>
            <th></th>
            
        </tr>
</tbody>
</table></div>
                </div>
        </div>  
<script>
    function total(){
       
     


var totalgeneralgana = document.getElementById("totgan" );
        var totalesfilagana= document.querySelectorAll(".total-ganancia");
        var total=0;
for (var e =0;e < totalesfilagana.length;  e++){
    total+= (parseInt(totalesfilagana[e].value)|| 0 );
}
totalgeneralgana.value=total;


var totalgeneral = document.getElementById("totgen" );
var totalesfila= document.querySelectorAll(".total-resultado");
var totali=0;
for (var x =0;x < totalesfila.length;  x++){
    totali+= (parseInt(totalesfila[x].value)|| 0 );
}
totalgeneral.value=totali;


var totalgeneralreu = document.getElementById("totreu" );
var totalesfilareu= document.querySelectorAll(".total-reutilizable");
var totalreu=0;
for (var a =0;a < totalesfilareu.length;  a++){
    totalreu+= (parseInt(totalesfilareu[a].value)|| 0 );
}
totalgeneralreu.value=totalreu;

    }
</script>



 <!-- jQuery, Popper.js, Bootstrap JS -->
 <script src="../static/css/jquery/jquery-3.3.1.min.js"></script>
    <script src="../static/css/popper/popper.min.js"></script>
    <script src="../static/css/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="../static/css/datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="../static/css/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="../static/css/datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="../static/css/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="../static/css/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="../static/css/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="../static/js/main.js"></script>  
    
</body>
</html>