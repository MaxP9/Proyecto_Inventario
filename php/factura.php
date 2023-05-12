 <?php
include('header.php');
ComprobarSesion();
NavEtiquetasAdmin("Informacion", $nombre_usuario);
include('../includes/conexion.php');
    
  /* Sentencia SQL para consultar los datos del administrador a presentar */
  $sql = "SELECT * FROM info_factura ";
  $query=mysqli_query($ok,$sql);
  $row=mysqli_fetch_array($query);
  if($but=$_POST['but']??null){

    $tel=$_POST['tel']??null;
    $ciu=$_POST['ciu']??null;
    $dir=$_POST['dir']??null;
    $impresora=$_POST['impre']??null;

        $id=1;
    
$sql3="UPDATE info_factura SET tel=$tel,ciudad='$ciu',direccion='$dir',nombre_impresora='$impresora' WHERE $id";
mysqli_query($ok,$sql3);
header('location:index.php');
  }
  
?>
<body>

  <div class="row d-flex justify-content-center">
    <div class="col-sm-6 ">
      <table class="table table-bordered">
      <form  method="post">
        <tr>
          <td>telefono</td>
          <td><input name="tel" value="<?php echo $row[1];?>" type="number"></td>
        </tr>
        <tr>
          <td>ciudad</td>
          <td><input name="ciu" value="<?php echo $row[2];?>" type="text"></td>
        </tr>
        <tr>
          <td>direccion</td>
          <td><input name="dir" value="<?php echo $row[3];?>" type="text"></td>
        </tr>
        <tr>
          <td>Impresora</td>
          <td><input name="impre" value="<?php echo $row[4];?>" type="text"></td>
        </tr>
      
      </table>
      <div class="d-flex justify-content-center">
      <input type="submit" name="but" class="btn btn-warning text-white">
      </div>
      </form>

    </div>