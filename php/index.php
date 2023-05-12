<?php

include('header.php');
ComprobarSesion();
NavEtiquetasAdmin("Productos", $nombre_usuario);

?>

 
    <?php
   
    include('../includes/conexion.php');
    
    $query=mysqli_query($ok,"SELECT * FROM productos");
  

?>
<script>
    var totalesfila= document.querySelectorAll(".total-fila");
var total=0;
for (var x =0;x < totalesfila.length;  x++){
    total+= (parseInt(totalesfila[x].value)|| 0 );
}
totalgeneral.value=total;

</script>

<form action="agregar_p.php" method="post">
    <div class="d-flex justify-content-center"><input type="submit" class="bg-$pink rounded " value="Añadir">
</div>

<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            <th>ID</th>

            <th>Producto</th>
            <th>Cantidad</th>
            <th>Costo</th>
            <th>Valor de venta</th>
            <th>Editar</th>
            <th>ELIMINAR</th>

        </tr>
    </thead>

    <tbody>
        <?php 
         
while($row=mysqli_fetch_array($query)){
               
        ?>

        <tr>

            
        <td> <?php echo $row[0]; ?> </td>

            
            <td> <?php echo $row[1]; ?> </td>
            <td> <?php echo $row[2]; ?> </td>
            
            <td> <?php echo $row[3]; ?> </td>
            
            <td> <?php echo $row[4]; ?> </td>
            


            <!-- Estos seran los botones tipo icono para actualizar y para eliminar -->
            <td> 
                <a href="#" onclick="ingresar(<?php echo $row[0]; ?>)"><img src="../static/img/editar.png" alt="update icon" width="50px"></a>
            </td>
            
            <td> 
                <a href="#" onclick="deletedata(<?php echo $row[0]?>);"><img src="../static/img/basura.png"  alt="delete icon" width="50px"></a>
            </td>
        </tr>
     
        <?php
                }
         
            

        ?>
    </tbody>
    
    </table>                  
                    </div>

                </div>
        </div>  
        <script >

            function ingresar(cod){
var tipo_admin="administrador";

if(tipo_admin=="<?php echo $rol ?>"){
  
 
             //funcion para eliminar evento
             //alert(cod); /* para probar que capturamos el codigo del cliente */
             window.location = "editar.php?code="+cod;
         
}else{
    alert('solo  administracion puede hacer esa funcion')
}
            }
        </script>

</form>
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