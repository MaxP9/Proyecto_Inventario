<?php
 include('../includes/seguridad.php');
 $id_usuario = $_SESSION['identificacion'];
 $nombre_usuario = $_SESSION['user'];
 $rol=  $_SESSION['rol'];

 function NavEtiquetasAdmin($titulo, $nombre_usuario){
    echo '
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../static/css/bootstrap/css/bootstrap.min.css">
        <!-- CSS personalizado --> 
        <link rel="stylesheet" href="../static/css/main.css">  
        <link rel="stylesheet" href="../static/css/header.css">  
        <link rel="shortcut icon" href="../static/img/airam.jpeg" type="image/x-icon">

        <!--datables CSS básico-->
        <link rel="stylesheet" type="text/css" href="../static/css/datatables/datatables.min.css"/>
        <!--datables estilo bootstrap 4 CSS-->  
        <link rel="stylesheet"  type="text/css" href="../static/css/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
               
        <!--font awesome con CDN-->  
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
          
        <title>'.$titulo.'</title>
        <script>
        function deletedata(cod){ /* cambiamos delete a deletedata porque delete es una palabra reservada */
             //alert(cod);
             //funcion para eliminar evento
             window.location = "operaciones.php?code="+cod+"&crud=delete";
         }
        
         </script>
         <body >



<div class=" conta  d-flex flex-column-reverse  ">
 
  

 
                <div>
                <ul class="container2 d-flex justify-content-between   text-decoration-none ">
                <li class=""> <a class="text-decoration-none text-light " href="index.php">inicio</a> </li>
                <li class=""> <a class="text-decoration-none text-light" href="sumar.php">Venta</a></li>
                <li class=""> <a class="text-decoration-none text-light" href="option_h.php" >historial </a></li> 
                <li > <a class=" text-light" href="Caja.php">Usuarios<i class=""></i> </a></li>

                </ul>
            </div>

 
            <div class="conti   d-flex 	justify-content-between text-decoration-none">
            <div class="" >  
            <a  href="factura.php"><img  class="img1" src="../static/img/airam.jpeg"   alt="Centro De Eventos" itemprop="logo"></a> 
            </div>
    
                                   
                                      
            <div class="d-flex  justify-content-center m-top-10px ">
                                                        
            <a class="nav-link text-light" href="usuario.php"><i class=""></i> Hola, '.$nombre_usuario.'!</a>

            <a class="nav-link text-light" href="../includes/seguridad.php?sesion=cerrar">Cerrar Cesion<i class=""></i> </a>

                                                                             
            </div>
                    
    </div>
           
</div>

    ';}

?>