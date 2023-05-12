<?php

include('header.php');
ComprobarSesion();
NavEtiquetasAdmin("Agregar  productos", $nombre_usuario);
include('../includes/conexion.php');

$btn=$_POST['boton']??null;
if($btn){
$cantidad=$_POST['cantidad']??null;
$id_p=$_POST['id_p']??null;


$sql = "INSERT INTO agregar_p (id_Producto, Cantidad, id_usuario) values ($id_p,$cantidad, $id_usuario)";

mysqli_query($ok,$sql);
$query=mysqli_query($ok,"SELECT * FROM productos where id_Producto=$id_p");
$row=mysqli_fetch_array($query);
 
$suma=$row[2] +$cantidad;
$consulta="UPDATE productos SET Cantidad=$suma where id_Producto=$id_p";
mysqli_query($ok,$consulta);
}
?>

<div class="row d-flex justify-content-center">
    <div class="col-sm-6 ">
    <div class="d-flex justify-content-center">
    <button class="btn btn-mated text-black "><a href="agrega.php"  >Agregar Nuevo Producto</a></button> 
      </div>
      <table class="table table-bordered">
        <form action="" method="POST">
        <tr>
          <td>ID Producto</td>
          <td><input name="id_p"  autofocus type="number"></td>
        </tr>
        <tr>
          <td>Cantidad</td>
          <td><input name="cantidad" type="number" required></td>
        </tr>
     
         
       
       
      
      </table>
      <div class="d-flex justify-content-center">
      <input type="submit" name="boton" class="btn btn-white text-black">
      </div>
      </form>
    </div>