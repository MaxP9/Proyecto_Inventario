<?php
include('header.php');
ComprobarSesion();
NavEtiquetasAdmin("Historial ", $nombre_usuario);

?>

    <?php
    
    include('../includes/conexion.php');
     
    $query=mysqli_query($ok,"SELECT p.Nombre, a.Cantidad, a.id_usuario, a.fecha,a.id
    FROM agregar_p AS a
    LEFT JOIN productos AS p
    ON a.id_Producto = p.id_Producto 
    
    ORDER BY a.fecha DESC
");






?>
<div class="container-fluid" >
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead >

        
            <th >Producto</th>
            <th>cantidad</th>
            <th>usuario</th>
            <th>fecha</th>
            <th>eliminar</th>

        </tr>
    </thead>

    <tbody>
        <?php 
         
while($row=mysqli_fetch_array($query)){
               
        ?>

        <tr>

            <td >  <?php echo $row[0]; ?> </td>
            
            <td> <?php echo $row[1]; ?> </td>
            
            <td><?php echo $row[2]; ?></td>
           
            <td> <?php echo $row[3]; ?> </td>
          

            <td> 
                <a href="#" onclick="ingresar(<?php echo $row[4]?>);"><img src="../static/img/basura.png"  alt="delete icon" width="50px"></a>
            </td>


       </tr>
     
        <?php
                }
         
            

        ?>
        
    </tbody>

</table></div>
                </div>
        </div>  

        <script >

function ingresar(cod){
var tipo_admin="administrador";

if(tipo_admin=="<?php echo $rol ?>"){


 //funcion para eliminar evento
 //alert(cod); /* para probar que capturamos el codigo del cliente */
 window.location = "operaciones.php?code="+cod+"&crud=deleteentrada";
}else{
alert('solo  administracion puede hacer esa funcion')
}
}
</script>


 <!-- jQuery, Popper.js, Bootstrap JS -->
 <script src="../static/js/jquery/jquery-3.3.1.min.js"></script>
 
      
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