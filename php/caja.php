<?php
include('header.php');
ComprobarSesion();
NavEtiquetasAdmin("Usuarios ", $nombre_usuario);

?>

    <?php
    
    include('../includes/conexion.php');
     
    $query=mysqli_query($ok,"SELECT * FROM `usuario` WHERE `tipo_usu` ='vendedor';
   
");






?>

<div class="container-fluid" >
        <div class="row">
                <div class="col-lg-12">
                    <button class="btn-white" onclick="ingreso()"> Agregar usuario</button>
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead >

        
            <th >ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>tipo</th>
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
           
            <td> <?php echo $row[4]; ?> </td>
          

            <td> 
                <a href="#" onclick="ingresar(<?php echo $row[0]?>);"><img src="../static/img/basura.png"  alt="delete icon" width="50px"></a>
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
 window.location = "operaciones.php?code="+cod+"&crud=deleteusu";
}else{
alert('solo  administracion puede hacer esa funcion')
}
}
function ingreso(){
var tipo_admin="administrador";

if(tipo_admin=="<?php echo $rol ?>"){


 //funcion para eliminar evento
 //alert(cod); /* para probar que capturamos el codigo del cliente */
 window.location = "agr_usuario.php";
}else{
alert('solo  administracion puede hacer esa funcion')
}
}
</script>


 <!-- jQuery, Popper.js, Bootstrap JS -->
 <script src="../static/css/jquery/jquery-3.3.1.min.js"></script>
    <script src="../static/js/popper/popper.min.js"></script>
    <script src="../static/css/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="../static/js/datatables/datatables.min.js"></script>    
     

    <!-- código JS propìo-->    
    <script type="text/javascript" src="../static/js/main.js"></script>  
    
</body>
</html>