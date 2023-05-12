<?php

include('header.php');
ComprobarSesion();
NavEtiquetasAdmin("perfil", $nombre_usuario);
include('../includes/conexion.php');
    
  /* Sentencia SQL para consultar los datos del administrador a presentar */
  $sql = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario' ";
  $query=mysqli_query($ok,$sql);
               
  $row=mysqli_fetch_array($query);
  if($but=$_POST['but']??null){
   
    
    $nom=$_POST['nombre']??null;
    $emai=$_POST['email']??null;
    $pass=$_POST['password']??null;
			$autentic_pass=$_POST['c_password']??null;
    if($pass==$autentic_pass){

  
$sql3="UPDATE `usuario` SET `nombre`='$nom',`correo`='$emai',`pass`='$pass' WHERE id_usuario=$id_usuario";
mysqli_query($ok,$sql3);
header('location:usuario.php');
    }else{
      echo"<script>alert('contraseña no coincide')</script>";
    }
  }

?>
<body>

  <div class="row d-flex justify-content-center">
    <div class="col-sm-6 ">
      <table class="table table-bordered">
        <form action="" method="POST">
        <tr>
          <td>ID de Usuario</td>
          <td><input name="id" value="<?php echo $row[0];?>" type="number"></td>
        </tr>
        <tr>
          <td>Nombre</td>
          <td><input name="nombre" value="<?php echo $row[1];?>" type="text"></td>
        </tr>
        <tr>
          <td>correo</td>
          <td><input name="email" value="<?php echo $row[2];?>" type="email"> </td>
        </tr>
        <td>contraseña</td>
          <td><input name="password" value="<?php echo $row[3];?>" type="password"> </td>
        </tr>
        <td>confirma contraseña</td>
          <td><input name="c_password" value="<?php echo $row[3];?>" type="password"> </td>
        </tr>
      
      
      </table>
      <div class="d-flex justify-content-center">
      <input type="submit" name="but" class="btn btn-black text-white">

      </div>

      </form>
    </div>